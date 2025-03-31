<?php
ob_start();
session_start();
include("autoloader.php");

$session = new Admin\Lib\Session();

if ($session->is_signed_in()) {
	header("Location: pages/dashboard/index.php");
}
if (isset($_POST['loginStaf'])) {

	$user = new \Admin\Lib\Stafi();
	$user_data = $user->find_all();

	$email = $_POST['email'];
	$password =$_POST['password'];
	foreach ($user_data as $u) {
	    if($email == $u->email){
    		$password_v = password_verify($password, $u->password);
    		if ($password_v) {
    			$real_password = $u->password;
    
    			$user_found = $user->verify_user($email, $real_password);
    			if ($user_found) {
    				$session->login($user_found);
    				// echo "<script>window.location.href='pages/dashboard/index.php';</script>";
    				 header("Location: pages/dashboard/index.php");
    			} else {
    				$the_message = "Përdoruesi ose fjalëkalimi juaj nuk është i saktë!";
    			
    
    			}
    		} else {
    			$real_password = "";
    			$the_message = "Përdoruesi ose fjalëkalimi juaj nuk është i saktë!";
    		}
	    }
	}
}

?>

<!-- Login student -->
<?php

if (isset($_POST['loginStudent'])) {

	$user = new \Admin\Lib\Studentet();
	$user_data = $user->find_all();

	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	foreach ($user_data as $u) {
		$password_v = password_verify($password, $u->password);
		if ($password_v == 1) {
			$real_password = $u->password;
			$user_found = $user->verify_user($email, $real_password);
			if ($user_found) {
				$session->login($user_found);
				header("Location: pages/dashboard/index.php");
			} else {
				$the_message = "Përdoruesi ose fjalëkalimi juaj nuk është i saktë!";
			}
		} else {
			$real_password = "";
			$the_message = "Përdoruesi ose fjalëkalimi juaj nuk është i saktë!";
		}
	}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="template/css/bootstrap.min.css">
	<link rel="stylesheet" href="template/css/style.css">
	<title>Bibloteka</title>
	<style>
		body {
			background-image: url('template/img/book.jpg');
			background-color: #cccccc;
			background-position: center;
			background-repeat: no-repeat;
			background-size: auto 100% cover;
			position: relative;
			opacity: 0.8;
			scroll-behavior: smooth;
			overflow-x: hidden;

		}
	</style>
</head>

<body>
	<div class="main">

		<div class="v_center">
			<div class="container register">
				<div class="row">
					<div class="col-md-3 register-left">
						<img src="template/img/bwd.png" alt="" />
						<h3>Mirë se vini!</h3>
						<p>Hyrja në sistem</p>
						<button type="submit" class="btn btn-dark"><a style="text-decoration: none; color:white;" href="../index.php">Ballina</a></button>
					</div>
					<div class="col-md-9 register-right">
						<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Stafi</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lexuesi</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<h3 class="register-heading">Kyqu si staf</h3>
								<?php if (!empty($the_message)) {
									echo '<h6 class="register-p">';
									echo $the_message;
									echo '</h6>';
								} ?>
								<div class="row register-form justify-content-center">
									<form action="" method="post" class="text-center">
										<div class="col-md-12">
											<div class="form-group">
												<input type="email" class="form-control" name="email" placeholder="Email" value="" required />
											</div>
											<div class="form-group">
												<input type="password" class="form-control" name="password" placeholder="Fjalëkalimi" value="" required />
											</div>

											<button type="submit" class="btnRegister" name="loginStaf">Kyqu</button>
										</div>
									</form>
								</div>
							</div>
							<div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<h3 class="register-heading">Kyqu si lexues</h3>
								<?php if (!empty($the_message)) {
									echo '<h6 class="register-p">';
									echo $the_message;
									echo '</h6>';
								} ?>
								<div class="row register-form justify-content-center">
									<form action="" method="post">
										<div class="col-md-12">
											<div class="form-group">
												<input type="email" class="form-control" name="email" placeholder="Email" value="" required />
											</div>
											<div class="form-group">
												<input type="password" class="form-control" name="password" placeholder="Fjalëkalimi" value="" required />
											</div>

											<button type="submit" class="btnRegister" name="loginStudent">Kyqu</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<script src="template/vendor/jquery/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="template/js/bootstrap.min.js"></script>
</body>

</html>