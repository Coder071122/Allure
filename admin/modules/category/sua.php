<?php
$sql_category_edit = "SELECT * FROM category WHERE category_id = '$_GET[category_id]' LIMIT 1";
$query_category_edit = mysqli_query($mysqli, $sql_category_edit);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Sửa danh mục sản phẩm
        </h3>
        <a href="index.php?action=category&query=category_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<?php
while ($item = mysqli_fetch_array($query_category_edit)) {
?>
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <form method="POST" action="modules/category/xuly.php?category_id=<?php echo $_GET['category_id'] ?>" enctype="multipart/form-data">

                            <div class="input-item form-group">
                                <label for="title" class="d-block">Tên danh mục</label>
                                <input type="text" name="category_name" class="form-control" value="<?php echo $item['category_name'] ?>" placeholder="collection name">
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Mô tả danh mục</label>
                                <textarea class="form-control" name="category_description" type="text" value="" placeholder="collection name" style="height: auto;"><?php echo $item['category_description'] ?></textarea>
                            </div>
                            <button type="submit" name="category_edit" class="btn btn-primary btn-icon-text">
                                <i class="ti-file btn-icon-prepend"></i>
                                Sửa
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="main-pane-top">
                            <div class="input-item form-group">
                                <label for="image" class="d-block">Image</label>
                                <div class="image-box w-100">
                                    <figure class="image-container p-relative">
                                        <img src="modules/category/uploads/<?php echo $item['category_image'] ?>" id="chosen-image">
                                        <figcaption id="file-name"></figcaption>
                                    </figure>
                                    <input type="file" class="d-none" id="category_image" name="category_image" accept="image/*">
                                    <label class="label-for-image" for="category_image">
                                        <i class="fas fa-upload"></i> &nbsp; Chọn hình ảnh
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<script>
    let uploadButton = document.getElementById("category_image");
    let chosenImage = document.getElementById("chosen-image");
    let fileName = document.getElementById("file-name");

    uploadButton.onchange = () => {
        let reader = new FileReader();
        reader.readAsDataURL(uploadButton.files[0]);
        reader.onload = () => {
            chosenImage.setAttribute("src", reader.result);
        }
        fileName.textContent = uploadButton.files[0].name;
    }
</script>