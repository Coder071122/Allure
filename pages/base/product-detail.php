<?php
$product_id = $_GET['product_id'];
$sql_product_detail = "SELECT * FROM product JOIN capacity ON product.capacity_id = capacity.capacity_id WHERE product.product_id = '" . $_GET['product_id'] . "' LIMIT 1";
$query_product_detail = mysqli_query($mysqli, $sql_product_detail);
$query_evaluate = mysqli_query($mysqli, "SELECT * FROM evaluate WHERE product_id='$product_id' AND evaluate_status = 1");
$query_evaluate_rating = mysqli_query($mysqli, "SELECT * FROM evaluate WHERE product_id='$product_id' AND evaluate_status = 1");

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
    $percent1 = ($rate1 / $total_rate) * 100;
    $percent2 = ($rate2 / $total_rate) * 100;
    $percent3 = ($rate3 / $total_rate) * 100;
    $percent4 = ($rate4 / $total_rate) * 100;
    $percent5 = ($rate5 / $total_rate) * 100;

    $rate_avg =  ($rate1 * 1 + $rate2 * 2 + $rate3 * 3 + $rate4 * 4 + $rate5 * 5) / $total_rate;
    $rate_avg = round($rate_avg, 1);
} else {
    $percent1 = 0;
    $percent2 = 0;
    $percent3 = 0;
    $percent4 = 0;
    $percent5 = 0;

    $rate_avg = 0;
}


