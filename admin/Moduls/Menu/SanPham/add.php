<?php

if(isset($_POST['txtThemTheLoai'])){
	$error = array();
	$succ = array();

	if(empty($_POST['txtTen'])){
		$error[] = 'txtTen';
	}
	else{
		$txtTen = $_POST['txtTen'];
	}

	$txtTinhTrang = $_POST['txtTinhTrang'];

	if(isset($txtTen)){
		$db = new database;
		$db->connect();
		$sql_check = "SELECT * FROM tbltheloaisanpham_menu WHERE txtten = '$txtTen'";
		$num_row = $db->check($sql_check);

		if($num_row == TRUE){
			$sql = "INSERT INTO tbltheloaisanpham_menu(txtten, txttinhtrang)VALUES('$txtTen', '$txtTinhTrang')";
			$db->add($sql);
			$succ[] = 'thanhcong';
			// if($db->add($sql)){
			// 	$succ[] = 'thanhcong';
			// }
			// else{
			// 	$error[] = 'thatbai';
			// }
		}
		else{
			$error[] = 'trungten';
		}
		
	}
}


?>
<div style="float: left;" class="col-md-6">
	<div class="danhmuccha">
		<form action="" method="POST" role="form">
			<legend>Thêm thể loại</legend>

			<div class="form-group">
				<label for="">Tên thể loại</label>
				<input type="text" class="form-control" id="" name="txtTen" placeholder="Tên thể loại">
				<?php if(isset($error)&&in_array('txtTen', $error)){
					echo "<p style='color: red'; class='loinhap'>Bạn cần nhập tên thể loại.</p>";
				}  ?>
			</div>
			<div class="form-group">
				<label for="">Trạng thái</label><br>
				<span><input type="radio" name="txtTinhTrang" checked="true" value="1"> Hiện</span>
				<span><input type="radio" name="txtTinhTrang" value="0"> Ẩn</span>
			</div>
			<button type="submit" name="txtThemTheLoai" class="btn btn-primary">Thêm thể loại</button>
		</form>
	</div>
	<?php
	if(isset($error)&&in_array('trungten', $error)){
		echo "<p style='color:red'>Tên thể loại bị trùng !</p>";
	}

	if(isset($succ)&&in_array('thanhcong', $succ)){
		echo "<p style='color:green'>Tên thể loại Thành công !</p>";
	}

	if(isset($error)&&in_array('thatbai', $error)){
		echo "<p style='color:red'>Thêm thất bại ... !</p>";
	}
	?>
</div>