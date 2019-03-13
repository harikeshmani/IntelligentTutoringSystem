<?php
session_start();
include 'config.php';
$user_id = $_SESSION['user_id'];
$start = $_POST['start_time'];
$end = $_POST['end_time'];
$days = $_POST['days'];
$type = $_POST['group'];

$get_tutor_name =  mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = '$user_id'"));
$name = $get_tutor_name['first_name'];
$res = mysqli_query($link, "INSERT INTO tbl_tutors_available_sessions(tutor_id, tutor_name, start, end, available_dates, session_type, date) VALUES ($user_id, '$name' , '$start', '$end', '$days' , '$type', CURRENT_TIMESTAMP)");
$error = mysqli_error($link);
if($res) {
	echo $error;
} else {
   echo $error;
}
?>
