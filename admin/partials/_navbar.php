<?php
    include "C:\\xampp\htdocs\mini-project\zay\config\constants.php";
    if(!$_SESSION['loggedIn'] or $_SESSION['user_type']!='admin')
    {
        header("location: \mini-project\zay\user");
    }
    $uid = $_SESSION['userid'];
    $sql = "SELECT * FROM tbl_users WHERE u_id = '$uid'";
    $admin_data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Zay Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="\mini-project\zay\admin\vendors/feather/feather.css">
  <link rel="stylesheet" href="\mini-project\zay\admin\vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="\mini-project\zay\admin\vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="\mini-project\zay\admin\vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="\mini-project\zay\admin\vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="\mini-project\zay\admin\text/css" href="\mini-project\zay\admin\js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="\mini-project\zay\admin\css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="\mini-project\zay\admin\images/favicon.png" />

  <!-- added by me -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="\mini-project\zay\assets\css\bootstrap.min.css">
  <link rel="stylesheet" href="\mini-project\zay\assets\fontawesome-free-5.15.3-web\css\fontawesome.min.css">
</head>
<body>
  <div class="container-scroller">
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="\mini-project\zay\admin\index.php"><img src="\mini-project\zay\admin\images\logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="\mini-project\zay\admin\index.php"><img src="\mini-project\zay\admin\images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle " href="#" data-toggle="dropdown" id="profileDropdown">
              <img class="shadow" src="\mini-project\zay\images\profile-pics\<?php echo $admin_data['profile_pic'] ?>" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="\mini-project\zay\admin\pages\user-profile.php">
                <i class="ti-user text-primary"></i>
                <?php echo $_SESSION['username'] ?>
              </a>
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="\mini-project\zay\admin\pages\change-password.php?uid=<?php echo $uid ?>">
                <i class="fa fa-lock text-primary"></i>
                Change Password
              </a>
              <a class="dropdown-item" href="\mini-project\zay\admin/logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>