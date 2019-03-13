<?php
session_start();
$class_id = $_SESSION['class_id'];
include '../config.php';
$name = $_POST['name'];
$email = $_POST['youremail'];
$mobileno = $_POST['phone'];
$password = $_POST['yourpassword'];
$address = $_POST['address'];
$street = $_POST['street'];
$locality = $_POST['locality'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$result = mysqli_query($link, "INSERT INTO tbl_glow_students (username, password, email, mobile_no) VALUES ('$name', '$password', '$email', '$mobileno')");
$user_id = mysqli_insert_id($link);
$filename = '../../api/user_image/'.$name.'_'.$user_id.'.jpg';
$pic_db = $name.'_'.$user_id.'.jpg';
$upload = move_uploaded_file($_FILES['profile_img']['tmp_name'], $filename);
if($upload) {
mysqli_query($link, "UPDATE tbl_glow_students SET class_id= '$class_id', address = '$address', street = '$street', locality='$locality', post_code='$postcode', city='$city', state='$state', country='$country' , pic = '$pic_db' WHERE id = '$user_id'");
}
?>
