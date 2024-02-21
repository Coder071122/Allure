<?php 
    session_start();
    include('../../admin/config/config.php');
    require '../../carbon/autoload.php';

    use Carbon\Carbon;
    if (isset($_SESSION['account_id'])) {
        if (isset($_POST['evaluate_add'])) {
            $product_id = $_GET['product_id'];
            $account_id = $_SESSION['account_id'];
            $evaluate_rate = $_POST['rate'];
            $evaluate_content = $_POST['evaluate_content'];
            $evaluate_date = Carbon::now('Asia/Ho_Chi_Minh');

            $query_account = mysqli_query($mysqli, "SELECT * FROM account WHERE account_id = '$account_id' LIMIT 1");
            $account = mysqli_fetch_array($query_account);

            $sql_insert = "INSERT INTO evaluate (account_id, product_id, account_name, evaluate_rate, evaluate_content, evaluate_date, evaluate_status) VALUES ('$account_id', '$product_id', '".$account['account_name']."', '$evaluate_rate', '$evaluate_content', '$evaluate_date', 1)";
            $query_insert = mysqli_query($mysqli, $sql_insert);

            header('Location:../../index.php?page=product_detail&product_id='.$_GET['product_id'].'&message=accept');
        }
    } else {
        header('Location:../../index.php?page=product_detail&product_id='.$_GET['product_id'].'$message=warning');
    }
