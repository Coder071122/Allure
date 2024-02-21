<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Thêm danh mục sản phẩm
        </h3>
        <a href="index.php?action=collection&query=collection_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="modules/collection/xuly.php" enctype="multipart/form-data">
                    <div class="input-item form-group">
                        <label for="collection_order" class="d-block">Thứ tự</label>
                        <input type="number" name="collection_order" class="d-block form-control" value="0" placeholder="Nhập vào từ khóa">
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Tên bộ sưu tập</label>
                        <input type="text" name="collection_name" class="d-block form-control" value="" placeholder="Nhập vào tên bộ sưu tập">
                    </div>
                    <div class="input-item form-group">
                        <label for="collection_type" class="d-block">Loại bộ sưu tập</label>
                        <select name="collection_type" id="collection_type" class="form-control">
                            <option value="1">Phân loại theo từ khóa</option>
                            <option value="0">Tùy chọn sản phẩm</option>
                        </select>
                    </div>
                    <div class="input-item form-group">
                        <label for="collection_keyword" class="d-block">Từ khóa phân loại</label>
                        <input type="text" name="collection_keyword" class="d-block form-control" value="" placeholder="Nhập vào từ khóa">
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Mô tả danh mục</label>
                        <textarea class="d-block form-control" style="height: auto;" name="collection_description" type="text" value=""></textarea>
                    </div>
                    <div class="input-item form-group">
                        <label for="image" class="d-block">Image</label>
                        <input type="file" class="" name="collection_image">
                    </div>
                    <button type="submit" name="collection_add" class="btn btn-primary btn-icon-text mg-t-16">
                        <i class="ti-file btn-icon-prepend"></i>
                        Thêm
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top">
                    <h4 class="card-title">Sản phẩm theo danh mục</h4>
                    <h6></h6>
                </div>

            </div>
        </div>
    </div>
</div>