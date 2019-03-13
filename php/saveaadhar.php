<?php
session_start();
$user_id = $_SESSION['userid'];
$files = "Aadhar" .$user_id;
move_uploaded_file($_FILES["webcam"]["tmp_name"], "api/user_document/".$files);
//move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);

?>
