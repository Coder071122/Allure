<?php
    session_start();
	include('../../admin/config/config.php');
    $account_id = $_SESSION['account_id'];
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    $customer_gender = $_POST['customer_gender'];

    if (isset($_POST['info_change'])) {
        $sql_update = "UPDATE customer SET customer_name='".$customer_name."', customer_phone='".$customer_phone."', customer_address='".$customer_address."', customer_gender='".$customer_gender."'  WHERE account_id = $account_id";
        
        mysqli_query($mysqli, $sql_update);
        header('Location: ../../index.php?page=my_account&tab=account_info');
    }
?>  