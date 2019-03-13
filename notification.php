<?php
$lang = $_GET['lang'];
include("auth.php");
$user_id = $_SESSION['userid'];
$flagg = "true";
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
								<h1>
								<?php if($lang=='hn') { ?>
								नोटिफिकेशन सेन्टर
								<?php } else if($lang=='mt') { ?>
								सूचना
								<?php } else if($lang=='tl') { ?>
								ప్రకటనలు
								<?php } else { ?>
								Notifications
								<?php }	?>
								</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>
								<?php if($lang=='hn') { ?>
								नोटिफिकेशन  <strong>सूची</strong>
								<?php } else if($lang=='mt') { ?>
								सूचना <strong>यादी</strong>
								<?php } else if($lang=='tl') { ?>
								ప్రకటనలు <strong>జాబితా</strong>
								<?php } else { ?>
								Notification <strong>List</strong>
								<?php }	?>
								</h3>
							</div>
							<table class="table table-bordered table-hover" id="notification_tab">
								<?php if($lang=='hn') { ?>
								<thead>
									<tr>
										<th>नोटिफिकेशन</th>
										<th>हटाएँ</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$result = mysqli_query($link, "SELECT * FROM tbl_notification WHERE user_id = $user_id AND flag = '".$flagg."' ORDER BY notification_date DESC");
									$username_count = mysqli_num_rows($username_data);
									if($username_count == '0') { ?>
									<tr>
										<td><strong>कोई नोटिफिकेशन नहीं प्राप्त हुआ</strong></td>
									</tr>
									<?php } else {
									while($userfetch_data=mysqli_fetch_array($result))
									{
									$file_name = $userfetch_data['file_name'];
									$userfetch_dataa=mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = $user_id"));
									$first_name = $userfetch_dataa['first_name'];
									$notification_date = $userfetch_data['notification_date'];
									$newdate = strtotime ( '+15 day' , strtotime ( $notification_date ));
									$newdate = date ( 'Y-m-j' , $newdate);
									$notification_type = $userfetch_data['notification_type'];
									$flag = $userfetch_data['flag'];
									$idd = $userfetch_data['id'];
									$message = $userfetch_data['message'];
									$title = $userfetch_data['title'];
									if($file_name == null) {
									echo '<tr>';
																			echo "<td>$title Date $newdate</td>";
																			echo "<td><button class='delete btn btn-primary mb-2' value='$idd'>डिलीट</button></td>";
									echo '</tr>';
										}else {
									echo '<tr>';
																			echo "<td>$title $file_name Available till $newdate</td>";
																			echo "<td><button class='delete btn btn-primary mb-2' value='$idd'>डिलीट</button></td>";
									echo '</tr>';
									}
									}
									} ?>
									
								</tbody>
								<?php } else if($lang=='mt') { ?>
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>सूचना</th>
											<th>हटवा</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$result = mysqli_query($link, "SELECT * FROM tbl_notification WHERE user_id = $user_id AND flag = '".$flagg."' ORDER BY notification_date DESC");
										$username_count = mysqli_num_rows($username_data);
										if($username_count == '0') { ?>
										<tr>
											<td>माहिती आढळली नाही</td>
										</tr>
										<?php } else {
										while($userfetch_data=mysqli_fetch_array($result))
										{
										$file_name = $userfetch_data['file_name'];
										$userfetch_dataa=mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = $user_id"));
										$first_name = $userfetch_dataa['first_name'];
										$notification_date = $userfetch_data['notification_date'];
										$newdate = strtotime ( '+15 day' , strtotime ( $notification_date ));
										$newdate = date ( 'Y-m-j' , $newdate);
										$notification_type = $userfetch_data['notification_type'];
										$flag = $userfetch_data['flag'];
										$idd = $userfetch_data['id'];
										$message = $userfetch_data['message'];
										$title = $userfetch_data['title'];
										if($file_name == null) {
										echo '<tr>';
																			echo "<td>$title Date $newdate</td>";
																			echo "<td><button class='delete btn btn-primary mb-2' value='$idd'>हटवा</button></td>";
										echo '</tr>';
											}else {
										echo '<tr>';
																			echo "<td>$title $file_name Available till $newdate</td>";
																			echo "<td><button class='delete btn btn-primary mb-2' value='$idd'>हटवा</button></td>";
										echo '</tr>';
										}
										}
										} ?>
										
									</tbody>
									<?php } else if($lang=='tl') { ?>
									<thead>
										<tr>
											<th>ప్రకటనలు</th>
											<th>తొలగించు</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$result = mysqli_query($link, "SELECT * FROM tbl_notification WHERE user_id = $user_id AND flag = '".$flagg."' ORDER BY notification_date DESC");
										$username_count = mysqli_num_rows($username_data);
										if($username_count == '0') { ?>
										<tr>
											<td>No Data found</td>
										</tr>
										<?php } else {
										while($userfetch_data=mysqli_fetch_array($result))
										{
										$file_name = $userfetch_data['file_name'];
										$userfetch_dataa=mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = $user_id"));
										$first_name = $userfetch_dataa['first_name'];
										$notification_date = $userfetch_data['notification_date'];
										$newdate = strtotime ( '+15 day' , strtotime ( $notification_date ));
										$newdate = date ( 'Y-m-j' , $newdate);
										$notification_type = $userfetch_data['notification_type'];
										$flag = $userfetch_data['flag'];
										$idd = $userfetch_data['id'];
										$message = $userfetch_data['message'];
										$title = $userfetch_data['title'];
										if($file_name == null) {
										echo '<tr>';
												echo "<td>$title Date $newdate</td>";
												echo "<td><button class='delete btn btn-primary mb-2' value='$idd'>తొలగించు</button></td>";
										echo '</tr>';
											}else {
										echo '<tr>';
												echo "<td>$title $file_name Available till $newdate</td>";
												echo "<td><button class='delete btn btn-primary mb-2' value='$idd'>తొలగించు</button></td>";
										echo '</tr>';
										}
										}
										} ?>
										
									</tbody>
									<?php } else { ?>
									<thead>
										<tr>
											<th>Notification</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$result = mysqli_query($link, "SELECT * FROM tbl_notification WHERE user_id = $user_id AND flag = '".$flagg."' ORDER BY notification_date DESC");
										$username_count = mysqli_num_rows($username_data);
										if($username_count == '0') { ?>
										<tr>
											<td>No Data found</td>
										</tr>
										<?php } else {
										while($userfetch_data=mysqli_fetch_array($result))
										{
										$file_name = $userfetch_data['file_name'];
										$userfetch_dataa=mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = $user_id"));
										$first_name = $userfetch_dataa['first_name'];
										$notification_date = $userfetch_data['notification_date'];
										$newdate = strtotime ( '+15 day' , strtotime ( $notification_date ));
										$newdate = date ( 'Y-m-j' , $newdate);
										$notification_type = $userfetch_data['notification_type'];
										$flag = $userfetch_data['flag'];
										$idd = $userfetch_data['id'];
										$message = $userfetch_data['message'];
										$title = $userfetch_data['title'];
										if($file_name == null) {
										echo '<tr>';
														echo "<td>$title Date $newdate</td>";
														echo "<td><button class='delete btn btn-primary mb-2' value='$idd'>Delete</button></td>";
										echo '</tr>';
											}else {
										echo '<tr>';
														echo "<td>$title $file_name Available till $newdate</td>";
														echo "<td><button class='delete btn btn-primary mb-2' value='$idd'>Delete</button></td>";
										echo '</tr>';
										}
										}
										} ?>
									</tbody>
									<?php }	?>
								</table>
							</div>
						</div>
					</div>
					<?php include("footer.php") ?>
				</div>
				<!-- Vendor -->
				<?php include("footer_files.php") ?>
				<?php if($lang=='hn') { ?>
				<script type="text/javascript">
				$(document).ready(function(){
				$('#notification_tab').dataTable();
				$('.delete').click(function(e){
				e.preventDefault();
				var notification_id = $(this).val();
				$.confirm({
				title: 'चेतावनी!',
				content: 'क्या आप वाकई इस नोटिफिकेशन को मिटाना चाहते हैं!',
				buttons: {
				पुष्टि: function () {
				$.ajax({
				type: 'POST',
				url: 'api/delete_notification.php',
				dataType: 'json',
				data: {'id': notification_id},
				error: function() {
				swal("त्रुटि!", "एक त्रुटि हुई", "error");
				},
				success: function(response) {
				var dayta = JSON.parse(JSON.stringify(response));
				if(dayta.message == 'error') {
				swal("त्रुटि!", "यह नोटिफिकेशन हटाई नहीं गई है", "error");
				} else {
				swal("सफलता!", "यह नोटिफिकेशन हटा दी गई है", "success");
				setTimeout(function(){ location.reload(); }, 2000);
				}
				}
				});
				},
				रद्द: function () {
				}
				}
				});
				});
				});
				</script>
				<?php } else if($lang=='mt') { ?>
				<script type="text/javascript">
				$(document).ready(function(){
				$('#notification_tab').dataTable();
				$('.delete').click(function(e){
				e.preventDefault();
				var notification_id = $(this).val();
				$.confirm({
				title: 'अॅलर्ट!',
				content: 'आपली खात्री आहे की आपण ही सूचना हटवू इच्छिता!',
				buttons: {
				confirm: function () {
				$.ajax({
				type: 'POST',
				url: 'api/delete_notification.php',
				dataType: 'json',
				data: {'id': notification_id},
				error: function() {
				swal("त्रुटी!", "त्रुटी आढळली!", "error");
				},
				success: function(response) {
				var dayta = JSON.parse(JSON.stringify(response));
				if(dayta.message == 'error') {
				swal("त्रुटी!", "ही सूचना हटविली नाही", "error");
				} else {
				swal("यश!", "ही सूचना हटविली आहे!", "success");
				setTimeout(function(){ location.reload(); }, 2000);
				}
				}
				});
				},
				cancel: function () {
				}
				}
				});
				});
				});
				</script>
				<?php } else if($lang=='tl') { ?>
				<script type="text/javascript">
				$(document).ready(function(){
									$('#notification_tab').dataTable();
				$('.delete').click(function(e){
				e.preventDefault();
				var notification_id = $(this).val();
				$.confirm({
				title: 'Alert!',
				content: 'మీరు ఖచ్చితంగా ఈ నోటిఫికేషన్ను తొలగించాలనుకుంటున్నారా!',
				buttons: {
				confirm: function () {
				$.ajax({
				type: 'POST',
				url: 'api/delete_notification.php',
				dataType: 'json',
				data: {'id': notification_id},
				error: function() {
				swal("error!", "ఒక తప్పిదం సంభవించినది!", "error");
				},
				success: function(response) {
				var dayta = JSON.parse(JSON.stringify(response));
				if(dayta.message == 'error') {
				swal("error!", "ఈ నోటిఫికేషన్ తొలగించబడదు", "error");
				} else {
				swal("success!", "ఈ నోటిఫికేషన్ తొలగించబడింది!", "success");
				setTimeout(function(){ location.reload(); }, 2000);
				}
				}
				});
				},
				cancel: function () {
				}
				}
				});
				});
				});
				</script>
				<?php } else { ?>
				<script type="text/javascript">
				$(document).ready(function(){
				$('#notification_tab').dataTable();
				$('.delete').click(function(e){
				e.preventDefault();
				var notification_id = $(this).val();
				$.confirm({
				title: 'Alert!',
				content: 'Are you sure you want to delete this notification!',
				buttons: {
				confirm: function () {
				$.ajax({
				type: 'POST',
				url: 'api/delete_notification.php',
				dataType: 'json',
				data: {'id': notification_id},
				error: function() {
				swal("error!", "An error occured!", "error");
				},
				success: function(response) {
				var dayta = JSON.parse(JSON.stringify(response));
				if(dayta.message == 'error') {
				swal("error!", "This notification is not deleted", "error");
				} else {
				swal("success!", "This notification is deleted!", "success");
				setTimeout(function(){ location.reload(); }, 2000);
				}
				}
				});
				},
				cancel: function () {
				}
				}
				});
				});
				});
				</script>
				<?php }	?>
				
			</body>
		</html>