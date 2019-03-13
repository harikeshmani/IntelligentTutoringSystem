<?php
include("../config.php");
$mo = $_POST['mobileno'];
if($mo == null) {
  $res['message'] = 'nill';
} else {
$check_mobi = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE mobile_no = '$mo' "));
if($check_mobi == 0) {
$res['message'] = 'false';  
} else {
$username = "Priyam";
$pass = "xscURQIi";
$senderid =  "PRDAPP";
$dest_mobileno = "+91".$mo;
$sms = $_POST["sms"]; 
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://193.105.74.159/api/v3/sendsms/plain",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "user=$username&password=$pass&sender=$senderid&SMSText=$sms&type=longsms&GSM=$dest_mobileno",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Content-Type: application/x-www-form-urlencoded",
  ),
));
$response = curl_exec($curl);
$object = json_decode($response);
$err = curl_error($curl);
curl_close($curl); 
$res['message'] = 'true';  
}
}
echo json_encode($res);
?>