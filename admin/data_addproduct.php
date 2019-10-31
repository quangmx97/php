<?php
require_once('Model/database.php');
$db = new database;
$db->connect();

$id = $_POST['id'];
$tblTable = "tbltheloaiconsanpham_menu";

$data = $db->getIDDanhMucCon($tblTable, $id);

?>
	 <option value="0">-- Loại tin --</option>
<?php
foreach($data as $dt){
	?>
	<option value="<?php echo $dt['id']; ?>"><?php echo $dt['txttendanhmuccon']; ?></option>	
	<?php
}

if($id==0){
	$tblTable_con = "tbltheloaiconsanpham_menu";
	$datas_con = $db->showlist($tblTable_con);

	foreach($datas_con as $data_con){
		?>
		<option value="<?php echo $data_con['id']; ?>"><?php echo $data_con['txttendanhmuccon']; ?></option>
		<?php
	}
}
?>