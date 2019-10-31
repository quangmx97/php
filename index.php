	<?php
	ob_start();
	session_start();
	require_once('admin/Model/database.php');
	$db = new database;
	$db->connect();

	if(isset($_GET['controller'])){
		$controller = $_GET['controller'];
	}
	else{
		$controller = '';
	}

	?>
	<?php require_once('includes/header.php'); ?>
	<div class="content">
		<div class="container">
			<?php require_once('includes/left-wp.php'); ?>
			<div class="content-wp">

				<?php  
				switch ($controller) {
					case 'chi-tiet-san-pham':{
						require_once('Modul/pages/chi-tiet-san-pham.php');
						break;
					}

					case 'loai-san-pham':{
						require_once('Modul/pages/loai-san-pham.php');
						break;
					}

					// Start giỏ hàng 

					case 'them-gio-hang':{
						require_once('Modul/shoppingcart/them-gio-hang.php');
						break;
					}

					case 'san-pham-trong-gio-hang':{
						require_once('Modul/shoppingcart/san-pham-trong-gio-hang.php');
						break;
					}

					case 'xoa-san-pham-trong-gio':{
						require_once('Modul/shoppingcart/delete_product.php');
						break;
					}

					case 'dat-hang':{
						require_once('Modul/shoppingcart/dat-hang.php');
						break;
					}

					case 'cap-nhat-gio-hang':{
						require_once('Modul/shoppingcart/update_product.php');
						break;
					}

					case 'bao-cao-thanh-cong':{
						require_once('Modul/shoppingcart/bao-cao-thanh-cong.php');
						break;
					}

					case 'san-pham-theo-the-loai':{
						require_once('Modul/pages/san-pham-theo-the-loai.php');
						break;
					}

					case 'tim-kiem':{
						require_once('Modul/pages/tim-kiem.php');
						break;
					}

					// End giỏ hàng 

					default:{
						require_once('Modul/pages/trang-chu.php');
						break;
					}

				}
				?>

			</div> <!--  /content-wp -->
		</div> <!-- /container -->
	</div> <!-- /content -->

	<?php  
		require_once('includes/footer.php');
		ob_end_flush();
	 ?>