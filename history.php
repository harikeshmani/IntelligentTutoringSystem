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
			<div role="main" class="main" >
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>
								<?php if($lang=='hn') { ?>
								इतिहास
								<?php } else if($lang=='mt') { ?>
								इतिहास
								<?php } else if($lang=='tl') { ?>
								చరిత్ర
								<?php } else { ?>
								History
								<?php }	?></h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<table class="table table-bordered table-hover" id="his_tab">
								<?php
								$qry2 = mysqli_query($link, "SELECT * FROM tbl_sessions_rating WHERE student_id=$user_id ");
								if(mysqli_num_rows($qry2) == 0) {
								if($lang=='hn') { 
								echo '<tr>';
											echo "<td><h4>कोई रिकॉर्ड नहीं पाया गया</h4></td>";
									echo '</tr>';
								} else if($lang=='mt') { 
								echo '<tr>';
											echo "<td><h4>कोणतेही रेकॉर्ड आढळले नाहीत</h4></td>";
									echo '</tr>';
								} else if($lang=='tl') { 
								echo '<tr>';
											echo "<td><h4>రికార్డు కనుగొనబడలేదు</h4></td>";
									echo '</tr>';
								 } else { 
								echo '<tr>';
									echo "<td><h4>No Record Found</h4></td>";
								echo '</tr>';
								 }	
								} else { ?>
								<?php if($lang=='hn') { ?>
								<thead>
									<th>विवरण</th>
									<th>तारीख</th>
									<th>रेटिंग</th>
								</thead>
								<?php } else if($lang=='mt') { ?>
								<thead>
									<th>तपशील</th>
									<th>तारीख</th>
									<th>रेटिंग</th>
								</thead>
								<?php } else if($lang=='tl') { ?>
								<thead>
									<th>వివరాలు</th>
									<th>తేదీ</th>
									<th>రేటింగ్లు</th>
								</thead>
								<?php } else { ?>
								<thead>
									<th>subject</th>
									<th>date</th>
									<th>ratings</th>
								</thead>
								<?php }	?>
								<tbody>
									<?php while($userfetch_data=mysqli_fetch_array($qry2))
									{
									$tutor_rating = $userfetch_data['tutor_rating'];
									$order_type = $userfetch_data['session_type'];
									$session_id = $userfetch_data['session_id'];
									$userfetch_dataaa=mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_scheduled_sessions where session_id=$session_id and approval_status='approved' "));
									$tu_id = $userfetch_dataaa['tutor_id'];
									$userfetch_dataaaa=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM tbl_glow_tutor where id=$tu_id "));
									$tu_name = $userfetch_dataaaa['first_name'];
									$room_name = $userfetch_data['room_name'];
									$c_date = $userfetch_data['session_date'];
									$f_date = strtotime($c_date);
									$time = date('d-m-Y', $f_date); ?>
									<tr>
										<?php if($lang=='hn') { ?>
										<td> <?php echo $tu_name ?>  के साथ सत्र</td>
										<?php } else if($lang=='mt') { ?>
										<td><?php echo $tu_name ?> सह सत्र</td>
										<?php } else if($lang=='tl') { ?>
										<td><?php echo $tu_name ?> సెషన్ తో</td>
										<?php } else { ?>
										<td>Session with <?php echo $tu_name; ?></td>
										<?php }	?>
										<td><?php echo $time ?></td>
										<?php echo "<td>";
														for ($i = 0; $i <  $userfetch_data['rating']; $i++) {
														echo  "<i class='fa fa-star' aria-hidden='true'></i>";
										} "</td>"; ?>
									</tr>
									<?php	}
									}
									?>
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
				$(document).ready(function(){
			$('#his_tab').dataTable();
				});
			</script>
			
		</body>
	</html>