<?php 
    include "C:\\xampp\htdocs\mini-project\zay\config\constants.php";

    $pid = $_GET['pid'];
    
    $sql = "SELECT * FROM `tbl_products` WHERE `p_id` = '$pid'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    
    // To remove foreign key constraints 
    $set_fk = "SET FOREIGN_KEY_CHECKS=0";
    mysqli_query($conn,$set_fk);

    $sql = "DELETE FROM `tbl_products` WHERE `p_id` = '$pid' ";
    $result = mysqli_query($conn,$sql);


    // to add foreign key
    $set_fk = "SET FOREIGN_KEY_CHECKS=1";
    mysqli_query($conn,$set_fk);

    if($result)
    {
        unlink("C:\\xampp\htdocs\mini-project\zay\images\products\\".$row['img1']); //delets image from products image folder 
        unlink("C:\\xampp\htdocs\mini-project\zay\images\products\\".$row['img2']); //delets image from products image folder 
        unlink("C:\\xampp\htdocs\mini-project\zay\images\products\\".$row['img3']); //delets image from products image folder 
        $_SESSION['action_status'] = "Product deleted Sucessfully.";
        echo '<meta http-equiv="refresh" content="0; url=products-display.php">';
    }
    else
        echo "Error = ".mysqli_error($conn);
?>