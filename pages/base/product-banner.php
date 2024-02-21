<?php
if (isset($_GET['category_id'])) {
    $sql_category = "SELECT * FROM category WHERE category_id = '" . $_GET['category_id'] . "' LIMIT 1";
    $query_category = mysqli_query($mysqli, $sql_category);
} elseif (isset($_GET['brand_id'])) {
    $sql_category = "SELECT * FROM brand WHERE brand_id = '" . $_GET['brand_id'] . "' LIMIT 1";
    $query_category = mysqli_query($mysqli, $sql_category);
}

?>
<div class="product__banner p-relative">
    <div class="image__banner p-absolute">

    </div>
    <div class="p-absolute banner-overlay">

    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product__title d-flex align-center justify-center">
                    <?php
                    if (isset($_GET['category_id'])) {
                        while ($row = mysqli_fetch_array($query_category)) {
                    ?>
                            <h2 class="h2"><?php echo $row['category_name'] ?></h2>
                        <?php
                        }
                    } else if (isset($_GET['brand_id'])) {
                        while ($row = mysqli_fetch_array($query_category)) {
                        ?>
                            <h2 class="h2"><?php echo $row['brand_name'] ?></h2>
                        <?php
                        }
                    } else {
                        ?>
                        <h2 class="h2">Sản phẩm của cửa hàng</h2>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>