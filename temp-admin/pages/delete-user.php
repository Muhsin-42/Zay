<?php 
    include "C:\\xampp\htdocs\mini-project\zay\config\constants.php";

    $uid = $_GET['uid'];
    $sql = "DELETE FROM `tbl_users` WHERE `u_id` = '$uid'";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        $_SESSION['action_status'] = "User deleted Sucessfully.";
        echo '<meta http-equiv="refresh" content="0; url=users.php">';
    }
?>