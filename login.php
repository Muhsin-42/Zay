
<?php  include "partials/header.php"; ?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Login</title>
    <style>
        #login-me{
            color: rgb(89,171,110);
        }
        #nav-login {
            color: black;
        }
        
        #LoginBody {
            height: 97vh;
            /* background-color: rgb(243, 247, 247); */
            background-color: rgb(239,239,239);
        }
        
        .box {
            width: 100%;
            height: 88vh;
        padding-top: 50px;
        display: flex;
        justify-content: center;
        /* align-items: center; */
    }
    
    #login {
        background-color: white;
    }
    
    .LoginContainer {
        width: 350px;
        height: 400px;
        text-align: center;
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(117, 69, 69, 0.2);
        transition: 0.3s;
        border-radius: 30px;
    }
    .LoginContainer:hover{
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    .inputclass {
        height: 37px;
        width: 83%;
        margin-bottom: 23px;
        font-size: large;
        padding-left: 15px;
    }
    
    .btnClass {
        width: 49%;
        border-width: 0px;
        height: 50px;
        margin-bottom: 20px;
        font-size: large;
        border-radius: 30px;
    }
    
    button:focus {
        outline: 0 !important;
    }
    
    #loginbtn {
        background-color: rgb(27, 169, 76);
        height: 45px;
        border-width: 0px;
        margin-top: 23px;
        color: white;
        font-size: 24px;
        font-weight: bolder;
        border-radius: 20px;
    }
    #loginbtn:hover{
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    #f1 img {
        display: block;
        max-width: 100px;
        height: 100px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 25px;
        margin-top: 7px;
    }
    
    #password {
        margin-bottom: 0px;
    }
    </style>
</head>
<?php
    $showAlert = false;
    $loginError = false;
    if(isset($_POST['loginbtn']))
    {
        // Getting data from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Getting data form database
        $sql = "SELECT * FROM tbl_users where username = '$username' or email = '$username'";
        $result = mysqli_query($conn,$sql);

        //Checking number of rows
        $num_of_rows = mysqli_num_rows($result);   
        if($num_of_rows==1)  // =1 if username or email exists
        {
            $row = mysqli_fetch_assoc($result);  // Fetching row 
            if (password_verify($password, $row['password']))  //Verifying password
            {
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $row['u_id'];
                $_SESSION['loggedIn'] = true;
                if($row['type']=='admin')
                {
                    $_SESSION['user_type'] = 'admin';
                    echo '<meta http-equiv="refresh" content="0; url=admin/index.php">';
                    die();
                }
                else
                {
                    $_SESSION['user_type'] = 'user';
                    echo '<meta http-equiv="refresh" content="0; url=user/index.php">';
                }
            }else
            {
               $showAlert = true;
            }   
            
        }else
        {
            $showAlert = true;
        }   
    }
?>

<!-- <script>alert('error')</script> -->

<div id="LoginBody">
<?php
    if($showAlert == true)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Erorr!</strong> Username and password does not match
      </div>';
    }
?>

    <div class="box">
        <div class="LoginContainer">
            <form id="f1" action="<?php $_PHP_SELF ?>" method="post">
                <a href="signup.php"><button class="btnClass" type="button" id="signup"> Signup</button></a>
                <button class="btnClass" type="button" id="login">Login</button>
                <img
                src="images/login.png">
                
                <!-- <input class="inputclass" type="text" name="username" id="username" placeholder="Username or Email"
                    required maxlength="50" pattern="[A-Za-z0-9]+" title="A-Z , a-z , 0-9"> -->
                <input class="inputclass" type="text" name="username" id="username" placeholder="Username or Email"
                    required maxlength="50">
                <input class="inputclass" type="password" name="password" id="password" placeholder="password" required>
                <!-- <input class="inputclass" type="submit" name="loginbtn" id="loginbtn" value="Loginn"  style = "font-size:210px"> -->
                <button class="inputclass" type="submit" name="loginbtn" id="loginbtn">Login</button>
            </form>
        </div>
    </div>
</div>

<?php include"partials/footer.php" ?>
