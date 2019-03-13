$(document).ready(function () {
$("#step2").hide();
$("#step3").hide();
$("#step4").hide();
$('#country').on('change',function(){
var countryID = $(this).val();
if(countryID){
$.ajax({
type:'POST',
url:'php/location.php',
data:'country_id='+countryID,
success:function(html){
$('#state').html(html);
$('#city').html('<option value="">Select state first</option>');
}
});
}else{
$('#state').html('<option value="">Select country first</option>');
$('#city').html('<option value="">Select state first</option>');
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
$('#city').html('<option value="">Select state first</option>');
}
});
$("#reg-otpfield").hide();
//$("#reset_password").hide();
$("#enter_otp").hide();
$("#password_reset_end").hide();
////////////////code for login///////////
$('button[name="login"]').click(function(){
var email = $("#email").val();
var password = $("#password").val();
if((email == '') || (password == '')) {
$.alert({
title: 'Alert!',
content: 'E-mail id or Password cannot be empty!',
});
} else {
$("#email,#password").val('');
$.ajax({
dataType: 'json',
type: "POST",
url: 'login.php',
data: {'login': "login", 'email': email, 'password': password},
success: function(data)
{
//alert(response);
if (data.mensaje == "error") {
$.alert({
title: 'Alert!',
content: 'Invalid Credentials!',
});
}  else  {
window.location.href = "home.php";
}
}
});
}
});
///////////////////code for registeration(First Step)/////////////
$("form[name='reg-form1']").validate({
rules: {
firstname: {
required: true
},
lastname: {
required: true
},
otpreg: {
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
number: true
},
password: {
required: true,
minlength: 6
},
retype : {
equalTo : "#pwd"
}
},
messages: {
firstname: {
required: "Please enter your firstname",
lettersonly: "First name cannot contain special characters and digits"
},
lastname:  {
required: "Please enter your Last Name",
lettersonly: "last name cannot contain special characters and digits"
},
password: {
required: "Please provide a password",
minlength: "Your password must be at least 6 characters long"
},
email: "Please enter a valid email address"
},
submitHandler: submitFirstStep
});
//alert("enter OTP");
function submitFirstStep() {
var otp_reg = Math.floor(1000 + Math.random() * 9000);
var regno = $("#phone").val();
$.ajax({
type: "POST",
url: 'php/otp.php',
data: {'mobileno': regno, 'otp': otp_reg },
success: function(data)
{
$.confirm({
title: 'Mobile Number Varification!',
content: '' +
'<form action="" class="formName">' +
	'<div class="form-group">' +
		'<label>Enter Your OTP here</label>' +
		'<input type="text" placeholder="Your otp" class="name form-control" required />' +
	'</div>' +
'</form>',
buttons: {
formSubmit: {
text: 'Submit',
btnClass: 'btn-blue',
action: function () {
var matchregotp = this.$content.find('.name').val();
if(!matchregotp){
$.alert('please enter your OTP');
return false;
} else {
if (matchregotp == otp_reg) {
var data1 = $('#firstname').val();
var data2 = $('#lastname').val();
var data3 = $('#youremail').val();
var data5 = $('#about').val();
var data6 = $('#highest').val();
var data7 = $('#institute').val();
var data8 = $('#retype').val();
$.ajax({
type : 'POST',
dataType: 'json',
url  : 'php/registeration_step1.php',
data : {'firstname': data1, 'lastname': data2, 'email': data3, 'phone': regno, 'about': data5, 'highest': data6, 'institute': data7,'password': data8},
success :  function(data)
{
if (data.message == "ok") {
$.alert({
title: 'Success!',
content: 'now move to the next step of registeration!',
buttons: {
confirm: function () {
$("#step1").hide();
$("#step2").show();
}
}
});
} else {
$.alert({
title: 'error!',
content: 'error in registeration!',
});
}
}
});
} else {
$.alert('Wrong otp');
}
}
}
},
},
});
}
});
}
////////////////////registeration second step///////////////////
$("form[name='reg-form2']").validate({
submitHandler: submitSecondStep
});
function submitSecondStep() {
var address = $('#address').val();
var street = $('#street').val();
var locality = $('#locality').val();
var country = $('#country').val();
var state = $('#state').val();
var city = $('#city').val();
var postcode = $('#postcode').val();
$.ajax({
type : 'POST',
dataType: 'json',
url  : 'php/registeration_step2.php',
data : {'address': address, 'street': street, 'locality': locality, 'country': country, 'state': state, 'city': city, 'postcode': postcode},
success :  function(data)
{
if (data.message == "ok") {
$.alert({
title: 'Success!',
content: 'now move to the next step of registeration!',
buttons: {
confirm: function () {
$("#step2").hide();
$("#step3").show();
}
}
});
} else {
$.alert({
title: 'error!',
content: 'error in registeration!',
});
}
}
});
}
/////////////////////registeration third step/////////
$("#pr,#med,#hi,#clg, #oth").hide();
$("#primary").click(function() {
$("#pr").toggle();
});
$("#middle").click(function() {
$("#med").toggle();
});
$("#high").click(function() {
$("#hi").toggle();
});
$("#college").click(function() {
$("#clg").toggle();
});
$("#other").click(function() {
$("#oth").toggle();
});
$('.multi').multiSelect({
selectableHeader: "<div class='custom-header'>subjects</div>",
selectionHeader: "<div class='custom-header'>Selected subjects</div>",
});
$("#service-submit").click(function() {
var data_serv = $("#form-services").serialize();
//alert(data);
$.ajax({
data: data_serv,
type: "POST",
url: "php/registeration_step3.php",
success: function(data){
//alert(data);
$.alert({
title: 'Success!',
content: 'now move to the next step of registeration!',
buttons: {
confirm: function () {
$("#step3").hide();
$("#step4").show();
}
}
});
}
});
});
/////////////////registeration fourth step///////////
$("#delivery-submit").hide();
state = '';
$('#date_start,#date_end ').bootstrapMaterialDatePicker
({
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
var session_wrapper = $('.sessions');
$("#add_session").click(function(){
$("#delivery-submit").show();	
var st_date = $('#date_start').val();
var end_date = $('#date_end').val();
var string_of_sessions = $('input[name="slots"]:checked:not(:disabled)').map(function() {
return $(this).val().toString();
} ).get().join(",");
var session_group = $('input[name=session_type]:checked').val();
var preference_type = $('input[name=pref]:checked').val();
if(new Date(st_date) <= new Date(end_date)) {
var fields = '<div class="row"><div class="col-md-3"><label>start date</label><input type="text" id="t_start" name="start[]" value='+st_date+'></div><div class="col-md-3"><label>End date</label><input type="text" id="t_start" name="end[]" value='+end_date+'></div><div class="col-md-3"><label>Time Slots</label><input type="text" id="t_start" name="slots[]" value='+string_of_sessions+'></div><div class="col-md-2"><label>Session Type</label><input type="text" id="t_start" name="group[]" value='+session_group+'></div></div>';
$(session_wrapper).append(fields);
$('#date_start').val('');
$('#date_end').val('');
$.ajax({
type:'POST',
url:'php/registeration_step4.php',
data:{'pref_type': preference_type, 'start_date': st_date, 'end_date': end_date, 'slots': string_of_sessions, 'type': session_group },
success:function(data){
}
});
$('input[name="slots"]:checked').prop("disabled", true);
} else	{
$.alert({
    title: 'Alert!',
    content: 'start Date cannot be greater than end Date',
});	
}
});
$("#delivery-submit").click(function(){
var sts_date = $('#date_start').val();
var ends_date = $('#date_end').val();
var sessions_group = $('input[name=session_type]:checked').val();
if((sts_date == null) || (ends_date == null) || (sessions_group == null)) {
$.alert({
    title: 'Alert!',
    content: 'please add a session',
});	
} else {
swal('Welcome To ITS');
setTimeout(function(){
window.location = "home.php";
}, 2000);
}
});

//////////////////////////////////forget password//////////////
$("#enter_otp").hide();
$("#password_reset_end").hide();
$('#sendotp').click(function() {
num = $('#resetmob').val();
genotp = Math.floor(1000 + Math.random() * 9000);
$.ajax({
url: 'php/forgot.php',
dataType: 'json',
type: 'POST',
data: {'otp' : genotp, 'mob' : num},
success : function(data) {
if(data.msg == "ok") {
$("#enter_otp").show();
$("#reset_password").hide();
$.alert({
title: 'Success!',
content: 'OTP has been sent to your Mobile Number',
});
} else {
$.alert({
title: 'error!',
content: 'This Mobile number is not registered ',
});
}
},
});
});
$('#enterotps').click(function() {
var otpnum = $('#enterotp').val();
if(genotp == otpnum){
$.alert({
title: 'success!',
content: 'OTP match! Now you can reset your password',
});
$("#enter_otp").hide();
$("#password_reset_end").show();
} else {
$.alert({
title: 'Alas!',
content: 'wrong otp',
});
}
});
$('#upadteit').click(function() {
$("#enter_otp").hide();
$("#password_reset_end").show();
var password = $('#pass2').val();
var re_password = $('#pass1').val();
if(password == re_password) {
$.ajax({
url : 'php/update_password_web.php',
dataType: 'json',
type : 'POST',
data : {'mobile' : num , 'password' : re_password},
success : function(data) {	
if(data.message == "ok") {	
$.alert({
title: 'success!',
content: 'Your new password has been successfully updated',
});
setTimeout(function(){ window.location.href = 'tutor_login.php'; }, 1000);
} else {
$.alert({
title: 'error!',
content: 'error in password updation',
});	
}
}
});
} else {
$.alert({
title: 'error!',
content: 'paswword did not match',
});
}
});
});