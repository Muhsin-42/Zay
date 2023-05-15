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
                  <h2>Users</h2>
                  <!-- <p class="card-description">
                    Complete category list
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Profile
                          </th>
                          <th>
                            Full name
                          </th>
                          <th>
                            email
                          </th>
                          <th>
                            phno
                          </th>
                          <th>
                              Address
                          </th>
                          <th>
                              about
                          </th>
                          <th>
                              Joined on
                          </th>
                          <th>
                              Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $sql = "SELECT *FROM tbl_users WHERE type != 'admin' ";
                            $result = mysqli_query($conn,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                        <td class="py-1">
                                            <img src="\mini-project\zay\images\profile-pics\\',$row['profile_pic'],'" alt="image"/>
                                        </td>
                                        <td>
                                            '.$row['full_name'].'
                                        </td>
                                        <td>
                                            '.$row['email'].'
                                        </td>
                                        <td>
                                            '.$row['phno'].'
                                        </td>
                                        <td>
                                            '.$row['street'].',
                                            '.$row['city'].',
                                        </td>
                                        <td>
                                            '.$row['about'].'
                                        </td>
                                        <td>
                                            '.$row['date'].'
                                        </td>
                                        
                                        <td>                                          
                                            <a href="delete-user.php?uid='.$row['u_id'].'">Delete</a>                                            
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