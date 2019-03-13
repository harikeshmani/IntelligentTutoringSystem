<?php
include("auth.php");
$today = date("Y-m-d");
$user_id = $_SESSION['user_id'];
$tutor_id = base64_decode(urldecode($_REQUEST['id']));
$qry = mysqli_query($link, "SELECT * FROM tbl_glow_tutor WHERE id = '$tutor_id'");
$username_data=mysqli_fetch_array($qry);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("header.php") ?>
    <style type="text/css">
    form label {
    color: #0b3459;
    }
    label.error {
    color: #0b3459;
    }
    .clickable-row {
    cursor: pointer;
    }
    </style>
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
                <h1>Your Students</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
          <div class="row">
            <table id="example" class="table table-bordered table-hover" id="sess_list">
              <?php
              $query = mysqli_query($link, "SELECT DISTINCT student_id FROM tbl_scheduled_sessions WHERE tutor_id = '$user_id' AND approval_status = 'approved'");
              if(mysqli_num_rows($query)==0) {
              echo " <td>No Record found</td>";
              } else { ?>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>school</th>
                  <th>class</th>
                  <th>image</th>
                </tr>
               </thead>
               <tbody>
                <?php while ($user_fetch = mysqli_fetch_array($query)) {
                $student_id = $user_fetch['student_id'];
                $qry = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM tbl_glow_students WHERE id = '$student_id'"));
                $image = '../api/user_image/'.$qry['pic']; ?>
                <tr class='clickable-row' data-href='performance_detail.php?id=<?=urlencode( base64_encode($student_id));?>'>
                  <td><h2><?php echo $qry['username'];  ?></h2></td>
                  <td><h2><?php echo $qry['school']; ?></h2></td>
                  <td><h2><?php echo $qry['class']; ?></h2></td>
                  <td><img src="<?php echo $image; ?>" height="60" width="60"></td>
                </tr>
                <?php } }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php include("footer.php") ?>
    </div>
    <!-- Vendor -->
    <?php include("footer_files.php") ?>
    <script>
    $(document).ready( function () {
    $('#sess_list').DataTable();
    $(".clickable-row").click(function() {
    window.location = $(this).data("href");
    });
    });
    </script>
  </body>
</html>