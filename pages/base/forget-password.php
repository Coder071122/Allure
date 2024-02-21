<?php
if (isset($_POST['register'])) {
    $account_email = $_POST['account_email'];
    $account_password = md5($_POST['account_password']);

    $sql_getacc = "SELECT * FROM account WHERE account_email = '" . $account_email . "'";
    $query_getacc = mysqli_query($mysqli, $sql_getacc);
    $count = mysqli_num_rows($query_getacc);

    if ($count == 1) {
        $sql_forget = "UPDATE account SET account_password = '$account_password' WHERE  account_email = '$account_email'";
        $query_forget = mysqli_query($mysqli, $sql_forget);
        
        if ($query_forget) {
            echo '<script>alert("Lấy lại mật khẩu thành công");</script>';
            header('Location:index.php?page=login');
        }
    } else {
        echo '<script>alert("Email đã sử dụng vui lòng nhập lại email khác");</script>';
    }
}
?>
<script src="./assets/js/form_register.js"></script>
<section class="register pd-bottom">
    <div class="container">
        <div class="w-100 text-center p-relative">
            <div class="title">Lấy lại mật khẩu</div>
            <div class="title-line"></div>
        </div>
        <div class="content">
            <form class="register__form" action="" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input class="input-form" onchange="getInputChange();" type="email" name="account_email" placeholder="Nhập vào địa chỉ email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Mật khẩu</span>
                        <input class="input-form" onchange="getInputChange();" type="text" name="account_password" placeholder="Nhập vào mật khẩu" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Nhập lại mật khẩu</span>
                        <input class="input-form" onchange="getInputChange();" type="text" name="account_password_confirn" placeholder="Nhập lại mật khẩu" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="register" value="Đăng ký">
                </div>
            </form>
            <div class="w-100 text-center">
                <p class="h4">Đã có tài khoản <a class="text-login" href="index.php?page=login">Đăng nhập</a></p>
            </div>
        </div>
    </div>
</section>
