<?php
include("auth.php");
$user_id = $_SESSION['user_id'];
$flagg = "true";
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<link rel="stylesheet" type="text/css" href="../css/funkyradio.css">
		<link rel="stylesheet" type="text/css" href="../vendor/datetimepicker/datetimepicker.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style type="text/css">
		form label {
		color: black;
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
								<h1>Add Session</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="featured-box featured-box-primary text-left mt-5">
						<div class="box-content">
							<div class="row">
								<div class="col">
									<form class="form-horizontal" role="form">
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label>Start Date</label>
												<input type="text" id="date_start" class="form-control form-control-lg" placeholder="Start Date">
											</div>
											<div class="form-group col-lg-6">
												<label>End Date</label>
												<input type="text" id="date_end" class="form-control form-control-lg"  placeholder="Date">
											</div>
										</div>
										<div class="sessions">
											<h5>Time Slots</h5>
											<div class="form-row">
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="first" value="06:00-07:00" name="slots"/>
															<label for="first">06:00 - 07:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="second" value="07:00-08:00" name="slots"/>
															<label for="second">07:00 - 08:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="third" value="08:00-09:00" name="slots" />
															<label for="third">08:00 - 09:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="fourth" value="09:00-10:00" name="slots" />
															<label for="fourth">09:00 - 10:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="five" value="10:00-11:00" name="slots" />
															<label for="five">10:00 - 11:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="six" value="11:00-12:00" name="slots" />
															<label for="six">11:00 - 12:00</label>
														</div>
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="seven" value="12:00-13:00" name="slots" />
															<label for="seven">12:00 - 13:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="eight" value="13:00-14:00" name="slots" />
															<label for="eight">13:00 - 14:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="nine" value="14:00-15:00" name="slots" />
															<label for="nine">14:00 - 15:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="ten" value="15:00-16:00" name="slots" />
															<label for="ten">15:00 - 16:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="eleven" value="16:00-17:00" name="slots" />
															<label for="eleven">16:00 - 17:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="twelve" value="17:00-18:00" name="slots" />
															<label for="twelve">17:00 - 18:00</label>
														</div>
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="thirteen" value="18:00-19:00" name="slots" />
															<label for="thirteen">18:00 - 19:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="fourteen" value="08:00-09:00" name="slots" />
															<label for="fourteen">19:00 - 20:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="fifteen" value="20:00-21:00" name="slots" />
															<label for="fifteen">20:00 - 21:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="sixteen" value="21:00-22:00" name="slots" />
															<label for="sixteen">21:00 - 22:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="seventeen" value="22:00-23:00" name="slots" />
															<label for="seventeen">22:00 - 23:00</label>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="funkyradio">
														<div class="funkyradio-default">
															<input type="checkbox" id="eighteen" value="23:00-24:00" name="slots" />
															<label for="eighteen">23:00 - 24:00</label>
														</div>
													</div>
												</div>
											</div>
											<div class="form-row mt-5" style="border: 2px solid #D1D3D4;">
												<div class="col-md-2"></div>
												<div class="col-md-4">
													<label for="Individual"><input type="radio" id="Individual" name="session_type" value="individual" checked="">
												Individual Session</label>
											</div>
											<div class="col-md-4">
												<label for="group" class="form-check-label" >
													<input type="radio" id="group" name="session_type" value="group">Group Session</label>
													<div class="col-md-2"></div>
												</div>
											</div>
											<div class="form-row mt-5">
												<div class="col-md-12">
													<button type="button" class="btn btn-primary" id="add_session" style="width: 100%;">Add Session</button>
												</div>
											</div>
										</div>
										<div class="form-group" style="padding-top: 20px;">
											<div class="col-md-12">
												<button type="button" class="btn btn-primary" id="final-submit" style="width: 100%">Save your Session</button>
											</div>
											
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- Vendor -->
            <?php include("footer_files.php") ?>
			<script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
           						<script src="../vendor/datetimepicker/datetimepicker.js"></script>
			<script type="text/javascript">
			$(document).ready(function(){
			$("#final-submit").hide();
			state = '';
			$('#date_start,#date_end ').bootstrapMaterialDatePicker
			({
				minDate : new Date(),
			weekStart : 0, time: false
			});
			$('#all_pref').click(function() {
			$('.pref').each(function() {
			if(!state) {
			this.checked = true;
			} else {
			this.checked = false;
			}
			});
			if (state) {
			state = false;
			} else {
			state = true;
			}
			});
			///////////////code for adding session/////////////////////
			var session_wrapper = $('.sessions');
			$("#add_session").click(function(){
			$("#final-submit").show();
			var st_date = $('#date_start').val();
			var end_date = $('#date_end').val();
			var string_of_sessions = $('input[name="slots"]:checked:not(:disabled)').map(function() {
			return $(this).val().toString();
			} ).get().join(",");
			var session_group = $('input[name=session_type]:checked').val();
			if(new Date(st_date) <= new Date(end_date)) {
			var fields = '<div class="form-row mt-4"><div class="form-group col-lg-3"><label>start date</label><input type="text" id="t_start" name="start[]" value='+st_date+' class="form-control form-control-lg"></div><div class="form-group col-lg-3"><label>End date</label><input type="text" id="t_start" name="end[]" value='+end_date+' class="form-control form-control-lg"></div><div class="form-group col-lg-3"><label>Time Slots</label><input type="text" id="t_start" name="slots[]" value='+string_of_sessions+' class="form-control form-control-lg"></div><div class="form-group col-lg-3"><label>Session Type</label><input type="text" id="t_start" name="group[]" value='+session_group+' class="form-control form-control-lg"></div></div>';
			$(session_wrapper).append(fields);
			$('#date_start').val('');
			$('#date_end').val('');
			$.ajax({
			type:'POST',
			url:'includes/profile/delivery.php',
			data:{'start_date': st_date, 'end_date': end_date, 'slots': string_of_sessions, 'type': session_group },
			success:function(data){
			swal('success','successfully added the session','success');	
			}
			});
			$('input[name="slots"]:checked').prop("disabled", true);
			} else	{
			swal("error!","start Date cannot be greater than end Date", "error");
			}
			});
			////////////////code for removing session here///////////
			$(session_wrapper).on('click', '.remove_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove();
			});
			////////////////////////////Final form submission//////
			$("#final-submit").click(function(){
			var sts_date = $('#date_start').val();
			var ends_date = $('#date_end').val();
			var sessions_group = $('input[name=session_type]:checked').val();
			if((sts_date == null) || (ends_date == null) || (sessions_group == null)) {
			swal('error','please add a session');
			} else {
			swal('success','successfully added the session','success');
			}
			});
			});
			</script>
			
		</body>
	</html>