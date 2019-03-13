<?php
include("auth.php");
$user_id = $_SESSION['userid'];
$tutor_id = base64_decode( urldecode($_GET['id']));
$today = date("Y-m-d");
$name_query = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = '$tutor_id'"));
$num_request = mysqli_fetch_array(mysqli_query($link, "SELECT COUNT(*) AS total FROM tbl_scheduled_sessions WHERE student_id=$user_id AND session_date>='".$today."'"));
$num_request_done = mysqli_fetch_array(mysqli_query($link, "SELECT COUNT(*) AS total_done FROM tbl_scheduled_sessions WHERE student_id=$user_id AND approval_status = 'approved' AND session_date>='".$today."'"));
$pending_num = mysqli_query($link, "SELECT COUNT(*) AS numberOfRows FROM tbl_scheduled_sessions WHERE approval_status = 'pending' and session_date>='".$today."' AND student_id=$user_id AND tutor_id=$tutor_id");
$row = mysqli_fetch_array($pending_num);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("header.php") ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
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
                    <td>Name </td>
                    <td><?php echo $name_query['first_name'];?></td>
                  </tr>
                  <tr>
                    <td>Phone Number </td>
                    <td><?php echo $name_query['mobile']; ?></td>
                  </tr>
                  <tr class="info">
                    <td>Session Requested :</td>
                    <td><?php echo $num_request['total']; ?></td>
                  </tr>
                  <tr>
                    <td>Session Scheduled :</td>
                    <td><?php echo $num_request_done['total_done']; ?></td>
                  </tr>
                  <tr class="info">
                    <td>Session Pending :</td>
                    <td><?php echo $row['numberOfRows']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col">
             
              <?php
              $result = mysqli_query($link, "SELECT * FROM tbl_scheduled_sessions WHERE tutor_id = '$tutor_id' AND student_id='$user_id' AND session_date>='".$today."' ");
              if(mysqli_num_rows($result) !== 0) { ?>
                 <h4>Session Requests  </h4>
              <table class="table table-bordered table-hover">
                <thead>
                  <tr class="active">
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // $result = mysqli_query($link, "SELECT * FROM tbl_scheduled_sessions WHERE tutor_id = '$tutor_id' AND student_id='$user_id' AND session_date>='".$today."' ");
                  while($userfetch_data = mysqli_fetch_array($result))
                  {
                  $id = $userfetch_data['id'];
                  $student_id = $userfetch_data['student_id'];
                  $tutor_id = $userfetch_data['tutor_id'];
                  $session_date = $userfetch_data['session_date'];
                  $slots = $userfetch_data['slots'];
                  
                  $approval_status = $userfetch_data['approval_status'];
                  echo '<tr>';
                    
                    echo "<td>". $session_date ."</td>";
                    echo "<td>". $slots ."</td>";
                    echo "<td>". $approval_status ."</td>";
                  echo '</tr>';
                  }
                  }
                  ?>
                </tbody>
              </table>
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