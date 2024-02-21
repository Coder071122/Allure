<?php
$account_id = $_SESSION['account_id'];
$sql_account = "SELECT * FROM customer WHERE account_id = '" . $account_id . "'";
$query_account = mysqli_query($mysqli, $sql_account);
?>
<div class="my-account__content">
    <h2 class="my-account__title d-flex space-between h3">
        Sửa đổi thông tin tài khoản
    </h2>
    <form action="pages/handle/account-settings.php" method="POST">
        <div class="checkout__infomation">

            <?php
            while ($account = mysqli_fetch_array($query_account)) {
            ?>
                <div class="info__item d-flex">
                    <label class="info__title" for="">Tên khách hàng:</label>
                    <input class="info__content flex-1" name="customer_name" value="<?php echo $account['customer_name'] ?>">
                </div>
                <div class="info__item d-flex">
                    <label class="info__title" for="">Email:</label>
                    <input class="info__content flex-1" name="customer_email" value="<?php echo $account['customer_email'] ?>" disabled>
                </div>
                <div class="info__item d-flex">
                    <label class="info__title" for="">Số điện thoại:</label>
                    <input class="info__content flex-1" name="customer_phone" value="<?php echo $account['customer_phone'] ?>">
                </div>
                <div class="info__item d-flex">
                    <label class="info__title" for="">Địa chỉ:</label>
                    <input class="info__content flex-1" name="customer_address" value="<?php echo $account['customer_address'] ?>">
                </div>
                <div class="info__item d-flex">
                    <label class="info__title" for="">Giới tính:</label>
                    <div class="gender-details">
                        <input type="radio" name="customer_gender" value="0" id="dot-1" <?php if ($account['customer_gender'] == 0) {
                                                                                            echo "checked";
                                                                                        } ?>> <label for="dot-1">Không xác định</label>
                        <input type="radio" name="customer_gender" value="1" id="dot-2" <?php if ($account['customer_gender'] == 1) {
                                                                                            echo "checked";
                                                                                        } ?>> <label for="dot-2">Nam</label>
                        <input type="radio" name="customer_gender" value="2" id="dot-3" <?php if ($account['customer_gender'] == 2) {
                                                                                            echo "checked";
                                                                                        } ?>> <label for="dot-3">Nữ</label>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <button type="submit" name="info_change" class="btn btn__solid">Cập nhật tài khoản</button>
        <a href="index.php?page=password_change" class="btn btn__outline">Đổi mật khẩu</a>
    </form>
</div>