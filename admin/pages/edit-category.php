<?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_navbar.php" ?>

    <!-- partial -->

    <!-- Printting error -->
    <?php
      if(isset($_SESSION['error']))
      {
          echo '<br><br><br><div style="margin-bottom: -50px" class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Erorr!</strong> ',$_SESSION['error'],'
        </div>';
        unset($_SESSION['error']);
      }
    ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.php -->
  <?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_settings-panel.php" ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.php -->
  <?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_sidebar.php" ?>
      
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Edit Category</h2>
                 <?php 
                    $cat_id = $_GET['cid'];
                    $sql = "SELECT * FROM tbl_category WHERE cat_id='$cat_id'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $title = $row['title'];
                    $old_image_name = $row['img'];
                    if($row['featured']=='YES')
                    {
                        $yes = 'checked'; $no = 'no';
                    }
                    else { $no = 'checked'; $yes = 'no'; }
                 ?>
                  <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1" class="h1">Title</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Title" name="title" value="<?php echo $title ?>">
                    </div>

                    <div class="form-group">
                      <img src="\mini-project\zay\images\category\<?php echo $old_image_name ?>" alt="image" width="100">
                      <br><label class="h1">Select new image</label>
                      <input type="file"  class="file-upload-default" name="image" >
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputName1" class="h1">Featured</label>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="featured" id="optionsRadios1" value="YES" <?php echo $yes ?>>
                              Yes
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="featured" id="optionsRadios2" value="NO" <?php echo $no ?>>
                              No
                            </label>
                          </div>
                        </div>
                    <input type="submit" class="btn btn-primary mr-2" name="submit" value="UPDATE CATEGORY">
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  <!-- <form action="#" method="post">

                    <input type="text" name="name" id="">
                    <input type="submit" value="Sub" name="submit">
                  </form> -->
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.php -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
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
</body>
</html>

<?php
    if(isset($_POST['submit']))
    {
      $title = $_POST['title'];
      $featured = $_POST['featured'];
      
      /* ====================================
      WORKING WITH IMAGE STARTS
      ========================================*/
      if($_FILES['image']['name']!="")
      {
          unlink("C:\\xampp\htdocs\mini-project\zay\images\category\\".$old_image_name); //delets image from category folder 
          $image = $_FILES['image'];
          $img_name = $_FILES['image']['name'];
          
          // extract Extention
          $exp = explode('.',$img_name);
          $ext = end($exp); //explode()- to split || end()-gets the last ele of the array ie the extension
          
          // validating the extension
          $allowed_ext = array('png','jpg','gif','img','svg');
          if(!in_array($ext,$allowed_ext))
          {
            $_SESSION['action_status']= "<div class='error'> Invalid image file!! </div>";
            echo '<script>window.location.replace("");</script>';
            die();
          }
          //Renaming image
          $img_name = str_replace(" ","_",$title).rand(000,9999).'.'.$ext;
          
          // getting other info of image
          $img_src_path = $_FILES['image']['tmp_name'];
          $img_dest_path =  "C:\\xampp\htdocs\mini-project\zay\images\category\\".$img_name;
          
          $upload = move_uploaded_file($img_src_path,$img_dest_path);
          if(!$upload)
          {
            $_SESSION['action_status'] = "<div class='error'>Error while uploading image </div>";
            echo '<script>window.location.replace("");</script>';
            die();
          }
          $sql = "UPDATE tbl_category SET
                  img = '$img_name'
                  where cat_id = '$cat_id';
                ";
          mysqli_query($conn,$sql);
        }
        /*==================================
                WORKING WITH IMAGE ENDS 
        =====================================*/
        $sql = "SELECT * FROM tbl_category WHERE title = '$title' and cat_id!='$cat_id'";
        $result = mysqli_query($conn,$sql);
        $num_of_rows = mysqli_num_rows($result);
        if($num_of_rows > 0)
        {
          echo "<script>alert('Category already exists!!')</script>";
          // echo '<meta http-equiv="refresh" content="0; url=">';
        }
        $sql = "UPDATE tbl_category SET
                title = '$title',
                featured = '$featured'
                where cat_id = '$cat_id';
                ";
        $result = mysqli_query($conn,$sql);
        if(!$result)
          echo "Error = ".mysqli_error($conn);
        else
        echo '<meta http-equiv="refresh" content="0; url=categories_tbl.php">';
    }
?>