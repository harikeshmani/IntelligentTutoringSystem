<?php
$lang = $_GET['lang'];
include("auth.php");
$user_id = $_SESSION['userid'];
$userfetch_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = '$user_id' "));
$contry_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM countries WHERE id = '".$userfetch_data['country']."'"));
$country = $contry_database['name'];
$state =$userfetch_data['state'];
$state_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM states WHERE id = '".$state."'"));
$state = $state_database['name'];
$city =  $userfetch_data['city'];
$city_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM cities WHERE id = '".$city."'"));
$city = $city_database['name'];
$picture = $userfetch_data['pic'];
$country_data=mysqli_query($link,"SELECT * FROM countries ");
$country_num=mysqli_num_rows($country_data);
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php"); ?>
		<!-- Current Page CSS -->
		<style type="text/css">
			form label {
				color: #2d6cac;
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
								<h1>
								<?php if($lang=='hn') { ?>
								प्रोफाइल
								<?php } else if($lang=='mt') { ?>
								प्रोफाइल
								<?php } else if($lang=='tl') { ?>
								ప్రొఫైల్
								<?php } else { ?>
								Profile
								<?php }	?>
								</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<form role="form" enctype="multipart/form-data"  id="form-profile">
						<div class="row">
							<div class="col-lg-4"></div>
							<div class="col-lg-4">
								<span class="thumb-info thumb-info-hide-wrapper-bg">
									<span class="thumb-info-wrapper">
										<img src="<?php echo 'api/user_image/'.$picture; ?>" class="img-fluid" alt=<?php echo $userfetch_data['username']; ?> "image"  >
										<span class="thumb-info-title">
											<span class="thumb-info-inner"><?php echo $userfetch_data['username']; ?></span>
											<span class="thumb-info-type">
												<?php if($lang=='hn') { ?>
												फोटो अपडेट करें
												<?php } else if($lang=='mt') { ?>
												प्रतिमा अद्यतनित करा
												<?php } else if($lang=='tl') { ?>
												చిత్రాన్ని నవీకరించండి
												<?php } else { ?>
												Update Image
											<?php }	?>	</span>
										</span>
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-social-icons">
											<input class="form-control form-control-md" type="file" name="picture" id="picture"> OR
											<button type=button" class="btn btn-primary btn-sm mb-2" onclick="opencam();" >
											<?php if($lang=='hn') { ?>
											वेब कैमरा खोलें
											<?php } else if($lang=='mt') { ?>
											उघडा वेबकॅम
											<?php } else if($lang=='tl') { ?>
											వెబ్కామ్ను తెరవండి
											<?php } else { ?>
											Open Webcam
											<?php }	?>
											</button>
											<button type=button" class="btn btn-primary btn-sm mb-2" onclick="take_snapshot();" id="snap">
											<?php if($lang=='hn') { ?>
											स्नैपशॉट लें
											<?php } else if($lang=='mt') { ?>
											स्नॅपशॉट घ्या
											<?php } else if($lang=='tl') { ?>
											స్నాప్షాట్ తీసుకోండి
											<?php } else { ?>
											Take Snapshot
											<?php }	?></button>
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
							<?php if($lang=='hn') { ?>
							<strong><i class="far fa-thumbs-up"></i> बहुत बढ़िया!</strong> आपने सफलतापूर्वक अपनी प्रोफाइल अपडेट की है
							<?php } else if($lang=='mt') { ?>
							<strong><i class="far fa-thumbs-up"></i> चांगले केले!</strong>
							आपण यशस्वीरित्या आपले प्रोफाइल अद्यतनित केले
							<?php } else if($lang=='tl') { ?>
							<strong><i class="far fa-thumbs-up"></i> బాగా చేసాను!</strong> మీ ప్రొఫైల్ విజయవంతంగా నవీకరించబడింది
							<?php } else { ?>
							<strong><i class="far fa-thumbs-up"></i> Well done!</strong> You successfully updated Your Profile
							<?php }	?>
						</div>
						<div class="row">
							<div class="col">
								<h4 class="mb-4">
								<?php if($lang=='hn') { ?>
								नेव्हिगेशन
								<?php } else if($lang=='mt') { ?>
								नेव्हिगेशन
								<?php } else if($lang=='tl') { ?>
								నావిగేషన్
								<?php } else { ?>
								Navigation
								<?php }	?>
								</h4>
								<div class="row">
									<div class="col-lg-4">
										<div class="tabs tabs-vertical tabs-left tabs-navigation">
											<ul class="nav nav-tabs col-sm-3">
												<li class="nav-item active">
													<a class="nav-link show active" href="#tabsNavigation1" data-toggle="tab"><i class="fas fa-user"></i>
														<?php if($lang=='hn') { ?>
														व्यक्तिगत जानकारी
														<?php } else if($lang=='mt') { ?>
														वैयक्तिक माहिती
														<?php } else if($lang=='tl') { ?>
														వ్యక్తిగత సమాచారం
														<?php } else { ?>
														Personal Information
														<?php }	?>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#tabsNavigation2" data-toggle="tab"><i class="fas fa-address-book"></i>
														<?php if($lang=='hn') { ?>
														पता
														<?php } else if($lang=='mt') { ?>
														पत्ता
														<?php } else if($lang=='tl') { ?>
														చిరునామా
														<?php } else { ?>
														Address
														<?php }	?>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#tabsNavigation3" data-toggle="tab"><i class="fas fa-graduation-cap"></i>
														<?php if($lang=='hn') { ?>
														शैक्षिक सूचना
														<?php } else if($lang=='mt') { ?>
														शैक्षणिक माहिती
														<?php } else if($lang=='tl') { ?>
														విద్యా సమాచారం
														<?php } else { ?>
														Educational Information
														<?php }	?>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#tabsNavigation4" data-toggle="tab"><i class="fas fa-book"></i>
														<?php if($lang=='hn') { ?>
														विषय
														<?php } else if($lang=='mt') { ?>
														विषय
														<?php } else if($lang=='tl') { ?>
														విషయము
														<?php } else { ?>
														Subjects
														<?php }	?>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#tabsNavigation5" data-toggle="tab"><i class="fas fa-futbol"></i>
														<?php if($lang=='hn') { ?>
														खेल
														<?php } else if($lang=='mt') { ?>
														क्रीडा
														<?php } else if($lang=='tl') { ?>
														క్రీడలు
														<?php } else { ?>
														Sports
														<?php }	?>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#tabsNavigation6" data-toggle="tab"><i class="fas fa-paint-brush"></i>
														<?php if($lang=='hn') { ?>
														अतिरिक्त पाठयक्रम गतिविधियों
														<?php } else if($lang=='mt') { ?>
														अभ्यासेतर उपक्रम
														<?php } else if($lang=='tl') { ?>
														ఇతరేతర వ్యాపకాలు
														<?php } else { ?>
														Extracurricular Activities
														<?php }	?>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-8">
										<div class="featured-box featured-box-primary text-left">
											<div class="box-content">
												<div class="tab-pane tab-pane-navigation active show" id="tabsNavigation1">
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
																<?php }	?>
															</label>
															<input class="form-control form-control-md" type="text" value="<?php echo $userfetch_data['username']; ?>" disabled>
														</div>
														<div class="form-group col">
															<label>
																<?php if($lang=='hn') { ?>
																ईमेल
																<?php } else if($lang=='mt') { ?>
																ईमेल पत्ता
																<?php } else if($lang=='tl') { ?>
																ఇమెయిల్
																<?php } else { ?>
																Email Address
																<?php }	?>
															</label>
															<input class="form-control form-control-md" type="text" value="<?php echo $userfetch_data['email']; ?>" disabled>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>
																<?php if($lang=='hn') { ?>
																पंजीकृत मोबाइल
																<?php } else if($lang=='mt') { ?>
																नोंदणीकृत मोबाइल नंबर
																<?php } else if($lang=='tl') { ?>
																నమోదు చేసిన మొబైల్ నంబర్
																<?php } else { ?>
																Registered Mobile no.
																<?php }	?>
															</label>
															<input class="form-control form-control-md"" type="text" value="<?php echo $userfetch_data['mobile_no']; ?>" disabled>
														</div>
														<div class="form-group col">
															<label>
																<?php if($lang=='hn') { ?>
																फेसबुक लिंक
																<?php } else if($lang=='mt') { ?>
																फेसबुक लिंक
																<?php } else if($lang=='tl') { ?>
																ఫేస్బుక్ లింక్
																<?php } else { ?>
																Facebook Link
																<?php }	?>
															</label>
															<input class="form-control form-control-md"" type="text" name="fb_link" value="<?php echo $userfetch_data['facebook_link']; ?>">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>
																<?php if($lang=='hn') { ?>
																ट्विटर लिंक
																<?php } else if($lang=='mt') { ?>
																ट्विटर लिंक
																<?php } else if($lang=='tl') { ?>
																ట్విట్టర్ లింక్
																<?php } else { ?>
																Twitter Link
																<?php }	?>
															</label>
															<input class="form-control form-control-md"" type="text" name="twitter_link" value="<?php echo $userfetch_data['twitter_link']; ?>" >
														</div>
														<div class="form-group col">
															<label>
																<?php if($lang=='hn') { ?>
																इंस्टाग्राम लिंक
																<?php } else if($lang=='mt') { ?>
																इंस्टाग्राम लिंक
																<?php } else if($lang=='tl') { ?>
																Instagram లింక్
																<?php } else { ?>
																Instagram Link
																<?php }	?>
															</label>
															<input class="form-control form-control-md"" type="text" name="insta_link" value="<?php echo $userfetch_data['instagrm_link']; ?>" >
														</div>
													</div>
												</div>
												<div class="tab-pane tab-pane-navigation" id="tabsNavigation2">
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
																<?php }	?>
															</label>
															<input class="form-control form-control-md" type="text" name="address" value="<?php echo $userfetch_data['address']; ?>" required="" >
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
																<?php }	?>
															</label>
															<input class="form-control form-control-md" type="text" name="street" value="<?php echo $userfetch_data['street']; ?>" required="">
														</div>
														<div class="form-group col">
															<label >
																<?php if($lang=='hn') { ?>
																इलाका
																<?php } else if($lang=='mt') { ?>
																परिसर
																<?php } else if($lang=='tl') { ?>
																లొక్యాలిటీ
																<?php } else { ?>
																Locality
																<?php }	?>
															:</label>
															<input class="form-control form-control-md" type="text" name="locality" value="<?php echo $userfetch_data['locality']; ?>" required="">
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
																<?php }	?>
															:</label>
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
															<label>
																<?php if($lang=='hn') { ?>
																राज्य
																<?php } else if($lang=='mt') { ?>
																राज्य
																<?php } else if($lang=='tl') { ?>
																రాష్ట్రం
																<?php } else { ?>
																State
																<?php }	?>
															</label>
															<select  class="form-control form-control-md" name="state" id="state" required="" >
																<option value="<?php echo $state; ?>"><?php echo $state; ?> </option>
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
																<?php }	?>
															:</label>
															<select  class="form-control form-control-md" name="city" id="city" required="" >
																<option value="<?php echo $city; ?>"><?php echo $city; ?></option>
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
																పోస్ట్ కోడ్
																<?php } else { ?>
																Post Code
																<?php }	?>
															:</label>
															<input class="form-control form-control-xs" type="text" name="pin_code" value="<?php echo $userfetch_data['post_code']; ?>" required="" >
														</div>
													</div>
												</div>
												<div class="tab-pane tab-pane-navigation" id="tabsNavigation3">
													<div class="form-row">
														<div class="form-group col">
															<label>
																<?php if($lang=='hn') { ?>
																संस्था
																<?php } else if($lang=='mt') { ?>
																संस्था
																<?php } else if($lang=='tl') { ?>
																ఇన్స్టిట్యూషన్
																<?php } else { ?>
																Institution
																<?php }	?>
															:</label>
															<input class="form-control form-control-md" type="text" name="school" value="<?php echo $userfetch_data['school']; ?>" required="" >
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label>
																<?php if($lang=='hn') { ?>
																कक्षा
																<?php } else if($lang=='mt') { ?>
																वर्ग
																<?php } else if($lang=='tl') { ?>
																క్లాస్
																<?php } else { ?>
																Class
																<?php }	?>
															:</label>
															<input class="form-control form-control-md" type="text" name="class" value="<?php echo $userfetch_data['class']; ?>" required="" >
														</div>
													</div>
												</div>
												<div class="tab-pane tab-pane-navigation" id="tabsNavigation4">
													<label>
														<?php if($lang=='hn') { ?>
														विषय
														<?php } else if($lang=='mt') { ?>
														विषय
														<?php } else if($lang=='tl') { ?>
														విషయము
														<?php } else { ?>
														Subjects
														<?php }	?>
													</label>
													<ol class="list list-ordened list-ordened-style-3">
														<li>
															<select class="form-control form-control-md" name="sub1" id="sub1" required="">
																<option value="<?php echo $userfetch_data['subject1']; ?>"><?php echo $userfetch_data['subject1']; ?></option>
																<?php
																$subject_data=mysqli_query($link,"SELECT * FROM tbl_subject_list ");
																while($sub=mysqli_fetch_array($subject_data)){ ?>
																<option value="<?php echo $sub['subject']; ?>"><?php echo $sub['subject']; ?> </option>
																<?php } ?>
															</select>
														</li>
														<li>
															<select class="form-control form-control-md" name="sub2" id="sub2" required="">
																<option value="<?php echo  $userfetch_data['subject2']; ?>"><?php echo $userfetch_data['subject2'];; ?></option>
																<?php
																$subject_data=mysqli_query($link,"SELECT * FROM tbl_subject_list ");
																while($sub=mysqli_fetch_array($subject_data)){ ?>
																<option value="<?php echo $sub['subject']; ?>"><?php echo $sub['subject'] ?> </option>
																<?php } ?>
															</select>
														</li>
														<li>
															<select class="form-control form-control-md" name="sub3" id="sub3" required="">
																<option value="<?php echo $userfetch_data['subject3']; ?>"><?php echo $userfetch_data['subject3']; ?></option>
																<?php
																$subject_data=mysqli_query($link,"SELECT * FROM tbl_subject_list ");
																while($sub=mysqli_fetch_array($subject_data)){ ?>
																<option value="<?php echo $sub['subject']; ?>"><?php echo $sub['subject']; ?> </option>
																<?php } ?>
															</select>
														</li>
														<li>
															<select class="form-control form-control-md" name="sub4" id="sub4" required="">
																<option value="<?php echo $userfetch_data['subject4']; ?>"><?php echo $userfetch_data['subject4']; ?></option>
																<?php
																$subject_data=mysqli_query($link,"SELECT * FROM tbl_subject_list ");
																while($sub=mysqli_fetch_array($subject_data)){ ?>
																<option value="<?php echo $sub['subject']; ?>"><?php echo $sub['subject']; ?> </option>
																<?php } ?>
															</select>
														</li>
														<li>
															<select class="form-control form-control-md" name="sub5" id="sub5" required="">
																<option value="<?php echo $userfetch_data['subject1']; ?>"><?php echo $userfetch_data['subject1']; ?></option>
																<?php $subject_data=mysqli_query($link,"SELECT * FROM tbl_subject_list ");
																while($sub=mysqli_fetch_array($subject_data)){ ?>
																<option value="<?php echo $sub['subject']; ?>"><?php echo $sub['subject']; ?> </option>
																<?php } ?>
															</select></li>
														</ol>
													</div>
													<div class="tab-pane tab-pane-navigation" id="tabsNavigation5">
														<label>
															<?php if($lang=='hn') { ?>
															खेल
															<?php } else if($lang=='mt') { ?>
															क्रीडा
															<?php } else if($lang=='tl') { ?>
															క్రీడలు
															<?php } else { ?>
															Sports
														<?php }	?></label>
														<ol class="list list-ordened list-ordened-style-3">
															<li>
																<select class="form-control form-control-md" name="sport1" id="sport1" required="">
																	<option value="<?php echo $userfetch_data['sports1']; ?>"><?php echo $userfetch_data['sports1']; ?></option>
																	<?php $sports_data=mysqli_query($link, "SELECT * FROM tbl_sports");
																	while($name_sports=mysqli_fetch_array($sports_data)){ ?>
																	<option value="<?php echo $name_sports['name']; ?>"><?php echo $name_sports['name']; ?> </option>
																	<?php } ?>
																</select>
															</li>
															<li>
																<select class="form-control form-control-md" name="sport2" id="sport2" required="">
																	<option value="<?php echo $userfetch_data['sports2']; ?>"><?php echo $userfetch_data['sports2']; ?></option>
																	<?php $sports_data=mysqli_query($link, "SELECT * FROM tbl_sports");
																	while($name_sports=mysqli_fetch_array($sports_data)){ ?>
																	<option value="<?php echo $name_sports['name']; ?>"><?php echo $name_sports['name']; ?> </option>
																	<?php } ?>
																</select>
															</li>
															<li>
																<select class="form-control form-control-md" name="sport3" id="sport3" required="">
																	<option value="<?php echo $userfetch_data['sports3']; ?>"><?php echo $userfetch_data['sports3']; ?></option>
																	<?php $sports_data=mysqli_query($link, "SELECT * FROM tbl_sports");
																	while($name_sports=mysqli_fetch_array($sports_data)){ ?>
																	<option value="<?php echo $name_sports['name']; ?>"><?php echo $name_sports['name']; ?> </option>
																	<?php } ?>
																</select>
															</li>
															<li>
																<select class="form-control form-control-md" name="sport4" id="sport4" required="">
																	<option value="<?php echo $userfetch_data['sports4']; ?>"><?php echo $userfetch_data['sports4']; ?></option>
																	<?php $sports_data=mysqli_query($link, "SELECT * FROM tbl_sports");
																	while($name_sports=mysqli_fetch_array($sports_data)){ ?>
																	<option value="<?php echo $name_sports['name']; ?>"><?php echo $name_sports['name']; ?> </option>
																	<?php } ?>
																</select>
															</li>
															<li>
																<select class="form-control form-control-md" name="sport5" id="sport5" required="">
																	<option value="<?php echo $userfetch_data['sports5']; ?>"><?php echo $userfetch_data['sports5']; ?></option>
																	<?php $sports_data=mysqli_query($link, "SELECT * FROM tbl_sports");
																	while($name_sports=mysqli_fetch_array($sports_data)){ ?>
																	<option value="<?php echo $name_sports['name']; ?>"><?php echo $name_sports['name']; ?> </option>
																	<?php } ?>
																</select>
															</li>
														</ol>
													</div>
													<div class="tab-pane tab-pane-navigation" id="tabsNavigation6">
														<label>
															<?php if($lang=='hn') { ?>
															अतिरिक्त पाठयक्रम गतिविधियों
															<?php } else if($lang=='mt') { ?>
															अभ्यासेतर उपक्रम
															<?php } else if($lang=='tl') { ?>
															ఇతరేతర వ్యాపకాలు
															<?php } else { ?>
															Extracurricular Activities
															<?php }	?>
														</label>
														<ol class="list list-ordened list-ordened-style-3">
															<li>
																<select class="form-control form-control-md" name="extra1" id="extra1" required="">
																	<option value="<?php echo $userfetch_data['extra_activities1']; ?>"><?php echo $userfetch_data['extra_activities1']; ?></option>
																	<?php $extra_data=mysqli_query($link, "SELECT * FROM tbl_subject_list WHERE class_type='extracurricular'");
																	while($name_extra=mysqli_fetch_array($extra_data)){ ?>
																	<option value="<?php echo $name_extra['subject']; ?>"><?php echo $name_extra['subject']; ?> </option>
																	<?php } ?>
																</select>
															</li>
															<li>
																<select class="form-control form-control-md" name="extra2" id="extra2" required="">
																	<option value="<?php echo $userfetch_data['extra_activities2']; ?>"><?php echo $userfetch_data['extra_activities2']; ?></option>
																	<?php $extra_data=mysqli_query($link, "SELECT * FROM tbl_subject_list WHERE class_type='extracurricular'");
																	while($name_extra=mysqli_fetch_array($extra_data)){ ?>
																	<option value="<?php echo $name_extra['subject']; ?>"><?php echo $name_extra['subject']; ?> </option>
																	<?php } ?>
																</select>
															</li>
															<li>
																<select class="form-control form-control-md" name="extra3" id="extra3" required="">
																	<option value="<?php echo $userfetch_data['extra_activities3']; ?>"><?php echo $userfetch_data['extra_activities3']; ?></option>
																	<?php $extra_data=mysqli_query($link, "SELECT * FROM tbl_subject_list WHERE class_type='extracurricular'");
																	while($name_extra=mysqli_fetch_array($extra_data)){ ?>
																	<option value="<?php echo $name_extra['subject']; ?>"><?php echo $name_extra['subject']; ?> </option>
																	<?php } ?>
																</select>
															</li>
															<li>
																<select class="form-control form-control-md" name="extra4" id="extra4" required="">
																	<option value="<?php echo $userfetch_data['extra_activities4']; ?>"><?php echo $userfetch_data['extra_activities4']; ?></option>
																	<?php $extra_data=mysqli_query($link, "SELECT * FROM tbl_subject_list WHERE class_type='extracurricular'");
																	while($name_extra=mysqli_fetch_array($extra_data)){ ?>
																	<option value="<?php echo $name_extra['subject']; ?>"><?php echo $name_extra['subject']; ?> </option>
																	<?php } ?>
																</select>
															</li>
															<li>
																<select class="form-control form-control-md" name="extra5" id="extra5" required="">
																	<option value="<?php echo $userfetch_data['extra_activities5']; ?>"><?php echo $userfetch_data['extra_activities5']; ?></option>
																	<?php $extra_data=mysqli_query($link, "SELECT * FROM tbl_subject_list WHERE class_type='extracurricular'");
																	while($name_extra=mysqli_fetch_array($extra_data)){ ?>
																	<option value="<?php echo $name_extra['subject']; ?>"><?php echo $name_extra['subject']; ?> </option>
																	<?php } ?>
																</select>
															</li>
														</ol>
													</div>
												</div>
											</div>
											<button type="button" class="btn btn-primary btn-xl mb-2 m-4"  data-placement="top" title=""  id="final-submit">
											<?php if($lang=='hn') { ?>
											अपडेट करें
											<?php } else if($lang=='mt') { ?>
											अद्यतन करा
											<?php } else if($lang=='tl') { ?>
											నవీకరణ
											<?php } else { ?>
											Update
											<?php }	?>
											
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
			<!-- Vendor -->
			<?php include("footer_files.php") ?>
			<script src="js/webcam.js"></script>
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