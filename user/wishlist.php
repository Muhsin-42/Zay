<head>
    <style>
        .img-size-this {
            max-width: 256px;
            max-height: 263px;
        }
    </style>
</head>
<?php include "partials/header.php"; ?>
<?php
$cat_id = 'All';
$cat_title = 'All';
$sort_by = 'date';
if (isset($_GET['cid'])) {
    $cat_id = $_GET['cid'];
    $cat_title = $_GET['ctitle'];
    if (isset($_GET['sort_by'])) {
        $sort_by = $_GET['sort_by'];
    }
}
?>
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
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <h2>My Wishlist</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="width: 100%;" >
            <div class="col-lg-12 grid-margin stretch-card "  >
                    <div class="card shadow " style="border-radius: 20px">
                        <div class="card-body" >
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Seller</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        // $sql = "SELECT u.username, p.u_id, p.p_title, p.price, p.img1, w.wish_id, w.p_id FROM tbl_wishlist AS w, tbl_products AS p , tbl_users u WHERE
                                        //  w.`u_id`='$_SESSION[userid]' AND p.p_id = w.p_id AND p.status = 'posted' AND u.u_id != p.u_id ";
                                        $sql = "SELECT u.username, p.u_id, p.p_title, p.price, p.img1, w.wish_id, w.p_id FROM tbl_wishlist AS w, tbl_products AS p , tbl_users u WHERE
                                         w.`u_id`='$_SESSION[userid]' AND p.`p_id`=w.`p_id` AND u.`u_id`=p.`u_id` ";
                                        $result = mysqli_query($conn, $sql);

                                        while ($tbl_prd_wish = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?php echo $tbl_prd_wish['p_title'] ?></td>
                                                <td><img src="\mini-project\zay\images\products\<?php echo $tbl_prd_wish['img1'] ?>" width="50" height="50" alt=""></td>
                                                <td class="text-danger">₹<?php echo $tbl_prd_wish['price'] ?></td>
                                                <td><a class="text-decoration-none" href="seller-profile.php?uid=<?php echo $tbl_prd_wish['u_id'] ?>">@<?php echo $tbl_prd_wish['username'] ?></a></td>
                                                <td>
                                                    <a href="choose-payment.php?pid=<?php echo $tbl_prd_wish['p_id'] ?>"><button class="btn btn-outline-success">Buy</button></a>
                                                    <form action="" method="post" style="display: inline;">
                                                        <input type="hidden" name="wish_id" value="<?php echo $tbl_prd_wish['wish_id']; ?>">
                                                        <button class="btn btn-outline-danger" type="submit" name="remove" >Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php 
                                        }
                                    ?>
                                       <?php 
                                            if(isset($_POST['remove']))
                                            {
                                                $sql = "DELETE FROM `tbl_wishlist` WHERE wish_id = $_POST[wish_id]";
                                                mysqli_query($conn,$sql);
                                                echo '<meta http-equiv="refresh" content="0; url=">';
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
</div>
<!-- End Content -->

<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Brands</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    Lorem ipsum dolor sit amet.
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Third slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Brands-->


<?php include "partials/footer.php" ?>