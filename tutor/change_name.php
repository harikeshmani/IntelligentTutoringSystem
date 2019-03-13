<?php
include("auth.php");
$user_id = $_SESSION['user_id'];
$row = mysqli_fetch_array(mysqli_query($link,"SELECT first_name FROM tbl_glow_tutor WHERE id='$user_id'"));
$name= $row[0];
$newname = $_POST["newname"];
if(isset($_POST['Submit'])){
// code for check server side validation
if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
$msg="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.
}else{// Captcha verification is Correct. Final Code Execute here!
mysqli_query($link,"UPDATE tbl_glow_tutor SET first_name = '$newname' WHERE id='$user_id'");
if(mysqli_affected_rows($link)==0) {
$msg="<span>Error in Upadation.</span>";
}  else {
$msg="<span>successfully updated your Username.</span>";
}
}
}
?>
<!DOCTYPE html>
<html>
  <?php include("header.php") ?>
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
              <h1>Change Your Username</h1>
            </div>
          </div>
        </div>
      </section>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="featured-boxes">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div class="featured-box featured-box-primary text-left mt-5">
                    <div class="box-content" style="background-color: #1b68b2;">
                      <?php if(isset($msg)){?>
                      <h4 class="heading-primary mb-3"><?php echo $msg;?></h4>
                      <?php } ?>
                      <form action="" method="post" name="form1" id="changename" class="form-horizontal" role="form">
                        <div class="form-row">
                          <div class="form-group col">
                            <label>Old Name:</label>
                            <input class="form-control form-control-lg" type="text" value="<?php echo $name; ?>" name="name">
                          </div>
                        </div>
                        
                        <div class="form-row">
                          <div class="form-group col">
                            <label>New Name:</label>
                            <input class="form-control form-control-lg" type="text" name="newname" id="newname" value="" >
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col">
                            <label>Validation code:</label>
                            <img src="../php/captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
                          </div>
                          <div class="form-group col">
                            <h4>Can't read the image? click <a href='javascript: refreshCaptcha();'>HERE</a> to refresh.</h4>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col">
                            <label for='message'>Enter the code above here :</label>
                            <input id="captcha_code" class="form-control form-control-lg" name="captcha_code" type="text">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col">
                            <input name="Submit" type="submit" onclick="return validate();" value="Submit" class="btn btn-outline btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 ">
                            
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-md-3"></div>
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
    function refreshCaptcha(){
    var img = document.images['captchaimg'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    }
    $(function() {
    
    $("#changename").validate({
    rules: {
    newname: "required",
    captcha_code: "required",
    newname: {
    required: true,
    minlength: 4
    }
    },
    // Specify validation error messages
    messages: {
    newname: "Please enter your name",
    newname: {
    required: "Please provide a name",
    minlength: "Your name must be at least 4 characters long"
    },
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
    form.submit();
    }
    });
    });
    </script>
    
  </body>
</html>