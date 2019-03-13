<?php
include('../config.php');
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$query = "UPDATE tbl_glow_tutor SET password='$password' WHERE mobile='$mobile'";
$password_query=mysqli_query($link, $query);
if($password_query) {
$resp['message'] = 'ok';	
} else {
$resp['message'] = 'error';
}
echo json_encode($resp);
?>