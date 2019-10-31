<?php
require_once('Model/database.php');
$db = new database;
$db->connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm đối tượng , thể loại</title>
</head>
<body>
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
					require_once('Moduls/Menu/SanPham/add.php');
					require_once('Moduls/Menu/SanPham/add_loaicon.php');  
					?>
				</div>
			</div>
			<?php  
			require_once('Moduls/Menu/SanPham/list.php');
			require_once('Moduls/Menu/SanPham/list_loaicon.php');
			?>


		</div>
	</div>
	<!-- /.container-fluid-->
	<!-- /.content-wrapper-->
	<!-- start footer infomation -->
</body>
</html>