<?php 
error_reporting(0);

session_start();
if(!isset($_SESSION['class_id']))
{
    header('Location: class_login.php');
    exit();
}
include("config.php");
?>