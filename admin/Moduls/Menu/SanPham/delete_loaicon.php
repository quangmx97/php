<?php

require_once('Model/database.php');
$db = new database;
$db->connect();

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$tblTable = "tbltheloaiconsanpham_menu";
	$db->delete($tblTable, $id);
	header('location: index.php?controller=quan-ly-menu-sanpham');
}
else{
	header('location: index.php?controller=quan-ly-menu-sanpham');
}


?>