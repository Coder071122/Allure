<?php
//  unset($_SESSION['order']);
$order_code = rand(0, 9999);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3 class="card-title">
            Thông tin đơn hàng
        </h3>
        <a href="index.php?action=order&query=order_live" class="btn btn-outline-dark btn-fw">
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
                    <form action="modules/order/xuly.php" method="POST">
                        <div class="receipt">
                            <div class="receipt__header text-center">
                                <h3 class="receipt__title">Đơn hàng</h3>
                                <p>Mã đơn hàng: <?php echo $order_code ?></p>
                                <p class="receipt__date">Ngày lập: <?php echo date("d-m-Y"); ?></p>
                            </div>
                            <div class="receipt__info">
                                <table>
                                    <tr>
                                        <td>
                                            <p class="receipt__info--name">Tên khách hàng: <input class="receipt__info--input" name="customer_name" style="width: 250px" type="text" placeholder="Nhập vào tên khách hàng" required></p>
                                        </td>
                                        <td>
                                            <p class="receipt__info--company">Số điện thoại: <input class="receipt__info--input" name="customer_phone" type="text" placeholder="Nhập vào số điện thoại" required></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p class="receipt__info--note">Địa chỉ: <input class="receipt__info--input" style="width: 400px" name="customer_address" type="text" placeholder="Nhập vào địa chỉ khách hàng" required></p>
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
                                            <th class="text-center">Giảm giá</th>
                                            <th class="text-right">Đơn giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        if (isset($_SESSION['order'])) {
                                            $i = 0;
                                            foreach ($_SESSION['order'] as $order_item) {
                                                $i++;
                                                $total += $order_item['product_price'] * $order_item['product_quantity'];
                                        ?>
                                                <tr>
                                                    <td>
                                                        <a href="modules/order/xuly.php?delete=<?php echo $order_item['product_id'] ?>">
                                                            <div class="icon-edit">
                                                                <img class="w-100 h-100" src="images/icon-delete.png" alt="">
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php echo $i ?>
                                                    </td>
                                                    <td><?php echo $order_item['product_name'] ?></td>
                                                    <td class="text-center"><?php echo $order_item['product_quantity'] ?></td>
                                                    <td class="text-center"><?php echo $order_item['product_sale'] ?>%</td>
                                                    <td class="text-right"><?php echo number_format($order_item['product_price'] - ($order_item['product_price'] / 100 * $order_item['product_sale'])) . ' ₫' ?></td>
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
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
                            <button type="submit" name="order_add" class="btn btn-primary btn-icon-text">
                                <i class="ti-file btn-icon-prepend"></i>
                                Tạo đơn hàng
                            </button>
                            <a href="modules/order/xuly.php?deleteall=1">Xóa tất cả</a>
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
                    <form action="modules/order/xuly.php" method="POST">
                        <div class="main-pane-top">
                            <h4 class="card-title">Tên sản phẩm</h4>
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
                            <label for="">Còn lại <span id="quantityproduct">số lượng</span> sản phẩm</label>
                        </div>
                        <span class="tanhinh" id="quantity_value">1</span>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Số lượng</label>
                            <input class="d-block form-control" name="product_quantity" type="number" value="1" placeholder="Nhập vào số lượng" required>
                        </div>
                        <div class="w-100" style="text-align: left;">
                            <button type="submit" name="addtoorder" class="btn btn-primary btn-icon-text">
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
    var maxQuantity = parseInt($('#quantity_value').text());

    $('#productid').on('change', function() {
        var selectedValue = $(this).val();
        $('#quantity_value').text(selectedValue);
    });
    $('.select_product').chosen();
    $(document).ready(function() {
        $('.chosen-drop').click(function() {
            var btnValue = $('#quantity_value').text();
            // Gửi giá trị của button qua Ajax
            $.ajax({
                url: 'modules/order/truyvansoluong.php',
                method: 'POST',
                data: {
                    product_id: btnValue
                },
                success: function(response) {
                    console.log(response);
                    var str = response;
                    var parts = str.split(/"|"|:|}/);
                    var quantity = parseInt(parts[4]);
                    maxQuantity = quantity;
                    $('#quantityproduct').text(quantity);
                    // Xử lý kết quả trả về từ Ajax
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    // Xử lý lỗi nếu có
                }
            });
        });
        // Lấy giá trị số lượng ban đầu từ span
        $('input[name="product_quantity"]').on('input', function() {
            var selectedQuantity = parseInt($(this).val());

            if (selectedQuantity > maxQuantity) {
                $(this).val(maxQuantity);
                showErrorQuantityToast();
            } else if (selectedQuantity <= 0) {
                $(this).val(1);
            }
        });
    });
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

    function showErrorQuantityToast() {
        toast({
            title: "Error",
            message: "Số lượng sản phẩm không hợp lệ",
            type: "error",
            duration: 0,
        });
    }

    function showErrorToast() {
        toast({
            title: "Error",
            message: "Thêm sản phẩm không thành công",
            type: "error",
            duration: 0,
        });
    }
</script>

<?php
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    echo '<script>';
    echo 'showSuccessToast();';
    echo 'window.history.pushState(null, "", "index.php?action=order&query=order_add");';
    echo '</script>';
} elseif (isset($_GET['message']) && $_GET['message'] == 'error') {
    echo '<script>';
    echo 'showErrorToast();';
    echo 'window.history.pushState(null, "", "index.php?action=order&query=order_add");';
    echo '</script>';
}
?>