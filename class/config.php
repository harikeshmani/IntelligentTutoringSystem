
<?php 

 $link = mysqli_connect("localhost", "sterlite123", "sterlite@123", "db_sterlite");
 if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
 }
 ?>