<?php
include("auth.php");
$today = date("Y-m-d");
$user_id = $_SESSION['class_id'];
$tutor_id = base64_decode(urldecode($_REQUEST['id']));
$qry = mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = '$tutor_id'");
$username_data=mysqli_fetch_array($qry);
$images = '../api/user_image/tutor/'.$username_data['picture'];
if(isset($_POST['category'])) {
$cat = $_POST['category'];
$room_name = 'room'.$tutor_id;
$slot_detail = $_POST['slot_details'];
$array = explode(',', $slot_detail);
foreach($array as $key => $slot_detail)
{
$array[$key] = explode('|', $slot_detail);
$session_id  = $array[$key][0];
$date = $array[$key][1];
$slots = $array[$key][2];
$username_data1 = mysqli_query($link, "SELECT * FROM tbl_scheduled_sessions where session_date='".$date."' and slots='".$slots."' and session_category='".$cat."' and approval_status='approved' ");
$num = mysqli_num_rows($username_data1);
$username_data2 = mysqli_query($link, "SELECT * FROM tbl_scheduled_sessions where session_date='".$date."' and
slots='".$slots."' and tutor_id=$tutor_id and student_id=$user_id ");
$num2 = mysqli_num_rows($username_data2);
if($num == 0 && $num2 == 0){
$result = mysqli_query($link, "INSERT INTO tbl_scheduled_sessions(session_id, student_id, tutor_id, request_type, cancel_type, session_date, slots, session_category, room_name, created, payment_status, approval_status) VALUES ($session_id, $user_id, $tutor_id, 'student', 'teacher', '$date', '$slots', '$cat', '$room_name', CURRENT_TIMESTAMP, 'pending', 'pending' )");
} else {
echo 'Already booked this session';
}
}
if($result) {
echo 'successfully registered your request';
} else {
echo 'Not allowed';
}
$st_list = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = '$tutor_id'"));
$stt_list = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = '$user_id'"));
$name_recipient = $stt_list['username'];
$message1 ="you have a new request.";
/////////////////////////code for sending notifications//////////////
$title = "New Request From $name_recipient";
////////////
$qryyy = "INSERT INTO tbl_notification(user_id, role_type, session_id, room_name, message, title,  notification_type, notification_date, flag)
values('$tutor_id', 'teacher', '$session_id', '$room_name', '$message1', '$title', '$type', '$today', '$flag')";
$username_dataa=mysqli_query($link, $qryyy);
///////////
$notification = array('title' =>$title , 'body' => $message1, 'type' => $type, 'sound' => 'default', 'badge' => '1');
$arrayToSend = array('to' => $st_list['device_token'], 'data' => $notification, 'priority'=>'high');
$json = json_encode($arrayToSend);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: key='. $serverKey;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
//Send the request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch);
curl_close($ch);
exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<style type="text/css">
			form label {
		color: #0b3459;
		}
		label.error {
		color: #0b3459;
		}
		</style>
	</head>
	<body>
		<div class="body">
			<?php include("menu.php") ?>
			<div role="main" class="main" >
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>Tutor Details</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="owl-carousel owl-theme owl-loaded owl-drag owl-carousel-init" data-plugin-options="{'items': 1, 'margin': 10}">
								<div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-720px, 0px, 0px); transition: all 0s ease 0s; width: 2160px;"><div class="owl-item cloned" style="width: 350px; margin-right: 10px;"><div>
									<span class="img-thumbnail d-block">
										<?php $pic = '../api/user_image/tutor/'.$username_data['picture'];
										if($username_data['picture'] == '') {
										$pic = '../img/sample.jpg';
										} ?>
										<img alt=<?php echo $username_data['first_name'] ?> height="300" class="img-fluid" src=<?php echo $pic ?>>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-primary" data-toggle="modal" data-target="#formModal"><i class="fas fa-envelope"></i> Send Message</button>
				<!---modal message-->
				<div class="modal" id="formModal" tabindex="-1" role="dialog" aria-labelledby="" style="display: none;" aria-hidden="true" >
					<div class="modal-dialog">
						<form name="msgsender" class="mb-4"  action="" method="POST">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="formModalLabel">Send message to the tutor</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body">
									<div class="form-group row">
										<label class="col-sm-12 text-center" id="respmsgs"></label>
									</div>
									<div class="form-group row align-items-center">
										<label class="col-sm-3 text-left text-sm-right mb-0">subject</label>
										<div class="col-sm-9">
											<input type="text" name="subject" class="form-control" placeholder="subject.." required="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 text-left text-sm-right mb-0">Message</label>
										<div class="col-sm-9">
											<textarea rows="5" name="message" id="msgs" class="form-control" placeholder="Type your message..." required=""></textarea>
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="send">Send</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!--modal message-->
			<button type="button" class="mb-1 mt-1 mr-1 btn btn-primary" id="schedule"><i class="fas fa-calendar"></i> Schedule a session</button>
			<!--modals for session scheduling-->
			<div class="modal" id="availableclassesGroup" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Available Group sessions</h4>
						</div>
						<div class="modal-body" style="max-height: calc(100% - 120px); overflow-y: scroll;">
							<table class="table table-striped">
								<?php
								$tutor_data = mysqli_query($link, "SELECT DISTINCT session_date FROM tbl_tutors_available_sessions WHERE tutor_id = $tutor_id AND session_date>='".$today."' AND session_type='group' ORDER BY MONTH(session_date) ASC, DAY(session_date) ASC ");
								$tot = mysqli_num_rows($tutor_data);
								if($tot == 0 ) {
								echo "<h2>No Record Found</h2>";
								} else {
								while($tutor=mysqli_fetch_array($tutor_data)) {
								$session_date=$tutor['session_date'];
								$date = strtotime($session_date);
								$s_date = date('d-m-Y', $date);
								echo "<thead><tr><th>Date: $session_date</th></tr></thead>";
								$tutor_dataa = mysqli_query($link, "SELECT * FROM tbl_tutors_available_sessions WHERE tutor_id = $tutor_id AND session_date='".$session_date."' AND session_date>='".$today."' AND session_type='group' ORDER BY MONTH(session_date) ASC, DAY(session_date) ASC, slots ASC ");
								while($tutorr=mysqli_fetch_array($tutor_dataa)){
								$id=$tutorr['id'];
								$slots=$tutorr['slots'];
								echo "<tbody>";
										echo  "<tr>";
												echo "<td><input type='checkbox' name='slot_details[]' value='$id|$session_date|$slots' />$slots</td>";
										echo  "</tr>";
								echo "</tbody>";
									}
								}
									}
								?>
							</table>
						</div>
						<div class="modal-footer">
							<?php if($tot == 0 ) { ?>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<?php	} else { ?>
							<button type="button" class="btn btn-primary" id="submit_group">Submit</button>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!--end of another modal-->
			<!--anothet modal for individual sessions-->
			<div class="modal" id="availableclassesind" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Available individual sessions</h4>
						</div>
						<div class="modal-body" style="max-height: calc(100% - 120px); overflow-y: scroll;">
							<form action="" id="ind">
								<table class="table table-striped">
									<?php
									$tutor_data = mysqli_query($link, "SELECT DISTINCT session_date FROM tbl_tutors_available_sessions WHERE tutor_id = $tutor_id AND session_date>='".$today."' AND session_type='individual' ORDER BY MONTH(session_date) ASC, DAY(session_date) ASC ");
									$tot = mysqli_num_rows($tutor_data);
									if($tot == 0 ) {
									echo "<h2>No Record Found</h2>";
									} else {
									while($tutor=mysqli_fetch_array($tutor_data)) {
									$session_date=$tutor['session_date'];
									$date = strtotime($session_date);
									$s_date = date('d-m-Y', $date);
									echo "<thead><tr><th>Date: $session_date</th></tr></thead>";
									$tutor_dataa = mysqli_query($link, "SELECT * FROM tbl_tutors_available_sessions WHERE tutor_id = $tutor_id AND session_date='".$session_date."' AND session_date>='".$today."' AND session_type='individual' ORDER BY MONTH(session_date) ASC, DAY(session_date) ASC, slots ASC ");
									while($tutorr=mysqli_fetch_array($tutor_dataa)){
									$id=$tutorr['id'];
									$slots=$tutorr['slots'];
											echo "<tbody>";
																	echo  "<tr>";
																				echo "<td><input type='checkbox' name='slot_details[]' value='$id|$session_date|$slots' />$slots</td>";
															echo  "</tr>";
											echo "</tbody>";
									}
									}
									}
									?>
								</table>
							</div>
							<div class="modal-footer">
								<?php if($tot == 0 ) { ?>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<?php	} else { ?>
								<button type="button" class="btn btn-primary" id="submit_individual">Submit</button>
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--modals session scheduling-->
		</div>
		<div class="col-lg-8">
			<h2 class="mb-0"><strong><?php echo $username_data['first_name'] ?></strong></h2>
			<h4 class="heading-primary mb-0"><?php echo $username_data['highest_degree'] ?></h4>
			<?php $country_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM countries WHERE id = '".$username_data['country']."' "));
			$country_name = $country_dataa['name'] ;
			$city_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM cities WHERE id = '".$username_data['city']."' "));
			$city_name = $city_dataa['name'] ; ?>
			<h4 class="heading-primary"><?php echo $city_name; ?>, <?php echo $country_name; ?> </h4>
			<hr class="solid">
			<h2><?php echo $username_data['about_yourself'] ?></h2>
			<div class="toggle toggle-primary" data-plugin-toggle="" data-plugin-options="{ 'isAccordion': true }">
				<section class="toggle active">
					<label>Subject I love to teach</label>
					<div class="toggle-content" style="display: block;">
						<?php $whole_subjects = $username_data['primary_subject'] .','. $username_data['middle_subject'] .','. $username_data['high_sub_category'] .','.  $username_data['high_subject'];
						$str_sub = preg_replace('/,{2,}/', ',', trim($whole_subjects, ',')); ?>
						<ul class="list list-icons">
							<li> <i class="fas fa-check"></i><?php echo $str_sub;?> </li>
						</ul>
					</div>
				</section>
				<section class="toggle">
					<label>Teaching level</label>
					<div class="toggle-content">
						<ul class="list list-icons">
							<li><i class="fas fa-check"></i><?php echo $username_data['service_preference'] ?></li>
						</ul>
					</div>
				</section>
				<section class="toggle">
					<label>Available for</label>
					<div class="toggle-content">
						<ul class="list list-icons">
							<li><i class="fas fa-check"></i> <?php echo $username_data['mode_of_teaching'] ?></li>
						</ul>
					</div>
				</section>
				<section class="toggle">
					<label>Session Rate</label>
					<div class="toggle-content">
						<ul class="list list-icons">
							<li><i class="fas fa-check"></i>Hourly Rate: <?php echo $username_data['hourly_rate'] ?></li>
							<li><i class="fas fa-check"></i>Group Rate: <?php echo $username_data['group_rate'] ?></li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
</div>
<section class="section section-primary mb-0">
<div class="container">
	<div class="row counters counters-text-light">
		<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
			<div class="counter">
				<?php $nums = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tbl_order where tutor_id='$tutor_id' AND tutor_status='completed' ")); ?>
				<strong data-to=<?php echo $nums ?> ><?php echo $nums; ?></strong>
				<label>Sessions Taken</label>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
			<div class="counter">
				<strong data-to="0">0</strong>
				<label>Reviews Recieved</label>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4 mb-4 mb-sm-0">
			<div class="counter">
				<?php $numa = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tbl_sessions_rating where tutor_id='$tutor_id' AND tutor_rating!='' ")); ?>
				<strong data-to=<?php echo $numa; ?>><?php echo $numa; ?></strong>
				<label>Average Rating</label>
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
<script type="text/javascript">
var user_id = "<?php echo $user_id ?>";
var tutor_id = "<?php echo $tutor_id ?>";
$("form[name='msgsender']").validate({
rules: {
subject: {
required: true
},
message: {
required: true,
minlength: 10
}
},
messages: {
subject: {
required: "Please enter subject"
},
message: {
required: "Please write your message here",
minlength: "Your message must be at least 10 characters long"
}
},
submitHandler: sendmessage
});
function sendmessage() {
var sub = $("input[name=subject]").val();
var msg = $("#msgs").val();
$.ajax({
type: "POST",
url: '../php/tutors.php',
data: {'subject': sub, 'message': msg, 'user_id': user_id, 'tutor_id': tutor_id},
success: function(data) {
$("#respmsgs").append("<i class='fas fa-check'></i>  Your message has been sent succesfully !");
$("form[name='msgsender']").trigger("reset");
}
});
}
$("#schedule").click(function() {
$.confirm({
title: 'Select Your Preference',
content: '',
buttons: {
Individual: {
text: 'Individual',
btnClass: 'btn-blue',
keys: ['enter', 'shift'],
action: function() {
$('#availableclassesind').modal();
}
},
Group: {
text: 'Group',
btnClass: 'btn-blue',
keys: ['enter', 'shift'],
action: function() {
$('#availableclassesGroup').modal();
}
}
}
});
});
$("#submit_individual").click(function() {
var slots = ($("input[name='slot_details[]']:checked").map(function() {
return this.value;
}).get().join(', '));
$.ajax({
type: "POST",
url: "",
data: {'category': 'individual','slot_details': slots},
success: function(data) {
swal("response", data);
setTimeout(function () {
location.reload();
}, 3000);
}
});
});
$("#submit_group").click(function() {
var slots = ($("input[name='slot_details[]']:checked").map(function() {
return this.value;
}).get().join(', '));
$.ajax({
type: "POST",
url: "",
data: {'category': 'group','slot_details': slots},
success: function(data) {
swal("message", data);
setTimeout(function () {
location.reload();
}, 3000);
}
});
});
</script>
</body>
</html>