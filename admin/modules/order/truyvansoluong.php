<?php
include('../../config/config.php');

// Lấy giá trị product_id từ yêu cầu Ajax
$product_id = $_POST['product_id'];

// Truy vấn cơ sở dữ liệu để lấy số lượng sản phẩm
$query = "SELECT product_quantity FROM product WHERE product_id = $product_id";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    // Lấy số lượng sản phẩm từ kết quả truy vấn
    $row = $result->fetch_assoc();
    $product_quantity = $row['product_quantity'];
    
    // Trả về số lượng sản phẩm dưới dạng dữ liệu JSON
    echo json_encode(array('quantity' => $product_quantity));
} else {
    echo json_encode(array('quantity' => '0'));
}
