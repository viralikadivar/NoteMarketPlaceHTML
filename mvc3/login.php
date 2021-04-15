<?php require "db_connection.php";
session_start();
$password_class = "";
$warning_class = "text-hide";

$isRemember = false;
if(isset($_COOKIE['userDetail'])) {
    $isRemember = true;
    $userPassword = $_COOKIE['userDetail'];
    $userDetails = explode(',' , $userPassword );

    $userEmail = $userDetails[0];
    $userPassword = $userDetails[1];
}

if (isset($_POST["submit"])) {

    global $connection;

    $email = $_POST["email"];
    $_SESSION['userEmail'] = $email;
    $password  = $_POST["password"];


    if(isset($_POST['remember'])){
        if(isset($_COOKIE['userDetail'])) {
            unset($_COOKIE['userDetail']);
        }
    $cookie_name = 'userDetail';
    $cookie_value = $email.','. $password  ;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");   
    }
    

    $query = "SELECT * FROM Users WHERE EmailId = '$email' AND 	IsActive = 1 ";
    $query_result = mysqli_query($connection, $query);

    // NO User with Given email id
    if (!mysqli_num_rows($query_result)) {
        $password_class = "wrong-password";
        $warning_class = "";
    }

    // When get user with email id 
    $user_detail = mysqli_fetch_assoc($query_result);

    if (mysqli_num_rows($query_result)) {

        // Password get matched 
        if (password_verify($password, $user_detail["Password"])) {

            $password_class = "";
            $warning_class = "text-hide";
            $_SESSION['userRoleID'] =  $user_detail['RoleID'];

            if ($user_detail['RoleID'] == 1 || $user_detail['RoleID'] == 2) {
                $userID = $user_detail['ID'];

                $firstLoginQuery = "SELECT * FROM UserProfile WHERE UserID = $userID  AND 	IsActive = 1";
                $userHasUserId = mysqli_query($connection, $firstLoginQuery);
                if (mysqli_num_rows($userHasUserId) == 1) {
                    $usreProfile = mysqli_fetch_assoc($userHasUserId);
                    $_SESSION['UserProfilePic'] = $usreProfile['ProfilePicture'];
                    $_SESSION['UserID'] = $user_detail['ID'];
                    $_SESSION['UserName'] = $user_detail['FirstName'] . ' ' . $user_detail['LastName'];
                    $_SESSION['logged_in'] = true;

                    header("Location:admin/admin-dashboard.php");
                    exit();
                } else {
                    $_SESSION['UserID'] = $user_detail['ID'];
                    $_SESSION['UserName'] = $user_detail['FirstName'] . ' ' . $user_detail['LastName'];
                    $_SESSION['logged_in'] = true;
                    $defaultDPQuery = "SELECT * FROM SystemConfiguration WHERE KeyFields = 'DefaultMemberDisplayPicture' ";
                    $defaultDPResult = mysqli_query($connection, $defaultDPQuery);
                    $defaultDP = mysqli_fetch_assoc($defaultDPResult);
                    $dp = $defaultDP['Value'];
                    $dp = str_replace("../../", "", $dp);
                    $_SESSION['UserProfilePic'] = $dp;
                    header("Location:admin/admin-profile.php");
                    exit();
                }
            } else {
                $userID = $user_detail['ID'];

                $firstLoginQuery = "SELECT * FROM UserProfile WHERE UserID = $userID  AND 	IsActive = 1 ";
                $userHasUserId = mysqli_query($connection, $firstLoginQuery);
                if (mysqli_num_rows($userHasUserId) == 1) {
                    $usreProfile = mysqli_fetch_assoc($userHasUserId);
                    $_SESSION['UserProfilePic'] = $usreProfile['ProfilePicture'];
                    $_SESSION['UserID'] = $user_detail['ID'];
                    $_SESSION['UserName'] = $user_detail['FirstName'] . ' ' . $user_detail['LastName'];
                    $_SESSION['logged_in'] = true;
                    header("Location:http:search-notes.php");

                    exit();
                } else {
                    $_SESSION['UserID'] = $user_detail['ID'];
                    $_SESSION['UserName'] = $user_detail['FirstName'] . ' ' . $user_detail['LastName'];
                    $_SESSION['logged_in'] = true;
                    $defaultDPQuery = "SELECT * FROM SystemConfiguration WHERE KeyFields = 'DefaultMemberDisplayPicture' ";
                    $defaultDPResult = mysqli_query($connection, $defaultDPQuery);
                    $defaultDP = mysqli_fetch_assoc($defaultDPResult);
                    $dp = $defaultDP['Value'];
                    $dp = str_replace("../../", "", $dp);
                    $_SESSION['UserProfilePic'] = $dp;
                    header("Location:user/user-profile.php");
                    exit();
                }
            }
        }

        // Password not match 
        else {
            $password_class = "wrong-password";
            $warning_class = "";
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
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="css/fonts/fonts.css">


    <!-- ================================================
                        CSS Files 
    ================================================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/login.css?version=3010">


</head>

<body>

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

                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" value="<?php if($isRemember){echo $userEmail;} ?>" placeholder="Enter your email" required>

                    </div>
                    <div class="form-group <?php echo $password_class; ?>">
                        <label for="inputPassword">Password<a href="forgot-password.php" id="forgot-password">Forgot Password?</a></label>
                        <input type="password" name="password" class="form-control" id="inputPassword" aria-describedby="passwordVarification" value="<?php if($isRemember){echo $userPassword;} ?>" placeholder="Enter your password" required><img id="show-hide" src="images/form/eye.png" alt="eye">
                        <small id="passwordVarification" class=<?php echo $warning_class; ?>>The password that you've entered is incorrect</small>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="check">
                        <label class="form-check-label" for="check">Remember Me</label>
                    </div>
                    <!-- <button type="submit" name="submit"><span class="text-center"><a href="user/user-dashboard.html">Login</a></span></button> -->
                    <button type="submit" name="submit"><span class="text-center">Login</span></button>
                    <h4 class="text-center">Don't have an account? <a href="user/sign-up.php">Sign Up</a> </span></h4>
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