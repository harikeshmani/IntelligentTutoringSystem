<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
$room = $_GET['room_name'];
$tutor_id = $_GET['tutor_id'];
$sess = $_GET['session'];
$date = $_GET['date'];
?>
<!DOCTYPE html>
<html>
  <?php include("header.php") ?>
  <link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
  <style type="text/css">
  a {
  color: #4a9433;
  }
  </style>
</head>
<body>
  <div class="body">
    <?php include("menu.php") ?>
    <div role="main" class="main" style="background-image: url(img/bg-01.jpg);">
      <section class="page-header">
        <div class="container">
          <div class="row">
          </div>
          <div class="row">
            <div class="col">
              <h1>Rate The Session</h1>
            </div>
          </div>
        </div>
      </section>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="featured-boxes">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="featured-box featured-box-primary text-left mt-5">
                    <div class="box-content" >
                      <h4 class="heading-primary mb-3"></h4>

                        
                        <div class="form-row">
                          <div class="form-group col">
                            <div class="heading heading-border heading-bottom-border">
                            <h1>Session Date - <?php echo $date; ?> </h1>
                          </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col" id="element">
                          </div>
                          
                        </div>
                        <div class="form-row">
                          <div class="form-group col">
                            <button  type="button" id="save" class="btn btn-outline btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 ">Save Rating</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include("footer.php") ?>
      </div>
      <!-- Vendor -->
      <?php include("footer_files.php") ?>
      <script type="text/javascript">
      $(function(){
      var room = "<?php echo $room; ?>";
      var user_id = "<?php echo $user_id; ?>";
      var session_id = "<?php echo $sess; ?>";
      var t_id = "<?php echo $tutor_id; ?>";
      var emotionsArray = ['angry','disappointed','meh','happy','inlove'];
      $("#element").emotionsRating({
      emotionSize: 100,
      bgEmotion: 'happy',
      emotions: emotionsArray,
      color: 'gold'
      });
      $('#save').click(function() {
      rating = $('.emoji-rating-emotion-container-element').val();
      $.ajax({
      url: "api/save_rating.php",
      type: "POST",
      dataType: "json",
      data: {rating:rating, tutor_id: t_id, room_name:room, session_id: session_id, user_id:user_id, role_type: 'student'},
      success: function( data ) {
      swal("Done!", "rating saved", "success")
      .then((value) => {
      window.location.replace('home.php');
      });
      },
      error: function(e) {
      // Handle error here
      console.log(e);
      },
      timeout: 30000
      });
      });
      });
      </script>
      
    </body>
  </html>