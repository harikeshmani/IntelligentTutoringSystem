<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
if(isset($_POST["marks"])) {
$mark = $_POST["marks"];
mysqli_query($link, "INSERT INTO tbl_linguistic (user_id, score) VALUES ('$user', '$mark') ");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<link rel="stylesheet" type="text/css" media="all" href="../audio/css/styles.css">
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
								<h1>Linguistic Assessment</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div id="intro">
						<div class="row" >
							<div class="col">
								<p>Linguistic Assessment ascertains your linguistic abilities. Being able to communicate clearly and effectively is an important part of being a professionals. Using these exercises, you can test your linguistic skills here. We will not focus on your abilities in a certain language but the baseline neurocognitive processes of language. These will help you in enabling better analytical skills and comprehension skills.</p>
								<p><b>Listen to the following Clip and fill the in the information in the following pages.</b></p>
								
								<hr class="major">
								<div class="audio-player">
									<h2>Audio</h2>
								<audio id="audio-player" src="../audio/media1.m4a" type="audio/mp3" controls="controls"></audio>
							</div>
						</div>
					</div>
					<button type="button" id="ans" class="btn btn-primary float-right">Answer</button>
				</div>
			</section>
			<section id="Question1">
				<span class="image main"><img src="../img/linguistic1.png" alt="linguistic image" class="img-fluid appear-animation animated bounceInRight appear-animation-visible" data-appear-animation="bounceInRight" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;"></span>
				<p><h2><strong>Question-1</strong> For the diagram above select the correct label for 6?</h2></p>
				<hr class="major">
				<div class="4u 5u$(small)">
					<input type="radio" id="answer1" name="result1" value="1" checked="">
					<label for="answer1">French</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer2" name="result1" value="2">
					<label for="answer2">Spanish</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer3" name="result1" value="3">
					<label for="answer3">Mediterranean</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer4" name="result1" value="4">
					<label for="answer4">South African</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer5" name="result1" value="5">
					<label for="answer5">Australian Native</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer6" name="result1" value="6">
					<label for="answer6">South African ball roller</label>
				</div>
				<button type="button" id="ans1" class="btn btn-primary float-right btn-xl">next</button>
			</section>
			<section id="Question2">
				<span class="image main"><img src="../img/linguistic1.png" alt="linguistic image" class="img-fluid appear-animation animated bounceInRight appear-animation-visible" data-appear-animation="bounceInRight" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;"></span>
				<p><h2><strong>Question-2</strong>  For the diagram above select the correct label for <strong>7?</strong></h2></p>
				<hr class="major">
				<div class="4u 5u$(small)">
					<input type="radio" id="answer21" name="result2" value="1" checked="">
					<label for="answer21">French</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer22" name="result2" value="2">
					<label for="answer22">Spanish</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer23" name="result2" value="3">
					<label for="answer23">Mediterranean</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer24" name="result2" value="4">
					<label for="answer24">South African</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer25" name="result2" value="5">
					<label for="answer25">Australian Native</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer26" name="result2" value="6">
					<label for="answer26">South African ball roller</label>
				</div>
				<button type="button" id="ans2" class="btn btn-primary float-right btn-xl">next</button>
			</section>
			<section id="Question3">
				<span class="image main"><img src="../img/linguistic1.png" alt="linguistic image" class="img-fluid appear-animation animated bounceInRight appear-animation-visible" data-appear-animation="bounceInRight" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;"></span>
				<p><h2><strong>Question-3</strong> For the diagram above select the correct label for <strong>8?</strong></h2></p>
				<hr class="major">
				<div class="4u 5u$(small)">
					<input type="radio" id="answer31" name="result3" value="1" checked="">
					<label for="answer31">French</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer32" name="result3" value="2">
					<label for="answer32">Spanish</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer33" name="result3" value="3">
					<label for="answer33">Mediterranean</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer34" name="result3" value="4">
					<label for="answer34">South African</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer35" name="result3" value="5">
					<label for="answer35">Australian Native</label>
				</div>
				<div class="4u 5u$(small)">
					<input type="radio" id="answer36" name="result3" value="6">
					<label for="answer36">South African ball roller</label>
				</div>
				<button type="button" id="ans3" class="btn btn-primary float-right btn-xl" >result</button>
			</section>
			<section id="Question4">
				<span class="image main"><img src="../img/linguistic1.png" alt="linguistic image"></span>
				<p><strong>Question-3</strong> For the diagram above select the correct label for <strong>8?</strong></h2></p>
				<hr class="major">
				<input type="text" name="answer3" id="answer3">
				<button type="button" id="ans3" class="btn btn-primary float-right btn-xl" >result</button>
			</section>
		</div>
	</div>
</div>
<?php include("footer.php") ?>
</div>
<!-- ../vendor -->
<?php include("footer_files.php"); ?>
<script src="../audio/js/mediaelement-and-player.min.js"></script>
<script>
//       $(function(){
//       $('#audio-player').mediaelementplayer({
//       alwaysShowControls: true,
//       features: ['playpause','progress','volume'],
//     audioVolume: 'horizontal',
//     audioWidth: 450,
//     audioHeight: 70,
//     iPadUseNativeControls: true,
//     iPhoneUseNativeControls: true,
//     AndroidUseNativeControls: true
//   });
// });


$(function(){
id = "<?php echo $user_id; ?>";
var marks = '';
$('#Question1').hide();
$('#Question2').hide();
$('#Question3').hide();
$('#Question4').hide();
$('#result').hide();
$('#audio-player').mediaelementplayer({
alwaysShowControls: true,
features: ['playpause','progress','volume'],
audioVolume: 'horizontal',
audioWidth: 350,
audioHeight: 180,
});
$('#ans').click(function() {
$('#intro').hide();
$('#Question1').show();
});
$('#ans1').click(function() {
$('#Question2').show();
$('#Question1').hide();
});
$('#ans2').click(function() {
$('#Question2').hide();
$('#Question3').show();
});
$('#ans3').click(function() {
$('#Question3').hide();
$('#result').show();
var ansno1 = $("input[name = 'result1']:checked").val();
var ansno2 = $("input[name = 'result2']:checked").val();
var ansno3 = $("input[name = 'result3']:checked").val();
if (ansno1 == 4) {
var marks = '1';
if ((ansno1 == 4) && (ansno2 == 1)) {
var marks = '2';
if ((ansno1 == 4) && (ansno2 == 1) && (ansno2 == 2)) {
var marks = '3';
}
}
} else {
var marks = '0';
}
//alert(marks);
$.ajax({
url: "",
type: "POST",
data: {user_id: id, marks: marks},
success: function(response){
//alert(response);
// $('#showsore').append('<h1>' +response + '</h1>');
location.href = 'score_linguistic.php';
}
});
});
});

</script>


</body>
</html>