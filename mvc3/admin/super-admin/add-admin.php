<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../../login.php");
}
require "../../db_connection.php";
global $connection;

$userID = $_SESSION['UserID'];
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
    <link rel="shortcut icon" href="../../images/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="../../css/fonts/fonts.css">


    <!-- ================================================
                        CSS Files 
    ================================================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">

    <!-- Header footer CSS -->
    <link rel="stylesheet" href="../../css/header-footer/admin-header.css">
    <link rel="stylesheet" href="../../css/header-footer/admin-footer.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/admin/admin-profile.css">

</head>

<body>


    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->


    <!-- Header -->
    <?php
    require "../../header.php";
    ?>
    <!-- Header Ends -->

    <!-- To remove deafult navigation overlay -->
    <br><br><br>

    <!-- addition detail -->
    <section id="add">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                    <!-- Heading -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 heading">
                            <h2>Add Administrator</h2>
                        </div>
                    </div>

                    <!-- form  -->
                    <form action="add-admin.php" method="post">
                        <div class="row">

                            <!-- First Name -->
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="first-name" required>First Name *</label>
                                    <input type="text" class="form-control" id="first-name" name="firstName" placeholder="Enter Your first name">
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="last-name" required>Last Name *</label>
                                    <input type="text" class="form-control" id="last-name" name="lastName" placeholder="Enter Your last name">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="email" required>Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your email address">
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-lg-12 col-md-12 col-sm-12 phone-section">

                                <div class="form-group">

                                    <label for="phone-code" required>Phone Number</label>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4">
                                            <div class="dropdown dropup">
                                                <button type="button" id="phone-code" class="select-field" data-toggle="dropdown">
                                                    +91<img src="../../images/form/arrow-down.png" alt="Down">
                                                </button>
                                                <ul class="dropdown-menu phoneCodeAdmin" aria-labelledby="phone-code">
                                                    <?php

                                                    $phoneCodeQuery = "SELECT * FROM Countries WHERE IsActive = 1 ORDER BY CountryCode ";
                                                    $phoneCodeResult = mysqli_query($connection, $phoneCodeQuery);

                                                    while ($phoneCode = mysqli_fetch_assoc($phoneCodeResult)) {
                                                        echo '<li class="dropdown-item" value="' . $phoneCode['CountryCode'] . '">+' . $phoneCode['CountryCode'] . '</li>';
                                                    }

                                                    ?>
                                                </ul>
                                            </div>
                                            <input type="hidden" name="phoneCode" id="phoneCode">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 pl-0">
                                            <input type="tel" class="form-control" id="Phone-number" name="Phone-number" placeholder="Enter your phone number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- submit button  -->
                            <div class="col-md-12 col-sm-12">
                                <button class="submit" type="submit" name="submit"><span class="text-center">submit</span></button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <!-- Footer  -->
    <footer id="footer">
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3" id="version">
                    <h6>Version:1.1.24</h6>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9" id="copyright">
                    <h6>Copyright &copy; TatvaSoft All rights reserved.</h6>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Ends -->

    <!-- ================================================
                        JS Files 
    ================================================= -->

    <!-- jQuery -->
    <script src="../../js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>

    <script src="../../js/header/header.js"></script>
    <script src="../../js/admin/admin-profile.js?version=214242081"></script>

    <script>
        $(window).on('load', function() { // makes sure that whole site is loaded
            $('#status').fadeOut();
            $('#preloader').fadeOut('fast');
        });
    </script>

</body>

</html>
<?php

if (isset($_POST['submit'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $countryCode = $_POST['phoneCode'];
    $phoneNo = $_POST['Phone-number'];

    $addAdminQuery = "INSERT INTO Users(RoleID,FirstName , LastName , EmailID  , CreatedBy , ModifiedBy , IsActive )VALUES(2,'$firstName' , '$lastName' , '$email ' , $userID , $userID , 1) ";
    $addAdminResult = mysqli_query($connection, $addAdminQuery);

    if ($addAdminResult) {
        $adminID = mysqli_insert_id($connection);
        $counrtyNameQuery = "SELECT * FROM Countries WHERE CountryCode = '$countryCode' "; 
        $countryNameResult = mysqli_query($connection,$counrtyNameQuery);
        $countryDetail = mysqli_fetch_assoc($countryNameResult);
        $countryName = $countryDetail['Name'];

        $addUserProfileQuery = "INSERT INTO UserProfile(UserID,PhonenNumberCountryCode,PhoneNumber,AddressLine1,AddressLine2,City,State,ZipCode,Country,IsActive) 
                                VALUES($adminID ,'$countryCode','$phoneNo', '','','','','','$countryName',1) ";
        $addUserProfileResult = mysqli_query($connection, $addUserProfileQuery);
        if ($addUserProfileResult) {
            mkdir("../../members/". $adminID , 0700);
        } else {
            die(mysqli_error($connection));
        }
    } else {
        die(mysqli_error($connection));
    }
}

?>