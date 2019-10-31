<?php 

	
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}
	else{
		$action = "";
	}

	

	switch($action){
		case 'cap-nhat-don-hang':{
			include "Moduls/DonHang/cap-nhat-don-hang.php";
			break;
		}

		case 'xoa-don-hang':{
			if(isset($_GET['MaDDH'])){
				$MaDDH = $_GET['MaDDH'];
				$db->DeleteOrder($MaDDH);
				header('location: index.php?controller=quan-ly-don-hang');
			}
			//include "Moduls/DonHang/xoa-don-hang.php";
			break;
		}

		case 'chi-tiet-don-hang':{
			if(isset($_GET['MaDDH'])){
				$MaDDH = $_GET['MaDDH'];
				$dataDonHang = $db->ChiTietDonDatHang($MaDDH);
			}
			include "Moduls/DonHang/chi-tiet-don-hang.php";
			break;
		}

		case 'danh-sach-don-hang':{

			$dataDonHang = $db->showOrder();
			include "Moduls/DonHang/danh-sach-don-hang.php";
			break;
		}

		default:{
			$dataDonHang = $db->showOrder();
			include "Moduls/DonHang/danh-sach-don-hang.php";
			break;
		}
	}

 ?>