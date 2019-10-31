				<?php //include "Modul/slider.php";
				if(isset($_POST['dathang'])){
					$HoVaTen = $_POST['hovaten'];
					$SoDienThoai = $_POST['sodienthoai'];
					$DiaChi = $_POST['diachi'];
					$Email = $_POST['email'];
					$ThanhPho = $_POST['thanhpho'];

					$success = array();

					if($db->XuLyDonHang($HoVaTen, $SoDienThoai, $DiaChi, $Email, $ThanhPho)==TRUE){

						// Lưu id của đối tượng vừa thêm vào session :
						$_SESSION['last_id_order'] = $last_id_order;
						$_SESSION['thanhcong_oder'] = 1;
						header('location: index.php?controller=bao-cao-thanh-cong');
					}
				}

				?>