<?php
include('../../config/config.php');
require("../../../vendor/autoload.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['import_product'])) {
    $fileName = $_FILES['file_import']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['file_import']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        $count = "0";
        print_r($data);
        foreach ($data as $row) {
            if ($count > 0) {
                $product_name = $row['0'];
                $product_price_import = $row['1'];
                $product_price = $row['2'];
                $product_description = $row['3'];
                $sql_add = "INSERT INTO product(product_name, product_category, product_brand, capacity_id, product_price_import, product_price, product_sale, product_description, product_image, product_status) VALUE('" . $product_name . "', '0', '0', '0', '" . $product_price_import . "', '" . $product_price . "', '0', '" . $product_description . "', 'guha.png', '0')";
                mysqli_query($mysqli, $sql_add);
                $msg = true;
            } else {
                $count = "1";
            }
        }

        if (isset($msg)) {
            header('Location: ../../index.php?action=product&query=product_list&message=success');
            exit(0);
        } else {
            header('Location: ../../index.php?action=product&query=product_list&message=error');
            exit(0);
        }
    } else {
        header('Location: ../../index.php?action=product&query=product_list&message=orror');
        exit(0);
    }
}
