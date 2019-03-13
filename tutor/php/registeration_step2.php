<?php
session_start();
$user_id = $_SESSION['user_id'];
include '../config.php';
$address  = $_POST['address'];
$street   = $_POST['street'];
$locality  = $_POST['locality'];
$country  = $_POST['country'];
$state  = $_POST['state'];
$city  = $_POST['city'];
$postcode  = $_POST['postcode'];
$today = date("Y-m-d");
$result = mysqli_query($link, "UPDATE tbl_glow_tutor SET address = '$address', street = '$street', locality = '$locality', country = '$country', state = '$state', city = '$city', pin_code = '$postcode' WHERE id = '$user_id'");
if(!$result) {
	$reg['message'] = 'error';
}else{
	$reg['message'] ='ok';
  }
echo json_encode($reg);
?>
