<?php
session_start();
$user_id = $_SESSION['user_id'];
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
mysqli_query($link,"UPDATE tbl_glow_tutor SET  address = '$address', street = '$street', locality = '$locality', pin_code = '$pin', city = '$city', state = '$state', country = '$country', updated_date = '$date' WHERE id='$user_id'");
$username_data = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id = $user_id"));
$username = $username_data['first_name'];
$final_image_name = $username.'_'.$user_id.'.jpg';
$filename = '../../api/user_image/tutor/'.$final_image_name;
mysqli_query($link, "UPDATE tbl_glow_tutor SET  pic = '$final_image_name' WHERE id='$user_id'");
move_uploaded_file($_FILES['picture']['tmp_name'], $filename);
echo "Profile Updated Successfully";
}

?>

