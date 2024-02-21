<?php
	session_start();
	include('../../admin/config/config.php');
	//them so luong
	if(isset($_GET['sum'])){
		$status = 1;
		$product_id=$_GET['sum'];
		$sql_get_product = "SELECT * FROM product WHERE product_id = '".$product_id."' LIMIT 1";
		$query_get_product = mysqli_query($mysqli, $sql_get_product);
		$product_item = mysqli_fetch_array($query_get_product);
		$quantity = $product_item['product_quantity'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['product_id']!=$product_id){
				$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$cart_item['product_quantity'],'product_price'=>$cart_item['product_price'],'product_sale'=>$cart_item['product_sale'],'product_image'=>$cart_item['product_image']);
				$_SESSION['cart'] = $product;
			} else{
				$total_count = $cart_item['product_quantity'] + 1;
				if($cart_item['product_quantity']<$quantity){
					$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$total_count,'product_price'=>$cart_item['product_price'],'product_sale'=>$cart_item['product_sale'],'product_image'=>$cart_item['product_image']);
				}else{
					$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$cart_item['product_quantity'],'product_price'=>$cart_item['product_price'],'product_sale'=>$cart_item['product_sale'],'product_image'=>$cart_item['product_image']);
					$status = 0;
				}
				$_SESSION['cart'] = $product;
			}
		}
		if ($status == 1) {
			header('Location:../../index.php?page=cart&message=success');
		} else {
			header('Location:../../index.php?page=cart&message=error');
		}
	}
	//tru so luong
	if(isset($_GET['div'])){
		$product_id=$_GET['div'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['product_id']!=$product_id){
				$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$cart_item['product_quantity'],'product_price'=>$cart_item['product_price'],'product_sale'=>$cart_item['product_sale'],'product_image'=>$cart_item['product_image']);
				$_SESSION['cart'] = $product;
			}else{
				$total_count = $cart_item['product_quantity'] - 1;
				if($cart_item['product_quantity']>1){
					$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$total_count,'product_price'=>$cart_item['product_price'],'product_sale'=>$cart_item['product_sale'],'product_image'=>$cart_item['product_image']);
				}else{
					$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$cart_item['product_quantity'],'product_price'=>$cart_item['product_price'],'product_sale'=>$cart_item['product_sale'],'product_image'=>$cart_item['product_image']);
				}
				$_SESSION['cart'] = $product;
			}
		}
		header('Location:../../index.php?page=cart&message=success');
	}
	// Xoa san pham khoi gio hang
	if(isset($_SESSION['cart']) && isset($_GET['delete'])) {
		$product_id = $_GET['delete'];
		foreach ($_SESSION['cart'] as $cart_item) {
			if ($cart_item['product_id'] != $product_id) {
				$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$cart_item['product_quantity'],'product_price'=>$cart_item['product_price'],'product_sale'=>$cart_item['product_sale'],'product_image'=>$cart_item['product_image']);
			}
			$_SESSION['cart'] = $product;
			header('Location:../../index.php?page=cart&message=success');
		}
	}
	// them sanpham vao gio hang
	if(isset($_POST['addtocart'])){
        // session_destroy();
		$product_id=$_GET['product_id'];
		$product_quantity=$_POST['product_quantity'];
		$sql ="SELECT * FROM product WHERE product_id='".$product_id."' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($query);
		if($row){
			$new_product=array(array('product_id'=>$product_id, 'product_name'=>$row['product_name'],'product_quantity'=>$product_quantity,'product_price'=>$row['product_price'], 'product_sale'=>$row['product_sale'],'product_image'=>$row['product_image']));
			
			//kiem tra session gio hang ton tai
			if(isset($_SESSION['cart'])){
				$found = false;
				foreach($_SESSION['cart'] as $cart_item){
					//neu du lieu trung
					if($cart_item['product_id']==$product_id){
						$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$cart_item['product_quantity']+$product_quantity,'product_price'=>$cart_item['product_price'],'product_sale'=>$row['product_sale'],'product_image'=>$cart_item['product_image']);
						$found = true;
					}else{
						//neu du lieu khong trung
						$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$cart_item['product_quantity'],'product_price'=>$cart_item['product_price'],'product_sale'=>$row['product_sale'],'product_image'=>$cart_item['product_image']);
					}
				}
				if($found == false){
					//lien ket du lieu new_product voi product
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart'] = $new_product;
			}
		}
		header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=success');
	}

	// mua ngay
	if(isset($_POST['buynow'])){
        // session_destroy();
		$product_id=$_GET['product_id'];
		$product_quantity=$_POST['product_quantity'];
		$sql ="SELECT * FROM product WHERE product_id='".$product_id."' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($query);
		if($row){
			$new_product=array(array('product_id'=>$product_id, 'product_name'=>$row['product_name'],'product_quantity'=>$product_quantity,'product_price'=>$row['product_price'], 'product_sale'=>$row['product_sale'],'product_image'=>$row['product_image']));
			
			//kiem tra session gio hang ton tai
			if(isset($_SESSION['cart'])){
				$found = false;
				foreach($_SESSION['cart'] as $cart_item){
					//neu du lieu trung
					if($cart_item['product_id']==$product_id){
						$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$cart_item['product_quantity']+$product_quantity,'product_price'=>$cart_item['product_price'],'product_sale'=>$row['product_sale'],'product_image'=>$cart_item['product_image']);
						$found = true;
					}else{
						//neu du lieu khong trung
						$product[]= array('product_id'=>$cart_item['product_id'], 'product_name'=>$cart_item['product_name'],'product_quantity'=>$cart_item['product_quantity'],'product_price'=>$cart_item['product_price'],'product_sale'=>$row['product_sale'],'product_image'=>$cart_item['product_image']);
					}
				}
				if($found == false){
					//lien ket du lieu new_product voi product
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart'] = $new_product;
			}
		}
		header('Location:../../index.php?page=cart');
	}
	
?>