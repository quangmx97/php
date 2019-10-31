<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$tblTable = "sanphampost";
	$data = $db->getID($tblTable, $id);
	

	$tencot = "luotxem";
	$db->SoLanXem($tblTable, $tencot, $id);

?>
<div class="info-title-product"><h3>Thông tin sản phẩm</h3></div>
<div class="product-image">
	<div class="hinhanh-product">
		<img src="admin/<?php echo $data['hinhanh']; ?>" alt="hinhanh" class="img-fluid">
	</div>
	<div class="thongtin-product">
		<h3><?php echo $data['tensanpham']; ?></h3>
		<span><i>Mô tả : </i></span>
		<p><?php echo $data['mota']; ?></p>
		<p><i>Số lượt xem : </i><?php echo $data['luotxem']; ?></p>
		<div class="add-product">
			<a href="index.php?controller=them-gio-hang&id=<?php echo $data['id']; ?>" title="Mua hàng" class="mua-ngay"><img src="image/icon/mua-ngay.png" alt="" class="img-fluid"></a>
			<a href="index.php?controller=them-gio-hang&id=<?php echo $data['id']; ?>" title="Thêm giỏ hàng" class="them-gio">Thêm giỏ hàng</a>
		</div>
	</div>

</div>  <!-- /product-image -->

<!-- <div class="mangxahoi">
	<div class="fb-share-button" data-href="http://localhost:8888/www/webbanquanao_Nam/index.php" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8888%2Fwww%2Fwebbanquanao_Nam%2Findex.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
</div> -->
<div class="noidung">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<!-- Nav tabs --><div class="card">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">Nội dung</a></li>
						<li role="presentation"><a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">Bình luận</a></li>
									<!-- <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
										<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li> -->
									</ul>

									<!-- Tab panes -->
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="content"><?php echo $data['noidung']; ?></div>
										<!-- <div role="tabpanel" class="tab-pane" id="comment">
											<div class="fb-comments" data-href="http://localhost:8080/webdienthoai.com/index.php" data-numposts="5"></div>
										</div> -->
									<!-- <div role="tabpanel" class="tab-pane" id="messages"></div>
										<div role="tabpanel" class="tab-pane" id="settings"></div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- /noidung -->
				<?php
			}
			else{
				header('location: index.php');
			}
			?>