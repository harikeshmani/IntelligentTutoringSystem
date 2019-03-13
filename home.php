<?php
session_start();
$lang = $_GET['lang'];
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php"); ?>
	</head>
	<body>
		<div class="body">
			<?php include("menu.php"); ?>
			<div role="main" class="main">
				<div class="slider-container rev_slider_wrapper">
					<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 500, 'responsiveLevels': [4096,1200,992,500]}">
						<ul>
							<li data-transition="fade">
								<img src="img/garvslider.jpg"
								alt=""
								data-bgposition="center center"
								data-bgfit="cover"
								data-bgrepeat="no-repeat"
								class="rev-slidebg">
								<div class="tp-caption"
									data-x="['177','177','center','center']" data-hoffset="['0','0','-150','-220']"
									data-y="180"
									data-start="1000"
								data-transform_in="x:[-300%];opacity:0;s:500;"><img src="img/slides/slide-title-border-light.png" alt=""></div>
								<div class="tp-caption top-label"
									data-x="['227','227','center','center']"
									data-y="172"
									data-fontsize="['24','24','24','36']"
									data-start="500"
									data-transform_in="y:[-300%];opacity:0;s:500;">
									<?php if($lang=='hn') { ?>
									इंटलीजेंट ट्यूटोरिंग सिस्‍टम
									<?php } else if($lang=='mt') { ?>
									इंटलीजेंट ट्यूटोरिंग सिस्‍टम
									<?php } else if($lang=='tl') { ?>
									స్వాగతం ఇత్స్
									<?php } else { ?>
									Welcome To ITS
									<?php     }	?>
								</div>
								<div class="tp-caption"
									data-x="['480','480','center','center']" data-hoffset="['0','0','150','220']"
									data-y="180"
									data-start="1000"
								data-transform_in="x:[300%];opacity:0;s:500;"><img src="img/slides/slide-title-border-light.png" alt=""></div>
								<div class="tp-caption main-label"
									data-x="['135','135','center','center']"
									data-y="['210','210','210','230']"
									data-start="1500"
									data-whitespace="nowrap"
									data-fontsize="['62','62','62','82']"
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									data-mask_in="x:0px;y:0px;">
									<?php if($lang=='hn') { ?>
									आइटीएस में आपका स्‍वागत है
									<?php } else if($lang=='mt') { ?>
									आयटीएसमध्ये आपले स्वागत आहे
									<?php } else if($lang=='tl') { ?>
									ఇంటెలిజెంట్ ట్యూటరింగ్ సిస్టం
									<?php } else { ?>
									Welcome to ITS
									<?php }	?>
								</div>
							</li>
							<!-- 	<li data-transition="fade">
									<img src="img/garvslider.jpg"
									alt=""
									data-bgposition="center center"
									data-bgfit="cover"
									data-bgrepeat="no-repeat"
									class="rev-slidebg">
									<div class="tp-caption featured-label"
															data-x="center"
															data-y="210"
															data-start="500"
															data-fontsize="['52','52','52','82']"
															style="z-index: 5"
															data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;">Welcome To ITS</div>
									<div class="tp-caption bottom-label"
															data-x="center"
															data-y="['270','270','270','290']"
															data-start="1000"
															data-fontsize="['23','23','23','38']"
															data-transform_idle="o:1;"
															data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:600;e:Power4.easeInOut;"
															data-transform_out="opacity:0;s:500;"
															data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
															data-splitin="chars"
															data-splitout="none"
															data-responsive_offset="on"
															style="font-size: 23px; line-height: 30px;"
									data-elementdelay="0.05">Online Tutoring Session</div>
							</li> -->
						</ul>
					</div>
				</div>
				<?php				
				if($lang=='hn') { ?>
				<section class="section m-0">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-center">
								<h2>हमारी <strong>सेवाएं</strong></h2>
							</div>
						</div>
						<div class="row text-center text-md-left mt-4">
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-06.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">बौद्धिक योग्यता परीक्षा </h4>
										<p>मानसिक क्षमता परीक्षण खेल</p>
										<p><a class="btn-flat btn-xs" href="neuro_assessment.php?lang=hn">और देखें <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-07.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">स्कूल में परफॉरमेंस </h4>
										<p>स्कूल से अपनी प्रदर्शन आँकड़े प्राप्त करें</p>
										<p><a class="btn-flat btn-xs" href="performance.php?lang=hn">अपना प्रदर्शन देखें <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-08.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">अपने टीचर देखें </h4>
										<p>ट्यूटर बाज़ार से अपने शिक्षक को खोजें</p>
										<p><a class="btn-flat btn-xs" href="tutors.php?lang=hn">यहां खोजें <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row text-center text-md-left mt-4">
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-09.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">सत्र शुरू करें</h4>
										<p>अनुसूचित के साथ अपना सत्र शुरू करें</p>
										<p><a class="btn-flat btn-xs" href="Session.php?lang=hn">यहाँ से प्रारंभ करें <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-10.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">कनेक्ट करें </h4>
										<p>अपने मित्रों को बताएं </p>
										<p><a class="btn-flat btn-xs" href="share.php?lang=hn">शेयर  <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-11.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">कैलेंडर</h4>
										<p>अपना कैलेंडर देखें।</p>
										<p><a class="btn-flat btn-xs" href="calender.php?lang=hn">और देखें <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php } else if($lang=='mt') { ?>
				<section class="section m-0">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-center">
								<h2>आमचे <strong>सेवा</strong></h2>
							</div>
						</div>
						<div class="row text-center text-md-left mt-4">
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-06.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">
										मानसिक क्षमता चाचणी</h4>
										<p>मानसिक क्षमता परीक्षण खेळ</p>
										<p><a class="btn-flat btn-xs" href="neuro_assessment.php?lang=mt">अधिक पहा<i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-07.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">शाळा कामगिरी</h4>
										<p>शाळा पासून आपले कार्यप्रदर्शन आकडेवारी मिळवा</p>
										<p><a class="btn-flat btn-xs" href="performance.php?lang=mt">
										आपले कार्यप्रदर्शन पहा <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-08.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">
										आपले शिक्षक शोधा</h4>
										<p>
										ट्यूशन मार्केटप्लेसवरून आपल्या शिक्षक शोधा</p>
										<p><a class="btn-flat btn-xs" href="tutors.php?lang=mt">येथे शोधा <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row text-center text-md-left mt-4">
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-09.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">एक सत्र प्रारंभ</h4>
										<p>
											अनुसूचित सह आपले सत्र सुरू करा
										</p>
										<p><a class="btn-flat btn-xs" href="Session.php?lang=mt">इथून सुरुवात <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-10.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">कनेक्ट करा</h4>
										<p>आपल्या मित्रांना कळवा आपल्या मित्रांना.</p>
										<p><a class="btn-flat btn-xs" href="share.php?lang=mt">सामायिक करा  <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-11.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">
										दिनदर्शिका</h4>
										<p>आपले कॅलेंडर पहा.</p>
										<p><a class="btn-flat btn-xs" href="calender.php?lang=mt">अधिक पहा <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php } else if($lang=='tl') { ?>
				<section class="section m-0">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-center">
								<h2>మా <strong>సేవలు</strong></h2>
							</div>
						</div>
						<div class="row text-center text-md-left mt-4">
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-06.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">
										మెంటల్ ఎబిలిటీ టెస్ట్</h4>
										<p>మెంటల్ ఎబిలిటీ టెస్ట్ గేమ్స్</p>
										<p><a class="btn-flat btn-xs" href="neuro_assessment.php?lang=tl">
										మరిన్ని చూడండి <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-07.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">
										స్కూల్ పెర్ఫార్మెన్స్</h4>
										<p>స్కూల్ నుండి మీ పనితీరు గణాంకాలు పొందండి</p>
										<p><a class="btn-flat btn-xs" href="performance.php?lang=tl">మీ పనితీరును వీక్షించండి <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-08.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">
										మీ గురువుని కనుగొనండి</h4>
										<p>
										ట్యూటర్ మార్కెట్ మార్కెట్ నుండి మీ గురువుని కనుగొనండి</p>
										<p><a class="btn-flat btn-xs" href="tutors.php?lang=tl">కనుగొనండి <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row text-center text-md-left mt-4">
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-09.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">
										ఒక సెషన్ను ప్రారంభించండి</h4>
										<p>
										షెడ్యూల్డ్తో మీ సెషన్ను ప్రారంభించండి</p>
										<p><a class="btn-flat btn-xs" href="Session.php?lang=tl">ఇక్కడ ప్రారంభించండి <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-10.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">
										కనెక్ట్</h4>
										<p>
										మీ ఫ్రిండ్ మాకు తెలుసు</p>
										<p><a class="btn-flat btn-xs" href="share.php?lang=tl">
										Share  <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-11.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">
										క్యాలెండర్</h4>
										<p>మీ క్యాలెండర్ను వీక్షించండి
										.</p>
										<p><a class="btn-flat btn-xs" href="calender.php?lang=tl">
										మరిన్ని చూడండి <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php } else { ?>
				
				<section class="section m-0">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-center">
								<h2>Our <strong>Services</strong></h2>
							</div>
						</div>
						<div class="row text-center text-md-left mt-4">
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-06.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Mental Ability Test</h4>
										<p>Mental Ability Test games</p>
										<p><a class="btn-flat btn-xs" href="neuro_assessment.php?lang=eng">View More <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-07.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">School Performance</h4>
										<p>Get Your Performance Stats from School</p>
										<p><a class="btn-flat btn-xs" href="performance.php?lang=eng">View Your Performance <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-08.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Find Your Teacher</h4>
										<p>Find Your Teacher From Tutor Marketplace</p>
										<p><a class="btn-flat btn-xs" href="tutors.php?lang=eng">Find Here <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row text-center text-md-left mt-4">
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-09.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Start A Session</h4>
										<p>Start Your Session with Scheduled </p>
										<p><a class="btn-flat btn-xs" href="Session.php?lang=eng">Start here <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-10.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Connect</h4>
										<p>Let Your freind Know Us.</p>
										<p><a class="btn-flat btn-xs" href="share.php?lang=eng">Share  <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-11.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Calender</h4>
										<p>View Your Calender.</p>
										<p><a class="btn-flat btn-xs" href="calender.php?lang=eng">View More <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php		}	?>
				
			</div>
		</div>
		<?php include("footer.php"); ?>
	</div>
	<!-- Vendor -->
	<?php include("footer_files.php") ?>
</body>
</html>