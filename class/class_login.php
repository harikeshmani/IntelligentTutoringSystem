<?php
include 'config.php';
?>
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
								<h1>Class Login / Registration</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					
					<div class="row">
						<div class="col">
							<div class="featured-boxes">
								<!---login form starts here-->
								<div class="row">
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content" style="background-color: #1b68b2;">
												<h4 class="heading-primary text-uppercase text-center mb-3">Class Login</h4>
												<form action="" id="frmSignIn" name="login" method="post">
													<div class="form-row">
														<div class="form-group col">
															<label>Enter Your Email-Id </label>
															<input type="text" id="email" name="email" value="" class="form-control form-control-lg">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>Enter Password</label>
															<input type="password" id="password" name="password" value="" class="form-control form-control-lg">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-lg-12">
															<a class="float-right" style="color: #FFF;" href="forgot_password.php">Forgot Password ?</a>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-lg-6"></div>
														<div class="form-group col-lg-6 ">
															<button name="login" id="login" class="btn btn-outline btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 "><i class="log fas fa-sync fa-spin"></i>Login</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!------------------registeration form starts here-------------------------->
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5" >
											<div class="box-content" style="background-color: #1b68b2" id="prev">
												<h4 class="heading-primary text-uppercase text-center mb-3">Register a New Class</h4>
												<form action="" name="firststep" id="firststep" method="post">
													<div class="form-row">
														<div class="form-group col">
															<label>Name</label>
															<input type="text" id="name" name="name" class="form-control form-control-lg">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>Email</label>
															<input type="text" id="youremail" name="youremail" class="form-control form-control-lg">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>Phone Number</label>
															<input type="text" id="phone" name="phone" class="form-control form-control-lg">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>Password</label>
															<input type="password" value="" name="yourpassword"  id="pwd" class="form-control form-control-lg">
														</div>
														<div class="form-group col">
															<label>Confirm Password</label>
															<input type="password" value=""  name="retype"  id="retype" class="form-control form-control-lg">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<button class="btn btn-primary float-right mb-5 next" data-loading-text="Loading..." style="background-color: #ffffff; color: #1b68b2 ">Next</button>
														</div>
													</div>
												</form>
											</div>
											<div class="box-content appear-animation animated bounceInDown appear-animation-visible" data-appear-animation="bounceInDown" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms; background-color: #1b68b2;" id="next">
												<h4 class="heading-primary text-uppercase text-center mb-3">Register Address of class</h4>
												<form action="" name="secondstep" id="secondstep" method="post">
													<div class="form-row">
														<div class="form-group col">
															<label>Address</label>
															<input type="text" id="address" name="address" class="form-control form-control-lg" required="">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>Street</label>
															<input type="text" id="street" name="street" class="form-control form-control-lg" required="">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>Locality</label>
															<input type="text" id="locality" name="locality" class="form-control form-control-lg" required="">
														</div>
													</div>
													
													<div class="form-row">
														<div class="form-group col">
															<label>Country</label>
															<?php $country_data=mysqli_query($link, "SELECT * FROM countries"); ?>
															<select id="country" name="country" required="" class="form-control form-control-lg">
																<option value="" placeholder="country">Select Country</option>
																<?php	while($con=mysqli_fetch_array($country_data)){ ?>
																<option value="<?php echo $con['id']; ?>"><?php echo $con['name']; ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="form-group col">
															<label>State</label>
															<select name="state" id="state" required="" class="form-control form-control-lg" >
															</select>
														</div>
														<div class="form-group col">
															<label>City</label>
															<select name="city" id="city" required="" class="form-control form-control-lg" >
															</select>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>Post Code</label>
															<input type="text" id="postcode" name="postcode" class="form-control form-control-lg">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<button class="btn btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 "><i class="fas1 fas fa-sync fa-spin"></i>Submit</button>
														</div>
													</div>
												</form>
											</div>
											<div class="box-content text-center appear-animation animated bounceInDown appear-animation-visible" data-appear-animation="bounceInDown" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms; background-color: #1b68b2;"  id="addstudent">
												<h4 class="heading-primary text-uppercase text-center mb-3">Add Students in the class</h4>
												<div class="row mt-5">
													<div class="col-md-4"></div>
													<div class="col-md-4">
														<div class="img-thumbnail d-block">
															<img class="img-fluid" src="../img/sample.jpg" alt="">
														</div>
													</div>
													<div class="col-md-4"></div>
												</div>
												<div class="row mt-2">
													<div class="col-md-12">
														<a href="add_student.php"><button class="btn btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 ; width: 100%;"><i class="fas fa-plus"></i>Add new Student</button></a>
													</div>
												</div>
												<div class="row ">
													<div class="col-md-12">
														<h1><strong>OR</strong></h1>
													</div>
												</div>
												<div class="row mt-2">
													<div class="col-md-12">
														<a href="home.php"><button class="btn btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 ; width: 100%;">Skip</button></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include("../footer.php") ?>
</div>
<!-- Vendor -->
<?php include("footer_files.php") ?>3
<script src="includes/js/home.js"></script>
</body>
</html>