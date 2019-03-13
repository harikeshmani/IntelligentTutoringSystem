<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
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
								<h1>Notifications</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>Notification <strong>List</strong></h3>
							</div>
							<?php
									$result = mysqli_query($link, "SELECT * FROM tbl_notification WHERE user_id = '$user_id' AND flag = 'true' ORDER BY notification_date DESC");
							$username_count = mysqli_num_rows($result); ?>
							
							<table class="table table-bordered table-hover" id="note">
								<?php	if($username_count == 0) { ?>
								<tr>
									<td>No Data found</td>
								</tr>
								<?php } else { ?>
								<thead>
									<tr>
										<th>Notification</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php	while($userfetch_data=mysqli_fetch_array($result))
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
							</table>
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- ../vendor -->
			<?php include("footer_files.php"); ?>
			<script type="text/javascript">
			$(document).ready(function(){
							$('#note').dataTable();
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
			url: '../api/delete_notification.php',
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
			
			
		</body>
	</html>