while ($row_product_detail = mysqli_fetch_array($query_product_detail)) {
?>

    <div id="toast_message"></div>
    <!-- start product detail -->
    <div class="product-detail">
        <div class="product-detail__container background-default pd-section">
            <div class="container">
                <div class="row">
                    <div class="col p-relative" style="--w-md: 6">
                        <div class="product-detail__media">
                            <div class="media__items d-flex">
                                <div class="media__item product-image-container w-100">
                                    <img class="w-100" src="admin/modules/product/uploads/<?php echo $row_product_detail['product_image'] ?>" alt="image product" />
                                    <div class="zoom-window"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-detail__slide-control d-flex justify-center md-none">
                            <div class="slide-control__slide p-relative">
                                <button class="slide-control__slide--prev cursor-pointer p-absolute">
                                    <img src="./assets/images/icon/chevron-left.svg" alt="sub" />
                                </button>
                                <input type="text" value="1/1" class="slide-control__slide--value heading-6 w-100 h-100" />
                                <button class="slide-control__slide--next cursor-pointer p-absolute">
                                    <img src="./assets/images/icon/chevron-right.svg" alt="sum" />
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="--w-md: 6">
                        <div class="product-detail__info">
                            <form method="POST" action="pages/handle/addtocart.php?product_id=<?php echo $row_product_detail['product_id'] ?>">
                                <span class="h6">Mã sản phẩm: <?php echo $row_product_detail['product_id'] ?></span>
                                <h1 class="product-detail__name"><?php echo $row_product_detail['product_name'] ?></h1>
                                <span class="review-star-list d-flex align-center">
                                    <?php
                                    for ($i = 0; $i < 5; $i++) {
                                        if ($i + 1 <= $rate_avg) {
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
                                <div class="product-detail__price d-flex align-center">
                                    <?php
                                    if ($row_product_detail['product_sale'] > 0) {
                                    ?>
                                        <del class="product__price--old h5"><?php echo number_format($row_product_detail['product_price']) . ' ₫' ?></del>
                                    <?php
                                    }
                                    ?>

                                    <span class="product__price--new h4"><?php echo (number_format($row_product_detail['product_price'] - ($row_product_detail['product_price'] / 100 * $row_product_detail['product_sale']))) . ' ₫' ?></span>
                                    <?php
                                    if ($row_product_detail['product_sale'] > 0) {
                                    ?>
                                        <span class="product__sale h6"> - <?php echo $row_product_detail['product_sale'] ?>%</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="product-detail__variants">
                                    <div class="product-detail__variant">
                                        <h3 class="product-detail__variant--title h6">
                                            Dung tích
                                        </h3>
                                        <div class="product-detail__variant--items d-flex">
                                            <input class="custom-radio" type="radio" name="size" id="1" checked="checked" />
                                            <label class="custom-label product-detail__variant--item" for="1">
                                                <?php echo $row_product_detail['capacity_name'] ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detail__quantity">
                                    <h3 class="quantity__heading h6">Số lượng</h3>
                                    <div class="d-flex align-center">
                                        <div class="select__number p-relative">
                                            <button type="button" class="select__number--minus cursor-pointer p-absolute" onclick="decreaseQuantity()">
                                                <img src="./assets/images/icon/minus.svg" alt="sub" />
                                            </button>
                                            <input type="text" name="product_quantity" min="1" value="1" class="select__number--value heading-6 w-100 h-100" />
                                            <button type="button" class="select__number--plus cursor-pointer p-absolute" onclick="increaseQuantity()">
                                                <img src="./assets/images/icon/plus.svg" alt="sum" />
                                            </button>
                                        </div>
                                        <span class="h6" style="margin-left: 10px;"><?php if ($row_product_detail['product_quantity'] > 0) { ?> còn <span class="quantity-total"> <?php echo $row_product_detail['product_quantity'] ?> </span> sản phẩm <?php } else { ?>Hiện sản phẩm đã hết hàng<?php } ?></span>
                                    </div>
                                </div>
                                <?php if ($row_product_detail['product_quantity'] > 0) { ?>
                                    <input class="btn product-detail__addtocart w-100" type="submit" name="addtocart" value="Thêm giỏ hàng" />

                                    <input class="btn product-detail__buynow w-100" type="submit" name="buynow" value="Mua ngay" />
                                <?php } else { ?>
                                    <a href="tel:+84878398141" class="btn product-detail__buynow w-100 text-center">Liên hệ</a>
                                <?php } ?>

                            </form>
                            <div class="describe__item describe__item--share">
                                <a class="product-detail__anchor" href="#">
                                    <ul class="social__items d-flex align-center">
                                        <li class="social__item">
                                            <h3 class="h5">
                                                Share:
                                            </h3>
                                        </li>
                                        <li class="social__item opacity-50">
                                            <a class="" href="#info-product">
                                                <img class="svg__icon d-block" src="./assets/images/icon/facebook.svg" alt="" />
                                            </a>
                                        </li>
                                        <li class="social__item opacity-50">
                                            <a class="" href="#">
                                                <img class="svg__icon d-block" src="./assets/images/icon/twitter.svg" alt="" />
                                            </a>
                                        </li>
                                        <li class="social__item opacity-50">
                                            <a class="" href="#">
                                                <img class="svg__icon d-block" src="./assets/images/icon/instagram.svg" alt="" />
                                            </a>
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product detail -->
    <section class="faq-tab pd-bottom" id="info-product">
        <div class="container">
            <!-- tab items -->
            <div class="tab__items d-flex">
                <div class="tabs d-flex p-relative">
                    <div class="pd-inline">
                        <div class="tab-item active">
                            <h3 class="h3">Thông tin sản phẩm</h3>
                        </div>
                    </div>
                    <div class="pd-inline">
                        <div class="tab-item">
                            <h3 class="h3">Đánh giá sản phẩm</h3>
                        </div>
                    </div>
                    <div class="line"></div>
                </div>
            </div>
        </div>

        <!-- tab content -->
        <div class="tab__content">
            <div class="container">
                <div class="tab-pane active">
                    <div class="product-detail__description">
                        <?php echo $row_product_detail['product_description'] ?>
                    </div>
                </div>
                <div class="tab-pane">
                    <div class="evaluate__rating d-flex align-center">
                        <div class="rating-average d-flex flex-column align-center justify-center">
                            <div class="point-comment h1"><?php echo $rate_avg ?>/5</div>
                            <span class="ount-eval d-flex flex-c align-center">
                                <?php
                                for ($i = 0; $i < 5; $i++) {
                                    if ($i + 1 <= $rate_avg) {
                                ?>
                                        <div class="rating-star"></div>
                                        <!-- <img alt="Rating star" height="18" src="https://asset.vuahanghieu.com/assets/images/rating-star.svg" width="18"> -->
                                    <?php
                                    } else {
                                    ?>
                                        <div class="rating-star rating-off"></div>
                                <?php
                                    }
                                }
                                ?>
                            </span>
                        </div>
                        <div class="rating-percent flex-1">
                            <div class="product-review-item d-flex align-center">
                                <div class="product-star d-flex align-center">
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                </div><span class="sum-review"> (<?php echo $rate5 ?>) </span>
                                <div class="product-bar">
                                    <div class="product-result" style="width: <?php echo $percent5 ?>%;"></div>
                                </div>
                            </div>
                            <div class="product-review-item d-flex align-center">
                                <div class="product-star d-flex align-center">
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                </div>
                                <span class="sum-review"> (<?php echo $rate4 ?>) </span>
                                <div class="product-bar">
                                    <div class="product-result" style="width: <?php echo $percent4 ?>%;"></div>
                                </div>
                            </div>
                            <div class="product-review-item d-flex align-center">
                                <div class="product-star d-flex align-center">
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                </div><span class="sum-review"> (<?php echo $rate3 ?>) </span>
                                <div class="product-bar">
                                    <div class="product-result" style="width: <?php echo $percent3 ?>%;"></div>
                                </div>
                            </div>
                            <div class="product-review-item d-flex align-center">
                                <div class="product-star d-flex align-center">
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                </div><span class="sum-review"> (<?php echo $rate2 ?>) </span>
                                <div class="product-bar">
                                    <div class="product-result" style="width: <?php echo $percent2 ?>%;"></div>
                                </div>
                            </div>
                            <div class="product-review-item d-flex align-center">
                                <div class="product-star d-flex align-center">
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                    <div class="rating-star"></div>
                                </div><span class="sum-review"> (<?php echo $rate1 ?>) </span>
                                <div class="product-bar">
                                    <div class="product-result" style="width: <?php echo $percent1 ?>%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="customer-rating d-flex flex-column align-center justify-center">
                            <div class="avaluate__btn--title h5">Chia sẻ nhận xét về sản phẩm</div>
                            <button class="btn btn__outline evaluate__btn">Viết nhận xét</button>
                        </div>
                    </div>

                    <div class="comment-form">
                        <form class="post-comment" method="POST" action="pages/handle/evaluate_rating.php?product_id=<?php echo $product_id; ?>">
                            <div class="product-rate d-flex align-center">
                                <div class="rate-text"> Đánh giá</div>
                                <div class="rate-box">
                                    <input name="rate" type="radio" value="1">
                                    <input name="rate" type="radio" value="2">
                                    <input name="rate" type="radio" value="3">
                                    <input name="rate" type="radio" value="4">
                                    <input name="rate" type="radio" value="5" checked>
                                </div>
                                <div>cho sản phẩm này:</div>
                            </div>
                            <label class="comment-label">Nhận xét (ý kiến sẽ thêm thông tin cho người khác mua hàng)</label>
                            <div class="form-element mg-t-20">
                                <textarea class="form-control" name="evaluate_content" placeholder="Hãy cho chúng tôi biết đánh giá của bạn về sản phẩm này!"></textarea>
                            </div>
                            <div class="d-flex align-center">
                                <?php
                                if (isset($_SESSION['account_id'])) {
                                ?>
                                    <button class="btn btn__solid mg-t-10" name="evaluate_add" type="submit">Gửi nhận xét</button>
                                <?php
                                } else {
                                ?>
                                    <a class="btn btn__solid mg-t-10" href="index.php?page=login">Đăng nhập để đánh giá</a>
                                <?php
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                    <div class="evaluate__content">
                        <?php
                        while ($evaluate = mysqli_fetch_array($query_evaluate)) {
                        ?>
                            <div class="comment-item d-flex">
                                <div class="f-cmuser"><abbr title="Thịnh Đặng"><?php echo substr($evaluate['account_name'], 0, 1) ?></abbr></div>
                                <div class="cmuser-content d-flex flex-column">
                                    <span class="review-star-list d-flex">
                                        <?php
                                        for ($i = 0; $i < 5; $i++) {
                                            if ($i < $evaluate['evaluate_rate']) {
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
                                    <div class="customer__name">
                                        <strong class="evaluate_name"><?php echo $evaluate['account_name'] ?></strong>
                                        <span class="evaluate_date"><?php echo $evaluate['evaluate_date'] ?></span>
                                    </div>
                                    <div class="evaluate_content"><?php echo $evaluate['evaluate_content'] ?></div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="evaluate__footer">
                        <div class="load-more-box p-relative d-flex align-center justify-center">
                            <button class="LoadMore button" type="button"> Xem thêm </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php
}
?>
<script>
    function showSuccessMessage() {
        toast({
            title: "Success",
            message: "Thêm sản phẩm vào giỏ hàng thành công",
            type: "success",
            duration: 3000,
        });
    }

    function showErrorMessage() {
        toast({
            title: "Error",
            message: "Không thể thêm sản phẩm vào trong giỏ hàng",
            type: "error",
            duration: 3000,
        });
    }

    function showAcceptMessage() {
        toast({
            title: "Success",
            message: "Cập nhập thành công",
            type: "success",
            duration: 3000,
        });
    }

    function showWarningMessage() {
        toast({
            title: "Warning",
            message: "Có gì đó không hợp lý đã xảy ra",
            type: "warning",
            duration: 3000,
        });
    }
</script>
<?php
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    echo '<script>';
    echo 'showSuccessMessage();';
    echo 'window.history.pushState(null, "", "index.php?page=product_detail&product_id=' . $product_id . '");';
    echo '</script>';
} elseif (isset($_GET['message']) && $_GET['message'] == 'accept') {
    echo '<script>';
    echo 'showAcceptMessage();';
    echo 'window.history.pushState(null, "", "index.php?page=product_detail&product_id=' . $product_id . '");';
    echo '</script>';
} elseif (isset($_GET['message']) && $_GET['message'] == 'warning') {
    echo '<script>';
    echo 'showWarningMessage();';
    echo 'window.history.pushState(null, "", "index.php?page=product_detail&product_id=' . $product_id . '");';
    echo '</script>';
} elseif (isset($_GET['message']) && $_GET['message'] == 'error') {
    echo '<script>';
    echo 'showErrorMessage();';
    echo 'window.history.pushState(null, "", "index.php?page=product_detail&product_id=' . $product_id . '");';
    echo '</script>';
}
?>
<script>
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const tabs = $$('.tab-item');
    const panes = $$('.tab-pane');

    const tabActive = $('.tab-item.active');
    const line = $('.tabs .line');

    line.style.left = tabActive.offsetLeft + 'px';
    line.style.width = tabActive.offsetWidth + 'px';

    tabs.forEach((tab, index) => {
        const pane = panes[index];
        tab.onclick = function() {
            $('.tab-item.active').classList.remove('active');
            $('.tab-pane.active').classList.remove('active');

            line.style.left = this.offsetLeft + 'px';
            line.style.width = this.offsetWidth + 'px';

            this.classList.add('active');
            pane.classList.add('active');
        }
    })
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.querySelector(".product-image-container");
        const zoomWindow = document.querySelector(".zoom-window");
        const image = container.querySelector("img");

        container.addEventListener("mouseover", function() {
            zoomWindow.style.display = "block";
        });

        container.addEventListener("mouseout", function() {
            zoomWindow.style.display = "none";
        });

        container.addEventListener("mousemove", function(event) {
            // Tính toán vị trí của cửa sổ phóng to dựa trên vị trí chuột trong khung chứa ảnh
            const containerRect = container.getBoundingClientRect();
            const x = event.clientX - containerRect.left;
            const y = event.clientY - containerRect.top;

            // Cập nhật vị trí của cửa sổ phóng to
            zoomWindow.style.left = (x - zoomWindow.offsetWidth / 2) + "px";
            zoomWindow.style.top = (y - zoomWindow.offsetHeight / 2) + "px";

            // Hiển thị phần phóng to của ảnh
            zoomWindow.style.backgroundImage = `url('${image.src}')`;
            zoomWindow.style.backgroundSize = `${image.width * 2}px ${image.height * 2}px`;
            zoomWindow.style.backgroundPosition = `-${x * 2}px -${y * 2}px`;
        });
    });
</script>