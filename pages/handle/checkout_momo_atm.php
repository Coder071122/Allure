<?php
header('Content-type: text/html; charset=utf-8');

session_start();
include('../../admin/config/config.php');
include('../base/helper_momo.php');

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
    
    $partnerCode = 'MOMOBKUN20180529';
    $accessKey = 'klm05TvNBzhg7h7j';
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

    $orderInfo = "Thanh toán qua MoMo ATM";
    $amount = $_SESSION['total_amount'];
    $orderId = $_SESSION['order_code'];
    $redirectUrl = "http://thinhdh.com/guhastorephp/index.php?page=thankiu";
    $ipnUrl = "http://thinhdh.com/guhastorephp/index.php?page=thankiu";
    $extraData = "";



    $requestId = time() . "";
    $requestType = "payWithATM";

    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array('partnerCode' => $partnerCode,
        'partnerName' => "test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  

    if ($jsonResult['payUrl']) {
        header('Location: ' . $jsonResult['payUrl']);
    } else {
        header('Location:../../index.php?page=404');
    }

    
