<?php
$order_code = $_GET['order_code'];
$sql_order_detail_list = "SELECT od.order_detail_id, p.product_id, p.product_name, od.product_quantity, od.product_price, od.product_sale, p.product_image FROM order_detail od JOIN product p ON od.product_id = p.product_id WHERE od.order_code = '" . $order_code . "' ORDER BY od.order_detail_id DESC";
$query_order_detail_list = mysqli_query($mysqli, $sql_order_detail_list);

//Lay ra thong tin don hang
$sql_order = "SELECT * FROM orders JOIN delivery ON orders.delivery_id = delivery.delivery_id WHERE orders.order_code = '" . $order_code . "' ORDER BY orders.order_id DESC";
$query_order = mysqli_query($mysqli, $sql_order);
$order = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM orders WHERE  order_code = '" . $order_code . "'"));
?>
<section class="checkout pd-section">
    <div class="container">
        <div class="row">
            <div class="col" style="--w-md:8;">
                <h2 class="checkout__title h4 d-flex align-center space-between">Thông tin khách hàng</h2>
                <div class="checkout__infomation">
                    <?php
                    while ($account = mysqli_fetch_array($query_order)) {
                    ?>
                        <div class="info__item d-flex">
                            <label class="info__title" for="delivery_name">Tên khách hàng:</label>
                            <input type="text" class="info__input flex-1" name="delivery_name" value="<?php echo $account['delivery_name'] ?>" readonly></input>
                        </div>
                        <div class="info__item d-flex">
                            <label class="info__title" for="">Số điện thoại:</label>
                            <input type="text" class="info__input flex-1" name="delivery_phone" value="<?php echo $account['delivery_phone'] ?>" readonly></input>
                        </div>
                        <div class="info__item d-flex">
                            <label class="info__title" for="">Địa chỉ:</label>
                            <input type="text" class="info__input flex-1" name="delivery_address" value="<?php echo $account['delivery_address'] ?>" readonly></input>
                        </div>
                        <div class="info__item d-flex">
                            <label class="info__title" for="">Ghi chú</label>
                            <input type="text" class="info__input flex-1" name="delivery_note" value="<?php echo $account['delivery_note'] ?>" readonly></input>
                        </div>
                        <div class="info__item d-flex">
                            <label class="info__title" for="order_type">Phương thức:</label>
                            <input type="text" class="info__input flex-1" name="order_type" value="<?php echo format_order_type($account['order_type']) ?>" readonly></input>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col" style="--w-md:4;">
                <div class="checkout__cart" style="padding-block: 0;">
                    <h2 class="h4" style="margin-bottom: 0;">Danh sách sản phẩm:</h2>
                    <div class="checkout__items">
                        <?php
                        $total = 0;
                        while ($cart_item = mysqli_fetch_array($query_order_detail_list)) {
                            $total += ($cart_item['product_price'] - ($cart_item['product_price'] / 100 * $cart_item['product_sale'])) * $cart_item['product_quantity'];
                        ?>
                            <div class="checkout__item d-flex align-center">
                                <div class="checkout__image p-relative">
                                    <div class="product-quantity align-center d-flex justify-center p-absolute"><span class="h6"><?php echo $cart_item['product_quantity'] ?></span></div>
                                    <a href="index.php?page=product_detail&product_id=<?php echo $cart_item['product_id'] ?>"><img class="w-100 d-block object-fit-cover ratio-1" src="admin/modules/product/uploads/<?php echo $cart_item['product_image'] ?>" alt=""></a>
                                </div>
                                <div class="checkout__name flex-1">
                                    <h3 class="h6"><?php echo $cart_item['product_name'] ?></h3>
                                </div>
                                <div class="h6 checkout__price"><?php echo (number_format($cart_item['product_price'] - ($cart_item['product_price'] / 100 * $cart_item['product_sale']))) . ' ₫' ?></div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <table class="w-100 mg-t-20">
                        <tr>
                            <td class="h6">Tạm tính:</td>
                            <td class="h6 text-right"><?php echo number_format((float) $total) . '₫' ?></td>
                        </tr>
                        <tr>
                            <td class="h6">Giảm giá</td>
                            <td class="h6 text-right"> 0₫</td>
                        </tr>
                        <tr>
                            <td class="h6">Phí vận chuyển</td>
                            <td class="h6 text-right">Miễn phí</td>
                        </tr>
                    </table>

                    <div class="checkout__bottom d-flex align-center space-between">
                        <h4 class="h4">Tổng tiền:</h4>
                        <span class="h4 checkout__total"><?php echo number_format((float) $total) . '₫' ?></span>
                    </div>
                </div>
            </div>
            <div class="w-100 d-flex align-center space-between">
                <div class="order__detail--action">
                    <?php
                    if ($order['order_status'] == 0) {
                    ?>
                        <a href="pages/handle/order.php?order_cancel=1&order_code=<?php echo $order_code ?>" class="btn btn__solid" onClick="return confirm('Bạn có muốn hủy đơn hàng này không?')">Hủy đơn hàng</a>
                    <?php
                    } elseif ($order['order_status'] == 3) {
                    ?>
                        <a href="pages/handle/order.php?order_confirm=1&order_code=<?php echo $order_code ?>" class="btn btn__solid" onClick="return confirm('Xác nhận đã nhận được hàng?')">Xác nhận đã nhận hàng</a>
                    <?php
                    } else {
                    ?>
                        <a href="tel:+84878398141" class="btn btn__solid">Liên hệ</a>
                    <?php
                    }
                    ?>

                    <a href="index.php?page=my_account&tab=account_order" class="btn anchor">Trở về danh sách đơn hàng</a>
                </div>
                <div class="order__detail--status">
                    Tình trạng đơn: <?php echo format_order_status($order['order_status']) ?>
                </div>
            </div>
        </div>
    </div>
</section>