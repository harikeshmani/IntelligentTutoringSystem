<?php
session_start();
$user_id = $_SESSION['user_id'];
include '../config.php';
$start_date = $_POST['start_date'];
$end_date =$_POST['end_date']; 
$slots = $_POST['slots'];
$type = $_POST['type'];
$preference_type = $_POST['pref_type'];
if($preference_type !== null) {
mysqli_query($link, "UPDATE tbl_glow_tutor SET service_preference = '$preference_type' WHERE id='$user_id'");
}
$curl = curl_init();
curl_setopt_array($curl, array(
 CURLOPT_URL => "http://pinkrickshawdesign.in/its/api/tutor_sessions.php",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "tutor_id=$user_id&start_date=$start_date&end_date=$end_date&slots=$slots&session_type=$type",
 CURLOPT_HTTPHEADER => array(
   "Cache-Control: no-cache"
 ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
 echo "cURL Error #:" . $err;
} else {
 echo $response;
}
