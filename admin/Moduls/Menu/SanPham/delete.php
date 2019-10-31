<?php
ob_start();
require_once('Model/database.php');
$db =  new database;
$db->connect();
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$tbTable = "tbltheloaisanpham_menu";
	$db->delete($tbTable, $id);

	$tblTable_con = "tbltheloaiconsanpham_menu";
	$db->delete_children($tblTable_con,$id);
	header('location: index.php?controller=quan-ly-menu-sanpham');

}
else{
	header('location: index.php?controller=quan-ly-menu-sanpham');
}
ob_end_flush();
?>