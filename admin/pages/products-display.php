    <!-- partial:partials/_navbar.php -->
    <?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_navbar.php" ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.php -->
        <?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_settings-panel.php"; ?>

        <!-- partial -->
        <!-- partial:partials/_sidebar.php -->
        <?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_sidebar.php"; ?>

<?php
        if(isset($_SESSION['action_status']))
        {
            echo "<script>alert('$_SESSION[action_status]')</script>";
            unset($_SESSION['action_status']);
        }
?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Products</h2>
                  <!-- <p class="card-description">
                    Complete category list
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped table-hover text-center">
                      <thead class="text-center">
                        <tr>
                          <th >
                            <h4>Image</h4>
                          </th >
                          <th>
                            <h4>Title</h4>
                          </th>
                          <th >
                            <h4>Category</h4>
                          </th>
                          <th >
                            <h4>Price</h4>
                          </th>
                          <th >
                            <h4>Featured</h4>
                          </th>
                          <th >
                            <h4>Posted By</h4>
                          </th>
                          <th >
                            <h4>Actions</h4>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $sql = "SELECT * FROM `tbl_products`,`tbl_category`,`tbl_users` WHERE tbl_products.cat_id = tbl_category.cat_id and tbl_products.u_id = tbl_users.u_id";
                            $result = mysqli_query($conn,$sql);
                            if (!$result) echo "Error = ".mysqli_error($conn);
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                echo '<tr>
                                        <td class="py-1">
                                            <img src="\mini-project\zay\images\products\\',$row['img1'],'" alt="image"/>
                                        </td>
                                        <td>
                                            '.$row['p_title'].'
                                        </td>
                                        <td>
                                            '.$row['title'].'
                                        </td>
                                        <td>
                                            '.$row['price'].'
                                        </td>
                                        <td>
                                            '.$row['featured'].'
                                        </td>
                                        <td>
                                            <a class="text-decoration-none" href="user-profile.php?u_id='.$row['u_id'].'">@'.$row['username'].'</a>
                                        </td>
                                        <td>
                                            <a href="delete-product-admin.php?pid='.$row['p_id'].'"><button class="btn btn-outline-danger" name="cancel">Delete</button></a>
                                        </td>
                                    </tr>';
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.php -->
    <?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_footer.php"; ?>