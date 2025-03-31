
		<!-- Footer -->
		<footer id="footer">
	<!-- container -->
	<div class="container">

		<!-- row -->
		<div class="row">
		<div class="col-md-6" >
				<div class="section-header  text-center" >
					<h4 class="sub-title">Orari</h4>
					<h2 class="title" style="color: whitesmoke;">Na vizitoni!</h2>
				</div>
				<div class="contact-content text-center">
					<h4 style="color: gray;">E hëne - e premte <br> <p href="#" style="color: gray;">08:00 - 16:00</p></h4>
					
				</div>
			</div>
			<div class="col-md-6" >
				<div class="section-header  text-center" >
					<h4 class="sub-title">Adresa</h4>
					<h2 class="title" style="color: whitesmoke;">Na vizitoni!</h2>
				</div>
				<div class="contact-content text-center">
					<!--<h4 style="color: gray;">Tel: <a href="#" style="color: gray;">045-548-14-97</a></h4>-->
					<p>Lipjan, Kosovë</p>
					<!--<p>Email: <a href="#" style="color: gray;">bibloteka@email.com</a></p>-->
					<!--<ul class="list-inline">-->
					<!--	<li><p>Na ndiqni:</p></li>-->
					<!--	<li><a href="#"><i class="fa fa-facebook"  style="color: gray;"></i></a></li>-->
					<!--	<li><a href="#"><i class="fa fa-twitter"  style="color: gray;"></i></a></li>-->
					<!--	<li><a href="#"><i class="fa fa-google-plus" style="color: gray;"></i></a></li>-->
					<!--</ul>-->
				</div>
			</div>

		</div>
		<!-- /row -->
		<hr>
		<div class="text-center">&copy;BWD 2021</div>
		
	</div>
	<!-- /container -->

		</footer>
		<!-- /Footer -->

		<!-- jQuery Plugins -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/2112736a95.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".nav-item").on('click', function() {
                $(".nav-item").removeClass("activeItem");
                $(this).addClass("activeItem");
            })

            $(function() {
                $("#example1").DataTable();
            });

        })
    </script>

	</body>
</html>
