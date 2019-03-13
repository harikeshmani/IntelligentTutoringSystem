<?php
include("auth.php");
$user_id = $_SESSION["class_id"];
unset($seq);
$seq = rand(1,2);
if (isset($_POST["scores"])) {
$scr = $_POST["scores"];
mysqli_query($link, "INSERT INTO tbl_attention (user_id, score ) VALUES ('$user_id', '$scr') ");
}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <?php include("header.php") ?>
    <style type="text/css">
    .centered {
    position: absolute;
    bottom: 55%;
    left: 43%;
    font-size: 5em;
    color: aliceblue;
    font-weight: bolder;
    }
    .pictochange {
    cursor: pointer;
    }
    </style>
  </head>
  <body>
    <div class="body">
      <?php include("menu.php") ?>
      <div class="modal" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body">
              <?php if ($seq == '2') {
              echo "<h2>Tap the block in <strong>reverse sequence.</strong></h2>";
              } else if($seq == '1') {
              echo "<h2>Tap the block in <strong>same sequence.</strong></h2>";
              }else{
              echo "error";
              } ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="matchresponses">Attempt</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal content-->
      <!--main page Starts here-->
      <div role="main" class="main">
        <section class="page-header">
          <div class="container">
            <div class="row">
            </div>
            <div class="row">
              <div class="col">
                <h1>Corsi Block Tapping Test</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
          <div id="intro" class="row img-fluid appear-animation animated fadeInRightBig appear-animation-visible" data-appear-animation="fadeInRightBig" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;">
            <div class="col-lg-12 text-center" >
              <div class="heading heading-border heading-bottom-border">
                <h2>Nine Block Test</h2>
              </div>
              <h2> In this test you will see <strong>9 blocks</strong> which will light up in a sequence. Tap the blocks in the sequence suggested to win.</h2>
              <h2>For example if the blocks 9,4,7 light up and the exercise says tap in the same sequence. Tapping 9,4,7 will complete the task. If the exercise says tap in opposite sequence tapping 7,4,9 will complete the exercise.</h2>
              <button type="button"  class="btn btn-primary" id="startgame">Click here to start the test</button>
            </div>
          </div>
          <div id="resultss" class="row img-fluid appear-animation animated zoomIn appear-animation-visible" data-appear-animation="zoomIn" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;">
            <div class="col-lg-12 text-center" >
              <div class="heading heading-border heading-bottom-border">
                <h2>Your Result</h2>
              </div>
              <div id="image"></div>
              <h2 id="responsegamescore"></h2>
              <?php $randurl = rand(2,9) ?>
              <a href="attention_game<?php echo $randurl;?>.php"><button type="button" class="btn btn-primary">Next Exercise</button></a>
              <a href="score_attention_game.php" class="gotolink"><button type="button" class="btn btn-primary">Overall Score</button></a>
            </div>
          </div>
          <div class="row" id="originalgame">
            <div class="col">
              <?php
              $randarray = array();
              for($i = 1; $i <= 10; )
              {
              unset($rand);
              $rand = rand(0, 9);
              if(!in_array($rand, $randarray))
              {
              $randarray[] = $rand;
              $i++;
              }
              }
              ?>
              <div class="row">
                <div class="col-md-2"><img src="img/box.png" alt="" id="pic1" class="pictochange"><div class="centered"><?php echo $randarray[0]; ?></div></div>
                <div class="col-md-2"></div>
                <div class="col-md-2" id="2"><img src="img/box.png" alt="" id="pic2" class="pictochange"><div class="centered"><?php echo $randarray[1]; ?></div></div>
                <div class="col-md-2"></div>
                <div class="col-md-2" id="3"><img src="img/box.png" alt="" id="pic3" class="pictochange"><div class="centered"><?php echo $randarray[2]; ?></div></div>
                <!-- Break -->
                <div class="col-md-2" id="4"><img src="img/box.png" alt="" id="pic4" class="pictochange"><div class="centered"><?php echo $randarray[3]; ?></div></div>
                <div class="col-md-2"></div>
                <div class="col-md-2" id="5"><img src="img/box.png" alt="" id="pic5" class="pictochange"><div class="centered"><?php echo $randarray[4]; ?></div></div>
                <!-- Break -->
                <div class="col-md-2" id="6"><img src="img/box.png" alt="" id="pic6" class="pictochange"><div class="centered"><?php echo $randarray[5]; ?></div></div>
                <div class="col-md-2"></div>
                <div class="col-md-2" id="7"><img src="img/box.png" alt="" id="pic7" class="pictochange"><div class="centered"><?php echo $randarray[6]; ?></div></div>
                <div class="col-md-2"></div>
                <div class="col-md-2" id="8"><img src="img/box.png" alt="" id="pic8" class="pictochange"><div class="centered"><?php echo $randarray[7]; ?></div></div>
                <div class="col-md-2"></div>
                <div class="col-md-2" id="9"><img src="img/box.png" alt="" id="pic9" class="pictochange"><div class="centered"><?php echo $randarray[8]; ?></div></div>
                <div class="col-md-2"></div>
                <div class="col-md-2" id="10"><img src="img/box.png" alt="" id="pic10" class="pictochange"><div class="centered"><?php echo $randarray[9]; ?></div></div>
              </div>
            </div>
          </div>
        </div>
        <?php include("footer.php") ?>
      </div>
      <!-- ../vendor -->
      <?php include("footer_files.php") ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.14.1/lodash.min.js"></script>
      <script>
      $(function() {
      $("#originalgame").hide();
      $("#resultss").hide();
      var tosave = [];
      sequence = "<?php echo $seq; ?>";
      $("#startgame").click(function() {
      $("#intro").hide();
      $("#originalgame").show();
      var picturesid = ["#pic1", "#pic2", "#pic3", "#pic4", "#pic5", "#pic6", "#pic7", "#pic8", "#pic9", "#pic10"];
      litpicid = _.sampleSize(picturesid, 9);
      setTimeout(function () {
      $(litpicid[0]).attr("src","img/box-lit.png");
      }, 1000);
      setTimeout(function () {
      $(litpicid[0]).attr("src","img/box.png");
      }, 2000);
      setTimeout(function () {
      $(litpicid[1]).attr("src","img/box-lit.png");
      }, 3000);
      setTimeout(function () {
      $(litpicid[1]).attr("src","img/box.png");
      }, 4000);
      setTimeout(function () {
      $(litpicid[2]).attr("src","img/box-lit.png");
      }, 5000);
      setTimeout(function () {
      $(litpicid[2]).attr("src","img/box.png");
      }, 6000);
      setTimeout(function () {
      $(litpicid[3]).attr("src","img/box-lit.png");
      }, 7000);
      setTimeout(function () {
      $(litpicid[3]).attr("src","img/box.png");
      }, 8000);
      setTimeout(function () {
      $(litpicid[4]).attr("src","img/box-lit.png");
      }, 8500);
      setTimeout(function () {
      $(litpicid[4]).attr("src","img/box.png");
      }, 9000);
      setTimeout(function () {
      $(litpicid[5]).attr("src","img/box-lit.png");
      }, 9500);
      setTimeout(function () {
      $(litpicid[5]).attr("src","img/box.png");
      }, 10000);
      setTimeout(function () {
      $(litpicid[6]).attr("src","img/box-lit.png");
      }, 10500);
      setTimeout(function () {
      $(litpicid[6]).attr("src","img/box.png");
      }, 11000);
      setTimeout(function () {
      $(litpicid[7]).attr("src","img/box-lit.png");
      }, 12000);
      setTimeout(function () {
      $(litpicid[7]).attr("src","img/box.png");
      }, 13000);
      setTimeout(function () {
      $(litpicid[8]).attr("src","img/box-lit.png");
      }, 14000);
      setTimeout(function () {
      $(litpicid[8]).attr("src","img/box.png");
      }, 15000);
      setTimeout(function () {
      $("#myModal1").modal("show");
      }, 15500);
      });
      $("#matchresponses").click(function() {
      $(".pictochange").click(function(event) {
      if(tosave.length < 8){
      $(this).attr("src","img/box-lit.png");
      var divtobesaved = $(this).attr("id");
      tosave.push(divtobesaved);
      } else if(tosave.length == 8) {
      $(this).attr("src","img/box-lit.png");
      var divtobesaved = $(this).attr("id");
      tosave.push(divtobesaved);
      $("#myModal2").modal("show");
      if (sequence == 1) {
      if ((litpicid[0] == "#"+tosave[0]) && (litpicid[1] == "#"+tosave[1]) && (litpicid[2] == "#"+tosave[2]) && (litpicid[3] == "#"+tosave[3]) && (litpicid[4] == "#"+tosave[4]) && (litpicid[5] == "#"+tosave[5]) && (litpicid[6] == "#"+tosave[6]) && (litpicid[7] == "#"+tosave[7]) && (litpicid[8] == "#"+tosave[8])) {
      score = 1;
      message = "right answer ";
      } else {
      score = 0;
      message = "Wrong answer ";
      }
      } else {
      if ((litpicid[0] == "#"+tosave[8]) && (litpicid[1] == "#"+tosave[7]) && (litpicid[2] == "#"+tosave[6]) && (litpicid[3] == "#"+tosave[5])
      && (litpicid[4] == "#"+tosave[4]) && (litpicid[5] == "#"+tosave[3]) && (litpicid[6] == "#"+tosave[2]) && (litpicid[7] == "#"+tosave[1]) && (litpicid[8] == "#"+tosave[0])){
      score = 1;
      message = "right answer ";
      } else {
      score = 0;
      message = "wrong answer ";
      }
      }
      results();
      } else  {
      $.confirm({
      title: 'error!',
      content: 'you have entered your responses',
      type: 'red',
      typeAnimated: true,
      buttons: {
      close: function () {
      }
      }
      });
      }
      });
      });
      function results() {
      $.ajax({
      url: "",
      type: "POST",
      data: {scores: score},
      success: function(response){
      $("#originalgame").hide();
      $("#resultss").show();
      if (score == 1) {
      $('#image').prepend('<img id="" src="../android/images/right.png" />')
      $("#responsegamescore").html(message);
      } else {
      $('#image').prepend('<img id="" src="../android/images/wrong.png" />')
      $("#responsegamescore").html(message);
      }
      }
      });
      }
      });
      </script>
      <script type="text/javascript">
      $('a.gotolink').confirm({
      icon: 'fa fa-warning',
      title: 'Warning',
      content: "Your Overall score will exit the game",
      });
      $('a.twitter').confirm({
      buttons: {
      hey: function(){
      location.href = this.$target.attr('href');
      }
      }
      });
      </script>
      
    </body>
  </html>