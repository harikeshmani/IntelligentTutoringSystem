<?php
include("auth.php");
$user_id = $_SESSION["class_id"];
$length = 6;
$numbers = range(0,9);
shuffle($numbers);
for($i = 0;$i < $length;$i++);
$numbers[$i];
$num = rand(1,5);
if ($num==1){
$resnum = ($numbers[$num-1]+$numbers[$num]).'*'.($numbers[$num]+$numbers[$num+1]).'*'.($numbers[$num+1]+$numbers[$num+2]).'*'.($numbers[$num+2]+$numbers[$num+3]).'*'.($numbers[$num+3]+$numbers[$num+4]);
}
else if ($num==2) {
$resnum = ($numbers[$num-1]+$numbers[$num]).'*'.($numbers[$num]+$numbers[$num+1]).'*'.($numbers[$num+1]+$numbers[$num+2]).'*'.($numbers[$num+2]+$numbers[$num+3]);
}
else if ($num==3) {
$resnum = ($numbers[$num-1]+$numbers[$num]).'*'.($numbers[$num]+$numbers[$num+1]).'*'.($numbers[$num+1]+$numbers[$num+2]);
}
else if ($num==4) {
$resnum = ($numbers[$num-1]+$numbers[$num]).'*'.($numbers[$num]+$numbers[$num+1]);
}
else if ($num==5) {
$resnum = ($numbers[$num-1]+$numbers[$num]);
} else {
$resnum = ($numbers[$num-1]);
}
// echo $resnum;
if (isset($_POST["win"])) {
mysqli_query($link, "INSERT INTO tbl_working_memory(user_id, score) values('$user_id', '1')");
}
if (isset($_POST["lost"])) {
mysqli_query($link, "INSERT INTO tbl_working_memory(user_id, score) values('$user_id', '0')");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("header.php") ?>
    <link rel="stylesheet" type="text/css" href="../css/keyboard.css">
    <link rel="stylesheet" type="text/css" href="../vendor/confirm/confirm.css">
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
                <h1>Memory Exrecise</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
          <div class="row" id="first">
            <div class="col-lg-12 text-center">
              <div class="heading heading-border heading-bottom-border">
                <h2>Welcome to Intelligent Tutoring Session Working Memory <strong>Testing Module</strong></h2>
              </div>
              <p><strong>This module will test your working memory skills. Use our training exercises to improve your attention and other cognitive skills.</strong></p>
              <button type="button"  class="btn btn-primary" id="instruction1">Click Here for instructions<i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
          <div  id="second" class="row img-fluid appear-animation animated fadeInRightBig appear-animation-visible" data-appear-animation="fadeInRightBig" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;">
            <div class="col-lg-12 text-center" >
              <h2>You will now perform a complex tracking test developed by <strong>Gronwall (1977)</strong>. You will see a sequence of numbers for <strong>3 seconds.</strong> Remember the sequence. The exercise will then randomly show you a number in the sequence. You have to then enter the addition of that number and the previous number in the sequence. Continue this for all the subsequent numbers.</h2>
              <button type="button"  class="btn btn-primary" id="instruction2">Next<i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
          <div id="third" class="row img-fluid appear-animation animated fadeInRightBig appear-animation-visible" data-appear-animation="fadeInRightBig" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;">
            <div class="col-lg-12 text-center" >
              <div class="heading heading-border heading-bottom-border">
                <h2>Example</h2>
              </div>
              <h2>For example, the exercise may show <strong>5-6-8-2-7</strong> for <strong>three seconds.</strong><h2>
              <h2> Then the exercise will prompt you with a random number from the sequence say 6. You have to then <stong>add the number previous to 6 </stong>(which is 5) and then enter it as the first sequence.</h2>
              <h2> In this case it is <strong>5+6=11 </strong>so the correct answer is 11. then the next number is 8. Add the previous number 6 to 8 and the correct answer is 14.</h2>
              <button type="button"  class="btn btn-primary" id="instruction3">Next<i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
          <div  id="fourth" class="row img-fluid appear-animation animated fadeInRightBig appear-animation-visible" data-appear-animation="fadeInRightBig" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;">
            <div class="col-lg-12 text-center" >
              <div class="heading heading-border heading-bottom-border">
                <h2>Example</h2>
              </div>
              <h2>For the sequence <strong>5-6-8-2-7</strong> and the prompt <strong>6 </strong>the correct sequence is  <strong>11,14,8,9. </strong></h2>
              <h2>Similarly for the same sequence prompt <strong> 5 </strong>the correct answer is <strong> 5,11,14,8,9.  </strong></h2>
              <button type="button"  class="btn btn-primary" id="start">Try a practice sequence</button>
            </div>
          </div>
          <!-- Modal -->
          
          <!--end modal-->
          <div id="sequence">
            <div class="row mt-5 text-center">
              <!--sequence generator-->
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
                <h2><strong>Memorise the sequence<strong></h2>
              </div>
              <div class="col-lg-3"></div>
            </div>
            <div class="row mt-5 text-center">
              <div class="col-lg-2"></div>
              <div class="col-lg-8" ><h2>Time ends in</h2></div>
              <div class="col-lg-2"></div>
            </div>
            <div class="row text-center">
              <div class="col-lg-5"></div>
              <div class="col-lg-2"><h1><strong id="theTarget">3</strong></h1></div>
            </div>
            <div class="col-lg-5"></div>
            <div class="row text-center">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
                <h2><strong><?php echo $numbers[0]?>-<?php echo $numbers[1]?>-<?php echo $numbers[2]?>-<?php echo $numbers[3]?>-<?php echo $numbers[4]?>-<?php echo $numbers[5]?></strong></h2>
              </div>
              <div class="col-lg-3"></div>
            </div>
          </div>
          <!--sequence generator ends here-->
          <!--timer Section-->
          <div id="gamesection">
            <div class="row mt-5 text-center">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <h1><strong>Begin at number <?php echo $numbers[$num];  ?></strong></h1>
                <div class="col-lg-2"></div>
              </div>
            </div>
            <div class="row text-center" id="timerdiv">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">Time remaining
                <h1><strong id="timer"></strong></h1>
              </div>
              <div class="col-lg-3"></div>
            </div>
            <div class="row text-center">
              <div class="col-lg-12">
                <h3>Put <strong>*</strong> between sequence numbers</h3>
              </div>
            </div>
            <div class="row mt-5 text-center">
              <div class="col-lg-3 "></div>
              <div class="col-lg-6"><h4><strong id="userinput"></strong></h4></div>
              <div class="col-lg-3 "></div>
            </div>
            <div class="row text-center">
              <div class="col-lg-2"></div>
              <div class="col-lg-10">
                <ul id="keyboard">
                  <li class="letter" value="1">1</li>
                  <li class="letter" value="2">2</li>
                  <li class="letter" value="3">3</li>
                  <li class="letter" value="4">4</li>
                  <li class="letter" value="5">5</li>
                  <li class="letter" value="6">6</li>
                  <li class="letter" value="7">7</li>
                  <li class="letter" value="8">8</li>
                  <li class="letter" value="9">9</li>
                  <li class="letter" value="0">0</li>
                  <li class="letter" value="&amp*">*</li>
                  <li class="letter_back" value=-><</li>
                </ul>
              </div>
              <div class="col-lg-2"></div>
            </div>
            <div class="row mt-5 text-center">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
                <button type="button" name="submit" id="submitans" class="btn btn-primary btn-xl">Submit</button>
              </div>
              <div class="col-lg-3"></div>
            </div>
          </div>
        </form>
        <!--timer Section ends here-->
        <!-- Section -->
      </div>
    </div>
    <?php include("footer.php") ?>
  </div>
  <!-- ../vendor -->
  <?php include("footer_files.php"); ?>
  <script>
  $(function() {
  uids = "<?php echo $user_id; ?>";
  $("#second").hide();
  $("#third").hide();
  $("#fourth").hide();
  $("#sequence").hide();
  $("#gamesection").hide();
  $("#scoresection").hide();
  $("#instruction1").click(function() {
  $("#first").hide();
  $("#second").show();
  });
  $("#instruction2").click(function() {
  $("#second").hide();
  $("#third").show();
  });
  $("#instruction3").click(function() {
  $("#third").hide();
  $("#fourth").show();
  });
  $("#start").click(function() {
  $("#fourth").hide();
  var timer = setInterval(function() {
  var count = parseInt($('#theTarget').html());
  if (count !== 0) {
  $('#theTarget').html(count - 1);
  } else {
  clearInterval(timer);
  }
  }, 1000);
  timedCount();
  event.preventDefault();
  $("#sequence").show();
  setTimeout(function () {
  $("#sequence").hide();
  $("#gamesection").show();
  }, 3000);
  });
  $("#submitans").click(function() {
  matchresult()
  });
  function matchresult() {
  $("#gamesection").hide();
  var uservals = $("#userinput").html();
  var sysval = "<?php echo $resnum; ?>";
  if(uservals == sysval) {
  $.ajax({
  url: "",
  type: "POST",
  data: {win: "won", ids: uids},
  success: function(responses){
  }
  });
  $.confirm({
  title: 'You are correct!',
  content: 'Lets move to the main test',
  buttons: {
  confirm: function () {
  location.href = 'memory_main.php';
  },
  cancel: function () {
  location.href = 'memory_list.php';
  }
  }
  });
  } else {
  $.ajax({
  url: "",
  type: "POST",
  data: {lost: "lost", ids: uids},
  success: function(responses){
  }
  });
  $.confirm({
  title: 'You lost!',
  content: 'Lets move to the main test',
  buttons: {
  confirm: function () {
  location.href = 'memory_main.php';
  },
  cancel: function () {
  location.href = 'memory_list.php';
  }
  }
  });
  }
  }
  var c=63;
  var t=1;
  function timedCount() {
  var seconds = c % 60;
  var result = (seconds  < 10 ? "0" + seconds : seconds);
  var result= result + ' second';
  $('#timer').html(result);
  if(c == 0 ){
  matchresult();
  }
  c = c - 1;
  t = setTimeout(function()
  {
  timedCount()
  },
  1000);
  }
  });
  </script>
  <script type="text/javascript">
  $("#keyboard li.letter").click(function() {
  $("#userinput").append($(this).html());
  });
  $("#keyboard li.letter_back").click(function() {
  var str_del = $("#userinput").text();
  $("#userinput").html('');
  $("#userinput").append(str_del.substring(0,str_del.length - 1));
  });
  </script>
</body>
</html>