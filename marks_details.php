<?php
include("auth.php");
$user_id = $_SESSION['userid'];
$moodle = mysqli_fetch_array(mysqli_query($link, "SELECT moodle_id FROM tbl_glow_students WHERE id= '$user_id'"));
$moodle_id = $moodle['moodle_id'];
$i = 1;
$cls = $_GET['class'];
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://139.59.45.201/moodle/api/grader.php",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "subject=$cls&moodle_id=$moodle_id&attempts=0&view=single",
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
),
));
$each_response = curl_exec($curl);
curl_close($curl);
$marks_th = json_decode($each_response);
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<link rel="stylesheet" href="charts/css/main.css" />
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
								<h1>Subject Marks</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3><?php echo $cls ?> <strong>Marks</strong></h3>
							</div>
							<div class="css_bar_graph">
								<!-- y_axis labels -->
								<ul class="y_axis">
									<li>100%</li><li>80%</li><li>60%</li><li>40%</li><li>20%</li><li>0%</li>
								</ul>
								<!-- x_axis labels -->
								<ul class="x_axis">
									<?php foreach ($marks_th as $eash) {
									
										echo  "<li>".$eash->test_name."</li>";
										
																
									}
									?>
								</ul>
								<!-- graph -->
								<div class="graph">
									<!-- grid -->
									<ul class="grid">
										<li><!-- 100 --></li>
										<li><!-- 80 --></li>
										<li><!-- 60 --></li>
										<li><!-- 40 --></li>
										<li><!-- 20 --></li>
										<li class="bottom"><!-- 0 --></li>
									</ul>
									<!-- bars -->
									<!-- 250px = 100% -->
									<ul>
										<?php foreach ($marks_th as $mark) {
										$mark_perc2 = $mark->marks*100/ $mark->total;
										$percent_mark2 = round((float)$mark_perc2 );
										$height_mark3 = $percent_mark2*2.5;
										$css_height4 = "height:". $height_mark3 ."px;";
										echo  "<li class='bar nr_$i blue' style=$css_height4><div class='top'></div><div class='bottom'></div><span>$percent_mark2</span></li>";
										$i++;
										}
										?>
									</ul>
								</div>
								<!-- graph label -->
								<div class="label"><span>Marks: </span>Result (in percent)</span></div>
							</div>
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- Vendor -->
			<?php include("footer_details.php") ?>
		</body>
	</html>