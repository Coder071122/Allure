<?php
session_start();
include('../../config/config.php');
require '../../../carbon/autoload.php';

use Carbon\Carbon;
use Carbon\CarbonInterval;

if (isset($_GET['data'])) {
    $data = $_GET['data'];
    $inventory_ids = json_decode($data);
}

if (isset($_GET['delete']) && $_GET['delete'] == 1) {
    foreach ($inventory_ids as $id) {
        $sql_delete = "DELETE FROM inventory WHERE inventory_id = $id";
        mysqli_query($mysqli, $sql_delete);
    }
    header('Location:../../index.php?action=inventory&query=inventory_list&message=success');
}
else {
    header('Location:../../index.php?action=inventory&query=inventory_list&message=error');
}


// Xoa san pham khoi phieu nhap kho
if(isset($_SESSION['inventory']) && isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    foreach ($_SESSION['inventory'] as $inventory_item) {
        if ($inventory_item['product_id'] != $product_id) {
            $product[]= array('product_id'=>$inventory_item['product_id'], 'product_name'=>$inventory_item['product_name'],'product_quantity'=>$inventory_item['product_quantity'],'product_price_import'=>$inventory_item['product_price_import']);
        }
        $_SESSION['inventory'] = $product;
        header('Location:../../index.php?action=inventory&query=inventory_add&message=success');
    }
}
// xoa tat ca
if(isset($_GET['deleteall'])&&$_GET['deleteall']==1){
    unset($_SESSION['inventory']);
    header('Location:../../index.php?action=inventory&query=inventory_add&message=success');
}
// them sanpham vao phiếu nhập
if(isset($_POST['addtoinventory'])){
    // session_destroy();
    $product_id=$_POST['product_id'];
    $product_quantity=$_POST['product_quantity'];
    $product_price_import=$_POST['product_price_import'];
    $sql ="SELECT * FROM product WHERE product_id='".$product_id."' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_product=array(array('product_id'=>$product_id, 'product_name'=>$row['product_name'],'product_quantity'=>$product_quantity,'product_price_import'=>$product_price_import));
        
        //kiem tra session phiếu nhập ton tai
        if(isset($_SESSION['inventory'])){
            $found = false;
            foreach($_SESSION['inventory'] as $inventory_item){
                //neu du lieu trung
                if($inventory_item['product_id']==$product_id){
                    $product[]= array('product_id'=>$inventory_item['product_id'], 'product_name'=>$inventory_item['product_name'],'product_quantity'=>$inventory_item['product_quantity']+$_POST['product_quantity'],'product_price_import'=>$inventory_item['product_price_import']);
                    $found = true;
                }else{
                    //neu du lieu khong trung
                    $product[]= array('product_id'=>$inventory_item['product_id'], 'product_name'=>$inventory_item['product_name'],'product_quantity'=>$inventory_item['product_quantity'],'product_price_import'=>$inventory_item['product_price_import']);
                }
            }
            if($found == false){
                //lien ket du lieu new_product voi product
                $_SESSION['inventory']=array_merge($product,$new_product);
            }else{
                $_SESSION['inventory']=$product;
            }
        }else{
            $_SESSION['inventory'] = $new_product;
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER'].'&message=success');
}

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
