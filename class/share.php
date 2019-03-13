<?php
include("auth.php");
$user_id = $_SESSION['userid'];
$flagg = "true";
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php") ?>
		<style type="text/css">
		.fleft{float: left;}
		h1{font-size: 36px;margin-bottom: 0px;text-align: center;}
		.post_social {margin: 0 0 10px;height: 35px;}
		.post_social img{float:left;margin-right: 5px;}
		.post_row img {float: left;overflow: hidden;width: 200px;margin-right: 15px;margin-bottom: 8px;}
		.post_row p {font-size: 16px !important;}
		canvas {
		max-width: 100%;
		max-width: 100%;
		}
		</style>
	</head>
	<body>
		<div class="body">
			<?php include("menu.php") ?>
			<div role="main" class="main" >
				<section class="page-header">
					<div class="container">
						<div class="row">
						</div>
						<div class="row">
							<div class="col">
								<h1>Let Your Friends Know</h1>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col">
							<h4>Let Your Friends Know</h4>
							<div class="fleft">
								
								<div class="post_social">
									<a href="javascript:void(0)" class="icon-fb" onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.pinkrickshawdesign.in/its/index.php')" title="Facebook Share"><img src="img/fb.png"/></a>
									<a href="javascript:void(0)" onclick="javascript:genericSocialShare('https://plus.google.com/share?url=https%3A%2F%2Fpinkrickshawdesign.in/its/index.php')" class="icon-gplus" title="Google Plus Share"><img src="img/gp.png"/></a>
									<a href="javascript:void(0)" class="icon-tw" onclick="javascript:genericSocialShare('http://twitter.com/share?text=Social popup on page scroll using jQuery and CSS&amp;url=https://www.pinkrickshawdesign.in/its/')" title="Twitter Share"><img src="img/tw.png"/></a>
									<a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('http://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fpinkrickshawdesign.in/its/')" title="LinkedIn Share"><img src="img/in.png"/></a>
									<a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('https://pinterest.com/pin/create/button/?url=https%3A%2F%2Fwww.pinkrickshawdesign.in/glow/index.php%2F&media={http%3A%2F%2Fwww.pinkrickshawdesign.in/its/index.php}')" title="Pinterest Share"><img src="img/pin.png"/></a>
									<a href="javascript:void(0)" class="icon-linked_in" onclick="javascript:genericSocialShare('mailto:?subject=I wanted you to see this site&amp;body=Check out this site https://pinkrickshawdesign.in/its/.')" title="E-Mail Share"><img src="img/mail.png"/></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include("footer.php") ?>
			</div>
			<!-- Vendor -->
			<?php include("footer_files.php"); ?>
			<script type="text/javascript" async >
			function genericSocialShare(url){
			window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
			return true;
			}
			//  var element = jQuery("#vpc-preview");
			//html2canvas(element,{
			//background:'#FFFFFF',
			//onrendered:function(canvas){
			//var imgData = canvas.toDataURL('image/jpeg');
			// $("#save").click(function() {
			//        $("#panel1").html2canvas({
			//           onrendered: function (canvas) {
			//               var myImage = canvas.toDataURL("image/png");
			//               window.open(myImage);
			//           }
			//       });
			//   });
			$("#save").click(function(){
			alert("hello");
			html2canvas($('#panel1')[0], {
			onrendered: function(canvas) {
			var img = canvas.toDataURL("image/png");
			alert(img);
			window.open(img);
			}
			});
			});
			</script>
			
			
		</body>
	</html>