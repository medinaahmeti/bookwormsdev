<?php
	session_start();
require_once "admin/autoloader.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Bibloteka</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,700%7CCabin:400%7CDancing+Script" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>

	<!-- Header -->
	<header id="header">
		<!-- Mobile toggle -->
		<button class="navbar-toggle">
			<span></span>
		</button>
		<!-- Mobile toggle -->
		<!-- Bottom nav -->
		<div id="bottom-nav">
			<div class="container">
				<nav id="nav">
					<a class="navbar-brand" href="index.php"><strong>Bibloteka</strong></a>
					<!-- nav -->
					<ul class="main-nav nav navbar-nav " style="float: right; padding-right:20px;">
						<li><a href="#home">Ballina</a></li>

						<li><a href="#events">Ngjarjet</a></li>
						<li><a href="#books">Librat</a></li>
						<li><a href="#footer">Kontakti</a></li>
						<?php
						
					

						if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != "") { ?>
							<li><a href="admin/login.php" style="background-color: #00442e; color:#fff; border-radius:5px;">Profili</a></li>
						<?php
						} else { ?>
							<li><a href="admin/login.php" style="background-color: #00442e; color:#fff; border-radius:5px;">Kyqu</a></li>
						<?php }
						?>
					</ul>
					<!-- /nav -->

				</nav>
			</div>
		</div>
		<!-- /Bottom nav -->
	</header>
	<!-- /Header -->