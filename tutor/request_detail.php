<?php
include("auth.php");
$tutor_id = $_SESSION['user_id'];
$student_id = base64_decode( urldecode($_GET['id']));
$today = date("Y-m-d");
$name_query = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = '$student_id'"));
$name_data=mysqli_query($link,"SELECT * FROM  tbl_scheduled_sessions where student_id= '$student_id' AND tutor_id='$tutor_id' ");
$name_count = mysqli_num_rows($name_data);
$fetch_name_data = mysqli_fetch_array($name_data);
/////////scheduledcount///////
$name_dataa=mysqli_query($link, "SELECT * FROM  tbl_scheduled_sessions where student_id='$student_id' AND tutor_id='$tutor_id' AND approval_status='approved' ");
$name_countt = mysqli_num_rows($name_dataa);
$name_dataaa=mysqli_query($link,"SELECT * FROM  tbl_scheduled_sessions where student_id='$student_id' AND tutor_id='$tutor_id' AND approval_status='cancelled' ");
$name_counttt = mysqli_num_rows($name_dataaa);
$pend_name_dataaa=mysqli_query($link,"SELECT * FROM  tbl_scheduled_sessions where student_id='$student_id' AND tutor_id='$tutor_id' AND approval_status='pending' AND session_date>='".$today."'");
$pend_name_counttt = mysqli_num_rows($pend_name_dataaa);
$approval_status = $userfetch_data['approval_status'];
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("header.php") ?>
  </head>
  <body>
    <div class="body">
      <?php include("menu.php") ?>
      <div role="main" class="main" >
        <section class="page-header">
          <div class="container">
            <div class="row">
            </div>
            <div class="row">
              <div class="col">
                <h1>Requests Detail</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
          <div class="row">
            <div class="col">
              <h4>Session Requests Detail </h4>
              <table class="table  table-hover">
                <tbody>
                  <tr class="info">
                    <td>Name:</td>
                    <td><?php echo $name_query['username']; ?></td>
                  </tr>
                  <tr>
                    <td>Mobile Number:</td>
                    <td><?php echo $name_query['mobile_no']; ?></td>
                  </tr>
                  <tr class="info">
                    <td>Session Requested:</td>
                    <td><?php echo $name_count; ?></td>
                  </tr>
                  <tr>
                    <td>Session Scheduled:</td>
                    <td><?php echo $name_counttt; ?></td>
                  </tr>
                  <tr class="info">
                    <td>Session pending:</td>
                    <td><?php echo $pend_name_counttt; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row mt-3" id="avail" class="appear-animation animated bounceInRight appear-animation-visible" data-appear-animation="bounceInRight" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;">
            <div class="col">
              <h5><strong>Other Available Slots on this date</strong></h5>
              <h4><strong></strong></h4>
              <button class="res btn btn-primary">Confirm</button>
            </div>
          </div>
          <!--available slots-->
          <div class="row mt-4" id="row">
            <div class="col">
              <table class="table table-bordered table-hover">
                <?php $pend=mysqli_query($link,"SELECT * FROM  tbl_scheduled_sessions where student_id=$student_id AND tutor_id=$tutor_id AND approval_status='pending' AND session_date>='".$today."' ");
                if(mysqli_num_rows($pend) == 0) {
                } else { ?>
                <thead>
                  <th>
                    <td>Timings</td>
                    <td>Accept</td>
                    <td> cancel</td>
                    <td>Reschedule</td>
                  </th>
                </thead>
                <tbody>
                  <?php
                  while($row = mysqli_fetch_array($pend)) {
                  echo '<tr>';
                    echo "<td>".$row['session_date']."</td>";
                    echo "<td>".$row['slots']."</td>";
                    echo "<td><button type='button' class='accept btn btn-primary'><input type ='hidden' id='hid_date' value='".$row['session_date']."'><input type ='hidden' id='hid_slot' value='".$row['slots']."'>
                    <input type ='hidden' id='hid_id' value='".$row['session_id']."'><input type ='hidden' id='id' value='".$row['id']."'>Accept</button></td>";
                    echo "<td><button type='button' class='cancel btn btn-primary'><input type ='hidden' id='hid_date' value='".$row['session_date']."'><input type ='hidden' id='hid_slot' value='".$row['slots']."'>
                    <input type ='hidden' id='hid_id' value='".$row['session_id']."'><input type ='hidden' id='id' value='".$row['id']."'>Cancel</button></td>";
                    echo "<td><button type='button' class='Reschedule btn btn-primary'><input type ='hidden' id='hid_date' value='".$row['session_date']."'><input type ='hidden' id='hid_slot' value='".$row['slots']."'>
                    <input type ='hidden' id='hid_id' value='".$row['session_id']."'><input type ='hidden' id='id' value='".$row['tutor_id']."'><input type ='hidden' id='cat_sess' value='".$row['session_category']."'><input type ='hidden' id='id_sessions' value='".$row['id']."'>Reschedule</button></td>";
                  echo '</tr>';
                  
                  } }?>
                </tbody>
              </table>
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
<?php include("footer_files.php") ?>
<script type="text/javascript">
$(document).ready(function(){
$("#avail").hide();
$(".accept").click(function() {
var name = "<?php echo $name_query['username']; ?>";
var date = $(this).find('#hid_date').val();
var slot = $(this).find('#hid_slot').val();
var id = $(this).find('#id').val();
var session_id = $(this).find('#hid_id').val();
$.confirm({
title: 'Your Session with '+name+' is scheduled on',
content: 'Date: '+date+'<br/>Time: '+slot+'<br/>Would you Like to continue?',
type: 'blue',
alignMiddle: true,
buttons: {
tryAgain: {
text: 'Yes',
btnClass: 'btn-red',
typeAnimated: true,
action: function(){
$.ajax({
type: 'POST',
url: '../api/session_status.php',
data: { id: id, session_id: session_id, role_type: "teacher", status: "approved"},
error: function() {
swal("error!", "An error occured!", "error");
},
success: function(data) {
swal({
    title: "Accepted!",
    text: "Your session is scheduled!",
    type: "success"
}).then(function() {
   location.reload();
});
}
});
}
},
no: function () {
}
}
});
});
$(".cancel").click(function() {
var name = "<?php echo $name_query['username']; ?>";
var date = $(this).find('#hid_date').val();
var slot = $(this).find('#hid_slot').val();
var id = $(this).find('#id').val();
var session_id = $(this).find('#hid_id').val();
$.confirm({
title: 'Your Session with '+name+' is scheduled on',
content: 'Date: '+date+'<br/>Time: '+slot+'<br/>Would you Like to cancel?',
type: 'blue',
alignMiddle: true,
buttons: {
tryAgain: {
text: 'Yes',
btnClass: 'btn-red',
typeAnimated: true,
action: function(){
$.ajax({
type: 'POST',
url: '../api/session_status.php',
data: { id: id, session_id: session_id, role_type: "teacher", status: "cancelled"},
error: function() {
swal("error!", "An error occured!", "error");
},
success: function(data) {
swal({
    title: "cancelled!",
    text: "Your session is cancelled!",
    type: "success"
}).then(function() {
   location.reload();
});
}
});
}
},
no: function () {
}
}
});
});
$(".Reschedule").click(function() {
var date = $(this).find('#hid_date').val();
var id = $(this).find('#id').val();
var cat = $(this).find('#cat_sess').val();
session_of_id = $(this).find('#id_sessions').val();
$.ajax({
type: 'POST',
url: '../api/available_slots.php',
dataType: 'json',
data: {'tutor_id': id, 'scheduled_date': date, 'session_type': cat},
error: function() {
alert('An error has occurred');
},
success: function(JSONObject) {
var peopleHTML = "";
for (var key in JSONObject) {
if (JSONObject.hasOwnProperty(key)) {
peopleHTML += "<input type='radio' name='av_slots' value='" +JSONObject[key]['slots']+ "'>" + JSONObject[key]["slots"] + "</input><br/>";
}
}
$("#avail h4 strong").html(peopleHTML);
$("#avail").toggle();
}
});
//  $("#avail").toggle();
});
$(".res").click(function() {
var date = $('input[name=av_slots]:checked').val();
$.ajax({
type: 'POST',
url: '../api/session_rescheduled.php',
dataType: 'json',
data: {'id': session_of_id, 'new_slots': date, 'message': 'rescheduled'},
error: function() {
swal("error!", "An error occured!", "error");
},
success: function(response) {
var dayta = JSON.parse(JSON.stringify(response));
if(dayta.message == 'already exist') {
swal("already scheduled!", "Your session is already scheduled on given slot!", "error");
} else {
swal({
    title: "success!",
    text: "Your session has been scheduled!",
    type: "success"
}).then(function() {
   location.reload();
});

}
}
});
});
});
</script>
</body>
</html>