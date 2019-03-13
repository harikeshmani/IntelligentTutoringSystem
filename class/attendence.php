<?php
include("auth.php");
$class_id = $_SESSION['class_id'];
if(isset($_POST['submit'])) {
	$attendence_details = $_POST['attendence_details'];
$array = explode(',', $attendence_details);
foreach($array as $St_id ) {
	$id = $St_id;
$today = date("Y-m-d");
$username_data1 = mysqli_query($link, "SELECT * FROM tbl_attendance WHERE (student_id='$id' and class_id='$class_id' and attendance_date='".$today."' )  ");
$num = mysqli_num_rows($username_data1);
if($num==0){
$result = mysqli_query($link, "INSERT INTO tbl_attendance(student_id, class_id, attendence, attendance_date) VALUES ('$id', '$class_id', 'present', '$today')");
}else{
$result = mysqli_query($link, "UPDATE tbl_attendance SET attendence = 'present' WHERE student_id='$id' ");
}
}
exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<style type="text/css">
		input[type=checkbox].css-checkbox {
		position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
		}
		input[type=checkbox].css-checkbox + label.css-label {
							padding-left:55px;
							height:50px;
							display:inline-block;
							line-height:50px;
							background-repeat:no-repeat;
							background-position: 0 0;
							font-size:15px;
							vertical-align:middle;
							cursor:pointer;
						}
						input[type=checkbox].css-checkbox:checked + label.css-label {
							background-position: 0 -50px;
						}
						label.css-label {
				background-image:url(../img/checkbox.png);
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
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
								<h1>Attendence</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<h4>mark your Students <strong>Attendence</strong></h4>
							<div class="alert alert-success" style="display: none;">
								<strong><i class="far fa-thumbs-up"></i> Well done!</strong> You successfully marked the attendence for the day.
							</div>
							<table class="table table-bordered table-hover" id="example">
								<?php
								$query = mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE class_id = '$class_id' AND class_type = ''");
								if(mysqli_num_rows($query)==0) {
								echo " <td>No Record found</td>";
								} else {
								echo "<thead>";
																echo  "<tr>";
																						echo "<th>Mark Attendence</th>";
																						echo "<th>Name &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th>";
																						echo "<th>Email-id  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th>";
																						echo  "<th>image</th>";
																echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
																				$a = 1;
														while ($qry = mysqli_fetch_array($query)) {
															$st_id = $qry['id'];
									$image = '../api/user_image/'.$qry['pic']; ?>
									<tr class="att">
										<td><input type="checkbox" name="student_ids[]" id="checkbox<?php echo $a; ?>" class="css-checkbox" value="<?php echo $st_id ?>"/><label for="checkbox<?php echo $a ?>" class="css-label">Check to mark present</label></td>
										<td><?php echo $qry['username'];  ?></td>
										<td><?php echo $qry['email']; ?></td>
										<td><span class="img-thumbnail d-block"><img src="<?php echo $image; ?>" height="100" width="100" class="img-fluid"></span></td>
									</tr>
									
									<?php
									$a++;
									} }
									?>
								</tbody>
							</table>
							<button class="btn btn-primary btn-xl" class="save_attendence" id="submit_attendence">Save attedence</button>
							
						</div>
					</div>
					
				</div>
				<?php include("footer.php") ?>
				
			</div>
			<!-- ../vendor -->
			<?php include("footer_files.php") ?>
			<script>
			$(document).ready(function() {
			$("#example").DataTable( {
			"order": [[ 3, "desc" ]]
			} );
			} );
			$("#submit_attendence").click(function() {
			var ids = ($("input[name='student_ids[]']:checked").map(function() {
			return this.value;
			}).get().join(', '));
			$.ajax({
			type: "POST",
			url: "",
			data: {'submit': "submit",'attendence_details': ids},
			success: function(data) {
			$(".alert-success").show();
			$.alert({
			title: 'Success!',
			content: 'You successfully marked the attendence for the day.',
			});
			}
			});
			
			});
			</script>
			
			
		</body>
	</html>