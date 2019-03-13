<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
$username_data = mysqli_fetch_array(mysqli_query($link, "SELECT username FROM tbl_glow_students WHERE id = '$user_id'"));
$username = $username_data['username'];
$room = base64_decode( urldecode($_GET['room']));
$session_id = base64_decode( urldecode($_GET['session_id']));
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<script src='https://cdn.firebase.com/js/client/2.4.0/firebase.js'></script>
		<link rel="stylesheet" href="../css/chat.css">
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
								<h1>Online Session</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<div id="meet"></div>
							<button class="btn btn-primary" id="chat" onClick="open_chatbox();"> Chat Now </button>
							<div id="chatBox">
								<div onclick="closeChat()" id="close">X</div> <br><br>
								<div id="results1">
								</div>
								<input id="text" type="text" placeholder="Message" class="form-control form-control-xs">
								<button id="btn" onclick="sendmsg()" class="btn btn-primary">Post</button><br/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="featured-boxes">
								<div class="row">
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
												<h3 class="heading-primary text-uppercase mb-3">Upload Your  <strong>Session</strong> Files</h3>
												<form id="uploadForm" method="post" enctype="multipart/form-data">
													<div class="form-row">
														<div class="form-group col">
															<label>File Type</label>
															<select name="type" class="form-control form-control-lg">
																<option value="Notes">Notes</option>
																<option value="Assignment">Assignment</option>
																<option value="Others">Others</option>
															</select>
															<input type="hidden" name="room_name" value="<?php echo $room; ?>">
															<input type="hidden" name="session_id" value="<?php echo $session_id; ?>" >
														</div>
														<div class="form-group col">
															<label>File Name</label>
															<input name="file_name" type="file" class="form-control form-control-lg">
														</div>
														<div class="form-group col">
															<label>Upload Files</label>
															<button type="button" class="btn btn-primary" style="background-color: #ffffff; color: #1b68b2 " id="aid">Submit</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
												<h3 class="heading-primary text-uppercase mb-3"><strong>Speech</strong> to <strong>text</strong></h3>
												<div class="app">
													<div class="input-single">
														<textarea  form="emailform" name="body" id="note-textarea" placeholder="Create a new note by typing or using voice recognition." rows="5" cols="64"></textarea>
													</div>
													<button id="start-record-btn" title="Start Recording" class="button button1 btn btn-primary">Start</button>
													<button id="pause-record-btn" title="Pause Recording" class="button button1 btn btn-primary">Pause</button>
													<button id="save-note-btn" title="Save Note" class="button button1 btn btn-primary">Save Note</button>
													<form action="mailto:info@pinkrickshawdesign.com?Subject=Hello%20again" method="GET" id="emailform">
														<input type="hidden" name="subject" value=" From Glo Speech Email System">
														<div class="form-row">
															<div class="form-group col">
																<button type="submit" class="button button1 btn-primary" value="Send"/>Email Note</button>
															</div>
														</div>
													</form>
													<p id="recording-instructions">Press the <strong>Start Recognition</strong> button and allow access.</p>
													<h3>My Notes</h3>
													<ul id="notes">
														<li>
															<p class="no-notes">You don't have any notes.</p>
														</li>
													</ul>
												</div>
											</div>
											<input id="select_dialect" type="hidden"> </input>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- ../vendor -->
			<?php include("footer_files.php"); ?>
			<script src="../js/chat.js" > </script>
			<script src="../js/speechtotext/speechtotext.js" > </script>
			<script src="https://meet.jit.si/external_api.js"></script>
			<script>var myFirebase = new Firebase('https://sterlitetutor.firebaseio.com/');</script>
			<script type="text/javascript">
			var room_name = "<?php echo $room ?>";
			var user_name = "<?php echo $username ?>";
			function openDialog(form) {
			var result = window.showModalDialog("http://www.java2s.com", form, "dialogWidth:300px; dialogHeight:201px; center:yes");
			}
			function open_chatbox()
			{
			$('#chat').fadeOut(500);
			$('#chatBox').fadeIn(1000);
			showmsg();
			}
			function closeChat()
			{
			$('#chatBox').fadeOut(500);
			$('#chat').fadeIn(1000);
			}
			$("#aid").click(function(e){
			e.preventDefault();
			var formData = new FormData($(this).parents('form')[0]);
			$.ajax({
			url: '../php/file_share.php',
			type: 'POST',
			data: formData,
			success: function(data){
			swal(data);
			$('#uploadForm')[0].reset();
			},
			cache: false,
			contentType: false,
			processData: false
			});
			});
			$( document ).ready(function() {
			var domain = "kanavkahol.com";
			var options = {
			roomName: room_name,
			width: '100%',
			height: 600,
			parentNode: document.querySelector('#meet'),
			parent: undefined,
			configOverwrite: {},
			interfaceConfigOverwrite: {
			DEFAULT_REMOTE_DISPLAY_NAME: 'Sterlite Student',
			TOOLBAR_BUTTONS: ['microphone', 'raisehand', 'camera', 'desktop', 'fodeviceselection', 'hangup',],
			TOOLBAR_ALWAYS_VISIBLE: true,
			SHOW_JITSI_WATERMARK: false,
			VIDEO_QUALITY_LABEL_DISABLED: true,
			SHOW_WATERMARK_FOR_GUESTS: false,
			}
			};
			var api = new JitsiMeetExternalAPI(domain, options);
			api.addEventListener("videoConferenceLeft", function(object){
			window.location.replace('rate_session.php?room='+room_name+'');
			});
			});
			</script>
		</body>
	</html>