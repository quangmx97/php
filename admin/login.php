<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	header('location: index.php');
}
else{
	require_once('Model/database.php');
	$db = new database;
	$db->connect();

	if(isset($_POST['login-submit'])){
		$error = array();
		$user = $_POST['username'];
		$pass = $_POST['password'];

		$sql = "SELECT * FROM tblthanhvien WHERE user = '$user' AND pass = '$pass'";
		$num_row = $db->checkLogin($sql);

		if($num_row == TRUE){
			$_SESSION['username'] = $user;
			$_SESSION['password'] = $pass;
			header('location: index.php');
		}
		else{
			$error[] = 'loilogin';
		}
	}


	if(isset($_POST['register-submit'])){
		$success = array();
		$error  = array();
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm-password'];

		if($password == $confirm_password){

			$sql_kiemtra = "SELECT * FROM tblthanhvien WHERE user = '$username'";
			$num_row = $db->check($sql_kiemtra);
			if($num_row==TRUE){
				$sql = "INSERT INTO tblthanhvien (user, email, pass, pass2) VALUES ('$username', '$email', '$password', '$confirm_password')";
				$db->add($sql);
				$success[] = 'dangkythanhcong';
			}
			else{
				$error[] = 'taikhoandatontai';
			}
			
		}
		else{
			$error[] = 'dangkythatbai';
		}
	}

	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login Hệ thống quản trị</title>
		<!-- Bootstrap core CSS-->
		<link href="public-wp/css/bootstrap.min.css" rel="stylesheet">
		<!-- Page level plugin CSS-->
		<link href="public-wp/css/dataTables.bootstrap4.css" rel="stylesheet">
		<!-- Custom fonts for this template-->
		<link href="public-wp/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="public-wp/css/font-awesome.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="public-wp/css/style_login.css">
		<link href="public-wp/css/bootstrap3.min.css" rel="stylesheet">

         <!--  <link href="public-wp/css/fontawesome.min.css" rel="stylesheet" type="text/css">
        <link href="public-wp/css/fontawesome.css" rel="stylesheet" type="text/css">
          <link href="public-wp/css/fontawesome-all.css" rel="stylesheet" type="text/css">
        <link href="public-wp/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
        <link href="public-wp/css/fa.css" rel="stylesheet" type="text/css"> -->
        <!-- Custom styles for this template-->
        <link href="public-wp/css/sb-admin.css" rel="stylesheet">
      <!--   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
      	<!--  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
      </head>
      <body style="background: url('upload/DO39WqfR.jpg') no-repeat left; ">
      	<div class="container">
      		<div class="row">
      			<div class="col-md-6 col-md-offset-3">
      				<?php 
      				if(isset($success)&&in_array('dangkythanhcong', $success)){
      					echo "<p class='alert alert-success'>Chúc mừng , bạn đã đăng ký thành công !</p>";
      				}
      				if(isset($error)&&in_array('dangkythatbai', $error)){
      					echo "<p class='alert alert-danger'>Xin lỗi , bạn đăng ký không thành công .</p>";
      				}
      				if(isset($error)&&in_array('taikhoandatontai', $error)){
      					echo "<p class='alert alert-danger'>Xin lỗi , tài khoản đã tồn tại .</p>";
      				}
      				?>
      				<h3 class="center" style='color:#009688; font-weight: bold; text-align: center; text-transform: uppercase;'>Đăng nhập vào hệ thống quản trị</h3>
      				<div class="panel panel-login">
      					<div class="panel-heading">
      						<div class="row">
      							<div class="col-xs-6">
      								<a href="#" class="active" id="login-form-link">Đăng nhập</a>
      							</div>
      							<div class="col-xs-6">
      								<a style="pointer-events: none;" href="#" id="register-form-link">Đăng ký</a>
      							</div>
      						</div>
      						<hr>
      					</div>
      					<div class="panel-body">
      						<div class="row">
      							<div class="col-lg-12">
      								<form id="login-form" action="" method="POST" role="form" style="display: block;">
      									<div class="form-group">
      										<input type="text" name="username" required="" id="username" tabindex="1" class="form-control" placeholder="Tên đăng nhập (User)" value="">
      									</div>
      									<div class="form-group">
      										<input type="password" required="" name="password" id="password" tabindex="2" class="form-control" placeholder="Mật khẩu (pass)">
      									</div>
      									<div class="form-group text-center">
      										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
      										<label for="remember"> Nhớ đăng nhập</label>
      									</div>
      									<div class="form-group">
      										<div class="row">
      											<div class="col-sm-6 col-sm-offset-3">
      												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login btn-info" value="Đăng nhập">
      											</div>
      										</div>
      									</div>
      									<div class="form-group">
      										<div class="row">
      											<div class="col-lg-12">
      												<div class="text-center">
      													<a href="" tabindex="5" class="forgot-password">Quên mật khẩu?</a>
      												</div>
      											</div>
      										</div>
      									</div>
      									<?php if(isset($error)&&in_array('loilogin', $error)){ echo "<p class='alert alert-danger'>Bạn nhập sai username hoặc password</p>"; } ?>
      								</form>
      								<!-- <form id="register-form" action="" method="post" role="form" style="display: none;">
      									<div class="form-group">
      										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Tên tài khoản (User)" value="" required="">
      									</div>
      									<div class="form-group">
      										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" required="">
      									</div>
      									<div class="form-group">
      										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mật khẩu (Pass)" required="">
      									</div>
      									<div class="form-group">
      										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Nhập lại mật khẩu" required="">
      									</div>
      									<div class="form-group">
      										<div class="row">
      											<div class="col-sm-6 col-sm-offset-3">
      												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register btn-success" value="Đăng ký">
      											</div>
      										</div>
      									</div>
      								</form> -->
      							</div>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      	<!-- Bootstrap core JavaScript-->
      	<script src="public-wp/js/jquery.min.js"></script>
      	<script src="public-wp/js/bootstrap.bundle.min.js"></script>
      	<!-- Core plugin JavaScript-->
      	<script src="public-wp/js/jquery.easing.min.js"></script>
      	<!-- Page level plugin JavaScript-->
      	<script src="public-wp/js/jquery.dataTables.js"></script>
      	<script src="public-wp/js/dataTables.bootstrap4.js"></script>
      	<!-- Custom scripts for all pages-->
      	<script src="public-wp/js/sb-admin.min.js"></script>
      	<!-- Custom scripts for this page-->
      	<script src="public-wp/js/sb-admin-datatables.min.js"></script>
      	<script src="public-wp/js/bootstrap3.min.js"></script>

      	<script src="public-wp/js/login.js"></script>
      	<script src="ajax.js"></script>
      	<script src="ajax_addproduct.js"></script>
      </body>
      </html>

      <?php
  }
  ?>