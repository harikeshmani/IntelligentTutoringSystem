<?php 
data : {'name': data1, 'email': data2, 'mobileno': regno, 'password': data3, 'school': "", 'class': "", 'google_id': "", 'fb_id' : "", 'class_type': "class", 'class_id': ""},

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://139.59.45.201/moodle/api/register_web.php",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "name=$name&email=$youremail&password=$yourpassword&mobileno=$phone&address=$address&street=$street&locality=$locality&country=$country&state=$state&city=$city&postcode=$postcode&school=$school&class=$class",
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
"Content-Type: application/x-www-form-urlencoded",
),
));
$response = curl_exec($curl);
$object = json_decode($response);
$err = curl_error($curl);
curl_close($curl);
$message = $object->message;
$status = $object->status;
if($status == "No") {
$respo['mensajeres'] = $message;
} else if ($status == "Yes") {
$respo['mensajeres'] = 'success';	
} else {
$respo['mensajeres'] = 'Error in registeration. Please, try after some time';
}
echo json_encode($respo);

?>