<?php
class database{

	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "websitelaptop";
	private $conn = NULL;
	private $result = NULL;
	private $rel = NULL;

	public function connect(){
		$this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if(!$this->conn){
			echo "Kết nối thất bại";
			exit();
		}
		else{
			mysqli_set_charset($this->conn, 'utf8');
		}
		return $this->conn;
	}

	public function disconnect(){
		if($this->conn){
			mysqli_close($this->conn);
		}
	}

		// Lấy ID của phần tử vừa INSERT :
	public function getID_Insert($sql)
	{
		if($this->execute($sql) === TRUE){
			$last_id = $this->insert_id();
		}
		else{
			$last_id = 0;
		}
		return $last_id;
	}

		// Thực hiện lệnh truy vấn :
	public function execute($sql){
		$this->result = $this->conn->query($sql);
		if($this->result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	// Thực thi 
	public function runquery($sql)
	{
		return $this->conn->query($sql);
	}

		// Đếm số bản ghi trong danh sách :
	public function num_rows(){
		if($this->result){
			$num = mysqli_num_rows($this->result);
		}
		else{
			$num = 0;
		}
		return $num;
	}

		// Lấy dữ liệu từ CSDL :
	public function getData(){
		if($this->result){
			$data = mysqli_fetch_assoc($this->result);
		}
		else{
			$data = 0;
		}
		return $data;
	}


		// Phương thức thêm thành viên :
	public function add($sql){
		return  $this->execute($sql);
	}

		// Phương thức check mã :
	public function check($sql){
		$this->execute($sql);
		if($this->num_rows()==0){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function checkLogin($sql){
		$this->execute($sql);
		if($this->num_rows()==1){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

		// Phương thức lấy dữ liệu (Get data ):
	public function showlist($tblTable){
		$sql = "SELECT * FROM $tblTable";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

	// Dự án là 1 tập các cv được thực hiện bởi 1 tập thể  .

	// Hiển thị ra 10 bản ghi mới nhất :
	public function showlist_10($tblTable)
	{
		$sql = "SELECT * FROM $tblTable ORDER BY id ASC LIMIT 0,8";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

		// Phương thức lấy dữ liệu theo ID :
	public function getID($tblTable, $id){
		$sql = "SELECT * FROM $tblTable WHERE id = '".$id."'";
		$this->execute($sql);
		if($this->num_rows()==0){
			return FALSE;
		}
		else{
			return $this->getData();
		}
	}


		// Phương thức lấy dữ liệu theo ID thể loại : áp dụng nhiều khi dùng ajax 
	// Chọn thể loại , hiển thị dữ liệu có idtheloai như vậy .
	public function getIDDanhMucCon($tblTable, $id){
		$sql = "SELECT * FROM $tblTable WHERE idtheloai = '".$id."'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

		// Phương thức lấy dữ liệu theo ID loại tin :
	public function getIDDanhMucSanPhamCon($tblTable, $id){
		$sql = "SELECT * FROM $tblTable WHERE idloaitin = '".$id."'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}


	public function getOrder($tblTable, $key, $id)
	{
		$sql = "SELECT * FROM $tblTable WHERE $key = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}




		// Kiểm tra dữ liệu hiện tại trước khi cập nhật :
		// public function CheckUserNow($id){
		// 	$sql = "SELECT * FROM tblthanhvien WHERE id = '".$id."'";
		// 	$this->execute($sql);
		// 	if($this->num_rows()==0){
		// 		return FALSE;
		// 	}
		// 	else{
		// 		return TRUE;
		// 	}
		// }



	public function update($sql){
		return $this->execute($sql);
	}

	public function delete($tblTable, $id){
		$sql = "DELETE FROM $tblTable WHERE id = '$id'";
		$this->execute($sql);
	}

	// Xóa trong trường hợp các danh mục cha bị xóa , thì danh mục con của nó cũng sẽ bị xóa 
	public function delete_children($tblTable, $id){
		$sql = "DELETE FROM $tblTable WHERE idtheloai = '$id'";
		$this->rel = $this->execute($sql);
	}

	public function TimKiemSanPham($sql)
	{
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;

	}

	// Cập nhật số lần xem trang :
	public function SoLanXem($tblTable, $tencot, $id)
	{
		$sql = "UPDATE $tblTable SET $tencot = $tencot+1 WHERE id = '$id'";
		return $this->execute($sql);
	}

	// Lấy các sản phẩm có nhiều lượt xem nhất : 8 sản phẩm .
	public function luotviewnhieu($tblTable, $tencot)
	{
		$sql = "SELECT * FROM $tblTable  ORDER BY $tencot DESC LIMIT 0,4";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data  = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

	// Phuong thuc lay du lieu theo tu khoa ( Tim kiem )
	public function TimKiem($tblTable, $namecolum, $tukhoa)
	{	
		$sql = "SELECT * FROM $tblTable WHERE $namecolum REGEXP '$tukhoa' ORDER BY id DESC";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;

	}

	public function to_slug($str){
		$str = trim(mb_strtolower($str));
		$str = preg_replace('/(à|á|ạ|ả|â|ậ|ẫ|ấ|ầ|ặ|ắ|ẵ|ằ|ă|ẳ|ẩ)/', 'a', $str);
		$str = preg_replace('/(ê|ề|ế|ễ|ệ|ể|ẹ|ẻ|ẽ|è|é)/', 'e', $str);
		$str = preg_replace('/(ì|í|ị|ĩ|ỉ)/', 'i', $str);
		$str = preg_replace('/(ò|ó|ọ|õ|ỏ|ơ|ờ|ớ|ỡ|ở|ô|ố|ố|ồ|ỗ|ổ)/', 'o', $str);
		$str = preg_replace('/(ù|ú|ũ|ụ|ủ|ừ|ữ|ử|ự|ứ)/', 'u', $str);
		$str = preg_replace('/(ý|ỳ|ỹ|ỵ|ỷ)/', 'y', $str);
		$str = preg_replace('/(đ)/', 'd', $str);
		$str = preg_replace('/[^a-z0-9-\s]/', '', $str);
		$str = preg_replace('/([\s]+)/', '-', $str);
		return $str;
	}


	// QUẢN LÝ BÀI VIẾT :

	// Thêm bài viết danh mục cha :
	public function InsertHome_Page($TenDanhMuc, $NoiDung, $ChuoiCho, $TrangThai)
	{
		$sql = "INSERT INTO tbltheloaibaiviet_menu(id, TenDanhMuc, NoiDung, ChuoiCho, TrangThai)VALUES(null, '$TenDanhMuc', '$NoiDung', '$ChuoiCho', '$TrangThai')";
		return $this->execute($sql);
	}

	// Hiển thị danh sách danh mục bài viết ( Menu ) :
	public function getData_HomePage(){
		$sql = "SELECT * FROM tbltheloaibaiviet_menu";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

	// Xóa dữ liệu danh mục bài viết ( Menu ):
	public function DeleteData_HomePage($id)
	{
		$sql = "DELETE FROM tbltheloaibaiviet_menu WHERE id = '$id'";
		return $this->execute($sql);
	}

	// Lấy dữ liệu cần sửa :
	public function getData_EditHomePage($id)
	{
		$sql = "SELECT * FROM tbltheloaibaiviet_menu WHERE id = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			$data = $this->getData();
		}
		return $data;
	}

	// Lấy dữ liệu theo ID :
	public function getData_IdHomePage($id)
	{
		$sql = "SELECT * FROM tbltheloaibaiviet_menu WHERE id = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			$data = $this->getData();
		}
		return $data;
	}


	// Lấy dữ liệu theo ID :
	public function getData_IdHomeProduct($id, $Table)
	{
		$sql = "SELECT * FROM $Table WHERE id = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			$data = $this->getData();
		}
		return $data;
	}

	// Cập nhật dữ liệu cần sửa :
	public function UpdateData_HomePage($id, $TenDanhMuc, $NoiDung, $ChuoiCho, $TrangThai)
	{
		$sql = "UPDATE tbltheloaibaiviet_menu SET TenDanhMuc = '$TenDanhMuc', NoiDung = '$NoiDung', ChuoiCho = '$ChuoiCho',  TrangThai = '$TrangThai' WHERE id = '$id'";
		return $this->execute($sql);
	}

	// Lấy toàn bộ dữ liệu phần menu sản phẩm :

	public function getData_HomeProduct(){
		$sql = "SELECT * FROM tbltheloaisanpham_menu";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

	// Lấy toàn bộ dữ liệu phần menu sản phẩm :

	public function getData_PageProductMenu(){
		$sql = "SELECT * FROM tbltheloaiconsanpham_menu";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

		// Phương thức lấy dữ liệu (Get data ):
	public function GetDataCategory($sql){
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}


		// Phương thức lấy dữ liệu (Get data ):
	public function GetDataProduct(){
		$sql = "SELECT * FROM sanphampost";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}


	// Lấy danh sách sản phẩm theo IDloaitin :

	public function GetDataProductID($id){
		$sql = "SELECT * FROM sanphampost WHERE idloaitin = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

	// Lấy danh sách sản phẩm theo ID :

	public function GetDataProductIDCart($id){
		$sql = "SELECT * FROM sanphampost WHERE id = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			$data = $this->getData();
		}
		return $data;
	}

	// Tin tức 
	public function InsertDataHomePost($TheLoai, $ChuoiCho, $TrangThai)
	{
		$sql = "INSERT INTO tintuc_menu(id, TheLoai, ChuoiCho, TrangThai)VALUES(null, '$TheLoai', '$ChuoiCho', '$TrangThai')";
		return $this->execute($sql);
	}

	// Lấy toàn bộ danh sách tin tức thể loại ( Menu danh mục cha ) :
	public function GetDataHomePost()
	{
		$sql = "SELECT * FROM tintuc_menu";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}


	public function DeleteHomePost($id)
	{
		$sql_con = "DELETE FROM tintuccon_menu WHERE idTT = '$id'";
		if($this->execute($sql_con)){
			$sql = "DELETE FROM tintuc_menu WHERE id = '$id'";
			return $this->execute($sql);
		}
	}

	// Lấy dữ liệu cần sửa :
	public function GetDataIDHomePost($id)
	{
		$sql = "SELECT * FROM tintuc_menu WHERE id = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			$data = $this->getData();
		}
		return $data;
	}


	// Cập nhật dữ liệu cần sửa :
	public function UpdateDataIDHomePost($id, $TheLoai, $ChuoiCho, $TrangThai)
	{
		$sql = "UPDATE tintuc_menu SET TheLoai = '$TheLoai', ChuoiCho = '$ChuoiCho', TrangThai = '$TrangThai' WHERE id = '$id'";
		return $this->execute($sql);
	}


	// Thêm dữ liệu cho loại tin :
	public function InsertChildPost($IDTheLoai, $TenLoaiTin, $ChuoiCho, $TrangThai)
	{
		$sql = "INSERT INTO tintuccon_menu(id, idTT, TenLoaiTin, ChuoiCho, TrangThai)VALUES(null, '$IDTheLoai', '$TenLoaiTin', '$ChuoiCho', '$TrangThai')";
		return $this->execute($sql);
	}


	// Hiển thị loại tin :
	public function GetDataChildPost()
	{
		$sql = "SELECT * FROM tintuccon_menu";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

	// Hiển thị loại tin theo ID thể loại :
	public function GetDataChildPostIDTL($idTL)
	{
		$sql = "SELECT * FROM tintuccon_menu WHERE idTT = '$idTL'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

	// Lấy loại tin menu cần sửa :

	public function GetDataIDChildPost($id)
	{
		$sql = "SELECT * FROM tintuccon_menu WHERE id = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			$data = $this->getData();
		}
		return $data;
	}

	// Cập nhật loại tin - Phần menu con :
	public function UpdateDataChildPost($id, $IDTheLoai, $TenLoaiTin, $ChuoiCho, $TrangThai)
	{
		$sql = "UPDATE tintuccon_menu SET idTT = '$IDTheLoai', TenLoaiTin = '$TenLoaiTin', ChuoiCho = '$ChuoiCho', TrangThai = '$TrangThai'";
		return $this->execute($sql);
	}

	// Xóa loại tin :
	public function XoaLoaiTin($id)
	{
		$sql = "DELETE FROM tintuccon_menu WHERE id = '$id'";
		return $this->execute($sql);
	}






	// End TIN TỨC 

	public function XuLyDonHang($tenkhachhang, $sodienthoai, $diachi, $email, $thanhpho)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$sql = "INSERT INTO khachhang(id, tenkhachhang, sodienthoai, diachi, email, thanhpho)VALUES(null, '$tenkhachhang', '$sodienthoai', '$diachi', '$email', '$thanhpho')";

		if($this->runquery($sql)){
			$last_id = $this->conn->insert_id;
			$date = date('d/m/y H:i:s');
			$sql_dondathang = "INSERT INTO dondathang(MaDDH, NgayDat, NgayGiao, DaThanhToan, MaKH, DaHuy)VALUES(null,'$date', null, null, '$last_id', null )";
			if($this->runquery($sql_dondathang)){
				$last_id_donhang = $this->conn->insert_id;
				if(isset($_SESSION['cart']) && $_SESSION['cart'] != NULL){
					foreach($_SESSION['cart'] as $listcart){
						$sql_chitietDH = "INSERT INTO chitietdondathang(MaCTDDH, MaDDH, MaSP, TenSP, SoLuong, DonGia, HinhAnh)VALUES(
						null, '$last_id_donhang', '$listcart[id]', '$listcart[tensanpham]', '$listcart[qty]', '$listcart[giagoc]', '$listcart[hinhanh]')";
						$this->runquery($sql_chitietDH);
						
					}

				}
				unset($_SESSION['cart']);
				return TRUE;
			}
			
		}

		return FALSE;

	}


	// Phần hiển thị đơn hàng trong phần ADMIN :

	public function showOrder()
	{
		$sql = "SELECT * FROM dondathang ORDER BY MaDDH DESC";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}


	// Xóa đơn đặt hàng :

	public function DeleteOrder($MaDDH)
	{
		$sql = "DELETE FROM chitietdondathang WHERE MaDDH = '$MaDDH'";
		if($this->runquery($sql)){
			$sql = "DELETE FROM dondathang  WHERE  MaDDH = '$MaDDH'";
			if($this->runquery($sql)){
				$sql = "DELETE FROM khachhang WHERE id = '$MaDDH'";
				return $this->runquery($sql);
			}
		}

		// $sql = "DELETE 
		// 		FROM dondathang DH,khachhang KH,chitietdondathang CT
		// 		WHERE DH.MaKH = KH.id AND DH.MaDDH = CT.MaDDH AND DH.MaDDH = '$MaDDH'
		// ";
		// return $this->runquery($sql);

	}



	// Chi tiết đơn đặt hàng :

	// Lấy ra thông tin khách hàng đã đặt hàng tại cửa hàng và các sản phẩn trong chi tiết đơn đh :
	public function ChiTietDonDatHang($MaDDH)
	{
		$sql = "  
		SELECT *
		FROM  khachhang k, dondathang ddh, chitietdondathang ctddh
		WHERE k.id = ddh.MaKH AND ddh.MaDDH = ctddh.MaDDH AND ddh.MaDDH = '$MaDDH'
		";
		$this->execute($sql);

		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}


	// Tin tuwsc post :
	public function InsertPostNew($idTL, $idLT, $TieuDe, $HinhAnh, $MoTa, $NoiDung, $ChuoiCho, $LuotXem, $TrangThai)
	{
		$sql = "INSERT INTO tintuc_post(id, idTL, idLT, TieuDe, HinhAnh, MoTa, NoiDung, ChuoiCho, LuotXem, TrangThai)VALUES(null, '$idTL', '$idLT', '$TieuDe', '$HinhAnh', '$MoTa', '$NoiDung', '$ChuoiCho', '$LuotXem', '$TrangThai')";
		$this->execute($sql);
	}

	// Lấy dữ liệu post tin :
	public function GetDataPostNew()
	{
		$sql = "SELECT * FROM tintuc_post";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}


	// Lấy dữ liệu cần sửa theo ID :
	public function GetIDPostNew($id)
	{
		$sql = "SELECT * FROM tintuc_post WHERE id = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			$data = $this->getData();
		}
		return $data;
	}

	// Cập nhật dữ liệu tin tức :
	public function UpdatePostNew($id,$idTL, $idLT, $TieuDe, $HinhAnh, $MoTa, $NoiDung, $ChuoiCho, $LuotXem, $TrangThai)
	{
		$sql = "UPDATE tintuc_post SET idTL = '$idTL', idLT = '$idLT', TieuDe = '$TieuDe', HinhAnh = '$HinhAnh', MoTa = '$MoTa', NoiDung = '$NoiDung', ChuoiCho = '$ChuoiCho', LuotXem = '$LuotXem', TrangThai = '$TrangThai' WHERE id = '$id'";
		return $this->execute($sql);
	}

	// Xóa dữ liệu :
	public function DeletePostNew($id)
	{
		$sql = "DELETE FROM tintuc_post WHERE id = '$id'";
		return $this->execute($sql);
	}

	// Lấy tin theo ID loại tin :
	public function GetDataPostNewID($id)
	{
		$sql = "SELECT * FROM tintuc_post WHERE idLT = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

	// Lấy chi tiết tin theo ID tin:
	public function GetDataPostNewItemID($id)
	{
		$sql = "SELECT * FROM tintuc_post WHERE id = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			$data = $this->getData();
		}
		return $data;
	}


	// Lấy tên loại tin theo ID :
	public function GetName_LoaiTin($id)
	{
		$sql = "SELECT * FROM tintuccon_menu WHERE id = '$id'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			$data = $this->getData();
		}
		return $data;
	}



	// THỐNG KẾ 
	public function SoLuongDonHang()
	{
		$sql = "SELECT * FROM dondathang";
		$this->execute($sql);
		$data = $this->num_rows();
		return $data;
	}


	public function SanPham()
	{
		$sql = "SELECT * FROM sanphampost";
		$this->execute($sql);
		$data = $this->num_rows();
		return $data;
	}


	public function TinTuc()
	{
		$sql = "SELECT * FROM tintuc_post";
		$this->execute($sql);
		$data = $this->num_rows();
		return $data;
	}

		


	// END THỐNG KÊ

	// Lấy ra thông tin khách hàng đã đặt hàng tại cửa hàng và các sản phẩn trong chi tiết đơn đh :
	public function HienThiThongTinDonDatHang()
	{
		$sql = "  
		SELECT *
		FROM  khachhang k, dondathang ddh, chitietdondathang ctddh
		WHERE k.id = ddh.MaKH AND ddh.MaDDH = ctddh.MaDDH
		";
		$this->execute($sql);

		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

	// Hiển thị thông tin khách hàng đã đặt hàng :
	public function KhachHangOrder()
	{
		$sql ="  
			SELECT *
			FROM donhang 
		";

		$this->runquery($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
			return $data;
		}
	}

	// Lấy thông tin khách hàng dựa vào idKH :
	public function ThongTinKhachHangOrder($idKH)
	{
		$sql = "SELECT * FROM khachhang WHERE id = '$idKH'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			$data = $this->getData();
		}
		return $data;
	}

	// Lấy thông tin sản phẩm mà khách hàng đặt:
	public function ThongtinSanPham_DatHang($MaDDH)
	{
		$sql = "SELECT * FROM chitietdondathang WHERE MaDDH = '$MaDDH'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}
		else{
			while($datas = $this->getData())
			{
				$data[] = $datas;
			}
		}
		return $data;
	}


	// PHƯƠNG THỨC TÌM KIẾM SẢN PHẨM :
	public function SearchProduct($tukhoa)
	{
		$sql = "SELECT * FROM sanphampost WHERE tensanpham REGEXP '$tukhoa'";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data =0;
		}
		else{
			while($datas = $this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

}
?>
