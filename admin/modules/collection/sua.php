<?php
$sql_collection_edit = "SELECT * FROM collection WHERE collection_id = '$_GET[collection_id]' LIMIT 1";
$query_collection_edit = mysqli_query($mysqli, $sql_collection_edit);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Sửa bộ sưu tập
        </h3>
        <a href="index.php?action=collection&query=collection_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="modules/collection/xuly.php?collection_id=<?php echo $_GET['collection_id'] ?>" enctype="multipart/form-data">
                    <?php
                    while ($item = mysqli_fetch_array($query_collection_edit)) {
                    ?>
                        <div class="input-item form-group">
                            <label for="collection_order" class="d-block">Thứ tự</label>
                            <input type="text" name="collection_order" class="form-control" value="<?php echo $item['collection_order'] ?>">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tên bộ sưu tập</label>
                            <input type="text" name="collection_name" class="form-control" value="<?php echo $item['collection_name'] ?>">
                        </div>
                        <div class="input-item form-group">
                            <label for="collection_type" class="d-block">Loại bộ sưu tập</label>
                            <select name="collection_type" id="collection_type" class="form-control">
                                <option value="1" <?php if($item['collection_type'] == 1 ) { echo "selected"; } ?>>Phân loại theo từ khóa</option>
                                <option value="0" <?php if($item['collection_type'] == 0 ) { echo "selected"; } ?>>Tùy chọn sản phẩm</option>
                            </select>
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Từ khóa phân loại</label>
                            <input type="text" name="collection_keyword" class="form-control" value="<?php echo $item['collection_keyword'] ?>">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Mô tả danh mục</label>
                            <textarea class="form-control" name="collection_description" style="height: auto;"><?php echo $item['collection_description'] ?></textarea>
                        </div>
                        <div class="input-item form-group">
                            <label for="image" class="d-block">Image</label>
                            <input type="file" name="collection_image" value="<?php echo $row['collection_image'] ?>">
                            <img src="modules/collection/uploads/<?php echo $item['collection_image'] ?>" class="collection_image" style="width: 100px; height: 100px;" alt="image">
                        </div>
                        <button type="submit" name="collection_edit" class="btn btn-primary btn-icon-text">
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