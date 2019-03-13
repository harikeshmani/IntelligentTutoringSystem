<?php
session_start();
//$moodle = $_SESSION['moodle_id'];
$moodle = '41';
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://139.59.45.201/moodle/api/attendence.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "moodle_id=$moodle",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Content-Type: application/x-www-form-urlencoded",
  ),
));
$response = curl_exec($curl);
$object = json_decode($response);
$err = curl_error($curl);
curl_close($curl); 
$maths = $object->maths;
$science = $object->science;
$history = $object->history;
$geography = $object->geography;
echo $maths[0]->points;


$jsonArray = array();
    $jsonArrayItem = array();
    //$row['player'] = {'evev','evevev','eververv','eererberb'};
    //$row['wickets'] = {12,34,45,45};
    //$myarray[0] = array("data01","data02","data03");
    //$myarray[1] = array("data11","data12","data13");
    $jsonArrayItem['label'] = array(data01,data02,data03,data05);
    $jsonArrayItem['value'] = array(23,44,11,54);
    array_push($jsonArray, $jsonArrayItem);
  

echo json_encode($jsonArray);
?>
