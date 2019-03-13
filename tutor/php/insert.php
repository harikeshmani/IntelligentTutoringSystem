<?php
session_start();
include('../config.php');
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile_no = $_POST['mobileno'];
$address = $_POST['address'];
$street = $_POST['street'];
$locality = $_POST['locality'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$school = $_POST['school'];
$class = $_POST['class'];
$date = date('Y-m-d');
$qryy = "INSERT INTO tbl_glow_students(username, password, email, mobile_no, school, class, address, street, locality, country, state, city, post_code, created_date) VALUES ('$username', '$password', '$email', '$mobile_no', '$school', '$class', '$address', '$street', '$locality', '$country', '$state', '$city', '$postcode', '$date')";
mysqli_query($link, $qryy);
        $lastid = mysqli_insert_id($link);
       $_SESSION['userid'] = $lastid;
        $details= array(
'user_id' => $lastid,

                );
        
        
echo json_encode($details);
?>