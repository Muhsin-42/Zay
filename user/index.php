<?php include "partials/header.php" ?>

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



<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <!-- <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li> -->
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="./assets/img/banner_img_01.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>Zay</b> eCommerce</h1>
                            <h3 class="h2">The best platform to Buy and Sell your products</h3>
                            <p>
                                Zay Shop is an eCommerce shop to buy and sell products at best price you could imagine
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="./assets/img/banner_img_02.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Proident occaecat</h1>
                            <h3 class="h2">Aliquip ex ea commodo consequat</h3>
                            <p>
                                You are permitted to use this Zay CSS template for your commercial websites.
                                You are <strong>not permitted</strong> to re-distribute the template ZIP file in any kind of template collection websites.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="./assets/img/banner_img_03.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Repr in voluptate</h1>
                            <h3 class="h2">Ullamco laboris nisi ut </h3>
                            <p>
                                We bring you 100% free CSS templates for your websites.
                                If you wish to support TemplateMo, please make a small contribution via PayPal or tell your friends about our website. Thank you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Top Categories</h1>
            <p>
                Top Categories as per customer purchased
            </p>
        </div>
    </div>
    <div class="row">
        <?php
        $sql = "SELECT * FROM tbl_category where featured='YES' limit 3";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="\mini-project\zay\images\category\<?php echo $row['img'] ?>" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3"><?php echo $row['title'] ?> </h5>
                <p class="text-center"><a href="products.php?cid=<?php echo $row['cat_id'] . '&ctitle=' . $row['title'] ?>" class="btn btn-success">Go Shop</a></p>
            </div>
        <?php } ?>
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Recent Products</h1>
                <p></p>
            </div>
        </div>
        <div class="row">
            <!-- Card head Start-->
            <style>
                .img-size-this
                {
                    max-width: 256px;
                    max-height: 250px;

                    min-width: 256px;
                    min-height: 250px;

                    height: 256px;
                    width: 250px;
                }
            </style>
            </head>
            <!-- Card head End -->
            <?php
            $sql = "SELECT * FROM tbl_products WHERE featured = 'yes' and active = 'yes' and u_id != $_SESSION[userid] LIMIT 3 ";
            $result = mysqli_query($conn, $sql);
            while ($tbl_products = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-md-4">
                <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid img-size-this" src="\mini-project\zay\images\products\<?php echo $tbl_products['img1'] ?>">
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                            <ul class="list-unstyled">
                                <li><a class="btn btn-success text-white" href=""><i class="far fa-heart"></i></a></li>
                                <li><a class="btn btn-success text-white mt-2" href="shop-single.php?pid=<?php echo $tbl_products['p_id'] ?>"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class=" mb-0 mt-1"><?php echo '<b>₹' . $tbl_products['price'] . '</b>' ?></p>
                        <p class=" mb-0 mb-1"><?php echo  $tbl_products['brand'] ?></p>
                        <a href="shop-single.php?pid=<?php echo $tbl_products['p_id'] ?>" class="h3 text-decoration-none"><?php echo '<b>' . substr($tbl_products['p_title'], 0, 22) . '..</b>' ?></a>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            <li><?php echo substr($tbl_products['description'], 0, 80) . '...'  ?></li>
                        </ul>
                    </div>
                </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- End Featured Product -->


<?php include "partials/footer.php"; ?>