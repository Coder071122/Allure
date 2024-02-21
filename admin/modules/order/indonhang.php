<?php
	require('../../config/config.php');
    require('../../../tfpdf/tfpdf.php');

	$pdf = new tFPDF();
	$pdf->AddPage("0");

	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',15);
	
	$pdf->SetFillColor(193,229,252);
	//set header 

	$order_code = $_GET['order_code'];
    $sql_order_detail_list = "SELECT od.order_detail_id, p.product_id, p.product_name, od.order_code, od.product_quantity, od.product_price, od.product_sale, p.product_image FROM order_detail od JOIN product p ON od.product_id = p.product_id WHERE od.order_code = '" . $order_code . "' ORDER BY od.order_detail_id DESC";
    $query_order_detail_list = mysqli_query($mysqli, $sql_order_detail_list);

    $sql_order = "SELECT * FROM orders JOIN delivery ON orders.delivery_id = delivery.delivery_id WHERE orders.order_code = '" . $order_code . "' LIMIT 1";
    $query_order = mysqli_query($mysqli, $sql_order);
    $row_info = mysqli_fetch_array($query_order);
	
	// $pdf->Image('../../images/logoadmin.png',50,50);
	$pdf->Ln(10);
	$pdf->Cell(0,0,'Hóa đơn bán hàng',0,0,'C');
	$pdf->Ln(20);

	$pdf->Write(10,"Mã đơn hàng: ".$row_info['order_code']."");
	$pdf->Ln(10);

	$pdf->Write(10,"Thời gian: ".$row_info['order_date']);
	$pdf->Ln(20);

	$pdf->Write(10,"Tên khách hàng: ".$row_info['delivery_name']);
	$pdf->Ln(10);

	$pdf->Write(10,"SĐT khách hàng: ".$row_info['delivery_phone']);
	$pdf->Ln(10);

	$pdf->Write(10,"Địa chỉ khách hàng: ".$row_info['delivery_address']);
	$pdf->Ln(20);

	$width_cell=array(10,20,150,25,30,40);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã SP',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Đơn giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Thành tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
    $total = $row_info['total_amount'];
	while($row = mysqli_fetch_array($query_order_detail_list)){
		$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['product_id'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['product_name'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['product_quantity'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['product_price'] - ($row['product_price'] / 100 * $row['product_sale'])).'đ',1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,number_format(($row['product_price'] - ($row['product_price'] / 100 * $row['product_sale']))*$row['product_quantity'])."đ",1,1,'C',$fill);
	$fill = !$fill;

	}
	$pdf->Write(10,'Tổng tiền đơn hàng: '.number_format($total).'đ');
	$pdf->Ln(20);

    $pdf->Write(10,'Cửa hàng nước hòa Guha cảm ơn bạn đã sử dụng dịch vụ.');
	$pdf->Ln(10);

	$pdf->Output(); 
?>