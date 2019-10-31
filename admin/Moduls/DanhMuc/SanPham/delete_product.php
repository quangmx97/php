<?php
require_once('Model/database.php');
$db = new database;
$db->connect();

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$tblTable = "sanphampost";
	$db->delete($tblTable, $id);
	header('location: index.php?controller=quan-ly-danh-muc-san-pham&action=danh-sach-san-pham');
}
else{
	header('location: index.php?controller=quan-ly-danh-muc-san-pham&action=danh-sach-san-pham');
}

?>