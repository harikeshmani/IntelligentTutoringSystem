<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
$user_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = '$user_id'"));
$contry_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM countries WHERE id = '".$user_data['country']."'"));
$country = $contry_database['name'];
$state =$user_data['state'];
$state_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM states WHERE id = '".$state."'"));
$state = $state_database['name'];
$city =  $user_data['city'];
$city_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM cities WHERE id = '".$city."'"));
$city = $city_database['name'];
$picture = $user_data['pic'];
$country_data=mysqli_query($link,"SELECT * FROM countries ");
$country_num=mysqli_num_rows($country_data);
if(isset($_POST['submit'])) {
$result = mysqli_query($link, "UPDATE tbl_glow_students SET address= '".$_POST['address']."', street= '".$_POST['street']."', locality= '".$_POST['locality']."', post_code = '".$_POST['post_code']."', city='".$_POST['city']."', state='".$_POST['state']."', country= '".$_POST['country']."' WHERE id = '$user_id'");
if($result) {
	echo "ok";
} else {
	echo "failure";
}
exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<style type="text/css">
			form label {
				color: #1d68b2;
			}
			label.error {
		color: #1d68b2;
		}
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
								<h1>Customer Service</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="tabs tabs-bottom tabs-center tabs-simple">
								<ul class="nav nav-tabs">
									<li class="nav-item active">
										<a class="nav-link" href="#tabsNavigationSimpleIcons1" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured fas fa-user"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0">returns and refunds</p>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimpleIcons2" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured fas fa-file"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0">account Settings</p>
										</a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tabsNavigationSimpleIcons1">
										<div class="text-center">
											<h3>No record Found</h3>
										</div>
									</div>
									<div class="tab-pane" id="tabsNavigationSimpleIcons2">
										<div class="text-center">
											<h3>Update your profile</h3>
										</div>
										<form name="update-form" id="add-form" type="post" action="">
											<div class="form-row">
												<div class="form-group col">
													<label>Address</label>
													<input type="text" name="address" class="form-control form-control-lg" value="<?php echo $user_data['address'] ?>" required="">
												</div>
												<div class="form-group col">
													<label>street</label>
													<input type="text" name="street" class="form-control form-control-lg" value="<?php echo $user_data['street'] ?>" required="">
												</div>
												<div class="form-group col">
													<label>locality</label>
													<input type="text" name="locality" class="form-control form-control-lg" value="<?php echo $user_data['locality'] ?>" required="">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label>Country:</label>
													<select class="form-control form-control-lg" id="country" name="country" required="">
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
													<select  class="form-control form-control-lg" name="state" id="state" required="" >
														<option value="<?php echo $state; ?>"><?php echo $state; ?> </option>
													</select>
												</div>
												<div class="form-group col">
													<label>City:</label>
													<select  class="form-control form-control-lg" name="city" id="city" >
														<option value="<?php echo $city; ?>"><?php echo $city; ?></option>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label>post code</label>
													<input type="text" name="post_code" class="form-control form-control-lg" value="<?php echo $user_data['post_code'] ?>" required="">
												</div>
												<div class="form-group col">
													<button type="submit" name="submit" class="btn btn-primary btn-xl mt-3 m-4">Update</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("footer.php") ?>
		</div>
		<!-- ../vendor -->
		<?php include("footer_files.php") ?>
		<script type="text/javascript">
		$(document).ready(function(){
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
		$("form[name='update-form']").validate({
		submitHandler: addstudentform
		});
		function addstudentform() {
		var form = $("#add-form");
		var formData = new FormData(form[0]);
		$.ajax({
		url  : '',
		type : "POST",
		data: formData,
		success :  function(data) {
		if(data == 'ok') {
		$.alert({
		title: 'Success!',
		content: 'updated your address',
		buttons: {
		ok: function () {
		window.location.href = 'customer_service.php';
		}
		},
		});
		} else {
		$.alert({
		title: 'error!',
		content: 'try again'
		});
		}
		},
		cache: false,
		contentType: false,
		processData: false
		});
		}
		});
		</script>
		
	</body>
</html>