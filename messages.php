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
								<h1>
								<?php if($lang=='hn') { ?>
								
								<?php } else if($lang=='mt') { ?>
								
								<?php } else if($lang=='tl') { ?>
								
								<?php } else { ?>
								
								<?php }	?>Your Messages</h1>
							</div>
						</div>
					</div>
				</section>
				
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>
								<?php if($lang=='hn') { ?>
								बातचीत <strong>उपयोगकर्ताओं के साथ</strong>
								<?php } else if($lang=='mt') { ?>
								वापरकर्त्यांसह <strong>गप्पा तपशील</strong>
								<?php } else if($lang=='tl') { ?>
								చాట్ <strong>వినియోగదారులతో</strong>
								<?php } else { ?>
								Chat <strong>With The Users</strong>
								<?php }	?></h3>
							</div>
							<table class="table table-bordered table-hover">
								<tbody>
									<?php
									$quwery = mysqli_query($link, "SELECT DISTINCT tutor_id FROM tbl_chat WHERE student_id = '$user_id'");
									if(mysqli_num_rows($quwery) == 0) {
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
									} else {
									while($userfetch_data = mysqli_fetch_array($quwery))
									{
									$tutors_ids = $userfetch_data['tutor_id'];
									$get_student_name =  mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = $tutors_ids"));
									$tutors_ids = urlencode(base64_encode($userfetch_data['tutor_id']));
									$name = $get_student_name['first_name'];
									if($lang=='hn') {
									echo "<thead><tr><th>नाम</th><th>चैट बटन</th></tr></thead>";
									echo '<tr>';
											echo "<td>". $name ."</td>";
											echo "<td><a href='chat.php?tutor_id=$tutors_ids'><button type='button' class='btn btn-primary mb-2'>बातचीत शुरू कीजिए</button></a></td>";
									echo '</tr>';			
									} else if($lang=='mt') {
									echo "<thead><tr><th>युजरनेम</th><th>गप्पा बटण</th></tr></thead>";
									echo '<tr>';
										echo "<td>". $name ."</td>";
										echo "<td><a href='chat.php?tutor_id=$tutors_ids'><button type='button' class='btn btn-primary mb-2'>चॅट प्रारंभ करा</button></a></td>";
									echo '</tr>';			
									} else if($lang=='tl') {
									echo "<thead><tr><th>సభ్యనామం</th><th>చాట్ బటన్</th></tr></thead>";
								    echo '<tr>';
										echo "<td>". $name ."</td>";
										echo "<td><a href='chat.php?tutor_id=$tutors_ids'><button type='button' class='btn btn-primary mb-2'>చాట్ ప్రారంభించండి</button></a></td>";
								    echo '</tr>';			
									} else {
									echo "<thead><tr><th>UserName</th><th>Chat Button</th></tr></thead>";
									echo '<tr>';
									echo "<td>". $name ."</td>";
									echo "<td><a href='chat.php?tutor_id=$tutors_ids'><button type='button' class='btn btn-primary mb-2'>Start Chat</button></a></td>";
									echo '</tr>';
									}
									} }
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
		</body>
	</html>