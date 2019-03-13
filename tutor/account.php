<?php
error_reporting(0);
include("config.php");
session_start();
$user_id = $_SESSION['user_id'];
if($_SESSION['user_id'] == '') {
header('Location:  home.php');
} else {
$tutor_profile_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = '$user_id' "));
$res = "SELECT * FROM tbl_glow_students WHERE id = '".$user_id."' ";
$us=mysqli_query($link, $res);
$userfetch_data = mysqli_fetch_array($us);
$name =  $userfetch_data['username'];
$email =  $userfetch_data['email'];
$mobileno =  $userfetch_data['mobile_no'];
$password = $userfetch_data['password'];
//////////code for uploading aadhar id//////////
if(isset($_POST['submit_aadhar'])){
$aadhar_nos = $_POST["Aadhaar_no"];
$file=$_FILES["upload_file_aadhar"]["name"];
//$files = "Aadhar" .$user_id;
mysqli_query($link, "UPDATE tbl_glow_tutor SET aadhar = '$file', aadhar_no = '$aadhar_nos' WHERE id='$user_id'");
move_uploaded_file($_FILES["upload_file_aadhar"]["tmp_name"], "../api/user_document/tutor/".$file);
echo "<script type='text/javascript'>alert('sucessfully uploaded your aadhar details');</script>";
}
///////////////code for uploading driving license/////
if(isset($_POST["submit_dl"])) {
$dl_nos = $_POST["dl_no"];
$file = $_FILES["upload_file_dl"]["name"];
//$files = "DrivingLicense" .$user_id;
mysqli_query($link, "UPDATE tbl_glow_tutor SET driving_licence = '$file', dl_no = '$dl_nos' WHERE id='$user_id'");
move_uploaded_file($_FILES["upload_file_dl"]["tmp_name"], "../api/user_document/tutor/".$file);
echo "<script type='text/javascript'>alert('sucessfully uploaded your driving license');</script>";
}
//////////////////code for uploading voter id/////////
if(isset($_POST['upload_voter_id'])) {
$vid = $_POST["vid_no"];
$file_vote = $_FILES["upload_file_vid"]["name"];
//$files_vote = "Voter_id" .$user_id;
mysqli_query($link, "UPDATE tbl_glow_tutor SET voter_id = '$file_vote', voter_id_no = '$vid' WHERE id='$user_id'");
move_uploaded_file($_FILES["upload_file_vid"]["tmp_name"], "../api/user_document/tutor/".$file_vote);
echo "<script type='text/javascript'>alert('sucessfully uploaded your voter id');</script>";
}
/////////////////////////code før uploading school id////
if(isset($_POST["upload_school_id"])){
$sid = $_POST["school_id_no"];
$file = $_FILES["upload_file_sid"]["name"];
//$files = "school_id" .$user_id;
mysqli_query($link, "UPDATE tbl_glow_tutor SET school_id = '$file', school_id_no = '$sid' WHERE id='$user_id'");
move_uploaded_file($_FILES["upload_file_sid"]["tmp_name"], "../api/user_document/tutor/".$file);
echo "<script type='text/javascript>alert('sucessfully uploaded your school id');</script>";
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
								<h1>Account</h1>
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
														<i class="icon-featured fas fa-shopping-cart"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0">Your Orders</p>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimpleIcons2" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured fas fa-lock"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0">Login and Security</p>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimpleIcons3" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured fas fa-upload"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0">Upload Photo ID</p>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimpleIcons4" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured fas fa-thumbs-up"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0">Review Your Purchases</p>
										</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tabsNavigationSimpleIcons1">
										<div class="text-center">
											<h4>Your Orders</h4>
											<?php
											$qry = mysqli_query($link, "SELECT * FROM tbl_order WHERE tutor_id=$user_id ");
											if(mysqli_num_rows($qry) == 0) {
											echo "No Record Found";
											} else {
											?>
											<table class="table table-bordered table-hover" id="order_tables">
												<thead>
													<th>Name</th>
													<th>Date</th>
													<th>Amount</th>
													<th>Download Button</th>
												</thead>
												<tbody>
													<?php
													while($userfetch_data=mysqli_fetch_array($qry))
													{
														$invoice = $userfetch_data['invoice'];
													$invoice = str_replace(' ', '', $invoice);
													$name_t = mysqli_fetch_array(mysqli_query($link, "SELECT username FROM tbl_glow_students WHERE id='".$userfetch_data['student_id']."' "));
													echo '<tr>';
																		echo "<td>". $name_t['username'] ."</td>";
																		echo "<td>".$userfetch_data['order_date'] ."</td>";
																		echo "<td>".$userfetch_data['total_amount'] ."</td>";
																		echo "<td><a href='../api/generated_invoice/$invoice' class='btn btn-primary' Download>Download Invoice</a></td>";
													echo '</tr>';
													} }
													?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tabsNavigationSimpleIcons2">
										<div class="text-center">
											<h4>Login and Security</h4>
											<table class="table table-bordered table-hover">
												<tbody>
													
													<tr>
														<td>Name: </td>
														<td><?php echo $tutor_profile_data['first_name'] ?>&nbsp;<?php echo $tutor_profile_data['last_name']?></td>
														<td><a href="change_name.php" class="btn btn-primary">change</a></td>
													</tr>
													<tr>
														<td>E-mail: </td>
														<td><?php echo $tutor_profile_data['email'] ?></td>
														<td><a href="change_email.php" class="btn btn-primary">change</a></td>
													</tr>
													<tr>
														<td>Mobile number: </td>
														<td><?php echo $tutor_profile_data['mobile'] ?></td>
														<td><a href="change_number.php" class="btn btn-primary">change</a></td>
													</tr>
													<tr>
														<td>Password: </td>
														<td><span class="password">******</span></td>
														<td><a href="change_password.php" class="btn btn-primary">change</a></td>
													</tr>
													
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tabsNavigationSimpleIcons3">
										<div class="col">
											<h4 class="mb-4">Photo ID Proofs</h4>
											<div class="row">
												<div class="col-lg-4">
													<div class="tabs tabs-vertical tabs-left tabs-navigation">
														<ul class="nav nav-tabs col-sm-3">
															<li class="nav-item active">
																<a class="nav-link show active" href="#tabsNavigation1" data-toggle="tab"><i class="fas fa-file"></i>Aaadhar</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation2" data-toggle="tab"><i class="fas fa-file"></i> Driving License</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation3" data-toggle="tab"><i class="fas fa-file"></i> Voter ID</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation4" data-toggle="tab"><i class="fas fa-file"></i> School ID</a>
															</li>
														</ul>
													</div>
												</div>
												<?php echo $msg; ?>
												<div class="col-lg-8">
													<div class="featured-box featured-box-primary text-left">
														<div class="box-content">
															<div class="tab-pane tab-pane-navigation active show" id="tabsNavigation1">
																<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Enter your Aaadhar Number Here:-</label>
																			<input type="text" name="Aadhaar_no" placeholder="Enter your aadhar number here." class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Upload Aadhar Here</label>
																			<input type="file" id="upload_file_aadhar" name="upload_file_aadhar" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera1"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Or</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam1();">Open Webcam</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot1();" id="snap1">Take Snapshot</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="submit_aadhar" class="btn btn-primary btn-xl">Submit</button>
																		</div>
																	</div>
																</form>
															</div>
															<div class="tab-pane tab-pane-navigation" id="tabsNavigation2">
																<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Enter your Driving license number here:-</label>
																			<input type="text" name="dl_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Upload Driving license Here</label>
																			<input type="file" id="upload_file_dl" name="upload_file_dl" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera2"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Or</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam2();">Open Webcam</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot2();" id="snap2">Take Snapshot</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="submit_dl" class="btn btn-primary btn-xl">Submit</button>
																		</div>
																	</div>
																</form>
															</div>
															<div class="tab-pane tab-pane-navigation" id="tabsNavigation3">
																<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Enter your voter_id here:-</label>
																			<input type="text" name="vid_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Upload voter_id Here</label>
																			<input type="file" id="upload_file_vid" name="upload_file_vid" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera3"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Or</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam3();">Open Webcam</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot3();" id="snap3">Take Snapshot</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="upload_voter_id" class="btn btn-primary btn-xl">Submit</button>
																		</div>
																	</div>
																</form>
															</div>
															<div class="tab-pane tab-pane-navigation" id="tabsNavigation4">
																<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Enter your School ID here.:-</label>
																			<input type="text" name="school_id_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Upload school ID Here</label>
																			<input type="file" id="upload_file_sid" name="upload_file_sid" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera4"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>Or</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam4();">Open Webcam</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot4();" id="snap3">Take Snapshot</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="upload_school_id" class="btn btn-primary btn-xl">Submit</button>
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
									<div class="tab-pane" id="tabsNavigationSimpleIcons4">
										<div class="text-center">
											<h4>Review Your Session</h4>
											<table class="table table-bordered table-hover">
												<tbody>
													<?php
													$qry2 = mysqli_query($link, "SELECT * FROM tbl_sessions_rating WHERE tutuor_id=$user_id ");
													$j = 1;
													if(mysqli_num_rows($qry2) == 0) {
													echo "No record found";
													} else {
													while($userfetch_data=mysqli_fetch_array($qry2))
													{
													$room = $userfetch_data['room_name'];
													$id_session = $userfetch_data['session_id'];
													$c_date = $userfetch_data['session_date'];
													$f_date = strtotime($c_date);
													$time = date('d-m-Y', $f_date);
													$userfetch_dataaa = mysqli_fetch_array(mysqli_query($link, "SELECT tutor_id FROM tbl_scheduled_sessions WHERE session_id='".$userfetch_data['session_id']."' "));
													$tut_id = $userfetch_dataaa['tutor_id'];
													$suserfetch_dataaaa = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor where id=$tut_id "));
													$tutor_name = $suserfetch_dataaaa['first_name'];
													echo '<tr>';
															echo "<td>$j</td>";
														echo "<td>Session With ". $tutor_name ."</td>";
																					echo "<td>Present ratings<span> ". $userfetch_data['rating'] ."</td>";
																					echo "<td><a href='rate_session.php?tutor_id=$tut_id&room_name=$room&session=$id_session&date=$time' class='btn btn-primary btn-sm'>Rate</a><span></td>";
													echo '</tr>';
													$j++;
													} }
													?>
												</tbody>
											</table>
											
										</div>
									</div>
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
		<script type="text/javascript">
			$(document).ready( function () {
		$('#order_tables').DataTable();
		} );
		</script>
		<script src="js/webcam.js"></script>
		<script>
		$("#snap1, #snap2, #snap3, #snap4").hide();
		function opencam1() {
		$("#snap1").show();
		Webcam.set({
		width: 300,
		height: 260,
		image_format: 'jpeg',
		jpeg_quality: 90
		});
		Webcam.attach( '#my_camera1' );
		}
		function take_snapshot1() {
		Webcam.snap( function(data_uri) {
		document.getElementById('results1').innerHTML =
		'<h5>Processing:</h5>';
		Webcam.upload( data_uri, 'webcam/upload_aadhar.php', function(code, text) {
		document.getElementById('results1').innerHTML =
		'<h5>Here is your image:</h5>' +
		'<img src="'+data_uri+'"/>';
		} );
		Webcam.reset();
		} );
		}
		function opencam2() {
		$("#snap2").show();
		Webcam.set({
		width: 300,
		height: 260,
		image_format: 'jpeg',
		jpeg_quality: 90
		});
		Webcam.attach( '#my_camera2' );
		}
		function take_snapshot2() {
		Webcam.snap( function(data_uri) {
		document.getElementById('results2').innerHTML =
		'<h5>Processing:</h5>';
		Webcam.upload( data_uri, 'webcam/upload_dl.php', function(code, text) {
		document.getElementById('results2').innerHTML =
		'<h5>Here is your image:</h5>' +
		'<img src="'+data_uri+'"/>';
		} );
		Webcam.reset();
		} );
		}
		function opencam3() {
		$("#snap3").show();
		Webcam.set({
		width: 300,
		height: 260,
		image_format: 'jpeg',
		jpeg_quality: 90
		});
		Webcam.attach( '#my_camera3' );
		}
		function take_snapshot3() {
		Webcam.snap( function(data_uri) {
		document.getElementById('results3').innerHTML =
		'<h5>Processing:</h5>';
		Webcam.upload( data_uri, 'webcam/upload_schoolid.php', function(code, text) {
		document.getElementById('results3').innerHTML =
		'<h5>Here is your image:</h5>' +
		'<img src="'+data_uri+'"/>';
		} );
		Webcam.reset();
		} );
		}
		function opencam4() {
		$("#snap4").show();
		Webcam.set({
		width: 300,
		height: 260,
		image_format: 'jpeg',
		jpeg_quality: 90
		});
		Webcam.attach( '#my_camera4' );
		}
		
		function take_snapshot4() {
		Webcam.snap( function(data_uri) {
		document.getElementById('results4').innerHTML =
		'<h5>Processing:</h5>';
		Webcam.upload( data_uri, 'webcam/upload_voterid.php', function(code, text) {
		document.getElementById('results4').innerHTML =
		'<h5>Here is your image:</h5>' +
		'<img src="'+data_uri+'"/>';
		} );
		Webcam.reset();
		} );
		}
		
		</script>
	</body>
</html>
<?php } ?>