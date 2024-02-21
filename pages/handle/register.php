<?php
session_start();
include('../../admin/config/config.php');
if (isset($_POST['register'])) {
    $account_name = $_POST['account_name'];
    $customer_address = $_POST['customer_address'];
    $account_phone = $_POST['account_phone'];
    $account_email = $_POST['account_email'];
    $account_password = md5($_POST['account_password']);
    if (isset($_POST['account_gender'])) {
        $account_gender = $_POST['account_gender'];
    } else {
        $account_gender = 0;
    }

    $sql_getacc = "SELECT * FROM account WHERE account_email = '" . $account_email . "'";
    $query_getacc = mysqli_query($mysqli, $sql_getacc);
    $count = mysqli_num_rows($query_getacc);

    if ($count == 0) {
        $sql_resgister = "INSERT INTO account(account_name, account_email, account_password, account_type) VALUE('" . $account_name . "', '" . $account_email . "', '" . $account_password . "', 0)";
        $query_register = mysqli_query($mysqli, $sql_resgister);

        $sql_account = "SELECT * FROM account WHERE account_email = '$account_email'";
        $get_register = mysqli_query($mysqli, $sql_account);

        $account = mysqli_fetch_array($get_register);

        $sql_customer = "INSERT INTO customer(account_id, customer_name, customer_gender, customer_email, customer_phone, customer_address) VALUE('" . $account['account_id'] . "','" . $account_name . "', '" . $account_gender . "', '" . $account_email . "', '" . $account_phone . "', '" . $customer_address . "')";
        $query_customer = mysqli_query($mysqli, $sql_customer);
        if ($query_register) {
            echo '<script>alert("Đăng ký thành công");</script>';
            header('Location:../../index.php?page=login&message=success');
        }
    } else {
        echo '<script>alert("Email đã sử dụng vui lòng nhập lại email khác");</script>';
        header('Location:../../index.php?page=register&message=error');
    }
}
?>