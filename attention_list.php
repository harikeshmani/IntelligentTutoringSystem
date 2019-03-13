<?php
include("auth.php");
$user_id = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
	</head>
	<body>
		<div class="body">
			<?php include("menu.php") ?>
			<div role="main" class="main" >
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>Attention Game List</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<h4>Attention Game List</h4>
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Icon</th>
										<th>Game Name :</th>
										<th>Open Link :</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$list = mysqli_query($link, "SELECT * FROM tbl_game_type where  game_type='attention' LIMIT 1 ");
									while($list_data=mysqli_fetch_array($list))
									{
									echo "<tr>";
										echo "<td><img src='api/game_icon/games corsi block.png' alt='corsi block' height='38' width='62'></td>";
										echo "<td>".$list_data['game_name']."</td>";
										echo "<td><a href='".$list_data['game_link']."'><button type= 'submit' class='btn btn-primary'>Link</button></a></td>";
									echo "</tr>";
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- Vendor -->
			<script src="vendor/jquery/jquery.min.js"></script>
			<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
			<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
			<script src="vendor/jquery-cookie/jquery-cookie.min.js"></script>
			<script src="vendor/popper/umd/popper.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
			<script src="vendor/common/common.min.js"></script>
			<script src="vendor/jquery.validation/jquery.validation.min.js"></script>
			<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
			<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
			<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
			<script src="vendor/isotope/jquery.isotope.min.js"></script>
			<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
			<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
			<script src="vendor/vide/vide.min.js"></script>
			
			<!-- Theme Base, Components and Settings -->
			<script src="js/theme.js"></script>
			
			<!-- Theme Custom -->
			<script src="js/custom.js"></script>
			
			<!-- Theme Initialization Files -->
			<script src="js/theme.init.js"></script>
			<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
				ga('create', 'UA-12345678-1', 'auto');
				ga('send', 'pageview');
			</script>
			-->
			
			
		</body>
	</html>