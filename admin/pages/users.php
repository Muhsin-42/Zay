<!-- partial:partials/_navbar.php -->
    <?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_navbar.php" ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.php -->
        <?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_settings-panel.php"; ?>

        <!-- partial -->
        <!-- partial:partials/_sidebar.php -->
        <?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_sidebar.php"; ?>

        <!-- partial -->
        <!-- Printing action status -->
<?php
  if(isset($_SESSION['action_status']))
  {
      echo "<script>alert('$_SESSION[action_status]')</script>";
      unset($_SESSION['action_status']);
  }
?>

        <div class="main-panel">
            <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 class="mb-3">Users</h2>
                  <!-- <p class="card-description">
                    Complete category list
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>
                            <h4> Action</h4>
                          </th>
                          <th>
                            <h4> Profile</h4>
                          </th>
                          <th>
                            <h4> Username</h4>
                          </th>
                          <th>
                            <h4> email</h4>
                          </th>
                          <th>
                            <h4> phno</h4>
                          </th>
                          <th>
                            <h4>Products added</h4>
                          </th>
                          <th>
                            <h4>Joined on</h4>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $sql = "SELECT *FROM tbl_users WHERE type != 'admin' ";
                            $result = mysqli_query($conn,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                             $sql = "SELECT * FROM tbl_products where u_id = '$row[u_id]'";
                             $tot_prd_by_user = mysqli_num_rows(mysqli_query($conn,$sql));

                                echo '<tr>
                                <td>                                          
                                <a href="delete-user.php?uid='.$row['u_id'].'"><button class="btn btn-outline-danger" name="cancel">Delete</button></a>                                            
                            </td>
                                        <td class="py-1">
                                            <img src="\mini-project\zay\images\profile-pics\\',$row['profile_pic'],'" alt="image"/>
                                        </td>
                                        <td>
                                            <a class="text-decoration-none" href="user-profile.php?u_id='.$row['u_id'].'">@'.$row['username'].'</a>
                                        </td>
                                        <td>
                                            '.$row['email'].'
                                        </td>
                                        <td>
                                            '.$row['phno'].'
                                        </td>
                                        <td>
                                            '.$tot_prd_by_user.'
                                        </td>
                                        <td>
                                            '.date('j F, Y', strtotime($row['date'])).'
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