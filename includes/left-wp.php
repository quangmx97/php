				<div class="left-wp">
					<div class="item-left">
						<div class="danhmucsanpham">
							<h3><i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm</h3>
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
						</div>  <!-- /danhmucsanpham -->
					</div> <!-- item-left -->

					<div class="item-left">
						<div class="danhmucsanpham">
							<h3><i class="fa fa-phone" aria-hidden="true"></i> Hỗ trợ trực tuyến</h3>
							<li class="hotro">
								<span><img class="icon-sky" src="image/icon/Skype-icon.png" alt="">&nbsp; &nbsp;Mai Xuân Quang</span>
								<br>
								<span><img class="icon-sky" src="image/icon/images.png" alt="">&nbsp; &nbsp;0369.349.211</span>
								<br>
								<span><img class="icon-sky" src="image/icon/facebook-icon-preview-1.png" alt="">&nbsp; &nbsp;<a href="https://www.facebook.com/shin.nakawa.7">FB : Quang</a></span>
							</li>

							<li class="hotro">
								<span><img class="icon-sky" src="image/icon/Skype-icon.png" alt="">&nbsp; &nbsp;Nguyễn Quang Huy</span>
								<br>
								<span><img class="icon-sky" src="image/icon/images.png" alt="">&nbsp; &nbsp;0369.145.254</span>
								<br>
								<span><img class="icon-sky" src="image/icon/facebook-icon-preview-1.png" alt="">&nbsp; &nbsp;<a href="https://www.facebook.com/shin.nakawa.7">FB : Huy</a></span>
							</li>

							<li class="hotro">
								<span><img class="icon-sky" src="image/icon/Skype-icon.png" alt="">&nbsp; &nbsp;Hoàng Minh Hiếu</span>
								<br>
								<span><img class="icon-sky" src="image/icon/images.png" alt="">&nbsp; &nbsp;0369.349.2115</span>
								<br>
								<span><img class="icon-sky" src="image/icon/facebook-icon-preview-1.png" alt="">&nbsp; &nbsp;<a href="https://www.facebook.com/shin.nakawa.7">FB : Hiếu</a></span>
							</li>

							<li class="hotro">
								<span><img class="icon-sky" src="image/icon/Skype-icon.png" alt="">&nbsp; &nbsp;Vi Quang Lưu</span>
								<br>
								<span><img class="icon-sky" src="image/icon/images.png" alt="">&nbsp; &nbsp;0351.212.551</span>
								<br>
								<span><img class="icon-sky" src="image/icon/facebook-icon-preview-1.png" alt="">&nbsp; &nbsp;<a href="https://www.facebook.com/shin.nakawa.7">FB : Lưu</a></span>
							</li>

							<li class="hotro">
								<span><img class="icon-sky" src="image/icon/Skype-icon.png" alt="">&nbsp; &nbsp;Võ Minh Hoàng</span>
								<br>
								<span><img class="icon-sky" src="image/icon/images.png" alt="">&nbsp; &nbsp;0346.123.741</span>
								<br>
								<span><img class="icon-sky" src="image/icon/facebook-icon-preview-1.png" alt="">&nbsp; &nbsp;<a href="https://www.facebook.com/shin.nakawa.7">FB : Hoàng</a></span>
							</li>
						</div>  <!-- /danhmucsanpham -->
					</div> <!-- /item-left -->

					<div class="item-left">
						<div class="danhmucsanpham">
							<h3><i class="fa fa-bars" aria-hidden="true"></i> Sản phẩm nổi bật</h3>
							<img src="https://cdn4.tgdd.vn/Products/Images/44/135254/Slider/-asus-s510uq-i5-8250u-bq475t-tk-new.jpg" alt="" class="img-fluid" width="100%">
							<img src="https://laptop88.vn/media/product/pro_poster_4852.jpg" alt="" class="img-fluid" width="100%">
						</div>  <!-- /danhmucsanpham -->
					</div> <!-- item-left -->

				</div>  <!-- /left-wp -->