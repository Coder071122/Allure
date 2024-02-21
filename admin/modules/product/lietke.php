<?php
if (isset($_GET['pagenumber'])) {
    $page = $_GET['pagenumber'];
} else {
    $page = '1';
}


if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 10) - 10;
}

$sql_product_list = "SELECT * FROM product ORDER BY product_id DESC LIMIT $begin,10";
$query_product_list = mysqli_query($mysqli, $sql_product_list);
?>
<div class="dialog__import">
    <div class="import-container p-absolute">
        <div class="import__header d-flex space-between align-center">
            <h3 class="card-title">Chọn file import</h3>
            <span class="icon-close cursor-pointer" id="btnClose"></span>
        </div>
        <div class="import__content">
            <form action="modules/product/import.php" method="POST" enctype="multipart/form-data">
                <input class="import__input" type="file" name="file_import" accept=".xlsx">
                <br>
                <div class="w-100 text-right">
                    <button class="button button-light" id="btnCancel" type="button">Hủy</button>
                    <button type="submit" name="import_product" class="button button-dark">Tải lên</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="header__list d-flex space-between align-center">
            <h3 class="card-title" style="margin: 0;">Danh sách sản phẩm</h3>
            <div class="action_group">
                <a href="modules/product/export.php" class="button button-light">Export</a>
                <button class="button button-light" id="btnImport">Import</button>

                <a href="?action=product&query=product_add" class="button button-dark">Thêm sản phẩm</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex space-between align-center justify-center">
                    <div class="input__search p-relative">
                        <form class="search-form" action="?action=product&query=product_search" method="POST">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" title="Nhập vào tên sản phẩm để tìm kiếm" name="product_search" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover table-action">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="checkbox" id="checkAll" title="Chọn tất cả">
                                </th>
                                <th></th>
                                <th>Tên sản phẩm</th>
                                <th>Đánh giá</th>
                                <th>Tình trạng</th>
                                <th>Giá bán sản phẩm</th>
                                <th>Sale</th>
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
                                            <div class="icon-edit" title="Sửa sản phẩm">
                                                <img class="w-100 h-100" src="images/icon-edit.png" alt="">
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" title="Chọn sản phẩm" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $row['product_id'] ?>">
                                    </td>
                                    <td><img src="modules/product/uploads/<?php echo $row['product_image'] ?>" class="product_image" alt="image"></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td>
                                        <span class="review-star-list d-flex">
                                            <?php
                                            $query_evaluate_rating = mysqli_query($mysqli, "SELECT * FROM evaluate WHERE product_id='" . $row['product_id'] . "' AND evaluate_status = 1");

                                            $rate1 = 0;
                                            $rate2 = 0;
                                            $rate3 = 0;
                                            $rate4 = 0;
                                            $rate5 = 0;

                                            while ($evaluate_rating = mysqli_fetch_array($query_evaluate_rating)) {
                                                $rate = $evaluate_rating['evaluate_rate'];

                                                if ($rate == 1) {
                                                    $rate1++;
                                                } elseif ($rate == 2) {
                                                    $rate2++;
                                                } elseif ($rate == 3) {
                                                    $rate3++;
                                                } elseif ($rate == 4) {
                                                    $rate4++;
                                                } elseif ($rate == 5) {
                                                    $rate5++;
                                                }
                                            }

                                            $total_rate = $rate1 + $rate2 + $rate3 + $rate4 + $rate5;
                                            if ($total_rate != 0) {
                                                $rate_avg =  ($rate1 * 1 + $rate2 * 2 + $rate3 * 3 + $rate4 * 4 + $rate5 * 5) / $total_rate;
                                                $rate_avg = round($rate_avg, 1);
                                            } else {
                                                $rate_avg = 0;
                                            }

                                            for ($i = 0; $i < 5; $i++) {
                                                if ($i < $rate_avg) {
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
                                    <td>
                                        <?php if ($row['product_status'] == 1) {
                                        ?>
                                            <div class="product__status product__status--active">
                                                <span class="show-status">Đang bán</span>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="product__status product__status--pause">
                                                <span class="show-status">Dừng bán</span>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="<?php if ($row['product_price'] < $row['product_price_import']) {
                                                    echo "text-danger";
                                                } ?>"><?php echo number_format($row['product_price']) . ' ₫' ?></td>
                                    <td><?php echo $row['product_sale'] ?>%</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination d-flex justify-center">
                    <?php
                    if (isset($_GET['category_id'])) {
                        $query_pages = mysqli_query($mysqli, "SELECT * FROM product JOIN category ON product.product_category = category.category_id WHERE product_category = '" . $_GET['category_id'] . "' ORDER BY product_id DESC");
                    } else {
                        $query_pages = mysqli_query($mysqli, "SELECT * FROM product ORDER BY product_id DESC");
                    }
                    $row_count = mysqli_num_rows($query_pages);
                    $totalpage = ceil($row_count / 10);
                    $currentLink = $_SERVER['REQUEST_URI'];
                    ?>
                    <ul class="pagination__items d-flex align-center justify-center">
                        <?php if ($page != 1) {
                        ?>
                            <li class="pagination__item">
                                <a class="d-flex align-center" href="<?php echo $currentLink ?>&pagenumber=<?php echo $i - 1 ?>">
                                    <img src="images/arrow-left.svg" alt="">
                                </a>
                            </li>
                        <?php
                        } ?>

                        <?php

                        for ($i = 1; $i <= $totalpage; $i++) {
                        ?>
                            <li class="pagination__item">
                                <a class="pagination__anchor <?php if ($page == $i) {
                                                                    echo "active";
                                                                } ?>" href="<?php echo $currentLink ?>&pagenumber=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($page != $totalpage) {
                        ?>
                            <li class="pagination__item">
                                <a class="d-flex align-center" href="<?php echo $currentLink ?>&pagenumber=<?php echo $i + 1 ?>">
                                    <img src="images/icon-nextlink.svg" alt="">
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="dialog__control">
    <div class="control__box">
        <a href="#" class="button__control C" onclick="return confirm('Bạn có thực sự muốn xóa sản phẩm này không?')" id="btnDelete">Xóa</a>
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
    var dialogImport = document.querySelector('.dialog__import');
    var btnImport = document.querySelector('#btnImport');
    var btnCancel = document.querySelector('#btnCancel');
    var btnClose = document.querySelector('#btnClose');

    btnImport.addEventListener('click', function() {
        dialogImport.classList.add('open');
    });

    btnClose.addEventListener('click', function() {
        dialogImport.classList.remove('open');
    });

    btnCancel.addEventListener('click', function() {
        dialogImport.classList.remove('open');
    });
</script>

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
    echo '</script>';
}
?>
<script>
    window.history.pushState(null, "", "index.php?action=product&query=product_list");
</script>