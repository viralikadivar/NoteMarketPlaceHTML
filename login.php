<!DOCTYPE html>
<html lang="en">

<head>

    <!-- important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">


    <!-- Title of the website-->
    <title>Notes MarketPlace</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="css/fonts/fonts.css">


    <!-- ================================================
                        CSS Files 
    ================================================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/login.css">


</head>

<body>

<?php require "db_connection.php" ?>
<?php

if(isset($_POST["submit"])){
    
    global $connection;

    $email = $_POST["email"];
    $password  = $_POST["password"];
    $password_class = "";
    $warning_class = "text-muted";

    $query = "SELECT * FROM users WHERE EmailId = '$email' ";

    $query_result = mysqli_query( $connection , $query );

    if(!mysqli_num_rows( $query_result)){
        $password_class = "wrong-password";
        $warning_class = "";
    }

    $user_detail = mysqli_fetch_assoc($query_result);

    if(mysqli_num_rows( $query_result)){

        if($user_detail["Password"] !=  $password ){
            $password_class = "wrong-password";
            $warning_class = "";

        }
        else{
        $password_class = "";
        $warning_class = "text-muted";
        header("Location:index.html"); 
        exit();
        }

    }

}

?>

    <section id="login-page">

        <!-- Login Form -->
        <div class="container">

            <!-- Logo -->
            <div class="logo text-center">
            <img src="images/logo/logo-white.png" alt="Logo">
            </div>
            <!-- Form -->
            <div class="form-wrapper">
                
                <h1 class="text-center">Login</h1>

                <h5 class="text-center">Enter your Email address and password to login</h5>

                <form  action="login.php" method = "post">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" 
                            placeholder="Enter your email" required>
    
                    </div>
                    <div class="form-group <?php echo $password_class; ?>">
                        <label for="inputPassword">Password<a href="forgot-password.html" id="forgot-password">Forgot Password?</a></label>
                        <input type="password" name="password" class="form-control" id="inputPassword" aria-describedby="passwordVarification" placeholder="Enter your password" required><img id="show-hide" src="images/form/eye.png" alt="eye">
                        <small id="passwordVarification" class="<?php echo $warning_class; ?> form-text">The password that you've entered is incorrect</small>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="check">
                        <label class="form-check-label" for="check">Remember Me</label>
                    </div>
                    <!-- <button type="submit" name="submit"><span class="text-center"><a href="user/user-dashboard.html">Login</a></span></button> -->
                    <button type="submit" name="submit" ><span class="text-center">Login</span></button>
                    <h4 class="text-center">Don't have an account? <a href="user/sign-up.html">Sign Up</a> </span></h4>
                </form>
            </div>
        </div>

    </section>
    <!-- ================================================
                        JS Files 
    ================================================= -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom Js -->
    <script src="js/login.js"></script>

</body>

</html>