<?php
if (isset($_SESSION['account_id'])) {
    $account_id = $_SESSION['account_id'];
    $sql_customer = "SELECT * FROM customer WHERE account_id = '" . $account_id . "'";
    $query_account = mysqli_query($mysqli, $sql_customer);
    $number_customer = mysqli_num_rows($query_account);
}
?>
<!-- start checkout -->
<section class="checkout pd-section">
    <div class="container">
        <form action="pages/handle/checkout.php" method="POST">
            <div class="row">
                <div class="col" style="--w-md:7;">
                    <h2 class="checkout__title h4 d-flex align-center space-between">Thông tin người nhận hàng:</h2>
                    <div class="checkout__infomation">
                        <?php
                        if ($number_customer > 0) {
                        ?>
                            <?php
                            if (isset($query_account)) {
                                while ($account = mysqli_fetch_array($query_account)) {
                            ?>
                                    <div class="info__item d-flex">
                                        <label class="info__title" for="">Tên khách hàng:</label>
                                        <input type="text" class="info__input flex-1" name="delivery_name" value="<?php echo $account['customer_name'] ?>" required></input>
                                    </div>
                                    <div class="info__item d-flex">
                                        <label class="info__title" for="">Địa chỉ:</label>
                                        <input type="text" class="info__input flex-1" name="delivery_address" value="<?php echo $account['customer_address'] ?>" placeholder="Nhập vào địa chỉ nhận hàng" required></input>
                                    </div>
                                    <div class="info__item d-flex">
                                        <label class="info__title" for="">Số điện thoại:</label>
                                        <input type="text" class="info__input flex-1" name="delivery_phone" value="<?php echo $account['customer_phone'] ?>" required></input>
                                    </div>
                                    <div class="info__item d-flex">
                                        <label class="info__title" for="delivery_note">Ghi chú:</label>
                                        <input id="delivery_note" type="text" class="info__input flex-1" placeholder="Nhập vào ghi chú với người bán ..." name="delivery_note" value=""></input>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <a href="index.php?page=login">Vui lòng đăng nhập tài khoản</a>
                            <?php
                            }
                            ?>
                        <?php
                        } else {
                        ?>
                            <?php
                            if (isset($query_account)) {
                            ?>
                                <div class="info__item d-flex">
                                    <label class="info__title" for="">Tên khách hàng:</label>
                                    <input type="text" class="info__input flex-1" name="delivery_name" value="" placeholder="Nhập vào tên người nhận hàng ..." required></input>
                                </div>
                                <div class="info__item d-flex">
                                    <label class="info__title" for="">Địa chỉ:</label>
                                    <input type="text" class="info__input flex-1" name="delivery_address" value="" placeholder="Nhập vào địa chỉ nhận hàng ..." required></input>
                                </div>
                                <div class="info__item d-flex">
                                    <label class="info__title" for="">Số điện thoại:</label>
                                    <input type="text" class="info__input flex-1" name="delivery_phone" value="" placeholder="Nhập vào số điện thoại nhận hàng ..." required></input>
                                </div>
                                <div class="info__item d-flex">
                                    <label class="info__title" for="delivery_note">Ghi chú:</label>
                                    <input id="delivery_note" type="text" class="info__input flex-1" placeholder="Nhập vào ghi chú với người bán ..." name="delivery_note" value=""></input>
                                </div>
                            <?php

                            } else {
                            ?>
                                <a href="index.php?page=login">Vui lòng đăng nhập tài khoản</a>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>

                    </div>


                </div>
                <div class="col" style="--w-md:5;">
                    <div class="checkout__cart">
                        <div class="checkout__items">
                            <?php
                            $total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $cart_item) {
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
                            } else {
                                ?>
                                <span>Không tồn tại giỏ hàng</span>
                            <?php
                            }
                            ?>

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
                        </div>

                        <div class="checkout__bottom text-right">
                            <div class="checkout__total--amount d-flex align-center space-between">
                                <h4 class="h4">Tổng tiền phải thanh toán:</h4>
                                <span class="h4 checkout__total"><?php echo number_format((float) $total) . '₫' ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="--w-md: 7">
                    <h4 class="h4 payment__heading">Phương thức thanh toán:</h4>
                    <div class="payment__items">
                        <div class="payment__item checked d-flex align-center">
                            <input class="payment__radio" type="radio" name="order_type" id="payment_default" value="1" checked />
                            <img class="payment__icon" src="./assets/images/icon/icon-shipcod.png" alt="Ship COD">
                            <label class="payment__label w-100 h-100" for="payment_default">
                                <span class="d-block">COD</span>
                                <span class="d-block">Thanh toán khi nhận hàng</span>
                            </label>
                        </div>
                        <div class="payment__item d-flex align-center">
                            <input class="payment__radio" type="radio" name="order_type" id="payment_momo_qr" value="2" />
                            <img class="payment__icon" src="./assets/images/payment/qrcode.png" alt="QR CODE" style="width: 62px;">
                            <label class="payment__label w-100 h-100" for="payment_momo_qr">
                                <span class="d-block">QR CODE</span>
                                <span class="d-block">Thanh toán MOMO QRCODE</span>
                            </label>
                        </div>
                        <div class="payment__item d-flex align-center">
                            <input class="payment__radio" type="radio" name="order_type" id="payment_momo_atm" value="3" />
                            <img class="payment__icon" src="./assets/images/payment/momo.png" alt="QR CODE" style="width: 62px;">
                            <label class="payment__label w-100 h-100" for="payment_momo_atm">
                                <span class="d-block">MOMO</span>
                                <span class="d-block">Thanh toán chuyển khoản MOMO</span>
                            </label>
                        </div>
                        <div class="payment__item d-flex align-center">
                            <input class="payment__radio" type="radio" name="order_type" id="payment_vnp" value="4" />
                            <img class="payment__icon" src="./assets/images/payment/vnpay.png" alt="QR CODE" style="width: 62px;">
                            <label class="payment__label w-100 h-100" for="payment_vnp">
                                <span class="d-block">VNPAY</span>
                                <span class="d-block">Thanh toán chuyển khoản VNPAY</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100 pd-top text-left">
                <button type="submit" name="redirect" class="btn btn__solid">Đặt hàng</button>
                <a href="index.php?page=cart" class="btn anchor">Trở về giỏ hàng</a>
            </div>
        </form>
    </div>
</section>
<!-- end checkout -->