					<?php require_once('includes/slider.php'); ?>

					<div class="sanphammoinhat">
						<h3>Danh sách sản phẩm</h3>
						<?php
						$tblTable = "sanphampost";
						$data = $db->showlist_10($tblTable);
						foreach($data as $dt){
							?>
							<div class="item-product">
								<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $dt['id']; ?>"><img src="admin/<?php echo $dt['hinhanh']; ?>" class="img-fluid" alt=""></a>
								<div class="info-product">
									<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $dt['id']; ?>" class="tieude-product"><h5><?php echo $dt['tensanpham']; ?></h5></a>
									<p class="gia">Giá : <?php echo number_format($dt['giagoc'],0); ?>đ</p>
									<a href="index.php?controller=them-gio-hang&id=<?php echo $dt['id']; ?>" class="themgio" title="Thêm giỏ hàng">Thêm giỏ hàng</a>
								</div>
							</div>  <!-- /item-product -->
							<?php
						}
						?>

					</div> <!--  /sanphammoinhat -->

					<div class="sanphammoinhat">  <!-- Sản phẩm bán chạy nhất -->
						<h3>Sản phẩm nhiều lượt xem nhất</h3>

					<?php
						$tblTable = "sanphampost";
						$tencot = "luotxem";
						$data = $db->luotviewnhieu($tblTable,$tencot);

						foreach($data as $value){
					?>

						<div class="item-product">
							<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $value['id']; ?>"><img src="admin/<?php echo $value['hinhanh']; ?>" class="img-fluid" alt=""></a>
							<div class="info-product">
								<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $value['id']; ?>" class="tieude-product"><h5><?php echo $value['tensanpham']; ?></h5></a>
								<p class="gia">Giá : <?php echo number_format($value['giagoc'],0); ?>đ</p>
								<a href="index.php?controller=them-gio-hang&id=<?php echo $value['id']; ?>" class="themgio">Thêm giỏ hàng</a>
							</div>
						</div>  <!-- /item-product -->
					<?php
						}
					?>

				</div> <!--  /sanphammoinhat => sản phẩm bán chạy nhất-->

				<!-- <div class="fb-comments" data-href="http://localhost:8888/www/webbanmypham.com/index.php" data-numposts="5"></div> -->