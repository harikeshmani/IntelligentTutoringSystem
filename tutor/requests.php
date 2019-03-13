<?php
include("auth.php");
$user_id = $_SESSION['user_id'];
$flagg = "true";
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<style type="text/css">
		.clickable-row {
		cursor: pointer;
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
								<h1>Requests List</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<h4>Requests </h4>
							<table class="table table-bordered table-hover">
								<tbody>
									<?php
									$result = mysqli_query($link, "SELECT DISTINCT student_id FROM tbl_scheduled_sessions WHERE tutor_id = '$user_id'");
									if(mysqli_num_rows($result) == null) { ?>
									<tr class="info">
										<td><h4>No record Found</h4></td></tr>
										<?php } else {
										while($userfetch_data = mysqli_fetch_array($result))
										{
										$id = $userfetch_data['id'];
										$student_id = $userfetch_data['student_id'];
										$tutor_id = $userfetch_data['tutor_id'];
										$name_query = mysqli_fetch_array(mysqli_query($link, "SELECT username FROM tbl_glow_students WHERE id = '$student_id'"));
										$name = $name_query['username'];
										$approval_status = $userfetch_data['approval_status'];
										$stu_id = $name_query['id'];
										// echo '<tr>';
											//   echo "<td>". $name ."</td>";
											//   echo "<td>". $approval_status ."</td>";
										//   echo '</tr>';
										?>
										<tr class="info clickable-row" data-href='request_detail.php?id=<?php echo urlencode(base64_encode($student_id));?>'>
											<td>Your Session Request With - <strong><?php echo $name;  ?></strong></td>
											<td>  Click here To view Details</td>
										</tr>
										<?php
										} 
									} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php include("footer.php") ?>
				</div>
				<!-- Vendor -->
				<?php include("footer_files.php") ?>				
				<script type="text/javascript">
				jQuery(document).ready(function($) {
				$(".clickable-row").click(function() {
				window.location = $(this).data("href");
				});
				});
				</script>
			</body>
		</html>