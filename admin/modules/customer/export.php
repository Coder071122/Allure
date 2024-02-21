<?php
    include('../../config/config.php');
    require("../../../vendor/autoload.php");
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    
    // Tạo một đối tượng Spreadsheet mới
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    // Cài đặt tiêu đề cho các cột
    $sheet->setCellValue('A1', 'Customer ID');
    $sheet->setCellValue('B1', 'Account ID');
    $sheet->setCellValue('C1', 'Customer name');
    $sheet->setCellValue('D1', 'Customer gender');
    $sheet->setCellValue('E1', 'Customer email');
    $sheet->setCellValue('F1', 'Customer phone');
    $sheet->setCellValue('G1', 'Customer address');
    
    // Fetch records from database
    $query_product = mysqli_query($mysqli, "SELECT * FROM customer ORDER BY customer_id ASC");
    $rowIndex = 2;
    
    if(mysqli_num_rows($query_product) > 0){
        // Lặp qua từng dòng dữ liệu và ghi vào file Excel
        while($row = mysqli_fetch_array($query_product)){
            $sheet->setCellValue('A' . $rowIndex, $row['customer_id']);
            $sheet->setCellValue('B' . $rowIndex, $row['account_id']);
            $sheet->setCellValue('C' . $rowIndex, $row['customer_name']);
            $sheet->setCellValue('D' . $rowIndex, $row['customer_gender']);
            $sheet->setCellValue('E' . $rowIndex, $row['customer_email']);
            $sheet->setCellValue('F' . $rowIndex, $row['customer_phone']);
            $sheet->setCellValue('G' . $rowIndex, $row['customer_address']);
            $rowIndex++;
        }
    } else {
        $sheet->setCellValue('A' . $rowIndex, 'No records found...');
    }
    
    // Lưu file Excel
    $writer = new Xlsx($spreadsheet);
    $fileName = 'customer-data_' . date('Y-m-d') . '.xlsx';
    $writer->save($fileName);
    
    // Đặt header cho việc tải xuống file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');
    header('index.php?action=product&query=product_list&message=success');
    
    // Đọc dữ liệu từ file và ghi vào output buffer
    $writer->save('php://output');
?>