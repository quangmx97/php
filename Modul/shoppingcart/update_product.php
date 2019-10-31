<?php
	if(isset($_POST['btnupdate_cart'])){

		foreach($_POST['qty'] as $key=>$val){
			if($val<=0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['qty'] = $val;
			}
		}

		// echo "<pre>";
		// //print_r($_POST['qty']);
		// //print_r($key);
		// echo "</pre>";
	}
	header('location: index.php?controller=san-pham-trong-gio-hang');

?>