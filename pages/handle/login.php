<?php
    session_start();
    include('../../admin/config/config.php');
    if (isset($_POST['login'])) {
        $account_email = $_POST['account_email'];
        $account_password = md5($_POST['account_password']);
        $sql_account = "SELECT * FROM account WHERE account_email='".$account_email."' AND account_password='".$account_password."'";
        $query_account = mysqli_query($mysqli, $sql_account);
        $row = mysqli_fetch_array($query_account);
        $count = mysqli_num_rows($query_account);
        if ($count>0) {
            $_SESSION['account_id'] = $row['account_id'];
            $_SESSION['account_email'] = $row['account_email'];
            header('Location:../../index.php?page=my_account&tab=account_info&message=success');
        }else {
            header('Location:../../index.php?page=login');
            echo '<script>alert("Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại");</script>';
        }
    }
