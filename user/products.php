<?php include "partials/header.php"; ?>
<head>
    <style>
        .img-size-this
        {
            max-width:  210px;
            max-height: 220px; 
            min-width: 210px;
            min-height: 210px;
            height: 210px;
            width: 210px;
        }
        #products-me{
            color: rgb(89,171,110)
        }
        </style>
</head>
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
        <div class="col-lg-3">
            <h1 class="h2 pb-4">Categories</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        <?php echo $cat_title;   ?>
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul class="collapse show list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="products.php">All</a></li>
                        <?php
                        $sql = "SELECT * FROM tbl_category WHERE title != '$cat_title'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <li><a class="text-decoration-none" href="products.php?cid=<?php echo $row['cat_id'] . '&ctitle=' . $row['title'] ?>"><?php echo $row['title'] ?></a></li>
                        <?php }    ?>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control">
                            <option value="date"><a href="shop.ph">Recent</a></option>
                            <option value="p_title"><a href=""> A to Z </a></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if ($cat_id == 'All') {
                    $sql = "SELECT * FROM tbl_products WHERE `active` = 'yes' and `u_id` != $_SESSION[userid] ORDER BY date ";
                } else {
                    $sql = "SELECT * FROM tbl_products WHERE cat_id = $cat_id and active = 'yes' ORDER BY date ";
                }
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    
                     ?>
                    <div class="col-md-4">
                        <script>
                            function test()
                            {
                                <?php
                                    header("location:")
                                ?>
                            }
                        </script>
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid img-size-this"  src="\mini-project\zay\images\products\<?php echo $row['img1'] ?>" height="220" width="210" style="">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <?php
                                            $wish_query = "SELECT EXISTS(SELECT * FROM `tbl_wishlist` WHERE p_id = $row[p_id] and u_id = $_SESSION[userid] ) as exist";
                                            $wish_exist = mysqli_fetch_assoc(mysqli_query($conn,$wish_query));
                                            if($wish_exist['exist'])
                                            {
                                                echo '
                                                <form action="" method="post">
                                                    <input type="hidden" value='.$row['p_id'].' name="p_id">
                                                    <button type="submit" name="un-wish" class="btn btn-success text-white"><i class="fas fa-heart"></i></button>
                                                </form>
                                                ';
                                            }
                                            else
                                            {
                                                echo '
                                                <form action="" method="post">
                                                    <input type="hidden" value='.$row['p_id'].' name="p_id">
                                                    <button type="submit" name="wish" class="btn btn-success text-white"><i class="far fa-heart"></i></button>
                                                </form>
                                                ';
                                            }
                                        ?>  
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php?pid=<?php echo $row['p_id'] ?>"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.php?pid=<?php echo $row['p_id'] ?>" class="h3 text-decoration-none"><?php echo '<b>'.substr( $row['p_title'],0,22).'..</b>' ?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li><?php echo substr( $row['description'],0,45).'...'  ?></li>
                                </ul>
                                <p class=" mb-0 mt-1"><?php echo '<b>₹'.$row['price'].'</b>' ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            

            </div>
            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                    </li>
                </ul>
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

<?php
    if(isset($_POST['un-wish']))
    {
        $sql = "DELETE FROM `tbl_wishlist` WHERE p_id = '$_POST[p_id]' and u_id = '$_SESSION[userid]'";
        $result = mysqli_query($conn,$sql);
        if($result)
            echo "<script> alert('Item removed from wishlist!!')  </script>";

        echo '<meta http-equiv="refresh" content="0; url=">';
    }
    if(isset($_POST['wish']))
    {
        $sql = "INSERT INTO tbl_wishlist SET
                u_id = '$_SESSION[userid]',
                p_id = '$_POST[p_id]'";
        $result = mysqli_query($conn,$sql);
        if($result)
            echo '<script>alert("Item added to wishlist");</script>';

        echo '<meta http-equiv="refresh" content="0; url=">';
    }
?>