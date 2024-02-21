<?php
$sql_article_edit = "SELECT * FROM article WHERE article_id = '$_GET[article_id]' LIMIT 1";
$query_article_edit = mysqli_query($mysqli, $sql_article_edit);

$sql_comment = "SELECT * FROM comment WHERE article_id = '$_GET[article_id]' ORDER BY comment_id DESC";
$query_comment = mysqli_query($mysqli, $sql_comment);

?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Sửa bài viết
        </h3>
        <a href="index.php?action=article&query=article_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<?php while ($row = mysqli_fetch_array($query_article_edit)) {
?>
    <form method="POST" action="modules/blog/xuly.php?article_id=<?php echo $row['article_id'] ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="input-item form-group">
                            <label for="author" class="d-block">Tên tác giả</label>
                            <input id=author type="text" name="article_author" class="d-block form-control" value="<?php echo $row['article_author'] ?>" placeholder="">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tiêu đề bài viết</label>
                            <input type="text" name="article_title" class="d-block form-control" value="<?php echo $row['article_title'] ?>" placeholder="">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Nội dung tóm tắt</label>
                            <textarea name="article_summary"><?php echo $row['article_summary'] ?></textarea>
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Nội dung chính bài viết</label>
                            <textarea name="article_content"><?php echo $row['article_content'] ?></textarea>
                        </div>

                        <button type="submit" name="article_edit" class="btn btn-primary btn-icon-text mg-t-16">
                            <i class="ti-file btn-icon-prepend"></i>
                            Lưu lại
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="over-flow-hidden">
                            <div class="main-pane-top">
                            </div>
                            <div class="input-item form-group">
                                <label for="article_status" class="d-block">Trang thái</label>
                                <select name="article_status" id="article_status" class="form-control">
                                    <option value="0" <?php if ($row['article_status'] == 0) {
                                                            echo "selected";
                                                        } ?>>Bản nháp</option>
                                    <option value="1" <?php if ($row['article_status'] == 1) {
                                                            echo "selected";
                                                        } ?>>Xuất bản</option>
                                </select>
                            </div>
                            <div class="input-item form-group">
                                <label for="image" class="">Image</label>
                                <img src="modules/blog/uploads/<?php echo $row['article_image'] ?>" class="article__image w-100 h-100" style="width: 100px; height: 100px;" alt="image">
                                <input type="file" name="article_image" value="<?php echo $row['article_image'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php
}
?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex space-between align-center">
                    <h4 class="card-title" style="margin: 0;">Danh sách bình luận</h4>
                    <div class="input__search p-relative">
                        <form class="search-form" action="#">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                </div>


                <div class="table-responsive" id="article_comment">
                    <table class="table table-hover table-action">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="checkAll">
                                </th>
                                <th>Ngày đăng</th>
                                <th>Người bình luận</th>
                                <th>Nội dung bình luận</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($comment = mysqli_fetch_array($query_comment)) {
                                $i++;
                            ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkbox" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $comment['comment_id'] ?>">
                                    </td>
                                    <td><?php echo $comment['comment_date'] ?></td>
                                    <td><?php echo $comment['comment_name'] ?></td>
                                    <td><?php echo $comment['comment_content'] ?></td>
                                    <td><?php echo format_comment_status($comment['comment_status']) ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dialog__control">
    <div class="control__box">
        <a href="#" class="button__control" id="btnAccept">Duyệt</a>
        <a href="#" class="button__control btn__wanning" id="btnDelete">Xóa</a>
    </div>
</div>
<script>
    CKEDITOR.replace('article_summary');
    CKEDITOR.replace('article_content');
    
    var btnAccept = document.getElementById("btnAccept");
    var btnDelete = document.getElementById("btnDelete");
    var checkAll = document.getElementById("checkAll");
    var checkboxes = document.getElementsByClassName("checkbox");
    var dialogControl = document.querySelector('.dialog__control');
    // Thêm sự kiện click cho checkbox checkAll
    checkAll.addEventListener("click", function() {
        // Nếu checkbox checkAll được chọn
        if (checkAll.checked) {
            // Đặt thuộc tính "checked" cho tất cả các checkbox còn lại
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        } else {
            // Bỏ thuộc tính "checked" cho tất cả các checkbox còn lại
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        }
        testChecked();
        getCheckedCheckboxes();
    });

    console.log(checkboxes[0]);

    function testChecked() {
        var count = 0;
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                count++;
                console.log(count);
            }
        }
        if (count > 0) {
            dialogControl.classList.add('active');
        } else {
            dialogControl.classList.remove('active');
            checkAll.checked = false;
        }
    }

    function getCheckedCheckboxes() {
        var checkeds = document.querySelectorAll('.checkbox:checked');
        var checkedComment = [];
        for (var i = 0; i < checkeds.length; i++) {
            checkedComment.push(checkeds[i].id);
        }
        btnAccept.href = "modules/blog/xuly.php?&article_id=<?php echo $_GET['article_id'] ?>&acceptcomment=1&data="+ JSON.stringify(checkedComment);
        btnDelete.href = "modules/blog/xuly.php?&article_id=<?php echo $_GET['article_id'] ?>&deletecomment=1&data="+ JSON.stringify(checkedComment);
    }
</script>