<?php
$lang = $_GET['lang'];
session_start();
include("config.php");
if(isset($_POST["login"]))
{
$email = $_POST['email'];
$password = $_POST['password'];
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://139.59.45.201/moodle/api/login1.php",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "email=$email&password=$password",
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
"Content-Type: application/x-www-form-urlencoded",
),
));
$response = curl_exec($curl);
$object = json_decode($response);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
echo "cURL Error #:" . $err;
} else {
if($object->status=="Yes") {
$_SESSION['email'] = $object->email;
$_SESSION['picture'] = $object->pic;
$_SESSION['moodle_id'] = $object->moodle_id;
$_SESSION['userid'] = $object->user_id;
$res['mensaje'] = 'ok';
} else {
$res['mensaje'] = 'error';
}
echo json_encode($res);
}
exit();
}
if (isset($_POST["submit"]))
{
$name = $_POST['name'];
$youremail = $_POST['youremail'];
$phone = $_POST['phone'];
$yourpassword = $_POST['yourpassword'];
$address = $_POST['address'];
$street = $_POST['street'];
$locality = $_POST['locality'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$school = $_POST['school'];
$class = $_POST['class'];
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://139.59.45.201/moodle/api/register_web.php",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "name=$name&email=$youremail&password=$yourpassword&mobileno=$phone&address=$address&street=$street&locality=$locality&country=$country&state=$state&city=$city&postcode=$postcode&school=$school&class=$class",
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
"Content-Type: application/x-www-form-urlencoded",
),
));
$response = curl_exec($curl);
$object = json_decode($response);
$err = curl_error($curl);
curl_close($curl);
$message = $object->message;
$status = $object->status;
if($status == "No") {
$respo['mensajeres'] = $message;
} else if ($status == "Yes") {
if($lang=='hn') {
$respo['mensajeres'] = 'सफलता';
} else if($lang=='mt') {
$respo['mensajeres'] = 'यश';
} else if($lang=='tl') {
$respo['mensajeres'] = 'విజయం';
} else {
$respo['mensajeres'] = 'success';
		}
} else {
if($lang=='hn') {
$respo['mensajeres'] = 'पंजीकरण में त्रुटि। कृपया कुछ देर बाद प्रयास करें';
} else if($lang=='mt') {
$respo['mensajeres'] = 'नोंदणीमध्ये त्रुटी. कृपया थोड्या वेळाने प्रयत्न करा';
} else if($lang=='tl') {
$respo['mensajeres'] = 'నమోదులో లోపం. దయచేసి కొంత సమయం తర్వాత ప్రయత్నించండి';
} else {
$respo['mensajeres'] = 'Error in registeration. Please, try after some time';
}
}
echo json_encode($respo);
exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body>
		<div class="body">
			<?php include("menu.php") ?>
			<div role="main" class="main" style="background-image: url(img/bg-01.jpg);">
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>
								<?php if($lang=='hn') { ?>
								छात्र लॉगिन / पंजीकरण
								<?php } else if($lang=='mt') { ?>
								विद्यार्थी लॉगिन / नोंदणी
								<?php } else if($lang=='tl') { ?>
								విద్యార్థి లాగిన్ / నమోదు
								<?php } else { ?>
								Student Login / Registration
								<?php }	?>
								</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="featured-boxes">
								<!---------------login form starts here--------->
								<div class="row">
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content" style="background-color: #1b68b2;">
												<h4 class="heading-primary text-uppercase text-center mb-3">
												<?php if($lang=='hn') { ?>
												छात्र लॉगिन
												<?php } else if($lang=='mt') { ?>
												विद्यार्थी लॉगिन
												<?php } else if($lang=='tl') { ?>
												విద్యార్థి లాగిన్
												<?php } else { ?>
												Student Login
												<?php }	?></h4>
												<form action="" id="frmSignIn" method="post">
													<div class="form-row">
														<div class="form-group col">
															<label>
																<?php if($lang=='hn') { ?>
																अपना ईमेल-आईडी दर्ज करें
																<?php } else if($lang=='mt') { ?>
																आपला ई-मेल आयडी भरा
																<?php } else if($lang=='tl') { ?>
																మీ ఇమెయిల్-ఐడిని నమోదు చేయండి
																<?php } else { ?>
																Enter Your Email-Id
															<?php }	?> </label>
															<input type="text" id="email" value="" class="form-control form-control-lg">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>
																<?php if($lang=='hn') { ?>
																पास वर्ड दर्ज करें
																<?php } else if($lang=='mt') { ?>
																पासवर्ड टाका
																<?php } else if($lang=='tl') { ?>
																రహస్య సంకేతం తెలపండి
																<?php } else { ?>
																Enter Password
															<?php }	?></label>
															<input type="password" id="password" value="" class="form-control form-control-lg">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-lg-12">
															
															<?php if($lang=='hn') { ?>
															<a class="float-right" style="color: #FFF;" href="forgot_password.php?lang=hn">
																पासवर्ड भूल गए ?
																<?php } else if($lang=='mt') { ?>
																<a class="float-right" style="color: #FFF;" href="forgot_password.php?lang=mt">
																	पासवर्ड विसरला ?
																	<?php } else if($lang=='tl') { ?>
																	<a class="float-right" style="color: #FFF;" href="forgot_password.php?lang=tl">
																		పాస్వర్డ్ మర్చిపోయారా ?
																		<?php } else { ?>
																		<a class="float-right" style="color: #FFF;" href="forgot_password.php?lang=eng">
																		Forgot Password ?
																		<?php }	?></a>
																	</div>
																</div>
																<div class="form-row">
																	<div class="form-group col-lg-6"></div>
																	<div class="form-group col-lg-6 ">
																		<button type="button" id="login" class="btn btn-outline btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 "><i class="fas fa-sync fa-spin"></i>
																		<?php if($lang=='hn') { ?>
																		लॉग इन करें
																		<?php } else if($lang=='mt') { ?>
																		लॉग इन
																		<?php } else if($lang=='tl') { ?>
																		లాగిన్
																		<?php } else { ?>
																		Login
																		<?php }	?></button>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
												<!------------------registeration form starts here-------------------------->
												<div class="col-md-6">
													<div class="featured-box featured-box-primary text-left mt-5">
														<div class="box-content" style="background-color: #1b68b2">
															<h4 class="heading-primary text-uppercase text-center mb-3">
															<?php if($lang=='hn') { ?>
															एक नए छात्र के रूप में रजिस्टर करें
															<?php } else if($lang=='mt') { ?>
															नवीन विद्यार्थी म्हणून नोंदणी करा
															<?php } else if($lang=='tl') { ?>
															క్రొత్త విద్యార్థిగా నమోదు చేసుకోండి
															<?php } else { ?>
															Register as a New Student
															<?php }	?></h4>
															<form action="" name="reg-form" id="reg-form" method="post">
																<div id="prev">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				नाम
																				<?php } else if($lang=='mt') { ?>
																				नाव
																				<?php } else if($lang=='tl') { ?>
																				పేరు
																				<?php } else { ?>
																				Name
																			<?php }	?></label>
																			<input type="text" id="name" name="name" class="form-control form-control-lg">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				ईमेल
																				<?php } else if($lang=='mt') { ?>
																				ईमेल
																				<?php } else if($lang=='tl') { ?>
																				ఇమెయిల్
																				<?php } else { ?>
																				Email
																			<?php }	?></label>
																			<input type="text" id="youremail" name="youremail" class="form-control form-control-lg">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				मोबाइल
																				<?php } else if($lang=='mt') { ?>
																				फोन नंबर
																				<?php } else if($lang=='tl') { ?>
																				ఫోను నంబరు
																				<?php } else { ?>
																				Phone Number
																				<?php }	?>
																			</label>
																			<input type="text" id="phone" name="phone" class="form-control form-control-lg">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>	<?php if($lang=='hn') { ?>
																				कक्षा
																				<?php } else if($lang=='mt') { ?>
																				वर्ग
																				<?php } else if($lang=='tl') { ?>
																				క్లాస్
																				<?php } else { ?>
																				Class
																			<?php }	?></label>
																			<select class="form-control form-control-lg"  id="class" name="class">
																				<option value=""><?php if($lang=='hn') { ?>
																					कक्षा
																					<?php } else if($lang=='mt') { ?>
																					वर्ग
																					<?php } else if($lang=='tl') { ?>
																					క్లాస్
																					<?php } else { ?>
																					Class
																				<?php }	?></option>
																				<option value="I">I</option>
																				<option value="II">II</option>
																				<option value="III">III</option>
																				<option value="IV">IV</option>
																				<option value="V">V</option>
																				<option value="VI">VI</option>
																				<option value="VII">VII</option>
																				<option value="VIII">VIII</option>
																				<option value="IX">IX</option>
																				<option value="X">X</option>
																				<option value="XI">XI</option>
																				<option value="XII">XII</option>
																			</select>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				स्कूल
																				<?php } else if($lang=='mt') { ?>
																				शाळा
																				<?php } else if($lang=='tl') { ?>
																				స్కూల్
																				<?php } else { ?>
																				School
																			<?php }	?></label>
																			<input type="text"  name="school"  id="school" class="form-control form-control-lg">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				पासवर्ड
																				<?php } else if($lang=='mt') { ?>
																				पासवर्ड
																				<?php } else if($lang=='tl') { ?>
																				పాస్వర్డ్
																				<?php } else { ?>
																				Password
																			<?php }	?></label>
																			<input type="password" value="" name="yourpassword"  id="pwd" class="form-control form-control-lg">
																		</div>
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				पासवर्ड की पुष्टि कीजिये
																				<?php } else if($lang=='mt') { ?>
																				पासवर्डची पुष्टी करा
																				<?php } else if($lang=='tl') { ?>
																				పాస్వర్డ్ని నిర్ధారించండి
																				<?php } else { ?>
																				Confirm Password
																			<?php }	?></label>
																			<input type="password" value=""  name="retype"  id="retype" class="form-control form-control-lg">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="button"  class="btn btn-primary float-right mb-5 next" data-loading-text="Loading..." style="background-color: #ffffff; color: #1b68b2 ">
																			<?php if($lang=='hn') { ?>
																			आगामी
																			<?php } else if($lang=='mt') { ?>
																			पुढे
																			<?php } else if($lang=='tl') { ?>
																			తరువాత
																			<?php } else { ?>
																			Next
																			<?php }	?></button>
																		</div>
																	</div>
																</div>
																<div id="next" style="display: none;">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				पता
																				<?php } else if($lang=='mt') { ?>
																				पत्ता
																				<?php } else if($lang=='tl') { ?>
																				చిరునామా
																				<?php } else { ?>
																				Address
																			<?php }	?></label>
																			<input type="text" id="address" class="form-control form-control-lg" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				सड़क
																				<?php } else if($lang=='mt') { ?>
																				रस्ता
																				<?php } else if($lang=='tl') { ?>
																				వీధి
																				<?php } else { ?>
																				Street
																			<?php }	?></label>
																			<input type="text" id="street" class="form-control form-control-lg" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				इलाका
																				<?php } else if($lang=='mt') { ?>
																				परिसर
																				<?php } else if($lang=='tl') { ?>
																				లొక్యాలిటీ
																				<?php } else { ?>
																				Locality
																			<?php }	?></label>
																			<input type="text" id="locality" class="form-control form-control-lg" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				देश
																				<?php } else if($lang=='mt') { ?>
																				देश
																				<?php } else if($lang=='tl') { ?>
																				దేశం
																				<?php } else { ?>
																				Country
																			<?php }	?></label>
																			<?php $country_data=mysqli_query($link, "SELECT * FROM countries"); ?>
																			<select id="country" name="country" required="" class="form-control form-control-lg">
																				<option value="" placeholder="">
																					<?php if($lang=='hn') { ?>
																					देश चुनिए
																					<?php } else if($lang=='mt') { ?>
																					देश निवडा
																					<?php } else if($lang=='tl') { ?>
																					దేశాన్ని ఎంచుకోండి
																					<?php } else { ?>
																					Select Country
																				<?php }	?></option>
																				<?php	while($con=mysqli_fetch_array($country_data)){ ?>
																				<option value="<?php echo $con['id']; ?>"><?php echo $con['name']; ?></option>
																				<?php } ?>
																			</select>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				राज्य
																				<?php } else if($lang=='mt') { ?>
																				राज्य
																				<?php } else if($lang=='tl') { ?>
																				రాష్ట్రం
																				<?php } else { ?>
																				State
																			<?php }	?></label>
																			<select name="state" id="state" required="" class="form-control form-control-lg" >
																			</select>
																		</div>
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				शहर
																				<?php } else if($lang=='mt') { ?>
																				शहर
																				<?php } else if($lang=='tl') { ?>
																				సిటీ
																				<?php } else { ?>
																				City
																			<?php }	?>City</label>
																			<select name="city" id="city" required="" class="form-control form-control-lg" >
																			</select>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																				<?php if($lang=='hn') { ?>
																				पोस्ट कोड
																				<?php } else if($lang=='mt') { ?>
																				पिनकोड
																				<?php } else if($lang=='tl') { ?>
																				పోస్ట్ కోడ్నమోదు
																				<?php } else { ?>
																				Post Code
																			<?php }	?></label>
																			<input type="text" id="postcode" class="form-control form-control-lg">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="button" class="btn btn-primary mb-5 goback" data-loading-text="Loading..." style="background-color: #ffffff; color: #1b68b2 ">
																			<?php if($lang=='hn') { ?>
																			पिछला
																			<?php } else if($lang=='mt') { ?>
																			मागील
																			<?php } else if($lang=='tl') { ?>
																			మునుపటి
																			<?php } else { ?>
																			Previous
																			<?php }	?></button>
																			<button type="submit" name="submit" class="btn btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 "><i class="fas1 fas fa-sync fa-spin"></i>
																			<?php if($lang=='hn') { ?>
																			जमा करें
																			<?php } else if($lang=='mt') { ?>
																			सबमिट करा
																			<?php } else if($lang=='tl') { ?>
																			సమర్పించండి
																			<?php } else { ?>
																			Submit
																			<?php }	?></button>
																		</div>
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
							</div>
						</div>
						<?php include("footer.php") ?>
					</div>
					<!-- Vendor -->
					<?php include("footer_files.php") ?>
					<?php if($lang=='hn') { ?>
					<script src="js/loginreg_hn.js"></script>
					<?php } else if($lang=='mt') { ?>
					<script src="js/loginreg_mt.js"></script>
					<?php } else if($lang=='tl') { ?>
					<script src="js/loginreg_tl.js"></script>
					<?php } else { ?>
					<script src="js/loginreg.js"></script>
					<?php }	?>
					
				</body>
			</html>