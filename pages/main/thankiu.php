<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require 'carbon/autoload.php';

use Carbon\Carbon;

$status = 1;
if (isset($_GET['order_type']) && $_GET['order_type'] == 1) {
    $status == 1;
} elseif (isset($_GET['vnp_BankTranNo'])) {
    $status == 1;
    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BankCode = $_GET['vnp_BankCode'];
    $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
    $vnp_CardType = $_GET['vnp_CardType'];
    $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_TmnCode = $_GET['vnp_TmnCode'];
    $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
    $order_code = $_SESSION['order_code'];

    $account_id = $_SESSION['account_id'];
    $order_date = Carbon::now('Asia/Ho_Chi_Minh');

    $delivery_id = $_SESSION['delivery_id'];
    $delivery_name = $_SESSION['delivery_name'];
    $delivery_phone = $_SESSION['delivery_phone'];
    $delivery_address = $_SESSION['delivery_address'];
    $delivery_note = $_SESSION['delivery_note'];


    $total_amount = $_SESSION['total_amount'];

    // them dia chi giao hang
    $insert_delivery = "INSERT INTO delivery(delivery_id, account_id, delivery_name, delivery_phone, delivery_address, delivery_note) VALUE ($delivery_id, $account_id, '$delivery_name', '$delivery_phone', '$delivery_address', '$delivery_note')";
    mysqli_query($mysqli, $insert_delivery);

    // insert don hang
    $insert_order = "INSERT INTO orders(order_code, order_date, account_id, delivery_id, total_amount, order_type, order_status) 
    VALUE ($order_code, '" . $order_date . "', $account_id, '" . $delivery_id . "', $total_amount, 4, 1)";

    $query_insert_order = mysqli_query($mysqli, $insert_order);
    if ($query_insert_order) {
        $quantity_tk = 0;
        //them chi tiet don hang
        foreach ($_SESSION['cart'] as $cart_item) {
            $product_id = $cart_item['product_id'];
            $query_get_product = mysqli_query($mysqli, "SELECT * FROM product WHERE product_id = $product_id");
            $product = mysqli_fetch_array($query_get_product);
            if ($product['product_quantity'] >= $cart_item['product_quantity']) {
                $product_quantity = $cart_item['product_quantity'];
                $quantity_tk += $product_quantity;
                $quantity = $product['product_quantity'] - $product_quantity;
                $quantity_sales = $product['quantity_sales'] + $product_quantity;
                $product_price = $cart_item['product_price'];
                $product_sale = $cart_item['product_sale'];
                $insert_order_detail = "INSERT INTO order_detail(order_code, product_id, product_quantity, product_price, product_sale) VALUE ('" . $order_code . "', '" . $product_id . "', '" . $product_quantity . "', '" . $product_price . "', '" . $product_sale . "')";
                mysqli_query($mysqli, $insert_order_detail);
                mysqli_query($mysqli, "UPDATE product SET product_quantity = $quantity, quantity_sales = $quantity_sales WHERE product_id = $product_id");
            }
        }
        $update_total_amount = "UPDATE orders SET total_amount = $total_amount WHERE order_code = $order_code";
        $query_total_amount = mysqli_query($mysqli, $update_total_amount);

        $now = $order_date->format('Y-m-d');

        $sql_thongke = "SELECT * FROM metrics WHERE metric_date = '$now'";
        $query_thongke = mysqli_query($mysqli, $sql_thongke);

        if (mysqli_num_rows($query_thongke) == 0) {
            $metric_sales = $total_amount;
            $metric_quantity = $quantity_tk;
            $metric_order = 1;
            $sql_update_metrics = "INSERT INTO metrics (metric_date, metric_order, metric_sales, metric_quantity) 
            VALUE ('$order_date', '$metric_order', '$metric_sales', '$metric_quantity')";
            mysqli_query($mysqli, $sql_update_metrics);
        } elseif (mysqli_num_rows($query_thongke) != 0) {
            while ($row_tk = mysqli_fetch_array($query_thongke)) {
                $metric_sales = $row_tk['metric_sales'] + $total_amount;
                $metric_quantity = $row_tk['metric_quantity'] + $quantity_tk;
                $metric_order = $row_tk['metric_order'] + 1;
                $sql_update_metrics = "UPDATE metrics SET metric_order = '$metric_order', metric_sales = '$metric_sales', metric_quantity = '$metric_quantity' WHERE metric_date = '$now'";
                mysqli_query($mysqli, $sql_update_metrics);
            }
        }

        unset($_SESSION['order_code']);
        unset($_SESSION['cart']);
        unset($_SESSION['delivery_id']);
        unset($_SESSION['delivery_name']);
        unset($_SESSION['delivery_phone']);
        unset($_SESSION['delivery_address']);
        unset($_SESSION['delivery_note']);
    }

    //insert vnpay
    $insert_vnpay = "INSERT INTO vnpay(
        vnp_amount, vnp_bankcode, vnp_banktranno, vnp_cardtype, vnp_orderinfo, vnp_paydate, vnp_tmncode, vnp_transactionno, order_code)
        VALUE('" . $vnp_Amount . "','" . $vnp_BankCode . "','" . $vnp_BankTranNo . "','" . $vnp_CardType . "','" . $vnp_OrderInfo . "','" . $vnp_PayDate . "','" . $vnp_TmnCode . "','" . $vnp_TransactionNo . "', '" . $order_code . "')";
    $query_vnpay = mysqli_query($mysqli, $insert_vnpay);

} elseif (isset($_GET['partnerCode']) && isset($_GET['message']) && strval($_GET['message']) == 'Successful.') {
    $status == 1;

    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];
    $amount = $_GET['amount'];
    $orderInfo = $_GET['orderInfo'];
    $orderType = $_GET['orderType'];
    $transId = $_GET['transId'];
    $payType = $_GET['payType'];

    $order_code = $_SESSION['order_code'];
    $account_id = $_SESSION['account_id'];
    $order_date = Carbon::now('Asia/Ho_Chi_Minh');

    $delivery_id = $_SESSION['delivery_id'];
    $delivery_name = $_SESSION['delivery_name'];
    $delivery_phone = $_SESSION['delivery_phone'];
    $delivery_address = $_SESSION['delivery_address'];
    $delivery_note = $_SESSION['delivery_note'];

    $total_amount = $_SESSION['total_amount'];


    // them dia chi giao hang
    $insert_delivery = "INSERT INTO delivery(delivery_id, account_id, delivery_name, delivery_phone, delivery_address, delivery_note) VALUE ($delivery_id, $account_id, '$delivery_name', '$delivery_phone', '$delivery_address', '$delivery_note')";
    mysqli_query($mysqli, $insert_delivery);

    // insert don hang
    $insert_order = "INSERT INTO orders(order_code, order_date, account_id, delivery_id, total_amount, order_type, order_status) 
    VALUE ($order_code, '" . $order_date . "', $account_id, '" . $delivery_id . "', $total_amount, 3, 1)";

    $query_insert_order = mysqli_query($mysqli, $insert_order);
    if ($query_insert_order) {
        $quantity_tk = 0;
        //them chi tiet don hang
        foreach ($_SESSION['cart'] as $cart_item) {
            $product_id = $cart_item['product_id'];
            $query_get_product = mysqli_query($mysqli, "SELECT * FROM product WHERE product_id = $product_id");
            $product = mysqli_fetch_array($query_get_product);
            if ($product['product_quantity'] >= $cart_item['product_quantity']) {
                $product_quantity = $cart_item['product_quantity'];
                $quantity_tk += $product_quantity;
                $quantity = $product['product_quantity'] - $product_quantity;
                $quantity_sales = $product['quantity_sales'] + $product_quantity;
                $product_price = $cart_item['product_price'];
                $product_sale = $cart_item['product_sale'];
                $insert_order_detail = "INSERT INTO order_detail(order_code, product_id, product_quantity, product_price, product_sale) VALUE ('" . $order_code . "', '" . $product_id . "', '" . $product_quantity . "', '" . $product_price . "', '" . $product_sale . "')";
                mysqli_query($mysqli, $insert_order_detail);
                mysqli_query($mysqli, "UPDATE product SET product_quantity = $quantity, quantity_sales = $quantity_sales WHERE product_id = $product_id");
            }
        }
        $update_total_amount = "UPDATE orders SET total_amount = $total_amount WHERE order_code = $order_code";
        $query_total_amount = mysqli_query($mysqli, $update_total_amount);

        $now = $order_date->format('Y-m-d');

        $sql_thongke = "SELECT * FROM metrics WHERE metric_date = '$now'";
        $query_thongke = mysqli_query($mysqli, $sql_thongke);

        if (mysqli_num_rows($query_thongke) == 0) {
            $metric_sales = $total_amount;
            $metric_quantity = $quantity_tk;
            $metric_order = 1;
            $sql_update_metrics = "INSERT INTO metrics (metric_date, metric_order, metric_sales, metric_quantity) 
        VALUE ('$order_date', '$metric_order', '$metric_sales', '$metric_quantity')";
            mysqli_query($mysqli, $sql_update_metrics);
        } elseif (mysqli_num_rows($query_thongke) != 0) {
            while ($row_tk = mysqli_fetch_array($query_thongke)) {
                $metric_sales = $row_tk['metric_sales'] + $total_amount;
                $metric_quantity = $row_tk['metric_quantity'] + $quantity_tk;
                $metric_order = $row_tk['metric_order'] + 1;
                $sql_update_metrics = "UPDATE metrics SET metric_order = '$metric_order', metric_sales = '$metric_sales', metric_quantity = '$metric_quantity' WHERE metric_date = '$now'";
                mysqli_query($mysqli, $sql_update_metrics);
            }
        }

        unset($_SESSION['order_code']);
        unset($_SESSION['cart']);
        unset($_SESSION['delivery_id']);
        unset($_SESSION['delivery_name']);
        unset($_SESSION['delivery_phone']);
        unset($_SESSION['delivery_address']);
        unset($_SESSION['delivery_note']);
    }

    //insert momo
    $insert_momo = "INSERT INTO momo(
        partner_code, order_code, momo_amount, order_info, order_type, trans_id, payment_date, pay_type)
        VALUE('" . $partnerCode . "','" . $orderId . "','" . $amount . "','" . $orderInfo . "','" . $orderType . "','" . $transId . "','" . $order_date . "','" . $payType . "')";
    $query_momo = mysqli_query($mysqli, $insert_momo);
} else {
    $status = 0;
}
?>

