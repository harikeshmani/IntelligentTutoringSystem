<?php
$servername = "localhost";
$username = "service_user123";
$password = "service@p1";
$dbName = "db_glow_service";
$conn = new mysqli($servername, $username, $password, $dbName);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM top_odi_wicket_takers";
$result = $conn->query($query);
$jsonArray = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $jsonArrayItem = array();
    $jsonArrayItem['label'] = $row['player'];
    $jsonArrayItem['value'] = $row['wickets'];
    array_push($jsonArray, $jsonArrayItem);
  }
}
$conn->close();
header('Content-type: application/json');
echo json_encode($jsonArray);
?>
