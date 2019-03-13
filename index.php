<?php
error_reporting(0);
session_start();
$lang = $_GET['lang'];
if($lang=='hn') { 
if(isset($_SESSION['userid']))
{
header('Location: home.php?lang=hn');
exit();
}
if(isset($_SESSION['user_id']))
{
header('Location: tutor/home.php?lang=hn');
exit();
}
if(isset($_SESSION['class_id']))
{
header('Location: class/home.php?lang=hn');
exit();
}									
} else if($lang=='mt') { 
if(isset($_SESSION['userid']))
{
header('Location: home.php?lang=mt');
exit();
}
if(isset($_SESSION['user_id']))
{
header('Location: tutor/home.php?lang=mt');
exit();
}
if(isset($_SESSION['class_id']))
{
header('Location: class/home.php?lang=mt');
exit();
}									
} else if($lang=='tl') { 
if(isset($_SESSION['userid']))
{
header('Location: home.php?lang=tl');
exit();
}
if(isset($_SESSION['user_id']))
{
header('Location: tutor/home.php?lang=tl');
exit();
}
if(isset($_SESSION['class_id']))
{
header('Location: class/home.php?lang=tl');
exit();
}									
} else {
if(isset($_SESSION['userid']))
{
header('Location: home.php?lang=eng');
exit();
}
if(isset($_SESSION['user_id']))
{
header('Location: tutor/home.php?lang=eng');
exit();
}
if(isset($_SESSION['class_id']))
{
header('Location: class/home.php?lang=eng');
exit();
}									
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php"); ?>
	</head>
	<body>
		<div class="body">
			<?php include("menu.php");
			if($lang=='hn') { ?>
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
								data-transform_in="y:[-300%];opacity:0;s:500;">इंटलीजेंट ट्यूटोरिंग सिस्‍टम </div>
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
								data-mask_in="x:0px;y:0px;">ऑनलाइन ट्यूशन सत्र?</div>
								<div class="tp-caption bottom-label"
									data-x="['185','185','center','center']"
									data-y="['280','280','280','315']"
									data-start="2000"
									data-fontsize="['20','20','20','30']"
								data-transform_in="y:[100%];opacity:0;s:500;">जारी रखने के लिए लॉगिन करें.</div>
								
							</li>
							<li data-transition="fade">
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
								data-transform_out="opacity:0;s:500;">आइटीएस में आपका स्‍वागत है </div>
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
									data-elementdelay="0.05">
								ऑनलइन ट्यूशन सत्र</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="home-intro" id="home-intro">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-8">
								<p>
									ऑनलाइन ट्यूशन सिस्टम <em>
									ट्यूशन</em>
									<span>
									हमारी सेवाओं का लाभ उठाने के लिए लॉग इन करें.</span>
								</p>
							</div>
							<div class="col-lg-4">
								<div class="get-started text-left text-lg-right">
									<a href="role.php" class="btn btn-lg btn-primary">अभी पंजीकरण करें</a>
								</div>
							</div>
						</div>
					</div>
				</div>
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
										<h4 class="mb-1">मानसिक क्षमता परीक्षण</h4>
										<p>मानसिक क्षमता परीक्षण खेल</p>
										<p><a class="btn-flat btn-xs" href="neuro_assessment.php">और देखो <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-07.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">विद्यालय प्रदर्शन</h4>
										<p>स्कूल से अपनी प्रदर्शन आँकड़े प्राप्त करें</p>
										<p><a class="btn-flat btn-xs" href="performance.php">अपना प्रदर्शन देखें <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-08.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">अपने शिक्षक को ढूंढो</h4>
										<p>
										ट्यूटर बाज़ार से अपने शिक्षक को खोजें</p>
										<p><a class="btn-flat btn-xs" href="tutors.php">यहां खोजें <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="Session.php">यहाँ से प्रारंभ करें <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/its web-10.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">जुडिये</h4>
										<p>अपने मित्रों को बताएं .</p>
										<p><a class="btn-flat btn-xs" href="share.php">शेयर  <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="calender.php">और देखो <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
			</div>
			<?php	} else if($lang=='mt') { ?>
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
								data-transform_in="y:[-300%];opacity:0;s:500;">बुद्धिमान ट्यूशन सिस्टम</div>
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
								data-mask_in="x:0px;y:0px;">ऑनलाईन शिकवणीसत्र?</div>
								<div class="tp-caption bottom-label"
									data-x="['185','185','center','center']"
									data-y="['280','280','280','315']"
									data-start="2000"
									data-fontsize="['20','20','20','30']"
								data-transform_in="y:[100%];opacity:0;s:500;">सुरू ठेवण्यासाठी लॉगिन करा.</div>
								
							</li>
							<li data-transition="fade">
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
								data-transform_out="opacity:0;s:500;">आपले स्वागत आहे</div>
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
								data-elementdelay="0.05">ऑनलाईन शिकवणीसत्र</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="home-intro" id="home-intro">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-8">
								<p>
									
									ऑनलाइन ट्युटोरिंग सिस्टम<em>
									शिकवणी</em>
									<span>
									आमच्या सेवा प्राप्त करण्यासाठी लॉगिन करा.</span>
								</p>
							</div>
							<div class="col-lg-4">
								<div class="get-started text-left text-lg-right">
									<a href="role.php" class="btn btn-lg btn-primary">
									अाता नोंदणी करा</a>
								</div>
							</div>
						</div>
					</div>
				</div>
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
										<p><a class="btn-flat btn-xs" href="neuro_assessment.php">अधिक पहा<i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="performance.php">
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
										<p><a class="btn-flat btn-xs" href="tutors.php">येथे शोधा <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="Session.php">इथून सुरुवात <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="share.php">सामायिक करा  <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="calender.php">अधिक पहा <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>		
			</div>
			<?php	} else if($lang=='tl') { ?>
			<div role="main" class="main">				<div class="slider-container rev_slider_wrapper">
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
								data-transform_in="y:[-300%];opacity:0;s:500;">ఇంటెలిజెంట్ ట్యుటరింగ్ సిస్టమ్</div>
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
								ఆన్లైన్ శిక్షణా సెషన్ ?</div>
								<div class="tp-caption bottom-label"
									data-x="['185','185','center','center']"
									data-y="['280','280','280','315']"
									data-start="2000"
									data-fontsize="['20','20','20','30']"
									data-transform_in="y:[100%];opacity:0;s:500;">
								కొనసాగించడానికి లాగిన్ చేయండి.</div>
								
							</li>
							<li data-transition="fade">
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
									data-transform_out="opacity:0;s:500;">
								దాని స్వాగతం</div>
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
								data-elementdelay="0.05">ఆన్లైన్ శిక్షణా సెషన్</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="home-intro" id="home-intro">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-8">
								<p>
									
									ఆన్లైన్ శిక్షణా వ్యవస్థ
									<em>
									ట్యుటోరింగ్</em>
									<span>
									మా సేవలను పొందడానికి లాగిన్ అవ్వండి.</span>
								</p>
							</div>
							<div class="col-lg-4">
								<div class="get-started text-left text-lg-right">
									<a href="role.php" class="btn btn-lg btn-primary">ఇప్పుడు నమోదు చేసుకోండి</a>
								</div>
							</div>
						</div>
					</div>
				</div>
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
										<p><a class="btn-flat btn-xs" href="neuro_assessment.php">
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
										<p><a class="btn-flat btn-xs" href="performance.php">మీ పనితీరును వీక్షించండి <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="tutors.php">కనుగొనండి <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="Session.php">ఇక్కడ ప్రారంభించండి <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="share.php">
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
										<p><a class="btn-flat btn-xs" href="calender.php">
										మరిన్ని చూడండి <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
			</div>
			<?php } else { ?>		
			<div role="main" class="main">				<div class="slider-container rev_slider_wrapper">
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
								data-transform_in="y:[-300%];opacity:0;s:500;">Intelligent Tutoring System</div>
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
								data-mask_in="x:0px;y:0px;">Online Tutoring Session</div>
								<div class="tp-caption bottom-label"
									data-x="['185','185','center','center']"
									data-y="['280','280','280','315']"
									data-start="2000"
									data-fontsize="['20','20','20','30']"
								data-transform_in="y:[100%];opacity:0;s:500;">Login to continue.</div>
								
							</li>
							<li data-transition="fade">
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
							</li>
						</ul>
					</div>
				</div>
				<div class="home-intro" id="home-intro">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-8">
								<p>
									Online Tutoring System <em>Tutoring</em>
									<span>Login to Avail our Services.</span>
								</p>
							</div>
							<div class="col-lg-4">
								<div class="get-started text-left text-lg-right">
									<a href="role.php" class="btn btn-lg btn-primary">Register Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
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
										<p><a class="btn-flat btn-xs" href="neuro_assessment.php">View More <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="performance.php">View Your Performance <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="tutors.php">Find Here <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="Session.php">Start here <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="share.php">Share  <i class="fas fa-arrow-right"></i></a></p>
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
										<p><a class="btn-flat btn-xs" href="calender.php">View More <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
			</div>
		</div>
		<?php } ?>
		<?php include("footer.php"); ?>
	</div>
	<!-- Vendor -->
	<?php include("footer_files.php"); ?>
</body>
</html>