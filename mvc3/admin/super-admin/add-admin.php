<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../../login.php");
}
require "../../db_connection.php";
global $connection;

$userID = $_SESSION['UserID'];

$emailClass = "validate";
$isEdit = false;
$isSet =  false;
$isSubmit = false;
if (!empty($_SESSION['AdminEditID'])) {
    $editAdmin = $_SESSION['AdminEditID'];
    // unset($_SESSION['AdminEditID']);
    $isEdit = true;

    $adminDetailsQuery = "SELECT * FROM Users WHERE ID = $editAdmin";
    $adminDetailsResult = mysqli_query($connection, $adminDetailsQuery);
    $adminDetails = mysqli_fetch_assoc($adminDetailsResult);
    $adminFN = $adminDetails['FirstName'];
    $adminLN =  $adminDetails['LastName'];
    $adminEmail =  $adminDetails['EmailID'];

    $adminProfileDetailQuery = "SELECT * FROM UserProfile WHERE UserID = $editAdmin";
    $adminProfileDetailResult = mysqli_query($connection, $adminProfileDetailQuery);
    $adminProfileDetail = mysqli_fetch_assoc($adminProfileDetailResult);
    $adminPhoneCode = $adminProfileDetail['PhonenNumberCountryCode'];
    $adminPhoneNumber = $adminProfileDetail['PhoneNumber'];
}

if (isset($_POST['submit'])) {

    $isSet = true;
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $countryCode = $_POST['phoneCode'];
    $phoneNo = $_POST['Phone-number'];

    if (!$isEdit) {
        $getEmailQuery = "SELECT * FROM Users WHERE EmailID = '$email' ";
        $getEmailResult = mysqli_query($connection, $getEmailQuery);

        if (mysqli_num_rows($getEmailResult)) {
            $emailClass = "wrong-email";
        } else {
            $emailClass = "validate";
            $isSubmit = true;
        }
    } else {
        $getEmailQuery = "SELECT * FROM Users WHERE EmailID = '$email' AND ID != $editAdmin ";
        $getEmailResult = mysqli_query($connection, $getEmailQuery);

        if (mysqli_num_rows($getEmailResult)) {
            $emailClass = "wrong-email";
        } else {
            $emailClass = "validate";
            $isSubmit = true;
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
    <link rel="stylesheet" href="../../css/admin/admin-profile.css?version=014014521">

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
    <br><br>

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
                                    <input type="text" class="form-control" id="first-name" value="<?php if ($isSet) {
                                                                                                        echo $firstName;
                                                                                                    } else if ($isEdit) {
                                                                                                        echo $adminFN;
                                                                                                    } ?>" name="firstName" placeholder="Enter Your first name">
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="last-name" required>Last Name *</label>
                                    <input type="text" class="form-control" id="last-name" name="lastName" value="<?php if ($isSet) {
                                                                                                                        echo $lastName;
                                                                                                                    } else if ($isEdit) {
                                                                                                                        echo $adminLN;
                                                                                                                    } ?>" placeholder="Enter Your last name">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group <?php echo $emailClass; ?>">
                                    <label for="email" required>Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php if ($isSet) {
                                                                                                                echo $email;
                                                                                                            } else if ($isEdit) {
                                                                                                                echo $adminEmail;
                                                                                                            } ?>" placeholder="Enter Your email address">
                                    <small>Email is alredy present!</small>
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
                                                    +<?php if ($isSet) {
                                                            echo $countryCode;
                                                        } else if ($isEdit) {
                                                            echo $adminPhoneCode;
                                                        } else {
                                                            echo 91;
                                                        } ?><img src="../../images/form/arrow-down.png" alt="Down">
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
                                            <input type="hidden" name="phoneCode" id="phoneCode" value="<?php if ($isSet) {
                                                                                                            echo $countryCode;
                                                                                                        } else if ($isEdit) {
                                                                                                            echo $adminPhoneCode;
                                                                                                        } ?>">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 pl-0">
                                            <input type="tel" class="form-control" id="Phone-number" name="Phone-number" value="<?php if ($isSet) {
                                                                                                                                    echo $phoneNo;
                                                                                                                                } else if ($isEdit) {
                                                                                                                                    echo $adminPhoneNumber;
                                                                                                                                } ?>" placeholder="Enter your phone number">
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
    <script src="../../js/admin/admin-profile.js?version=2142111111081"></script>

</body>

</html>
<?php

if ($isSubmit) {

    if ($isEdit) {
        $updateUsersQuery = "UPDATE Users SET FirstName = '$firstName' ,LastName = '$lastName',EmailID = '$email' , ModifiedBy = $userID WHERE ID = $editAdmin ";
        $updateUersResult = mysqli_query($connection, $updateUsersQuery);
        if ($updateUersResult) {
            $updateUserProfileQuery = "UPDATE UserProfile SET PhonenNumberCountryCode = '$countryCode' , PhoneNumber = '$phoneNo' ,ModifiedBy = $userID WHERE UserID = $editAdmin ";
            $updateUserProfileResult = mysqli_query($connection, $updateUserProfileQuery);
            if (!$updateUserProfileResult) {
                die(mysqli_error($connection));
            } else {
                unset($_SESSION['AdminEditID']);
            }
        } else {
            die(mysqli_error($connection));
        }
    } else {
        $addAdminQuery = "INSERT INTO Users(RoleID,FirstName , LastName , EmailID  , CreatedBy , ModifiedBy , IsActive )VALUES(2,'$firstName' , '$lastName' , '$email ' , $userID , $userID , 1) ";
        $addAdminResult = mysqli_query($connection, $addAdminQuery);

        if ($addAdminResult) {
            $adminID = mysqli_insert_id($connection);
            $counrtyNameQuery = "SELECT * FROM Countries WHERE CountryCode = '$countryCode' ";
            $countryNameResult = mysqli_query($connection, $counrtyNameQuery);
            $countryDetail = mysqli_fetch_assoc($countryNameResult);
            $countryName = $countryDetail['Name'];

            $addUserProfileQuery = "INSERT INTO UserProfile(UserID,PhonenNumberCountryCode,PhoneNumber,ProfilePicture,AddressLine1,AddressLine2,City,State,ZipCode,Country,IsActive) 
                                VALUES($adminID ,'$countryCode','$phoneNo', null , '','','','','','$countryName',1) ";
            $addUserProfileResult = mysqli_query($connection, $addUserProfileQuery);
            if ($addUserProfileResult) {
                mkdir("../../members/" . $adminID, 0700);
            } else {
                die(mysqli_error($connection));
            }
        } else {
            die(mysqli_error($connection));
        }
    }
}

?>