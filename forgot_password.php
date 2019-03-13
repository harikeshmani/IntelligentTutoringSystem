<?php
$lang = $_GET['lang'];
//include("auth.php");
include("config.php");
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
								छात्र पासवर्ड रीसेट करें
								<?php } else if($lang=='mt') { ?>
								विद्यार्थी संकेतशब्द रीसेट
								<?php } else if($lang=='tl') { ?>
								విద్యార్థి పాస్వర్డ్ రీసెట్
								<?php } else { ?>
								Student Password Reset
								<?php }	?></h1>
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
												<h4 class="heading-primary text-uppercase mb-3" >
												<?php if($lang=='hn') { ?>
												पासवर्ड भूल गए
												<?php } else if($lang=='mt') { ?>
												संकेतशब्द विसरलात
												<?php } else if($lang=='tl') { ?>
												పాస్వర్డ్ మర్చిపోయారా
												<?php } else { ?>
												Forgot password
												<?php }	?> </h4>
												<form action="" id="forgot" method="post" name="password_reset">
													<div id="reset_password">
														<div class="form-row">
															<div class="form-group col">
																<?php if($lang=='hn') { ?>
																<label>
																मोबाइल नंबर</label>
																<input type="text" value="" class="form-control form-control-lg" placeholder="अपना पंजीकृत मोबाइल नंबर दर्ज करें" name="resetmobs" id="resetmob">
																<?php } else if($lang=='mt') { ?>
																<label>मोबाइल नंबर</label>
																<input type="text" value="" class="form-control form-control-lg" placeholder="तुमचा नोंदणीकृत मोबाइल नंबर एंटर करा" name="resetmobs" id="resetmob">
																<?php } else if($lang=='tl') { ?>
																<label> మొబైల్ సంఖ్య</label>
																<input type="text" value="" class="form-control form-control-lg" placeholder="మీ రిజిస్టర్డ్ మొబైల్ నంబర్ను నమోదు చేయండి" name="resetmobs" id="resetmob">
																<?php } else { ?>
																<label>	Mobile Number </label>
																<input type="text" value="" class="form-control form-control-lg" placeholder="enter your registerd mobile number" name="resetmobs" id="resetmob">
																<?php }	?>
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col">
																<button type="button" class="btn btn-primary btn-xl mb-5 mt-1 mr-1" style="background-color: #FFF; color: #1b68b2 " id="sendotp"><i class="fas fa-sync fa-spin"></i>
																<?php if($lang=='hn') { ?>
																ओटीपी भेजें
																<?php } else if($lang=='mt') { ?>
																ओटीपी पाठवा
																<?php } else if($lang=='tl') { ?>
																OTP ని పంపండి
																<?php } else { ?>
																Send OTP
																<?php }	?></button>
															</div>
														</div>
													</div>
													<div id="enter_otp">
														<div class="form-row">
															<div class="form-group col">
																<label><?php if($lang=='hn') { ?>
																	ओटीपी दर्ज करें
																	<?php } else if($lang=='mt') { ?>
																	OTP प्रविष्ट करा
																	<?php } else if($lang=='tl') { ?>
																	OTP ను ఎంటర్ చెయ్యండి
																	<?php } else { ?>
																	Enter OTP
																<?php }	?></label>
																<input type="text" value="" class="form-control form-control-lg" name="enterotp" placeholder=" " id="enterotp">
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col">
																<button type="button" class="btn btn-primary btn-xl  mb-5" style="background-color: #FFF; color: #1b68b2 " id="enterotps">
																<?php if($lang=='hn') { ?>
																अपना ओटीपी मिलाएं
																<?php } else if($lang=='mt') { ?>
																आपल्या OTP शी जुळणी करा
																<?php } else if($lang=='tl') { ?>
																మీ OTP కు మ్యాచ్
																<?php } else { ?>
																match your OTP
																<?php }	?></button>
															</div>
														</div>
													</div>
													<div id="password_reset_end">
														<div class="form-row">
															<div class="form-group col">
																<?php if($lang=='hn') { ?>
																<label>
																अपना नया पासवर्ड दर्ज करें </label>
																<input class="form-control form-control-lg" type="password" name="pass1" placeholder="अपना नया पासवर्ड दर्ज करें " id="pass1">
																<?php } else if($lang=='mt') { ?>
																<label>आपला नवीन संकेतशब्द प्रविष्ट करा </label>
																<input class="form-control form-control-lg" type="password" name="pass1" placeholder="Enter your new password " id="pass1">
																<?php } else if($lang=='tl') { ?>
																<label>
																మీ కొత్త పాస్ వర్డ్ ను ఎంటర్ చెయ్యండి </label>
																<input class="form-control form-control-lg" type="password" name="pass1" placeholder="మీ క్రొత్త పాస్వర్డ్ను నమోదు చేయండి " id="pass1">
																<?php } else { ?>
																<label>Enter your New password</label>
																<input class="form-control form-control-lg" type="password" name="pass1" placeholder="Enter your new password " id="pass1">
																<?php }	?>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>
																		<?php if($lang=='hn') { ?>
																		पासवर्ड फिर से लिखें
																		<?php } else if($lang=='mt') { ?>
																		पासवर्ड पुन्हा टाईप करा
																		<?php } else if($lang=='tl') { ?>
																		పాస్వర్డ్ తిరిగి టైప్ చెయ్యండి
																		<?php } else { ?>
																		Retype Password
																	<?php }	?> </label>
																	<input class="form-control form-control-lg" type="password" name="pass2" placeholder="" id="pass2">
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<button type="button" class="btn btn-primary btn-xl  mb-5" style="background-color: #FFF; color: #1b68b2 " id="upadteit"><i class="fas fa-sync fa-spin"></i>
																	<?php if($lang=='hn') { ?>
																	अपना पासवर्ड बदलें
																	<?php } else if($lang=='mt') { ?>
																	आपला पासवर्ड बदला
																	<?php } else if($lang=='tl') { ?>
																	పాస్వర్డ్ తిరిగి టైప్ చెయ్యండి
																	<?php } else { ?>
																	Change Your Password
																	<?php }	?></button>
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
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- Vendor -->
			<?php include("footer_files.php") ?>
			<?php if($lang=='hn') { ?>
			<script src="js/forgetpassword.js"></script>
			<?php } else if($lang=='mt') { ?>
			<script src="js/forgetpassword_mt.js"></script>
			<?php } else if($lang=='tl') { ?>
			<script src="js/forgetpassword_tl.js"></script>
			<?php } else { ?>
			<script src="js/forgetpassword.js"></script>
			<?php }	?>
			
		</body>
	</html>