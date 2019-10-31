<div class="footer">
		<div class="container">
			<div class="col-md-4">
				<div class="footer-wp">
					<div class="info">
						<h3>Về chúng tôi</h3>
						<div class="info-body">
							<p>TECHONE TDM Chuyên cung cấp các dòng laptop chính hãng , Uy tín , đảm bảo , cam kết chất lượng về sản phẩm .</p>
							<p>Địa chỉ : Yên Hòa,Cầu Giấy , Hà Nội</p>
							<p>SĐT : 0383.143.197 ( Mr.Quang )</p>
						</div>
					</div>
				</div>
			</div> <!--  /col-md-4 -->

			<div class="col-md-4">
				<div class="footer-wp">
					<div class="info">
						<h3>Thông tin chung</h3>
						<div class="info-body">
							<li><a href="">Giới thiệu về Cty</a></li>
							<li><a href="">Năng lực sản xuất</a></li>
							<li><a href="">Thư ngỏ đối tác bán hàng</a></li>
						</div>

						<h3>Hướng dẫn </h3>
						<div class="info-body">
							<li><a href="">Hướng dẫn đặt hàng</a></li>
							<li><a href="">Hình thức thanh toán</a></li>
							<li><a href="">Thư ngỏ đối tác bán hàng</a></li>
							<li><a href="">Dịch vụ chuyển SHIP COD</a></li>
						</div>
					</div>
				</div>
			</div> <!--  /col-md-4 -->


			<div class="col-md-4">
				<div class="footer-wp">
					<div class="info">
						<h3>Danh mục sản phẩm</h3>
						<ul>
							<?php
									$tblTable = "tbltheloaiconsanpham_menu";
									// Hiện ra 10 bản ghi danh mục sản phẩm mới nhất
									$data = $db->showlist_10($tblTable);
									foreach($data as $dtcon){
								?>
								<li><a href="index.php?controller=loai-san-pham&id=<?php echo $dtcon['id']; ?>"><?php echo $dtcon['txttendanhmuccon']; ?></a></li>
								<?php
									}
								?>

						</ul>
					</div>
				</div>
			</div> <!--  /col-md-4 -->

		</div>
	</div>  <!-- /footer -->
	<div class="footerbar">
		<div class="container">
			<p style="text-align: center">&copy Copyright 2019 - Bài tập lớn </p>
		</div>
	</div>

</div> <!-- /container-wp -->

<script type="text/javascript" src="public/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>