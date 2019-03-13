<?php
session_start();
$user_id = $_SESSION['userid'];
include('../config.php');
$school = $_POST['school'];
$class = $_POST['class'];
$address = $_POST['address'];
$locality = $_POST['locality'];
$street = $_POST['street'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$pin = $_POST['pin_code'];
$facebook_link = $_POST['fb_link'];
$twitter_link = $_POST['twitter_link'];
$instagram_link = $_POST['insta_link'];
$subject1 = $_POST['sub1'];
$subject2 = $_POST['sub2'];
$subject3 = $_POST['sub3'];
$subject4 = $_POST['sub4'];
$subject5 = $_POST['sub5'];
$extra1 = $_POST['extra1'];
$extra2 = $_POST['extra2'];
$extra3 = $_POST['extra3'];
$extra4 = $_POST['extra4'];
$extra5 = $_POST['extra5'];
$sport1 = $_POST['sport1'];
$sport2 = $_POST['sport2'];
$sport3 = $_POST['sport3'];
$sport4 = $_POST['sport4'];
$sport5 = $_POST['sport5'];
$date = date("Y-m-d");
if($user_id==''){
echo "user id not found";
}else{
mysqli_query($link,"UPDATE tbl_glow_students SET class = '$class', school = '$school', address = '$address', street = '$street', locality = '$locality', post_code = '$pin', city = '$city', state = '$state', country = '$country', facebook_link = '$facebook_link', twitter_link = '$twitter_link', instagram_link = '$instagram_link', subject1 = '$subject1', subject2 = '$subject2', subject3 = '$subject3', subject4 = '$subject4', subject5 = '$subject5', extra_activities1 = '$extra1', extra_activities2 = '$extra2', extra_activities3 = '$extra3', extra_activities4 = '$extra4', extra_activities5 = '$extra5', sports1 = '$sport1', sports2 = '$sport2', sports3 = '$sport3', sports4 = '$sport4', sports5= '$sport5', updated_date = '$date' WHERE id='$user_id'");
$username_data = mysqli_fetch_array(mysqli_query($link, "SELECT username FROM tbl_glow_students WHERE id = $user_id"));
$username = $username_data['username'];
$final_image_name = $username.'_'.$user_id.'.jpg';
$filename = '../api/user_image/'.$final_image_name;
mysqli_query($link, "UPDATE tbl_glow_students SET  pic = '$final_image_name' WHERE id='$user_id'");
move_uploaded_file($_FILES['picture']['tmp_name'], $filename);
echo "Profile Updated Successfully";
}

?>