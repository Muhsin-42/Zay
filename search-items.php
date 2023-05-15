
<?php include "partials/header.php" ?>
<head>
    <link rel="stylesheet" href="\mini-project\zay\user\assets\css\search-items-css.css">
    <style>
        .food-search{
            background-image: url(search-banner.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            padding: 7% 0;
        }
    </style>
</head>
<?php
    if(isset($_GET['keyword']))
    {
        $search_keyword = $_GET['keyword'];
    }
    else{
        echo '<meta http-equiv="refresh" content="0; url=\mini-project\zay\user\">';
    }
?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center my-0" style="background-image: url(search-banner.png);">
    <!-- <img src="\mini-project\zay\images\search-banner.png" alt="sdf"> -->
        <div class="container" >
            <form action="" method="get">
                <input type="search" name="keyword" placeholder="Search for items.." required>
                <input type="submit" name="" value="Search" class="btn btn-success btn-lg" style="height: 50px;">
            </form>
            <h2 class="text-white" style="margin-top: 15px;">Products on Your Search <span  class="h2 text-warning">"<?php echo $search_keyword ?>"</span></h2>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu my-0">
        <div class="container">
            <h1 class="text-center">Related items</h1>

            <?php
                $sql = "SELECT * from tbl_products WHERE p_title like '%$search_keyword%' or description like '%$search_keyword%' or tags like '%$search_keyword%'";
                $result = mysqli_query($conn,$sql);
                $num_of_rows = mysqli_num_rows($result);
                if($num_of_rows == 0)
                {
                    echo '<div class="text-center text-light-black h3">No result for "'.$search_keyword.'" </div>';
                }
            while($tbl_products = mysqli_fetch_assoc($result))
            {
                $pid = $tbl_products['p_id'];
                $p_title = $tbl_products['p_title'];
                $description = $tbl_products['description'];
                $image_name = $tbl_products['img1'];
                $price = $tbl_products['price']
                ?>    
    
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="\mini-project\zay\images\products\<?php echo $image_name ?>" alt="image not found" class="img-responsive img-curve" style="max-height: 90px;" >
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $p_title ?></h4>
                        <p class="food-price">$<?php echo $price ?></p>
                        <p class="food-detail mb-0">
                        <?php echo substr($description,0,50) ?>
                        </p>
                        <br>
                        <a href="shop-single.php?pid=<?php echo $pid ?>" class="btn btn-success">View Product</a>
                    </div>
                </div>
                <?php
            }
        ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include "partials/footer.php" ?>