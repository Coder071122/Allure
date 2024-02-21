<?php
session_start();
include('../../config/config.php');
$data = $_GET['data'];
$customer_ids = json_decode($data);
echo $_SESSION['account_type'];
if (isset($_GET['delete']) && $_GET['delete'] == 1) {
    if ($_SESSION['account_type'] == 2) {
        foreach ($customer_ids as $id) {
            $sql_delete = "DELETE FROM customer WHERE customer_id = '" . $id . "'";
            mysqli_query($mysqli, $sql_delete);
        }
        header('Location: ../../index.php?action=customer&query=customer_list&message=success');
    } else {
        header('Location: ../../index.php?action=customer&query=customer_list&message=error');
    }

    
}
?>