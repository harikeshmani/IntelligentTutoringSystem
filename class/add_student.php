<?php
include("auth.php");
$class_id = $_SESSION['class_id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<style type="text/css">
		
		</style>
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
								<h1>Add Student</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<form id="add-form" action="" name="add-form" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col">
								<div class="featured-boxes">
									<div class="row">
										<div class="col-md-6">
											<div class="featured-box featured-box-primary text-left mt-5">
												<div class="box-content" style="background-color: #1b68b2";>
													<h4 class="heading-primary text-uppercase text-center mb-3">Register New Student</h4>
													<div class="form-row">
														<div class="form-group col">
															<label>Upload Image</label>
															<div class="image-upload">
																<label for="file-input">
																	<img src="../img/sample.jpg" id="prev" width="100" height="100" />
																</label>
																<input type="file" id="profile_img" name="profile_img" required="" />
															</div>
														</div>
													</div>
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
															<label>Mobile Number</label>
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
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="featured-box featured-box-primary text-left mt-5">
												<div class="box-content" style="background-color: #1b68b2">
													<div class="form-row">
														<div class="form-group col">
															<label>Address</label>
															<input type="text" id="address" name=
															"address" class="form-control form-control-lg" required="">
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
															<input type="text" id="locality" name=
															"locality" class="form-control form-control-lg" required="">
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
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>State</label>
															<select name="state" id="state" required="" class="form-control form-control-lg" >
															</select>
														</div>
														<div class="form-group col">
															<label>City</label>
															<select name="city" id="city" class="form-control form-control-lg" >
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
															<button type="submit" class="btn btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 "><i class="fas1 fas fa-sync fa-spin"></i>Submit</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- ../vendor -->
			
			<?php include("footer_files.php") ?>
			<script src="includes/js/add_student.js"></script>
		</body>
	</html>