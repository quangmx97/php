<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item active">Danh mục bài viết</li>
        </ol>
        <div class="row">
            <div class="col-12">
             <?php
             require_once('Model/database.php');
             $db = new database;
             $db->connect();

             if(isset($_GET['id'])){
                $id = $_GET['id'];

                $tblTable = "tbltheloaiconsanpham_menu";
                $data_ID = $db->getID($tblTable, $id);

                $idtheloai = $data_ID['idtheloai'];
                $tblTable_theloai = "tbltheloaisanpham_menu";
                $data_theloai = $db->getID($tblTable_theloai, $idtheloai);


                if(isset($_POST['btncapnhat'])){
                 $error = array();
                 $success = array();

                 if(empty($_POST['idtheloai'])){
                     $error[] = 'idtheloai';
                 }
                 else{
                     $idtheloai = $_POST['idtheloai'];
                 }

                 if(empty($_POST['txttendanhmuccon'])){
                     $error[] = 'txttendanhmuccon';
                 }
                 else{
                     $txttendanhmuccon = $_POST['txttendanhmuccon'];
                 }

                 $txttrangthai = $_POST['txttrangthai'];
                 if(isset($idtheloai) && isset($txttendanhmuccon)){

                    $sql_kiemtra = "SELECT * FROM tbltheloaiconsanpham_menu WHERE txttendanhmuccon = '$txttendanhmuccon' AND txttrangthai = '$txttrangthai'";
                    $num_row = $db->check($sql_kiemtra);
                    if($num_row == TRUE){
                        $sql = "UPDATE tbltheloaiconsanpham_menu SET idtheloai = '$idtheloai', txttendanhmuccon = '$txttendanhmuccon', txttrangthai = '$txttrangthai' WHERE id = '$id'";
                        $db->update($sql);
                        // $success[] = 'thanhcong';
                        header('location: index.php?controller=quan-ly-menu-sanpham');
                    }
                    else{
                        header('location: index.php?controller=quan-ly-menu-sanpham');
                    }
                }
            }
        }
        else{
            header('location: index.php?controller=quan-ly-menu-sanpham');
        }




        ?>                  
        <div style="float: left;" class="col-md-6">
            <div class="danhmuccha">
                <form action="" method="POST" role="form">
                    <legend>Thêm danh mục con</legend>
                    <div class="form-group">
                        <label for="">Chọn thể loại</label>
                        <select name="idtheloai" id="" class="form-control">
                            <option value="<?php echo $data_theloai['id']; ?>"><?php echo $data_theloai['txtten']; ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Tên danh mục con</label>
                        <input type="text" class="form-control" value="<?php echo $data_ID['txttendanhmuccon'];  ?>" name="txttendanhmuccon" placeholder="Danh mục con">
                        <?php   
                        if(isset($error)&&in_array('txttendanhmuccon', $error)){
                            echo "<p class='loinhap'>Bạn cần nhập tên danh mục cho</p>";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="">Trạng thái</label><br>
                        <span><input type="radio" name="txttrangthai" checked="true" value="1"> Hiện</span>
                        <span><input type="radio" name="txttrangthai" value="0"> Ẩn</span>
                    </div>
                    <button type="submit" name="btncapnhat" class="btn btn-warning">Cập nhật danh mục con</button>
                </form>
            </div>
            <?php  
            if(isset($error)&&in_array('loitrung', $error)){
                echo "<p class='loitrung'>Lỗi trùng tên thể loại con ! Thêm thất bại .</p>";
            }

            if(isset($success)&&in_array('thanhcong', $success)){
                echo "<p class='thanhcong'>Chúc mừng , cập nhật thành công ... </p>";
            }

            ?>
        </div>  <!-- /col-md-6 -->
    </div>
</div>
</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<!-- start footer infomation -->