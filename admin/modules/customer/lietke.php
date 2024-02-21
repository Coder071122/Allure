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

$sql_customer_list = "SELECT * FROM customer ORDER BY customer_id DESC LIMIT $begin,10";
$query_customer_list = mysqli_query($mysqli, $sql_customer_list);
?>
<div class="row">
    <div class="col">
        <div class="header__list d-flex space-between align-center">
            <h3 class="card-title" style="margin: 0;">Danh sách khách hàng</h3>
            <div class="action_group">
                <a href="modules/customer/export.php" class="button button-dark">Export</a>
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
                        <form class="search-form" action="#">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
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
                                <th>Tên khách hàng</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($query_customer_list)) {
                                $i++;
                            ?>
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $row['customer_id'] ?>">
                                    </td>
                                    <td><?php echo $row['customer_name'] ?></td>
                                    <td><?php echo format_gender($row['customer_gender']) ?></td>
                                    <td><?php echo $row['customer_email'] ?></td>
                                    <td><?php echo $row['customer_phone'] ?></td>
                                    <td><?php echo $row['customer_address'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination d-flex justify-center">
                    <?php

                    $sql_customer = "SELECT * FROM customer ORDER BY customer_id DESC";
                    $query_pages = mysqli_query($mysqli, $sql_customer);

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
                            <p class="color-t-red">Không có khách hàng nào !</p>
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
        <a href="#" class="button__control btn__wanning" id="btnDelete" onclick="return confirm('Bạn có thực sự muốn xóa thông tin khách hàng này không?')">Xóa</a>
    </div>
</div>
<script>
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

    console.log(checkboxes[0]);

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
        btnDelete.href = "modules/customer/xuly.php?delete=1&data=" + JSON.stringify(checkedIds);
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
    function showErrorToast() {
        toast({
            title: "Error",
            message: "Bạn không có quyền xóa thông tin này",
            type: "error",
            duration: 0,
        });
    }
</script>

<?php
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    echo '<script>';
    echo '   showSuccessToast();';
    echo '</script>';
} elseif (isset($_GET['message']) && $_GET['message'] == 'error') {
    echo '<script>';
    echo '   showErrorToast();';
    echo '</script>';
}
?>
<script>
    window.history.pushState(null, "", "index.php?action=customer&query=customer_list");
</script>