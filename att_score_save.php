<?php
include("auth.php");
$user_id = $_SESSION["userid"];
unset($seq);
$seq = rand(1,2);
if (isset($_POST["scores"])) {
$scr = $_POST["scores"];
mysqli_query($link, "INSERT INTO tbl_attention (user_id, score ) VALUES ('$user_id', '$scr') ");
}
?>