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
					<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 300, 'responsiveLevels': [4096,1200,992,500]}">
						<ul>
							<li data-transition="fade">
								<img src="../img/garvslider.jpg"
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
								data-transform_out="opacity:0;s:500;">Mental Ability Test</div>
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
								data-elementdelay="0.05">NeuroAssement Test</div>
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
										<img class="img-fluid mb-4" src="../img/games corsi block.png" alt="">
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
										<img class="img-fluid mb-4" src="../img/games working memory.png" alt="">
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
										<img class="img-fluid mb-4" src="../img/games emotional intelligence.png" alt="">
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
										<img class="img-fluid mb-4" src="../img/game linguistic-07.png" alt="">
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
	<!-- ../vendor -->
	<?php include("footer_files.php"); ?>
</body>
</html>