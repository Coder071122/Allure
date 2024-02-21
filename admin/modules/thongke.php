<?php
require '../../carbon/autoload.php';
include('../config/config.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;
session_start();

if(isset($_POST['thoigian'])) {
    $thoigian = $_POST['thoigian'];
    $_SESSION['metric_date'] = $thoigian;
} else {
    $thoigian = '';
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
}

if ($thoigian == '7ngay') {
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
} elseif ($thoigian == '28ngay') {
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
} elseif ($thoigian == '90ngay') {
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
} elseif ($thoigian == '365ngay') {
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
}

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$sql = "SELECT * FROM metrics WHERE metric_date BETWEEN '$subdays' AND '$now' ORDER BY metric_date ASC";
$sql_query = mysqli_query($mysqli, $sql);

while($val = mysqli_fetch_array($sql_query)) {
    $chart_data[] = array(
        'date' => $val['metric_date'],
        'order' => $val['metric_order'],
        'sales' => $val['metric_sales'],
        'quantity' => $val['metric_quantity']
    );
}
echo $data = json_encode($chart_data);
?>