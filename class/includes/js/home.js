$(document).ready(function () {
//$("#prev").hide();	
$("#next").hide();
$("#addstudent").hide();
$("#reg-otpfield").hide();
$(".log").hide();
$("#enter_otp").hide();
$("#password_reset_end").hide();
///////////////////country sate city///
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
////////////////code for login///////////
$("form[name='login']").validate({
rules: {
email: {
required: true,
email: true
},
password: {
required: true,
minlength: 6
}
},
messages: {
password: {
required: "Please provide a password",
minlength: "Your password must be at least 6 characters long"
},
email: {
email: "Please enter your email address",
required: "Please enter a valid email address"
}
},
submitHandler: doLogin
});
function doLogin() {
var email = $("#email").val();
var password = $("#password").val();
$.ajax({
dataType: 'json',
type: "POST",
url: 'php/login.php',
data: {'login': "login", 'email': email, 'password': password},
beforeSend: function() {
$(".log").show();
},
success: function(data)
{
if (data.mensaje == "error") {
$("#email,#password").val('');
$.alert({
title: 'Alert!',
content: 'Username or Password is incorrect!',
});
}  else  {
window.location.href = "home.php";
}
},
complete: function() {
$(".log").hide();
}
});
}
///////////////////code for registeration/////////////
$("form[name='firststep']").validate({
rules: {
name: {
required: true
},
otpreg: {
required: true,
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
required: true,
equalTo : "#pwd"
}
},
// Specify validation error messages
messages: {
name:  {
required: "Please enter your Last Name"
},
password: {
required: "Please provide a password",
minlength: "Your password must be at least 6 characters long"
},
email: "Please enter a valid email address"
},
submitHandler: firststepreg
});
//alert("enter OTP");
function firststepreg() {
var otp_reg = Math.floor(1000 + Math.random() * 9000);
var regno = $("#phone").val();
$.ajax({
type: "POST",
dataType: 'json',
url: 'includes/otp.php',
data: {'mobileno': regno, 'otp': otp_reg },
success: function(data)
{
if (data.msg !== "true") {
$.alert({
title: 'Error!',
content: 'otp not sent, please, try with another mobile number',
});
} else {
$.confirm({
title: 'Mobile Number Verification!',
content: '' +
'<form action="" class="formName">' +
	'<div class="form-group">' +
		'<label>Enter Your OTP here</label>' +
		'<input type="text" placeholder="Your otp" class="name form-control form-control-md" required />' +
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
var data1 = $('#name').val();
var data2 = $('#youremail').val();
var data3 = $('#retype').val();
$.ajax({
type : 'POST',
dataType: 'json',
url  : 'php/class_register.php',
data : {'name': data1, 'email': data2, 'mobileno': regno, 'password': data3, 'class_type': "class"},
success :  function(data)
{
if (data.mensajes == "error") {
$.alert({
title: 'error!',
content: 'error in registeration',
});
} else {
temp_classid = data.class_id;	
$.alert({
title: 'success!',
content: 'Now Move to the next step of registeration!',
});
$("#prev").hide();
$("#next").show();	
}
}
});
//submitRegisterationForm.submit();
} else {
$.alert({
title: 'Alert!',
content: 'Wrong OTP',
});
}
}
}
},
},
});
}
}
});
}
////////////////registeration step 2//////////////
$("form[name='secondstep']").validate({
rules: {
address: {
required: true
},
street: {
required: true
},
locality: {
required: true
},
country: {
required: true,
},
state: {
required: true
},
postcode: {
required: true,
minlength: 4,
}
},
// Specify validation error messages
messages: {
postcode: {
required: "Please provide a postcode",
minlength: "Your postcode must be at least 4 characters long"
},
},
submitHandler: secondstepreg
});
//alert("enter OTP");
function secondstepreg() {
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
url  : 'php/class_address.php',
data : {'address': address, 'street': street, 'locality': locality, 'country': country, 'state': state, 'city': city, 'postcode' : postcode, 'class_id' : temp_classid},
success :  function(data)
{
if (data.men == "error") {
$.alert({
title: 'error!',
content: 'error in registeration',
});
} else {	
$.alert({
title: 'success!',
content: 'add more students!',
});
$("#addstudent").show();
$("#next").hide();
}
}
});
}
//////////////////////////////////forget password//////////////
//$('#forget').click(function(){
//$("#login-form").hide();
//$("#reset_password").show();
//});
$('#sendotp').click(function() {
num = $('#resetmob').val();
genotp = Math.floor(1000 + Math.random() * 9000);
$.ajax({
url: 'includes/forgot.php',
type: 'POST',
data: {'otp' : genotp, 'mob' : num},
success : function(response) {
if(response == 'true') {
$("#enter_otp").show();
$("#reset_password").hide();
$.alert({
title: 'Success!',
content: 'OTP has been sent to your Mobile Number',
});
} else {
$.alert({
title: 'error!',
content: 'This mobile number is not registered ',
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
//alert("OTP match! Now you can reset your password");
$("#enter_otp").hide();
$("#password_reset_end").show();
} else {
$.alert({
title: 'Alas!',
content: 'wrong otp',
});
//alert("wrong otp");
}
});
$('#upadteit').click(function() {
$("#enter_otp").hide();
$("#password_reset_end").show();
var password = $('#pass2').val();
var re_password = $('#pass1').val();
if(password == re_password) {
$.ajax({
url : 'includes/update_password_web.php',
type : 'POST',
data : {'mobile' : num , 'password' : password},
success : function(data){
$.alert({
title: 'success!',
content: data,
});
setTimeout(function(){ window.location.href = 'class_login.php'; }, 1000);
},
});
} else {
$.alert({
title: 'error!',
content: 'paswword did not match',
});
}
});
});