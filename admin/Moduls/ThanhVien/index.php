<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action = '';
    }

    switch ($action) {

    	case 'danh-sach-thanh-vien':{
    		require_once('Moduls/ThanhVien/list_user.php');
    		break;
    	}

    	default:{
    		require_once('Moduls/ThanhVien/list_user.php');
    		break;
    	}
    }
?>