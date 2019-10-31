<?php
require_once('Model/database.php');


$db = new database;
$db->connect();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql_laydata = "tbltheloaisanpham_menu";
    $data = $db->getID($sql_laydata,$id);

    if(isset($_POST['btnCapNhatTheLoai'])){
        $error = array();
        if(empty($_POST['txtten'])){
            $error[] = 'txtten';
        }
        else{
            $txtten = $_POST['txtten'];
        }
        $txttrangthai = $_POST['txttrangthai'];

        if(isset($txtten)){
            $sql_check = "SELECT * FROM tbltheloaisanpham_menu WHERE txtten = '$txtten' AND txttrangthai = '$txttrangthai'";
            $num_row = $db->check($sql_check);

            if($num_row==TRUE){
                $sql = "UPDATE tbltheloaisanpham_menu SET txtten = '$txtten', txttinhtrang = '$txttrangthai' WHERE id = '$id'";
                $db->update($sql);
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
                <div style="float: left;" class="col-md-6">
                    <div class="danhmuccha">
                        <form action="" method="POST" role="form">
                            <legend>Cập nhật thể loại</legend>

                            <div class="form-group">
                                <label for="">Tên thể loại</label>
                                <input type="text" class="form-control" id="" value="<?php echo $data['txtten']; ?>" name="txtten" placeholder="Tên thể loại">
                                <?php if(isset($error)&&in_array('txtten', $error)){
                                    echo "<p style='color: red'; class='loinhap'>Bạn cần nhập tên thể loại.</p>";
                                }  ?>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label><br>
                                <span><input type="radio" name="txttrangthai" checked="true" value="1"> Hiện</span>
                                <span><input type="radio" name="txttrangthai" value="0"> Ẩn</span>
                            </div>
                            <button type="submit" name="btnCapNhatTheLoai" class="btn btn-primary">Cập nhật thể loại</button>
                        </form>
                    </div>
                    <?php
                    if(isset($error)&&in_array('trungten', $error)){
                        echo "<p style='color:red'>Tên thể loại bị trùng !</p>";
                    }

                    if(isset($succ)&&in_array('thanhcong', $succ)){
                        echo "<p style='color:green'>Tên thể loại Thành công !</p>";
                    }

                    if(isset($error)&&in_array('thatbai', $error)){
                        echo "<p style='color:red'>Cập nhật thất bại ... !</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<!-- start footer infomation -->