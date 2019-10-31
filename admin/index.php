<?php
ob_start();
session_start();
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
    header('location: login.php');
}
else{

    require_once('Model/database.php');
    $db = new database;
    $db->connect();

    require_once('includes/headers.php');

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }
    else{
        $controller = '';
    }

    switch ($controller) {

        case 'quan-ly-menu-sanpham':{
            require_once('Moduls/Menu/SanPham/index.php');
            break;
        }

        case 'quan-ly-danh-muc-san-pham':{
           require_once('Moduls/DanhMuc/SanPham/index.php');
           break;
       }

       case 'tin-tuc':{
           require_once('Moduls/DanhMuc/TinTuc/index.php');
           break;
       }

       case 'bai-viet':{
           require_once('Moduls/DanhMuc/BaiViet/index.php');
           break;
       }

       case 'thanh-vien':{
             require_once('Moduls/ThanhVien/index.php');
             break;
       }

       case 'don-hang':{
        require_once('Moduls/DonHang/index.php');
        break;
       }

       default:{
        $dataDonHang = $db->showOrder();
           require_once('Moduls/pages.php');
           break;
       }


   }

   require_once('includes/footer.php');
}
ob_end_flush();
?>