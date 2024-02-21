<?php 
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
    $product_count = mysqli_num_rows($query_product_count);
?>
<div class="product__filter-sort">
    <div class="container">
        <div class="row">
            <div class="col" style="--w-md:6;">
                <div class="product__filter d-flex">
                    <div class="sort__item h5">
                        Hiện có: <?php echo $product_count ?> sản phẩm
                    </div>
                </div>
            </div>
            <div class="col" style="--w-md:6;">
                <div class="product__sort d-flex">
                    <div class="sort__item h5">
                        Sắp xếp theo:
                    </div>
                    <div class="sort__item h5">
                        <details class="sort__select p-relative">
                            <summary class="cursor-pointer d-flex align-center">
                                Giá
                                <img src="./assets/images/icon/icon-chevron-down.svg" alt="down" class="icon-open d-block" style="margin-left: 8px;">
                                <img src="./assets/images/icon/chevron-up.svg" alt="up" class="icon-close d-none" style="margin-left: 8px;">
                            </summary>
                            <div class="sort__selectbox p-absolute selectbox__right">
                                <div class="selectbox__item">
                                    <a href="" onclick="ascPrice()" id="price-asc">Giá từ thấp đến cao</a>
                                </div>
                                <div class="selectbox__item">
                                    <a href="" onclick="descPrice()" id="price-desc">Giá từ cao đến thấp</a>
                                </div>
                            </div>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var currentURL = window.location.href;

    function ascPrice() {
        var priceAsc = document.getElementById('price-asc');
        var link = currentURL + "&pricesort=asc";
        priceAsc.href = link;
    }

    function descPrice() {
        var priceDesc = document.getElementById('price-desc');
        var link = currentURL + "&pricesort=desc";
        priceDesc.href = link;
    }
</script>