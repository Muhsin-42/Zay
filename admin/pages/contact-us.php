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

        <div class="main-panel" style="width: 100%;">
            <div class="content-wrapper" style="width: 100%;">
            <div class="col-l grid-margin stretch-card" style="width: 100%;">
              <div class="card">
                <div class="card-body">
                  <h1 class="mb-3">User Queries</h2>
                  <!-- <p class="card-description">
                    Complete category list
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>
                            <h4> Name</h4>
                          </th>
                          <th>
                            <h4> Email</h4>
                          </th>
                          <th>
                            <h4> Subject</h4>
                          </th>
                          <th>
                            <h4> Message</h4>
                          </th>
                          <th>
                            <h4>Date</h4>
                          </th>
                        </tr>
                      </thead>
                      <tbody >
                        <?php 
                            $sql = "UPDATE tbl_contactus SET seen='yes'";
                            mysqli_query($conn,$sql);
                            $sql = "SELECT *FROM tbl_contactus ORDER BY con_id DESC";
                            $result = mysqli_query($conn,$sql);
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                echo '<tr class="mt-3">
                                        <td  style="padding:15px 10px">
                                            <span style="font-size:18px">'.$row['name'].'</span>
                                        </td>
                                        <td >
                                            <span  style="font-size:18px">'.$row['email'].'</span>
                                        </td>
                                        <td>
                                            <span style="font-size:18px">'.$row['subject'].'</span>
                                        </td>
                                        <td class="text-break text-wrap text-justify" style="width:300px;">
                                            <span style="font-size:18px">'.$row['message'].'</span>
                                        </td>
                                        <td >
                                            <span style="font-size:18px">'.date('j M, Y', strtotime($row['datetime'])).'</span>
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