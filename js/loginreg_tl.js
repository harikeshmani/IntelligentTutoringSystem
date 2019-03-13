
		$(document).ready(function(){
		$('#country').on('change',function(){
		var countryID = $(this).val();
		if(countryID){
		$.ajax({
		type:'POST',
		url:'php/location_tl.php',
		data:'country_id='+countryID,
		success:function(html){
		$('#state').html(html);
		$('#city').html('<option value="">ముందుగా రాష్ట్రాన్ని ఎంచుకోండి</option>');
		}
		});
		}else{
		$('#state').html('<option value="">మొదటి దేశాన్ని ఎంచుకోండి</option>');
		$('#city').html('<option value="">ముందుగా రాష్ట్రాన్ని ఎంచుకోండి</option>');
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
		$('#city').html('<option value="">ముందుగా రాష్ట్రాన్ని ఎంచుకోండి</option>');
		}
		});
		$(".fas").hide();
		$(".fas1").hide();
		$('#login').click(function(){
		var email = $("#email").val();
		var password = $("#password").val();
		if((email == '') || (password == '')) {
		$.alert({
		title: 'హెచ్చరిక!',
		content: 'ఇ-మెయిల్ ఐడి లేదా పాస్వర్డ్ ఖాళీగా ఉండకూడదు!',
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
		title: 'లోపం!',
		content: 'చెల్లని ఆధారాలు!',
		});
		}  else  {
		window.location.href = "home.php?lang=tl";
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
		required: "దయచేసి మీ పేరు నమోదు చేయండి"
		},
		yourpassword: {
		required: "దయచేసి పాస్వర్డ్ను అందించండి",
		minlength: "మీ పాస్వర్డ్ కనీసం 6 అక్షరాల పొడవు ఉండాలి"
		},
		youremail: "దయచేసి చెల్లుబాటు అయ్యే ఇమెయిల్ చిరునామాను నమోదు చేయండి"
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
		title: 'మొబైల్ సంఖ్య వర్గీకరణ!',
		content: '' +
		'<form action="" class="formName">' +
			'<div class="form-group">' +
				'<label>ఇక్కడ మీ OTP ను ఎంటర్ చెయ్యండి</label>' +
				  '<input type="text" placeholder="మీ OTP ను ఇక్కడ ఎంటర్ చెయ్యండి" class="name form-control" required />' +
			'</div>' +
		'</form>',
		buttons: {
		formSubmit: {
		text: 'Submit',
		btnClass: 'btn-blue',
		action: function () {
		var matchregotp = this.$content.find('.name').val();
		if(!matchregotp){
		$.alert('దయచేసి మీ OTP ని నమోదు చేయండి');
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
		title: 'విజయం!',
		content: 'ఇప్పుడు మీ ప్రొఫైల్ను నవీకరించండి',
		buttons: {
        confirm: function () {
        window.location.href = 'profile.php?lang=tl';
        }
        }
		});
		} else {
		$.alert({
		title: 'లోపం!',
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
		$.alert('తప్పు otp');
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
