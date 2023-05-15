    <!-- partial:partials/_navbar.php -->
    <?php include "partials/_navbar.php" ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.php -->
      <?php include "partials/_settings-panel.php"; ?>

      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <?php include "partials/_sidebar.php"; ?>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-0 mb-xl-0">
                  <h1 class="font-weight-bold">Welcome <?php echo $_SESSION['username']; ?></h1>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <?php 
              $sql = "SELECT * FROM tbl_users WHERE type != 'admin'";
              $tot_users = mysqli_num_rows(mysqli_query($conn,$sql));

              $sql = "SELECT * FROM tbl_products";
              $tot_products = mysqli_num_rows(mysqli_query($conn,$sql));

              $sql = "SELECT * FROM tbl_products WHERE active ='yes'";
              $active_products = mysqli_num_rows(mysqli_query($conn,$sql));

              $sql = "SELECT * FROM tbl_category";
              $tot_categories = mysqli_num_rows(mysqli_query($conn,$sql));

              $sql = "SELECT * FROM tbl_contactus";
              $tot_contactus = mysqli_num_rows(mysqli_query($conn,$sql));

              $sql = "SELECT * FROM tbl_contactus where seen = 'no'";
              $tot_new_query = mysqli_num_rows(mysqli_query($conn,$sql));
            ?>
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-tale shadow" style="border-radius: 18px;">
                    <a class="text-decoration-none text-white" href="pages/users.php">
                      <div class="card-body">
                        <p class="mb-4 h2 text-center">Total Users</p>
                        <p class="fs-30 mb-2 text-center h1"><?php echo $tot_users; ?></p>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent ">
                  <div class="card card-dark-blue shadow" style="border-radius: 18px;">
                    <a class="text-decoration-none text-white" href="pages/products-display.php">
                      <div class="card-body">
                        <p class="mb-4 h2 text-center">Total Products</p>
                        <p class="fs-30 mb-2 text-center h1"> <?php echo $tot_products ?></p>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 mb-4  stretch-card transparent">
                  <div class="card card-light-blue shadow" style="border-radius: 18px;">
                      <div class="card-body">
                        <p class="mb-4 h2 text-center">Active Products</p>
                        <p class="fs-30 mb-2 text-center h1"><?php echo $active_products ?></p>
                      </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-danger shadow" style="border-radius: 18px;">
                  <a class="text-decoration-none text-white" href="pages/categories_tbl.php">
                    <div class="card-body">
                      <p class="mb-4 h2 text-center">Total Categories</p>
                      <p class="fs-30 mb-2 text-center h1"><?php echo $tot_categories ?></p>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 mb-4  stretch-card transparent">
                  <div class="card shadow" style="border-radius: 18px; background-color:#9463f7;">
                    <a class="text-decoration-none text-white" href="pages/contact-us.php">
                      <div class="card-body">
                        <p class="mb-4 h2 text-center">User queries</p>
                        <p class="fs-30 mb-2 text-center h1"><?php echo $tot_contactus ?></p>
                        <p class="fs-30 mb-2 text-center h6">New Queries(<?php echo $tot_new_query ?>)</p>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <?php include "partials/_footer.php"; ?>

