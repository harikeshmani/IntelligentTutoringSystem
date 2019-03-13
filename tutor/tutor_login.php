<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
   <head>
      <?php include("header.php") ?>
      <link rel="stylesheet" type="text/css" href="../vendor/multiselect/multiselect.css">
      <link rel="stylesheet" type="text/css" href="../vendor/datetimepicker/datetimepicker.css">
      <link rel="stylesheet" type="text/css" href="../css/funkyradio.css" />
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
                        <h1>Tutor Login / Registration</h1>
                     </div>
                  </div>
               </div>
            </section>
            <div class="container">
               <div class="row">
                  <div class="col">
                     <div class="featured-boxes">
                        <!---login form starts here-->
                        <div class="row">
                           <div class="col-md-5">
                              <div class="featured-box featured-box-primary text-left mt-5">
                                 <div class="box-content" style="background-color: #1b68b2;">
                                    <h4 class="heading-primary text-uppercase text-center mb-3">Tutor Login</h4>
                                    <form action="" id="frmSignIn" method="post">
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Enter Your Email-Id </label>
                                             <input type="text" id="email" name="email" value="" class="form-control form-control-lg">
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Enter Password</label>
                                             <input type="password" id="password" name="password" value="" class="form-control form-control-lg">
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col-lg-12">
                                             <a class="float-right" style="color: #FFF;" href="forgot_password.php">Forgot Password ?</a>
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col-lg-6"></div>
                                          <div class="form-group col-lg-6 ">
                                             <button type="button" name="login" id="login" class="btn btn-outline btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 ">Login</button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <!------------------registeration form starts here-------------------------->
                           <div class="col-md-7">
                              <div class="featured-box featured-box-primary text-left mt-5">
                                 <div class="box-content" style="background-color: #1b68b2" id="step1">
                                    <h4 class="heading-primary text-uppercase text-center mb-3">Register as a New Tutor</h4>
                                    <form action="" name="reg-form1" id="reg-form1" method="post">
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>First Name</label>
                                             <input type="text" id="firstname" name="firstname" class="form-control form-control-lg">
                                          </div>
                                          <div class="form-group col">
                                             <label>Last Name</label>
                                             <input type="text" id="lastname" name="lastname" class="form-control form-control-lg">
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Email</label>
                                             <input type="text" id="youremail" name="youremail" class="form-control form-control-lg">
                                          </div>
                                          <div class="form-group col">
                                             <label>Phone Number</label>
                                             <input type="text" id="phone" name="phone" class="form-control form-control-lg">
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Tell us about yourself</label>
                                             <textarea class="form-control form-control-lg" rows="3" id="about" name="about" required=""></textarea>
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Highest Degree</label>
                                             <input type="text" id="highest" name="highest" class="form-control form-control-lg" required="">
                                          </div>
                                          <div class="form-group col">
                                             <label>institute</label>
                                             <input type="text" id="institute" name="institute" class="form-control form-control-lg" required="">
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Password</label>
                                             <input type="password" value="" name="yourpassword"  id="pwd" class="form-control form-control-lg" required="">
                                          </div>
                                          <div class="form-group col">
                                             <label>Confirm Password</label>
                                             <input type="password" value=""  name="retype"  id="retype" class="form-control form-control-lg" required="">
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <button type="submit"  class="btn btn-primary float-right mb-5 next" data-loading-text="Loading..." style="background-color: #ffffff; color: #1b68b2 ">Submit</button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="box-content appear-animation animated fadeInRightBig appear-animation-visible" data-appear-animation="fadeInRightBig" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms; background-color: #1b68b2;" id="step2">
                                    <h4 class="heading-primary text-uppercase text-center mb-3">Address</h4>
                                    <form action="" name="reg-form2" id="reg-form2" method="post">
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Address</label>
                                             <input type="text" id="address" name="address" class="form-control form-control-lg" required="">
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Street</label>
                                             <input type="text" id="street" name="street" class="form-control form-control-lg" required="">
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Locality</label>
                                             <input type="text" id="locality" name="locality" class="form-control form-control-lg" required="">
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Country</label>
                                             <?php $country_data=mysqli_query($link, "SELECT * FROM countries"); ?>
                                             <select id="country" name="country" required="" class="form-control form-control-lg">
                                                <option value="" placeholder="country">Select Country</option>
                                                <?php	while($con=mysqli_fetch_array($country_data)){ ?>
                                                <option value="<?php echo $con['id']; ?>"><?php echo $con['name']; ?></option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                          <div class="form-group col">
                                             <label>State</label>
                                             <select name="state" id="state" required="" class="form-control form-control-lg" >
                                             </select>
                                          </div>
                                          <div class="form-group col">
                                             <label>City</label>
                                             <select name="city" id="city" required="" class="form-control form-control-lg" >
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <label>Post Code</label>
                                             <input type="text" id="postcode" name="postcode" class="form-control form-control-lg">
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <button type="submit" name="submit" class="btn btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 ">Submit</button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="box-content appear-animation animated fadeInRightBig appear-animation-visible" data-appear-animation="fadeInRightBig" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms; background-color: #1b68b2" id="step3">
                                    <h4 class="heading-primary text-uppercase text-center mb-3">Service Preferences</h4>
                                    <form action="" name="reg-form3" id="form-services" method="post">
                                       <div class="form-group">
                                          <div class="form-group col">
                                             <label>What is the age group of students You would like to teach through ITS platform ?</label>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="form-group col">
                                             <label for="primary">
                                             <input type="checkbox" id="primary" value="primary" name="service_pref[]" class="form-control form-control-lg">Primary Level
                                             </label>
                                             <label for="middle">
                                             <input type="checkbox" id="middle" value="middle" name="service_pref[]" class="form-control form-control-lg">Middle School
                                             </label>
                                             <label for="high">
                                             <input type="checkbox" id="high" value="high" name="service_pref[]" class="form-control form-control-lg">High School
                                             </label>
                                             <label for="college">
                                             <input type="checkbox" id="college" value="college" name="service_pref[]" class="form-control form-control-lg">College Level
                                             </label>
                                          </div>
                                       </div>
                                       <div class="container">
                                          <div class="preferences">
                                             <div id="pr">
                                                <label>What primary level subjects are your preferred subjects for enabling students through</label>
                                                <div class="form-group">
                                                   <div class="form-group col">
                                                      <?php
                                                         echo  "<select id='primary_subjects' class='multi form-control form-control-lg' multiple='multiple' name='primary_subjects[]'>";
                                                         									$pr_res = mysqli_query($link, "SELECT * FROM tbl_subject_list WHERE class_type = 'Primary Subjects'");
                                                         										while ($pr = mysqli_fetch_array($pr_res)){
                                                         										echo "<option>". $pr['subject'] ."</option>";
                                                         								}
                                                         echo "</select>";?>
                                                   </div>
                                                </div>
                                             </div>
                                             <div id="med">
                                                <label>What medium level subjects are your preferred subjects for enabling students through </label>
                                                <div class="form-group">
                                                   <div class="form-group col">
                                                      <?php
                                                         echo  "<select id='medium_subjects' class='multi form-control form-control-lg' multiple='multiple' name='medium_subjects[]'>";
                                                         								$pr_res = mysqli_query($link, "SELECT * FROM tbl_subject_list WHERE class_type = 'Middle School Subjects'");
                                                         									while ($pr = mysqli_fetch_array($pr_res)){
                                                         									echo "<option>". $pr['subject'] ."</option>";
                                                         																}
                                                         echo "</select>";?>
                                                   </div>
                                                </div>
                                             </div>
                                             <div id="hi">
                                                <label>What high school level subjects are your preferred subjects for enabling students through </label>
                                                <div class="form-group">
                                                   <div class="form-group col">
                                                      <h3>High School Subjects</h3>
                                                      <?php
                                                         echo  "<select id='high_subjects' class='multi form-control form-control-lg' multiple='multiple' name='high_subjects[]'>";
                                                         								$pr_res = mysqli_query($link, "SELECT * FROM tbl_subject_list WHERE class_type = 'High School Subjects'");
                                                         								while ($pr = mysqli_fetch_array($pr_res)){
                                                         								echo "<option>". $pr['subject'] ."</option>";
                                                         																}
                                                         echo "</select>";?>
                                                   </div>
                                                </div>
                                             </div>
                                             <div id="clg">
                                                <label>What College level subjects are your preferred subjects for enabling students through </label>
                                                <div class="form-group">
                                                   <div class="form-group col">
                                                      <?php
                                                         echo  "<select id='college_subjects'  class='multi form-control form-control-lg' multiple='multiple' name='college_subjects[]'>";
                                                         								$pr_res = mysqli_query($link, "SELECT * FROM tbl_subject_list WHERE class_type = 'extracurricular'");
                                                         								while ($pr = mysqli_fetch_array($pr_res)){
                                                         								echo "<option>". $pr['subject'] ."</option>";
                                                         																}
                                                         echo "</select>";?>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-row">
                                          <div class="form-group col">
                                             <button type="button" id="service-submit" class="btn btn-primary float-right mb-5 mt-1 mr-1" style="background-color: #ffffff; color: #1b68b2 ">Submit</button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="box-content appear-animation animated fadeInRightBig appear-animation-visible" data-appear-animation="fadeInRightBig" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms; background-color: #1b68b2" id="step4">
                                    <h4 class="heading-primary text-uppercase text-center mb-3">Delivery Preferences</h4>
                                    <form action="" name="reg-form4" id="form-delivery" method="post">
                                       <div class="row ">
                                          <div class="text-center">
                                             <h4>What is your preferred mode of training delivery?</h4>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-2 ">
                                             <input type="checkbox" id="all_pref" name="pref" class="pref form-control-md" value="Online one to one,Online group,In Person one to one session,In Person Group sessions">
                                             <label for="all_pref">Select All</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="one_pref" name="pref" class="pref" value="Online one to one">
                                             <label for="one_pref">Online one to one</label>
                                          </div>
                                          <div class="col-md-2">
                                             <input type="checkbox" id="online_pref" name="pref" class="pref" value="Online group">
                                             <label for="online_pref">Online group</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="in_pref" name="pref" class="pref" value="In Person one to one session">
                                             <label for="in_pref">In Person one to one session</label>
                                          </div>
                                          <div class="col-md-2">
                                             <input type="checkbox" id="ingroup_pref" name="pref" class="pref" value="In Person Group sessions">
                                             <label for="ingroup_pref">In Person Group sessions </label>
                                          </div>
                                       </div>
                                       <div class="row text-center mt-4">
                                          <label class="text-center"><strong>What are the times you are available for the sessions?</strong></label>
                                       </div>
                                       <div class="row mt-3">
                                          <div class="col-md-6">
                                             <input type="text" id="date_start" class="form-control form-control-md" placeholder="Start Date">
                                          </div>
                                          <div class="col-md-6">
                                             <input type="text" id="date_end" class="form-control form-control-md" placeholder="End Date">
                                          </div>
                                       </div>
                                       <div class="row mt-3" style="border: 1px solid aliceblue;">
                                          <div class="col-md-3">
                                             <input type="checkbox" id="first" value="06:00-07:00" name="slots"/>
                                             <label for="first">06:00 - 07:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="second" value="07:00-08:00" name="slots"/>
                                             <label for="second">07:00 - 08:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="third" value="08:00-09:00" name="slots" />
                                             <label for="third">08:00 - 09:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="fourth" value="09:00-10:00" name="slots" />
                                             <label for="fourth">09:00 - 10:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="five" value="10:00-11:00" name="slots" />
                                             <label for="five">10:00 - 11:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="six" value="11:00-12:00" name="slots" />
                                             <label for="six">11:00 - 12:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="seven" value="12:00-13:00" name="slots" />
                                             <label for="seven">12:00 - 13:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="eight" value="13:00-14:00" name="slots" />
                                             <label for="eight">13:00 - 14:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="nine" value="14:00-15:00" name="slots" />
                                             <label for="nine">14:00 - 15:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="ten" value="15:00-16:00" name="slots" />
                                             <label for="ten">15:00 - 16:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="eleven" value="16:00-17:00" name="slots" />
                                             <label for="eleven">16:00 - 17:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="twelve" value="17:00-18:00" name="slots" />
                                             <label for="twelve">17:00 - 18:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="thirteen" value="18:00-19:00" name="slots" />
                                             <label for="thirteen">18:00 - 19:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="fourteen" value="08:00-09:00" name="slots" />
                                             <label for="fourteen">19:00 - 20:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="fifteen" value="20:00-21:00" name="slots" />
                                             <label for="fifteen">20:00 - 21:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="sixteen" value="21:00-22:00" name="slots" />
                                             <label for="sixteen">21:00 - 22:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="seventeen" value="22:00-23:00" name="slots" />
                                             <label for="seventeen">22:00 - 23:00</label>
                                          </div>
                                          <div class="col-md-3">
                                             <input type="checkbox" id="eighteen" value="23:00-24:00" name="slots" />
                                             <label for="eighteen">23:00 - 24:00</label>
                                          </div>
                                       </div>
                                       <div class="sessions">
                                          <div class="row mt-4" style="border: 1px solid aliceblue;">
                                             <div class="col-md-6">
                                                <input type="radio" id="Individual" name="session_type" value="individual" checked="">
                                                <label for="Individual">Individual Session</label>
                                             </div>
                                             <div class="col-md-6">
                                                <input type="radio" id="group" name="session_type" value="group" >
                                                <label for="group">Group Session</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row text-center">
                                          <button type="button" class="btn btn-primary float-right mb-5 mt-1 mr-1" id="add_session" style="background-color: #ffffff; color: #1b68b2;">Add Session</button>
                                       </div>
                                       <div class="row text-center">
                                          <button type="button" class="btn btn-primary float-right mb-5 mt-1 mr-1" id="delivery-submit" style="background-color: #ffffff; color: #1b68b2;">Save your preferences</button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include("footer.php") ?>
      </div>
      <!-- Vendor -->
      <script src="../vendor/jquery/jquery.min.js"></script>
      <script src="../vendor/jquery.appear/jquery.appear.min.js"></script>
      <script src="../vendor/jquery.easing/jquery.easing.min.js"></script>
      <script src="../vendor/jquery-cookie/jquery-cookie.min.js"></script>
      <script src="../vendor/popper/umd/popper.min.js"></script>
      <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="../vendor/common/common.min.js"></script>
      <script src="../vendor/jquery.validation/jquery.validation.min.js"></script>
      <script src="../vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
      <script src="../vendor/jquery.gmap/jquery.gmap.min.js"></script>
      <script src="../vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
      <script src="../vendor/isotope/jquery.isotope.min.js"></script>
      <script src="../vendor/owl.carousel/owl.carousel.min.js"></script>
      <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
      <script src="../vendor/vide/vide.min.js"></script>
      <script src="../vendor/confirm/confirm.js"></script>
      <script src="../vendor/multiselect/multiselect.js"></script>
      <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
      <script src="../vendor/datetimepicker/datetimepicker.js"></script>
      <script src="../vendor/sweetalert/sweetalert.js"></script>
      <!-- Theme Base, Components and Settings -->
      <script src="js/theme.js"></script>
      <!-- login and registeration code  -->
      <script src="includes/js/home.js"></script>
      <!-- Theme Initialization Files -->
      <script src="js/theme.init.js"></script>
      <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
         <script>
         	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
         	ga('create', 'UA-12345678-1', 'auto');
         	ga('send', 'pageview');
         </script>
         -->
   </body>
</html>