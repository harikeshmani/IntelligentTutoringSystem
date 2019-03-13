<?php
session_start();
include '../config.php';
$first  = $_POST['firstname'];
$last   = $_POST['lastname'];
$email  = $_POST['email'];
$mob  = $_POST['phone'];
$about  = $_POST['about'];
$highest  = $_POST['highest'];
$institute  = $_POST['institute'];
$password  = $_POST['password'];
$today = date("Y-m-d");
$result = mysqli_query($link, "INSERT INTO tbl_glow_tutor (first_name, last_name, email, mobile, about_yourself, highest_degree,  degree_institute,  password, reg_date) VALUES ('$first', '$last', '$email', '$mob', '$about', '$highest', '$institute', '$password', '$today')");
$user_id = mysqli_insert_id($link);
if(!$user_id) {
	$reg['message'] = 'error';
}else{
	$reg['message'] ='ok';
   $_SESSION['user_id'] = $user_id;
  }
echo json_encode($reg);
?>
