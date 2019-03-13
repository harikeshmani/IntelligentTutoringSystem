<?php
$lang = $_GET['lang'];
include("auth.php");
$user_id = $_SESSION['userid'];
$user_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = '$user_id'"));
$contry_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM countries WHERE id = '".$user_data['country']."'"));
$country = $contry_database['name'];
$state =$user_data['state'];
$state_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM states WHERE id = '".$state."'"));
$state = $state_database['name'];
$city =  $user_data['city'];
$city_database = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM cities WHERE id = '".$city."'"));
$city = $city_database['name'];
$picture = $user_data['pic'];
$country_data=mysqli_query($link,"SELECT * FROM countries ");
$country_num=mysqli_num_rows($country_data);
if(isset($_POST['submit'])) {
$result = mysqli_query($link, "UPDATE tbl_glow_students SET address= '".$_POST['address']."', street= '".$_POST['street']."', locality= '".$_POST['locality']."', post_code = '".$_POST['post_code']."', city='".$_POST['city']."', state='".$_POST['state']."', country= '".$_POST['country']."' WHERE id = '$user_id'");
if($result) {
	echo "ok";
} else {
	echo "failure";
}
exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<style type="text/css">
			form label {
				color: #1d68b2;
			}
			label .error {
		color: #1d68b2;
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
								<h1>
								<?php if($lang=='hn') { ?>
								ग्राहक सेवा
								<?php } else if($lang=='mt') { ?>
								ग्राहक सेवा
								<?php } else if($lang=='tl') { ?>
								వినియోగదారుల సేవ
								<?php } else { ?>
								customer service
								<?php }	?>
								</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<?php if($lang=='hn') { ?>
							<h2>अपने  <strong>आर्डर मैनेज </strong>करें </h2>
							<?php } else if($lang=='mt') { ?>
							<h2>अपने  <strong>आर्डर मैनेज </strong>करें </h2>
							<?php } else if($lang=='tl') { ?>
							<h2>మీ    <strong>ఆర్డర్లను </strong>నిర్వహించండి </h2>
							<?php } else { ?>
							<h2>manage your <strong>orders </strong></h2>
							<?php }	?>
							<h2><?php echo $msg; ?></h2>
							<div class="tabs tabs-bottom tabs-center tabs-simple">
								<ul class="nav nav-tabs">
									<li class="nav-item active">
										<a class="nav-link" href="#tabsNavigationSimpleIcons1" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured icon-credit-card icons"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0" style="color: #1b68b2;">
												<?php if($lang=='hn') { ?>
												रिटर्न एंड रिफंड
												<?php } else if($lang=='mt') { ?>
												रिटर्न एंड रिफंड
												<?php } else if($lang=='tl') { ?>
												తిరిగి మరియు వాపసు
												<?php } else { ?>
												Request and refund
												<?php }	?>
											</p>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabsNavigationSimpleIcons2" data-toggle="tab">
											<span class="featured-boxes featured-boxes-style-6 p-0 m-0">
												<span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
													<span class="box-content p-0 m-0">
														<i class="icon-featured icon-settings icons"></i>
													</span>
												</span>
											</span>
											<p class="mb-0 pb-0" style="color: #1b68b2;">
												<?php if($lang=='hn') { ?>
												अकाउंट सेटिंग
												<?php } else if($lang=='mt') { ?>
												अकाउंट सेटिंग
												<?php } else if($lang=='tl') { ?>
											ఖాతా సెట్టింగ్</p>
											<?php } else { ?>
											Account Settings
											<?php }	?>
										</p>
									</a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tabsNavigationSimpleIcons1">
									<div class="text-center">
										<h4>
										<?php if($lang=='hn') { ?>
										रिटर्न एंड रिफंड
										<?php } else if($lang=='mt') { ?>
										रिटर्न एंड रिफंड
										<?php } else if($lang=='tl') { ?>
										తిరిగి మరియు వాపసు
										<?php } else { ?>
										Request and refund
										<?php }	?>
										</h4>
										<table class="table table-bordered table-hover" id="refund_tab">
											<?php if($lang=='hn') { ?>
											<thead>
												<tr>
													<th>आर्डर टाइप </th>
													<th>तारीख</th>
													<th>के साथ </th>
													<th>रकम</th>
													<th>वर्तमान स्थिति</th>
													<th>रिफंड रक्वेस्ट</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$qry = mysqli_query($link, "SELECT * FROM tbl_order WHERE student_id='$user_id' AND payment_status = 'paid'");
												while($userfetch_data=mysqli_fetch_array($qry))
												{
												$tutor_id = $userfetch_data['tutor_id'];
												$userfetch_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id=$tutor_id  "));
												$tutor_name = $userfetch_dataa['first_name'];
												echo '<tr>';
														echo "<td>". $userfetch_data['order_type'] ."</td>";
														echo "<td>". $userfetch_data['order_date'] ."</td>";
														echo "<td>".$tutor_name ."</td>";
															echo "<td> ".$userfetch_data['total_amount'] ."</td>";
															echo "<td>". $userfetch_data['student_status'] ."</td>";
															echo "<td><a href='refunds.php?orderid=".urlencode( base64_encode($userfetch_data['session_id']))."&session_id=".urlencode( base64_encode($userfetch_data['session_id']))."&room_name=".urlencode( base64_encode($userfetch_data['room_name']))."'><button class
															='btn btn-primary'>रिफंड/रक्वेस्ट</button></a></td>";
												echo '</tr>';
												}
												?>
											</tbody>
											<?php } else if($lang=='mt') { ?>
											<thead>
												<tr>
													<th>आर्डर टाइप </th>
													<th>तारीख</th>
													<th>के साथ </th>
													<th>रकम</th>
													<th>वर्तमान स्थिति</th>
													<th>रिफंड रक्वेस्ट</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$qry = mysqli_query($link, "SELECT * FROM tbl_order WHERE student_id='$user_id' AND payment_status = 'paid'");
												while($userfetch_data=mysqli_fetch_array($qry))
												{
												$tutor_id = $userfetch_data['tutor_id'];
												$userfetch_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id=$tutor_id  "));
												$tutor_name = $userfetch_dataa['first_name'];
												echo '<tr>';
												echo "<td>". $userfetch_data['order_type'] ."</td>";
												echo "<td>". $userfetch_data['order_date'] ."</td>";
												echo "<td>".$tutor_name ."</td>";
												echo "<td> ".$userfetch_data['total_amount'] ."</td>";
												echo "<td>". $userfetch_data['student_status'] ."</td>";
												echo "<td><a href='refunds.php?orderid=".urlencode( base64_encode($userfetch_data['session_id']))."&session_id=".urlencode( base64_encode($userfetch_data['session_id']))."&room_name=".urlencode( base64_encode($userfetch_data['room_name']))."'><button class
												='btn btn-primary'>रिफंड/रक्वेस्ट</button></a></td>";
												echo '</tr>';
												}
												?>
											</tbody>
											<?php } else if($lang=='tl') { ?>
											<thead>
												<tr>
													<th> oredr రకం </th>
													<th> తేదీ </th>
													<th> తో </th>
													<th> మొత్తాన్ని </th>
													<th> ప్రస్తుత స్థితి </th>
													<th> తిరిగి చెల్లింపు అభ్యర్థన </th>
												</tr>
											</thead>
											<tbody>
												<?php
												$qry = mysqli_query($link, "SELECT * FROM tbl_order WHERE student_id='$user_id' AND payment_status = 'paid'");
												while($userfetch_data=mysqli_fetch_array($qry))
												{
												$tutor_id = $userfetch_data['tutor_id'];
												$userfetch_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id=$tutor_id  "));
												$tutor_name = $userfetch_dataa['first_name'];
												echo '<tr>';
												echo "<td>". $userfetch_data['order_type'] ."</td>";
												echo "<td>". $userfetch_data['order_date'] ."</td>";
												echo "<td>".$tutor_name ."</td>";
												echo "<td> ".$userfetch_data['total_amount'] ."</td>";
												echo "<td>". $userfetch_data['student_status'] ."</td>";
												echo "<td><a href='refunds.php?orderid=".urlencode( base64_encode($userfetch_data['session_id']))."&session_id=".urlencode( base64_encode($userfetch_data['session_id']))."&room_name=".urlencode( base64_encode($userfetch_data['room_name']))."'><button class
												='btn btn-primary'>వాపసు అభ్యర్థనను</button></a></td>";
												echo '</tr>';
												}
												?>
											</tbody>
											<?php } else { ?>
											<thead>
												<tr>
													<th>order type </th>
													<th>date</th>
													<th>With </th>
													<th>amount</th>
													<th>status</th>
													<th>refund request</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$qry = mysqli_query($link, "SELECT * FROM tbl_order WHERE student_id='$user_id' AND payment_status = 'paid'");
												while($userfetch_data=mysqli_fetch_array($qry))
												{
												$tutor_id = $userfetch_data['tutor_id'];
												$userfetch_dataa = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id=$tutor_id  "));
												$tutor_name = $userfetch_dataa['first_name'];
												echo '<tr>';
												echo "<td>". $userfetch_data['order_type'] ."</td>";
												echo "<td>". $userfetch_data['order_date'] ."</td>";
												echo "<td>".$tutor_name ."</td>";
												echo "<td> ".$userfetch_data['total_amount'] ."</td>";
												echo "<td>". $userfetch_data['student_status'] ."</td>";
												echo "<td><a href='refunds.php?orderid=".urlencode( base64_encode($userfetch_data['session_id']))."&session_id=".urlencode( base64_encode($userfetch_data['session_id']))."&room_name=".urlencode( base64_encode($userfetch_data['room_name']))."'><button class='btn btn-primary'>refund /request</button></a></td>";
												echo '</tr>';
												}
												?>
											</tbody>
											<?php }	?>
										</table>
									</div>
								</div>
								<div class="tab-pane" id="tabsNavigationSimpleIcons2">
									<div class="text-center">
										<h4>
										<?php if($lang=='hn') { ?>
										अपनी प्रोफाइल अपडेट करें
										<?php } else if($lang=='mt') { ?>
										अपनी प्रोफाइल अपडेट करें
										<?php } else if($lang=='tl') { ?>
										మీ ప్రొఫైల్ని నవీకరించండి
										<?php } else { ?>
										update your profile
										<?php }	?>
										</h4>
									</div>
									<form name="update-form" id="add-form" type="post" action="">
										<div class="form-row">
											<div class="form-group col">
												<label>
													<?php if($lang=='hn') { ?>
													पता
													<?php } else if($lang=='mt') { ?>
													पता
													<?php } else if($lang=='tl') { ?>
													చిరునామా
													<?php } else { ?>
													Address
													<?php }	?>
												</label>
												<input type="text" name="address" class="form-control form-control-lg" value="<?php echo $user_data['address'] ?>" required="">
											</div>
											<div class="form-group col">
												<label>
													<?php if($lang=='hn') { ?>
													सड़क
													<?php } else if($lang=='mt') { ?>
													सड़क
													<?php } else if($lang=='tl') { ?>
													వీధి
													<?php } else { ?>
													street
													<?php }	?>
												</label>
												<input type="text" name="street" class="form-control form-control-lg" value="<?php echo $user_data['street'] ?>" required="">
											</div>
											<div class="form-group col">
												<label>
													<?php if($lang=='hn') { ?>
													इलाके
													<?php } else if($lang=='mt') { ?>
													इलाके
													<?php } else if($lang=='tl') { ?>
													ప్రాంతం
													<?php } else { ?>
													locality
													<?php }	?>
												</label>
												<input type="text" name="locality" class="form-control form-control-lg" value="<?php echo $user_data['locality'] ?>" required="">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<?php if($lang=='hn') { ?>
												<label>देश:</label>
												<select class="form-control form-control-lg" id="country" name="country" required="">
													<option value="<?php echo $country; ?>"><?php echo $country; ?> </option>
													<?php
													if($country_num > 0){
													while($con_vals=mysqli_fetch_array($country_data)){ ?>
													<option value="<?php echo $con_vals['id']; ?>"><?php echo $con_vals['name']; ?></option>
													<?php } }else{ echo '<option value="">देश उपलब्ध नहीं है</option>';} ?>
												</select>
												<?php } else if($lang=='mt') { ?>
												<label>देश:</label>
												<select class="form-control form-control-lg" id="country" name="country" required="">
													<option value="<?php echo $country; ?>"><?php echo $country; ?> </option>
													<?php
													if($country_num > 0){
													while($con_vals=mysqli_fetch_array($country_data)){ ?>
													<option value="<?php echo $con_vals['id']; ?>"><?php echo $con_vals['name']; ?></option>
													<?php } }else{ echo '<option value="">देश उपलब्ध नहीं है</option>';} ?>
												</select>
												<?php } else if($lang=='tl') { ?>
												<label>దేశం:</label>
												<select class="form-control form-control-lg" id="country" name="country" required="">
													<option value="<?php echo $country; ?>"><?php echo $country; ?> </option>
													<?php
													if($country_num > 0){
													while($con_vals=mysqli_fetch_array($country_data)){ ?>
													<option value="<?php echo $con_vals['id']; ?>"><?php echo $con_vals['name']; ?></option>
													<?php } }else{ echo '<option value="">देश उपलब्ध नहीं है</option>';} ?>
												</select>
												<?php } else { ?>
												<label>Country:</label>
												<select class="form-control form-control-lg" id="country" name="country" required="">
													<option value="<?php echo $country; ?>"><?php echo $country; ?> </option>
													<?php
													if($country_num > 0){
													while($con_vals=mysqli_fetch_array($country_data)){ ?>
													<option value="<?php echo $con_vals['id']; ?>"><?php echo $con_vals['name']; ?></option>
													<?php } }else{ echo '<option value="">country not available</option>';} ?>
												</select>
												<?php }	?>
												
											</div>
											<div class="form-group col">
												<?php if($lang=='hn') { ?>
												<label>राज्य</label>
												<?php } else if($lang=='mt') { ?>
												<label>राज्य</label>
												<?php } else if($lang=='tl') { ?>
												<label>రాష్ట్రం</label>
												<?php } else { ?>
												<label>State</label>
												<?php }	?>
												<select  class="form-control form-control-lg" name="state" id="state" required="" >
													<option value="<?php echo $state; ?>"><?php echo $state; ?> </option>
												</select>
											</div>
											<div class="form-group col">
												<?php if($lang=='hn') { ?>
												<label>शहर:</label>
												<?php } else if($lang=='mt') { ?>
												<label>शहर:</label>
												<?php } else if($lang=='tl') { ?>
												<label>సిటీ:</label>
												<?php } else { ?>
												<label>city:</label>
												<?php }	?>
												<select  class="form-control form-control-lg" name="city" id="city" >
													<option value="<?php echo $city; ?>"><?php echo $city; ?></option>
												</select>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												
												<label>
													<?php if($lang=='hn') { ?>
													पोस्ट कोड
													<?php } else if($lang=='mt') { ?>
													पोस्ट कोड
													<?php } else if($lang=='tl') { ?>
													పోస్ట్ కోడ్
													<?php } else { ?>
													post code
													<?php }	?>
												</label>
												<input type="text" name="post_code" class="form-control form-control-lg" value="<?php echo $user_data['post_code'] ?>" required="">
											</div>
											<div class="form-group col">
												<button type="submit" name="submit" class="btn btn-primary btn-xl mt-3 m-4">
												<?php if($lang=='hn') { ?>
												अपडेट करें
												<?php } else if($lang=='mt') { ?>
												अद्ययावत करा												<?php } else if($lang=='tl') { ?>
												నవీకరణ
												<?php } else { ?>
												Update your address
												<?php }	?>
												</button>
											</div>
										</div>
									</form>
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
	$(document).ready(function(){
	$('#refund_tab').dataTable();
	$('#country').on('change',function(){
	var countryID = $(this).val();
	if(countryID){
	$.ajax({
	type:'POST',
	url:'php/location_hn.php',
	data:'country_id='+countryID,
	success:function(html){
	$('#state').html(html);
	$('#city').html('<option value="">पहले राज्य का चयन करें</option>');
	}
	});
	}else{
	$('#state').html('<option value="">पहले देश का चयन करें</option>');
	$('#city').html('<option value="">पहले राज्य का चयन करें</option>');
	}
	});
	$('#state').on('change',function(){
	var stateID = $(this).val();
	if(stateID){
	$.ajax({
	type:'POST',
	url:'php/location_hn.php',
	data:'state_id='+stateID,
	success:function(html){
	$('#city').html(html);
	}
	});
	}else{
	$('#city').html('<option value="">पहले राज्य का चयन करें</option>');
	}
	});
	$("form[name='update-form']").validate({
	submitHandler: addstudentform
	});
	function addstudentform() {
	var form = $("#add-form");
	var formData = new FormData(form[0]);
	$.ajax({
	url  : '',
	type : "POST",
	data: formData,
	success :  function(data) {
	if(data == 'ok') {
	$.alert({
	title: 'सफलता!',
	content: 'सफलतापूर्वक अपना पता अपडेट किया गया',
	buttons: {
	ok: function () {
	window.location.href = 'customer_service.php?lang=hn';
	}
	},
	});
	} else {
	$.alert({
	title: 'त्रुटि!',
	content: 'कुछ समय बाद पुनः प्रयास करें'
	});
	}
	},
	cache: false,
	contentType: false,
	processData: false
	});
	}
	});
	</script>
	<?php } else if($lang=='mt') { ?>
	<script type="text/javascript">
	$(document).ready(function(){
	$('#refund_tab').dataTable();
	$('#country').on('change',function(){
	var countryID = $(this).val();
	if(countryID){
	$.ajax({
	type:'POST',
	url:'php/location_mt.php',
	data:'country_id='+countryID,
	success:function(html){
	$('#state').html(html);
	$('#city').html('<option value="">पहले राज्य का चयन करें</option>');
	}
	});
	}else{
	$('#state').html('<option value="">पहले देश का चयन करें</option>');
	$('#city').html('<option value="">पहले राज्य का चयन करें</option>');
	}
	});
	$('#state').on('change',function(){
	var stateID = $(this).val();
	if(stateID){
	$.ajax({
	type:'POST',
	url:'php/location_mt.php',
	data:'state_id='+stateID,
	success:function(html){
	$('#city').html(html);
	}
	});
	}else{
	$('#city').html('<option value="">पहले राज्य का चयन करें</option>');
	}
	});
	$("form[name='update-form']").validate({
	submitHandler: addstudentform
	});
	function addstudentform() {
	var form = $("#add-form");
	var formData = new FormData(form[0]);
	$.ajax({
	url  : '',
	type : "POST",
	data: formData,
	success :  function(data) {
	if(data == 'ok') {
	$.alert({
	title: 'सफलता!',
	content: 'सफलतापूर्वक अपना पता अपडेट किया गया',
	buttons: {
	ok: function () {
	window.location.href = 'customer_service.php?lang=mt';
	}
	},
	});
	} else {
	$.alert({
	title: 'त्रुटि!',
	content: 'कुछ समय बाद पुनः प्रयास करें'
	});
	}
	},
	cache: false,
	contentType: false,
	processData: false
	});
	}
	});
	</script>
	<?php } else if($lang=='tl') { ?>
	<script type="text/javascript">
	$(document).ready(function(){
	$('#refund_tab').dataTable();
	$('#country').on('change',function(){
	var countryID = $(this).val();
	if(countryID){
	$.ajax({
	type:'POST',
	url:'php/location_tl.php',
	data:'country_id='+countryID,
	success:function(html){
	$('#state').html(html);
	$('#city').html('<option value="">पమొదటి రాష్ట్ర ఎంచుకోండి</option>');
	}
	});
	}else{
	$('#state').html('<option value="">మొదట దేశాన్ని ఎంచుకోండి</option>');
	$('#city').html('<option value="">మొదటి రాష్ట్ర ఎంచుకోండి</option>');
	}
	});
	$('#state').on('change',function(){
	var stateID = $(this).val();
	if(stateID){
	$.ajax({
	type:'POST',
	url:'php/location_tl.php',
	data:'state_id='+stateID,
	success:function(html){
	$('#city').html(html);
	}
	});
	}else{
	$('#city').html('<option value="">మొదటి రాష్ట్ర ఎంచుకోండి</option>');
	}
	});
	$("form[name='update-form']").validate({
	submitHandler: addstudentform
	});
	function addstudentform() {
	var form = $("#add-form");
	var formData = new FormData(form[0]);
	$.ajax({
	url  : '',
	type : "POST",
	data: formData,
	success :  function(data) {
	if(data == 'ok') {
	$.alert({
	title: 'విజయం!',
	content: 'మీ చిరునామా విజయవంతంగా నవీకరించబడింది',
	buttons: {
	ok: function () {
	window.location.href = 'customer_service.php?lang=tl';
	}
	},
	});
	} else {
	$.alert({
	title: 'లోపం!',
	content: 'దయచేసి కొంత సమయం తర్వాత ప్రయత్నించండి'
	});
	}
	},
	cache: false,
	contentType: false,
	processData: false
	});
	}
	});
	</script>
	<?php } else { ?>
	<script type="text/javascript">
	$(document).ready(function(){
	$('#refund_tab').dataTable();
	$('#country').on('change',function(){
	var countryID = $(this).val();
	if(countryID){
	$.ajax({
	type:'POST',
	url:'php/location.php',
	data:'country_id='+countryID,
	success:function(html){
	$('#state').html(html);
	$('#city').html('<option value="">select state first</option>');
	}
	});
	}else{
	$('#state').html('<option value="">select country first</option>');
	$('#city').html('<option value="">select state first</option>');
	}
	});
	$('#state').on('change',function(){
	var stateID = $(this).val();
	if(stateID){
	$.ajax({
	type:'POST',
	url:'php/location.php',
	data:'state_id='+stateID,
	success:function(html){
	$('#city').html(html);
	}
	});
	}else{
	$('#city').html('<option value="">select state first</option>');
	}
	});
	$("form[name='update-form']").validate({
	submitHandler: addstudentform
	});
	function addstudentform() {
	var form = $("#add-form");
	var formData = new FormData(form[0]);
	$.ajax({
	url  : '',
	type : "POST",
	data: formData,
	success :  function(data) {
	if(data == 'ok') {
	$.alert({
	title: 'success!',
	content: 'successfully updated your profile',
	buttons: {
	ok: function () {
	window.location.href = 'customer_service.php?lang=eng';
	}
	},
	});
	} else {
	$.alert({
	title: 'error!',
	content: 'please, try after some time'
	});
	}
	},
	cache: false,
	contentType: false,
	processData: false
	});
	}
	});
	</script>
	<?php }	?>
</body>
</html>