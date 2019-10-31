2		<?php
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$table = "sanphampost";
			$data = $db->showlist($table);

			$tblTable = "tbltheloaiconsanpham_menu";
			$data_ID = $db->getData_IdHomeProduct($id, $tblTable);
		}
		 // include "Modul/slider.php";
		?>

		<div class="thongtintrang">
			<?php include "Modul/thong-tin-trang.php"; ?>
		</div>

		<div class="left">
			<?php include "Modul/left.php"; ?>
		</div>
		<div class="content">
			<div class="trungbaysanpham">

				<!-- <h2>Sản phẩm nổi bật</h2> -->
				<?php 
				$table = "tbltheloaiconsanpham_menu";
				$data_danhmuc = $db->showlist($table);

				foreach($data_danhmuc as $value_danhmuc){
					$tendanhmuccon =  $value_danhmuc['txttendanhmuccon'];
					$sql = "SELECT * FROM sanphampost WHERE idloaitin IN(
					SELECT id FROM tbltheloaiconsanpham_menu WHERE txttendanhmuccon = '$tendanhmuccon')";

					$data_category_product = $db->GetDataCategory($sql);
					if($data_category_product!=0){
						?>

						<span>
							<h2><?php echo $tendanhmuccon; ?></h2>
						</span>

						<div class="sanpham-wp">
							<?php
							$num = 1;
							foreach($data_category_product as $value_category_product){
								?>

								<div class="sanpham-item-wp">
									<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $value_category_product['id']; ?>"><img src="admin/<?php echo $value_category_product['hinhanh']; ?>" alt="" class="img-fluid">
										<h3><?php echo $value_category_product['tensanpham']; ?></h3>
									</a>
									<p class="gia"><?php echo number_format($value_category_product['giagoc'],0); ?> đ/<?php echo $value_category_product['soluong']; ?>g</p>
									<span>
										<a class="chitiet-wp" href="index.php?controller=chi-tiet-san-pham&id=<?php echo $value_category_product['id']; ?>" title="Chi tiết">Chi tiết</a>
										<a class="muangay-wp" href="index.php?controller=gio-hang&action=them-vao-gio-hang&id=<?php echo $value_category_product['id']; ?>" title="Mua ngay">Mua ngay</a>
									</span>
								</div> <!--  / sanpham-item-wp -->

								<?php
								$num++;
								if($num==7){
									break;
								}
							}
						}
						else{

						}
						?>
					</div>

					<?php
				}
				?>

			</div>  <!-- /trung bay san pham -->
		</div>