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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/user/sign-up.css">


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

                <h5 class="text-center" id="successfull-login" style="display:visible;" ><i class="fa fa-check-circle"></i>&ensp;Your account has been successfully created.</h5>

                <form>

                    <!-- First Name -->
                    <div class="form-group">
                        <label for="firstName" required>First Name *</label>
                        <input type="text" class="form-control" id="firstName" 
                            placeholder="Enter Your First Name">
                    </div>

                     <!-- Last Name -->
                     <div class="form-group">
                        <label for="lastName" required>Last Name *</label>
                        <input type="text" class="form-control" id="lastName" 
                            placeholder="Enter Your Last Name">
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="inputEmail" required>Email *</label>
                        <input type="email" class="form-control" id="inputEmail" 
                            placeholder="Enter email">
                    </div>

                    <!-- Enter Password -->
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Enter your password">
                        <img class="show-hide" src="../images/form/eye.png" alt="eye">
                    </div>
                    <!-- Re-Enter Password -->
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password">
                    <img class="show-hide" src="../images/form/eye.png" alt="eye">
                    </div>
                   
                    <button type="submit"><span class="text-center">Sign Up</span></button>
                    <h4 class="text-center">Already have an account? <a href="../login.html">Login</a> </span></h4>
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
    <script src="../js/user/signUp.js"></script>
</body>

</html>