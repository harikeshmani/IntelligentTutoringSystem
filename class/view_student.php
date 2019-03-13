<?php
include("auth.php");
$tutor_id = $_SESSION['user_id'];
$student_id = base64_decode( urldecode($_GET['id']));
$result = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = '$student_id'"));
///////////code for attention game score////
$resss = "SELECT * FROM tbl_attention WHERE user_id = '$student_id' ";
$usss=mysqli_query($link, $resss);
$usc= mysqli_num_rows($usss);
if($usc == 0) {
$finalresult_attention = '0';
} else {
$ressss = "SELECT SUM(score) FROM tbl_attention WHERE user_id = '$student_id' ";
$ussss=mysqli_query($link, $ressss);
while( $userfetch_datass = mysqli_fetch_array($ussss)){
$mark=$userfetch_datass['SUM(score)'];
}
$finalresult=($mark/$usc)*100;
$midval = $finalresult/10;
$finalresult_attention = round($midval,1);
}
///////////////code for working memory///
$dataquery=mysqli_query($link, "SELECT * FROM tbl_working_memory WHERE user_id = '$student_id' ");
$total = mysqli_num_rows($dataquery);
if($total == 0) {
$finalresult_working = '0';
} else {
$usdata=mysqli_query($link, "SELECT SUM(score) FROM tbl_working_memory WHERE user_id = '$student_id'");
while( $userfetch_datass = mysqli_fetch_array($usdata)){
$mark=$userfetch_datass['SUM(score)'];
}
$finalresult=($mark/$total)*100;
$midval = $finalresult/10;
$finalresult_working = round($midval,1);
}
////////////////code for emotional intelligence////
$total = "319";
$mot_tota = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tbl_intelligence WHERE user_id = '$user_id'"));
if($mot_tota == 0) {
$finalresult_emotional = '0';
} else {
$score = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_intelligence WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1"));
$self_score = $score['self_awareness_score'];
$self2_score = $score['self_regulation_score'];
$motivation_score = $score['motivation_score'];
$empathy_score = $score['empathy_score'];
$social_skills = $score['social_skill_score'];
$user_score = $score['overall_score'];
$midval = ($user_score/$total)*100;
$midvals = $midval/10;
$finalresult_emotional = round($midvals,1);
}
////code for linguistic game score////
$totalmarks = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tbl_linguistic WHERE user_id = '$user_id' "));
if($totalmarks == 0) {
$finalresult_linguistic = '0';
} else {
$resval=mysqli_query($link, "SELECT SUM(score) FROM tbl_linguistic WHERE user_id = '$user_id' ");
while( $data = mysqli_fetch_array($resval)){
$mark_linguistic=$data['SUM(score)'];
}
$midvals = (($mark_linguistic/$totalmarks)*100)/100;
$finalresult_linguistic = round($midvals,1);
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
								<h1>Your Students</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="row">
								<div class="col-md-4">
									<span class="img-thumbnail d-block">
										<img src="<?php echo "../api/user_image/".$result['pic']; ?>" class="img-fluid appear-animation animated pulse appear-animation-visible" data-appear-animation="pulse" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;" alt="profile image">
									</span>
								</div>
								<div class="col-md-8">
									<h2 class="mb-0"> <strong><?php echo $result['username'] ?></strong></h2>
									<h4 class="heading-primary"><?php echo $result['school'] ?></h4>
									<hr class="solid">
									<div class="accordion accordion-primary" id="accordion2Primary">
										<div class="card card-default">
											<div class="card-header">
												<h4 class="card-title m-0">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2Primary" href="#collapse2PrimaryOne">
													Personal Information
												</a>
												</h4>
											</div>
											<div id="collapse2PrimaryOne" class="collapse show">
												<div class="card-body">
													<p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
												</div>
											</div>
										</div>
										<div class="card card-default">
											<div class="card-header">
												<h4 class="card-title m-0">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2Primary" href="#collapse2PrimaryTwo">
													Accordion Title 2
												</a>
												</h4>
											</div>
											<div id="collapse2PrimaryTwo" class="collapse">
												<div class="card-body">
													<p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
												</div>
											</div>
										</div>
										<div class="card card-default">
											<div class="card-header">
												<h4 class="card-title m-0">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2Primary" href="#collapse2PrimaryThree">
													Accordion Title 3
												</a>
												</h4>
											</div>
											<div id="collapse2PrimaryThree" class="collapse">
												<div class="card-body">
													<p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
												</div>
											</div>
										</div>
									</div>
									<h4>Details</h4>
									<div class="form-group">
										<label>Name:</label>
										<div class="col-md-4">
											<input type="text" value="<?php echo $result['username'] ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">School:</label>
										<div class="col-md-4">
											<input type="text" value="<?php echo $result['school'] ?>" readonly>
										</div>
										
										<label class="col-md-2 control-label">Class:</label>
										<div class="col-md-4">
											<input type="text" value="<?php echo $result['class']  ?>" readonly>
										</div>
										
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">E-mail:</label>
										<div class="col-md-4">
											<input type="text" value="<?php echo $result['email'] ?>" readonly>
										</div>
										<label class="col-md-2 control-label">facebook:</label>
										<div class="col-md-4">
											<input type="text" value="<?php echo $result['facebook_link'] ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">twitter:</label>
										<div class="col-md-4">
											<input type="text" value="<?php echo$result['twitter_link'] ?>" readonly>
										</div>
										
										<label class="col-md-2 control-label">Instagram:</label>
										<div class="col-md-4">
											<input type="text" value="<?php echo $result['instagram_link'] ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Address:</label>
										<div class="col-md-10">
											<input type="text" value="<?php echo $result['address'] ?><?php echo $result['street'] ?><?php echo $result['locality'] ?>, <?php echo $result['city'] ?>  <?php echo $result['state'] ?><?php echo $result['country'] ?> - <?php echo $result['post_code'] ?> " readonly>
											
										</div>
									</div>
									<div class="form-group heads">My favorite</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Subjects:</label>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['subject1'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['subject2'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['subject3'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['subject4'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['subject5'] ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">extraCurricular Activities:</label>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['extra_activities1'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['extra_activities2'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['extra_activities3'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['extra_activities4'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['extra_activities5'] ?>" readonly>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label">Sports:</label>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['sports1'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['sports2'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['sports3'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['sports4'] ?>" readonly>
										</div>
										<div class="col-md-2">
											<input type="text" value="<?php echo $result['sports5'] ?>" readonly>
										</div>
									</div>
									
									
									<div class="form-group heads">Score Assessment</div>
									<div class="form-group">
										<div class="col-md-2"></div>
										<div class="col-md-8" id="">
											<canvas id="attention"></canvas>
										</div>
										<div class="col-md-2"></div>
									</div>
									<div class="form-group">
										<div class="col-md-2"></div>
										<div class="col-md-8" id="">
											<canvas id="memory"></canvas>
										</div>
										<div class="col-md-2"></div>
									</div>
									<div class="form-group">
										<div class="col-md-2"></div>
										<div class="col-md-8" id="">
											<canvas id="emotional"></canvas>
										</div>
										<div class="col-md-2"></div>
									</div>
									<div class="form-group">
										<div class="col-md-2"></div>
										<div class="col-md-8" id="">
											<canvas id="linguistic"></canvas>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("footer.php") ?>
			
		</div>
		<!-- ../vendor -->
		<?php include("footer_files.php"); ?>
		<script>
		var linguisti_score = '<?php echo $finalresult_linguistic; ?>';
		var attention_score = '<?php echo $finalresult_attention; ?>';
		var working_score = '<?php echo $finalresult_working; ?>';
		var emotional_score = '<?php echo $finalresult_emotional; ?>'
		var ctx = document.getElementById("attention").getContext('2d');
		var attentionChart = new Chart(ctx, {
		type: 'bar',
		data: {
		labels: [""],
		datasets: [{
		label: "attention exercise scores",
		backgroundColor: '#40C6A4',
		borderColor: '#40C6A4',
		data: [attention_score],
		}]
		},
		options: {
		scales: {
		yAxes: [{
		ticks: {
		beginAtZero:true,
		max:10,
		}
		}]
		}
		}
		});
		var ctx_second = document.getElementById("memory").getContext('2d');
		var attentionChart = new Chart(ctx_second, {
		type: 'bar',
		data: {
		labels: [""],
		datasets: [{
		label: "memory exercise scores",
		backgroundColor: '#40C6A4',
		borderColor: '#40C6A4',
		data: [working_score],
		}]
		},
		options: {
		scales: {
		yAxes: [{
		ticks: {
		beginAtZero:true,
		max:10,
		}
		}]
		}
		}
		});
		var ctx_third = document.getElementById("emotional").getContext('2d');
		var attentionChart = new Chart(ctx_third, {
		type: 'bar',
		data: {
		labels: [""],
		datasets: [{
		label: "emotional intelligence exercise scores",
		backgroundColor: '#40C6A4',
		borderColor: '#40C6A4',
		data: [emotional_score],
		}]
		},
		options: {
		scales: {
		yAxes: [{
		ticks: {
		beginAtZero:true,
		max:10,
		}
		}]
		}
		}
		});
		var ctx_fourth = document.getElementById("linguistic").getContext('2d');
		var attentionChart = new Chart(ctx_fourth, {
		type: 'bar',
		data: {
		labels: [""],
		datasets: [{
		label: "linguistic exercise scores",
		backgroundColor: '#40C6A4',
		borderColor: '#40C6A4',
		data: [linguisti_score],
		}]
		},
		options: {
		scales: {
		yAxes: [{
		ticks: {
		beginAtZero:true,
		max:10,
		}
		}]
		}
		}
		});
		</script>
		
		
	</body>
</html>