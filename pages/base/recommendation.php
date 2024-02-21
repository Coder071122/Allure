<?php
function cosine_similarity($vector1, $vector2) {
  $dot_product = 0;
  foreach ($vector1 as $key => $value) { 
    if (array_key_exists($key, $vector2)) {
      $dot_product += $value * $vector2[$key];
    }
  }
  $magnitude1 = sqrt(array_sum(array_map(function($value) { return $value * $value; }, $vector1)));
  $magnitude2 = sqrt(array_sum(array_map(function($value) { return $value * $value; }, $vector2)));
  if ($magnitude1 * $magnitude2 == 0) {
    return 0;
  } else {
    return $dot_product / ($magnitude1 * $magnitude2);
  }
}
function get_purchase_history($customer_id) {
    include('./admin/config/config.php');

  $query = 'SELECT product_id, COUNT(*) AS PurchaseCount 
  FROM order_detail 
  WHERE order_code IN 
  (SELECT order_code FROM orders JOIN account WHERE orders.account_id = account.account_id = ' . $customer_id . ') 
  GROUP BY product_id';
  $result = mysqli_query($mysqli, $query);
  $purchase_history = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $purchase_history[$row['product_id']] = $row['PurchaseCount'];
  }
  mysqli_free_result($result);
  mysqli_close($mysqli);
  return $purchase_history;
}

function recommend_products($customer_id, $product_id) {
  $customer_history = get_purchase_history($customer_id);
  $product_history = get_purchase_history($product_id);
  $similarity = cosine_similarity($customer_history, $product_history);
  include('./admin/config/config.php');
  $query = 'SELECT product_id, COUNT(*) AS PurchaseCount FROM order_detail 
  WHERE order_code IN 
  (SELECT order_code FROM orders WHERE account_id = ' . $customer_id . ') 
  AND product_id <> ' . $product_id . ' GROUP BY product_id ORDER BY PurchaseCount DESC LIMIT 4';
  $result = mysqli_query($mysqli, $query);
  $similar_products = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $product_query = "SELECT * FROM product WHERE product_id = " . $row['product_id'];
    $product_result = mysqli_query($mysqli, $product_query);
    if ($product = mysqli_fetch_assoc($product_result)) {
      $product['cosine_similarity'] = $similarity; // Thêm giá trị cosine similarity vào mỗi sản phẩm
      $similar_products[] = $product;
    }
  }
  usort($similar_products, function($a, $b) {
    return $b['cosine_similarity'] <=> $a['cosine_similarity'];
  });

  return $similar_products;
}