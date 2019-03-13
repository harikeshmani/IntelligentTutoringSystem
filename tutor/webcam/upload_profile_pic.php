<?php
session_start();
include '../config.php';
$id = $_SESSION['user_id']; 
$tutor_names = mysqli_fetch_array(mysqli_query($link, "SELECT first_name FROM tbl_glow_tutor WHERE id= '$id'"));
$tutor_name = $tutor_names['first_name'];
$tutor_name = str_replace(' ', '', $tutor_name);
$name_file = $tutor_name.$id.'.jpeg';
$filename = '../../api/user_image/tutor/'.$name_file;
mysqli_query($link, "UPDATE tbl_glow_tutor SET  picture = '$name_file' WHERE id='$id'");
//$filename =  time() . '.jpg';

move_uploaded_file($_FILES['webcam']['tmp_name'], $filename);
?>
