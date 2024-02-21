<?php
$sql_account_edit = "SELECT * FROM account JOIN customer ON account.account_id = customer.account_id WHERE account.account_id = '" . $_SESSION['account_id_admin'] . "' LIMIT 1";
$query_account_edit = mysqli_query($mysqli, $sql_account_edit);
?>

<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Thông tin tài khoản
        </h3>
        <a href="index.php?action=account&query=account_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <?php
                    while ($row = mysqli_fetch_array($query_account_edit)) {
                    ?>
                        <form method="POST" action="modules/account/xuly.php?account_id=<?php echo $_SESSION['account_id_admin'] ?>">
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Tên người dùng</label>
                                <input type="text" name="account_name" class="form-control" value="<?php echo $row['account_name'] ?>">
                            </div>
                            <div class="input-item form-group">
                                <label for="account_email" class="d-block">Email đăng nhập</label>
                                <input type="text" name="account_email" id="account_email" class="form-control" value="<?php echo $row['account_email'] ?>" readonly>
                            </div>
                            <div class="input-item form-group">
                                <label for="account_phone" class="d-block">Số điện thoại</label>
                                <input type="text" name="account_phone" id="account_phone" class="form-control" value="<?php echo $row['account_phone'] ?>">
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Địa chỉ</label>
                                <textarea class="form-control" name="account_address" type="text" value="" style="height: auto;"><?php echo $row['customer_address'] ?></textarea>
                            </div>
                            <div class="input-item form-group">
                                <label class="" for="">Giới tính:</label>
                                <div class="gender-details">
                                    <input type="radio" class="cursor-pointer" name="customer_gender" value="0" id="dot-1" <?php if ($row['customer_gender'] == 0) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>> <label class="info__title cursor-pointer" for="dot-1">Không xác định</label>
                                    <input type="radio" class="cursor-pointer" name="customer_gender" value="1" id="dot-2" <?php if ($row['customer_gender'] == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>> <label class="info__title cursor-pointer" for="dot-2">Nam</label>
                                    <input type="radio" class="cursor-pointer" name="customer_gender" value="2" id="dot-3" <?php if ($row['customer_gender'] == 2) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>> <label class="info__title cursor-pointer" for="dot-3">Nữ</label>
                                </div>
                            </div>
                            <button type="submit" name="account_edit" class="btn btn-primary btn-icon-text" style="margin-right: 10px">
                                <i class="ti-file btn-icon-prepend"></i>
                                Lưu
                            </button>
                            <a href="index.php?action=account&query=password_change" class="btn btn-primary btn-icon-text">
                                <i class="ti-file btn-icon-prepend"></i>
                                Đổi mật khẩu
                            </a>

                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showErrorToast() {
        toast({
            title: "Success",
            message: "Cập nhật thành công",
            type: "success",
            duration: 0,
        });
    }
</script>

<?php
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    $message = $_GET['message'];
    echo '<script>';
    echo '   showErrorToast();';
    echo 'window.history.pushState(null, "", "index.php?action=account&query=my_account");';
    echo '</script>';
}
?>