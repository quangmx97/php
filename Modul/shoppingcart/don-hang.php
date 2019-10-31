<?php

$conn = mysqli_connect('localhost', 'root', '', 'websitelaptop');
mysqli_set_charset($conn, 'utf8');

if(isset($_POST['dathang'])){

	if(isset($_SESSION['cart']) && $_SESSION['cart'] !=null){

			// Lấy được thông tin của khách hàng 
		$hovaten = $_POST['hovaten'];
		$sodienthoai = $_POST['sodienthoai'];
		$diachi = $_POST['diachi'];
		$thanhpho = $_POST['thanhpho'];
		$email = $_POST['email'];

		$tongtien = 0;
		foreach($_SESSION['cart'] as $cart){
			$thanhtien = $cart['qty']*$cart['giagoc'];
			$tongtien  = $tongtien+$thanhtien;
		}

		
		$sql  = "INSERT INTO khachhang(id, tenkhachhang, sodienthoai, diachi, email, thanhpho, tongtien)VALUES(null, '$hovaten', '$sodienthoai', '$diachi', '$email', '$thanhpho', '$tongtien')";

		
		// if($db->execute($sql) === TRUE){
		// 	$last_id = $db->connect()->insert_id;
		// 	var_dump($last_id);
		// }

		if(mysqli_query($conn, $sql)){
			$last_id = $conn->insert_id;
			
			// Lấy thông tin sản phẩm có trong giỏ hàng  :
			if(isset($_SESSION['cart']) && $_SESSION['cart'] !=null){
				foreach($_SESSION['cart'] as $cart){
					$thanhtien = $cart['qty']*$cart['giagoc'];
					$sql_oder = "INSERT INTO donhang(id, idKH, idSP, soluong, gia, thanhtien, trangthai)VALUES(null, '$last_id', '$cart[id]', '$cart[qty]', '$cart[giagoc]', '$thanhtien', '0')";

					mysqli_query($conn, $sql_oder);
					$last_id_order = $conn->insert_id;

					// var_dump($cart);

				}
				
				// Lưu id của đối tượng vừa thêm vào session :
				$_SESSION['last_id_order'] = $last_id_order;
				$_SESSION['thanhcong_oder'] = 1;
				// Thực hiện xóa $_SESSION['cart'] :
				unset($_SESSION['cart']);
				header('location: index.php?controller=bao-cao-thanh-cong');
			}
		}

		

	}
	else{
		echo "<p class='alert alert-danger'>Không tồn tại sản phẩm nào trong giỏ hàng , bạn không thể đặt hàng khi không có sản phẩm !</p>";
	}
}



?>

