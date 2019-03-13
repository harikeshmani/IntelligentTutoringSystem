<?php
session_start();
include('../config.php');
$url = "https://fcm.googleapis.com/fcm/send";
$serverKey = 'AAAAKRMauf8:APA91bFXD6m3O5YyDBuI0m1GQPflSIV-sYVgvEF5-WrPdxwbajxhDTAxerq3fbFexF_hFB9XgJiG4-SDLykSTtWLPNSZtp7zaY0icxKw6eLg6KFpuCqoXzCX8b6kl1me09BZL0GcE7wDZAZ_LAE89tX0dKjEXq50NQ';
$user_id= $_SESSION['userid'];
$room_name = $_POST['room_name'];
$file_type = $_POST['type'];
$sc_id = $_POST['session_id'];
$tutor_data = mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = $user_id ");
$tutor=mysqli_fetch_array($tutor_data);
$file_name=$_FILES['file_name']['name'];
$abc=$_FILES['file_name']['tmp_name'];
$today = date("Y-m-d");
$dirname = "../api/uploaded_files/".$room_name."/".$today."/".$file_type;
$date_B4_TENDAYS = date("Y-m-d", strtotime('-15 day'));
if(!file_exists($dirname)){
    mkdir($dirname, 0777, true);
}
$directories = glob($room_name . '/*' , GLOB_ONLYDIR);
foreach ($directories as $subdir) {
        $dirGOT = substr($subdir, 9);
        if($dirGOT < $date_B4_TENDAYS)
        {
            rmdir($room_name.'/'.$dirGOT);
        }
}
$file_path = "../api/uploaded_files/".$room_name."/".$today."/".$file_type."/";
$linkk="https://pinkrickshawdesign.in/intelligent_tutoring_system/api/".$file_path;
$qryy = "INSERT INTO tbl_session_file(file_name, file_type, user_id, session_id, room_name, created_date) values ('$file_name', '$file_type', '$user_id', '$sc_id', '$room_name', '$today')";
$username_data=mysqli_query($link, $qryy);
$moved = move_uploaded_file($abc, $file_path.$file_name);
if( $moved ) {
  echo "Successfully uploaded";         
} else {
  echo "Not uploaded because of error #".$_FILES["file"]["error"];
}

$tutor_dataa = mysqli_query($link, "SELECT * FROM tbl_scheduled_sessions WHERE session_id = $sc_id ");
while($tutorr=mysqli_fetch_array($tutor_dataa)){
    $message1 = "New File Uploaded";
$tutor_id = $tutorr['tutor_id'];
$student_id = $tutorr['student_id'];
$tutors_dataat = mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = $tutor_id ");
$tutorrss=mysqli_fetch_array($tutors_dataat);
$aaa = mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = $user_id ");
$bbb=mysqli_fetch_array($aaa);
$sname = $bbb['username'];
$title = "New Message From $sname";
$notification = array('title' =>$title , 'body' => $message1, 'sound' => 'default', 'badge' => '1');
$arrayToSend = array('to' => $tutorrss['device_token'], 'notification' => $notification,'priority'=>'high');
$json = json_encode($arrayToSend);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: key='. $serverKey;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
//$response = curl_exec($ch);
curl_close($ch);
}
?>