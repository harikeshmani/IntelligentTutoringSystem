<?php
include("auth.php");
include("calender_function.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<link rel="stylesheet" href="../css/calender.css" />
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
								<h1>Calender</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>scheduled <strong>Sessions</strong></h3>
							</div>
							<form class="form-horizontal" role="form">
								<div id="calendar_div">
									<?php echo getCalender(); ?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php include("footer.php") ?>
		</div>
		<!-- ../vendor -->
		<?php include("footer_files.php") ?>
	</body>
</html>