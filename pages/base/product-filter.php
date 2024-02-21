<?php
if (isset($_GET['pagenumber'])) {
    $page = $_GET['pagenumber'];
} else {
    $page = 1;
}

if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 9) - 9;
}

if (isset($_GET['pricesort']) && $_GET['pricesort'] == 'asc') {
    $url_sort = "&pricesort=asc";
    $sortby = "ORDER BY product_price ASC";
} elseif (isset($_GET['pricesort']) && $_GET['pricesort'] == 'desc') {
    $url_sort = "&pricesort=desc";
    $sortby = "ORDER BY product_price DESC";
} else {
    $url_sort = "";
    $sortby = "";
}

if (isset($_GET['pricefrom']) && isset($_GET['priceto'])) {
    $price_from = $_GET['pricefrom'];
    $price_to = $_GET['priceto'];
    $url_price = "&pricefrom=" . $price_from . "&priceto" . $price_to;
    if (isset($_GET['category_id'])) {
        $url_category = '&category_id=' . $_GET['category_id'];
        $url_brand = '';
        $sql_product_list = "SELECT * FROM product JOIN category ON product.product_category = category.category_id WHERE product.product_category = '" . $_GET['category_id'] . "' AND product_price > $price_from AND product_price < $price_to AND product_status = 1 " . $sortby . " LIMIT $begin,9";
        $query_product_list = mysqli_query($mysqli, $sql_product_list);
    } elseif (isset($_GET['brand_id'])) {
        $url_category = '';
        $url_brand = '&brand_id=' . $_GET['brand_id'];
        $sql_product_list = "SELECT * FROM product JOIN brand ON product.product_brand = brand.brand_id WHERE product.product_brand = '" . $_GET['brand_id'] . "' AND product_price > $price_from AND product_price < $price_to AND product_status = 1 " . $sortby . " LIMIT $begin,9";
        $query_product_list = mysqli_query($mysqli, $sql_product_list);
    } else {
        $url_brand = '';
        $url_category = '';
        $sql_product_list = "SELECT * FROM product WHERE product_price BETWEEN '" . $price_from . "' AND '" . $price_to . "' AND product_status = 1 " . $sortby . " LIMIT $begin,9";
        $query_product_list = mysqli_query($mysqli, $sql_product_list);
    }
} else {
    $url_price = '';
    if (isset($_GET['category_id'])) {
        $url_brand = '';
        $url_category = '&category_id=' . $_GET['category_id'];
        $sql_product_list = "SELECT * FROM product JOIN category ON product.product_category = category.category_id WHERE product.product_category = '" . $_GET['category_id'] . "' AND product_status = 1 " . $sortby . " LIMIT $begin,9";
        $query_product_list = mysqli_query($mysqli, $sql_product_list);
    } elseif (isset($_GET['brand_id'])) {
        $url_category = '';
        $url_brand = '&brand_id=' . $_GET['brand_id'];
        $sql_product_list = "SELECT * FROM product JOIN brand ON product.product_brand = brand.brand_id WHERE product.product_brand = '" . $_GET['brand_id'] . "' AND product_status = 1 " . $sortby . " LIMIT $begin,9";
        $query_product_list = mysqli_query($mysqli, $sql_product_list);
    } else {
        $url_category = '';
        $url_brand = '';
        $sql_product_list = "SELECT * FROM product WHERE product_status = 1 " . $sortby . " LIMIT $begin,9";
        $query_product_list = mysqli_query($mysqli, $sql_product_list);
    }
}
?>
<div class="product-list">
    <div class="container pd-bottom">
        <div class="row">
            <div class="col" style="--w-md:3;">
                <div class="product__sidebar">
                    <div class="sidebar__item w-100">
                        <div class="sidebar__item--heading">
                            <h3 class="h3">Danh mục</h3>
                        </div>
                        <div class="sidebar__item--content">
                            <?php
                            $sql_categorys = "SELECT * FROM category ORDER BY category_id DESC";
                            $query_categorys = mysqli_query($mysqli, $sql_categorys);
                            while ($categorys = mysqli_fetch_array($query_categorys)) {
                            ?>
                                <a href="index.php?page=products&category_id=<?php echo $categorys['category_id'];
                                                                                echo $url_price;
                                                                                echo $url_sort; ?>" class="sidebar__item--label d-block <?php if (isset($_GET['category_id']) && $categorys['category_id'] == $_GET['category_id']) {
                                                                                                                                                echo 'category__active';
                                                                                                                                            } ?>"><?php echo $categorys['category_name'] ?></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="sidebar__item w-100">
                        <div class="sidebar__item--heading">
                            <h3 class="h3">Lọc theo giá</h3>
                        </div>
                        <div class="sidebar__item--content product-detail__variant--items d-flex">
                            <div class="price__range">
                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="50000000" value="0" step="100000">
                                    <input type="range" class="range-max" min="0" max="50000000" value="50000000" step="100000">
                                </div>
                                <div class="price-input d-flex space-between">
                                    <div class="field">
                                        <input type="number" id="price-from" class="input-min h4" value="0">
                                        <span class="h6 min-value">đ</span>
                                    </div>
                                    <div class="separator">&mdash;</div>
                                    <div class="field">
                                        <input type="number" id="price-to" class="input-max h4" value="50000000">
                                        <span class="h6 max-value">đ</span>
                                    </div>

                                </div>
                                <a href="" class="btn btn__solid btn__filter text-right" onclick="setUrlPrice();">Lọc</a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item w-100">
                        <div class="sidebar__item--heading">
                            <h3 class="h3">Thương hiệu</h3>
                        </div>
                        <div class="sidebar__item--content">
                            <div class="product-detail__variant--items d-flex">
                                <?php
                                $sql_brands = "SELECT * FROM brand ORDER BY brand_id DESC";
                                $query_brands = mysqli_query($mysqli, $sql_brands);
                                while ($brands = mysqli_fetch_array($query_brands)) {
                                ?>
                                    <a href="index.php?page=products&brand_id=<?php echo $brands['brand_id'];
                                                                                echo $url_price;
                                                                                echo $url_sort; ?>" class="custom-label product-detail__variant--item <?php if (isset($_GET['brand_id']) && $brands['brand_id'] == $_GET['brand_id']) {
                                                                                                                                                                echo 'variant__active';
                                                                                                                                                            } ?>" for="1">
                                        <?php echo $brands['brand_name'] ?>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style="--w-md:9;">

                <div class="row">
                    <div class="col">
                        <div class="product__tag d-flex">
                            <?php if ($url_price != '') {
                            ?>
                                <a class="tag__item" href="index.php?page=products<?php echo $url_category;
                                                                                    echo $url_brand;
                                                                                    echo $url_sort; ?>">
                                    <div class="d-flex align-center">
                                        <div class="btn__tag d-flex align-center"><img class="icon-close" src="./assets/images/icon/icon-close.png" alt=""></div>
                                        <div class="tag__content d-flex align-center">
                                            <span class="tag__name h5">Giá <?php echo number_format($price_from) ?>đ - <?php echo number_format($price_to) ?>đ</span>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            }
                            ?>
                            <?php if ($url_category != '') {
                            ?>
                                <a class="tag__item" href="index.php?page=products<?php echo $url_brand;
                                                                                    echo $url_price;
                                                                                    echo $url_sort; ?>">
                                    <div class="d-flex align-center">
                                        <div class="btn__tag d-flex align-center"><img class="icon-close" src="./assets/images/icon/icon-close.png" alt=""></div>
                                        <div class="tag__content d-flex align-center">
                                            <span class="tag__name h5">Danh mục sản phẩm</span>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            } ?>
                            <?php if ($url_brand != '') {
                            ?>
                                <a class="tag__item" href="index.php?page=products<?php echo $url_category;
                                                                                    echo $url_price;
                                                                                    echo $url_sort; ?>">
                                    <div class="d-flex align-center">
                                        <div class="btn__tag d-flex align-center"><img class="icon-close" src="./assets/images/icon/icon-close.png" alt=""></div>
                                        <div class="tag__content d-flex align-center">
                                            <span class="tag__name h5">Thương hiệu</span>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($query_product_list)) {
                        $i++;
                    ?>
                        <div class="col" style="--w: 9; --w-md: 4">
                            <div class="product__card d-flex flex-column">
                                <div class="product__image p-relative">
                                    <a href="index.php?page=product_detail&product_id=<?php echo $row['product_id'] ?>">
                                        <img class="w-100 h-100 object-fit-cover" src="admin/modules/product/uploads/<?php echo $row['product_image'] ?>" alt="product image" />
                                    </a>
                                    <?php
                                    if ($row['product_sale'] > 0) {
                                    ?>
                                        <span class="product__sale h6 p-absolute"> - <?php echo $row['product_sale'] ?>%</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="product__info">
                                    <a href="index.php?page=product_detail&product_id=<?php echo $row['product_id'] ?>">
                                        <h3 class="product__name h5"><?php echo $row['product_name'] ?></h3>
                                    </a>
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
                                        <span>(<?php echo $total_rate ?>)</span>
                                    </span>
                                    <a href="index.php?page=product_detail&product_id=<?php echo $row['product_id'] ?>">
                                        <div class="product__price align-center">
                                            <?php
                                            if ($row['product_sale'] > 0) {
                                            ?>
                                                <del class="product__price--old h5"><?php echo number_format($row['product_price']) . ' ₫' ?></del>

                                            <?php
                                            }
                                            ?>
                                            <span class="product__price--new h4"><?php echo (number_format($row['product_price'] - ($row['product_price'] / 100 * $row['product_sale']))) . ' vnđ' ?></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="pagination">
                            <?php
                            $currentLink = $_SERVER['REQUEST_URI'];
                            if (isset($_GET['pricefrom']) && isset($_GET['priceto'])) {
                                $price_from = $_GET['pricefrom'];
                                $price_to = $_GET['priceto'];
                                if (isset($_GET['category_id'])) {
                                    $sql_product_count = "SELECT * FROM product JOIN category ON product.product_category = category.category_id WHERE product.product_category = '" . $_GET['category_id'] . "' AND product_price > $price_from AND product_price < $price_to  AND product_status = 1";
                                    $query_product_count = mysqli_query($mysqli, $sql_product_count);
                                } elseif (isset($_GET['brand_id'])) {
                                    $sql_product_count = "SELECT * FROM product JOIN brand ON product.product_brand = brand.brand_id WHERE product.product_brand = '" . $_GET['brand_id'] . "' AND product_price > $price_from AND product_price < $price_to  AND product_status = 1";
                                    $query_product_count = mysqli_query($mysqli, $sql_product_count);
                                } else {
                                    $sql_product_count = "SELECT * FROM product WHERE product_price BETWEEN '" . $price_from . "' AND '" . $price_to . "' AND product_status = 1";
                                    $query_product_count = mysqli_query($mysqli, $sql_product_count);
                                }
                            } else {
                                if (isset($_GET['category_id'])) {
                                    $sql_product_count = "SELECT * FROM product JOIN category ON product.product_category = category.category_id WHERE product.product_category = '" . $_GET['category_id'] . "' AND product_status = 1";
                                    $query_product_count = mysqli_query($mysqli, $sql_product_count);
                                } elseif (isset($_GET['brand_id'])) {
                                    $sql_product_count = "SELECT * FROM product JOIN brand ON product.product_brand = brand.brand_id WHERE product.product_brand = '" . $_GET['brand_id'] . "' AND product_status = 1";
                                    $query_product_count = mysqli_query($mysqli, $sql_product_count);
                                } else {
                                    $sql_product_count = "SELECT * FROM product  WHERE product_status = 1";
                                    $query_product_count = mysqli_query($mysqli, $sql_product_count);
                                }
                            }
                            $row_count = mysqli_num_rows($query_product_count);
                            $totalpage = ceil($row_count / 9);
                            if ($row_count > 9) {
                            ?>
                                <ul class="pagination__items d-flex align-center justify-center">
                                    <?php if ($page != 1) {
                                    ?>
                                        <li class="pagination__item">
                                            <a class="d-flex align-center" href="<?php echo $currentLink ?>&pagenumber=<?php echo $page - 1 ?>">
                                                <img src="./assets/images/icon/arrow-left.svg" alt="">
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
                                                                            } else {
                                                                                echo "";
                                                                            } ?>" href="<?php echo $currentLink ?>&pagenumber=<?php echo $i ?>"><?php echo $i ?></a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <?php if ($page != $totalpage) {
                                    ?>
                                        <li class="pagination__item">
                                            <a class="d-flex align-center" href="<?php echo $currentLink ?>&pagenumber=<?php echo $page + 1 ?>">
                                                <img src="./assets/images/icon/icon-nextlink.svg" alt="">
                                            </a>
                                        </li>
                                    <?php
                                    } ?>
                                </ul>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-center pd-top">
                            <a class="btn btn__view--all btn__outline" href="index.php?page=products">Xem tất cả</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var currentURL = window.location.href;

    function setUrlPrice() {
        var inputMin = document.querySelector('.input-min').value;
        var inputMax = document.querySelector('.input-max').value;
        var btnFilter = document.querySelector('.btn__filter');
        var link = currentURL + "&pricefrom=" + inputMin + "&priceto=" + inputMax;
        console.log(link);
        btnFilter.href = link;
    }
    window.history.pushState(null, "", "index.php?page=products" + "<?php echo $url_category;
                                                                    echo $url_brand;
                                                                    echo $url_price;
                                                                    echo $url_sort; ?>");
</script>