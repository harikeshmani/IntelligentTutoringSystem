<?php 

$link = mysqli_connect("localhost", "service_user123", "service@p1", "db_glow_service");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>