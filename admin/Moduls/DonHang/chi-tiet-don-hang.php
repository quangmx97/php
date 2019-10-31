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
              <h6 class="alert alert-success">Thông tin đặt hàng của Khách hàng </h6>
                <div class="thongtindonhang">
                    <?php 
                    foreach($dataDonHang as $valueDonHang){
                        $tenkhachhang = $valueDonHang['tenkhachhang'];
                        $diachi = $valueDonHang['diachi'];
                        $sdt = $valueDonHang['sodienthoai'];
                        $email = $valueDonHang['email'];
                        $thanhpho = $valueDonHang['thanhpho'];
                    }

                    ?>
                    <table>
                        <tr>
                            <td><li>Họ và tên :</li></td>
                            <td><span style="color: red; font-weight: bold;"><?php echo $tenkhachhang; ?></span></td>
                        </tr>
                        <tr>
                            <td><li>Số ĐT : </li></td>
                            <td><?php echo $sdt; ?></td>
                        </tr>
                        <tr>
                            <td><li>Địa chỉ : </li></td>
                            <td><?php echo $diachi; ?></td>
                        </tr>
                        <tr>
                            <td><li>Email : </li></td>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td><li>Thành phố : </li></td>
                            <td><?php echo $thanhpho; ?></td>
                        </tr>
                        <tr>
                            <td><li>Tình trạng : </li></td>
                            <td><span style="color: green"><i class="fa fa-refresh fa-spin "></i> Đang xử lý</span></td>
                        </tr>
                    </table>   

                    <hr>
                    <span><button class="btn btn-danger">Hủy đơn hàng</button></span>
                    <span><button class="btn btn-warning">Đã giao hàng</button></span>
                    <hr>

                    <!--  Bảng thông tin về sản phẩm KH đã đặt : -->
                    
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $stt = 1;
                                $tongtien = 0;
                                foreach($dataDonHang as $ProductOrder){
                                    $thanhtien = $ProductOrder['SoLuong']*$ProductOrder['DonGia'];
                                    $MaSP = $ProductOrder['MaSP'];

                                    $dataProductID = $db->GetDataProductIDCart($MaSP);
                             ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><?php echo $ProductOrder['TenSP']; ?></td>
                                <td><img src="<?php echo $dataProductID['hinhanh']; ?>" width="60px" alt=""></td>
                                <td><?php echo $ProductOrder['SoLuong']; ?></td>
                                <td><?php echo number_format($ProductOrder['DonGia'],0); ?></td>
                                <td><?php echo number_format($thanhtien,0); ?></td>
                            </tr>
                            <?php
                                $tongtien = $tongtien+$thanhtien;
                                $stt++; 
                                }
                             ?>
                             <tr>
                                <td colspan="1">&nbsp;</td>
                                <td colspan="4"><span style="color: green; font-weight: bold;">Tổng tiền : </span></td>
                                 <td colspan="1"><strong><?php echo number_format($tongtien); ?></strong> <i>(VNĐ)</i></td>
                             </tr>
                        </tbody>
                    </table>
                    <!--  Bảng thông tin về sản phẩm KH đã đặt : -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<!-- start footer infomation -->