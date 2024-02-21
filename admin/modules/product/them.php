<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3 class="card-title">
            Thêm sản phẩm
        </h3>
        <a href="index.php?action=product&query=product_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<form method="POST" action="modules/product/xuly.php" id="form-product" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="input-item form-group">
                            <label for="product_name" class="d-block">Tên sản phẩm</label>
                            <input type="text" id="product_name" name="product_name" class="d-block form-control" value="" placeholder="product name" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="input-item form-group">
                            <label for="product_brand" class="d-block">Thương hiệu sản phẩm</label>
                            <select name="product_brand" id="product_brand" class="form-control select_brand">
                                <option value="0">Chưa xác định</option>
                                <?php
                                $sql_brand_list = "SELECT * FROM brand ORDER BY brand_id DESC";
                                $query_brand_list = mysqli_query($mysqli, $sql_brand_list);
                                while ($row_brand = mysqli_fetch_array($query_brand_list)) {
                                ?>
                                    <option value="<?php echo $row_brand['brand_id'] ?>"><?php echo $row_brand['brand_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-item form-group">
                            <label for="product_capacity" class="d-block">Dung tích sản phẩm</label>
                            <select name="product_capacity" id="product_capacity" class="form-control select_capacity">
                                <option value="0">Chưa xác định</option>
                                <?php
                                $sql_capacity_list = "SELECT * FROM capacity ORDER BY capacity_id ASC";
                                $query_capacity_list = mysqli_query($mysqli, $sql_capacity_list);
                                while ($row_capacity = mysqli_fetch_array($query_capacity_list)) {
                                ?>
                                    <option value="<?php echo $row_capacity['capacity_id'] ?>"><?php echo $row_capacity['capacity_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-item form-group">
                            <label for="product_price_import" class="d-block">Giá nhập vào sản phẩm</label>
                            <input class="d-block form-control" id="product_price_import" name="product_price_import" type="text" value="" placeholder="Nhập vào giá nhập hàng">
                            <span class="form-message"></span>
                        </div>
                        <div class="input-item form-group">
                            <label for="product_price" class="d-block">Giá bán ra sản phẩm</label>
                            <input class="d-block form-control" id="product_price" name="product_price" type="text" value="" placeholder="Nhập vào giá bán đề xuất" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="input-item form-group">
                            <label for="product_description" class="d-block">Mô tả sản phẩm</label>
                            <textarea id="product_description" name="product_description"></textarea>
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="main-pane-top">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="input-item form-group">
                            <label class="d-block" for="product_image">Image</label>
                            <div class="image-box w-100">
                                <figure class="image-container p-relative">
                                    <img id="chosen-image">
                                    <figcaption id="file-name"></figcaption>
                                </figure>
                                <input type="file" class="d-none" id="product_image" name="product_image" accept="image/*">
                                <label class="label-for-image" for="product_image">
                                    <i class="fas fa-upload"></i> &nbsp; Tải lên hình ảnh
                                </label>
                            </div>
                        </div>
                        <div class="input-item form-group">
                            <label for="product_sale" class="d-block">Sale (%)</label>
                            <input class="d-block form-control" id="product_sale" name="product_sale" type="number" value="" placeholder="product sale">
                            <span class="form-message"></span>
                        </div>
                        <div class="input-item form-group">
                            <label for="product_status" class="d-block">Trang thái</label>
                            <select name="product_status" id="product_status" class="form-control">
                                <option value="1">Bán ra sản phẩm</option>
                                <option value="0">Tạm dừng bán</option>
                            </select>
                        </div>
                        <div class="input-item form-group">
                            <label for="product_category" class="d-block">Danh mục sản phẩm</label>
                            <select name="product_category" id="product_category" class="form-control select_category">
                                <option value="0">Chưa phân loại</option>
                                <?php
                                $sql_category_list = "SELECT * FROM category ORDER BY category_id DESC";
                                $query_category_list = mysqli_query($mysqli, $sql_category_list);
                                while ($row_category = mysqli_fetch_array($query_category_list)) {
                                ?>
                                    <option value="<?php echo $row_category['category_id'] ?>"><?php echo $row_category['category_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100" style="text-align: left;">
        <button type="submit" name="product_add" class="btn btn-primary btn-icon-text">
            <i class="ti-file btn-icon-prepend"></i>
            Thêm
        </button>
    </div>
</form>

<script>
    $('.select_brand').chosen();
    $('.select_capacity').chosen();
    $('.select_category').chosen();
    CKEDITOR.replace('product_description');
</script>

<script>
    Validator({
        form: '#form-product',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#product_name', 'vui lòng nhập tên sản phẩm'),
            Validator.isRequired('#product_price', 'vui lòng nhập vào giá bán')
        ],
        onSubmit: function(data) {
            console.log(data);
        }
    })
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