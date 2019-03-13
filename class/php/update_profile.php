<?php
session_start();
$user_id = $_SESSION['class_id'];
include('../config.php');
$address = $_POST['address'];
$locality = $_POST['locality'];
$street = $_POST['street'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$pin = $_POST['pin_code'];
$date = date("Y-m-d");
if($user_id==''){
echo "user id not found";
}else{
$done = mysqli_query($link,"UPDATE tbl_glow_students SET  address = '$address', street = '$street', locality = '$locality', post_code = '$pin', city = '$city', state = '$state', country = '$country', updated_date = '$date' WHERE id='$user_id'");
$username_data = mysqli_fetch_array(mysqli_query($link, "SELECT username FROM tbl_glow_students WHERE id = $user_id"));
$username = $username_data['username'];
if($username!=='') {
$filename = '../../api/user_image/'.$username.'_'.$user_id.'.jpg';
mysqli_query($link, "UPDATE tbl_glow_students SET pic = '$username.'_'.$user_id.'.jpg' WHERE id='$user_id'");
move_uploaded_file($_FILES['picture']['tmp_name'], $filename);
}
echo "Profile Updated Successfully";
}
?>