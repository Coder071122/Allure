<?php
$account_id = $_SESSION['account_id'];
$sql_account = "SELECT * FROM customer WHERE account_id = '" . $account_id . "'";
$query_account = mysqli_query($mysqli, $sql_account);
?>
<div id="toast_message"></div>
<div class="my-account__content">
    <h2 class="my-account__title d-flex space-between h3">
        Thông tin tài khoản<a href="index.php?page=my_account&tab=account_settings" class="btn">Thay đổi thông tin</a>
    </h2>
    <div class="checkout__infomation">
        <?php
        while ($account = mysqli_fetch_array($query_account)) {
        ?>
            <table class="w-100">
                <tr>
                    <td><label class="info__title" for="">Tên khách hàng:</label></td>
                    <td><span class="info__content flex-1"><?php echo $account['customer_name'] ?></span></td>
                </tr>
                <tr>
                    <td><label class="info__title" for="">Email:</label></td>
                    <td><span class="info__content flex-1"><?php echo $account['customer_email'] ?></span></td>
                </tr>
                <tr>
                    <td><label class="info__title" for="">Số điện thoại:</label></td>
                    <td><span class="info__content flex-1"><?php echo $account['customer_phone'] ?></span></td>
                </tr>
                <tr>
                    <td><label class="info__title" for="">Địa chỉ:</label></td>
                    <td><span class="info__content flex-1"><?php echo $account['customer_address'] ?></span></td>
                </tr>
                <tr>
                    <td><label class="info__title" for="">Giới tính:</label></td>
                    <td><span class="info__content flex-1"><?php echo format_gender($account['customer_gender']) ?></span></td>
                </tr>
            </table>
        <?php
        }
        ?>
    </div>
</div>
<script>
    function loginAcceptMessage() {
        toast({
            title: "Success",
            message: "Đăng nhập thành công",
            type: "success",
            duration: 3000,
        });
    }
</script>
<?php
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    echo '<script>';
    echo 'loginAcceptMessage();';
    echo 'window.history.pushState(null, "", "index.php?page=my_account&tab=account_info");';
    echo '</script>';
}
?>