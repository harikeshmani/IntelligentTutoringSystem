<?php 
//ini_set('display_startup_errors', 1);
error_reporting(0);
include("config.php");
session_start();
?>


<!DOCTYPE HTML>
<html>
  <head>
    <title>Glow</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/slider.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    
    <link rel="stylesheet" type="text/css" href="css/login.css">
  </head>
  <style>
  
  .image.fit img {
    width: 30%;
    position: relative;
}
.centered {
    position: absolute;
    top: 50%;
    left: 10%;
    transform: translate(-50%, -50%);
    color: #ffffff;
}
  

  </style>
  <body>
    <!---modal-->
    <div class="container">
  <!-- Trigger the modal with a button -->
 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Corsi Block Tapping Test</h4>
        </div>
        <div class="modal-body">
          <p>The Corsi Block Tapping Test developed by B. Milner (1971) is a test to measure visuospatial recall. In this test you will see 9 blocks which will light up in a sequence. Tap the blocks in the sequence suggested to win. For example if the blocks 9,4,7 light up and the exercise says tap in the same sequence. Tapping 9,4,7 will complete the task. If the exercise says tap in opposite sequence tapping 7,4,9 will complete the exercise.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="startgame">Click next to start a practice exercise</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!--end modal-->
    
 <div class="container">
    <div class="row">
       
                        <!-- Signin & Signup -->
                      
                        <!-- Login / Register Modal-->
  
           </div>
    </div>
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Main -->
      <div id="main">
        <div class="inner">
              <!-- Header -->
    <header id="header">
       <a href="index.php" class="logo"><img src="images/ICONS updated-04.png"></img></a>
            <?php 

              if( (isset($_SESSION['email']) && $_SESSION['email'] != "") || (isset($_SESSION['fb_id']) && $_SESSION['fb_id'] != "") ){ ?>
                   
                   <a href="logout.php" class="button special">Logout</a>
                     <?php    } else { ?>
                      <ul class="actions">
             <li><a href="#" class="button special" data-target=".login-register-form" data-toggle="modal">Login - Registration</a></li>
           </ul>   
            <ul class="icons">
            
            <li><a href= <?php echo $fblink ;?> ><img src="images/social-09.jpg"></a> </li>
            <li><a href= <?php echo $googlelink ;?> ><img src="images/google_icon.png"></a></li> 
          </ul>
                       <?php } ?>
                <!--  <a href= <?php //echo $fblink ;?> >fblink</a> -->
                    
           
    </header>

              <!-- Banner -->
                           <header class="main" style="margin-left: 25%"; font-family: "noto-sans";>
                    <h2>Corsi Block Tapping Test</h2>
                  </header>

 <?php  
//print_r(UniqueRandomNumbersWithinRange(0,25,5));
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
<form action="submit.php"  >
<div class="box alt">
                            <div class="row 30% uniform">
                           <button onclick="SubmitForm1();" id="button1" value="<?php echo $randarray[0]; ?>"> <div class="4u"><span class="image fit"><img src="images/box.png" alt="" id="pic1"><div class="centered"><?php echo $randarray[0]; ?></div></span></div> </button>
                               <div class="4u"><span class="image fit"></span></div>
                          <button onclick="SubmitForm2();" id="button2" value="<?php echo $randarray[1]; ?>"> <div class="4u" id="2"><span class="image fit"><img src="images/box.png" alt="" id="pic2"><div class="centered"><?php echo $randarray[1]; ?></div></span></div></button>
                             <button onclick="SubmitForm3();" id="button3" value="<?php echo $randarray[2]; ?>">  <div class="4u$" id="3"><span class="image fit"><img src="images/box.png" alt="" id="pic3"><div class="centered"><?php echo $randarray[2]; ?></div></span></div></button>
                              <!-- Break -->
                              <div class="4u"><span class="image fit"></span></div>
                            <button onclick="SubmitForm4();" id="button4" value="<?php echo $randarray[3]; ?>">   <div class="4u" id="4"><span class="image fit"><img src="images/box.png" alt="" id="pic4"><div class="centered"><?php echo $randarray[3]; ?></div></span></div></button>
                              <div class="4u"><span class="image fit"></span></div>
                             <button onclick="SubmitForm5();" id="button5" value="<?php echo $randarray[4]; ?>">  <div class="4u$" id="5"><span class="image fit"><img src="images/box.png" alt="" id="pic5"><div class="centered"><?php echo $randarray[4]; ?></div></span></div></button>
                              <!-- Break -->
                               <div class="4u"><span class="image fit"></span></div>
                            <button onclick="SubmitForm6();" id="button6" value="<?php echo $randarray[5]; ?>">   <div class="4u" id="6"><span class="image fit"><img src="images/box.png" alt="" id="pic6"><div class="centered"><?php echo $randarray[5]; ?></div></span></div></button>
                            <button onclick="SubmitForm7();" id="button7" value="<?php echo $randarray[6]; ?>">   <div class="4u" id="7"><span class="image fit"><img src="images/box.png" alt="" id="pic7"><div class="centered"><?php echo $randarray[6]; ?></div></span></div></button>
                              <div class="4u$"><span class="image fit"></span></div>
                              <button onclick="SubmitForm8();" id="button8" value="<?php echo $randarray[7]; ?>">  <div class="4u" id="8"><span class="image fit"><img src="images/box.png" alt="" id="pic8"><div class="centered"><?php echo $randarray[7]; ?></div></span></div></button>
                               <div class="4u"><span class="image fit"></span></div>
                             <button onclick="SubmitForm9();" id="button9" value="<?php echo $randarray[8]; ?>">    <div class="4u" id="9"><span class="image fit"><img src="images/box.png" alt="" id="pic8"><div class="centered"><?php echo $randarray[8]; ?></div></span></div></button>
                              <button onclick="SubmitForm10();" id="button10" value="<?php echo $randarray[9]; ?>">   <div class="4u$" id="10"><span class="image fit"><img src="images/box.png" alt="" id="pic10"><div class="centered"><?php echo $randarray[9]; ?></div></span></div></button>
                            </div>
                          </div>

</form>

<!-- <img src="images/ICONS updated box-29.png"><?php/* echo $n9 */?></img>  -->
<script>
var n1 = " <?php echo $n1 ?> ";
var n2 = " <?php echo $n2 ?> ";
var n3 = " <?php echo $n3 ?> ";
var n4 = " <?php echo $n4 ?> ";
var n5 = " <?php echo $n5 ?> ";
var n6 = " <?php echo $n6 ?> ";

</script>

              <!-- Section -->
            </div>
          </div>
        <!-- Sidebar -->
          
                <?php 
if( (isset($_SESSION['email']) && $_SESSION['email'] != "") || (isset($_SESSION['fb_access_token']) && $_SESSION['fb_access_token'] != "") )
                {
                    include("sidebar.php");
                 }
         ?>
    <!-- Scripts -->
    
      <!-- <script src="assets/js/jquery.min.js"></script>-->
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script> 
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>

      <script>
   function SubmitForm1() {
var bttn1 = $("#button1").val();

$.post("submit.php", { bttn1: bttn1 },
   function(data) {
     alert("Data Loaded: " + data);
   });
}

function SubmitForm2() {
var bttn2 = $("#button2").val();

$.post("submit.php", { bttn2: bttn2 },
   function(data) {
     alert("Data Loaded: " + data);
   });
}

function SubmitForm3() {
var bttn3 = $("#button3").val();

$.post("submit.php", { bttn3: bttn3 },
   function(data) {
     alert("Data Loaded: " + data);
   });
}
    </script>
     

  </body>
</html>
