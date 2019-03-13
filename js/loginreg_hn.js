
		$(document).ready(function(){
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
		$(".fas").hide();
		$(".fas1").hide();
		$('#login').click(function(){
		var email = $("#email").val();
		var password = $("#password").val();
		if((email == '') || (password == '')) {
		$.alert({
		title: 'चेतावनी!',
		content: 'ई-मेल आईडी या पासवर्ड खाली नहीं हो सकता है!',
		});
		} else {
		$("#email,#password").val('');
		$.ajax({
		url: '',
		dataType: 'json',
		type: "POST",
		data: {'login': "login", 'email': email, 'password': password},
		beforeSend: function(logresp){
		$(".fas").show();
		$('#login').prop('disabled', true);
		},
		success: function(logresp)
		{
		if (logresp.mensaje == "error") {
		$.alert({
		icon: 'fas fa-warning',
		type: 'red',
		title: 'त्रुटि!',
		content: 'अमान्य ईमेल आईडी या पासवर्ड!',
		});
		}  else  {
		window.location.href = "home.php?lang=hn";
		}
		},
		complete:function(logresp){
		$(".fas").hide();
		$('#login').prop('disabled', false);
		}
		});
		}
		});
		$(".next").click(function(){
		$("#prev").hide();
		$("#next").toggle();
		});
		$(".goback").click(function(){
		$("#next").hide();
		$("#prev").show();
		});
	
		$("form[name='reg-form']").validate({
		rules: {
		name: {
		required: true
		},
		school: {
		required: true
		},
		class: {
		required: true
		},
		youremail: {
		required: true,
		email: true
		},
		phone: {
		required: true,
		minlength: 10,
		maxlength: 10,
		number: true,
		},
		yourpassword: {
		required: true,
		minlength: 6
		},
		retype : {
		equalTo : "#pwd"
		}
		},
		messages: {
		name: {
		required: "अपना नाम दर्ज करें"
		},
		school: {
		required: "यह फ़ील्ड आवश्यक है"
		},
		class: {
		required: "यह फ़ील्ड आवश्यक है"
		},
		yourpassword: {
		required: "कृपया एक पासवर्ड प्रदान करें",
		minlength: "आपका पासवर्ड कम से कम छः अक्षरों का होना चाहिए"
		},
		phone: {
		required: "यह फ़ील्ड आवश्यक है",
		minlength: "कृपया कम से कम 10 अंक दर्ज करें।",
		maxlength: "कृपया 10 से अधिक वर्ण दर्ज करें।",
		number: "कृपया एक सही संख्या डालिये।."
		},
		retype : {
		equalTo : "कृपया फिर से वही संख्या डालिये।"
		},
		youremail: {
		email:	"कृपया एक वैध ई - मेल एड्रेस डालें",
		required: "यह फ़ील्ड आवश्यक है"
		}
	    },
		submitHandler: submitRegisterationForm
		});
		//alert("enter OTP");
		function submitRegisterationForm() {
		var otp_reg = Math.floor(1000 + Math.random() * 9000);
		var regno = $("#phone").val();
		$.ajax({
		type: "POST",
		url: 'php/otp.php',
		data: {'mobileno': regno, 'otp': otp_reg },
		success: function(data)
		{
		$.confirm({
		title: 'मोबाइल नंबर सत्यापन',
		content: '' +
		'<form action="" class="formName">' +
			'<div class="form-group">' +
				'<label>यहां अपना ओटीपी दर्ज करें</label>' +
				  '<input type="text" placeholder="अपना ओटीपी दर्ज करें" class="name form-control" required />' +
			'</div>' +
		'</form>',
		buttons: {
		formSubmit: {
		text: 'Submit',
		btnClass: 'btn-blue',
		action: function () {
		var matchregotp = this.$content.find('.name').val();
		if(!matchregotp){
		$.alert('कृपया अपना ओटीपी दर्ज करें');
		return false;
		} else {
		if (matchregotp == otp_reg) {
		var data1 = $('#name').val();
		var data2 = $('#youremail').val();
		var data3 = $('#retype').val();
		var data41 = $('#address').val();
		var data4 = $('#street').val();
		var data5 = $('#locality').val();
		var data6 = $('#country').val();
		var data7 = $('#state').val();
		var data8 = $('#city').val();
		var data9 = $('#postcode').val();
		var data10 = $('#school').val();
		var data11 = $('#class').val();
		$.ajax({
		dataType: 'json',
		url  : '',
		type : "POST",
		data : {'submit': "registeration", 'name': data1, 'youremail': data2, 'yourpassword': data3, 'address' : data41, 'phone': regno, 'street': data4,  'locality': data5,  'country': data6,  'state': data7,  'city': data8,  'postcode': data9, 'school': data10, 'class':data11},
		beforeSend: function(reresp){
		$(".fas1").show();
		},
		success :  function(reresp) {
		if (reresp.mensajeres == 'success') {
		$.alert({
		title: 'सफलता!',
		content: 'अब अपनी प्रोफाइल अपडेट करें',
		buttons: {
        confirm: function () {
        window.location.href = 'profile.php?lang=eng';
        }
        }
		});
		} else {
		$.alert({
		title: 'error!',
		content: reresp.mensajeres,
		});
		$('#reg-form')[0].reset();
		}
		},
		complete:function(logresp){
		$(".fas1").hide();
		}
		});
		} else {
		$.alert('गलत ओटीपी');
		}
		}
		}
		},
		},
		});
		
		}
		});
		}
		});
