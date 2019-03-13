<?php
require ("config.php");
$original_number = $_POST["mobileno"];
$dest_mobileno = "+91".$_POST["mobileno"];
$sms = $_POST["otp"];
$sms = "your OTP for mobile varifiaction at class registeration is $sms";
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
$reg['msg'] = 'true';
echo json_encode($reg);
?>