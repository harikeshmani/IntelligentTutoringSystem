<?php
include_once('../config.php');
$email = $_POST['email'];
$qry= "SELECT * FROM tbl_glow_students WHERE email = '".$email."' ";
$insert_data=mysqli_query($link, $qry);
$fetch_data = mysqli_fetch_array($insert_data);
$count_data = mysqli_num_rows($insert_data);
 if($count_data>0){
 	 $details= array(
         'status' => "Yes",
         'message' => "User Already Exists.",

		);
	} else {
		$details = array(
		'status' => "No",
        'message' => "User doesn't Exists.",
        
		);
	}
	echo json_encode($details);
?>