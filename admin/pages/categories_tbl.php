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
                  <h1 class="mb-3">Categories</h1>
                  <!-- <p class="card-description">
                    Complete category list
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped table-hover text-center">
                      <thead>
                        <tr>
                          <th>
                            <h3> Image </h3>
                          </th>
                          <th>
                            <h3> Title </h3>
                          </th>
                          <th>
                            <h3> Featured </h3>
                          </th>
                          <th>
                            <h3> Actions </h3>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $sql = "SELECT *FROM tbl_category";
                            $result = mysqli_query($conn,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                        <td class="py-1">
                                            <img src="\mini-project\zay\images\category\\',$row['img'],'" alt="image"/>
                                        </td>
                                        <td>
                                            '.$row['title'].'
                                        </td>
                                        <td>
                                            '.$row['featured'].'
                                        </td>
                                        <td>
                                            <a href="edit-category.php?cid='.$row['cat_id'].'"><button class="btn btn-outline-primary" name="cancel">Edit</button></a>                                            
                                            <a href="delete-category.php?cid='.$row['cat_id'].'"><button class="btn btn-outline-danger" name="cancel">Delete</button></a>                                            
                                        </td>
                                    </tr>';
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <a href="add-category.php" class="text-right"><button type="button" class="btn btn-outline-primary mx-5 mb-3 mt-0" name="submit">ADD CATEGORY</button></a>
              </div>
            </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.php -->
    <?php include "C:\\xampp\htdocs\mini-project\zay\admin\partials\_footer.php"; ?>