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
								अनुरोध सूची
								<?php } else if($lang=='mt') { ?>
								विनंत्या सूची
								<?php } else if($lang=='tl') { ?>
								అభ్యర్థనల జాబితా
								<?php } else { ?>
								Requests List
								<?php }	?>
								</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<h4>
							<?php if($lang=='hn') { ?>
							अनुरोध
							<?php } else if($lang=='mt') { ?>
							विनंत्या
							<?php } else if($lang=='tl') { ?>
							అభ్యర్థనలు
							<?php } else { ?>
							Requests
							<?php }	?>
							</h4>
							<table class="table table-bordered table-hover" id="req_det">
								<?php if($lang=='hn') { ?>
								<thead>
									<th>सत्र अनुरोध के साथ</th>
									<th>बटन</th>
								</thead>
								<tbody>
									<?php
									$result = mysqli_query($link, "SELECT DISTINCT tutor_id FROM tbl_scheduled_sessions WHERE student_id = '$user_id'");
									if(mysqli_num_rows($result) == null) { ?>
									<h4>कोई अनुरोध नहीं प्राप्त किया गया </h4>
									<?php } else {
									while($userfetch_data = mysqli_fetch_array($result))
									{
									$id = $userfetch_data['id'];
									$student_id = $userfetch_data['student_id'];
									$tutor_id = $userfetch_data['tutor_id'];
									$name_query = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id = '$tutor_id'"));
									$name = $name_query['first_name'];
									$approval_status = $userfetch_data['approval_status'];
									$teacher_id = $name_query['id'];
									?>
									<tr>
										<td><?php echo $name;  ?></td>
										<td><a href='request_detail.php?lang=hn&id=<?php echo urlencode(base64_encode($tutor_id));?>'><button type='button' class='btn btn-primary mb-2'>विवरण देखने के लिए यहां क्लिक करें</button></a></td>
									</tr>
									<?php
									} }
									
									?>
									
								</tbody>
								<?php } else if($lang=='mt') { ?>
								<thead>
									<th>सह सत्र विनंती</th>
									<th>बटण</th>
								</thead>
								<tbody>
									<?php
									$result = mysqli_query($link, "SELECT DISTINCT tutor_id FROM tbl_scheduled_sessions WHERE student_id = '$user_id'");
									if(mysqli_num_rows($result) == null) { ?>
									
									<h4>कोणताही रेकॉर्ड सापडला नाही</h4>
									<?php } else {
									while($userfetch_data = mysqli_fetch_array($result))
									{
									$id = $userfetch_data['id'];
									$student_id = $userfetch_data['student_id'];
									$tutor_id = $userfetch_data['tutor_id'];
									$name_query = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id = '$tutor_id'"));
									$name = $name_query['first_name'];
									$approval_status = $userfetch_data['approval_status'];
									$teacher_id = $name_query['id'];
									?>
									<tr>
										<td><?php echo $name;  ?></td>
										<td><a href='request_detail.php?lang=mt&id=<?php echo urlencode(base64_encode($tutor_id));?>'><button type='button' class='btn btn-primary mb-2'>तपशील पाहण्यासाठी येथे क्लिक करा</button></a></td>
									</tr>
									<?php
									} }
									?>
								</tbody>
								<?php } else if($lang=='tl') { ?>
								<thead>
									<th>సెషన్ అభ్యర్థన</th>
									<th>బటన్</th>
								</thead>
								<tbody>
									<?php
									$result = mysqli_query($link, "SELECT DISTINCT tutor_id FROM tbl_scheduled_sessions WHERE student_id = '$user_id'");
									if(mysqli_num_rows($result) == null) { ?>
									
									<h4>రికార్డు కనుగొనబడలేదు</h4>
									<?php } else {
									while($userfetch_data = mysqli_fetch_array($result))
									{
									$id = $userfetch_data['id'];
									$student_id = $userfetch_data['student_id'];
									$tutor_id = $userfetch_data['tutor_id'];
									$name_query = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id = '$tutor_id'"));
									$name = $name_query['first_name'];
									$approval_status = $userfetch_data['approval_status'];
									$teacher_id = $name_query['id'];
									?>
									<tr>
										<td><?php echo $name;  ?></td>
										<td><a href='request_detail.php?lang=tl&id=<?php echo urlencode(base64_encode($tutor_id));?>'><button type='button' class='btn btn-primary mb-2'>ఇక్కడ క్లిక్ చేయండి వివరాలు వీక్షించడానికి</button></a></td>
									</tr>
									<?php
									} }
									?>
								</tbody>
								<?php } else { ?>
								<thead>
									<th>Session Request With</th>
									<th>Button</th>
								</thead>
								<tbody>
									<?php
									$result = mysqli_query($link, "SELECT DISTINCT tutor_id FROM tbl_scheduled_sessions WHERE student_id = '$user_id'");
									if(mysqli_num_rows($result) == null) { ?>
									
									<h4>No record Found</h4>
									<?php } else {
									while($userfetch_data = mysqli_fetch_array($result))
									{
									$id = $userfetch_data['id'];
									$student_id = $userfetch_data['student_id'];
									$tutor_id = $userfetch_data['tutor_id'];
									$name_query = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id = '$tutor_id'"));
									$name = $name_query['first_name'];
									$approval_status = $userfetch_data['approval_status'];
									$teacher_id = $name_query['id'];
									?>
									<tr>
										<td><?php echo $name;  ?></td>
										<td><a href='request_detail.php?lang=eng&id=<?php echo urlencode(base64_encode($tutor_id));?>'><button type='button' class='btn btn-primary mb-2'>Click here To view Details</button></a></td>
									</tr>
									<?php
									} }
									
									?>
									
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
			<script type="text/javascript">
			$(document).ready(function($) {
			$('#req_det').dataTable();
			});
			</script>
		</body>
	</html>