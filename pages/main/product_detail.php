<!-- start product detail -->
<?php
include("./pages/base/product-detail.php");
?>
<!-- end product detail -->
<?php
if (isset($_SESSION['account_id'])) {
?>
    <!-- start product filtering -->
    <?php
    include("./pages/base/product_filtering.php");
    ?>
    <!-- end product filtering -->
<?php
} else {
?>
    <!-- start product list -->
    <?php
    include("./pages/base/product-relate.php");
    ?>
    <!-- end product list -->
<?php
}
?>