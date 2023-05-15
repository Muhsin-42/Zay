<?php require "C:\\xampp\htdocs\mini-project\zay\user/partials\header.php" ?>
<div class="container col-10">
    <?php 
        $sql = "SELECT *FROM tbl_users WHERE username='$_SESSION[username]'";
        $result = mysqli_query($conn,$sql);
        $tbl_user = mysqli_fetch_assoc($result);
    ?>
    <form id="setup-form" action="" method="POST" enctype="multipart/form-data">
        <h1>Edit Details</h1>
        <img src="\mini-project\zay\images\profile-pics\<?php echo $tbl_user['profile_pic'] ?>" alt="" class="rounded-circle" style="width: 150px; position:relative; left:50%;">
        <div class="form-group">
            <label for="exampleFormControlInput1">Full name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $tbl_user['full_name'] ?>" name="fname" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Phone Number</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $tbl_user['phno'] ?>" name="phno" required maxlength="10" title="0-9">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Profile pic</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" name="image" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Country</label>
            <select class="form-control" id="exampleFormControlSelect1" value="<?php echo 'dfd'.$tbl_user['country'] ?>" name="country" required>
                <option>India</option>
                <option>USA</option>
                <option>UK</option>
                <option>UAE</option>
                <option>Japan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">State</label>
            <select class="form-control" id="exampleFormControlSelect1" name="state" required>
                <option>Kerala</option>
                <option>Karnataka</option>
                <option>Tamil Nadu</option>
                <option>Mumbai</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">City</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $tbl_user['city'] ?>" name="city" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Street</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $tbl_user['street'] ?>" name="street" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Pin Code</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $tbl_user['pincode'] ?>" name="pincode" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Describes yourself</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"  name="about" required><?php echo $tbl_user['about'] ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success col-2" name="continue">UPDATE</button>
        </div>
    </form>
</div>

<?php include "partials/footer.php" ?>

<?php
    if(isset($_POST['continue']))
    {
        $fname = $_POST['fname'];
        $phno = $_POST['phno'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $pincode = $_POST['pincode'];
        $about = $_POST['about'];

        /* ====================================
                WORKING WITH IMAGE STARTS
        ========================================*/
        $image = $_FILES['image'];        
        if($_FILES['image']['name']!="")   
        {
            unlink("C:\\xampp\htdocs\mini-project\zay\images\profile-pics\\".$tbl_user['profile_pic']); 
            $img_name = $_FILES['image']['name'];
            
            // extract Extention
            $exp = explode('.',$img_name);
            $ext = end($exp); //explode()- to split || end()-gets the last ele of the array ie the extension
            
            // validating the extension
            $allowed_ext = array('png','jpg','jpeg','gif','img','svg','PNG','JPG','JPEG','GIF','IMG','SVG');
            if(!in_array($ext,$allowed_ext))
            {
                $_SESSION['action_status']= "<div class='error'> Invalid image file!! </div>";
                echo '<script>window.location.replace("my-profile&products&products&products.php");</script>';
                die();
            }
            //Renaming image
            $username = $_SESSION['username'];
            $img_name = $username.rand(000,999).'.'.$ext;
            
            
            // getting other info of image
            $img_src_path = $_FILES['image']['tmp_name'];
            $img_dest_path =  "C:\\xampp\htdocs\mini-project\zay\images\profile-pics\\".$img_name;
            $upload = move_uploaded_file($img_src_path,$img_dest_path);
            if(!$upload)
            {
                $_SESSION['action_status'] = "<div class='error'>Error while uploading image </div>";
                echo '<script>window.location.replace("edit-my-profile.php");</script>';
            }
            $sql ="UPDATE `tbl_users` SET `profile_pic` = '$img_name' WHERE username = '$_SESSION[username]'";
            $result = mysqli_query($conn,$sql);
        }
            /*==================================
                WORKING WITH IMAGE ENDS 
        =====================================*/



        $sql = " UPDATE `tbl_users` SET 
                `full_name`='$fname',
                `phno`='$phno',
                `country`='$country',
                `state`='$state',
                `city`='$city',
                `street`='$street',
                `pincode`='$pincode',
                `about`='$about'
                WHERE username = '$_SESSION[username]'
        ";
        $result = mysqli_query($conn,$sql);
        echo "Error = ".mysqli_error($conn);
        if($result)
        {
            echo '<script>window.location.replace("my-profile&products.php");</script>';
        }
        else 
            echo "error = ".mysqli_error($conn);
    }
?>