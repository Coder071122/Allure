<?php
$sql_account_edit = "SELECT * FROM account WHERE account_id = '$_GET[account_id]' LIMIT 1";
$query_account_edit = mysqli_query($mysqli, $sql_account_edit);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3 class="card-title">
            Sửa đổi thông tin tài khoản
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
                    <form method="POST" action="modules/account/xuly.php?account_id=<?php echo $_GET['account_id'] ?>">
                        <?php
                        while ($item = mysqli_fetch_array($query_account_edit)) {
                        ?>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Tên tài khoản</label>
                                <input type="text" name="account_name" class="form-control" value="<?php echo $item['account_name'] ?>" disabled>
                            </div>
                            <div class="input-item form-group">
                                <label for="email" class="d-block">Email</label>
                                <input type="text" name="account_email" id="email" class="form-control" value="<?php echo $item['account_email'] ?>" disabled>
                            </div>
                            <div class="input-item form-group">
                                <label for="phone" class="d-block">Số điện thoại</label>
                                <input type="text" name="account_phone" id="phone" class="form-control" value="<?php echo $item['account_phone'] ?>" disabled>
                            </div>
                            <div class="input-item form-group">
                                <label for="account_type" class="d-block">Quyền hạn</label>
                                <select name="account_type" id="account_type" class="form-control">
                                    <option value="0" <?php if ($item['account_type'] == 0) {
                                                            echo "selected";
                                                        } ?>>Khách hàng</option>
                                    <option value="1" <?php if ($item['account_type'] == 1) {
                                                            echo "selected";
                                                        } ?>>Nhân viên</option>
                                    <option value="2" <?php if ($item['account_type'] == 2) {
                                                            echo "selected";
                                                        } ?>>Quản trị viên</option>
                                </select>
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Tình trạng</label>
                                <select name="account_status" id="account_status" class="form-control">
                                    <option value="0" <?php if ($item['account_status'] == 0) {
                                                            echo "selected";
                                                        } ?>>Đang hoạt động</option>
                                    <option value="-1" <?php if ($item['account_status'] == -1) {
                                                            echo "selected";
                                                        } ?>>Tạm khóa</option>
                                </select>
                            </div>
                            <button type="submit" name="account_change" class="btn btn-primary btn-icon-text">
                                <i class="ti-file btn-icon-prepend"></i>
                                Sửa
                            </button>
                        <?php
                        }
                        ?>
                    </form>
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