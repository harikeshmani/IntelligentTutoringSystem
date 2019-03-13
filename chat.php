<?php
include("auth.php");
$student_id = $_SESSION['userid'];
$tutor_id = base64_decode(urldecode($_GET['tutor_id']));
$sender_data = mysqli_fetch_array(mysqli_query($link, "SELECT first_name, picture FROM tbl_glow_tutor WHERE id = '$tutor_id'"));
$name_sender = $sender_data['first_name'];
$pic_sender = 'api/user_image/tutor/'.$sender_data['picture'];
if(isset($_POST['message'])) {
$message = $_POST['message'];
$quwery = mysqli_query($link, "INSERT INTO tbl_chat(tutor_id, student_id, sender, reciever,  message, created, flag) VALUES ($tutor_id, $student_id, $student_id, $tutor_id, '$message', CURRENT_TIMESTAMP, 'active')");
}
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
								<h1>Chat With - <?php echo $name_sender; ?></h1>
							</div>
						</div>
					</div>
				</section>
				
				<div class="container">
					<div class="row">
						<div class='col-md-1'></div>
						<div class='col-md-10'>
							<div id='chat_window' >
								<?php
								$qwery = mysqli_query($link, "SELECT * FROM tbl_chat WHERE student_id = '$student_id' AND tutor_id = '$tutor_id' ORDER BY created ASC");
								while($getresult = mysqli_fetch_array($qwery))
								{
								$message = $getresult['message'];
								$date = $getresult['created'];
								$from = $getresult['sender'];
								if($from == $student_id) {
								echo "<div class='testimonial testimonial-primary sender'>";
										echo "<blockquote >";
												echo "<p>$message</p>";
										echo "</blockquote>";
												echo	"<div class='testimonial-arrow-down-right'></div>";
												echo "<div class='testimonial-author'>";
														echo  "<p style='text-align: right;'><strong>YOU</strong>Sent on -$date</p>";
												echo "</div>";
								echo "</div>";
								} else {
										echo "<div class='testimonial testimonial-primary'>";
											echo "<blockquote>";
													echo "<p>$message</p>";
											echo "</blockquote>";
													echo	"<div class='testimonial-arrow-down'></div>";
													echo "<div class='testimonial-author'>";
															echo "<div class='testimonial-author-thumbnail img-thumbnail'>";
																	echo "<img src=$pic_sender >";
															echo  "</div>";
															echo  "<p><strong>$name_sender</strong>Sent on - $date</p>";
													echo "</div>";
									echo "</div>";
								}  } ?>
							</div>
							<div class="form-row">
								<div class="form-group col">
									<input id="btn-input" type="text" class="form-control form-control-lg" placeholder="Type your message here..." />
								</div>
								<span >
									<button class="btn btn-primary btn-lg mb-1 m-2" id="btn-chat">Send</button>
								</span>
							</div>
							<div class='col-md-1'></div>
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- Vendor -->
			<?php include("footer_files.php") ?>
			<script type="text/javascript">
			$( document ).ready(function() {
			// setTimeout(function(){
			// location = ''
			// },60000)
			$("#chat_window").stop().animate({ scrollTop: $("#chat_window")[0].scrollHeight}, 10);
			$(document).on('click', '#btn-chat', function (e) {
			var msg_content = $('#btn-input').val();
			if(msg_content == '') {
			//$('#btn-chat').prop('disabled', true);
			} else {
			var session_wrapper = $('#chat_window');
			var fields = '<div class="testimonial testimonial-primary sender"><blockquote><p>'+msg_content+'</p></blockquote><div class="testimonial-arrow-down-right"><div class="testimonial-author"></div></div>';
			$(session_wrapper).append(fields);
			$("#chat_window").stop().animate({ scrollTop: $("#chat_window")[0].scrollHeight}, 100);
			$('#btn-input').val('');
			$.ajax({
			type:'POST',
			url:'',
			data:'message='+msg_content,
			success:function(){
			}
			});
			}
			});
			});
			</script>
		</body>
	</html>