<?php include "partials/header.php" ?>

    <head>
        <link rel="stylesheet" href="\mini-project\zay\user\assets\css\add-product.css">
    </head>

    <!-- Printting error -->
    <?php
    if (isset($_SESSION['error'])) {
        echo '<br><br><br><div style="margin-top: -68px" class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Erorr!</strong> ', $_SESSION['error'], '
        </div>';
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-success">
          <strong>Success!</strong> ' . $_SESSION['success'] . '.
        </div>';
        unset($_SESSION['success']);
        echo '<meta http-equiv="refresh" content="1; url=index.php">';
    }
    ?>
    <div class="containerd">
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper" style="background-color: rgb(245, 247, 255); width:100%">
                <div class="main-panel" style="margin: auto;">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card mb-5" style="border-radius: 20px">
                                    <div class="card-body">
                                        <h2 class="card-titlde">Add Product</h2>
                                        <p class="card-description">
                                            Fill all the fields
                                        </p>
                                        <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Title</label>
                                                <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Price</label>
                                                <input type="number" name="price" class="form-control" id="exampleInputName1" placeholder="Price in rupees" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Brand</label>
                                                <input type="text" name="brand" class="form-control" id="exampleInputName1" placeholder="Brand" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Description</label>
                                                <textarea name="desc" class="form-control" id="exampleTextarea1" style="font-size: large;" rows="4" placeholder="Describe your product in detail" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Tags</label>
                                                <textarea name="tags" class="form-control" id="exampleTextarea1" style="font-size: large;" rows="2" placeholder="Add relevant tags to your product" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectGender">Category</label>
                                                <select name="cat_id" class="form-control" id="exampleSelectGender" style="font-size: large;" required>
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_category";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value=' . $row['cat_id'] . '>' . $row['title'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Image 1</label>
                                                <input type="file" name="img1" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" required>
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Image 2</label>
                                                <input type="file" name="img2" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" required>
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Image 3</label>
                                                <input type="file" name="img3" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" required>
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <button name="submit" type="submit" class="btn btn-success mr-2">Sell Product</button>
                                            <button name="cancel" class="btn btn-light">Cancel</button>
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

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="\mini-project\zay\admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinjec\mini-project\zay\admin
  <!-- Plugin j\mini-project\zay\admin this page -->
    <script src="\mini-project\zay\admin/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="\mini-project\zay\admin/vendors/select2/select2.min.js"></script>
    <!-- End plug\mini-project\zay\admin for this page -->
    <!-- inject:j\mini-project\zay\admin
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

    <?php include "partials/footer.php" ?>

    <?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
        $tags = $_POST['tags'];
        $cat_id = $_POST['cat_id'];
        $brand = $_POST['brand'];
        /*=======================================
                    WORKING WITH IMAGES
        =======================================*/
        //getting image name
        $img_name1 = $_FILES['img1']['name'];
        $img_name2 = $_FILES['img2']['name'];
        $img_name3 = $_FILES['img3']['name'];

        // getting image extention
        $temp = explode('.', $img_name1);
        $ext1 = end($temp);
        $temp = explode('.', $img_name2);
        $ext2 = end($temp);
        $temp = explode('.', $img_name3);
        $ext3 = end($temp);
        $allowed_ext = array('png', 'jpg', 'jpeg', 'gif', 'img', 'svg', 'PNG', 'JPG', 'JPEG', 'IMG', 'SVG');

        // Validating image extention
        if (!in_array($ext1, $allowed_ext) or !in_array($ext2, $allowed_ext) or !in_array($ext3, $allowed_ext)) {
            $_SESSION['error'] = " Invalid Image type!!";
            echo '<meta http-equiv="refresh" content="0; url=add-product.php">';
            die();
        }

        // Renaming images
        $img_name1 = str_replace(" ", "_", $title) . $_SESSION['userid'] . '-01.' . $ext1;
        $img_name2 = str_replace(" ", "_", $title) . $_SESSION['userid'] . '-02.' . $ext2;
        $img_name3 = str_replace(" ", "_", $title) . $_SESSION['userid'] . '-03.' . $ext3;

        //Getting Source path and Destination path
        $img_src_path1 = $_FILES['img1']['tmp_name'];
        $img_dest_path1 =  "C:\\xampp\htdocs\mini-project\zay\images\products\\" . $img_name1;

        $img_src_path2 = $_FILES['img2']['tmp_name'];
        $img_dest_path2 =  "C:\\xampp\htdocs\mini-project\zay\images\products\\" . $img_name2;

        $img_src_path3 = $_FILES['img3']['tmp_name'];
        $img_dest_path3 =  "C:\\xampp\htdocs\mini-project\zay\images\products\\" . $img_name3;

        //uploading image to folder
        $upload1 = move_uploaded_file($img_src_path1, $img_dest_path1);
        $upload2 = move_uploaded_file($img_src_path2, $img_dest_path2);
        $upload3 = move_uploaded_file($img_src_path3, $img_dest_path3);

        // validating upload
        if (!$upload1 or !$upload2 or !$upload3) {
            $_SESSION['error'] = " Failed to upload image!!";
            echo '<meta http-equiv="refresh" content="0; url=add-category.php">';
            die();
        }
        /*===============================
                Images Ends
        ===================================*/


        $sql = "INSERT INTO tbl_products SET
                 u_id = '$_SESSION[userid]',
                 cat_id = '$cat_id',
                 p_title = '$title',
                 brand = '$brand',
                 description = '$desc',
                 price = '$price',
                 img1 = '$img_name1',
                 img2 = '$img_name2',
                 img3 = '$img_name3',
                 tags = '$tags'
                ";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['success'] = "Item Added Sucessfully";
            echo '<meta http-equiv="refresh" content="0; url=add-product.php">';
        } else
            $_SESSION['error'] = mysqli_error($conn);
    }
    ?>