<?php
include '../config.php';
session_start();
$user_id = $_SESSION['userid']; 
$username = mysqli_fetch_array(mysqli_query($link, "SELECT username FROM tbl_glow_students WHERE id = $user_id"));
$username = $username['username'];
$final_image_name = $username.'_'.$user_id.'.jpg';
$filename = '../api/user_image/'.$final_image_name;
move_uploaded_file($_FILES['webcam']['tmp_name'], $filename);

?>
