<?php
if(isset($_SESSION['thanhcong_oder'])==1){

	?>
	<div class="dathangthanhcong">
		<h3>Cảm ơn bạn , bạn đã đặt hàng thành công .</h3>
		<img src="image/icon/shopping-cart-orange-hi.png" alt="" width="100px">

		<?php  die; ?>
		<h4>Thông tin đặt hàng của quý khách : </h4>
		<?php



		$id = $_SESSION['last_id_order'];
		$tblTable = 'dondathang';

		$data = $db-> getID($tblTable, $id);
		$key = "id";
		$data_idKH = $data['id'];
		$result_donhang = $db->getOrder($tblTable,$key,$data_idKH);
		

		echo "<li>Tên khách hàng : ".$data['id']."</li>";
		echo "<li>Mã sản phẩm : ".$data['idSP']."</li>";
		echo "<li>Số lượng : ".$data['soluong']."</li>";

		?>


		<table class="table table-bordered table-inverse">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên khách hàng</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Thành tiền</th>
				</tr>
			</thead>
			<tbody>


			</tbody>
		</table>
	</div>
	<?php
}else{


	?>
	
	<div class="dathangthatbai">
		<h4>Bạn đã đặt hàng thất bại</h4>
		<p>Không có bất kỳ sản phẩm nào bạn chọn mua</p>
	</div>

	<?php
}
?>