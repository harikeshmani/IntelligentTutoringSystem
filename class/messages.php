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
								<h1>Your Messages</h1>
							</div>
						</div>
					</div>
				</section>
				
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>Chat <strong>With The Users</strong></h3>
							</div>
							<table class="table table-bordered table-hover" id="msgs">
								<tbody>
									<?php
									$quwery = mysqli_query($link, "SELECT DISTINCT tutor_id FROM tbl_chat WHERE student_id = '$user_id'");
									if(mysqli_num_rows($quwery) == 0) {
									echo '<tr>';
												echo "<td>No Record Found</td>";
									echo '</tr>';
									} else {
									while($userfetch_data = mysqli_fetch_array($quwery))
									{
									$tutors_ids = $userfetch_data['tutor_id'];
									$get_student_name =  mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = $tutors_ids"));
									$tutors_ids = urlencode(base64_encode($userfetch_data['tutor_id']));
									$name = $get_student_name['first_name'];
									echo "<thead><tr><th>UserName</th><th>Chat Button</th></tr></thead>";
									echo '<tr>';
												echo "<td>". $name ."</td>";
												echo "<td><a href='chat.php?tutor_id=$tutors_ids'><button type='button' class='btn btn-primary mb-2'>Start Chat</button></a></td>";
									echo '</tr>';
									} }
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
			<script type="text/javascript">
				$(document).ready(function(){
			$('#msgs').dataTable();
				});
			</script>
		</body>
	</html>