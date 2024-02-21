<?php
$sql_product_edit = "SELECT * FROM product WHERE product_id = '$_GET[product_id]' LIMIT 1";
$query_product_edit = mysqli_query($mysqli, $sql_product_edit);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3 class="card-title">
            Sửa sản phẩm
        </h3>
        <a href="index.php?action=product&query=product_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<?php while ($row = mysqli_fetch_array($query_product_edit)) {
?>
    <form method="POST" action="modules/product/xuly.php?product_id=<?php echo $row['product_id'] ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="d-block form-control" value="<?php echo $row['product_name'] ?>" placeholder="product name">
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Thương hiệu sản phẩm</label>
                                <select name="product_brand" id="product_brand" class="form-control select_brand">
                                    <option value="0">Chưa xác định</option>
                                    <?php
                                    $sql_brand_list = "SELECT * FROM brand ORDER BY brand_id DESC";
                                    $query_brand_list = mysqli_query($mysqli, $sql_brand_list);
                                    while ($row_brand = mysqli_fetch_array($query_brand_list)) {
                                        if ($row['product_brand'] == $row_brand['brand_id']) {
                                    ?>
                                            <option value="<?php echo $row_brand['brand_id'] ?>" selected><?php echo $row_brand['brand_name'] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?php echo $row_brand['brand_id'] ?>"><?php echo $row_brand['brand_name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Dung tích sản phẩm</label>
                                <select name="product_capacity" id="product_capacity" class="form-control select_capacity">
                                    <option value="0">Chưa xác định</option>
                                    <?php
                                    $sql_capacity_list = "SELECT * FROM capacity ORDER BY capacity_id ASC";
                                    $query_capacity_list = mysqli_query($mysqli, $sql_capacity_list);
                                    while ($row_capacity = mysqli_fetch_array($query_capacity_list)) {
                                        if ($row['capacity_id'] == $row_capacity['capacity_id']) {
                                    ?>
                                            <option value="<?php echo $row_capacity['capacity_id'] ?>" selected><?php echo $row_capacity['capacity_name'] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?php echo $row_capacity['capacity_id'] ?>"><?php echo $row_capacity['capacity_name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Giá nhập vào sản phẩm</label>
                                <input class="d-block form-control" name="product_price_import" type="text" value="<?php echo $row['product_price_import'] ?>" placeholder="product price inport">
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Giá bán ra sản phẩm</label>
                                <input class="d-block form-control" name="product_price" type="text" value="<?php echo $row['product_price'] ?>" placeholder="product price">
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Sale (%)</label>
                                <input class="d-block form-control" name="product_sale" type="number" value="<?php echo $row['product_sale'] ?>" placeholder="product sale">
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Mô tả danh mục</label>
                                <textarea name="product_description"><?php echo $row['product_description'] ?></textarea>
                            </div>
                            <div class="w-100" style="float: right;">
                                <button type="submit" name="product_edit" class="btn btn-primary btn-icon-text">
                                    <i class="ti-file btn-icon-prepend"></i>
                                    Sửa
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <div class="input-item form-group">
                                <label for="image" class="">Image</label>
                                <div class="image-box w-100">
                                    <figure class="image-container p-relative">
                                        <img src="modules/product/uploads/<?php echo $row['product_image'] ?>" id="chosen-image">
                                        <figcaption id="file-name"></figcaption>
                                    </figure>
                                    <input type="file" class="d-none" id="product_image" name="product_image" accept="image/*">
                                    <label class="label-for-image" for="product_image">
                                        <i class="fas fa-upload"></i> &nbsp; Chọn hình ảnh
                                    </label>
                                </div>
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Trạng thái</label>
                                <select name="product_status" id="product_status" class="form-control">
                                    <option value="1" <?php if ($row['product_status'] == 1) {
                                                            echo "selected";
                                                        } ?>>Bán ra sản phẩm</option>
                                    <option value="0" <?php if ($row['product_status'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tạm dừng bán</option>
                                </select>
                            </div>
                            <div class="input-item form-group">
                                <label for="title" class="d-block">Danh mục sản phẩm</label>
                                <select name="product_category" id="product_category" class="form-control select_category">
                                    <option value="0">Chưa phân loại</option>
                                    <?php
                                    $sql_category_list = "SELECT * FROM category ORDER BY category_id DESC";
                                    $query_category_list = mysqli_query($mysqli, $sql_category_list);
                                    while ($row_category = mysqli_fetch_array($query_category_list)) {
                                        if ($row['category_id'] == $row_category['category_id']) {
                                    ?>
                                            <option value="<?php echo $row_category['category_id'] ?>" selected><?php echo $row_category['category_name'] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?php echo $row_category['category_id'] ?>"><?php echo $row_category['category_name'] ?></option>

                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
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
                <div class="main-pane-top d-flex space-between align-center" style="padding-inline: 20px;">
                    <h4 class="card-title" style="margin: 0;">Đánh giá về sản phẩm</h4>
                    <div class="input__search p-relative">
                        <form class="search-form" action="#">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                </div>


                <div class="table-responsive" id="product_evaluate">
                    <table class="table table-hover table-action">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="checkbox" id="checkAll" title="Chọn tất cả">
                                </th>
                                <th>Tên khách hàng</th>
                                <th>Mức đánh giá</th>
                                <th>Nội dung</th>
                                <th>Ngày đánh giá</th>
                                <th>Loại</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_evaluate = "SELECT * FROM evaluate WHERE product_id = '$_GET[product_id]' ORDER BY evaluate_id DESC";
                            $query_evaluate = mysqli_query($mysqli, $sql_evaluate);
                            $i = 0;
                            while ($evaluate = mysqli_fetch_array($query_evaluate)) {
                                $i++;
                            ?>
                                <tr>
                                    <td>#<?php echo $i ?></td>
                                    <td>
                                        <input type="checkbox" class="checkbox" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $evaluate['evaluate_id'] ?>">
                                    </td>
                                    <td><?php echo $evaluate['account_name'] ?></td>
                                    <td>
                                        <span class="review-star-list d-flex">
                                            <?php
                                            for ($i = 0; $i < 5; $i++) {
                                                if ($i < $evaluate['evaluate_rate']) {
                                            ?>
                                                    <div class="rating-star"></div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="rating-star rating-off"></div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td><?php echo $evaluate['evaluate_content'] ?></td>
                                    <td class=""><?php echo $evaluate['evaluate_date'] ?></td>
                                    <td class=""><span class="<?php echo format_evaluate_style($evaluate['evaluate_status']) ?>"><?php echo format_evaluate_status($evaluate['evaluate_status']) ?></span></td>
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
        <a href="#" class="button__control btn__wanning" id="btnSpam">SPAM</a>
        <a href="#" class="button__control btn__wanning" id="btnDelete">Xóa</a>
    </div>
</div>

<script>
    var btnSpam = document.getElementById("btnSpam");
    var btnDelete = document.getElementById("btnDelete");
    var checkAll = document.getElementById("checkAll");
    var checkboxes = document.getElementsByClassName("checkbox");
    var dialogControl = document.querySelector('.dialog__control');
    // Thêm sự kiện click cho checkbox checkAll
    checkAll.addEventListener("click", function() {
        console.log('test');
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

    function testChecked() {
        console.log('demo');
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
        btnSpam.href = "modules/product/xuly.php?&product_id=<?php echo $_GET['product_id'] ?>&spamevaluate=1&data=" + JSON.stringify(checkedComment);
        btnDelete.href = "modules/product/xuly.php?&product_id=<?php echo $_GET['product_id'] ?>&deleteevaluate=1&data=" + JSON.stringify(checkedComment);
    }
</script>

<script>
    function showSuccessToast() {
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
    echo $message;
    echo '<script>';
    echo '   showSuccessToast();';
    echo 'window.history.pushState(null, "", "index.php?action=product&query=product_edit&product_id=' . $_GET['product_id'] . '");';
    echo '</script>';
}
?>

<script>
    $('.select_brand').chosen();
    $('.select_capacity').chosen();
    $('.select_category').chosen();
    CKEDITOR.replace('product_description');
</script>

<script>
    let uploadButton = document.getElementById("product_image");
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