<?php
include('config.php');
$email = $_POST['email'];
$password = $_POST['password'];
$query = "UPDATE tbl_glow_tutor SET password='$password' WHERE email='$email'";
$password_query=mysqli_query($link, $query);

if($password_query) {
	echo "successfully upadated your password";
	
} else {
	
		echo "failure";
	
}
//echo json_encode($details);

?>