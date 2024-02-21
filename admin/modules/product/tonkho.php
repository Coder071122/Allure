<?php
$sql_product_list = "SELECT * FROM product JOIN category ON product.product_category = category.category_id ORDER BY product.product_quantity ASC;";
$query_product_list = mysqli_query($mysqli, $sql_product_list);
?>
<div class="row">
    <div class="col">
        <div class="header__list d-flex space-between align-center">
            <h4 class="card-title" style="margin: 0;">Danh sách sản phẩm tồn kho</h4>
            <div class="action_group">
                <a href="#" class="button button-light">Export</a>
                <button class="button button-light">Import</button>
                
                <a href="?action=inventory&query=inventory_list" class="button button-dark">Nhập thêm</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex justify-center align-center">
                    <div class="input__search p-relative">
                        <form class="search-form" action="?action=product&query=product_search" method="POST">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" name="product_search" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover table-action">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="checkbox" id="checkAll">
                                </th>
                                <th></th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng tồn</th>
                                <th>Giá bán</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($query_product_list)) {
                                $i++;
                            ?>
                                <tr>
                                    <td>
                                        <a href="?action=product&query=product_edit&product_id=<?php echo $row['product_id'] ?>">
                                            <div class="icon-edit">
                                                <img class="w-100 h-100" src="images/icon-edit.png" alt="">
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $row['product_id'] ?>">
                                    </td>
                                    <td><img src="modules/product/uploads/<?php echo $row['product_image'] ?>" class="product_image" alt="image"></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td class="<?php echo format_quantity_style($row['product_quantity']) ?>"><?php echo $row['product_quantity'] ?></td>
                                    <td><?php echo number_format($row['product_price']) . ' ₫' ?></td>
                                    <td>
                                        <?php if ($row['product_status'] == 1) {
                                        ?>
                                            <div class="product__status product__status--active">
                                                <span class="show-status">Active</span>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="product__status product__status--pause">
                                                <span class="show-status">Pause</span>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </td>
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
        <a href="#" class="button__control btn__wanning" onclick="return confirm('Bạn có thực sự muốn xóa sản phẩm này không?')" id="btnDelete">Xóa</a>
        <button class="button__control btn_change" id="btnSale">Giảm giá</button>
    </div>
</div>
<div class="dialog__input">
    <div class="dialog__container">
        <div class="dialog__header d-flex align-center space-between">
            <h6>Thiết lập giảm giá cho sản phẩm</h6>
            <div class="close__btn d-flex align-center justify-center">
                <i class="icon-close"></i>
            </div>
        </div>
        <div class="input__box form-group">
            <label class="d-block" for="input_sale">Giảm giá (%)</label>
            <input class="form-control" type="number" id="input_sale" placeholder="Giảm giá theo phần trăm">
            <div class="w-100 btn__sale"><a href="#" id="sale_btn" class="btn btn-outline-dark btn-fw" onclick="return confirm('Xác nhận giảm giá cho các sản phẩm?')">Giảm giá</a></div>
        </div>
    </div>
</div>
<script>
    var url;
    var dialogInput = document.querySelector(".dialog__input");
    var btnSale = document.getElementById("btnSale");
    var saleBtn = document.querySelector('#sale_btn')
    var btnClose = document.querySelector(".close__btn");
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

    function testChecked() {
        var count = 0;
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                count++;
            }
        }
        if (count > 0) {
            dialogControl.classList.add('active');
        } else {
            dialogControl.classList.remove('active');
            checkAll.checked = false;
        }
    }

    btnSale.addEventListener('click', function() {
        dialogInput.classList.add("open");
    })

    btnClose.addEventListener('click', function() {
        dialogInput.classList.remove("open");
    })

    var linklist = '';

    function getCheckedCheckboxes() {
        var checkeds = document.querySelectorAll('.checkbox:checked');
        var checkedIds = [];
        for (var i = 0; i < checkeds.length; i++) {
            checkedIds.push(checkeds[i].id);
        }
        linklist = "modules/product/xuly.php?data=" + JSON.stringify(checkedIds);
        btnDelete.href = "modules/product/xuly.php?data=" + JSON.stringify(checkedIds);
    }
    // truyền giá trị sale vào thẻ a
    var inputSale = document.querySelector('#input_sale');
    inputSale.addEventListener("input", function() {
        saleBtn.href = linklist + "&product_sale=" + inputSale.value;
    })
</script>