<?php
include("auth.php");
$user_id = $_SESSION['user_id'];
$userfetch_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = '$user_id' "));
$contry_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM countries WHERE id = '".$userfetch_data['country']."'"));
$country = $contry_database['name'];
$state =$userfetch_data['state'];
$state_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM states WHERE id = '".$state."'"));
$state = $state_database['name'];
$city =  $userfetch_data['city'];
$city_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM cities WHERE id = '".$city."'"));
$city = $city_database['name'];
$picture = $userfetch_data['picture'];
$country_data=mysqli_query($link,"SELECT * FROM countries ");
$country_num=mysqli_num_rows($country_data);
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php"); ?>
		<style type="text/css">
			form label {
		font-weight: normal;
		color: #1d68b2;
		}
		</style>
		
	</head>
	<body>
		<div class="body">
			<?php include("menu.php") ?>
			<div role="main" class="main" >
				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col">
								<h1>Profile</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<!-- 					<div class="row">
						<div class="col">
							<h2 class="mb-0">Hello, <?php echo $userfetch_data['username']; ?></h2>
							<p>Update your Profile.</p>
							<hr class="tall">
						</div>
					</div> -->
					<form role="form" enctype="multipart/form-data"  id="form-profile">
						<div class="row">
							<div class="col-lg-4"></div>
							<div class="col-lg-4">
								<span class="thumb-info thumb-info-hide-wrapper-bg">
									<span class="thumb-info-wrapper">
										<img src="<?php echo '../api/user_image/tutor/'.$picture; ?>" class="img-fluid" alt=<?php echo $userfetch_data['first_name']; ?> "image" >
										<span class="thumb-info-title">
											<span class="thumb-info-inner"><?php echo $userfetch_data['first_name']; ?></span>
											<span class="thumb-info-type">Update Image</span>
										</span>
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-social-icons">
											<input class="form-control form-control-md" type="file" name="picture" id="picture"> OR
											<button type=button" class="btn btn-primary btn-sm mb-2" onclick="opencam();" >Open Webcam</button>
											<button type=button" class="btn btn-primary btn-sm mb-2" onclick="take_snapshot();" id="snap">Take Snapshot</button>
										</span>
									</span>
								</span>
							</div>
							<div class="col-lg-4" id="hide_cam_pic">
								<span class="thumb-info">
									<span class="thumb-info-wrapper">
										<div id="my_camera"></div>
									</span>
								</span>
							</div>
						</div>
						<div class="alert alert-success alert-dismissible mb-2 m-4" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<strong><i class="far fa-thumbs-up"></i> Well done!</strong> You successfully updated Your Profile
						</div>
						<div class="row">
							<div class="col">
								<h4 class="mb-4">Navigation</h4>
								<div class="row">
									<div class="col-lg-4">
										<div class="tabs tabs-vertical tabs-left tabs-navigation">
											<ul class="nav nav-tabs col-sm-3">
												<li class="nav-item active">
													<a class="nav-link show active" href="#tabsNavigation1" data-toggle="tab"><i class="fas fa-user"></i>Personal Information</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#tabsNavigation2" data-toggle="tab"><i class="fas fa-address-book"></i>Address</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#tabsNavigation3" data-toggle="tab"><i class="fas fa-graduation-cap"></i>Educational Information</a>
												</li>
												<!-- <li class="nav-item">
														<a class="nav-link" href="#tabsNavigation4" data-toggle="tab"><i class="fas fa-book"></i> Subjects</a>
												</li> -->
												<!-- <li class="nav-item">
														<a class="nav-link" href="#tabsNavigation5" data-toggle="tab"><i class="fas fa-futbol"></i> Sports</a>
												</li> -->
												<!-- <li class="nav-item">
														<a class="nav-link" href="#tabsNavigation6" data-toggle="tab"><i class="fas fa-paint-brush"></i> Extracurricular Activities</a>
												</li> -->
											</ul>
										</div>
									</div>
									<div class="col-lg-8">
										<div class="tab-pane tab-pane-navigation active show" id="tabsNavigation1">
											<div class="form-row">
												<div class="form-group col">
													<label>Name</label>
													<input class="form-control form-control-md" type="text" value="<?php echo $userfetch_data['first_name']; ?>" disabled>
												</div>
												<div class="form-group col">
													<label>Email Address</label>
													<input class="form-control form-control-md" type="text" value="<?php echo $userfetch_data['email']; ?>" disabled>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label>Registered Mobile no.</label>
													<input class="form-control form-control-md" type="text" value="<?php echo $userfetch_data['mobile']; ?>" disabled>
												</div>
												<div class="form-group col">
													<label>About Yourself</label>
													<input class="form-control form-control-md" type="text" name="fb_link" value="<?php echo $userfetch_data['about_yourself']; ?>">
												</div>
											</div>
											
										</div>
										<div class="tab-pane tab-pane-navigation" id="tabsNavigation2">
											<div class="form-row">
												<div class="form-group col">
													<label>Address</label>
													<input class="form-control form-control-md" type="text" name="address" value="<?php echo $userfetch_data['address']; ?>" required="" >
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label>Street</label>
													<input class="form-control form-control-md" type="text" name="street" value="<?php echo $userfetch_data['street']; ?>" required="">
												</div>
												<div class="form-group col">
													<label >Locality:</label>
													<input class="form-control form-control-md" type="text" name="locality" value="<?php echo $userfetch_data['locality']; ?>" required="">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label>Country:</label>
													<select class="form-control form-control-md" id="country" name="country" required="">
														<option value="<?php echo $country; ?>"><?php echo $country; ?> </option>
														<?php
														if($country_num > 0){
														while($con_vals=mysqli_fetch_array($country_data)){ ?>
														<option value="<?php echo $con_vals['id']; ?>"><?php echo $con_vals['name']; ?></option>
														<?php } }else{ echo '<option value="">Country not available</option>';} ?>
													</select>
												</div>
												<div class="form-group col">
													<label>State</label>
													<select  class="form-control form-control-md" name="state" id="state" required="" >
														<option value="<?php echo $state; ?>"><?php echo $state; ?> </option>
													</select>
												</div>
												<div class="form-group col">
													<label>City:</label>
													<select  class="form-control form-control-md" name="city" id="city" required="" >
														<option value="<?php echo $city; ?>"><?php echo $city; ?></option>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label>Post Code:</label>
													<input class="form-control form-control-xs" type="text" name="pin_code" value="<?php echo $userfetch_data['pin_code']; ?>" required="" >
												</div>
											</div>
										</div>
										<div class="tab-pane tab-pane-navigation" id="tabsNavigation3">
											<div class="form-row">
												<div class="form-group col">
													<label>Highest Degree:</label>
													<input class="form-control form-control-md" type="text" name="school" value="<?php echo $userfetch_data['highest_degree']; ?>" required="" >
												</div>
												<div class="form-group col">
													<label>Degree Institute:</label>
													<input class="form-control form-control-md" type="text" name="class" value="<?php echo $userfetch_data['degree_institute']; ?>" required="" >
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label>Service Preference:</label>
													<input class="form-control form-control-md" type="text" name="school" value="<?php echo $userfetch_data['service_preference']; ?>" required="" >
												</div>
												<div class="form-group col">
													<label>Hourly Rate:</label>
													<input class="form-control form-control-md" type="text" name="class" value="<?php echo $userfetch_data['hourly_rate']; ?>" required="" >
												</div>
											</div>
											<div class="form-row">
												
											</div>
										</div>
										
										
										
										<button type="button" class="btn btn-primary btn-xl mb-2 m-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update my profile" id="final-submit">
										Update
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php include("footer.php") ?>
		</div>
		<!-- ../vendor -->
		<?php include("footer_files.php") ?>
		<script src="../js/webcam.js"></script>
		<script>
		function opencam() {
		$("#snap").show();
		$("#hide_cam_pic").show();
		Webcam.set({
		width: 400,
		height: 260,
		image_format: 'jpeg',
		jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
		}
		function take_snapshot() {
		Webcam.snap( function(data_uri) {
		document.getElementById('my_camera').innerHTML =
		'<h5>Processing:</h5>';
		Webcam.upload( data_uri, 'php/upload_profile_pic.php', function(code, text) {
		document.getElementById('my_camera').innerHTML =
		'<h5>Here is your image:</h5>' +
		'<img src="'+data_uri+'"/>';
		} );
		Webcam.reset();
		} );
		}
		$(document).ready(function(){
		$('.alert').hide();
		$("#snap").hide();
		$("#hide_cam_pic").hide();
		$('#country').on('change',function(){
		var countryID = $(this).val();
		if(countryID){
		$.ajax({
		type:'POST',
		url:'php/location.php',
		data:'country_id='+countryID,
		success:function(html){
		$('#state').html(html);
		$('#city').html('<option value="">Select state first</option>');
		}
		});
		}else{
		$('#state').html('<option value="">Select country first</option>');
		$('#city').html('<option value="">Select state first</option>');
		}
		});
		$('#state').on('change',function(){
		var stateID = $(this).val();
		if(stateID){
		$.ajax({
		type:'POST',
		url:'php/location.php',
		data:'state_id='+stateID,
		success:function(html){
		$('#city').html(html);
		}
		});
		}else{
		$('#city').html('<option value="">Select state first</option>');
		}
		});
		$('#final-submit').click(function(){
		var formData = new FormData($(this).parents('form')[0])
		$.ajax({
		url: 'php/update_profile.php',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function (data) {
		$('.alert').show();
		}
		});
		setTimeout(function(){ location.reload(); }, 2000);
		});
		});
		</script>
	</body>
</html>