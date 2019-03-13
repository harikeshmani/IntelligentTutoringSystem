<?php 
error_reporting(0);

session_start();
if(!isset($_SESSION['user_id']))
{
    header('Location: tutor_login.php');
    exit();
}
include("config.php");
?>