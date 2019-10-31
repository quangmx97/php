<?php

if(isset($_POST['btndanhmuccon'])){
	$error = array();
	$success = array();

	if(empty($_POST['idtheloai'])){
		$error[] = 'idtheloai';
	}
	else{
		$idtheloai = $_POST['idtheloai'];
	}

	if(empty($_POST['txttendanhmuccon'])){
		$error[] = 'txttendanhmuccon';
	}
	else{
		$txttendanhmuccon = $_POST['txttendanhmuccon'];
	}

	$txttrangthai = $_POST['txttrangthai'];
	if(isset($idtheloai) && isset($txttendanhmuccon)){

		$sql_kiemtra = "SELECT * FROM tbltheloaiconsanpham_menu WHERE txttendanhmuccon = '$txttendanhmuccon'";
		$num_row = $db->check($sql_kiemtra);
		if($num_row == TRUE){
			$sql = "INSERT INTO tbltheloaiconsanpham_menu(id, idtheloai, txttendanhmuccon, txttrangthai)VALUES(null, '$idtheloai', '$txttendanhmuccon', '$txttrangthai')";
			$db->add($sql);
			$success[] = 'thanhcong';
		}
		else{
			$error[] = 'loitrung';
		}
	}
}


?>					
<div style="float: left;" class="col-md-6">
	<div class="danhmuccha">
		<form action="" method="POST" role="form">
			<legend>Thêm danh mục con</legend>
			<div class="form-group">
				<label for="">Chọn thể loại</label>
				<select name="idtheloai" id="" class="form-control">
					<?php 
					$tblTable = "tbltheloaisanpham_menu";
					$data = $db->showlist($tblTable);

					foreach($data as $tl){
						?>
						<option value="<?php echo $tl['id']; ?>"><?php echo $tl['txtten']; ?></option>
						<?php
					}
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="">Tên danh mục con</label>
				<input type="text" class="form-control" name="txttendanhmuccon" placeholder="Danh mục con">
				<?php   
				if(isset($error)&&in_array('txttendanhmuccon', $error)){
					echo "<p class='loinhap'>Bạn cần nhập tên danh mục cho</p>";
				}
				?>
			</div>

			<div class="form-group">
				<label for="">Trạng thái</label><br>
				<span><input type="radio" name="txttrangthai" checked="true" value="1"> Hiện</span>
				<span><input type="radio" name="txttrangthai" value="0"> Ẩn</span>
			</div>
			<button type="submit" name="btndanhmuccon" class="btn btn-warning">Thêm danh mục con</button>
		</form>
	</div>
	<?php  
	if(isset($error)&&in_array('loitrung', $error)){
		echo "<p class='loitrung'>Lỗi trùng tên thể loại con ! Thêm thất bại .</p>";
	}

	if(isset($success)&&in_array('thanhcong', $success)){
		echo "<p class='thanhcong'>Chúc mừng , thêm thành công ... </p>";
	}

	?>
					</div>  <!-- /col-md-6 -->