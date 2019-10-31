<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang quản trị website</title>
    <link type="text/css" href="public/css/style.css"/>
    <!-- Bootstrap core CSS-->
    <link href="public-wp/css/bootstrap.min.css" rel="stylesheet">
    <!-- Page level plugin CSS-->
    <link href="public-wp/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="public-wp/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="public-wp/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="public-wp/css/sb-admin.css" rel="stylesheet">
        <!--  gọi file ckeditor.js -->
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/ckfinder/ckfinder.js"></script>


        <style>
        p.loinhap{
            color:red;
        }

        p.loitrung{
            color:red;
        }

        p.thanhcong{
            color:green;
        }

        .danhsach{
            margin: 30px 0px;
        }

        .col-md-3{
            float: left;
        }

        .col-md-6  {
            float: left;
        }

        .col-md-12{
            float: left;
            margin-bottom: 30px;
        }

        img.img-product{
            width: 100px;
        }

        p.loinhap{
            color:red;
        }

        p.loitrung{
            color:red;
        }

        p.thanhcong{
            color:green;
        }

        .danhsach{
            margin: 30px 0px;
        }

        .col-md-3{
            float: left;
        }

        .col-md-6  {
            float: left;
        }

        .col-md-12{
            float: left;
            margin-bottom: 30px;
        }

        img.img-product{
            width: 60px;
        }
        .list-product-table{
            margin: 30px 0px;
        }

        .baothanhcong{
            color: green;
            font-weight: bold;
        }

        .thongtindonhang{
            border: 1px solid #EEEEEE;
            padding: 20px;
        }

        .thongke {
            margin: 10px 0px 15px 0px;
        }

        .thongke .col-md-3{
            width: 250px;
            float: left;
            overflow: hidden;
            margin-right: 15px;
        }

        .thongke h5{
            color: #FFF;
        }

        .thongke .donhang{
            background: #FF9933;
            border-radius: 5px;
        }

        .info{
            z-index: 1;
            position: absolute;
            padding: 10px;
        }

        .soluong{
            z-index: 1;
            position: absolute;
           float: right;
           margin-left: 190px;
           margin-top: 20px;
        }

        .soluong h6{
            font-size: 20px;
            color: #FFF;
        }

        .thongke .fa{
            font-size: 50px;
            padding: 40px 0px 15px 15px;
            color: #FFF;
        }

        .thongke .sanpham{
            background: #999999;
            border-radius: 5px;
        }

        .thongke .baiviet{
             background: #339966;
            border-radius: 5px;
        }

        .thongke .tintuc{
            background: #999933;
        }

        .thongtindonhang table tr td{
            width: 50%;
        }


        .thongtindonhang table tr td li{
            list-style-type: none;
        }

    </style>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.php">Quản trị Website (Admin)</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php require_once('slidebar.php'); ?>
            <ul class="navbar-nav ml-auto">       
                <li class="nav-item">
                   <a class="nav-link" href="" data-toggle="modal" data-target="">
                            <i class="fa fa-fw fa-sign-out"></i>Admin : <?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>