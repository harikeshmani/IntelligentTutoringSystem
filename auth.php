<?php 
error_reporting(0);

session_start();
if(!isset($_SESSION['userid']))
{
    header('Location: index.php');
    exit();
}
include("config.php");
?>