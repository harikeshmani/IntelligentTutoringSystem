<?php
include("auth.php");
$class_id = $_SESSION['class_id'];
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
								<h1>Tutors</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>Tutors <strong>List</strong></h3>
							</div>
							<table class="table table-bordered table-hover" id="myTable">
								<thead>
									<tr>
										<th>Name</th>
										<th>Location</th>
										<th>subjects</th>
										<th>Image</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$username_data=mysqli_query($link, "SELECT * FROM tbl_glow_tutor");
									while($userfetch_data=mysqli_fetch_array($username_data))
									{
									$country_id = $userfetch_data['country'] ;
									$tutor_country_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM countries WHERE id = '$country_id' "));
									$country_name = $tutor_country_dataa['name'] ;
									$images = '../api/user_image/tutor/'.$userfetch_data['picture'];
									if($userfetch_data['picture'] == '') {
									$images = '../img/sample.jpg';
									}
									echo "<tr class='info clickable-row' data-href='tutor_detail.php?id=".urlencode(base64_encode($userfetch_data['id']))."'>";
													echo "<td>". $userfetch_data['first_name'] ."</td>";
													echo "<td>". $country_name."</td>";
													echo "<td>". $userfetch_data['primary_subject'] . $userfetch_data['middle_subject']."". $userfetch_data['high_sub_category']."". $userfetch_data['high_subject']."</td>";
													echo "<td><span class='img-thumbnail d-block'><img src=".$images."  alt=".$userfetch_data['first_name']." width='100' height='60' class='img-fluid'></span></td>";
													
									echo "</tr>";
									
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
			<?php include("footer_files.php"); ?>
			<script>
			$(document).ready(function () {
			$(".clickable-row").css( 'cursor', 'pointer' );
			$(".clickable-row").click(function() {
			window.location = $(this).data("href");
			});
			$('#myTable').DataTable();
			} );
			</script>
		</body>
	</html>