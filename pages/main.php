<!-- start header -->
<?php
include("./pages/base/header.php");
?>
<!-- end header -->

<?php
    if (isset($_GET['page'])) {
        $action = $_GET['page'];
    }else {
        $action = '';
    }

    if ($action == 'about') {
        include("./pages/main/about.php");
    }
    elseif ($action == 'blog') {
        include("./pages/main/blog.php");
    }
    elseif ($action == 'article') {
        include("./pages/main/article.php");
    }
    elseif ($action == 'contact') {
        include("./pages/main/contact.php");
    }
    elseif ($action == 'cart') {
        include("./pages/main/cart.php");
    }
    elseif ($action == 'products') {
        include("./pages/main/products.php");
    }
    elseif ($action == 'search'){
        include("./pages/main/search.php");
    }
    elseif ($action == 'product_detail'){
        include("./pages/main/product_detail.php");
    }
    elseif ($action == 'checkout'){
        include("./pages/main/checkout.php");
    }
    elseif ($action == 'thankiu'){
        include("./pages/main/thankiu.php");
    }
    elseif ($action == 'login'){
        include("./pages/main/login.php");
    }
    elseif ($action == 'register'){
        include("./pages/main/register.php");
    }
    elseif ($action == 'my_account'){
        include("./pages/main/my_account.php");
    }
    elseif ($action == 'order_detail'){
        include("./pages/base/order-detail.php");
    }
    elseif ($action == 'password_change'){
        include("./pages/base/password-change.php");
    }
    elseif ($action == '404'){
        include("./pages/main/404.php");
    }
    else {
        include("./pages/main/home.php");
    }
?>

<!-- start footer -->
<?php
include("./pages/base/footer.php");
?>
<!-- end footer -->