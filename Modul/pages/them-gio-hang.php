<?php
if(isset($_GET['id'])){
	$idproduct = $_GET['id'];
	
	$tblTable = "sanphampost";
	$data = $db->showlist($tblTable);
	$newproduct = array();

	foreach($data as $val){
		$newproduct[$val['id']] = $val;
	}

	if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null){
		$newproduct[$idproduct]['qty'] = 1;
		$_SESSION['cart'][$idproduct] = $newproduct[$idproduct];
			// echo "<pre>";
			// print_r($newproduct[$idproduct]);
			// echo "</pre>";
	}
	else{
			// echo "<pre>";
			// print_r($_SESSION['cart']);
		if(array_key_exists($idproduct, $_SESSION['cart'])){
			$_SESSION['cart'][$idproduct]['qty'] +=1;
		}
		else{
			$newproduct[$idproduct]['qty'] = 1;
			$_SESSION['cart'][$idproduct] = $newproduct[$idproduct];
		}

	}
	header('location: index.php');
	?>
	<p>Xin chào bạn , bạn đang đến trang thêm giỏ hàng với id  </p>

	<?php
}
else{
	header('location: index.php');
}

?>