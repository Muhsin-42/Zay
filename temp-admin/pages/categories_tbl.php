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
        <div class="main-panel">
            <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Categories</h2>
                  <!-- <p class="card-description">
                    Complete category list
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            image
                          </th>
                          <th>
                            Title
                          </th>
                          <th>
                            Featured
                          </th>
                          <th>
                            Actions
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
                                            <a href="edit-category.php"><code>Edit</code></a>/                                            
                                            <a href="delete-category.php">Delete</a>                                            
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