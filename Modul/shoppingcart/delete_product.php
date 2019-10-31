<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		unset($_SESSION['cart'][$id]);
		header('location: index.php?controller=san-pham-trong-gio-hang');

		// echo "<pre>";
		// 	print_r($_SESSION['cart']);
		// echo "</pre>";
	}
	else{
		header('location: index.php?controller=san-pham-trong-gio-hang');
	}
?>