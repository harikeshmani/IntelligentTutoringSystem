<?php
require ("../config.php");
$mobile = $_POST["mob"];
$sms = $_POST["otp"];
$result = mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE mobile = '$mobile'");
$row_count = mysqli_num_rows($result);
if ($row_count == 0) {
$res['msg'] = 'false';  
} else {
$users_info = mysqli_fetch_array($result);
$mob = $users_info['mobile'];
$dest_mobileno = "+91".$mob; 
$sms = "your OTP for forget password is $sms";
$username = "Priyam"; 
$pass = "xscURQIi";
$senderid =  "PRDAPP";
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
$details = array(true);
$res['msg'] = 'ok';
}
echo json_encode($res);
?>