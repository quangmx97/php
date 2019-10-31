<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Web bán laptop </title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link type="image/x-icon" rel="short-cut icon" href="images/icon/Logo1.png">
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/style.css">
	<link rel="stylesheet" href="public/font-awesome/css/font-awesome.css">
</head>
<body>
	<div class="container-wp">
		<div class="header">
			<div class="topbar-wp">
				<div class="container">
					<div class="bar-left">
						<p>Cửu hàng laptop TECHONE - Chuyên cung cấp laptop chính hãng</p>
					</div>
					<div class="bar-right">
						<span><i class="fa fa-envelope-o" aria-hidden="true"></i> laptopchinhhang@gmail.com</span>
						<span><i class="fa fa-phone" aria-hidden="true"></i> 0383143197</span>
						<!-- <span><a href="admin/index.php">Đăng nhập</a></span> -->
					</div>
				</div>
			</div>  

			<div class="logo-wp">
				<div class="container">
					<div class="logo">
						<a href="index.php"><img src="image/logo/logo2.png" width="150px" alt="logo" class="img-fluid"></a>
					</div>
					<div class="info-wp">
						<div class="item-giaohang">
							<img src="image/info-wp/giao-hang-toan-quoc.png" alt="giao-hang" class="img-fluid">
							<h5>Ship dịch vụ COD</h5>
							<p>trên phạm vi toàn quốc</p>
						</div>

						<div class="item-giaohang">
							<img src="image/info-wp/tu-van-mien-phi.png" alt="giao-hang" class="img-fluid">
							<h5>0335.639.658</h5>
							<h5>0383143.197</h5>
						</div>

						<div class="item-giaohang">
							<img src="image/info-wp/thanh-toan-khi-nhan-hang.png" alt="giao-hang" class="img-fluid">
							<h5>Thanh toán</h5>
							<p>Khi nhận hàng trên toàn quốc</p>
						</div>

						<div class="item-giaohang" style="float: right;margin-right: 0px">
							<form action="" method="GET">
								<tr>
									<td><input type="text" name="tukhoa" placeholder="Từ khóa"></td>
									<td><button><i class="fa fa-search" aria-hidden="true"></i></button></td>
								</tr>
								<input type="hidden" name="controller" value="tim-kiem">
							</form>
						</div>
						
					</div>
					<div class="search-wp">

					</div>
				</div> <!--  /container -->
			</div> <!--  /logo-wp -->
			<div class="clear"></div>


		</div> <!--  /header -->
		<div class="menu-wp">
			<div class="container">
				<ul>
					<li><a href="index.php">Trang chủ</a></li>
					<?php
					$tblTable = "tbltheloaisanpham_menu";
					$data = $db->showlist($tblTable);
					foreach($data as $dt){
						?>
						<li><a href="#"><?php echo $dt['txtten']; ?>&nbsp; <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
							<ul>
								<?php 
								$idcon = $dt['id'];
								$tblTable_con = "tbltheloaiconsanpham_menu";
								$data_con = $db->getIDDanhMucCon($tblTable_con, $idcon);
								if($data_con != 0){
									foreach($data_con as $dtcon){
										?>
										<li><a href="index.php?controller=loai-san-pham&id=<?php echo $dtcon['id']; ?>"><?php echo $dtcon['txttendanhmuccon']; ?></a></li>
										<?php 
									}
								}
								?>
							</ul>
						</li>
						<?php
					}
					?>

					<li><a href="">Liên hệ</a></li>
					<!-- <?php
					$total = 0;
					if(isset($_SESSION['cart']) && $_SESSION['cart'] != null){
						foreach($_SESSION['cart'] as $list){
							$total += $list['qty'];
						}
					}
					?> -->
					<li><img src="image/icon/viet-ung-dung-tao-gio-hang-bang-php-shopping-cart-phan-2.png" alt="" width="20px" height="auto"> <a href="index.php?controller=san-pham-trong-gio-hang">Giỏ hàng :</a>  <?php echo "<span style='color:red; font-weight: bold'><a href='index.php?controller=san-pham-trong-gio-hang'>".$total."</a></span>"; ?></li>
				</ul>

				
			<!-- 	<img src="image/icon/viet-ung-dung-tao-gio-hang-bang-php-shopping-cart-phan-2.png" alt="" width="20px" height="auto">

				<h5>&nbsp;</h5>
				<p></p> -->
				

			</div>
			</div> <!-- /menu-wp -->