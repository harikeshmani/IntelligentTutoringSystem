<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
///////////code for attention game score////
$resss = "SELECT * FROM tbl_attention WHERE user_id = '$user_id' ";
$usss=mysqli_query($link, $resss);
$usc= mysqli_num_rows($usss);
if($usc == 0) {
$finalresult_attention = '0';
} else {
$ressss = "SELECT SUM(score) FROM tbl_attention WHERE user_id = '$user_id' ";
$ussss=mysqli_query($link, $ressss);
while( $userfetch_datass = mysqli_fetch_array($ussss)){
$mark=$userfetch_datass['SUM(score)'];
}
$finalresult=($mark/$usc)*100;
$midval = $finalresult/10;
$finalresult_attention = round($midval,1);
}
///////////////code for working memory///
$dataquery=mysqli_query($link, "SELECT * FROM tbl_working_memory WHERE user_id = '$user_id' ");
$total = mysqli_num_rows($dataquery);
if($total == 0) {
$finalresult_working = '0';
} else {
$usdata=mysqli_query($link, "SELECT SUM(score) FROM tbl_working_memory WHERE user_id = '$user_id'");
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
								<h1>Review Scores</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="featured-boxes">
								<div class="row">
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
												<h3 class="heading-primary text-uppercase mb-3">Attention Exercise Score</h3>
												<canvas id="attention" width="300" height="200"></canvas>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
												<h3 class="heading-primary text-uppercase mb-3">memory Exercise Score</h3>
												<canvas id="memory" width="300" height="200"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="featured-boxes">
								<div class="row">
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
												<h3 class="heading-primary text-uppercase mb-3">emotional Intelligence Score</h3>
												<canvas id="emotional" width="300" height="200"></canvas>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
												<h3 class="heading-primary text-uppercase mb-3">linguistic Assessment Score</h3>
												<canvas id="linguistic" width="300" height="200"></canvas>
											</div>
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
		var ctx = document.getElementById("memory").getContext('2d');
		var attentionChart = new Chart(ctx, {
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
		var ctx = document.getElementById("emotional").getContext('2d');
		var attentionChart = new Chart(ctx, {
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
		var ctx = document.getElementById("linguistic").getContext('2d');
		var attentionChart = new Chart(ctx, {
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