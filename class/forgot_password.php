<?php include("auth.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body>
		<div class="body">
			<?php include("menu.php") ?>
			<div role="main" class="main" style="background-image: url(../img/bg-01.jpg);">
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>Student Password Reset</h1>
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
										<div class="featured-box featured-box-primary text-center mt-5" >
											<div class="box-content" style="background-color: #1b68b2;">
												<h4 class="heading-primary text-uppercase mb-3" >Forgot password </h4>
												<form action="" id="forgot" method="post" name="password_reset">
													<div id="reset_password">
														<div class="form-row">
															<div class="form-group col">
																<label>Mobile Number </label>
																<input type="text" value="" class="form-control form-control-lg" placeholder="enter your registerd mobile number" name="resetmobs" id="resetmob">
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col">
																<button type="button" class="btn btn-primary btn-xl mb-5 mt-1 mr-1" style="background-color: #FFF; color: #1b68b2 " id="sendotp"><i class="fas fa-sync fa-spin"></i>Send OTP</button>
															</div>
														</div>
													</div>
													<div id="enter_otp">
														<div class="form-row">
															<div class="form-group col">
																<label>Enter OTP </label>
																<input type="text" value="" class="form-control form-control-lg" name="enterotp" placeholder="Enter your OTP " id="enterotp">
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col">
																<button type="button" class="btn btn-primary btn-xl  mb-5" style="background-color: #FFF; color: #1b68b2 " id="enterotps">match your OTP</button>
															</div>
														</div>
													</div>
													<div id="password_reset_end">
														<div class="form-row">
															<div class="form-group col">
																<label>Enter your New password </label>
																<input class="form-control form-control-lg" type="password" name="pass1" placeholder="Enter your new password " id="pass1">
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col">
																<label>Retype Password </label>
																<input class="form-control form-control-lg" type="password" name="pass2" placeholder="Retype password" id="pass2">
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col">
																<button type="button" class="btn btn-primary btn-xl  mb-5" style="background-color: #FFF; color: #1b68b2 " id="upadteit"><i class="fas fa-sync fa-spin"></i>Change Your Password</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="col-md-3"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- ../vendor -->
			<?php include("footer_files.php") ?>
			<script src="includes/js/home.js"></script>
		</body>
	</html>