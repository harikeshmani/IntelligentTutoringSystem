<?php
include("auth.php");
$today = date("Y-m-d");
$user_id = $_SESSION['user_id'];
$student_id = base64_decode(urldecode($_GET['id']));
$moodle = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id='$student_id'"));
$moodle_id = $moodle['moodle_id'];
$i = 1;
$j = 1;
$k = 1;
///////////code for attendence/////
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://139.59.45.201/moodle/api/attendence.php",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "moodle_id=$moodle_id",
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
),
));
$response_attendence = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$att_chars = json_decode($response_attendence);
///////////////////////code for marks subject//////////////
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://139.59.45.201/moodle/api/grader.php",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "moodle_id=$moodle_id&view=overall",
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
),
));
$response_marks = curl_exec($curl);
curl_close($curl);
$marks_th = json_decode($response_marks);
2
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("header.php") ?>
    <link rel="stylesheet" href="../charts/css/main.css"></style>
  </head>
  <body>
    <div class="body">
      <?php include("menu.php") ?>
      <div role="main" class="main" >
        <section class="page-header">
          <div class="container">
            <div class="row">
            </div>
            <div class="row">
              <div class="col">
                <h1>Your Students</h1>
              </div>
            </div>
          </div>
        </section>
        <?php if($mmodel_id == "0") {
          echo "Student is not registered to school";
        } else { ?>
        <div class="container">
          <div class="row">
            <h2 id="content">Attendence</h2>
            <div class="css_bar_graph">
              <!-- y_axis labels -->
              <ul class="y_axis">
                <li>100%</li><li>80%</li><li>60%</li><li>40%</li><li>20%</li><li>0%</li>
              </ul>
              <!-- x_axis labels -->
              <ul class="x_axis">
                <?php foreach ($att_chars as $sub) {
                echo  "<li>".$sub->subject."</li>";
                }
                ?>
              </ul>
              <!-- graph -->
              <div class="graph">
                <!-- grid -->
                <ul class="grid">
                  <li><!-- 100 --></li>
                  <li><!-- 80 --></li>
                  <li><!-- 60 --></li>
                  <li><!-- 40 --></li>
                  <li><!-- 20 --></li>
                  <li class="bottom"><!-- 0 --></li>
                </ul>
                <!-- bars -->
                <!-- 250px = 100% -->
                <ul>
                  <?php foreach ($att_chars as $sub) {
                  $att_perc = $sub->points*100/$sub->maxpoints;
                  $percent = round((float)$att_perc);
                  $height = $att_perc*2.5;
                  $css_height = "height:". $height ."px;";
                  echo  "<li class='bar nr_$i blue' style=$css_height><div class='top'></div><div class='bottom'></div><span>$percent</span></li>";
                  $i++;
                  }
                  ?>
                </ul>
              </div>
              <!-- graph label -->
              <div class="label"><span>Attendence: </span>Result (in percent)</div>
            </div>
          </div>
          <!--for the marks-->
          <div id="acad_div">
            <h2 id="content">Academics</h2>
            <div class="css_bar_graph">
              <!-- y_axis labels -->
              <ul class="y_axis">
                <li>100%</li><li>80%</li><li>60%</li><li>40%</li><li>20%</li><li>0%</li>
              </ul>
              <!-- x_axis labels -->
              <ul class="x_axis">
                <?php foreach ($marks_th as $mark) {
                if ($mark->type=="Academics") {
                echo  "<li>".$mark->test_name."</li>";
                }
                
                }
                ?>
              </ul>
              <!-- graph -->
              <div class="graph">
                <!-- grid -->
                <ul class="grid">
                  <li><!-- 100 --></li>
                  <li><!-- 80 --></li>
                  <li><!-- 60 --></li>
                  <li><!-- 40 --></li>
                  <li><!-- 20 --></li>
                  <li class="bottom"><!-- 0 --></li>
                </ul>
                <!-- bars -->
                <!-- 250px = 100% -->
                <ul class="maraks">
                  <?php foreach ($marks_th as $mark) {
                  if ($mark->type=="Academics") {
                  $mark_perc1 =($mark->marks*100)/$mark->total;
                  $percent_mark1 = round((float)$mark_perc1);
                  $height_mark1 = $percent_mark1*2.5;
                  $css_height2 = "height:". $height_mark1 ."px;";
                  echo  "<li class='bar nr_$j blue' style=$css_height2 value='$mark->test_name' ><div class='top'></div><div class='bottom'></div><span>$percent_mark1</span></li>";
                  $j++;
                  } }
                  ?>
                </ul>
              </div>
              <!-- graph label -->
              <div class="label"><span>Marks: </span>Result (in percent)</div>
            </div>
          </div>
          <!--for extra curricular activities-->
          <div id="extra_div">
            <h2 id="content">Extra Curricular</h2>
            <div class="css_bar_graph">
              <!-- y_axis labels -->
              <ul class="y_axis">
                <li>100%</li><li>80%</li><li>60%</li><li>40%</li><li>20%</li><li>0%</li>
              </ul>
              <!-- x_axis labels -->
              <ul class="x_axis">
                <?php foreach ($marks_th as $mark) {
                if ($mark->type=="Extra curricular activity") {
                echo  "<li>".$mark->test_name."</li>";
                }
                
                }
                ?>
              </ul>
              <!-- graph -->
              <div class="graph">
                <!-- grid -->
                <ul class="grid">
                  <li><!-- 100 --></li>
                  <li><!-- 80 --></li>
                  <li><!-- 60 --></li>
                  <li><!-- 40 --></li>
                  <li><!-- 20 --></li>
                  <li class="bottom"><!-- 0 --></li>
                </ul>
                <!-- bars -->
                <!-- 250px = 100% -->
                <ul>
                  <?php foreach ($marks_th as $mark) {
                  if ($mark->type=="Extra curricular activity") {
                  $mark_perc2 = $mark->marks*100/ $mark->total;
                  $percent_mark2 = round((float)$mark_perc2 );
                  $height_mark3 = $percent_mark2*2.5;
                  $css_height4 = "height:". $height_mark3 ."px;";
                  echo  "<li class='bar nr_$k blue' style=$css_height4><div class='top'></div><div class='bottom'></div><span>$percent_mark2</span></li>";
                  $k++;
                  } }
                  ?>
                </ul>
              </div>
              <!-- graph label -->
              <div class="label"><span>Extra Curricular Marks: </span>Result (in percent)</div>
            </div>
          </div>
        </div>
     <?php } ?>
      </div>
    </div>
    <?php include("footer.php") ?>
  </div>
  <!-- Vendor -->
  <?php include("footer_files.php") ?>
</body>
</html>