<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
$session_id = $_GET['session_id'];
// $MERCHANT_KEY = "LLKwG0";
// $SALT = "qauKbEAJ";
$userfetch_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_order WHERE student_id=$user_id AND session_id=$session_id  "));
//$payment_status = $userfetch_data['payment_status'];
$amount = $userfetch_data['total_amount'];
$data_user = mysqli_fetch_array(mysqli_query($link, "SELECT username, mobile_no, email FROM tbl_glow_students WHERE id=$user_id"));
$name = $data_user['username'];
$email = $data_user['email'];
$phone = $data_user['mobile_no'];
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
	//Request hash
		$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
	if(strcasecmp($contentType, 'application/json') == 0){
		$data = json_decode(file_get_contents('php://input'));
		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		$json=array();
		$json['success'] = $hash;
	echo json_encode($json);
	
	}
	exit(0);
}
function getCallbackUrl()
{
	//$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return 'https://pinkrickshawdesign.in/its/class/response.php';
}
?>
<!DOCTYPE html>
<head>
	<?php include("header.php") ?>
	<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
	color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>
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
							<h1>PayUmoney Payment</h1>
						</div>
					</div>
				</div>
			</section>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="heading heading-border heading-bottom-border">
							<h3>Pay <strong>Form</strong></h3>
						</div>
						<div class="featured-boxes">
							<div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-6">
									<div class="featured-box featured-box-primary text-left mt-5">
										<div class="box-content">
											<h2 class="heading-primary text-uppercase mb-3">Your Credentials</h2>
											<form action="#" id="payment_form">
												<input type="hidden" id="udf5" name="udf5" value="<?php echo $session_id ?>" />
												<input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
												<input type="hidden" id="key" name="key" value="D8BWzHpo" />
												<input type="hidden" id="salt" name="salt" value="FsQ77dThCb" />
												<input type="hidden" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" />
												<input type="hidden" name="amount" id="amount" value="<?php echo $amount ?>" />
												<input type="hidden" name="fname" id="fname" value="<?php echo $name; ?>" />
												<input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
												<input type="hidden" id="pinfo" name="pinfo" placeholder="Product Info" value="ITS SESSION" />
												<input type="hidden" name="mobile" id="mobile" value="<?php echo $phone; ?>" />
												<input type="hidden" id="hash" name="hash" placeholder="Hash" value="" />
												<div class="form-row">
													<div class="form-group col">
														<label>Amount</label>
														<input value="<?php echo $amount ?>" class="form-control form-control-lg" readonly="">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label>Name</label>
														<input value="<?php echo $name ?>" class="form-control form-control-lg" readonly="">
													</div>
												</div>
												
												<div class="form-row">
													<div class="form-group col">
														<label>Email Address</label>
														<input id="" value="<?php echo $email ?>" class="form-control form-control-lg" readonly="">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label>Phone Number</label>
														<input value="<?php echo $phone ?>" class="form-control form-control-lg" readonly="">
													</div>
												</div>
												
												<div class="form-row">
													<div class="form-group">
														<input type="submit" class="btn btn-primary btn-block" value="Pay Here" onclick="launchBOLT(); return false;" />
													</div>
												</div>
											</form>
										</div>
									</div
								</div>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("footer.php") ?>
	</div>
	<!-- Vendor -->
	<?php include("footer_files.php"); ?>
	<script type="text/javascript"><!--
		$(document).ready(function(){
	//$('#payment_form').bind('keyup blur', function(){
	$.ajax({
	url: 'pay_form.php',
	type: 'post',
	data: JSON.stringify({
	key: $('#key').val(),
		salt: $('#salt').val(),
		txnid: $('#txnid').val(),
		amount: $('#amount').val(),
	pinfo: $('#pinfo').val(),
	fname: $('#fname').val(),
		email: $('#email').val(),
		mobile: $('#mobile').val(),
		udf5: $('#udf5').val()
	}),
	contentType: "application/json",
	dataType: 'json',
	success: function(json) {
	if (json['error']) {
		$('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
	}
			else if (json['success']) {
			$('#hash').val(json['success']);
	}
	}
	});
	});
	//-->
	</script>
	<script type="text/javascript"><!--
	function launchBOLT()
	{
		bolt.launch({
		key: $('#key').val(),
		txnid: $('#txnid').val(),
		hash: $('#hash').val(),
		amount: $('#amount').val(),
		firstname: $('#fname').val(),
		email: $('#email').val(),
		phone: $('#mobile').val(),
		productinfo: $('#pinfo').val(),
		udf5: $('#udf5').val(),
		surl : $('#surl').val(),
		furl: $('#surl').val(),
			mode: 'dropout'
	},{ responseHandler: function(BOLT){
				console.log( BOLT.response.txnStatus );
		if(BOLT.response.txnStatus != 'CANCEL')
		{
			//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
			var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
								'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
								'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
								'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
								'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
								'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
								'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
								'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
								'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
								'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
								'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
								'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
			'</form>';
			var form = jQuery(fr);
			jQuery('body').append(form);
			form.submit();
		}
	},
		catchException: function(BOLT){
			alert( BOLT.message );
		}
	});
	}
	//--
	</script>
</body>
</html>