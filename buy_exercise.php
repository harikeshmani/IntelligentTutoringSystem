<?php
include("auth.php");
$user_id = $_SESSION['userid'];
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
								<h1>Buy Training Exrecises</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>Exercise <strong>Marketplace</strong></h3>
							</div>
							<table id="example" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>NAME</th>
										<th>PRICE</th>
										<th>DESCRIPTION</th>
										<!--  <th>CATEGORY</th>
										<th>REVIEWS</th>
										<th>RATINGS</th> -->
										<th>DATE</th>
										<th>STATUS</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$qry = mysqli_query($link, "SELECT * FROM tbl_game_type");
									while($userfetch_data=mysqli_fetch_array($qry))
									{
									echo "<tr>";
											echo "<td>". $userfetch_data['game_name']. "</td>";
											echo "<td>".$userfetch_data['price'] ."</td>";
											echo "<td>".$userfetch_data['detailed_description'] ."</td>";
											// echo "<td>".$userfetch_data['category'] ."</td>";
											// echo "<td> ".$userfetch_data['reviews']."</td>";
											// echo "<td>".$userfetch_data['ratings']."</td>";
											echo "<td>".$userfetch_data['created_date']."</td>";
											echo "<td>"."Installed"."</td>";
									echo "</tr>";
									} ?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php include("footer.php") ?>
		</div>
		<!-- Vendor -->
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