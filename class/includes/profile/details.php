<?php
session_start();
$user_id = $_SESSION['user_id'];
include '../config.php';
if(isset($_REQUEST))
{

if($_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
$tutor_names = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id= '$user_id'"));
$tutor_name = $tutor_names['first_name'];
$tutor_name = str_replace(' ', '', $tutor_name);
$name_file = $tutor_name.$user_id.'.jpeg';
$filename = '../../api/user_image/tutor/'.$name_file;
move_uploaded_file($_FILES['profile_img']['tmp_name'], $filename);
mysqli_query($link, "UPDATE tbl_glow_tutor SET picture = '$name_file' WHERE id='$user_id'");
}
if($_FILES['Certificate']['error']  === UPLOAD_ERR_OK) {
$tutor_names = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id= '$user_id'"));
$tutor_name = $tutor_names['first_name'];
$tutor_name = str_replace(' ', '', $tutor_name);
$name_file = 'highestcertificate.'.$tutor_name.$user_id.'.jpeg';
$filename = '../../api/user_document/tutor/'.$name_file;
mysqli_query($link, "UPDATE tbl_glow_tutor SET  highest_certificate = '$name_file' WHERE id='$user_id'");
move_uploaded_file($_FILES['webcam']['tmp_name'], $filename);
}
$about = $_POST['about_us'];
$address = $_POST['address'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$locality = $_POST['locality'];
$highest_degree = $_POST['highest_degree'];
$high_institute = $_POST['high_institute'];
$result=mysqli_query($link, "UPDATE tbl_glow_tutor SET address='$address', city='$city', state='$state', country='$country', pin_code='$pincode', locality='$locality', about_yourself='$about', highest_degree='$highest_degree', degree_institute='$high_institute' WHERE id='$user_id'");
if($result){
echo "yes";
}
}
?>