<?php
include("auth.php");
$user_id = $_SESSION['user_id'];
$user_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = '$user_id'"));
if(isset($_POST["feedbacks"])) {
$title = $_POST['title'];
$description = $_POST['description'];
$result = mysqli_query($link, "INSERT INTO tbl_tutor_feedback(tutor_id, feedback_type, description, created_date) VALUES ($user_id,'$title', '$description' , CURRENT_TIMESTAMP)");
if($result) {
echo "<script>alert('successfully registerd your feedback');</script>";
} else {
echo "<script>alert('error');</script>";
}
}
if(isset($_POST["orderissue"])) {
$issue = $_POST['issue'];
$neworder = $_POST['neworder'];
$description = $_POST['description'];
$result = mysqli_query($link, "INSERT INTO tbl_tutor_order_issue(tutor_id, issue_type, description, created_date) VALUES ($user_id,'$issue', '$description' , CURRENT_TIMESTAMP)");
if($result) {
echo "<script>alert('successfully registerd your issue');</script>";
} else {
echo "<script>alert('error');</script>";
}
}
if(isset($_POST["messagess"])) {
$subject = $_POST['subject'];
$description = $_POST['description'];
$result = mysqli_query($link, "INSERT INTO tbl_tutors_messages(tutor_id, subject, description, senton) VALUES ($user_id, '$subject','$description', CURRENT_TIMESTAMP)");
$to = "helpdesk@pinkrickshawdesign.com";
$txt = $message;
$headers = "From: info@pinkrickshawdesign.com" . "\r\n" .
"CC: info@pinkrickshawdesign.com";
$mail_result = mail($to,$subject,$txt,$headers);
if($mail_result) {
echo "<script>alert('successfully sent your message');</script>";
} else {
echo "<script>alert('error');</script>";
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<style type="text/css">
			form label {
				color: #1d68b2;
			}
			label.error {
		color: #1d68b2;
		}
		</style>
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
								<h1>customer service</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<h2>manage  <strong>your orders </strong></h2>
							<h2><?php echo $msg; ?></h2>
							<div class="tabs tabs-bottom tabs-center tabs-simple">
								<ul class="nav nav-tabs">
									<li class="nav-item active">
										<a class="nav-link" href="#tabsNavigationSimpleIcons1" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured icon-credit-card icons"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0" style="color: #1b68b2;">Your orders </p>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimpleIcons2" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured icon-question icons"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0" style="color: #1b68b2;">I have an issue </p>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimpleIcons3" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured icon-envelope-open icons"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0" style="color: #1b68b2;">contact us  </p>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimpleIcons4" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured icon-support icons"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0" style="color: #1b68b2;">Your feedback  </p>
										</a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tabsNavigationSimpleIcons1">
										<div class="text-center">
											<h4>Orders </h4>
											<table class="table table-bordered table-hover" id="order_table">
												<thead>
													<tr>
														<th>order type</th>
														<th>date</th>
														<th>with </th>
														<th>amount</th>
														<th>status</th>
														<th>refund request</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$qry = mysqli_query($link, "SELECT * FROM tbl_order WHERE tutor_id='$user_id' AND payment_status = 'paid'");
													while($userfetch_data=mysqli_fetch_array($qry))
													{
													$student_id = $userfetch_data['student_id'];
													$userfetch_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT username FROM tbl_glow_students WHERE id=$student_id  "));
													$student_name = $userfetch_dataa['username'];
													echo '<tr>';
																echo "<td>". $userfetch_data['order_type'] ."</td>";
																echo "<td>". $userfetch_data['order_date'] ."</td>";
																echo "<td>".$student_name ."</td>";
																echo "<td> ".$userfetch_data['total_amount'] ."</td>";
																echo "<td>". $userfetch_data['student_status'] ."</td>";
																echo "<td><a href='refunds.php?orderid=".urlencode( base64_encode($userfetch_data['session_id']))."&session_id=".urlencode( base64_encode($userfetch_data['session_id']))."&room_name=".urlencode( base64_encode($userfetch_data['room_name']))."'><button class='btn btn-primary'>refund/request</button></a></td>";
													echo '</tr>';
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tabsNavigationSimpleIcons2">
										<div class="text-center">
											<h4>Your Issues </h4>
										</div>
										<div class="row">
											<div class="col-md-2"></div>
											<div class="col-md-8">
												<div class="featured-box featured-box-primary text-left" >
													<div class="box-content">
														<form action="" method="post" name="form1" role="form">
															<div class="form-row">
																<div class="form-group col">
																	<label>issue </label>
																	<select class="form-control form-control-md" type="text" value="" name="issue" >
																		<option value="I did not receive my payment">I did not receive my payment</option>
																		<option value="I am unable to reschedule my session">I am unable to reschedule my session</option>
																		<option value="student did not show up">student did not show up</option>
																		<option value="My session disconnected in the middle">My session disconnected in the middle</option>
																		<option value="I had a different issue">I had a different issue</option>
																	</select>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>choose your order</label>
																	<select class="form-control form-control-md" type="text" name="neworder" id="newname">
																		<option value="">choose order </option>
																		<?php
																		$qry = mysqli_query($link, "SELECT * FROM tbl_order WHERE tutor_id='$user_id' AND payment_status = 'paid'");
																		if(mysqli_num_rows($qry) == 0) {
																		echo "<option>no order found</option>";
																		} else {
																			while($userfetch_data=mysqli_fetch_array($qry))
																		{
																		$student_id = $userfetch_data['student_id'];
																		$userfetch_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT username FROM tbl_glow_students WHERE id=$student_id  "));
																		$student_name = $userfetch_dataa['username']; ?>
																		<option value="<?php echo $userfetch_data['order_type'];?>"><?php echo $student_name;?>  session with <?php echo $userfetch_data['order_type'] ?> date <?php echo $userfetch_data['order_date'] ?>  </option>
																		<?php  } } ?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label for="">description </label>
																<textarea class="form-control form-control-md rounded-0" id="" rows="3" name="description"></textarea>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<input name="orderissue" type="submit"  value="Submit" class="btn btn-primary">
																</div>
															</div>
														</form>
													</div>
													<div class="col-md-2"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tabsNavigationSimpleIcons3">
										<div class="text-center">
											<h4>Contact  </h4>
										</div>
										<div class="row">
											<div class="col-md-2"></div>
											<div class="col-md-8">
												<div class="featured-box featured-box-primary text-left" >
													<div class="box-content">
														<form action="" method="post" name="form1" role="form">
															<div class="form-row">
																<div class="form-group col">
																	<label>to</label>
																	<input class="form-control" type="text" name="to_mail" id="to_mail" value="www.solutiongarv.com" >
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label>subject</label>
																	<input class="form-control form-control-md" type="text" name="subject" id="newname" value="" >
																</div>
															</div>
															<div class="form-row">
																<label>description</label>
																<textarea class="form-control form-control-md rounded-0" id="" rows="3" name="description"></textarea>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<input name="messagess" type="submit"  value="Submit" class="btn btn-primary">
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tabsNavigationSimpleIcons4">
										<div class="text-center">
											<h4>feedback  </h4>
										</div>
										<div class="row">
											<div class="col-md-2"></div>
											<div class="col-md-8">
												<div class="featured-box featured-box-primary text-left" >
													<div class="box-content">
														<form action="" method="post" name="form1">
															<div class="form-row">
																<div class="form-group col">
																	<label>Title</label>
																	<select class="form-control form-control-md" type="text" value="" name="title" >
																		<option value="suggestion">suggestion</option>
																		<option value="Report an issue">Report an issue</option>
																		<option value="Other">Other</option>
																	</select>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<label >Describe any problem / reaction:</label>
																	<textarea class="form-control rounded-0" id="" rows="3" name="description"></textarea>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col">
																	<input name="feedbacks" type="submit"  value="Submit" class="btn btn-primary">
																</div>
															</div>
														</form>
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
			</div>
			<?php include("footer.php") ?>
		</div>
		<!-- Vendor -->
		<?php include("footer_files.php") ?>
		<script type="text/javascript">
		$(document).ready(function(){
		$('#order_table').DataTable();
		});
		</script>
		
	</body>
</html>