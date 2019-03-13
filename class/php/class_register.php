<?php
session_start();
include '../config.php';
$name = $_POST['name'];
$email = $_POST['email'];
$mobileno = $_POST['mobileno'];
$password = $_POST['password'];
$result = mysqli_query($link, "INSERT INTO tbl_glow_students (username, email, mobile_no, password, class_type ) VALUES ('$name', '$email', '$mobileno', '$password', 'class')");
$class_id = mysqli_insert_id($link);
if (!$result) {
$res['mensajes'] = 'error';
} else {
$res['mensajes']='ok';
$res['class_id'] = $class_id;
}
echo json_encode($res);

?>