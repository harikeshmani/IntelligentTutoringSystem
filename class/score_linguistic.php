<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
$mark = $_POST["marks"];
//mysqli_query($link, "INSERT INTO tbl_linguistic (user_id, score) VALUES ('$user_id', '$mark') ");
$totalmarks = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tbl_linguistic WHERE user_id = '$user_id' "));
$resval=mysqli_query($link, "SELECT SUM(score) FROM tbl_linguistic WHERE user_id = '$user_id' ");
while( $userfetch_datass = mysqli_fetch_array($resval)){
$mark=$userfetch_datass['SUM(score)'];
}
$marks = $mark/3;
$midval = ($marks/$totalmarks)*100;
$midvals = $midval/10;
$finalresult = round($midvals,1);
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
                <h3>Overall <strong>Linguistic</strong> Score</h3>
              </div>
              <p><h2>Your Overall Score is : <strong> <?php echo $finalresult. "/10"; ?></strong></h2></p>
              <a href="linguistic.php"><button class="btn btn-primary" >Play again to improve your score</button></a>
              <a href="linguistic_list.php"> <button class="btn btn-primary">Exit</button></a>
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