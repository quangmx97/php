			<div class="danhsach">
				<div class="row">
					<div style="float: left;" class="col-md-12">
						<!-- Example DataTables Card-->
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-table"></i> Dữ liệu Thể loại sản phẩm </div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>STT</th>
													<th>Thể loại</th>
													<th>Trạng thái</th>
													<th>Sửa</th>
													<th>Xóa</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>STT</th>
													<th>Thể loại</th>
													<th>Trạng thái</th>
													<th>Sửa</th>
													<th>Xóa</th>
												</tr>
											</tfoot>
											<tbody>
												<?php  

												$tblTable = 'tbltheloaisanpham_menu';
												$data = $db->showlist($tblTable);
												if($data != 0){
												$stt = 1;
												foreach($data as $rel){

													?>
													<tr>
														<td><?php echo $stt; ?></td>
														<td><?php echo $rel['txtten']; ?></td>
														<td><?php if($rel['txttinhtrang']==1){
															echo "Hiện";
														}else{
															echo "Ẩn";
														}

														?></td>
														<td><a onclick="return confirm('Bạn có chắc chẵn muốn sửa không ?')" href="index.php?controller=quan-ly-menu-sanpham&action=edit&id=<?php echo $rel['id']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
														<td><a  onclick="return confirm('Bạn có chắc chẵn muốn xóa không ?')" href="index.php?controller=quan-ly-menu-sanpham&action=delete&id=<?php echo $rel['id']; ?>" title="Xóa"><i class="fa fa-times" aria-hidden="true"></i></a></td>
													</tr>
													<?php
													$stt++;
												}
											}
											else{
												echo "<p>Hiện không có thể loại nào .</p>";
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


	