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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




    <!-- ================================ -->
    <!--           cropperjs -->
    <link rel="stylesheet" href="\mini-project\zay\images\cropperjs\cropper.min.css">
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

                <!-- <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </nav><!-- Close Header -->


