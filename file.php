<?php
$lang = $_GET['lang'];
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
								आपकी फाइल्स
								<?php } else if($lang=='mt') { ?>
								अपलोड केलेले सत्र फायली
								<?php } else if($lang=='tl') { ?>
								సెషన్ ఫైళ్ళు అప్ లోడ్ అయ్యాయి
								<?php } else { ?>
								Uploaded Session Files
								<?php }	?></h1>
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
											<p class="mb-0 pb-0" style="color: #1b68b2;">
												<?php if($lang=='hn') { ?>
												आप द्वारा अपलोड
												<?php } else if($lang=='mt') { ?>
												आपल्या फायली
												<?php } else if($lang=='tl') { ?>
												మీ ఫైళ్ళు
												<?php } else { ?>
												Your Files
											<?php }	?></p>
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
											<p class="mb-0 pb-0" style="color: #1b68b2;">
												<?php if($lang=='hn') { ?>
												अन्य द्वारा अपलोड
												<?php } else if($lang=='mt') { ?>
												इतर फाइल्स
												<?php } else if($lang=='tl') { ?>
												ఇతర ఫైళ్ళు
												<?php } else { ?>
												Others Files
											<?php }	?></p>
										</a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tabsNavigationSimpleIcons1">
										<div class="text-center">
											<h4>
											<?php if($lang=='hn') { ?>
											आपके द्वारा अपलोड की गई फ़ाइलें
											<?php } else if($lang=='mt') { ?>
											आपल्याद्वारे अपलोड केलेल्या फायली
											<?php } else if($lang=='tl') { ?>
											మీరు అప్లోడ్ చేసిన ఫైళ్ళు
											<?php } else { ?>
											Files Uploaded by You
											<?php }	?></h4>
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
											<h4>
											<?php if($lang=='hn') { ?>
											अन्य उपयोगकर्ताओं द्वारा अपलोड की गई फ़ाइलें
											<?php } else if($lang=='mt') { ?>
											अन्य वापरकर्त्यांनी अपलोड केलेल्या फायली
											<?php } else if($lang=='tl') { ?>
											ఇతర వినియోగదారులు అప్లోడ్ చేసిన ఫైళ్ళు
											<?php } else { ?>
											Files Uploaded by Other Users
											<?php }	?></h4>
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
			<?php if($lang=='hn') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
			$.ajax({
			url: "api/view_file.php",
			type: "POST",
			data: { user_id: '<?php echo $user_id ?>', role_type: 'student'},
			dataType: "json"
			}).done(function(data) {
			if (!$.trim(data)) {
			$('#Content1').append('<tr><td>कोई रिकॉर्ड नहीं पाया गया </td></tr>');
			} else {
			$('#head1').append('<tr><th>अपलोड की तारीख</th><th>फ़ाइल का नाम</th><th>फ़ाइल लिंक</th></tr>');
			$.each(data, function(index, element) {
			$('#Content1').append('<tr><td>'+element.date+'</td><td>' + element.file_name + '</td><td><span><a href="' + element.file_link + '" class="btn btn-primary mb-2" download="' + element.file_name + '">डाउनलोड</a></span></td></tr>');
			});
			$('#personal').DataTable();
			}
			return false;
			});
			$.ajax({
			url: "api/view_file_other.php",
			type: "POST",
			data: { user_id: '<?php echo $user_id ?>', role_type: 'student'},
			dataType: "json"
			}).done(function(data) {
			if (!$.trim(data)) {
			$('#Content2').append('<tr><td>कोई रिकॉर्ड नहीं पाया गया </td></tr>');
			} else {
			$('#head2').append('<tr><th>अपलोड की तारीख</th><th>फ़ाइल का नाम</th><th>फ़ाइल लिंक</th></tr>');
			$.each(data, function(index, element) {
			$('#Content2').append('<tr><td>'+element.date+'</td><td>' + element.file_name + '</td><td><span><a href="' + element.file_link + '" class="btn btn-primary mb-2">डाउनलोड</a></span></td></tr>');
			});
			$('#others').DataTable();
			}
			return false;
			});
			});
			</script>
			<?php } else if($lang=='mt') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
			$.ajax({
			url: "api/view_file.php",
			type: "POST",
			data: { user_id: '<?php echo $user_id ?>', role_type: 'student'},
			dataType: "json"
			}).done(function(data) {
			if (!$.trim(data)) {
			$('#Content1').append('<tr><td>कोणतेही रेकॉर्ड आढळले नाहीत</td></tr>');
			} else {
			$('#head1').append('<tr><th>अपलोड तारीख</th><th>File Name :</th><th>File Link :</th></tr>');
			$.each(data, function(index, element) {
			$('#Content1').append('<tr><td>'+element.date+'</td><td>' + element.file_name + '</td><td><span><a href="' + element.file_link + '" class="btn btn-primary mb-2" download="' + element.file_name + '">डाउनलोड करा</a></span></td></tr>');
			});
			$('#personal').DataTable();
			}
			return false;
			});
			$.ajax({
			url: "api/view_file_other.php",
			type: "POST",
			data: { user_id: '<?php echo $user_id ?>', role_type: 'student'},
			dataType: "json"
			}).done(function(data) {
			if (!$.trim(data)) {
			$('#Content2').append('<tr><td>कोणतेही रेकॉर्ड आढळले नाहीत</td></tr>');
			} else {
			$('#head2').append('<tr><th>अपलोड तारीख</th><th>फाईलचे नाव :</th><th>फाइल दुवा :</th></tr>');
			$.each(data, function(index, element) {
			$('#Content2').append('<tr><td>'+element.date+'</td><td>' + element.file_name + '</td><td><span><a href="' + element.file_link + '" class="btn btn-primary mb-2">डाउनलोड करा</a></span></td></tr>');
			});
			$('#others').DataTable();
			}
			return false;
			});
			});
			</script>
			<?php } else if($lang=='tl') { ?>
			<script type="text/javascript">
			$(document).ready(function() {
			$.ajax({
			url: "api/view_file.php",
			type: "POST",
			data: { user_id: '<?php echo $user_id ?>', role_type: 'student'},
			dataType: "json"
			}).done(function(data) {
			if (!$.trim(data)) {
			$('#Content1').append('<tr><td>రికార్డు కనుగొనబడలేదు</td></tr>');
			} else {
			$('#head1').append('<tr><th>అప్లోడ్ తేదీ</th><th>ఫైల్ పేరు :</th><th>ఫైల్ లింక్ :</th></tr>');
			$.each(data, function(index, element) {
			$('#Content1').append('<tr><td>'+element.date+'</td><td>' + element.file_name + '</td><td><span><a href="' + element.file_link + '" class="btn btn-primary mb-2" download="' + element.file_name + '">డౌన్లోడ్</a></span></td></tr>');
			});
			$('#personal').DataTable();
			}
			return false;
			});
			$.ajax({
			url: "api/view_file_other.php",
			type: "POST",
			data: { user_id: '<?php echo $user_id ?>', role_type: 'student'},
			dataType: "json"
			}).done(function(data) {
			if (!$.trim(data)) {
			$('#Content2').append('<tr><td>రికార్డు కనుగొనబడలేదు</td></tr>');
			} else {
			$('#head2').append('<tr><th>అప్లోడ్ తేదీ</th><th>ఫైల్ పేరు :</th><th>ఫైల్ లింక్ :</th></tr>');
			$.each(data, function(index, element) {
			$('#Content2').append('<tr><td>'+element.date+'</td><td>' + element.file_name + '</td><td><span><a href="' + element.file_link + '" class="btn btn-primary mb-2">డౌన్లోడ్</a></span></td></tr>');
			});
			$('#others').DataTable();
			}
			return false;
			});
			});
			</script>
			<?php } else { ?>
			<script type="text/javascript">
			$(document).ready(function() {
			$.ajax({
			url: "api/view_file.php",
			type: "POST",
			data: { user_id: '<?php echo $user_id ?>', role_type: 'student'},
			dataType: "json"
			}).done(function(data) {
			if (!$.trim(data)) {
			$('#Content1').append('<tr><td>No Record Found</td></tr>');
			} else {
			$('#head1').append('<tr><th>Upload Date</th><th>File Name :</th><th>Download :</th></tr>');
			$.each(data, function(index, element) {
			$('#Content1').append('<tr><td>'+element.date+'</td><td>' + element.file_name + '</td><td><span><a href="' + element.file_link + '" class="btn btn-primary mb-2" download="' + element.file_name + '">Download</a></span></td></tr>');
			});
			$('#personal').DataTable();
			}
			return false;
			});
			$.ajax({
			url: "api/view_file_other.php",
			type: "POST",
			data: { user_id: '<?php echo $user_id ?>', role_type: 'student'},
			dataType: "json"
			}).done(function(data) {
			if (!$.trim(data)) {
			$('#Content2').append('<tr><td>No Record Found</td></tr>');
			} else {
			$('#head2').append('<tr><th>Upload Date</th><th>File Name :</th><th>Download :</th></tr>');
			$.each(data, function(index, element) {
			$('#Content2').append('<tr><td>'+element.date+'</td><td>' + element.file_name + '</td><td><span><a href="' + element.file_link + '" class="btn btn-primary mb-2">Download</a></span></td></tr>');
			});
			$('#others').DataTable();
			}
			return false;
			});
			});
			
			</script>
			<?php }	?>
			
			
		</body>
	</html>