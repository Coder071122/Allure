<?php
//  unset($_SESSION['inventory']);
$inventory_code = rand(0, 9999);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3 class="card-title">
            Thông tin nhập kho
        </h3>
        <a href="index.php?action=inventory&query=inventory_list" class="btn btn-outline-dark btn-fw">
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
                    <form action="modules/inventory/thempnk.php" method="POST">
                        <div class="receipt">
                            <div class="receipt__header text-center">
                                <h3 class="receipt__title">Phiếu Nhập Kho</h3>
                                <p>Mã phiếu : <?php echo $inventory_code ?></p>
                                <p class="receipt__date">Ngày nhập: <?php echo date("d-m-Y"); ?></p>
                            </div>
                            <div class="receipt__info">
                                <table>
                                    <tr>
                                        <td>
                                            <p class="receipt__info--name">Người nhập kho: <input class="receipt__info--input" name="staf_name" type="text" placeholder="tên người nhập" required></p>
                                        </td>
                                        <td>
                                            <p class="receipt__info--company">Tên đơn vị cung cấp: <input class="receipt__info--input" name="supplier_name" type="text" placeholder="tên đơn vị cung cấp" required></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="receipt__info--note">Ghi chú: <input class="receipt__info--input" name="inventory_note" type="text" placeholder="Lý do nhập kho" required></p>
                                        </td>
                                        <td>
                                            <p class="receipt__info--company">Số điện thoại: <input class="receipt__info--input" name="inventory_phone" type="text" placeholder="nhập vào số điện thoại" required></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive receipt__table" style="margin-top: 20px;">
                                <table class="table table-hover table-action">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                #
                                            </th>
                                            <th>Tên sản phẩm</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-right">Đơn giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        if (isset($_SESSION['inventory'])) {
                                            $i = 0;
                                            foreach ($_SESSION['inventory'] as $inventory_item) {
                                                $i++;
                                                $total += $inventory_item['product_price_import'] * $inventory_item['product_quantity'];
                                        ?>
                                                <tr>
                                                    <td>
                                                        <a href="modules/inventory/xuly.php?delete=<?php echo $inventory_item['product_id'] ?>">
                                                            <div class="icon-edit">
                                                                <img class="w-100 h-100" src="images/icon-edit.png" alt="">
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php echo $i ?>
                                                    </td>
                                                    <td><?php echo $inventory_item['product_name'] ?></td>
                                                    <td class="text-center"><?php echo $inventory_item['product_quantity'] ?></td>
                                                    <td class="text-right"><?php echo number_format($inventory_item['product_price_import']) . '₫' ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    <p>Hiện không có sản phẩm nào</p>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="w-100 text-right">
                                <p>Tổng tiền: <?php echo number_format((float) $total) . '₫' ?></p>
                            </div>
                        </div>
                        <div class="w-100 d-flex align-center space-between">
                            <button type="submit" name="inventory_add" class="btn btn-primary btn-icon-text">
                                <i class="ti-file btn-icon-prepend"></i>
                                Tạo phiếu
                            </button>
                            <a href="modules/inventory/xuly.php?deleteall=1">Xóa tất cả</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <form action="modules/inventory/xuly.php" method="POST">
                        <div class="main-pane-top">
                            <h4 class="card-title">Sản phẩm nhập</h4>
                        </div>
                        <div class="input-item form-group">
                            <label for="productid" class="d-block">Sản phẩm</label>
                            <select name="product_id" id="productid" class="form-control select_product" required>
                                <?php
                                $sql_product_list = "SELECT * FROM product ORDER BY product_id DESC";
                                $query_product_list = mysqli_query($mysqli, $sql_product_list);
                                while ($row_product = mysqli_fetch_array($query_product_list)) {
                                ?>
                                    <option value="<?php echo $row_product['product_id'] ?>"><?php echo $row_product['product_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Số lượng nhập</label>
                            <input class="d-block form-control" name="product_quantity" type="number" value="" placeholder="Nhập vào số lượng" required>
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Giá nhập</label>
                            <input class="d-block form-control" name="product_price_import" type="text" value="" placeholder="Nhập vào giá sản phẩm" required>
                        </div>
                        <div class="w-100" style="text-align: left;">
                            <button type="submit" name="addtoinventory" class="btn btn-primary btn-icon-text">
                                <i class="ti-file btn-icon-prepend"></i>
                                Thêm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.select_product').chosen();
</script>

<script>
    function showSuccesToast() {
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
    echo '   showSuccesToast();';
    echo 'window.history.pushState(null, "", "index.php?action=inventory&query=inventory_add");';
    echo '</script>';
}
?>