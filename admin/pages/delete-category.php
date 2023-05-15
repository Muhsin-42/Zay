<?php 
    include "C:\\xampp\htdocs\mini-project\zay\config\constants.php";

    $cid = $_GET['cid'];


    // to remove fk
    $set_fk = "SET FOREIGN_KEY_CHECKS=0";
    mysqli_query($conn,$set_fk);
    $sql = "DELETE FROM `tbl_category` WHERE `cat_id` = '$cid'";
    $result = mysqli_query($conn,$sql);

    //to add fk
    $set_fk = "SET FOREIGN_KEY_CHECKS=1";
    mysqli_query($conn,$set_fk);

    if($result)
    {
        $_SESSION['action_status'] = "Category deleted Sucessfully.";
        echo '<meta http-equiv="refresh" content="0; url=categories_tbl.php">';
    }
?>