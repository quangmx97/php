<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action = '';
    }

    switch ($action) {

        case 'add':{
            require_once('Moduls/Menu/SanPham/pages.php');
            break;
        }


        case 'edit':{
        	require_once('Moduls/Menu/SanPham/edit.php');
        	break;
        }

        case 'delete':{
        	require_once('Moduls/Menu/SanPham/delete.php');
        	break;
        }

          case 'add-product-baby':{
             require_once('Moduls/Menu/SanPham/pages.php');
            break;
        }

        case 'edit-product-baby':{
            require_once('Moduls/Menu/SanPham/edit_loaicon.php');
            break;
        }

        case 'delete-product-baby':{
            require_once('Moduls/Menu/SanPham/delete_loaicon.php');
            break;
        }

        default:{
        	require_once('Moduls/Menu/SanPham/pages.php');
        	break;
        }
    }   
?>