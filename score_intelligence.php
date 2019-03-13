<?php
include("auth.php");
$user_id = $_SESSION['userid'];
$last_id = $_GET["token"];
$total = '319';
$score = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_intelligence WHERE id = '$last_id'"));
$self_score = $score['self_awareness_score'];
if($self_score == '') {
$self_score = '0';
}
$self2_score = $score['self_regulation_score'];
if($self2_score == '') {
$self2_score = '0';
}
$motivation_score = $score['motivation_score'];
if($motivation_score == '') {
$motivation_score = '0';
}
$empathy_score = $score['empathy_score'];
if($empathy_score == '') {
$empathy_score = '0';
}
$social_skills = $score['social_skill_score'];
if($social_skills == '') {
$social_skills = '0';
}
$user_score = $score['overall_score'];
$midval = ($user_score/$total)*100;
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
        <!--         <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="word-rotator-title mb-4">
            The New Way to
            <strong class="inverted inverted-primary">
            <span class="word-rotator active" data-plugin-options="{'delay': 2000, 'animDelay': 300}">
              <span class="word-rotator-items" style="width: 116.828px; transform: translate3d(0px, 0px, 0px); transition: transform 0ms ease 0s, width ease 0s;">
                <span>success.</span>
                <span>advance.</span>
                <span>progress.</span>
                <span>success.</span></span>
              </span>
              </strong>
              </h2>
              <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non <span class="alternative-font">metus.</span> pulvinar. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh.
              </p>
              <hr class="tall">
            </div>
          </div> -->
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <div class="heading heading-border heading-bottom-border">
                  <h3>Emotional Intelligence Score</h3>
                </div>
                <p><h2>You have scored : <strong><?php echo $finalresult; ?>/10</strong></h2></p>
                <hr class="tall">
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-2">
                <h4>Self-Awareness</h4>
                <h5>Your Score</h5>
                <h3><strong><?php echo $self_score; ?>/45</strong></h3>
              </div>
              <div class="col-md-3">
                <h4>Self-Regulation</h4>
                <h5>Your Score</h5>
                <h3><strong><?php echo $self2_score; ?>/45</strong></h3>
              </div>
              <div class="col-md-2">
                <h4>Motivation</h4>
                <h5>Your Score</h5>
                <h3><strong><?php echo $motivation_score; ?>/50</strong></h3>
              </div>
              <div class="col-lg-2">
                <h4>Empathy</h4>
                <h5>Your Score</h5>
                <h3><strong><?php echo $empathy_score; ?>/99</strong></h3>
              </div>
              <div class="col-lg-3">
                <h4>Social Skills</h4>
                <h5>Your Score</h5>
                <h3><strong><?php echo $social_skills; ?>/80</strong></h3>
              </div>
            </div>
            <!-- <div class="col-lg-7">
              <div class="progress-bars mt-4">
                <div class="progress-label">
                  <span>Self-Awareness</span>
                </div>
                <div class="progress mb-2">
                  <div class="progress-bar progress-bar-primary" data-appear-progress-animation="<?php echo $self_score; ?>%" style="width: <?php echo $self_score ?>%">
                    <span class="progress-bar-tooltip" style="opacity: 1;"><?php echo $self_score; ?></span>
                  </div>
                </div>
                <div class="progress-label">
                  <span>Design</span>
                </div>
                <div class="progress mb-2">
                  <div class="progress-bar progress-bar-primary" data-appear-progress-animation="85%" data-appear-animation-delay="300" style="width: 85%;">
                    <span class="progress-bar-tooltip" style="opacity: 1;">85%</span>
                  </div>
                </div>
                <div class="progress-label">
                  <span>WordPress</span>
                </div>
                <div class="progress mb-2">
                  <div class="progress-bar progress-bar-primary" data-appear-progress-animation="75%" data-appear-animation-delay="600" style="width: 75%;">
                    <span class="progress-bar-tooltip" style="opacity: 1;">75%</span>
                  </div>
                </div>
                <div class="progress-label">
                  <span>Photoshop</span>
                </div>
                <div class="progress mb-2">
                  <div class="progress-bar progress-bar-primary" data-appear-progress-animation="85%" data-appear-animation-delay="900" style="width: 85%;">
                    <span class="progress-bar-tooltip" style="opacity: 1;">85%</span>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-lg-12 text-center">
              <p><h3>Average score on the game is <strong>7.2/10</strong></h3></p>
              <p><h4>You can take coaching from our EQ coaches in Marketplace to improve your Emotional Quotient.</h4></p>
            </div>
            <div class="col-lg-12 text-center">
              <a href="intelligence.php"> <button class="btn btn-primary" >Play again to improve your score</button></a>
              <a href="intelligence_list.php"><button type="button" class="btn btn-primary">Exit</button></a>
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