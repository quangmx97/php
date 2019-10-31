<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];

	$tblTable = "sanphampost";
	$tblTable_theloai = "tbltheloaisanpham_menu";
	$data = $db->getIDDanhMucCon($tblTable, $id);
	$result = $db->getID($tblTable_theloai, $id);
	?>
	<div class="sanphammoinhat">
		<h3><?php echo $result['txtten']; ?></h3>
		<?php
		if($data!=0){
			foreach($data as $value){

				?>

				<div class="item-product">
					<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $value['id']; ?>"><img src="admin/<?php echo $value['hinhanh']; ?>" class="img-fluid" alt=""></a>
					<div class="info-product">
						<a href="index.php?controller=chi-tiet-san-pham&id=<?php echo $value['id']; ?>" class="tieude-product" title="<?php echo $value['tensanpham']; ?>"><h5><?php echo $value['tensanpham']; ?></h5></a>
						<p class="gia">Giá : <?php echo $value(['giagoc'],0); ?>đ</p>
						<a href="index.php?controller=them-gio-hang&id=<?php echo $value['id']; ?>" class="themgio" title="Thêm giỏ hàng">Thêm giỏ hàng</a>
					</div>
				</div>  <!-- /item-product -->

				<?php
			}
		}
		else{
			echo "Danh mục chưa có sản phẩm nào .";
		}
	}
	?>
</div>