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

if (isset($_GET['payment_type']) && $_GET['payment_type'] == 'momo') {
    $sql_payment_list = "SELECT * FROM momo ORDER BY momo_id DESC LIMIT $begin,10";
    $query_payment_list = mysqli_query($mysqli, $sql_payment_list);
} else {
    $sql_payment_list = "SELECT * FROM vnpay ORDER BY vnp_paydate DESC LIMIT $begin,10";
    $query_payment_list = mysqli_query($mysqli, $sql_payment_list);
}
?>
<div class="row">
    <div class="col">
        <div class="header__list d-flex space-between align-center">
            <h3 class="card-title" style="margin: 0;">Lịch sử thanh toán</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex space-between align-center" style="padding-inline: 20px;">
                    <div class="input__search p-relative">
                        <form class="search-form" action="?action=order&query=order_search" method="POST">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" name="order_search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                    <div class="dropdown dropdown__item">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cổng thanh toán
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                            <a class="dropdown-item" href="index.php?action=order&query=order_payment&payment_type=vnpay">VNPAY</a>
                            <a class="dropdown-item" href="index.php?action=order&query=order_payment&payment_type=momo">MoMo</a>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <?php
                    if (isset($_GET['payment_type']) && $_GET['payment_type'] == 'momo') {
                    ?>
                        <table class="table table-hover table-action">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <input type="checkbox" id="checkAll">
                                    </th>
                                    <th>Mã đơn hàng</th>
                                    <th>Thời gian</th>
                                    <th>Tổng tiền</th>
                                    <th>Thẻ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($row = mysqli_fetch_array($query_payment_list)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td>
                                            <a href="index.php?action=order&query=order_detail&order_code=<?php echo $row['order_code'] ?>">
                                                <div class="icon-edit">
                                                    <img class="w-100 h-100" src="images/icon-view.png" alt="">
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="checkbox" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $row['order_code'] ?>">
                                        </td>
                                        <td><?php echo $row['order_code'] ?></td>
                                        <td><?php echo $row['payment_date'] ?></td>
                                        <td><?php echo number_format($row['momo_amount']) ?>đ</td>
                                        <td><?php echo $row['pay_type'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } else {
                    ?>
                        <table class="table table-hover table-action">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <input type="checkbox" id="checkAll">
                                    </th>
                                    <th>Mã đơn hàng</th>
                                    <th>Thời gian</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngân hàng</th>
                                    <th>Loại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($row = mysqli_fetch_array($query_payment_list)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td>
                                            <a href="index.php?action=order&query=order_detail&order_code=<?php echo $row['order_code'] ?>">
                                                <div class="icon-edit">
                                                    <img class="w-100 h-100" src="images/icon-view.png" alt="">
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="checkbox" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $row['order_code'] ?>">
                                        </td>
                                        <td><?php echo $row['order_code'] ?></td>
                                        <td><?php echo format_datetime($row['vnp_paydate']) ?></td>
                                        <td><?php echo number_format($row['vnp_amount'] / 100) ?>đ</td>
                                        <td><?php echo $row['vnp_bankcode'] ?></td>
                                        <td><?php echo $row['vnp_cardtype'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                </div>
                <div class="pagination d-flex justify-center">
                    <?php
                    if (isset($_GET['payment_type']) && $_GET['payment_type']=='momo') {
                        $sql_pay_list = "SELECT * FROM momo ORDER BY momo_id DESC";
                    } else {
                        $sql_pay_list = "SELECT * FROM vnpay ORDER BY vnp_id DESC";
                    }
                    
                    $query_pages = mysqli_query($mysqli, $sql_pay_list);
                    $row_count = mysqli_num_rows($query_pages);
                    $totalpage = ceil($row_count / 10);
                    $currentLink = $_SERVER['REQUEST_URI'];
                    if ($totalpage > 1) {
                    ?>
                        <ul class="pagination__items d-flex align-center justify-center">
                            <?php
                            if ($page != 1) {
                            ?>
                                <li class="pagination__item">
                                    <a class="d-flex align-center" href="<?php echo $currentLink ?>&pagenumber=<?php echo $i + 1 ?>">
                                        <img src="images/arrow-left.svg" alt="">
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
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
                                    <a class="d-flex align-center" href="<?php echo $currentLink ?>&pagenumber=<?php echo $i ?>">
                                        <img src="images/icon-nextlink.svg" alt="">
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    <?php
                    } elseif ($totalpage == 0) {
                    ?>
                        <div class="w-100 text-center">
                            <p class="color-t-red">Không có đơn hàng nào cần xử lý !</p>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="dialog__control">
    <div class="control__box">
        <a href="modules/order/xuly.php?reverse=1" class="button__control" id="btnCancel">Hoàn tiền</a>
    </div>
</div>
<script>
    var btnConfirm = document.getElementById("btnConfirm");
    var btnCancel = document.getElementById("btnCancel");
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
        var checkedIds = [];
        for (var i = 0; i < checkeds.length; i++) {
            checkedIds.push(checkeds[i].id);
        }
        btnConfirm.href = "modules/order/xuly.php?confirm=1&data=" + JSON.stringify(checkedIds);
        btnCancel.href = "modules/order/xuly.php?payment='vnpay'reverse=1&data=" + JSON.stringify(checkedIds);
    }
</script>

<script>
    window.history.pushState(null, "", "index.php?action=order&query=order_payment");
</script>