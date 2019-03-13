<?php
include("auth.php");
$user_id = $_SESSION['class_id'];
$pass=$_POST["retypepassword"];
$oldpass=$_POST["oldpassword"];
if(isset($_POST['Submit'])){
// code for check server side validation
if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
$msg="<span style='color:red'>The Validation code does not match!</span>";
}else{
mysqli_query($link,"UPDATE tbl_glow_students SET password = '$pass' WHERE id='$user_id' AND password='$oldpass'");
if(mysqli_affected_rows($link)==0) {
$msg="<span>You have entered a wrong password or same password.</span>";
}  else {
$msg="<span>successfully updated your password.</span>";
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
    <div role="main" class="main" style="background-image: url(../img/bg-01.jpg);">
      <section class="page-header">
        <div class="container">
          <div class="row">
          </div>
          <div class="row">
            <div class="col">
              <h1>Change Your Password</h1>
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
                      <form action="" method="post" name="form1" id="form1" class="form-horizontal" role="form">
                        <div class="form-row">
                          <div class="form-group col">
                            <label>Old Password:</label>
                            <input class="form-control form-control-lg" type="password"  name="oldpassword">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col">
                            <label>New Password:</label>
                            <input class="form-control form-control-lg" type="password" name="newpassword" id="newpassword" value="" >
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col">
                            <label>Retype New Password:</label>
                            <input class="form-control form-control-lg" type="password" name="retypepassword" id="retypepassword" value="" >
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
                            <input name="Submit" type="submit" onclick="return validate();" value="Submit" class="btn btn-outline btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 "">
                            
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
    <!-- ../vendor -->
    <?php include("footer_files.php") ?>
    <script type="text/javascript">
    function refreshCaptcha(){
    var img = document.images['captchaimg'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    }
    $(function() {
    $("#form1").validate({
    rules: {
    oldpassword: "required",
    newpassword: "required",
    retypepassword: "required",
    captcha_code: "required",
    email: {
    required: true,
    },
    newpassword: {
    required: true,
    minlength: 6
    },
    retypepassword: {
    required: true,
    equalTo: '#newpassword'
    }
    },
    messages: {
    firstname: "Please enter your firstname",
    lastname: "Please enter your lastname",
    password: {
    required: "Please provide a password",
    minlength: "Your password must be at least 6 characters long"
    },
    email: "Please enter a valid email address"
    },
    submitHandler: function(form) {
    form.submit();
    }
    });
    });
    </script>
    
  </body>
</html>