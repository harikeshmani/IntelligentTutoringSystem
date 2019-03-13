<?php
include("auth.php");
$class_id = $_SESSION['class_id'];
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
								$query = mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE class_id = '$class_id' AND class_type = ''");
								if(mysqli_num_rows($query)==0) {
								echo " <td>No Record found</td>";
								} else {
								echo "<thead>";
											echo  "<tr>";
														echo "<th>Name</th>";
														echo "<th>Email</th>";
														echo "<th>address</th>";
														echo  "<th>image</th>";
											echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
											
											while ($qry = mysqli_fetch_array($query)) {
										$country_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM countries WHERE id = '".$qry['country']."' "));
									$country_name = $country_dataa['name'] ;
									$city_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM cities WHERE id = '".$qry['city']."' "));
									$city_name = $city_dataa['name'] ;
									$state_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM states WHERE id = '".$qry['state']."' "));
									$state_name = $state_dataa['name'] ;
									$image = '../api/user_image/'.$qry['pic']; ?>
									<tr>
										<td><?php echo $qry['username'];  ?></td>
										<td><?php echo $qry['email']; ?></td>
										<td><?php echo $qry['address']; ?>,<?php echo $qry['street']; ?> , <?php echo $qry['locality']; ?> , <?php echo $city_name; ?> , <?php echo $state_name; ?> , <?php echo $country_name; ?> - <?php echo $qry['post_code']; ?></td>
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
			<?php include("footer_files.php"); ?>
			<script>
			$(document).ready(function() {
			$("#example").DataTable( {
			"order": [[ 3, "desc" ]]
			} );
			} );
			</script>
			
			
		</body>
	</html>