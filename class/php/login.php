<?php
session_start();
include '../config.php';
if(isset($_POST['login'])) {
$email = $_POST['email']; 
$password = $_POST['password']; 
$result = mysqli_query($link, "SELECT class_id FROM tbl_glow_students WHERE class_type = 'class' AND email = '$email' AND password = '$password'");
$row_count = mysqli_num_rows($result);
if ($row_count == 0) {
$res['mensaje'] = 'error';
} else {
  $res['mensaje']='ok';
$session_id_row = mysqli_fetch_array($result);
$_SESSION['class_id'] = $session_id_row['class_id'];
  }
echo json_encode($res);
  exit();
}
?>