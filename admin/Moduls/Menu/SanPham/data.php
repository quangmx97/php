<?php

require_once("../../../Model/database.php");
$db = new database;
$db->connect();

$idtheloai = $_POST['id'];
$tblTable = "tbltheloaiconsanpham_menu";
$data = $db->getID($tblTable, $idtheloai);

	$stt =1;
foreach($data as $rel){
	$idtheloai = $rel['idtheloai'];
	$tblTable = "tbltheloaisanpham_menu";

	$result_theloai = $db->getID($tblTable,$idtheloai);

	?>
	<tr>
		<td><?php echo $stt; ?></td>
		<td><?php echo $rel['txttendanhmuccon']; ?></td>
		<td><?php echo $result_theloai['txtten']; ?></td>
		<td><?php if($rel['txttrangthai']==1){
			echo "Hiện";
		}else{
			echo "Ẩn";
		}

		?></td>
		<td><a onclick="return confirm('Bạn có chắc chẵn muốn sửa không ?')" href="index.php?controller=quan-ly-menu-sanpham&action=edit-product-baby&id=<?php echo $rel['id']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
		<td><a  onclick="return confirm('Bạn có chắc chẵn muốn xóa không ?')" href="index.php?controller=quan-ly-menu-sanpham&action=delete-product-baby&id=<?php echo $rel['id']; ?>" title="Xóa"><i class="fa fa-times" aria-hidden="true"></i></a></td>
	</tr>
	<?php
	$stt++;
}
?>