<?php
if ($status == 1) {
?>
    <section class="thankiu">
        <div class="container">
            <div class="thankiu__box text-center">
                <div class="thankiu_image">
                    <img src="assets/images/icon/icon-success.gif" alt="success">
                </div>
                <h1 class="thankiu__heading h2">Đặt hàng thành công</h1>
                <span class="thankiu__heading2 h3">Cảm ơn quý khách đã mua hàng tại Guha Perfume</span>
                <p class="thankiu__description">Đơn hàng của quý khách đã được tiếp nhận và đang trong thời gian xử lý. Chúng tôi sẽ thông báo đến quý khách ngay khi hàng chuẩn bị được giao.</p>
                <div class="thankiu_link">
                    <a href="index.php" class="btn btn__outline">Trang chủ</a>
                    <a href="index.php?page=my_account&tab=account_order" class="btn btn__outline">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </section>
<?php
} else {
?>
    <section class="thankiu">
        <div class="container">
            <div class="thankiu__box text-center">
                <div class="thankiu_image">
                    <img src="assets/images/icon/icon-error.gif" alt="success">
                </div>
                <h1 class="thankiu__heading heading--wanning h2">Giao dịch thất bại</h1>
                <span class="thankiu__heading2 h3">Thanh toán không thành công xin vui lòng kiểm tra lại</span>
                <p class="thankiu__description">Quý khách vui lòng thực hiện thanh toán lại đơn hàng hoặc có thể sử dụng phương thức thanh toán khác để có thể mua hàng, các sản phẩm hiện vẫn còn ở trong giỏ hàng</p>
                <div class="thankiu_link">
                    <a href="index.php" class="btn btn__outline">Trang chủ</a>
                    <a href="index.php?page=cart" class="btn btn__outline">Xem giỏ hàng</a>
                </div>
            </div>
        </div>
    </section>

<?php
    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];

    echo $partnerCode;
    echo "
    ";
    echo $orderId;
}
?>