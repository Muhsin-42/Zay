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
                  <h4 class="card-title">Add Category</h4>
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Title</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Title" name="title">
                    </div>

                    <div class="form-group">
                      <label>Image</label>
                      <input type="file"  class="file-upload-default" name="image" required>
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputName1">Featured</label>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="featured" id="optionsRadios1" value="YES">
                              Yes
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="featured" id="optionsRadios2" value="NO" checked>
                              No
                            </label>
                          </div>
                        </div>
                    <input type="submit" class="btn btn-primary mr-2 my-3 w-25 h-50" name="submit" value="ADD CATEGORY">
                    <button class="btn btn-outline-danger">Cancel</button>
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
      $image = $_FILES['image'];
      $img_name = $_FILES['image']['name'];
      
      // extract Extention
      $exp = explode('.',$img_name);
      $ext = end($exp); //explode()- to split || end()-gets the last ele of the array ie the extension
      
      // validating the extension
      $allowed_ext = array('png','jpg','gif','img','svg','jpeg','PNG','JPG','IMG','SVG','IMG','JPEG');
      if(!in_array($ext,$allowed_ext))
      {
        $_SESSION['action_status']= "<div class='error'> Invalid image file!! </div>";
        echo '<script>window.location.replace("add-category.php");</script>';
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
        // $_SESSION['action_status'] = "<div class='error'>Error while uploading image </div>";
        echo '<script>window.location.replace("add-category.php");</script>';
        die();
      }
        /*==================================
                WORKING WITH IMAGE ENDS 
        =====================================*/
        $sql = "SELECT * FROM tbl_category WHERE title = '$title'";
        $result = mysqli_query($conn,$sql);
        $num_of_rows = mysqli_fetch_assoc($result);
        if($num_of_rows > 0)
        {
          $_SESSION['error'] = "Category already exists!!";
          echo '<meta http-equiv="refresh" content="0; url=add-category.php">';
        }
        $sql = "INSERT INTO tbl_category SET
                title = '$title',
                img = '$img_name',
                featured = '$featured'
                ";
        $result = mysqli_query($conn,$sql);
        if($result)
          echo '<meta http-equiv="refresh" content="0; url=categories_tbl.php">';
      }
      ?>