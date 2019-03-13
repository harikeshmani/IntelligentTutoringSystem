<?php
include '../config.php';
session_start();
$user_id = $_SESSION['user_id']; 
$username = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id = $user_id"));
$username = $username['first_name'];
$final_image_name = $username.'_'.$user_id.'.jpg';
$filename = '../../api/user_image/tutor/'.$final_image_name;
mysqli_query($link, "UPDATE tbl_glow_tutor SET  picture = '$final_image_name' WHERE id='$user_id'");
move_uploaded_file($_FILES['webcam']['tmp_name'], $filename);
?>