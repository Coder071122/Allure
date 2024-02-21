<?php
$account_id = $_SESSION['account_id'];
$sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE (orders.order_status < 0 OR orders.order_status >= 3) AND account.account_id = $account_id ORDER BY orders.order_id DESC";
$query_order_list = mysqli_query($mysqli, $sql_order_list);
?>
<div class="my-account__content">
    <h2 class="my-account__title h3">Danh sách đơn hàng</h2>
    <div class="order__items">
        <?php while ($order = mysqli_fetch_array($query_order_list)) 
        {
        ?>
            <a href="index.php?page=order_detail&order_code=<?php echo $order['order_code'] ?>">
                <div class="order__item">
                    <div class="order__header d-flex align-center space-between">
                        <div class="order__info">
                            <h5 class="order__code">#<?php echo $order['order_code'] ?></h5>
                            <span class="h6"><?php echo $order['order_date'] ?></span>
                        </div>
                        <span class="order__status h6"><?php echo format_order_status($order['order_status']) ?></span>
                    </div>
                    <div class="order__container">
                        <?php
                        $sql_order_detail_list = "SELECT od.order_detail_id, p.product_id, p.product_name, od.product_quantity, od.product_price, od.product_sale, p.product_image FROM order_detail od JOIN product p ON od.product_id = p.product_id WHERE od.order_code = '" . $order['order_code'] . "' ORDER BY od.order_detail_id DESC";
                        $query_order_detail_list = mysqli_query($mysqli, $sql_order_detail_list);
                        while ($order_detail = mysqli_fetch_array($query_order_detail_list)) {
                        ?>
                        <div class="cart__item d-flex align-center">
                            <div class="cart__image p-relative">
                                <img class="w-100 d-block object-fit-cover ratio-1" src="admin/modules/product/uploads/<?php echo $order_detail['product_image'] ?>" alt="" />
                            </div>
                            <div class="flex-1">
                                <h3 class="cart__name h4"><?php echo $order_detail['product_name'] ?></h3>
                                <span class="cart__quantity h6 d-block">x <?php echo $order_detail['product_quantity'] ?></span>
                            </div>
                            <div class="h5 cart__price"><?php echo number_format($order_detail['product_price']) ?>₫</div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="order__footer text-right">
                        <span class="h5">Thành tiền: <?php echo number_format($order['total_amount']) ?>₫</span>
                    </div>
                </div>
            </a>
        <?php
        }
        ?>
    </div>
</div>