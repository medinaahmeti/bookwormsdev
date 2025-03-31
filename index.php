<?php
include "inc/header.php";
?>
<!-- Home -->
<div id="home" class="banner-area">

	<!-- Backgound Image -->
	<div class="bg-image bg-parallax overlay" style="background-image:url(./img/background02.jpg)"></div>
	<!-- /Backgound Image -->

	<div class="home-wrapper">

		<div class="col-md-10 col-md-offset-1 text-center">
			<div class="home-content">
				<h1 class="white-text">Bibloteka e qytetit</h1>
				<h4 class="white-text lead">Librat janë miqtë e përhershëm, këshilltarët më të mençur dhe mësuesit më të durueshëm.</h4>
			</div>
		</div>

	</div>

</div>
<!-- /Home -->

<!-- container -->
<div class="container">

	<!-- Events -->
	<div id="events" class="section">


		<!-- row -->
		<div class="row">

			<!-- section header -->
			<div class="section-header text-center">
				<h4 class="sub-title">Ngjarjet</h4>
				<h2 class="title">Ngjarjet e ardhshme</h2>
			</div>
			<!-- /section header -->
			<?php
			$ngjarjet = new \Admin\Lib\Ngjarjet();
			foreach ($ngjarjet->find_lastest() as $n) {

			?>
				<!-- single event -->
				<div class="col-md-6">
					<div class="event">
						<div class="event-img" style="border-color: #00442e;">
							<img src="./img/event.jpg" alt="">
							<div class="event-day">
								<span><?php echo $n['data'] ?></span>
							</div>
						</div>
						<div class="event-content">
							<p><i class="fa fa-clock-o"></i> <?php echo $n['ora'] ?></p>
							<h3><a href="#"><?php echo  $n['titulli']; ?></a></h3>
							<p><?php echo $n['permbajtja']; ?></p>
						</div>
					</div>
				</div>
				<!-- /single event -->
			<?php
			}
			?>

		</div>
		<!-- /row -->


</div>
<!-- /Events -->



<hr>


<!-- Books -->
<div id="books" class="section">

	<!-- row -->
	<div class="row">

		<!-- section header -->
		<div class="section-header text-center">
			<h4 class="sub-title">Librat</h4>
			<h2 class="title">Librat e Fundit</h2>
		</div>
		<!-- /section header -->
		<?php
		$Librat = new \Admin\Lib\Librat();
		foreach ($Librat->find_lastest() as $row) {

			echo "<div class='col-md-4' style='padding-bottom:20px;'>";
			echo "<div class='card text-center bg-light' style='box-shadow: 4px 4px 10px -4px rgba(0,0,0,0.75);  border: 1px solid #f2f4f7; border-radius:10px;'>";
			if($row['foto'] == null){
				echo "<img class='card-img-top' src='admin/non-pages/images/book.jpg' width='150px' height='170px' >";
			}else{
			 echo "<img class='card-img-top' src='admin/non-pages/images/".$row['foto']."' width='150px' height='170px' >";
			}
			echo "<div class='card-body'>";
			$title = $row["titulli"];
			if (strlen($title) > 22) {
				$title = substr($title, 0, 22) . "...";
			}

			echo "<h3 class='card-title'><abbr title='{$row["titulli"]}' style='text-decoration:none; border:none;'>{$title}</abbr></h3>";
			echo "<h4>" . $row["autori"] . "</h4>";
			echo "</div>";
			echo "<div class='card-footer' style='background-color:#fcfcfa;'> Viti i publikimit: " . $row["dataEPublikimit"] . "</div>";
			echo "</div>";
			echo "</div>";
		
		}
		?>

	</div>
	<!-- /row -->
<div  style="text-align: center;">

<a href="books.php" style="background-color:#00442e; padding:10px; border-radius:10px; color:#fff;">Shiko më shumë </a>

</div>

</div>
<!-- /Books -->

</div>

<!-- Footer -->
<?php
include_once "inc/footer.php";
?>
<!-- /Footer -->