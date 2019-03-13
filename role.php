<?php
$lang = $_GET['lang'];
?>
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
			<?php include("menu.php");
			if($lang=='hn') { ?>
			<div role="main" class="main" style="background-image: url(img/bg-01.jpg);">
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>अपनी भूमिका का चयन करें</h1>
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
												<h3 class="heading-primary mb-3" > नमस्ते ! मैं हूँ</h3>
												<div class="row mt-2">
													<div class="col-md-4 mt-3">
														<img src="img/student.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="login.php?lang=hn"> <button class="btn btn-primary btn-xl" >
															छात्र
														</button></a>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-md-4 mt-3">
														<img src="img/teacher.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="tutor/tutor_login.php?lang=hn"> <button class="btn btn-primary btn-xl">
															अध्यापक
														</button></a>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-md-4 mt-3">
														<img src="img/class.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="class/class_login.php?lang=hn"> <button class="btn btn-primary btn-xl">
															कक्षा
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
			<?php } else if($lang=='mt') { ?>
			<div role="main" class="main" style="background-image: url(img/bg-01.jpg);">
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>आपली भूमिका निवडा</h1>
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
												<h3 class="heading-primary mb-3" > हाय ! मी आहे</h3>
												<div class="row mt-2">
													<div class="col-md-4 mt-3">
														<img src="img/student.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="login.php?lang=mt"> <button class="btn btn-primary btn-xl" >
															विद्यार्थी
														</button></a>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-md-4 mt-3">
														<img src="img/teacher.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="tutor/tutor_login.php?lang=mt"> <button class="btn btn-primary btn-xl">
															शिक्षक
														</button></a>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-md-4 mt-3">
														<img src="img/class.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="class/class_login.php?lang=mt"> <button class="btn btn-primary btn-xl">
															वर्ग
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
			<?php } else if($lang=='tl') { ?>
			<div role="main" class="main" style="background-image: url(img/bg-01.jpg);">
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>మీ పాత్ర ఎంచుకోండి</h1>
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
												<h3 class="heading-primary mb-3" > HI! నేను</h3>
												<div class="row mt-2">
													<div class="col-md-4 mt-3">
														<img src="img/student.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="login.php?lang=tl"> <button class="btn btn-primary btn-xl" >
															విద్యార్థి
														</button></a>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-md-4 mt-3">
														<img src="img/teacher.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="tutor/tutor_login.php?lang=tl"> <button class="btn btn-primary btn-xl">
															టీచర్
														</button></a>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-md-4 mt-3">
														<img src="img/class.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="class/class_login.php?lang=tl"> <button class="btn btn-primary btn-xl">
															
															తరగతి
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
			<?php } else { ?>
			<div role="main" class="main" style="background-image: url(img/bg-01.jpg);">
				<section class="page-header">
					<div class="container">
						<div class="row">
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
														<a href="login.php?lang=eng"> <button class="btn btn-primary btn-xl" >
															Student
														</button></a>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-md-4 mt-3">
														<img src="img/teacher.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="tutor/tutor_login.php?lang=eng"> <button class="btn btn-primary btn-xl">
															Teacher
														</button></a>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-md-4 mt-3">
														<img src="img/class.png" style="height: 70px;">
													</div>
													<div class="col-md-8 mt-4">
														<a href="class/class_login.php?lang=eng"> <button class="btn btn-primary btn-xl">
															Class
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
			<?php }	?>
			<?php include("footer.php") ?>
		</div>
		<!-- Vendor -->
		<?php include("footer_files.php") ?>
	</body>
</html>