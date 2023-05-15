<?php include "partials\header.php" ?>

    <!-- partial -->

    <!-- Printting error -->
    <?php
      if(isset($_SESSION['error']))
      {
          echo '<br><br><br><div style="margin-top: -50px" class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Erorr!</strong> ',$_SESSION['error'],'
        </div>';
        unset($_SESSION['error']);
      }
    ?>
    <div class="container-fluid page-body-wrapper" style="margin-top: 0px;">
      <!-- partial:../../partials/_settings-panel.php -->
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.php -->
      
      <!-- partial -->
      <div class="main-panel mt-5 m-5"  >        
        <div class="content-wrapper " style="margin-bottom: 100px; width:75%; margin:auto;">
          <div class="row">
            <div class="col-12 grid-margin stretch-card" >
              <div class="card shadow" style="border-radius: 30px; padding:30px">
                <div class="card-body">
                  <h2 class="mb-5">Change password</h2>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group shadow-sm">
                      <!-- <label for="exampleInputName1">Currnet Password</label> -->
                      <input type="password" style="height: 50px;" class="form-control" id="exampleInputName1" placeholder="Current Password" name="old-pass" style="font-size: large;" required>
                    </div>
                    <div class="form-group shadow-sm">
                      <!-- <label for="exampleInputName1">New Password</label> -->
                      <input type="password" style="height: 50px;" class="form-control" id="exampleInputName1" placeholder="New Password" name="new-pass1" style="font-size: large;" required>
                    </div>
                    <div class="form-group shadow-sm " >
                      <!-- <label for="exampleInputName1" style="font-size: large;">Confirm Password</label> -->
                      <input type="password" style="height: 50px;" class="form-control" id="exampleInputName1" placeholder="Confirm Password" name="new-pass2" style="font-size: large;" required>
                    </div>
                    <input type="submit" class="btn btn-primary mr-2 shadow" name="submit" value="Change Password">
                    <button class="btn btn-light shadow">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.php -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="\mini-project\zay\admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="\mini-project\zay\admin/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="\mini-project\zay\admin/vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="\mini-project\zay\admin/js/off-canvas.js"></script>
  <script src="\mini-project\zay\admin/js/hoverable-collapse.js"></script>
  <script src="\mini-project\zay\admin/js/template.js"></script>
  <script src="\mini-project\zay\admin/js/settings.js"></script>
  <script src="\mini-project\zay\admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="\mini-project\zay\admin/js/file-upload.js"></script>
  <script src="\mini-project\zay\admin/js/typeahead.js"></script>
  <script src="\mini-project\zay\admin/js/select2.js"></script>
  <!-- End custom js for this page-->

    <?php include "partials\\footer.php" ?>

<?php
$showAlert = false;
$loginError = false;
if(isset($_POST['submit']))
{
    // Getting data from the form
    $old_pass = $_POST['old-pass'];
    $new_pass1 = $_POST['new-pass1'];
    $new_pass2 = $_POST['new-pass2'];
    $uid = $_GET['uid'];

    $sql = "SELECT * FROM tbl_users WHERE u_id = '$uid'";
    $result = mysqli_query($conn,$sql);
    if(!$result)
       echo "eror = ".mysqli_error($conn);
    // $row = mysqli_fetch_assoc($result);
    
    //Checking number of rows
    $row = mysqli_fetch_assoc($result);  // Fetching row 
    if (password_verify($old_pass,$row['password']))  //Verifying password
    {
        if($new_pass1 == $new_pass2)
        {
            $new_pass1 = password_hash($new_pass2,PASSWORD_DEFAULT);
            $sql = "UPDATE `tbl_users` SET 
                    `password` = '$new_pass1'
                    where u_id = $uid 
                    ";
            $result = mysqli_query($conn,$sql);
            if($result)
                echo '<meta http-equiv="refresh" content="0; url= \mini-project\zay\admin\index.php">';
            else
            {
                $_SESSION['error'] = 'Error changing password';
                echo "Error = ".mysqli_error($conn);
            }
                // echo '<meta http-equiv="refresh" content="0; url= change-password.php">';
        }
        else
        {
            $_SESSION['error'] = 'Passwords does not match';
            echo '<meta http-equiv="refresh" content="0; url= change-password.php">';
        }
    }
    else
    {

        $_SESSION['error'] = 'Incorrect Password';
        echo '<meta http-equiv="refresh" content="0; url= change-password.php">';
    }
}
?>