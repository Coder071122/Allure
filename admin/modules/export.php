<?php
    include('../config/config.php');
    require '../../carbon/autoload.php';
    require("../../vendor/autoload.php");

    use Carbon\Carbon;
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    session_start();

    $thoigian = $_SESSION['metric_date'];
    // Tạo một đối tượng Spreadsheet mới
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    // Cài đặt tiêu đề cho các cột
    $sheet->setCellValue('A1', 'Ngày');
    $sheet->setCellValue('B1', 'Số đơn');
    $sheet->setCellValue('C1', 'Số lượng');
    $sheet->setCellValue('D1', 'Doanh thu');
    

    // Fetch records from database
    if ($thoigian == '7ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    } elseif ($thoigian == '28ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
    } elseif ($thoigian == '90ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
    } elseif ($thoigian == '365ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    }

    unset($_SESSION['metric_date']);
    
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
    $sql = "SELECT * FROM metrics WHERE metric_date BETWEEN '$subdays' AND '$now' ORDER BY metric_date ASC";
    $sql_query = mysqli_query($mysqli, $sql);

    $rowIndex = 2;
    
    if(mysqli_num_rows($sql_query) > 0){
        // Lặp qua từng dòng dữ liệu và ghi vào file Excel
        while($row = mysqli_fetch_array($sql_query)){
            $sheet->setCellValue('A' . $rowIndex, $row['metric_date']);
            $sheet->setCellValue('B' . $rowIndex, $row['metric_order']);
            $sheet->setCellValue('C' . $rowIndex, $row['metric_sales']);
            $sheet->setCellValue('D' . $rowIndex, $row['metric_quantity']);
            $rowIndex++;
        }
    } else {
        $sheet->setCellValue('A' . $rowIndex, 'No records found...');
    }
    
    // Lưu file Excel
    $writer = new Xlsx($spreadsheet);
    $fileName = 'thongke_' . date('Y-m-d') . '.xlsx';
    $writer->save($fileName);
    
    // Đặt header cho việc tải xuống file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');
    header('index.php?action=product&query=product_list&message=success');
    
    // Đọc dữ liệu từ file và ghi vào output buffer
    $writer->save('php://output');
?>