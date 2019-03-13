<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
$dataquery=mysqli_query($link, "SELECT * FROM tbl_working_memory WHERE user_id = '$user_id' ");
$total = mysqli_num_rows($dataquery);
$usdata=mysqli_query($link, "SELECT SUM(score) FROM tbl_working_memory WHERE user_id = '$user_id'");
while( $userfetch_datass = mysqli_fetch_array($usdata)){
$mark=$userfetch_datass['SUM(score)'];
}
$finalresult=($mark/$total)*100;
$midval = $finalresult/10;
$showresult = round($midval,1);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("header.php") ?>
  </head>
  <body>
    <div class="body">
      <?php include("menu.php") ?>
      <div role="main" class="main">
        <section class="page-header">
          <div class="container">
            <div class="row">
            </div>
            <div class="row">
              <div class="col">
                <h1>Score</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="heading heading-border heading-bottom-border">
                <h3>Memory Exercise Score</h3>
              </div>
              <p><h2>Your Overall Score is : <strong> <?php echo $showresult. "/10"; ?></strong></h2></p>
              <a href="memory_main.php"><button class="btn btn-primary" >Play again</button></a>
              <a href="memory_list.php"> <button class="btn btn-primary">Exit</button></a>
            </div>
          </div>
        </div>
      </div>
      <?php include("footer.php") ?>
    </div>
    <!-- Vendor -->
    <?php include("footer_files.php"); ?>
    
  </body>
</html>