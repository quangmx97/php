<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action = '';
    }

    switch ($action) {

        case 'them-san-pham':{
            require_once('Moduls/DanhMuc/SanPham/add_product.php');
            break;
        }

        case 'sua-san-pham':{
            require_once('Moduls/DanhMuc/SanPham/edit_product.php');
            break;
        }

        case 'xoa-san-pham':{
            require_once('Moduls/DanhMuc/SanPham/delete_product.php');
            break;
        }

        case 'danh-sach-san-pham':{
            require_once('Moduls/DanhMuc/SanPham/list_product.php');
            break;
        }

        default:{
            require_once('Moduls/DanhMuc/SanPham/pages.php');
            break;
        }
    }   
?>