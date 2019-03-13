<?php
include '../config.php';
session_start();
$user_id = $_SESSION['class_id']; 
$username = mysqli_fetch_array(mysqli_query($link, "SELECT username FROM tbl_glow_students WHERE id = $user_id"));
$username = $username['username'];
$filename = '../../api/user_image/tutor/'.$username.$user_id.'.jpg';
mysqli_query($link, "UPDATE tbl_glow_students SET  picture = '$username.$user_id' WHERE id='$user_id'");
//$filename =  time() . '.jpg';

move_uploaded_file($_FILES['webcam']['tmp_name'], $filename);
?>
