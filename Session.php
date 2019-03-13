<?php
include("auth.php");
$user_id = $_SESSION['userid'];
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "https://pinkrickshawdesign.in/its/api/session_approved_list.php",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "user_id=$user_id&type=student",
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
"Content-Type: application/x-www-form-urlencoded",
),
));
$response = curl_exec($curl);
$object = json_decode($response);
curl_close($curl);
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
								<h1>Session</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>scheduled <strong>Sessions</strong></h3>
							</div>
							
							<?php
							if( $response === null || $response == FALSE || $response == '' ) { ?>
							<div class="container">
								<div class="row">
									<div class="col">
											<h4 class="mb-0">No Session</h4>
											<p class="mb-0">You Do Not have any scheduled session.</p>
									</div>
								</div>
							</div>
						<?php } else { ?>
						<div class="pricing-table row no-gutters mt-2 mb-2">
							<?php  foreach($object as $data){ ?>
							<div class="col-lg-4 col-sm-6">
								<div class="plan">
									<input type='hidden' id='roomid' value=<?php echo urlencode(base64_encode($data->room_name)) ?>>
									<input type='hidden' id='session_id' value=<?php echo urlencode(base64_encode($data->session_id)) ?>>
									<input type='hidden' id='payment_status' value=<?php echo $data->payment_status ?>>
									<input type='hidden' id='amount' value=<?php echo $data->total_amount ?>>
									<input type='hidden' id='idss' value=<?php echo $data->id ?>>
									<h3>Session With <?php echo $data->name; ?><span><i class="fas fa-video"></i></span></h3>
									<a class="btn btn-lg btn-primary">Start Session</a>
									<ul>
										<li><strong>Timing</strong> <p id="time"><?php echo $data->session_time;  ?> </p></li>
										<li><strong>Date</strong> <p id="date"><?php echo $data->session_date; ?></hp></li>
										<li><strong>Payment Status</strong> -  <p id="time"><?php echo $data->payment_status; ?></p></li>
										<li><strong>Amount</strong> - <?php echo $data->total_amount; ?></li>
									</ul>
								</div>
							</div>
							<?php } } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("footer.php") ?>
	</div>
	<!-- Vendor -->
	<?php include("footer_files.php") ?>
		<script>
	$( document ).ready(function() {
	$('.plan').click(function() {
	var room = $('#roomid',this).val();
	var session_id = $('#session_id',this).val();
	var date = $('#date', this).text();
	var timing = $('#time',this).text();
	var result = timing.split('-');
	var st_time = result[0];
	var end_time = result[1];
	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes();
	var stt = new Date("June 13, 2018 " + st_time);
	stt = stt.getTime();
	var endt = new Date("June 13, 2018 " + end_time);
	endt = endt.getTime();
	var scheduled_date = new Date("June 13, 2018 " + time);
	scheduled_date = scheduled_date.getTime();
	var payment_status = $('#payment_status', this).val();
	var total_amount = $('#amount', this).val();
	var idsss = $('#idss', this).val();
	if (payment_status == 'Unpaid') {
	$.confirm({
	title: 'Not paid!',
	content: 'Pay Rs '+total_amount+'  to book your session!',
	buttons: {
	confirm: function () {
	$(location).attr('href', 'pay_form.php?session_id='+idsss+'');
	},
	cancel: function () {
	}
	}
	});
	} else {
	if ($.datepicker.formatDate('dd-mm-yy', new Date())!=date){
	$.alert({
	title: 'Not now!',
	content: 'your Session is scheduled on date '+date,
	});
	if  (stt > endt){
	$.alert({
	title: 'Not now!',
	content: 'your Session is scheduled on Time '+scheduled_date,
	});
	}
	} else {
	if (!(scheduled_date >= stt && scheduled_date <= endt)) {
	$.alert({
	title: 'Not now!',
	content: 'your Session is scheduled between '+timing,
	});
	} else {
	$(location).attr('href', 'video_session.php?room='+room+'&session_id='+session_id+'');
	}
	
	}
	}
	});
	});
	</script>
	
	
</body>
</html>