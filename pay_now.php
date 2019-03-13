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
								<h1>Payment Status</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="heading heading-border heading-bottom-border">
								<h3>Payment <strong></strong></h3>
							</div>
							<table class="table table-bordered table-hover">
								<thead id='heads'>
								</thead>
								<tbody id="Content">
									
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php include("footer.php") ?>
		</div>
		<!-- vendor -->
		<?php include("footer_files.php") ?>
		<script type="text/javascript">
		$(document).ready(function() {
		$.ajax({
		url: "api/get_order_list.php",
		type: "POST",
		data: { user_id: '<?php echo $user_id ?>', role_type: 'student'},
		dataType: "json"
		}).done(function(data) {
		if (!$.trim(data)) {
		$('#Content').append('<tr><td>No Record Found</td></tr>');
		} else {
		$('#heads').append('<tr><th>Session With</th><th>Scheduled Date</th><th>payment Status</th></tr>');
		$.each(data, function(index, element) {
		$('#Content').append('<tr><td>' + element.name + '</td><td>' + element.session_date + '</td><td><button type="button" class="btn btn-primary" onclick=checkit(this) name ='+element.session_id+' value='+element.payment_status+'>'+element.payment_status+'</button></span></td></tr>');
		});
		}
		return false;
		});
		});
		</script>
		<script type="text/javascript">
		function checkit(objButton) {
		var wt_paid = objButton.value;
		var wt_id = objButton.name;
		if (wt_paid == 'Paid') {
		swal("Paid!", "You have alredy paid for this session!", "success");
		} else {
		window.location.replace('pay_form.php?session_id='+wt_id+'');
		}
		
		}
		</script>
		
	</body>
</html>