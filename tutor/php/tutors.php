<?php
$subject = $_POST['subject'];
$message = $_POST['message'];
$user_id = $_POST['user_id'];
$tutor_id = $_POST['tutor_id'];
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "https://pinkrickshawdesign.in/its/api/chat.php",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "tutor_id=$tutor_id&student_id=$user_id&subject=$subject&message=$message&to=$tutor_id&from=$user_id& role_type='student'",
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
"Content-Type: application/x-www-form-urlencoded",
),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
echo "ok";

?>