<?php
include("auth.php");
$user_id = $_SESSION['user_id'];
$flagg = "true";
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body>
		<div class="body">
			<?php include("menu.php") ?>
			<div role="main" class="main">
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>Earning</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>Earning </h3>
							</div>
							
							<p><h2 style="color: #808000;  ">Rs 0.0</h2></p>
							
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- Vendor -->
			<?php include("footer_files.php") ?>
		</body>
	</html>