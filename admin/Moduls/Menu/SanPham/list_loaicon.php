<!-- START HIỂN THỊ DANH SÁCH THỂ LOẠI DANH MỤC CON => SẢN PHẨM  -->

<div class="danhsach">
	<div class="row">
		<div style="float: left;" class="col-md-12">
			<!-- Example DataTables Card-->
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i> Dữ liệu Thể loại danh mục con sản phẩm </div>
					<div class="card-body">
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Chọn thể loại (Menu gốc)</label>
								<select name="idtheloai"  id="" class="form-control menucha">
									<option value="0">-- Lựa chọn --</option>
									<?php  
										$tdlTable = "tbltheloaisanpham_menu";
										$data_theloai_sp =  $db->showlist($tblTable);
										foreach($data_theloai_sp as $result_theloai_sp){
									 ?>
									<option value="<?php echo $result_theloai_sp['id']; ?>"><?php echo $result_theloai_sp['txtten']; ?></option>
									<?php 
										}

									 ?>
								</select>
							</div>
						</div>

						<div class="col-md-6">
						
						</div>

						<table class="table table-bordered table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên danh mục con</th>
									<th>Thể loại</th>
									<th>Trạng thái</th>
									<th>Sửa</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>STT</th>
									<th>Tên danh mục con</th>
									<th>Thể loại</th>
									<th>Trạng thái</th>
									<th>Sửa</th>
									<th>Xóa</th>
								</tr>
							</tfoot>
							<tbody class="menucon">
								<?php  
								$tblTable = 'tbltheloaiconsanpham_menu';
								$data = $db->showlist($tblTable);
								if($data == 0){
									echo "Hiện chưa có danh mục con nào .";
								}
								else{
								$stt = 1;
								foreach($data as $rel){

									$idtheloai = $rel['idtheloai'];
									$tblTable = "tbltheloaisanpham_menu";

									$result_theloai = $db->getID($tblTable,$idtheloai);

									?>
									<tr>
										<td><?php echo $stt; ?></td>
										<td><?php echo $rel['txttendanhmuccon']; ?></td>
										<td><?php echo $result_theloai['txtten']; ?></td>
										<td><?php if($rel['txttrangthai']==1){
											echo "Hiện";
										}else{
											echo "Ẩn";
										}

										?></td>
										<td><a onclick="return confirm('Bạn có chắc chẵn muốn sửa không ?')" href="index.php?controller=quan-ly-menu-sanpham&action=edit-product-baby&id=<?php echo $rel['id']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
										<td><a  onclick="return confirm('Bạn có chắc chẵn muốn xóa không ?')" href="index.php?controller=quan-ly-menu-sanpham&action=delete-product-baby&id=<?php echo $rel['id']; ?>" title="Xóa"><i class="fa fa-times" aria-hidden="true"></i></a></td>
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
		</div>  <!-- /col-md-12 -->
	</div>  <!-- /row -->
				</div>  <!-- /danhsach -->