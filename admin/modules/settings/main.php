<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3 class="card-title">
            Cài đặt chung
        </h3>
    </div>
</div>
<form method="POST" action="modules/product/xuly.php" id="form-product" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-content" style="min-height: 300px;">
                        <label for="image" class="d-block">Thông báo:</label>
                        <div class="input-item form-group">
                            <select name="thongbao" id="">
                                <option value="1">Bật thông báo</option>
                                <option value="2">Tắt thông báo</option>
                            </select>
                        </div>
                        <label for="image" class="">Hình ảnh Banner</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-item form-group">
                                    <label for="image" class="">Image</label>
                                    <div class="image-box w-100">
                                        <figure class="image-container p-relative">
                                            <img id="chosen-image">
                                            <figcaption id="file-name"></figcaption>
                                        </figure>
                                        <input type="file" class="d-none" id="product_image" name="product_image" accept="image/*">
                                        <label class="label-for-image" for="product_image">
                                            <i class="fas fa-upload"></i> &nbsp; Chọn hình ảnh
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-item form-group">
                                    <div class="image-box w-100">
                                        <figure class="image-container p-relative">
                                            <img src="" id="chosen-image2">
                                            <figcaption id="file-name2"></figcaption>
                                        </figure>
                                        <input type="file" class="d-none" id="imagebanner2" name="imagebanner2" accept="image/*">
                                        <label class="label-for-image" for="imagebanner2">
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
    </div>
    <div class="w-100" style="text-align: left;">
        <button type="submit" name="product_add" class="btn btn-primary btn-icon-text">
            <i class="ti-file btn-icon-prepend"></i>
            Lưu cài đặt
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

<script>
    let uploadButton1 = document.getElementById("imagebanner1");
    let chosenImage1 = document.getElementById("chosen-image1");
    let fileName1 = document.getElementById("file-name1");

    uploadButton1.onchange = () => {
        let reader = new FileReader();
        reader.readAsDataURL(uploadButton.files[0]);
        reader.onload = () => {
            chosenImage1.setAttribute("src", reader.result);
        }
        fileName1.textContent = uploadButton.files[0].name;
    }

    let uploadButton2 = document.getElementById("imagebanner2");
    let chosenImage2 = document.getElementById("chosen-image2");
    let fileName2 = document.getElementById("file-name2");

    uploadButton2.onchange = () => {
        let reader = new FileReader();
        reader.readAsDataURL(uploadButton.files[0]);
        reader.onload = () => {
            chosenImage2.setAttribute("src", reader.result);
        }
        fileName2.textContent = uploadButton2.files[0].name;
    }
</script>