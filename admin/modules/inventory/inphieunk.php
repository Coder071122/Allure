<?php
	require('../../config/config.php');
    require('../../../tfpdf/tfpdf.php');

	$pdf = new tFPDF();
	$pdf->AddPage("0");

	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',15);
	
	$pdf->SetFillColor(193,229,252);
	//set header 

    $inventory_code = $_GET['inventory_code'];
    $sql_inventory_info = "SELECT * FROM inventory WHERE inventory_code = $inventory_code LIMIT 1";
    $query_inventory_info = mysqli_query($mysqli, $sql_inventory_info);
    $row_info = mysqli_fetch_array($query_inventory_info);
    
    $sql_inventory_detail = "SELECT * FROM product pd join inventory_detail iv ON pd.product_id = iv.product_id WHERE iv.inventory_code = $inventory_code";
    $query_inventory_detail = mysqli_query($mysqli, $sql_inventory_detail);
	
	// $pdf->Image('../../images/logoadmin.png',50,50);
	$pdf->Ln(10);
	$pdf->Cell(0,0,'PHIẾU NHẬP KHO',0,0,'C');
	$pdf->Ln(20);

	$pdf->Write(10,"Mã phiếu nhập: ".$row_info['inventory_code']."");
	$pdf->Ln(10);

	$pdf->Write(10,"Thời gian nhập: ".$row_info['inventory_date']."");
	$pdf->Ln(20);

	$pdf->Write(10,"Nhân viên nhập: ".$row_info['staf_name']."");
	$pdf->Ln(10);

	$pdf->Write(10,"Tên nhà cung cấp: ".$row_info['supplier_name']."");
	$pdf->Ln(10);

	$pdf->Write(10,"SĐT nhà cung cấp: ".$row_info['supplier_phone']."");
	$pdf->Ln(20);


	$width_cell=array(10,20,150,25,30,40);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã SP',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Tổng tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
    $total = 0;
	while($row = mysqli_fetch_array($query_inventory_detail)){
		$i++;
        $total += $row['product_price_import']*$row['product_quantity'];
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['product_id'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['product_name'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['product_quantity'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['product_price_import']).'đ',1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,number_format($row['product_price_import']*$row['product_quantity']).'đ',1,1,'C',$fill);
	$fill = !$fill;

	}
	$pdf->Write(10,'Tổng tiền hàng phải thành toán là: '.number_format($total).'đ');
	$pdf->Ln(20);

    $pdf->Write(10,'Cửa hàng nước hòa Guha cảm ơn bạn đã sử dụng dịch vụ.');
	$pdf->Ln(10);

	$pdf->Output(); 
?>