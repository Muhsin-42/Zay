<?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_navbar.php" ?>

<!-- partial -->

<!-- Printting error -->
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
                   
                        <?php
                        if(isset($_GET['u_id']))
                            $sql = "SELECT *FROM tbl_users WHERE u_id = '$_GET[u_id]'";
                        else
                            $sql = "SELECT *FROM tbl_users WHERE u_id = '$_SESSION[userid]'";

                        $res = mysqli_query($conn, $sql);
                        $tbl_users = mysqli_fetch_assoc($res);
                        ?>
                        <div class="container py-5">
                            <div class="row">
                                <div class="card mt-3 mx-auto shadow p-3 mb-5 bg-white" style="width: 40%; border-radius: 5%">
                                    <img class="w-25 img-fluid mx-auto rounded-circle mt-3" src="\mini-project\zay\images\profile-pics\<?php echo $tbl_users['profile_pic'] ?>" alt="Profile pic">
                                    <h2 class="text-center mt-2 mb-1"><?php echo $tbl_users['full_name'] ?></h2>
                                    <h4 class="text-center mt-0 text-secondary" style="">@<?php echo $tbl_users['username'] ?></h4>
                                    <p class="text-center mt-2 mb-1 text-secondary"><i class="fa fa-phone"></i> <?php echo $tbl_users['phno'] . ' | <i class="fa fa-envelope"></i> ' . $tbl_users['email'] ?></p>
                                    <p class="text-center mt-2 mb-1 text-secondary"><?php echo $tbl_users['about'] . ' | ' . $tbl_users['city'] . ', ' . $tbl_users['state'] ?></p>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.php -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
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
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $featured = $_POST['featured'];

    /* ====================================
      WORKING WITH IMAGE STARTS
      ========================================*/
    $image = $_FILES['image'];
    $img_name = $_FILES['image']['name'];

    // extract Extention
    $exp = explode('.', $img_name);
    $ext = end($exp); //explode()- to split || end()-gets the last ele of the array ie the extension

    // validating the extension
    $allowed_ext = array('png', 'jpg', 'gif', 'img', 'svg', 'jpeg', 'PNG', 'JPG', 'IMG', 'SVG', 'IMG', 'JPEG');
    if (!in_array($ext, $allowed_ext)) {
        $_SESSION['action_status'] = "<div class='error'> Invalid image file!! </div>";
        echo '<script>window.location.replace("add-category.php");</script>';
        die();
    }
    //Renaming image
    $img_name = str_replace(" ", "_", $title) . rand(000, 9999) . '.' . $ext;

    // getting other info of image
    $img_src_path = $_FILES['image']['tmp_name'];
    $img_dest_path =  "C:\\xampp\htdocs\mini-project\zay\images\category\\" . $img_name;

    $upload = move_uploaded_file($img_src_path, $img_dest_path);
    if (!$upload) {
        // $_SESSION['action_status'] = "<div class='error'>Error while uploading image </div>";
        echo '<script>window.location.replace("add-category.php");</script>';
        die();
    }
    /*==================================
                WORKING WITH IMAGE ENDS 
        =====================================*/
    $sql = "SELECT * FROM tbl_category WHERE title = '$title'";
    $result = mysqli_query($conn, $sql);
    $num_of_rows = mysqli_fetch_assoc($result);
    if ($num_of_rows > 0) {
        $_SESSION['error'] = "Category already exists!!";
        echo '<meta http-equiv="refresh" content="0; url=add-category.php">';
    }
    $sql = "INSERT INTO tbl_category SET
                title = '$title',
                img = '$img_name',
                featured = '$featured'
                ";
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo '<meta http-equiv="refresh" content="0; url=categories_tbl.php">';
}
?>