<?php require "partials/header.php"; ?>
<?php 
    $signupError = false;
    $emailExists = false;
    $usernameExists = false;
    $passwordNoMatch = false; // true if pass1 and pass2 dosent match
    if(isset($_POST['signupbtnn']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        
        //checking username already exists
        $sql = "SELECT * FROM tbl_users WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        $num_of_rows = mysqli_num_rows($result);
        if($num_of_rows == 0)  //true if username not used
        {   
            //checking wether email already used
            $sql = "SELECT * FROM tbl_users WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);
            $num_of_rows = mysqli_num_rows($result);
            if($num_of_rows == 0)   //true if email not used
            {
                if($password1 == $password2)
                {
                    //hashing password
                    $password1 = password_hash($password1,PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `tbl_users` SET 
                            username = '$username',
                            email = '$email',
                            password = '$password1' 
                        ";
                    $result = mysqli_query($conn,$sql);
                    if(!$result)    
                    $signupError = true;
                    else{
                        $sql = "SELECT *FROM tbl_users where username = '$username'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        // session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['userid'] = $row['u_id'];
                        $_SESSION['loggedIn'] = true;
                        echo '<meta http-equiv="refresh" content="0; url=setup-profile.php?uid='.$row['u_id'].'">';
                        die();
                    }
                }
                else
                $passwordNoMatch = true;
            }else
            $emailExists = true;
        }
        else
        $usernameExists = true;
    }
    ?> 
<head>
    <title>signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        #nav-login{
            color: black;
        }
        #SignupBody{
            height: 97vh;
        }
        #box{
            /* background-color: rgb(243, 247, 247); */
            background-color: rgb(239,239,239);
            width: 100%;
            height: 88vh;
            padding-top: 50px;
            display: flex;
            justify-content: center;
        }
        #signup{    background-color: white;    }
        #login{     text-decoration: none;      }
        .SignupContainer{
            padding: 0px;
            /* width: 350px;  */
            width: 450px; /* change */

            height: 400px;
            text-align: center;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(117, 69, 69, 0.2);
            transition: 0.3s;
            border-radius: 30px;
        }
        .SignupContainer:hover{
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .inputClass{
            height: 37px;
            width: 83%;
            margin-bottom: 23px;
            font-size: large;
            padding-left: 15px;
        }
        .btnClass{
            padding: 0;
            width: 49%;
            border-width: 0px;
            height: 50px;
            margin-bottom: 32px;
            font-size: large;
            border-radius: 30px;
        }
        button:focus {  /*To remove outline onclicking the button*/ 
            outline: 0 !important;
        }
        #signupBtn{
            background-color: rgb(27,169,76);
            border-width: 0;
            height: 45px;
            color: white;
            font-size: 24px;
            font-weight: bolder;
            border-radius: 20px;
        }
        #signupBtn:hover{
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);

        }
        .signupError{
            color: red;
            margin-top: -23px;
            margin-left: -126px;
            margin-bottom: 22px;
        }

        /* button of header */
        .forSignupPage{
            margin-top: -17;
            margin-bottom: 0px;
        }
    </style>

</head>
    <?php
        if($passwordNoMatch)
            echo '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Erorr!</strong>Password does not match.
          </div>';
        if($signupError)
            echo '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Erorr!</strong>Signup was unsucessfull
          </div>';
        if($emailExists)    
            echo '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong>Email already used.
          </div>';
        if($usernameExists)
            echo '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> Username aleredy used.
          </div>';
    ?>
<div id="SignupBody">
    <div id="box">
        <div class="SignupContainer">
            <form id="f1" class="form"  action="" method="post">
                <!--  -->
                    <div class="form-control mt-5  mb-5">
                        <label for="tuname">nam</label>
                        <input type="text" name="tuname" id="">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Err msg</small>
                    </div>
                    <div class="form-control mt-5  mb-5">
                        <label for="tuname">emil</label>
                        <input type="text" name="tuname" id="">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Err msg</small>
                    </div>
                    <div class="form-control mt-5  mb-5">
                        <label for="tuname">Pas</label>
                        <input type="text" name="tuname" id="">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Err msg</small>
                    </div>

                <!--  -->
                <button class="btnClass" type="button" id="signup"> Signup</button>
                <a href="login.php"><button class="btnClass" type="button" id="login">Login</button></a>
                
                <input type="text" class="inputClass"  name="username" id="username" placeholder="Username" pattern="[A-Za-z0-9]+" title="A-Z , a-z , 0-9" maxlength="30" required>
                <!-- <?php   //if($usernameExists) echo "<div class='signupError'>*Username already used</div>"; ?> -->

                <input type="email" class="inputClass"  name="email" id="email" placeholder="Email" maxlength="30" required>
                <!-- <?php   if($emailExists) echo "<div class='signupError'>*Email already used</div>"; ?> -->

                <input type="password" class="inputClass"  name="password1" id="password1" placeholder="password" maxlength="30" required>
                <input type="password" class="inputClass" name="password2" id="password2" placeholder="Confirm Password" maxlength="30" required>
                <!-- <?php   if($passwordNoMatch) echo "<div class='signupError'>*Password dosn't match</div>";  ?> -->
                <!-- <?php   if($signupError) echo "<div class='signupError'>*Signup unsucessfull!</div>";  ?> -->
                <!-- <input type="submit" class="inputClass" name="signupbtn" id="signupBtn" value="Create an Account" required> -->
                <button type="submit" class="inputClass" name="signupbtn" id="signupBtn"  required>Signup</button>
            </form>
        </div>
    </div>
</div>
<?php include"partials/footer.php" ?>