<?php
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

	<?php
	$servername = 'localhost';
	$username = 'bibllmga_medina';
	$password = 'devsfor2020';
	$dbname = "bibllmga_bibloteka";
	$conn = mysqli_connect($servername, $username, $password, "$dbname");


    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	global $number_of_pages;
	function shfaqLibrat()
	{
		global $conn;
		if (isset($_POST['search'])) {
		    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$value = trim($_POST['myInput']);
			$value = htmlspecialchars($_POST['myInput']);
			$value = stripslashes($_POST['myInput']);

			$sql = "SELECT * FROM librat WHERE titulli LIKE '%" . $value . "%' or autori LIKE '%" . $value . "%'";
			$librat = mysqli_query($conn, $sql);
			return $librat;
		} else {
			$sqli = "SELECT * FROM `librat`";
			$librat = mysqli_query($conn, $sqli);
			$result_per_page = 9;
			$number_of_results = mysqli_num_rows($librat);
			global $number_of_pages;
			$number_of_pages = ceil($number_of_results / $result_per_page);
			if (!isset($_GET['page'])) {
				global $page;
				$page = 1;
			} else {
				global $page;
				$page = $_GET['page'];
			}
			$this_page_first_result = ($page - 1) * $result_per_page;
			$sqli = "SELECT * FROM `librat`  ORDER BY kategoriaId ASC LIMIT " . $this_page_first_result . ',' . $result_per_page;

			global  $librat;
			$librat = mysqli_query($conn, $sqli);
			return $librat;
		}
	}
	?>

	<!-- Home -->
	<div class="banner-area">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay" style="background-image:url(./img/books.jpg)"></div>
		<!-- /Backgound Image -->

		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="white-text title">Librat</h2>
					<div style="text-align: center;">
						<a href="index.php" style="background-color:#00442e ; padding:10px; border-radius:10px; color:#fff;">Kthehu tek
							Ballina</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Home -->

	<!-- Books section -->
	<div class="container">
		<div class="row" style="padding-bottom:30px; padding-top:20px;">
			<div class="col-md-6 ">
				<br>
				<h4 class="text-right">Gjej librin që dëshironi!</h4>
			</div>
			<div class="col-md-6">
				<br>
				<form method="post" class="form-inline">
					<input name="myInput" id="myInput" class="form-control mr-sm-2 py-2" type="text" placeholder="Sipas titullit ose autorit...">

					<button class="btn form-control" type="submit" name="search" style="background-color:#00442e; color:#fff;">Kerko</button>

				</form>

			</div>
		</div>
		<div class="row paginated" id="myTable" style="padding-bottom:30px; padding-top:20px;">

			<?php
			ini_set('display_errors', 0);
			$result = shfaqLibrat();
			if(mysqli_num_rows($result) < 1){
				echo "<h3 class='text-center' style='min-height:120px;'>Na vjen keq, ky libër nuk gjendet në biblotekën tonë.</h3>";
			}else{
			while ($row = mysqli_fetch_array($result)) {
				echo "<div class='col-md-4' style='padding-bottom:20px;'>";
				echo "<div class='card text-center bg-light' style='box-shadow: 4px 4px 10px -4px rgba(0,0,0,0.75);  border: 1px solid #f2f4f7; border-radius:10px;'>";
				if (htmlspecialchars($row['foto']) == null) {
					echo "<img class='card-img-top' src='admin/non-pages/images/book.jpg' width='150px' height='170px' >";
				} else {
					echo "<img class='card-img-top' src='admin/non-pages/images/" . htmlspecialchars($row['foto']) . "' width='150px' height='170px' >";
				}
				echo "<div class='card-body'>";
				$title = htmlspecialchars($row["titulli"]);
				if (strlen($title) > 22) {
					$title = substr($title, 0, 22) . "...";
				}

				echo "<h3 class='card-title'><abbr title=" . htmlspecialchars($row["titulli"]) ." style='text-decoration:none; border:none;'>{$title}</abbr></h3>";
				echo "<h4>" . htmlspecialchars($row["autori"]) . "</h4>";
				echo "</div>";
				echo "<div class='card-footer' style='background-color:#fcfcfa;'> Viti i publikimit: " . htmlspecialchars($row["dataEPublikimit"]) . "</div>";
				echo "</div>";
				echo "</div>";
			};
		}
			?>
		</div>

		<div style="text-align: center;">
			<?php
			$pagLink = "<ul class='pagination text-center'>";
			for ($page = 1; $page <= $number_of_pages; $page++) {
				$pagLink .= "<li class='page-item'><a class='page-link' href='books.php?page=" . $page . "'>" . $page . "</a></li>";
			}
			echo $pagLink . "</ul>";
			?>
		</div>



	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- /Books section -->
	<?php
	include "inc/footer.php";
	?>