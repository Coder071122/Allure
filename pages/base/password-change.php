<?php
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
            echo '<script>alert("Đăng nhập thành công");</script>';
        }else {
            echo '<script>alert("Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại");</script>';
        }
    }
?>
<section class="login pd-section">
    <div class="form-box">
        <div class="form-value">
            <form action="" autocomplete="on" method="POST">
                <h2 class="login-title">Thay đổi mật khẩu</h2>
                <?php
                if (isset($_POST['password_change'])) {
                    $account_email = $_SESSION['account_email'];
                    $password_old = md5($_POST['password_old']);
                    $password_new = md5($_POST['password_new']);
                    $sql = "SELECT * FROM account WHERE account_email='" . $account_email . "' AND account_password='" . $password_old . "' ";
                    $query = mysqli_query($mysqli, $sql);
                    $row = mysqli_fetch_array($query);
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                        $sql_update = mysqli_query($mysqli, "UPDATE account SET account_password = '$password_new' WHERE account_email = '$account_email'");
                        echo '<p style="color:green; text-align: center;">Mật khẩu đã được thay đổi</p>';
                    } else {
                        echo '<p style="color:red; text-align: center;">Mật khẩu cũ không đúng vui lòng nhập lại</p>';
                    }
                }
                ?>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password_old" required>
                    <label for="">Mật khẩu cũ</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password_new" required>
                    <label for="">Mật khẩu mới</label>
                </div>
                <button type="submit" name="password_change">Thay đổi</button>
            </form>
        </div>
    </div>
</section>
