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
								<h1>Uploaded Session Files</h1>
							</div>
						</div>
					</div>
				</section>
				
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="tabs tabs-bottom tabs-center tabs-simple">
								<ul class="nav nav-tabs">
									<li class="nav-item active">
										<a class="nav-link" href="#tabsNavigationSimpleIcons1" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured fas fa-user"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0" style="color: #1b68b2;">Your Files</p>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimpleIcons2" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured fas fa-file"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0" style="color: #1b68b2;">Others Files</p>
										</a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tabsNavigationSimpleIcons1">
										<div class="text-center">
											<h4>Files Uploaded by You</h4>
											<table class="table table-bordered table-hover" id="personal">
												<thead id="head1">
												</thead>
												<tbody id="Content1">
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tabsNavigationSimpleIcons2">
										<div class="text-center">
											<h4>Files Uploaded by Other Users</h4>
											<table class="table table-bordered table-hover" id="others">
												<thead id="head2">
												</thead>
												<tbody id="Content2">
												</tbody>
											</table>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- Vendor -->
			<?php include("footer_files.php") ?>
			<script type="text/javascript">
			$(document).ready(function() {
			$.ajax({
			url: "../api/view_file.php",
			type: "POST",
			data: { user_id: '<?php echo $user_id ?>', role_type: 'teacher'},
			dataType: "json"
			}).done(function(data) {
			if (!$.trim(data)) {
			$('#Content1').append('<tr><td>No Record Found</td></tr>');
			} else {
			$('#head1').append('<tr><th>Upload Date :</th><th>File Name :</th><th>File Link :</th></tr>');
			$.each(data, function(index, element) {
			$('#Content1').append('<tr><td>'+element.date+'</td><td>' + element.file_name + '</td><td><span><a href="' + element.file_link + '" class="btn btn-primary mb-2" download="' + element.file_name + '">Download</a></span></td></tr>');
			});
			$('#personal').DataTable();
			}
			return false;
			});
			$.ajax({
			url: "../api/view_file_other.php",
			type: "POST",
			data: { user_id: '<?php echo $user_id ?>', role_type: 'teacher'},
			dataType: "json"
			}).done(function(data) {
			if (!$.trim(data)) {
			$('#Content2').append('<tr><td>No Record Found</td></tr>');
			} else {
			$('#head2').append('<tr><th>Upload Date :</th><th>File Name :</th><th>File Link :</th></tr>');
			$.each(data, function(index, element) {
			$('#Content2').append('<tr><td>'+element.date+'</td><td>' + element.file_name + '</td><td><span><a href="' + element.file_link + '" class="btn btn-primary mb-2">Download</a></span></td></tr>');
			});
		    $('#others').DataTable();
			}
			return false;
			});
			});
			</script>
			
			
		</body>
	</html>