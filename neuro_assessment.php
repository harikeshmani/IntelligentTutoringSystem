<?php 
include ("auth.php"); ?>
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
					<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 350, 'responsiveLevels': [4096,1200,992,500]}">
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
								data-transform_in="y:[100%];opacity:0;s:500;">Neuro Assement Test</div>
								
							</li>

						</ul>
					</div>
				</div>
				<section class="section m-0">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-center">
								<h2>Our <strong>Games</strong></h2>
							</div>
						</div>
						<div class="row text-center text-md-left mt-4">
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/games corsi block.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Attention</h4>
										<p>Attention Test games</p>
										<p><a class="btn-flat btn-xs" href="attention_list.php">Start Game <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/games working memory.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Working Memory</h4>
										<p>Working Memory Games</p>
										<p><a class="btn-flat btn-xs" href="memory_list.php">Start Game <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/games emotional intelligence.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Emotional Intelligence</h4>
										<p>Emotional Intelligence Games</p>
										<p><a class="btn-flat btn-xs" href="intelligence_list.php">Start Game <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row text-center text-md-left mt-4">
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<img class="img-fluid mb-4" src="img/game linguistic-07.png" alt="">
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Linguistic</h4>
										<p>Linguistic Games</p>
										<p><a class="btn-flat btn-xs" href="linguistic_list.php">Play Game <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
                                       <i class="fas fa-shopping-cart fa-5x	"></i>
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Buy Training Exercise</h4>
										<p>Buy Training Exercise</p>
										<p><a class="btn-flat btn-xs" href="buy_exercise.php">Start Buying  <i class="fas fa-arrow-right"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-4">
										<i class="fas fa-comments fa-5x	"></i>
									</div>
									<div class="col-lg-8">
										<h4 class="mb-1">Review Scores</h4>
										<p>Review scores</p>
										<p><a class="btn-flat btn-xs" href="review_score.php">Review Here <i class="fas fa-arrow-right"></i></a></p>
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
	<?php include("footer_files.php") ?>
	</body>
</html>