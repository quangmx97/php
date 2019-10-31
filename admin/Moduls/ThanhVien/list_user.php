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
            <li class="breadcrumb-item active">Danh mục thành viên</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <h3>Danh sách thành viên</h3>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                 <div class="card-header">
                   <i class="fa fa-table"></i> Dữ liệu Slider</div>
                   <div class="card-body">
                       <div class="table-responsive">
                         <table class="table table-bordered table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                             <tr>
                               <th>STT</th>
                               <th>Tên đăng nhập (User)</th>
                               <th>Mật khẩu (Pass)</th>
                               <th>Email</th>
                               <th>Sửa</th>
                               <th>Xóa</th>
                           </tr>
                       </thead>
                       <tfoot>
                           <tr>
                               <th>STT</th>
                               <th>Tên đăng nhập (User)</th>
                               <th>Mật khẩu (Pass)</th>
                               <th>Email</th>
                               <th>Sửa</th>
                               <th>Xóa</th>
                           </tr>
                       </tfoot>
                       <tbody>
                        <?php
                        $tblTable = "tblthanhvien";
                        $data =  $db->showlist($tblTable);
                        $stt = 1;
                        foreach($data as $dt){
                            ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><?php echo $dt['user']; ?></td>
                                <td><?php echo $dt['pass']; ?></td>
                                <td><?php echo $dt['email']; ?></td>
                                <td><a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td><a href=""><i class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                            <?php
                            $stt++;
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