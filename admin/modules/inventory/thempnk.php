<?php
session_start();
include('../../config/config.php');
require '../../../carbon/autoload.php';

use Carbon\Carbon;
use Carbon\CarbonInterval;
// them phieu nhap kho
if (isset($_POST['inventory_add'])) {
    $inventory_code = rand(0, 9999);
    $staf_name = $_POST['staf_name'];
    $supplier_name = $_POST['supplier_name'];
    $inventory_note = $_POST['inventory_note'];
    $inventory_phone = $_POST['inventory_phone'];
    $inventory_date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    $sql_insert_inventory = "INSERT INTO inventory(account_id, staf_name, supplier_name, supplier_phone, inventory_note, inventory_code, inventory_date, total_amount, inventory_status) 
    VALUE ('".$_SESSION['account_id']."', '$staf_name', '$supplier_name', '$inventory_phone', '$inventory_note', '$inventory_code', '$inventory_date', '$total_amount', '0')";
    $query_insert_inventory = mysqli_query($mysqli, $sql_insert_inventory);
    
    if ($query_insert_inventory) {
        $total_amount = 0;
        foreach ($_SESSION['inventory'] as $inventory_item) {
                    $product_id = $inventory_item['product_id'];
                    $query_product = mysqli_query($mysqli, "SELECT * FROM product WHERE product_id = $product_id LIMIT 1");
                    $product = mysqli_fetch_array($query_product);

                    $product_quantity = $inventory_item['product_quantity'];
                    $quantity = $product['product_quantity'] + $product_quantity;
                    $product_price_import = $inventory_item['product_price_import'];
                    $total_amount += $product_price_import * $product_quantity;
                    $insert_inventory_detail = "INSERT INTO inventory_detail(inventory_code, product_id, product_quantity, product_price_import) VALUE ('" . $inventory_code . "', '" . $product_id . "', '" . $product_quantity . "', '" . $product_price_import . "')";
                    echo $insert_inventory_detail;
                    mysqli_query($mysqli, $insert_inventory_detail);
                    mysqli_query($mysqli, "UPDATE product SET product_quantity = $quantity, product_price_import = $product_price_import WHERE product_id = '".$product_id."'");
        }
        
        $update_total_amount = "UPDATE inventory SET total_amount = $total_amount WHERE inventory_code = $inventory_code";
        $query_total_amount = mysqli_query($mysqli, $update_total_amount);

        unset($_SESSION['inventory']);
        header('Location:../../index.php?action=inventory&query=inventory_detail&inventory_code='.$inventory_code.'&message=success');
    }
}
?>
