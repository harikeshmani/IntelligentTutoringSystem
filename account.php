<?php
$lang = $_GET['lang'];
include("auth.php");
$user_id = $_SESSION['userid'];
$userfetch_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = '$user_id'"));
$name =  $userfetch_data['username'];
$email =  $userfetch_data['email'];
$mobileno =  $userfetch_data['mobile_no'];
//////////code for uploading aadhar id//////////
if(isset($_POST['submit_aadhar'])){
$aadhar_nos = $_POST["Aadhaar_no"];
$file=$_FILES["upload_file_aadhar"]["name"];
$files = "Aadhar" .$user_id;
mysqli_query($link, "UPDATE tbl_glow_students SET aadhar = '$files', aadhar_no = '$aadhar_nos' WHERE id='$user_id'");
move_uploaded_file($_FILES["upload_file_aadhar"]["tmp_name"], "api/user_document/".$files);
if($lang=='hn') {
echo "<script type='text/javascript'>alert('आपके आधार विवरणों को सफलतापूर्वक अपलोड किया गया');</script>";
} else if($lang=='mt') {
echo "<script type='text/javascript'>alert('आपल्या आधार्याचे तपशील यशस्वीरित्या अपलोड केले');</script>";
} else if($lang=='tl') {
echo "<script type='text/javascript'>alert('మీ ఆధార్ వివరాలను విజయవంతంగా అప్లోడ్ చేసారు');</script>";
} else {
echo "<script type='text/javascript'>alert('sucessfully uploaded your aadhar details');</script>";
}
}
///////////////code for uploading driving license/////
if(isset($_POST["submit_dl"])) {
$dl_nos = $_POST["dl_no"];
$file = $_FILES["upload_file_dl"]["name"];
$files = "DrivingLicense" .$user_id;
mysqli_query($link, "UPDATE tbl_glow_students SET driving_licence = '$files', dl_no = '$dl_nos' WHERE id='$user_id'");
move_uploaded_file($_FILES["upload_file_dl"]["tmp_name"], "api/user_document/".$files);
if($lang=='hn') {
echo "<script type='text/javascript'>alert('आपके ड्राइविंग लाइसेंस को सफलतापूर्वक अपलोड किया गया');</script>";
} else if($lang=='mt') {
echo "<script type='text/javascript'>alert('आपला ड्रायव्हिंग परवाना यशस्वीरित्या अपलोड केला');</script>";
} else if($lang=='tl') {
echo "<script type='text/javascript'>alert('మీ డ్రైవింగ్ లైసెన్స్ను విజయవంతంగా అప్లోడ్ చేసింది');</script>";
} else {
echo "<script type='text/javascript'>alert('sucessfully uploaded your driving license');</script>";
}
}
//////////////////code for uploading voter id/////////
if(isset($_POST['upload_voter_id'])) {
$vid = $_POST["vid_no"];
$file_vote = $_FILES["upload_file_vid"]["name"];
$files_vote = "Voter_id" .$user_id;
mysqli_query($link, "UPDATE tbl_glow_students SET voter_id = '$files_vote', voter_id_no = '$vid' WHERE id='$user_id'");
move_uploaded_file($_FILES["upload_file_vid"]["tmp_name"], "api/user_document/".$files_vote);
if($lang=='hn') {
echo "<script type='text/javascript'>alert('आपके मतदाता आईडी को सफलतापूर्वक अपलोड किया गया');</script>";
} else if($lang=='mt') {
echo "<script type='text/javascript'>alert('आपला मतदार आयडी यशस्वीपणे अपलोड केला');</script>";
} else if($lang=='tl') {
echo "<script type='text/javascript'>alert('విజయవంతంగా మీ ఓటరు ఐడిని అప్లోడ్ చేసింది');</script>";
} else {
echo "<script type='text/javascript'>alert('sucessfully uploaded your voter id');</script>";
}
}
/////////////////////////code før uploading school id////
if(isset($_POST["upload_school_id"])){
$sid = $_POST["school_id_no"];
$file = $_FILES["upload_file_sid"]["name"];
$files = "school_id" .$user_id;
mysqli_query($link, "UPDATE tbl_glow_students SET school_id = '$files', school_id_no = '$sid' WHERE id='$user_id'");
move_uploaded_file($_FILES["upload_file_sid"]["tmp_name"], "api/user_document/".$files);
if($lang=='hn') {
echo "<script type='text/javascript>alert('सफलतापूर्वक अपनी स्कूल आईडी अपलोड की');</script>";
} else if($lang=='mt') {
echo "<script type='text/javascript>alert('आपला शाळा ID यशस्वीरित्या अपलोड केला');</script>";
} else if($lang=='tl') {
echo "<script type='text/javascript>alert('విజయవంతంగా పాఠశాల పాఠశాల ఐడిని అప్లోడ్ చేసింది');</script>";
} else {
echo "<script type='text/javascript>alert('sucessfully uploaded your school id');</script>";
}
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
			<div role="main" class="main">
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>
								<?php if($lang=='hn') { ?>
								आपका खाता
								<?php } else if($lang=='mt') { ?>
								खाते
								<?php } else if($lang=='tl') { ?>
								ఖాతా
								<?php } else { ?>
								Account
								<?php }	?>	</h1>
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
											<p class="mb-0 pb-0">
												<?php if($lang=='hn') { ?>
												तुम्हारे ऑर्डर
												<?php } else if($lang=='mt') { ?>
												आपले ऑर्डर
												<?php } else if($lang=='tl') { ?>
												మీ ఆర్డర్లు
												<?php } else { ?>
												Your Orders
											<?php }	?>	</p>
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
											<p class="mb-0 pb-0">
												<?php if($lang=='hn') { ?>
												लॉगिन और सुरक्षा
												<?php } else if($lang=='mt') { ?>
												लॉगइन आणि सुरक्षा
												<?php } else if($lang=='tl') { ?>
												లాగిన్ మరియు భద్రత
												<?php } else { ?>
												Login and Security
											<?php }	?>	</p>
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
											<p class="mb-0 pb-0">
												<?php if($lang=='hn') { ?>
												फोटो आईडी अपलोड करें
												<?php } else if($lang=='mt') { ?>
												फोटो आयडी अपलोड करा
												<?php } else if($lang=='tl') { ?>
												ఫోటో ID ని అప్లోడ్ చేయండి
												<?php } else { ?>
												Upload Photo ID
											<?php }	?>	</p>
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
											<p class="mb-0 pb-0">
												<?php if($lang=='hn') { ?>
												अपनी खरीददारी की समीक्षा करें।
												<?php } else if($lang=='mt') { ?>
												तुमची खरेदी तपासून पहा
												<?php } else if($lang=='tl') { ?>
												మిరు కొన్న వస్తువులు సరిచూసుకొండి
												<?php } else { ?>
												Review Your Purchases
											<?php }	?>	</p>
										</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tabsNavigationSimpleIcons1">
										<div class="text-center">
											<h4>
											<?php if($lang=='hn') { ?>
											तुम्हारे ऑर्डर
											<?php } else if($lang=='mt') { ?>
											आपले ऑर्डर
											<?php } else if($lang=='tl') { ?>
											మీ ఆర్డర్లు
											<?php } else { ?>
											Your Orders
											<?php }	?>	</h4>
											<table class="table table-bordered table-hover" id="orderss">
												<?php
												$i = 1;
												$qry = mysqli_query($link, "SELECT * FROM tbl_order where student_id=$user_id ");
												if (mysqli_num_rows($qry) == 0) {
												if($lang=='hn') {
												
												} else if($lang=='mt') {
												
												} else if($lang=='tl') {
												
												} else {
												echo "No Record Found";
												}
												} else {
												if($lang=='hn') {
												
												} else if($lang=='mt') {
												
												} else if($lang=='tl') {
												
												} else {
												echo  "<thead>";
													echo  "<tr>";
														echo "<th>#</th>";
														echo  "<th>order Type</th>";
														echo  "<th>Tutor Name</th>";
														echo  "<th>Order Date</th>";
														echo  "<th>Amount</th>";
														echo  "<th>Download Invoice</th>";
													echo  "</tr>";
												echo  "</thead>";
												echo  " <tbody>";
																		}
																	
																		while($userfetch_data=mysqli_fetch_array($qry))
																							{
																		$invoice = $userfetch_data['invoice'];
																		$invoice = str_replace(' ', '', $invoice);
																		$tutor_id = $userfetch_data['tutor_id'];
																		$name_query = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor where id=$tutor_id"));
																		$tutor_name = $name_query['first_name'];
																		echo '<tr>';
																								echo "<td> $i</td>";
																								echo "<td>". $userfetch_data['order_type']  ."</td>";
																								echo "<td>". $tutor_name ."</td>";
																								echo "<td>" .$userfetch_data['order_date'] ."</td>";
																								echo "<td>". $userfetch_data['total_amount'] ."</td>";
																								echo "<td><a href='../intelligent_tutoring_system/api/generated_invoice/$invoice' class='btn btn-primary' Download>
																									download</button></a></td>";
																		echo '</tr>';
												echo '</tbody>';
												$i++;
												} }
												?>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tabsNavigationSimpleIcons2">
										<div class="text-center">
											<h4>
											<?php if($lang=='hn') { ?>
											लॉगिन और सुरक्षा
											<?php } else if($lang=='mt') { ?>
											लॉगिन आणि सुरक्षा
											<?php } else if($lang=='tl') { ?>
											లాగిన్ మరియు భద్రత
											<?php } else { ?>
											Login and Security
											<?php }	?>
											</h4>
											<table class="table table-bordered table-hover">
												<?php if($lang=='hn') { ?>
												<tbody>
													<tr>
														<td>नाम: </td>
														<td><?php echo $name ;?></td>
														<td><a href="change_name.php" class="btn btn-primary btn-sm">परिवर्तन</a></td>
													</tr>
													<tr>
														<td>ईमेल: </td>
														<td><?php echo $email ;?></td>
														<td><a href="change_email.php" class="btn btn-primary btn-sm">परिवर्तन</a></td>
													</tr>
													<tr>
														<td>मोबाइल नंबर: </td>
														<td><?php echo $mobileno ;?></td>
														<td><a href="change_number.php" class="btn btn-primary btn-sm">परिवर्तन</a></td>
													</tr>
													<tr>
														<td>पासवर्ड: </td>
														<td><span class="password">*******</span></td>
														<td><a href="change_password.php" class="btn btn-primary btn-sm">पासवर्ड बदलें</a></td>
													</tr>
												</tbody>
												<?php } else if($lang=='mt') { ?>
												<tbody>
													<tr>
														<td>नाव: </td>
														<td><?php echo $name ;?></td>
														<td><a href="change_name.php" class="btn btn-primary btn-sm">
														बदल करा</a></td>
													</tr>
													<tr>
														<td>ई-मेल: </td>
														<td><?php echo $email ;?></td>
														<td><a href="change_email.php" class="btn btn-primary btn-sm">
														बदल करा</a></td>
													</tr>
													<tr>
														<td>मोबाइल नंबर: </td>
														<td><?php echo $mobileno ;?></td>
														<td><a href="change_number.php" class="btn btn-primary btn-sm">
														बदल करा</a></td>
													</tr>
													<tr>
														<td>पासवर्ड: </td>
														<td><span class="password">*******</span></td>
														<td><a href="change_password.php" class="btn btn-primary btn-sm">बदल करा</a></td>
													</tr>
												</tbody>
												<?php } else if($lang=='tl') { ?>
												<tbody>
													<tr>
														<td>పేరు: </td>
														<td><?php echo $name ;?></td>
														<td><a href="change_name.php" class="btn btn-primary btn-sm">మార్పు</a></td>
													</tr>
													<tr>
														<td>ఇమెయిల్: </td>
														<td><?php echo $email ;?></td>
														<td><a href="change_email.php" class="btn btn-primary btn-sm">మార్పు</a></td>
													</tr>
													<tr>
														<td>
														మొబైల్ నంబర్: </td>
														<td><?php echo $mobileno ;?></td>
														<td><a href="change_number.php" class="btn btn-primary btn-sm">మార్పు</a></td>
													</tr>
													<tr>
														<td>పాస్వర్డ్: </td>
														<td><span class="password">*******</span></td>
														<td><a href="change_password.php" class="btn btn-primary btn-sm">మార్పు</a></td>
													</tr>
												</tbody>
												<?php } else { ?>
												<tbody>
													<tr>
														<td>Name: </td>
														<td><?php echo $name ;?></td>
														<td><a href="change_name.php?lang=eng" class="btn btn-primary btn-sm">change</a></td>
													</tr>
													<tr>
														<td>E-mail: </td>
														<td><?php echo $email ;?></td>
														<td><a href="change_email.php?lang=eng" class="btn btn-primary btn-sm">change</a></td>
													</tr>
													<tr>
														<td>Mobile number: </td>
														<td><?php echo $mobileno ;?></td>
														<td><a href="change_number.php?lang=eng" class="btn btn-primary btn-sm">change</a></td>
													</tr>
													<tr>
														<td>Password: </td>
														<td><span class="password">*******</span></td>
														<td><a href="change_password.php?lang=eng" class="btn btn-primary btn-sm">change</a></td>
													</tr>
												</tbody>
												<?php }	?>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tabsNavigationSimpleIcons3">
										<div class="col">
											<?php if($lang=='hn') { ?>
											<h4 class="mb-4">फोटो आईडी सबूत</h4>
											<div class="row">
												<div class="col-lg-4">
													<div class="tabs tabs-vertical tabs-left tabs-navigation">
														<ul class="nav nav-tabs col-sm-3">
															<li class="nav-item active">
																<a class="nav-link show active" href="#tabsNavigation1" data-toggle="tab"><i class="fas fa-file"></i> आधार</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation2" data-toggle="tab"><i class="fas fa-file"></i> ड्राइविंग लाइसेंस</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation3" data-toggle="tab"><i class="fas fa-file"></i> मतदाता आईडी</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation4" data-toggle="tab"><i class="fas fa-file"></i> स्कूल आईडी</a>
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
																			<label>यहां अपना आधार संख्या दर्ज करें:-</label>
																			<input type="text" name="Aadhaar_no" placeholder="" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>यहाँ अपलोड करें</label>
																			<input type="file" id="upload_file_aadhar" name="upload_file_aadhar" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera1"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>या</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam1();">वेबकैम से छवि लें</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot1();" id="snap1">स्नैपशॉट लें</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="submit_aadhar" class="btn btn-primary btn-xl">जमा करें</button>
																		</div>
																	</div>
																</form>
															</div>
															<div class="tab-pane tab-pane-navigation" id="tabsNavigation2">
																<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>यहां अपना ड्राइविंग लाइसेंस नंबर दर्ज करें:-</label>
																			<input type="text" name="dl_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>यहां ड्राइविंग लाइसेंस लोड करें</label>
																			<input type="file" id="upload_file_dl" name="upload_file_dl" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera2"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>या</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam2();">वेबकैम से छवि लें</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot2();" id="snap2">स्नैपशॉट लें</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="submit_dl" class="btn btn-primary btn-xl">जमा करें</button>
																		</div>
																	</div>
																</form>
															</div>
															<div class="tab-pane tab-pane-navigation" id="tabsNavigation3">
																<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>यहां अपना मतदाता आईडी दर्ज करें:-</label>
																			<input type="text" name="vid_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>यहां अपना मतदाता_आईडी दर्ज करें</label>
																			<input type="file" id="upload_file_vid" name="upload_file_vid" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera3"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>या</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam3();">वेबकैम से छवि लें</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot3();" id="snap3">स्नैपशॉट लें</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="upload_voter_id" class="btn btn-primary btn-xl">जमा करें</button>
																		</div>
																	</div>
																</form>
															</div>
															<div class="tab-pane tab-pane-navigation" id="tabsNavigation4">
																<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>यहां अपना स्कूल आईडी दर्ज करें।:-</label>
																			<input type="text" name="school_id_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>यहां अपना स्कूल आईडी दर्ज करें।</label>
																			<input type="file" id="upload_file_sid" name="upload_file_sid" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera4"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>या</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam4();">वेबकैम से छवि लें</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot4();" id="snap3">स्नैपशॉट लें</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="upload_school_id" class="btn btn-primary btn-xl">जमा करें</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php } else if($lang=='mt') { ?>
											<h4 class="mb-4">फोटो आयडी पुरावे</h4>
											<div class="row">
												<div class="col-lg-4">
													<div class="tabs tabs-vertical tabs-left tabs-navigation">
														<ul class="nav nav-tabs col-sm-3">
															<li class="nav-item active">
																<a class="nav-link show active" href="#tabsNavigation1" data-toggle="tab"><i class="fas fa-users"></i>आधार</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation2" data-toggle="tab"><i class="fas fa-file"></i> चालक परवाना</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation3" data-toggle="tab"><i class="fas fa-file"></i> मतदार आयडी</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation4" data-toggle="tab"><i class="fas fa-file"></i>
																शाळा आयडी</a>
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
																			<label>आपला Aadhar क्रमांक येथे प्रविष्ट करा:-</label>
																			<input type="text" name="Aadhaar_no" placeholder="आपला आधार क्रमांक येथे प्रविष्ट करा." class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																			आधार येथे अपलोड करा</label>
																			<input type="file" id="upload_file_aadhar" name="upload_file_aadhar" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera1"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>किंवा</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam1();">उघडा वेबकॅम</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot1();" id="snap1">
																			स्नॅपशॉट घ्या</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="submit_aadhar" class="btn btn-primary btn-xl">सबमिट करा</button>
																		</div>
																	</div>
																</form>
															</div>
															<div class="tab-pane tab-pane-navigation" id="tabsNavigation2">
																<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>येथे आपला वाहनचालक परवाना क्रमांक प्रविष्ट करा:-</label>
																			<input type="text" name="dl_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>वाहन चालविण्याचा परवाना अपलोड करा</label>
																			<input type="file" id="upload_file_dl" name="upload_file_dl" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera2"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>किंवा</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam2();">
																			उघडा वेबकॅम</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot2();" id="snap2">
																			स्नॅपशॉट घ्या</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="submit_dl" class="btn btn-primary btn-xl">सबमिट करा</button>
																		</div>
																	</div>
																</form>
															</div>
															<div class="tab-pane tab-pane-navigation" id="tabsNavigation3">
																<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>येथे आपला voter_id प्रविष्ट करा:-</label>
																			<input type="text" name="vid_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>
																			येथे मतदाता वय अपलोड करा</label>
																			<input type="file" id="upload_file_vid" name="upload_file_vid" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera3"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>किंवा</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam3();">उघडा वेबकॅम</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot3();" id="snap3">स्नॅपशॉट घ्या</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="upload_voter_id" class="btn btn-primary btn-xl">सबमिट करा</button>
																		</div>
																	</div>
																</form>
															</div>
															<div class="tab-pane tab-pane-navigation" id="tabsNavigation4">
																<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
																	<div class="form-row">
																		<div class="form-group col">
																			<label>आपला शाळा आयडी येथे प्रविष्ट करा.:-</label>
																			<input type="text" name="school_id_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>शाळा ID अपलोड करा येथे</label>
																			<input type="file" id="upload_file_sid" name="upload_file_sid" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera4"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<label>किंवा</label>
																			<button type="button" class="btn btn-primary btn-sm" onclick="opencam4();">उघडा वेबकॅम</button>
																			<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot4();" id="snap3">स्नॅपशॉट घ्या</button>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<button type="submit" name="upload_school_id" class="btn btn-primary btn-xl">सबमिट करा</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php } else if($lang=='tl') { ?>
											<h4 class="mb-4">ఫోటో ID ప్రూఫ్లు</h4>
											
											<div class="row">
												<div class="col-lg-4">
													<div class="tabs tabs-vertical tabs-left tabs-navigation">
														<ul class="nav nav-tabs col-sm-3">
															<li class="nav-item active">
																<a class="nav-link show active" href="#tabsNavigation1" data-toggle="tab"><i class="fas fa-users"></i>ఆధార్</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation2" data-toggle="tab"><i class="fas fa-file"></i> వాహనం నడపడానికి </a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation3" data-toggle="tab"><i class="fas fa-file"></i> ఓటరు ID</a>
															</li>
															<li class="nav-item">
																<a class="nav-link" href="#tabsNavigation4" data-toggle="tab"><i class="fas fa-file"></i> పాఠశాల ID</a>
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
																	<label>ఇక్కడ మీ ఆధార్ నంబర్ నమోదు చేయండి:-</label>
																	<input type="text" name="Aadhaar_no" placeholder="ఇక్కడ మీ ఆధార్ నంబర్ నమోదు చేయండి." class="form-control form-control-md" required="">
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>ఇక్కడ అధర్ ను అప్లోడ్ చేయండి</label>
																	<input type="file" id="upload_file_aadhar" name="upload_file_aadhar" class="form-control">
																</div>
																<div class="form-group col">
																	<div id="my_camera1"></div>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>Or</label>
																	<button type="button" class="btn btn-primary btn-sm" onclick="opencam1();">వెబ్కామ్ను తెరవండి</button>
																	<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot1();" id="snap1">స్నాప్షాట్ తీసుకోండి</button>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<button type="submit" name="submit_aadhar" class="btn btn-primary btn-xl">సమర్పించండి</button>
																</div>
															</div>
														</form>
													</div>
													<div class="tab-pane tab-pane-navigation" id="tabsNavigation2">
														<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
															<div class="form-row">
																<div class="form-group col">
																	<label>ఇక్కడ మీ డ్రైవింగ్ లైసెన్స్ సంఖ్యను నమోదు చేయండి:-</label>
																	<input type="text" name="dl_no" class="form-control form-control-md" required="">
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>అప్లోడ్ డ్రైవింగ్ లైసెన్స్ ఇక్కడ</label>
																	<input type="file" id="upload_file_dl" name="upload_file_dl" class="form-control">
																</div>
																<div class="form-group col">
																	<div id="my_camera2"></div>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>Or</label>
																	<button type="button" class="btn btn-primary btn-sm" onclick="opencam2();">వెబ్కామ్ను తెరవండి</button>
																	<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot2();" id="snap2">స్నాప్షాట్ తీసుకోండి</button>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<button type="submit" name="submit_dl" class="btn btn-primary btn-xl">సమర్పించండి</button>
																</div>
															</div>
														</form>
													</div>
													<div class="tab-pane tab-pane-navigation" id="tabsNavigation3">
														<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
															<div class="form-row">
																<div class="form-group col">
																	<label>ఇక్కడ మీ voter_id ను నమోదు చేయండి:-</label>
																	<input type="text" name="vid_no" class="form-control form-control-md" required="">
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>ఇక్కడ ఓటరు ఐడిని అప్లోడ్ చేయండి</label>
																	<input type="file" id="upload_file_vid" name="upload_file_vid" class="form-control">
																</div>
																<div class="form-group col">
																	<div id="my_camera3"></div>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>Or</label>
																	<button type="button" class="btn btn-primary btn-sm" onclick="opencam3();">వెబ్కామ్ను తెరవండి</button>
																	<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot3();" id="snap3">స్నాప్షాట్ తీసుకోండి</button>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<button type="submit" name="upload_voter_id" class="btn btn-primary btn-xl">సమర్పించండి</button>
																</div>
															</div>
														</form>
													</div>
													<div class="tab-pane tab-pane-navigation" id="tabsNavigation4">
														<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
															<div class="form-row">
																<div class="form-group col">
																	<label>ఇక్కడ మీ పాఠశాల ID ని నమోదు చేయండి-</label>
																	<input type="text" name="school_id_no" class="form-control form-control-md" required="">
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>పాఠశాల ID ని ఇక్కడ అప్లోడ్ చేయండి</label>
																	<input type="file" id="upload_file_sid" name="upload_file_sid" class="form-control">
																</div>
																<div class="form-group col">
																	<div id="my_camera4"></div>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>లేదా</label>
																	<button type="button" class="btn btn-primary btn-sm" onclick="opencam4();">వెబ్కామ్ను తెరవండి</button>
																	<button type="button" class="btn btn-primary btn-sm" onclick="take_snapshot4();" id="snap3">స్నాప్షాట్ తీసుకోండి</button>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<button type="submit" name="upload_school_id" class="btn btn-primary btn-xl">సమర్పించండి</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
											<?php } else { ?>
											<h4 class="mb-4">Photo ID Proofs</h4>
											<div class="row">
												<div class="col-lg-4">
													<div class="tabs tabs-vertical tabs-left tabs-navigation">
														<ul class="nav nav-tabs col-sm-3">
															<li class="nav-item active">
																<a class="nav-link show active" href="#tabsNavigation1" data-toggle="tab"><i class="fas fa-users"></i>Aaadhar</a>
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
																	
																	<div class="form-group row">
																		<p>Enter your Aaadhar Number Here:-</p>
																		<input type="text" name="Aadhaar_no" placeholder="Enter your aadhar number here." class="form-control form-control-md" required="">
																		
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<p>Upload Aadhar Here</p>
																			<input type="file" id="upload_file_aadhar" name="upload_file_aadhar" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera1"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<p>Or</p>
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
																			<p>Enter your Driving license number here:-</p>
																			<input type="text" name="dl_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<p>Upload Driving license Here</p>
																			<input type="file" id="upload_file_dl" name="upload_file_dl" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera2"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<p>Or</p>
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
																			<p>Enter your voter_id here:-</p>
																			<input type="text" name="vid_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<p>Upload voter_id Here</p>
																			<input type="file" id="upload_file_vid" name="upload_file_vid" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera3"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<p>Or</p>
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
																			<p>Enter your School ID here.:-</p>
																			<input type="text" name="school_id_no" class="form-control form-control-md" required="">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<p>Upload school ID Here</p>
																			<input type="file" id="upload_file_sid" name="upload_file_sid" class="form-control">
																		</div>
																		<div class="form-group col">
																			<div id="my_camera4"></div>
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col">
																			<p>Or</p>
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
											<?php }	?>
											
										</div>
									</div>
									<div class="tab-pane" id="tabsNavigationSimpleIcons4">
										<div class="text-center">
											<?php if($lang=='hn') { ?>
											<h4>अपनी खरीददारी की समीक्षा करें।</h4>
											<table class="table table-bordered table-hover" id="rev_tab">
												<tbody>
													<?php
													$qry2 = mysqli_query($link, "SELECT * FROM tbl_sessions_rating WHERE student_id=$user_id ");
													$j = 1;
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
																			echo "<td>". $tutor_name ." के साथ सत्र।</td>";
																			echo "<td>वर्तमान रेटिंग<span> ". $userfetch_data['rating'] ."</td>";
																			echo "<td><a href='rate_session.php?tutor_id=$tut_id&room_name=$room&session=$id_session&date=$time' class='btn btn-primary btn-sm'>मूल्यांकन करें</a><span></td>";
													echo '</tr>';
													$j++;
													}
													?>
												</tbody>
											</table>
											<?php } else if($lang=='mt') { ?>
											<h4>तुमची खरेदी तपासून पहा</h4>
											<table class="table table-bordered table-hover">
												<tbody>
													<?php
													$qry2 = mysqli_query($link, "SELECT * FROM tbl_sessions_rating WHERE student_id=$user_id ");
													$j = 1;
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
																			echo "<td>सत्र सह ". $tutor_name ."</td>";
																			echo "<td>वर्तमान रेटिंग<span> ". $userfetch_data['rating'] ."</td>";
																			echo "<td><a href='rate_session.php?tutor_id=$tut_id&room_name=$room&session=$id_session&date=$time' class='btn btn-primary btn-sm'>दर</a><span></td>";
													echo '</tr>';
													$j++;
													}
													?>
												</tbody>
											</table>
											<?php } else if($lang=='tl') { ?>
											<h4>మిరు కొన్న వస్తువులు సరిచూసుకొండి</h4>
											<table class="table table-bordered table-hover">
												<tbody>
													<?php
													$qry2 = mysqli_query($link, "SELECT * FROM tbl_sessions_rating WHERE student_id=$user_id ");
													$j = 1;
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
																		echo "<td>సెషన్ తో ". $tutor_name ."</td>";
																		echo "<td>
															ప్రస్తుత రేటింగ్లు<span> ". $userfetch_data['rating'] ."</td>";
																		echo "<td><a href='rate_session.php?tutor_id=$tut_id&room_name=$room&session=$id_session&date=$time' class='btn btn-primary btn-sm'>రేటు</a><span></td>";
													echo '</tr>';
													$j++;
													}
													?>
												</tbody>
											</table>
											<?php } else { ?>
											<h4>Review Your Purchases</h4>
											<table class="table table-bordered table-hover" id="rev_tab">
												<tbody>
													<?php
													$qry2 = mysqli_query($link, "SELECT * FROM tbl_sessions_rating WHERE student_id=$user_id ");
													$j = 1;
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
													}
													?>
												</tbody>
											</table>
											
											<?php }	?>
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
		<?php include("footer_files.php"); ?>
		<script src="js/webcam.js"></script>
		<script>
		$("#snap1, #snap2, #snap3, #snap4").hide();
		function opencam1() {
		$("#snap1").show();
		Webcam.set({
		width: 250,
		height: 200,
		image_format: 'jpeg',
		jpeg_quality: 90
		});
		Webcam.attach( '#my_camera1' );
		}
		function take_snapshot1() {
		Webcam.snap( function(data_uri) {
		document.getElementById('my_camera1').innerHTML =
		'<h5>Processing:</h5>';
		Webcam.upload( data_uri, 'saveimage.php', function(code, text) {
		document.getElementById('my_camera1').innerHTML =
		'<img src="'+data_uri+'"/>';
		} );
		Webcam.reset();
		} );
		}
		function opencam2() {
		$("#snap2").show();
		Webcam.set({
		width: 250,
		height: 200,
		image_format: 'jpeg',
		jpeg_quality: 90
		});
		Webcam.attach( '#my_camera2' );
		}
		function take_snapshot2() {
		Webcam.snap( function(data_uri) {
		document.getElementById('results2').innerHTML =
		'<h5>Processing:</h5>';
		Webcam.snap( function(data_uri) {
		document.getElementById('results2').innerHTML =
		'<img src="'+data_uri+'"/>';
		} );
		Webcam.reset();
		} );
		}
		function opencam3() {
		$("#snap3").show();
		Webcam.set({
		width: 200,
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
		Webcam.snap( function(data_uri) {
		document.getElementById('results3').innerHTML =
		'<img src="'+data_uri+'"/>';
		} );
		} );
		}
		function opencam4() {
		$("#snap4").show();
		Webcam.set({
		width: 200,
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
		Webcam.snap( function(data_uri) {
		document.getElementById('results4').innerHTML =
		'<img src="'+data_uri+'"/>';
		} );
		} );
		}
		</script>
	</body>
</html>