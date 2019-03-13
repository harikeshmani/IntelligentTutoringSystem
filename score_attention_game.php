<?php
include("auth.php");
$user_id = $_SESSION['userid'];
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
                <h3>Attention Exercise Score</h3>
              </div>
              <?php
              $resss = "SELECT * FROM tbl_attention WHERE user_id = '$user_id' ";
              $usss=mysqli_query($link, $resss);
              $usc= mysqli_num_rows($usss);
              //echo $usc;
              $ressss = "SELECT SUM(score) FROM tbl_attention WHERE user_id = '$user_id' ";
              $ussss=mysqli_query($link, $ressss);
              while( $userfetch_datass = mysqli_fetch_array($ussss)){
              $mark=$userfetch_datass['SUM(score)'];
              //echo $mark;
              //  //return $mark;
              // //echo $finalresult;
              }
              $finalresult=($mark/$usc)*100;
              $midval = $finalresult/10;
              $midvals = round($midval,1);
              //echo $finalresult;
              ?>
                <p><h2>Your Overall Score is :  <?php echo $midvals. "/10"; ?></h2></p>

                <a href="attention_game.php">  <button  class="btn btn-primary" >Play again to improve your score</button></a>
                <a href="attention_list.php">  <button  class="btn btn-primary">Exit</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include("footer.php") ?>
    </div>
    <!-- Vendor -->
   <?php include("footer_files.php") ?>
    
  </body>
</html>