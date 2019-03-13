function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function(e) {
$('#prev').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
$("#profile_img").change(function() {
readURL(this);
});
$(document).ready(function(){
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
$(".fas").hide();
$(".fas1").hide();
$("form[name='add-form']").validate({
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
required: "Please enter your name"
},
yourpassword: {
required: "Please provide a password",
minlength: "Your password must be at least 6 characters long"
},
youremail: "Please enter a valid email address"
},
submitHandler: addstudentform
});
function addstudentform() {
 var form = $("#add-form");
var formData = new FormData(form[0]);
$.ajax({
url  : 'php/add_student.php',
type : "POST",
data: formData,
beforeSend: function(data){
$(".fas1").show();
},
success :  function(data) {
console.log(data);	
$.alert({
title: 'Success!',
content: 'New student has been successfully added to the class. do yo want to add more students?',
buttons: {
confirm: function () {
window.location.href = 'add_student.php';
},
skip: function() {
window.location.href = 'home.php';	
}
},
});
},
cache: false,
contentType: false,
processData: false,
complete:function(data){
$(".fas1").hide();
}
});
}
});