
<!-- php -->
<?php include "../db_connection.php" ?>
<?php

    session_start();
    global $connection ;

    $succesSubmissionMsgDisplay  = "none";
    $emailValidationMessage = "Please enter valid Email id";
    $emailValidationClass = "validation";

    if(isset($_POST['submit'])){
    
        date_default_timezone_set("Asia/Kolkata");
        $currentDate = date("d-m-Y H:i:s");

        $firstName = $_POST['first-name'];

        $_SESSION['userName'] =  $firstName ; 

        $lastName = $_POST['last-name'];
        $email = $_POST['email'];
        $_SESSION['userSignUpEmailId'] = $email ;
        $_SESSION['userSignUpName'] = $firstName." ".$lastName;
        $password = $_POST['password'];
        $createdDate = $currentDate;
        $modifiedDate = $currentDate;
        $toSubmit = false;
        
        // Password Hashing 
        $hashedPassword = password_hash($password , PASSWORD_DEFAULT);

        $queryEmail = "SELECT EmailID from Users WHERE IsActive = 1";
        $queryResultEmail = mysqli_query($connection , $queryEmail);

        while ($presentEmail = mysqli_fetch_assoc($queryResultEmail)) {
            if($presentEmail['EmailID'] == $email) {
                $emailValidationMessage = "User with this EmailID is alredy Present";
                $emailValidationClass = "wrong-info";
            } else{
                $toSubmit = true;
            }
        }
        
        

        // InserQuery 
        if($toSubmit){
        $query = "INSERT INTO Users( RoleID , FirstName , LastName ,EmailID , Password , IsEmailVerified ) VALUES( 3 , '$firstName' , '$lastName' , '$email' , '$hashedPassword' , 0  )";
        
        $queryResult = mysqli_query($connection ,$query );

        

        if($queryResult){
            header("location:email-varification.php");
        }
       }
        
    }



?>
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
    <link rel="shortcut icon" href="../images/favicon/favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="../css/fonts/fonts.css">
    <!-- ================================================
                        CSS Files 
    ================================================= -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/user/sign-up.css?version=110003">
</head>

<body>

    <section id="sign-up-page">

        <!-- Login Form -->
        <div class="container">

            <!-- Logo -->
            <div class="logo text-center">
            <img src="../images/logo/logo-white.png" alt="Logo">
            </div>
            <!-- Form -->
            <div class="form-wrapper">
                
                <h1 class="text-center">Create an Account</h1>

                <h5 class="text-center">Enter your details to signup</h5>

                <h5 class="text-center" id="successfull-login" style="display:<?php echo $succesSubmissionMsgDisplay; ?>;" ><img class="img-responsive" src="../images/form/check-circle-fill.svg" alt="Done">&ensp;Your account has been successfully created.</h5>

                <form action="sign-up.php" method="post">

                    <!-- First Name -->
                    <div class="form-group validation">
                        <label for="firstName" required>First Name *</label>
                        <input type="text" name="first-name" class="form-control" id="firstName" 
                            placeholder="Enter Your First Name" required>
                            <small id="firstNameValidation" class="form-text">Numeric entry should not be allowed</small>
                    </div>

                     <!-- Last Name -->
                     <div class="form-group validation">
                        <label for="lastName" required>Last Name *</label>
                        <input type="text" name="last-name" class="form-control" id="lastName" 
                            placeholder="Enter Your Last Name" required>
                        <small id="lastNameValidation" class="form-text">Numeric entry should not be allowed</small>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group <?php echo $emailValidationClass;?>">
                        <label for="inputEmail" required>Email *</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" 
                            placeholder="Enter email" required>
                        <small id="emailValidation" class="form-text"><?php echo $emailValidationMessage;?></small>

                    </div>

                    <!-- Enter Password -->
                    <div class="form-group validation">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter your password" required>
                        <img class="show-hide" src="../images/form/eye.png" alt="eye">
                        <small id="passwordValidation" class="form-text"></small>
                    </div>

                    <!-- Re-Enter Password -->
                    <div class="form-group validation">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirm-password" class="form-control" id="confirmPassword" placeholder="Confirm your password" required>
                        <img class="show-hide" src="../images/form/eye.png" alt="eye">
                        <small id="passwordVarification" class="form-text">Password not matched!</small>
                    </div>
                   
                    <button type="submit" name="submit" id="submit" ><span class="text-center">Sign Up</span></button>
                    <h4 class="text-center">Already have an account? <a href="../login.php">Login</a> </span></h4>
                
                </form>
            </div>
        </div>

    </section>
    <!-- ================================================
                        JS Files 
    ================================================= -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>


    <!-- Custom Js -->
    <script src="../js/user/signUp.js?version=112143" type="text/javascript"></script>
</body>

</html>