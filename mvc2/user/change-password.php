<?php
session_start();
require "../db_connection.php";
global $connection;

$userEmail = $_SESSION['userEmail'] ;
$validationClass = "validation";
$oldPassword = "";

$getUserQuery = "SELECT * FROM Users WHERE EmailID = '$userEmail' ";
$getUserResult = mysqli_query($connection, $getUserQuery);

if (mysqli_num_rows($getUserResult) == 1) {

    $userDetail = mysqli_fetch_assoc($getUserResult);
    $oldPassword = $userDetail['Password'];

    if (isset($_POST['submit'])) {

        $oldGivenPassword = $_POST['oldPassword'];
        $newPassword = $_POST['inputPassword'];

        $isPassVerified =  password_verify($oldGivenPassword, $oldPassword);
        
        if ($isPassVerified) {

            $validationClass = "validation";
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $passwordUpdateQuery = "UPDATE Users SET Password = '$hashedPassword' WHERE EmailID = '$userEmail' ";
            $passwordUpdateResult = mysqli_query( $connection , $passwordUpdateQuery );

            if($passwordUpdateResult){
                header("Location:../login.php");
            }

        } else {
            echo "NOT Chnged";
            $validationClass = "wrong-info";
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
    <link rel="stylesheet" href="../css/user/change-password.css?version=20045155">


</head>

<body>

    <section id="change-password">

        <!-- Login Form -->
        <div class="container">

            <!-- Logo -->
            <div class="logo text-center">
                <img src="../images/logo/logo-white.png" alt="Logo">
            </div>
            <!-- Form -->
            <div class="form-wrapper">

                <h1 class="text-center">Change Password</h1>

                <h5 class="text-center">Enter your new password to change your password</h5>

                <form action="change-password.php" method="post">

                    <!-- Enter old Password -->
                    <div class="form-group <?php echo $validationClass; ?>">
                        <label for="inputOldPassword">Old Password</label>
                        <input type="password" name="oldPassword" class="form-control" id="inputOldPassword" placeholder="Enter your old password">
                        <img class="show-hide" src="../images/form/eye.png" alt="eye">
                        <small id="passwordCheck" class="form-text">Incorrect Password!</small>
                    </div>


                    <!-- Enter new Password -->
                    <div class="form-group validation">
                        <label for="inputPassword">New Password</label>
                        <input type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="Enter your new password">
                        <img class="show-hide" src="../images/form/eye.png" alt="eye">
                        <small id="passwordValidation" class="form-text"></small>
                    </div>

                    <!-- Re-Enter new Password -->
                    <div class="form-group validation">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Enter your comfirm password ">
                        <img class="show-hide" src="../images/form/eye.png" alt="eye">
                        <small id="passwordVarification" class="form-text">Password not matched!</small>
                    </div>

                    <button type="submit" name="submit" id="submit"><span class="text-center">Submit</span></button>

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
    <script src="../js/user/changePassword.js?version=415525"></script>

</body>

</html>