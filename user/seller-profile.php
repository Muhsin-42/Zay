<!--Header Starts -->
<?php
require "C:\\xampp\htdocs\mini-project\zay\config\constants.php";
if (!$_SESSION['loggedIn']) {
    header("location: ../index.php");
}
$uid = $_GET['uid'];
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
            <a class="navbar-brand logo h2  mx-5" href="">
                Seller Profile
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <?php
                        $sql = "SELECT * FROM tbl_users WHERE u_id  = '$_SESSION[userid]'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                    ?>
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto" id="navigation">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add-product.php">Sell</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About us</a>
                        </li> -->

                        <li class="dropdown nav-item" style="margin-left: 550px;">
                            <img class="dropbtn nav-link" src="\mini-project\zay\images\profile-pics\<?php echo $row['profile_pic'] ?>" alt="Profile pic">
                            <div class="dropdown-content">
                                <a href="my-profile&products.php"><?php echo $_SESSION['username'] ?></a>
                                <a href="wishlist.php">Wishlist</a>
                                <a href="my-products.php">My Products</a>
                                <a href="#">Change Password</a>
                                <a href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                </div> -->
            </div>
        </div>
    </nav><!-- Close Header -->
<!--Header Ends -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>



<!-- Start Content -->
<?php
    $sql = "SELECT *FROM tbl_users WHERE u_id = '$uid'";
    $res = mysqli_query($conn,$sql);
    $tbl_users = mysqli_fetch_assoc($res);
?>
<div class="container py-5">
    <div class="row">
        <div class="card mt-3 mx-auto shadow p-3 mb-5 bg-white" style="width: 40%; border-radius: 5%">
            <img class="w-25 img-fluid mx-auto rounded-circle mt-3" src="\mini-project\zay\images\profile-pics\<?php echo $tbl_users['profile_pic'] ?>" alt="Profile pic">
            <h2 class="text-center mt-2 mb-1"><?php echo $tbl_users['full_name'] ?></h2>
            <h4 class="text-center mt-0 text-secondary" style="">@<?php echo $tbl_users['username'] ?></h4>
            <p class="text-center mt-2 mb-1 text-secondary"><i class="fas fa-phone-alt"></i> <?php echo $tbl_users['phno'].' | <i class="fas fa-envelope"></i> '.$tbl_users['email'] ?></p>
            <p class="text-center mt-2 mb-1 text-secondary"><?php echo $tbl_users['about'].' | '.$tbl_users['city'].', '.$tbl_users['state'] ?></p>
        </div>
    </div>
</div>
<!-- End Content -->



<?php include "partials/footer.php" ?>