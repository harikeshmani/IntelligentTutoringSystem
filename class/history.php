<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
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
								<h1>History</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>History <strong>List</strong></h3>
							</div>
							<?php	$qry2 = mysqli_query($link, "SELECT * FROM tbl_sessions_rating where student_id=$user_id ");
									if(mysqli_num_rows($qry2) == null) {
										echo "<h4>No Record Found</h4>";
									} else { ?>	
							<table class="table table-bordered table-hover" id="history_tab">
								<thead>
									<th>Session With</th>
									<th>Date</th>
									<th>Teacher Rating</th>
									<th>Student Rating</th>
								</thead>
								<tbody>
									<?php
									while($userfetch_data=mysqli_fetch_array($qry2))
									{
									$id_tutor = $userfetch_data['tutor_id'];
									$tutor_name = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id= 'id_tutor'"));
									$name = $tutor_name['first_name'];
									echo "<tr>";
										echo "<td>" .$name. "</td>";
										echo "<td>" .$userfetch_data['session_date']. "</td>";
										echo "<td>";
											for ($i = 0; $i <  $userfetch_data['tutor_rating']; $i++) {
											echo  "<i class='fa fa-star' aria-hidden='true'></i>";
											} "</td>";
										echo "<td>";
										  for ($j = 0; $j <  $userfetch_data['rating']; $j++) {
											echo  "<i class='fa fa-star' aria-hidden='true'></i>";
											} "</td>";
										echo "</tr>";
										}
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<?php include("footer.php") ?>
			</div>
			<!-- ../vendor -->
			<?php include("footer_files.php") ?>
			<script src="includes/js/home.js"></script>
			<script type="text/javascript">
			$(document).ready(function(){
           $("#history_tab").dataTable();
		});
	</script>
		</body>
	</html>