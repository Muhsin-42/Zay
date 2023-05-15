<?php require "C:\\xampp\htdocs\mini-project\zay\partials\header.php" ?>
<div class="container">
    <form id="setup-form" action="" method="POST" enctype="multipart/form-data">
        <h1>Set-up Profile</h1>
        <div class="form-group">
            <label for="exampleFormControlInput1">Full name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="John oliver" name="fname" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Phone Number</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="94********89" name="phno" required maxlength="10" title="0-9">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Profile pic</label>
            <input type="file" class="form-control" id="exampleFormControlInput1"  name="image" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Country</label>
            <select class="form-control" id="exampleFormControlSelect1" name="country" required>
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
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="City" name="city" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Street</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Street, Landmark" name="street" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Pin Code</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="1234" name="pincode" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Describes yourself</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Something about you..." name="about" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" name="continue">Continue</button>
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
        $uid = $_GET['uid'];

        /* ====================================
                WORKING WITH IMAGE STARTS
        ========================================*/
        $image = $_FILES['image'];
        $img_name = $_FILES['image']['name'];
        
        // extract Extention
        $exp = explode('.',$img_name);
        $ext = end($exp); //explode()- to split || end()-gets the last ele of the array ie the extension

        // validating the extension
        $allowed_ext = array('png','jpg','gif','img','svg');
        if(!in_array($ext,$allowed_ext))
        {
            $_SESSION['action_status']= "<div class='error'> Invalid image file!! </div>";
            echo '<script>window.location.replace("setup-profile.php");</script>';
            die();
        }
         //Renaming image
         $sql = "select *from tbl_users where u_id = '$uid'";
         $r = mysqli_query($conn,$sql);
         if(!$r)
            echo "Error 96 = ".mysqli_error($conn);
         $row = mysqli_fetch_assoc($r);
         $username = $row['username'];
         $img_name = $username.rand(000,999).'.'.$ext;


         // getting other info of image
         $img_src_path = $_FILES['image']['tmp_name'];
         $img_dest_path =  "images/profile-pics/".$img_name;
         
         $upload = move_uploaded_file($img_src_path,$img_dest_path);
        if(!$upload)
        {
            $_SESSION['action_status'] = "<div class='error'>Error while uploading image </div>";
            echo '<script>window.location.replace("setup-profile.php");</script>';
            die();
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
                `about`='$about',
                `profile_pic`='$img_name'
                WHERE u_id = '$uid'
        ";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            echo '<script>window.location.replace("user/index.php");</script>';
        }
        else 
            echo "error = ".mysqli_error($conn);
    }
?>