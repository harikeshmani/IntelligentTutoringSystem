

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
			data: {'sms' : "OTP for password reset is " + genotp, 'mobileno' : num},
			beforeSend: function(response){
			$(".fas").show();
			},
			success : function(response) {
			//console.log(response);
			if(response.message === "true") {
			$("#enter_otp").show();
			$("#reset_password").hide();
			swal("OTP has been sent to your Mobile Number");
			} else if(response.message === "false"){
			swal("wrong number","sorry, This mobile number is not registerd with us","error");
			} else {
			swal("error","OTP not sent","error");
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
			swal("matched","OTP match! Now you can reset your password","success");
			$("#enter_otp").hide();
			$("#password_reset_end").show();
			} else {
			swal("wrong otp","OTP did not matched, try again","error");
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
            window.location.replace('login.php?lang=mt');
            });
			},
			complete:function(logresp){
			$(".fas").hide();
			}
			});
			} else {
			swal("error","password didn't match","error");
			}
			});
			});
