
			$(document).ready(function () {
			$(".fas").hide();
			$("#enter_otp").hide();
			$("#password_reset_end").hide();
			$('#forget').click(function(){
			//$("#login-form").hide();
			$("#reset_password").show();
			});
			$('#sendotp').click(function() {
			$("form[name='password_reset']").valid();
			num = $('#resetmob').val();
			genotp = Math.floor(1000 + Math.random() * 9000);
			$.ajax({
			dataType: 'json',
			url: 'php/sms_web.php',
			type: 'POST',
			data: {'sms' : "OTP for reset password is "+ genotp +, 'mobileno' : num},
			beforeSend: function(response){
			$(".fas").show();
			},
			success : function(response) {
			//console.log(response);
			if(response.message === "true") {
			$("#enter_otp").show();
			$("#reset_password").hide();
			swal("सफलता", "ओटीपी को आपके मोबाइल नंबर पर भेज दिया गया है","success");
			} else if(response.message === "false"){
			swal("गलत नंबर","क्षमा करें, यह मोबाइल नंबर हमारे साथ पंजीकृत नहीं है","error");
			} else {
			swal("त्रुटि","ओटीपी नहीं भेजा गया","error");
			}
			},
			complete:function(logresp){
			$(".fas").hide();
			}
			});
			});
			$('#enterotps').click(function() {
			var otpnum = $('#enterotp').val();
			if(genotp == otpnum){
			swal("मिलान किया","ओटीपी मैच! अब आप अपना पासवर्ड रीसेट कर सकते हैं","success");
			$("#enter_otp").hide();
			$("#password_reset_end").show();
			} else {
			swal("गलत ओटीपी","ओटीपी मेल नहीं खाता, पुनः प्रयास करें","error");
			}
			});
			$('#upadteit').click(function() {
			$("#enter_otp").hide();
			$("#password_reset_end").show();
			var password = $('#pass2').val();
			var re_pass = $('#pass1').val();
			if (password == re_pass) {
			$.ajax({
			dataType: 'json',
			url : 'php/update_password_web.php',
			type : 'POST',
			data : {'mobileno' : num , 'password' : password},
			beforeSend: function(response){
			$(".fas").show();
			},
			success : function(data){
			swal(data.message)
            .then(() => {
            window.location.replace('login.php?lang=hn');
            });
			},
			complete:function(logresp){
			$(".fas").hide();
			}
			});
			} else {
			swal("त्रुटि","पासवर्ड मेल नहीं खाता था","error");
			}
			});
			});
