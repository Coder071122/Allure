<?php
    session_start();
    include('config/config.php');
    if (isset($_POST['login'])) {
        $account_email = $_POST['account_email'];
        $account_password = md5($_POST['account_password']);
        $account_email = mysqli_real_escape_string($mysqli, $account_email);
        $account_password = mysqli_real_escape_string($mysqli, $account_password);
        $sql_account = "SELECT * FROM account WHERE account_email='".$account_email."' AND account_password='".$account_password."' AND (account_type=1 OR account_type=2) ";
        $query_account = mysqli_query($mysqli, $sql_account);
        $row = mysqli_fetch_array($query_account);
        $count = mysqli_num_rows($query_account);
        if ($count>0) {
            $_SESSION['login'] = $row['account_email'];
            $_SESSION['account_id_admin'] = $row['account_id'];
            $_SESSION['account_name'] = $row['account_name'];
            $_SESSION['account_type'] = $row['account_type'];
            header('Location:index.php');
        }else {
            echo '<script>alert("Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại");</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/login.css">
  <title>Login Admin</title>
  <link rel="shortcut icon" href="../assets/images/icon/favicon.ico"/>
</head>
<body>
    <section class="login">
        <div class="form-box">
            <div class="form-value">
                <form action="" autocomplete="on" method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="account_email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="account_password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>
                      
                    </div>
                    <button type="submit" name="login">Log in</button>
                    <div class="register">
                        <p>Don't have a account <a href="#">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>