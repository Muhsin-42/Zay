<?php
require "C:\\xampp\htdocs\mini-project\zay\config\constants.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BuySell-mart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- my css -->
    <link rel="stylesheet" href="assets/css/my-self.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Bootstrap CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->




    <!-- ================================ -->
    <!--           cropperjs -->
    <!-- <link rel="stylesheet" href="\mini-project\zay\images\cropperjs\cropper.min.css"> -->
    <!-- ================================ -->
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->

    <!-- Drop Down Css w3schools -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .dropbtn {
            color: rgb(33, 41, 52);
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            margin-top: -10px;
        }

        .dropbtn span {
            margin-top: 20px;
            color: red;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* .dropdown:hover .dropbtn {background-color: #3e8e41;} */
    </style>
    <!-- Drop Down Css w3schools -->


    <!-- crop -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>

    <style>
        .image_area {
            position: relative;
        }

        img {
            display: block;
            max-width: 50%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }

        .overlay {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.5);
            overflow: hidden;
            height: 0;
            transition: .5s ease;
            width: 100%;
        }

        .image_area:hover .overlay {
            height: 50%;
            cursor: pointer;
        }

        .text {
            color: #333;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>

</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:muhsinanissar9193@gmail.com">info@companyy.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                Zay
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">


                <ul class="nav d-flex justify-content-arround mx-lg-auto" id="navigation">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="index.php"><b><span style="font-size: 120%; font-weight:500" id="home-me">Home</span></b></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="products.php"><span style="font-size: 120%; font-weight:500" id="products-me">Products</span></a>
                    </li>
                    <li class="nav-item mx-2">
                        <div class="navbar">
                            <form class="form-inline" method="get" action="search-items.php">
                                <input name="keyword" class="form-control" style="display: inline; width: 120px; height: 38px" type="search" placeholder="Search" aria-label="Search" required>
                                <button class="btn btn-outline-success" type="submit" style="height: 36px;margin-top:-1px">Search</button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="about.php"><span style="font-size: 120%; font-weight:500" id="about-us-me">About Us</span></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="contact.php"><span style="font-size: 120%; font-weight:500" id="contact-us-me">Contact Us</span></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="login.php"><span style="font-size: 120%; font-weight:500" id="login-me">Login</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><!-- Close Header -->




    <div class="container">
        <form id="setup-form" action="" method="POST" enctype="multipart/form-data">
            <h1>Set-up Profile</h1>



            <!-- cropper -->
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <div class="image_area">
                    <label for="upload_image">
                        <img src="upload/user.png" id="uploaded_image" class="img-responsive img-circle" />
                        <div class="overlay">
                            <div class="text">Click to Change Profile Image</div>
                        </div>
                        <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                    </label>
                </div>
            </div>
            <!-- cropper -->




            <div class="form-group">
                <label for="exampleFormControlInput1">Full name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="John oliver" name="fname" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Phone Number</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="94********89" name="phno" required maxlength="10" title="0-9">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Profile pic</label>
                <input type="file" class="form-control" id="exampleFormControlInput1" name="image" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Country</label>
                <select class="form-control" id="exampleFormControlSelect1" name="country" required>
                    <option>India</option>
                    <option>USA</option>
                    <option>UK</option>
                    <option>UAE</option>
                    <option>Japan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">State</label>
                <select class="form-control" id="exampleFormControlSelect1" name="state" required>
                    <option>Kerala</option>
                    <option>Karnataka</option>
                    <option>Tamil Nadu</option>
                    <option>Mumbai</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">City</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="City" name="city" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Street</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Street, Landmark" name="street" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Pin Code</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="1234" name="pincode" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Describes yourself</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Something about you..." name="about" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="continue">Continue</button>
            </div>
        </form>

        <!-- croper -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crop Image Before Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="" id="sample_image" />
                                </div>
                                <div class="col-md-4">
                                    <div class="preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="crop" class="btn btn-primary">Crop</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- croper -->
    </div>



    <!-- cropper -->
    <script>
        $(document).ready(function() {

            var $modal = $('#modal');

            var image = document.getElementById('sample_image');

            var cropper;

            $('#upload_image').change(function(event) {
                var files = event.target.files;

                var done = function(url) {
                    image.src = url;
                    $modal.modal('show');
                };

                if (files && files.length > 0) {
                    reader = new FileReader();
                    reader.onload = function(event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 3,
                    preview: '.preview'
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            $('#crop').click(function() {
                canvas = cropper.getCroppedCanvas({
                    width: 400,
                    height: 400
                });

                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;
                        $.ajax({
                            url: 'upload.php',
                            method: 'POST',
                            data: {
                                image: base64data
                            },
                            success: function(data) {
                                $modal.modal('hide');
                                $('#uploaded_image').attr('src', data);
                            }
                        });
                    };
                });
            });

        });
    </script>
    <!-- cropper -->



    <?php include "partials/footer.php" ?>

    <?php
    if (isset($_POST['continue'])) {
        $fname = $_POST['fname'];
        $phno = $_POST['phno'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $pincode = $_POST['pincode'];
        $about = $_POST['about'];
        $uid = $_GET['uid'];

        /* ====================================
                WORKING WITH IMAGE STARTS
        ========================================*/
        $image = $_FILES['image'];
        $img_name = $_FILES['image']['name'];

        // extract Extention
        $exp = explode('.', $img_name);
        $ext = end($exp); //explode()- to split || end()-gets the last ele of the array ie the extension

        // validating the extension
        $allowed_ext = array('png', 'jpg', 'gif', 'img', 'svg');
        if (!in_array($ext, $allowed_ext)) {
            $_SESSION['action_status'] = "<div class='error'> Invalid image file!! </div>";
            echo '<script>window.location.replace("setup-profile.php");</script>';
            die();
        }
        //Renaming image
        $sql = "select *from tbl_users where u_id = '$uid'";
        $r = mysqli_query($conn, $sql);
        if (!$r)
            echo "Error 96 = " . mysqli_error($conn);
        $row = mysqli_fetch_assoc($r);
        $username = $row['username'];
        $img_name = $username . rand(000, 999) . '.' . $ext;


        // getting other info of image
        $img_src_path = $_FILES['image']['tmp_name'];
        $img_dest_path =  "images/profile-pics/" . $img_name;

        $upload = move_uploaded_file($img_src_path, $img_dest_path);
        if (!$upload) {
            $_SESSION['action_status'] = "<div class='error'>Error while uploading image </div>";
            echo '<script>window.location.replace("setup-profile.php");</script>';
            die();
        }

        /*==================================
                WORKING WITH IMAGE ENDS 
        =====================================*/



        $sql = " UPDATE `tbl_users` SET 
                `full_name`='$fname',
                `phno`='$phno',
                `country`='$country',
                `state`='$state',
                `city`='$city',
                `street`='$street',
                `pincode`='$pincode',
                `about`='$about',
                `profile_pic`='$img_name'
                WHERE u_id = '$uid'
        ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>window.location.replace("user/index.php");</script>';
        } else
            echo "error = " . mysqli_error($conn);
    }
    ?>