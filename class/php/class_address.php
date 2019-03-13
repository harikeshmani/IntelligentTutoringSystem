<?php
session_start();
include '../config.php';
$address = $_POST['address'];
$street = $_POST['street'];
$locality = $_POST['locality'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$class_id = $_POST['class_id'];
$result = mysqli_query($link, "UPDATE tbl_glow_students SET address = '$address', street = '$street', locality = '$locality', post_code = '$postcode', city = '$city', state = '$state', country = '$country', class_id = '$class_id' WHERE id = '$class_id'");
if (!$result) {
$res['men'] = 'error';
} else {

$res['men'] = 'ok';	
$res['men'] = $class_id;
$_SESSION['class_id'] = $class_id;
}
echo json_encode($res);

?>
