<?php
include("auth.php");
$user_id = $_SESSION['user_id'];
$order_id = base64_decode( urldecode($_GET['orderid']));
$session_id = base64_decode( urldecode($_GET['session_id']));
$room_name = base64_decode( urldecode($_GET['room_name']));
if(isset($_POST['submit_query'])){
$reason = $_POST['reason'];
$message = $_POST['message'];
$date = date('Y-m-d');
$result = mysqli_query($link, "INSERT INTO tbl_customer_service(tutor_id, order_id, session_id, room_name, reason, message, query_date, granted, denied, flag, status) VALUES ('$user_id', '$order_id', '$session_id', '$room_name','$reason', '$message', '$date', '0', '0', '1', 'pending')");
if($result){
$msg = "YOUR REQUEST HAS BEEN SUCCESSFULLY REGISTERED WITH US";
}
else {
$msg = "ERROR";
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("header.php") ?>
    <style type="text/css">
    .accordion .card-header {
    cursor: pointer;
    }
    </style>
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
                <h1>customer service</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
          <h2>reason for refund request</h2>
          <h4><?php echo $msg; ?></h4>
          <div class="row">
            <div class="col">
              <div class="toggle toggle-primary" data-plugin-toggle="">
                <section class="toggle">
                  <label>tutor did not show up</label>
                  <div class="toggle-content" >
                    <form action="" method="post">
                      <h3>We received your request.Our team will contact you within 24 hours. Please give us more details in the following box</h3>
                      <div class="form-group">
                        <label>your description</label>
                        <textarea class="form-control form-control-lg" id="message" name="message" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="reason" value="tutor did not showed up">
                        <button class="btn btn-primary" name="submit_query" type="submit">Send </button>
                      </div>
                    </form>
                  </div>
                </section>
                <section class="toggle">
                  <label>i was unable to attend</label>
                  <div class="toggle-content">
                    <form action="" method="post">
                      <h3>We received your request.Our team will contact you within 24 hours. Please give us more details in the following box</h3>
                      <div class="form-group">
                        <label>your description</label>
                        <textarea class="form-control form-control-lg" id="message" name="message" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="reason" value="I was not able to attend">
                        <button class="btn btn-primary" name="submit_query" type="submit">Send </button>
                      </div>
                    </form>
                  </div>
                </section>
                <section class="toggle">
                  <label>material was not adequate</label>
                  <div class="toggle-content">
                    <form action="" method="post">
                      <h3>We received your request.Our team will contact you within 24 hours. Please give us more details in the following box</h3>
                      <div class="form-group">
                        <label>your description</label>
                        <textarea class="form-control form-control-lg" id="message" name="message" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="reason" value="Material was not adequate">
                        <button class="btn btn-primary" name="submit_query" type="submit">Send </button>
                      </div>
                    </form>
                  </div>
                </section>
                <section class="toggle">
                  <label>others</label>
                  <div class="toggle-content">
                    <form action="" method="post">
                      <h3>We received your request.Our team will contact you within 24 hours. Please give us more details in the following box।</h3>
                      <div class="form-group">
                        <label>your description</label>
                        <textarea class="form-control form-control-lg" id="message" name="message" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="reason" value="others">
                        <button class="btn btn-primary" name="submit_query" type="submit">Send </button>
                      </div>
                    </form>
                  </div>
                </section>
              </div>
            </div>
          </div>
          
        </div>
      </form>
    </div>
  </div>
</div>
<?php include("footer.php") ?>
</div>
<!-- Vendor -->
<?php include("footer_files.php") ?>
</body>
</html>