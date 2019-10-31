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
                <h5 class="alert alert-success">Quản lý đơn hàng</h5>
                <div class="listorder">
                    <!-- Example DataTables Card-->
                    <div class="card mb-3">
                     <div class="card-header">
                       <i class="fa fa-table"></i> Dữ liệu Slider</div>
                       <div class="card-body">
                           <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                               <thead>
                                 <tr>
                                   <th width="3%">STT</th>
                                   <th width="30%">Tên khách hàng</th>
                                   <th width="30%">Sản phẩm</th>
                                   <th width="12%">Tổng tiền</th>
                                   <th width="8%">Ngày đặt</th>
                               </tr>
                           </thead>
                       <tbody>

                        <?php 


                        if($dataDonHang!=0){
                        $stt = 1;
                        foreach($dataDonHang as $valueOrder){
                            $MaKH = $valueOrder['MaKH'];
                            $MaDDH = $valueOrder['MaDDH'];

                            $dataKhachHang = $db->ThongTinKhachHangOrder($MaKH);
                            $dataSanPham = $db->ThongtinSanPham_DatHang($MaDDH);
                          
                            ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td>
                                  <a href=""><?php echo $dataKhachHang['tenkhachhang']; ?></a>
                                  <p><i>Mã KH :<?php echo $dataKhachHang['id']; ?></i></p>
                                  <p><i>Điện thoại : <?php echo $dataKhachHang['sodienthoai'] ?></i></p>
                                  <p><i>Địa chỉ : <?php  echo $dataKhachHang['diachi'] ?></i></p>
                                </td>
                              
                                <td>
                                  <span>
                                    <?php 
                                    $tongtien = 0; 
                                      foreach($dataSanPham as $key => $itemSanPham)
                                      {
                                        $tongtien = $tongtien + ($itemSanPham['SoLuong']*$itemSanPham['DonGia']);
                                        ?>
                                        <p><?php echo ($key+1).'.'.$itemSanPham['TenSP'].'('.$itemSanPham['SoLuong'].')'; ?></p>
                                        <p><i>Gía : <?php echo number_format($itemSanPham['DonGia'],0); ?> VND</i></p>
                                        <?php
                                       
                                      }
                                    ?>
                                   </span>
                                </td>
                                <td><?php echo number_format($tongtien, 0); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($valueOrder['NgayDat'])) ?></td>
                              
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
     <!-- Example DataTables Card-->
</div>
</div>
</div>  <!--  row -->
</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<!-- start footer infomation -->