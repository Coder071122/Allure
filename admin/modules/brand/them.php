<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Thêm danh mục sản phẩm
        </h3>
        <a href="index.php?action=brand&query=brand_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <form method="POST" action="modules/brand/xuly.php" enctype="multipart/form-data">
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tên thương hiệu</label>
                            <input type="text" name="brand_name" class="d-block form-control" value="" placeholder="Nhập vào tên danh mục">
                        </div>
                        <button type="submit" name="brand_add" class="btn btn-primary btn-icon-text mg-t-16">
                            <i class="ti-file btn-icon-prepend"></i>
                            Thêm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>