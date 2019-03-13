<?php
include("auth.php");
$user_id = $_SESSION['user_id'];
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
								<h1>Your Student</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<h4>Your Students <strong>Detail</strong></h4>
							<table class="table table-bordered table-hover" id="example">
								<?php
								$query = mysqli_query($link, "SELECT DISTINCT student_id FROM tbl_scheduled_sessions WHERE tutor_id = '$user_id' AND approval_status = 'approved'");
								if(mysqli_num_rows($query)==0) {
								echo " <td>No Record found</td>";
								} else {
								echo "<thead>";
											echo  "<tr>";
														echo "<th>Name</th>";
														echo "<th>school</th>";
														echo "<th>class</th>";
														echo  "<th>image</th>";
											echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
											
											while ($user_fetch = mysqli_fetch_array($query)) {
											$student_id = $user_fetch['student_id'];
											$qry = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = '$student_id'"));
									$image = '../api/user_image/'.$qry['pic']; ?>
									<tr class='clickable-row' data-href='view_student.php?id=<?=urlencode( base64_encode($student_id));?>'>
										<td><?php echo $qry['username'];  ?></td>
										<td><?php echo $qry['school']; ?></td>
										<td><?php echo $qry['class']; ?></td>
										<td><span class="img-thumbnail d-block"><img src="<?php echo $image; ?>" height="100" width="100" class="img-fluid"></span></td>
									</tr>
									<?php } }
									?>
								</tbody>
							</table>
							
							
						</div>
					</div>
					
				</div>
				<?php include("footer.php") ?>
				
			</div>
			<!-- ../vendor -->
			<?php include("footer_files.php") ?>
			<script>
			// $(document).ready(function() {
			//  $("#example").DataTable( {
			//   "order": [[ 3, "desc" ]]
			//   } );
			//   } );
			$(document).ready( function () {
			$(".clickable-row").click(function() {
			window.location = $(this).data("href");
			});
			});
			</script>
			
			
		</body>
	</html>