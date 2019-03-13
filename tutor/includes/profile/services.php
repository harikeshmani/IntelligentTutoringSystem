<?php
session_start();
$user_id = $_SESSION['user_id'];
include '../../config.php';
if(isset($_REQUEST))
{
$service_preference = $_POST['service_pref'];
if (in_array('primary', $service_preference)) {
	$primary_subjects = $_POST['primary_subjects'];
foreach($primary_subjects as $value_primary) {
$value_primarys .=  $value_primary.',';
}
mysqli_query($link,"UPDATE tbl_glow_tutor SET primary_subject='$value_primarys', service_preference = concat(service_preference,'primary,') WHERE id='$user_id' ");
}
if (in_array('middle', $service_preference)) {
$medium_subjects = $_POST['medium_subjects'];
foreach($medium_subjects as $value_middle) {
$value_middles .=  $value_middle.',';
}
mysqli_query($link,"UPDATE tbl_glow_tutor SET middle_subject='$value_middles', service_preference = concat(service_preference,'middle,') WHERE id='$user_id' ");
}
if (in_array('high', $service_preference)) {
$high_subjects = $_POST['high_subjects'];
foreach($high_subjects as $value_high) {
$value_highs .=  $value_high.',';
}
mysqli_query($link,"UPDATE tbl_glow_tutor SET high_subject='$value_highs', service_preference = concat(service_preference,'high_school,') WHERE id='$user_id' ");
}
if (in_array('college', $service_preference)) {
$college_subjects = $_POST['college_subjects'];
foreach($college_subjects as $value_college) {
$value_colleges .=  $value_college.',';
}
mysqli_query($link, "UPDATE tbl_glow_tutor SET college_subject='$value_colleges', service_preference = concat(service_preference,'college,') WHERE id='$user_id' ");
}
if (in_array('other', $service_preference)) {
$date = date("Y-m-d");
$course_name = $_POST['new_course_name'];
$num = count($course_name);
for ($i=0; $i < $num; $i++) {
$course_name = $_POST['new_course_name'];
$description = $_POST['new_course_desc'];
$valid_age_group =	$_POST['new_course_group'];
mysqli_query($link, "INSERT INTO tbl_course(user_id, course_name, description, valid_age_group, added_date) VALUES ('$user_id', '$course_name', '$description', '$valid_age_group', '$date')");
}
}
echo "yes";
}
?>