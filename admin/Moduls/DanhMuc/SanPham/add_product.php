<?php
require_once('Model/database.php');
$db = new database;
$db->connect();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $error = array();
    if(empty($_POST['txttensanpham'])){
        $error[] = 'txttensanpham';
    }
    else{
        $txttensanpham = $_POST['txttensanpham'];
        $chuoicho = $db->to_slug($txttensanpham);
    }

    if(empty($_POST['txtgiagoc'])){
        $error[] = 'txtgiagoc';
    }
    else{
        $txtgiagoc = $_POST['txtgiagoc'];
        // $txtgiagoc = round($txtgiagoc, 1, PHP_ROUND_HALF_EVEN);
    }

    // if(empty($_POST['txtgiakhuyenmai'])){
    //     $error[] = 'txtgiakhuyenmai';
    // }
    // else{
    //     $txtgiakhuyenmai = $_POST['txtgiakhuyenmai'];
    // }
    $txtgiakhuyenmai = $_POST['txtgiakhuyenmai'];

    if(empty($_POST['txtmota'])){
        $error[] = 'txtmota';
    }
    else{
        $txtmota = $_POST['txtmota'];
    }

    $txtnoidungsanpham = $_POST['txtnoidungsanpham'];

    
      // Kỹ thuật upload hình ảnh :
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["txthinhanh"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["txthinhanh"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["txthinhanh"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
}
        // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
                // echo "Sorry, your file was not uploaded.";
    $error[] = 'anh';
            // if everything is ok, try to upload file
} else {
    move_uploaded_file($_FILES["txthinhanh"]["tmp_name"], $target_file);
}



if($_POST['txttheloai'] == 0){
    $error[] = 'theloai';
}
else{
    $txttheloai = $_POST['txttheloai'];
}

$txtloaitin = $_POST['txtloaitin'];



if(isset($txttensanpham) && isset($txtgiagoc) && isset($txtmota) && isset($target_file)){

    $sql = "SELECT * FROM sanphampost WHERE tensanpham = '$txttensanpham' AND idtheloai = '$txttheloai' AND idloaitin = '$txtloaitin' AND hinhanh = '$target_file'";
    $num_row = $db->check($sql);
    if($num_row==TRUE){
        $sql_insert = "INSERT INTO sanphampost(idtheloai,idloaitin,tensanpham,hinhanh,chuoicho,giagoc,giakhuyenmai,mota,noidung,luotxem)VALUES('$txttheloai','$txtloaitin', '$txttensanpham', '$target_file', '$chuoicho', '$txtgiagoc', '$txtgiakhuyenmai', '$txtmota', '$txtnoidungsanpham', 1)";

        $db->add($sql_insert);
        header('location: index.php?controller=quan-ly-danh-muc-san-pham&action=danh-sach-san-pham');
    }
    else{
        header('location: index.php?controller=quan-ly-danh-muc-san-pham&action=danh-sach-san-pham');
    }
}
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
            <li class="breadcrumb-item"><a  href="index.php?controller=quan-ly-danh-muc-san-pham&action=danh-sach-san-pham">Danh sách sản phẩm</a></li>

        </ol>
        <div class="row">
            <div class="col-12">
                <form action="index.php?controller=quan-ly-danh-muc-san-pham&action=them-san-pham" method="POST" role="form" enctype="multipart/form-data">
                    <legend>Thêm mới sản phẩm</legend>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Chọn thể loại (*)</label>
                            <select name="txttheloai" class="form-control theloai" id="">
                                <option value="0">-- Chọn Thể loại --</option>
                                <?php  
                                $tblTable = "tbltheloaisanpham_menu";
                                $datas = $db->showlist($tblTable);
                                foreach($datas as $data){
                                    ?>
                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['txtten'];  ?></option>
                                    <?php
                                }
                                ?>  
                            </select>
                            <?php
                            if(isset($error)&&in_array('theloai', $error)){
                                echo "<p class='loinhap'>Bạn cần chọn thể loại !</p>";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="">Chọn loại tin</label>
                            <select name="txtloaitin" class="form-control loaitin" id="">
                                <option value="0">-- Loại tin --</option>
                                <?php
                                $tblTable_con = "tbltheloaiconsanpham_menu";
                                $datas_con = $db->showlist($tblTable_con);
                                foreach($datas_con as $data_con){
                                    ?>
                                    <option value="<?php echo $data_con['id']; ?>"><?php echo $data_con['txttendanhmuccon']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tên sản phẩm (*)</label>
                            <input type="text" class="form-control" value="<?php if(isset($_POST['txttensanpham'])){ echo $_POST['txttensanpham']; } ?>" name="txttensanpham" id="" placeholder="Tên sản phẩm">
                            <?php
                            if(isset($error)&&in_array('txttensanpham', $error)){
                                echo "<p class='loinhap'>Bạn cần nhập tên sản phẩm !</p>";
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh (*)</label>
                            <input type="file" class="form-control" value="<?php if(isset($target_file)){ echo $target_file; } ?>" name="txthinhanh" id="" placeholder="">
                            <?php
                            if(isset($error)&&in_array('anh', $error)){
                                echo "<p class='loinhap'>Bạn cần chọn ảnh ...</p>";
                            }
                            ?>
                        </div>

                    </div>

                    <div class="col-md-6">

                     <div class="form-group">
                        <label for="">Giá gốc (*)</label>
                        <input type="text" class="form-control" value="<?php if(isset($_POST['txtgiagoc'])){ echo $_POST['txtgiagoc']; } ?>" name="txtgiagoc" id="" placeholder="Giá gốc">
                        <?php
                        if(isset($error)&&in_array('txtgiagoc', $error)){
                            echo "<p class='loinhap'>Bạn cần nhập giá gốc ..</p>";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="">Giá khuyến mại</label>
                        <input type="text" class="form-control" name="txtgiakhuyenmai" id="" placeholder="Giá khuyến mại">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả tóm tắt (*)</label>
                        <textarea name="txtmota" class="form-control" placeholder="Mô tả tóm tắt"><?php if(isset($_POST['txtmota'])){ echo $_POST['txtmota']; } ?></textarea>
                        <?php
                        if(isset($error)&&in_array('txtmota', $error)){
                            echo "<p class='loinhap'>Bạn cần nhập mô tả !</p>";
                        }
                        ?>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea name="txtnoidungsanpham" class="form-control" placeholder="Nội dung chi tiết sản phẩm"></textarea>
                    </div>

                    <script type="text/javascript">
                        CKEDITOR.replace('txtnoidungsanpham');
                    </script>
                    <button type="submit" class="btn btn-warning" name="submit">Thêm sản phẩm</button>
                    <span><input type="reset" class="btn btn-danger" value="Làm mới"></span>
                </form>

                <div class="luuy">
                    <p><b>Lưu ý : </b><i>Các trường có dấu (*) đều không được để trống !</i></p>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<!-- start footer infomation -->