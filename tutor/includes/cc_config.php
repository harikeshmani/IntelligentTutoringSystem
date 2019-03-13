<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'sterlite123';
$dbPassword = 'sterlite@123';
$dbName = 'db_sterlite';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}