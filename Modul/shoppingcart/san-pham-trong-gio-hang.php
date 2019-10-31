<div class="viewcart">
	<h3>Danh sách Sản phẩm đã thêm vào giỏ hàng </h3>
	<form action="index.php?controller=cap-nhat-gio-hang" method="POST" enctype="multipart/form-data">
		<table class="table table-inverse table-bordered">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Thành tiền</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$tongTien = 0;
				$stt = 1;
				if(isset($_SESSION['cart']) && $_SESSION['cart'] != null){
					foreach($_SESSION['cart'] as $cart){
						?>
						<tr>
							<td><?php echo $stt; ?></td>
							<td><?php echo $cart['tensanpham']; ?></td>
							<td><img src="admin/<?php echo $cart['hinhanh']; ?>" alt="" width="60px" height="auto"></td>
							<td><input type="text" name="qty[<?php echo $cart['id'] ?>]" value="<?php echo $cart['qty']; ?>" size="1"></td>
							<td><?php echo number_format($cart['giagoc'],0); ?></td>
							<td><?php echo number_format($cart['qty']*$cart['giagoc'], 0); ?></td>
							<td><a href="index.php?controller=xoa-san-pham-trong-gio&id=<?php echo $cart['id']; ?>" title="Xóa"><span style='width: 30px'><i class="fa fa-trash-o" aria-hidden="true"></i></span></a></td>
						</tr>
						<?php
						$tongTien = $tongTien+$cart['qty']*$cart['giagoc'];
						$stt++;
					}
					?>
					<tr>
						<td>&nbsp;</td>
						<td colspan="4"><span class="capnhatgiohang">Tổng tiền</span>  = </td>
						<td colspan="2"><strong><?php echo number_format($tongTien,0); ?> </strong>VNĐ</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<!-- <input type="submit" value="Cập nhật giỏ hàng" name="btnupdate_cart"> -->
		<button name="btnupdate_cart" id="capnhatgiohang"><span class="capnhatgiohang"><img src="image/icon/viet-ung-dung-tao-gio-hang-bang-php-shopping-cart-phan-2.png" alt="" width="25">Cập nhật giỏ hàng</span></button>

		<button id="capnhatgiohang"><span class="capnhatgiohang"><img src="image/icon/timthumb.png" alt="" width="23.5"><a href="index.php" title="Tiếp tục mua hàng">Tiếp tục mua hàng</a></span></button>
	</form>
</div>  <!-- /viewcart -->

<div class="thongtindathang">
	<h3>Thông tin đặt hàng của Qúy khách </h3>
	<div class="col-md-12">
		<form action="index.php?controller=dat-hang" method="POST" role="form" enctype="multipart/form-data">
			<div class="col-md-6">
				<legend>Thông tin đặt hàng</legend>

				<div class="form-group">
					<label for="">Họ và tên (*)</label>
					<input type="text" name="hovaten" class="form-control" id="" placeholder="Họ và tên" required="">
				</div>

				<div class="form-group">
					<label for="">Số điện thoại (*)</label>
					<input type="text" class="form-control" name="sodienthoai" placeholder="VD : 0982039380 " required="">
				</div>

				<div class="form-group">
					<label for="">Thành phố (*)</label>
					<input type="text"  name="thanhpho" class="form-control" placeholder="Thành phố" required="">
				</div>

				<div class="form-group">
					<label for="">Địa chỉ (*)</label>
					<textarea class="form-control" name="diachi" placeholder="Địa chỉ chi tiết : Đường (Phố, tổ), Xóm (Ngõ), xã , huyện ...." required=""></textarea>
				</div>

				<div class="form-group">
					<label for="">Email </label>
					<input type="text" class="form-control" name="email" placeholder="Email">
				</div>
				

			</div>

			<div class="col-md-6">
				<legend>Hình thức thanh toán</legend>
				<p><input type="checkbox" checked="true"><span> Thanh toán khi nhận hàng .</span></p>
				<p><input type="checkbox" ><span> Thanh toán qua chuyển khoản ngân hàng.</span></p>
			</div>

			<div class="col-md-12">

				<button type="submit" name="dathang" class="btn btn-warning">Đặt hàng</button>
				<p><i><strong>Lưu ý </strong>: các trường có dấu (*) không được bỏ trống !</i></p>
			</div>
		</form>
	</div>

</div>

<?php
	require_once('don-hang.php');
?>