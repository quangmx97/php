<div class="sanphamtimkiem">
	<h3>Kết quả tìm kiếm</h3>
	<div class="ketqua">
		<div class="sanphammoinhat">
		<?php 

	//require_once('includes/slider.php'); 
		if(isset($_GET['tukhoa'])){
			$tukhoa_get = $_GET['tukhoa'];
			$sql  = "SELECT * FROM sanphampost WHERE tensanpham REGEXP '$tukhoa_get' ORDER BY id DESC";
			$data  = $db->TimKiemSanPham($sql);
				if($data !=0){
				foreach($data as $value){

					?>
					<div class="item-product">
						<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $value['id']; ?>"><img src="admin/<?php echo $value['hinhanh']; ?>" class="img-fluid" alt=""></a>
						<div class="info-product">
							<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $value['id']; ?>" class="tieude-product" title="<?php echo $value['tensanpham']; ?>"><h5><?php echo $value['tensanpham']; ?></h5></a>
							<p class="gia">Giá : <?php echo number_format($value['giagoc'],0); ?>đ</p>
							<a href="index.php?controller=them-gio-hang&id=<?php echo $value['id']; ?>" class="themgio" title="Thêm giỏ hàng">Thêm giỏ hàng</a>
						</div>
					</div>  <!-- /item-product -->

					<?php
				}
			}else
			{
				echo "<p style='color: #f0ad4e; font-weight: bold;'>Không tin thấy sản phẩm nào theo tìm kiếm của bạn</p>";
			}
		}
		?>
		</div>
	</div>
</div>

