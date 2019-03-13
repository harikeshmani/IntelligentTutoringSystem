<?php
include('../config.php');
$mobile = $_POST['mobileno'];
$password = $_POST['password'];
$query = "UPDATE tbl_glow_students SET password='$password' WHERE mobile_no='$mobile'";
$password_query=mysqli_query($link, $query);
if($password_query) {
	$resp['message'] = 'successfully upadated your password';
	
} else {
		$resp['message'] = 'failure';
	
}
echo json_encode($resp);
?>