<?php 
    include "C:\\xampp\htdocs\mini-project\zay\config\constants.php";

// to remove fk
$set_fk = "SET FOREIGN_KEY_CHECKS=0";
mysqli_query($conn,$set_fk);

    $uid = $_GET['uid'];
    $sql = "DELETE FROM `tbl_products` WHERE `u_id` = '$uid'";
    $result = mysqli_query($conn,$sql);

    $sql = "SELECT * FROM tbl_users WHERE u_id = '$uid'";
    $res = mysqli_query($conn,$sql);
    $r = mysqli_fetch_assoc($res);

    $sql = "DELETE FROM `tbl_users` WHERE `u_id` = '$uid'";
    $result = mysqli_query($conn,$sql);

//to set fk
$set_fk = "SET FOREIGN_KEY_CHECKS=1";
mysqli_query($conn,$set_fk);

    if($result)
    {
        unlink("C:\\xampp\htdocs\mini-project\zay\images\profile-pics\\".$r['profile_pic']); //delets image from Profile folder 
        $_SESSION['action_status'] = "User deleted Sucessfully.";
        echo '<meta http-equiv="refresh" content="0; url=users.php">';
    }
    else
        echo "Error : ".mysqli_error($conn);
?>