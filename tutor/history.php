<?php
include("auth.php");
$user_id = $_SESSION['user_id'];
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
							<table class="table table-bordered table-hover">
								<?php
								$qry2 = mysqli_query($link, "SELECT * FROM tbl_sessions_rating where student_id=$user_id ");
								if(mysqli_num_rows($qry2) == 0) {
									echo "<h2>No Record Found</h2>";
								} else { ?>
								<tbody>
									<thead>
										<th>
											<td>Room Name</td>
											<td>Present rating</td>
										</thead>
										<tbody>
											<?php while($userfetch_data=mysqli_fetch_array($qry2))
											{
											$room =  $userfetch_data['room_name'];
											$id_session = $userfetch_data['session_id'];
											echo '<tr>';
														echo "<td>". $userfetch_data['room_name'] ."</td>";
														echo "<td>".
													$userfetch_data['rating']
															."</td>";
											echo '</tr>';
											}
											}
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
				</body>
			</html>