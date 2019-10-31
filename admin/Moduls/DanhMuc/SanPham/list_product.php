<?php
require_once('Model/database.php');
$db = new database;
$db->connect();
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Bảng điều khiển</a>
            </li>
            <li class="breadcrumb-item"><a href="index.php?controller=quan-ly-danh-muc-san-pham">Danh mục</a></li>
            <li class="breadcrumb-item"><a  href="index.php?controller=quan-ly-danh-muc-san-pham&action=them-san-pham">Thêm mới</a></li>
            <li class="breadcrumb-item active"><a href="index.php?controller=quan-ly-danh-muc-san-pham&action=danh-sach-san-pham">Danh sách sản phẩm</a></li>
        </ol>
        <div class="row">
            <div class="col-12">
             <h5>Chào mừng bạn đến với trang danh sách sản phẩm</h5>
             <!-- Example DataTables Card-->
             <div class="card mb-3">
                 <div class="card-header">
                   <i class="fa fa-table"></i> Dữ liệu thông tin Sản phẩm</div>
                   <div class="card-body">
                       <div class="table-responsive">
                         <table class="table table-bordered table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                             <tr>
                               <th>STT</th>
                               <th>Tên sản phẩm</th>
                               <th>Hình Ảnh</th>
                               <th>Giá gốc</th>
                               <th>Giá KM</th>
                               <th>Thể loại</th>
                               <th>Loại tin</th>
                               <th>Sửa</th>
                               <th>Xóa</th>
                           </tr>
                       </thead>
                       <tfoot>
                         <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Giá gốc</th>
                            <th>Giá KM</th>
                            <th>Thể loại</th>
                            <th>Loại tin</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $tblTable = "sanphampost";
                        $datas = $db->showlist($tblTable);
                        if($datas == 0){
                            echo "Hiện Không có sản phẩm nào .";
                        }
                        else{
                        $stt = 1;
                        foreach($datas as $data){
                            $idtheloai = $data['idtheloai'];
                            $tblTable = "tbltheloaisanpham_menu";

                            $data_theloai = $db->getID($tblTable, $idtheloai);

                            $idloaitin = $data['idloaitin'];
                            $tblTable_con = "tbltheloaiconsanpham_menu";

                            $data_loaitin = $db->getID($tblTable_con,$idloaitin);

                            ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><?php echo $data['tensanpham']; ?></td>
                                <td><img class="img-fluid img-circle img-product" src="<?php echo $data['hinhanh']; ?>" alt="hinhanh"></td>
                                <td><?php echo $data['giagoc']; ?></td>
                                <td><?php echo $data['giakhuyenmai']; ?></td>
                                <td><?php echo $data_theloai['txtten']; ?></td>
                                <td><?php echo $data_loaitin['txttendanhmuccon']; ?></td>
                                <td><a onclick="return confirm('Bạn có chắc chẵn muốn sửa không ?')" href="index.php?controller=quan-ly-danh-muc-san-pham&action=sua-san-pham&id=<?php echo $data['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td><a onclick="return confirm('Bạn có chắc chẵn muốn xóa không ?')" href="index.php?controller=quan-ly-danh-muc-san-pham&action=xoa-san-pham&id=<?php echo $data['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                            <?php
                            $stt++;
                        }
                    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
</div>
</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<!-- start footer infomation -->