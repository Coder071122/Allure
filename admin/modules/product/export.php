<?php
    include('../../config/config.php');
    require("../../../vendor/autoload.php");
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    
    // Tạo một đối tượng Spreadsheet mới
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    // Cài đặt tiêu đề cho các cột
    $sheet->setCellValue('A1', 'Product Name');
    $sheet->setCellValue('B1', 'Product price import');
    $sheet->setCellValue('C1', 'Product price');
    $sheet->setCellValue('D1', 'Product description');
    
    // Fetch records from database
    $query_product = mysqli_query($mysqli, "SELECT * FROM product ORDER BY product_id ASC");
    $rowIndex = 2;
    
    if(mysqli_num_rows($query_product) > 0){
        // Lặp qua từng dòng dữ liệu và ghi vào file Excel
        while($row = mysqli_fetch_array($query_product)){
            $status = ($row['product_status'] == 1) ? 'Active' : 'Inactive';
            $sheet->setCellValue('A' . $rowIndex, $row['product_name']);
            $sheet->setCellValue('B' . $rowIndex, $row['product_price_import']);
            $sheet->setCellValue('C' . $rowIndex, $row['product_price']);
            $sheet->setCellValue('D' . $rowIndex, $row['product_description']);
            $rowIndex++;
        }
    } else {
        $sheet->setCellValue('A' . $rowIndex, 'No records found...');
    }
    
    // Lưu file Excel
    $writer = new Xlsx($spreadsheet);
    $fileName = 'product-data_' . date('Y-m-d') . '.xlsx';
    $writer->save($fileName);
    
    // Đặt header cho việc tải xuống file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');
    header('index.php?action=product&query=product_list&message=success');
    
    // Đọc dữ liệu từ file và ghi vào output buffer
    $writer->save('php://output');
?>