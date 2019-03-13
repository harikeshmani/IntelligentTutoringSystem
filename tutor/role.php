<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<style type="text/css">
			.btn.btn-xl {
				width: 300px;
			}
		</style>
	</head>
	<body>
		<div class="body">
			<?php include("menu.php") ?>
			<div role="main" class="main" style="background-image: url(img/bg-01.jpg);">
				<section class="page-header">
					<div class="container">
						<div class="row">
							<!-- 							<div class="col">
									<ul class="breadcrumb">
											<li><a href="#">Home</a></li>
											<li class="active">Pages</li>
									</ul>
							</div> -->
						</div>
						<div class="row">
							<div class="col">
								<h1>Select Your Role</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="featured-boxes">
								<div class="row">
									<div class="col-md-3"></div>
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-center mt-5">
											<div class="box-content">
												<h3 class="heading-primary mb-3" > HI ! I Am</h3>
												<div class="row mt-2">
													<div class="col-md-4 mt-3">
														<img src="img/student.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="login.php"> <button class="btn btn-primary btn-xl" >
															Student
														</button></a>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-md-4 mt-3">
														<img src="img/teacher.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="tutor/login.php"> <button class="btn btn-primary btn-xl">
															Teacher
														</button></a>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-md-4 mt-3">
														<img src="img/class.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="tutor/login.php"> <button class="btn btn-primary btn-xl">
															class
														</button></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("footer.php") ?>
		</div>
		<!-- Vendor -->
		<?php include("footer_files.php") ?>
			</body>
</html>