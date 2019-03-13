<?php 
session_start(); 
print_r($_SESSION); ?>
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
								data-mask_in="x:0px;y:0px;">Online Tutoring Session?</div>
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
									<a href="login.php" class="btn btn-lg btn-primary">Register Now</a>
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
		<?php include("footer.php"); ?>

	</div>
	<!-- Vendor -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
	<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="vendor/jquery-cookie/jquery-cookie.min.js"></script>
	<script src="vendor/popper/umd/popper.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/common/common.min.js"></script>
	<script src="vendor/jquery.validation/jquery.validation.min.js"></script>
	<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
	<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
	<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
	<script src="vendor/isotope/jquery.isotope.min.js"></script>
	<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="vendor/vide/vide.min.js"></script>
	
	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>
	
	<!-- Current Page Vendor and Views -->
	<script src="vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	
	<!-- Theme Custom -->
	<script src="js/custom.js"></script>
	
	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>
	<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
		ga('create', 'UA-12345678-1', 'auto');
		ga('send', 'pageview');
	</script>
	-->
</body>
</html>