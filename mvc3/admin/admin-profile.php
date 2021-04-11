<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");
}
require "../db_connection.php";
global $connection;

$userID = $_SESSION['UserID'];

$getUsersDetailsQuery  = "SELECT * FROM Users WHERE ID = $userID  ";
$getUserDetailsResult = mysqli_query($connection, $getUsersDetailsQuery);
$userDetail = mysqli_fetch_assoc($getUserDetailsResult);

$firstName = $userDetail['FirstName'];
$lastName = $userDetail['LastName'];
$email = $userDetail['EmailID'];

$getUsersProfileQuery  = "SELECT * FROM UserProfile WHERE UserID = $userID  ";
$getUserProfileResult = mysqli_query($connection, $getUsersProfileQuery);
mysqli_num_rows($getUserProfileResult);
$userProfile = mysqli_fetch_assoc($getUserProfileResult);
$phoneCode = $userProfile['PhonenNumberCountryCode'];
$phoneNumber = $userProfile['PhoneNumber'];
$secondaryEmail = $userProfile['SecondaryEmailAddress'];

$emailClass = "validate";
$isSet =  false;
$isSubmit = false ;
if (isset($_POST['submit'])) {

    $isSet = true;

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $emailID = $_POST['emailID'];
    $secondaryEmail = $_POST['secondaryEmail'];

    $phoneCode = $_POST['phoneCode'];
    $phoneNumber = $_POST['phoneNo'];

    $getEmailQuery = "SELECT * FROM Users WHERE EmailID = '$emailID' AND ID != $userID  ";
    $getEmailResult = mysqli_query($connection, $getEmailQuery);

    if (mysqli_num_rows($getEmailResult)) {
        $emailClass = "wrong-email";
    } else {
        $emailClass = "validate";
        $isSubmit = true ;
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
    <link rel="stylesheet" href="../fonts/fonts.css">

    <!-- ================================================
                        CSS Files 
    ================================================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

    <!-- Header footer CSS -->
    <link rel="stylesheet" href="../css/header-footer/admin-header.css">
    <link rel="stylesheet" href="../css/header-footer/admin-footer.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/admin-profile.css?version=7514217421">

</head>

<body>


    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->


    <!-- Header -->
    <?php
    require "../header.php";
    ?>
    <!-- Header Ends -->

    <!-- To remove deafult navigation overlay -->
    <br><br>

    <!-- addition detail -->
    <section id="add">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-8">
                    <!-- Heading -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 heading">
                            <h2>My Profile</h2>
                        </div>
                    </div>

                    <!-- form  -->
                    <form action="admin-profile.php" method="post" enctype="multipart/form-data">
                        <div class="row">

                            <!-- First Name -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="first-name" required>First Name *</label>
                                    <input type="text" class="form-control" id="first-name" name="firstName" value="<?php echo $firstName; ?>" placeholder="Enter Your first name">
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="last-name" required>Last Name *</label>
                                    <input type="text" class="form-control" id="last-name" name="lastName" value="<?php echo $lastName; ?>" placeholder="Enter Your last name">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group <?php echo $emailClass; ?>">
                                    <label for="email" required>Email *</label>
                                    <input type="email" class="form-control" id="email" name="emailID" value="<?php if($isSet){echo $emailID;} else{echo $email;} ?>" placeholder="Enter Your email address">
                                    <small>Email is already present</small>
                                </div>
                            </div>

                            <!-- Secondary Email -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="sec-email" required>Secondary Email</label>
                                    <input type="email" class="form-control" id="sec-email" name="secondaryEmail" value="<?php if($secondaryEmail != NULL) {echo $secondaryEmail ;} ?>" placeholder="Enter Your email address">
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-lg-12 col-md-12 col-sm-12 phone-section">

                                <div class="form-group">

                                    <label for="phone-code" required>Phone Number</label>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4">
                                            <div class="dropdown">
                                                <button type="button" id="phone-code" class="select-field" data-toggle="dropdown">
                                                    +<?php echo $phoneCode; ?><img src="../images/form/arrow-down.png" alt="Down">
                                                </button>
                                                <ul class="dropdown-menu phoneCode" aria-labelledby="phone-code">
                                                    <?php

                                                    $phoneCodeQuery = "SELECT * FROM Countries WHERE IsActive = 1 ORDER BY CountryCode ";
                                                    $phoneCodeResult = mysqli_query($connection, $phoneCodeQuery);

                                                    while ($phoneCode = mysqli_fetch_assoc($phoneCodeResult)) {
                                                        echo '<li class="dropdown-item" value="' . $phoneCode['CountryCode'] . '">+' . $phoneCode['CountryCode'] . '</li>';
                                                    }

                                                    ?>
                                                </ul>
                                            </div>
                                            <input type="hidden" name="phoneCode" id="phoneCode" value="<?php echo $phoneCode; ?>">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 pl-0">
                                            <input type="tel" class="form-control" id="Phone-number" value="<?php echo $phoneNumber; ?>" name="phoneNo" placeholder="Enter your phone number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload Picture -->
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <label for="photo" required>Profile Picture</label>
                                    <div class="take-profile">
                                        <label for="photo"><img src="../images/form/upload-file.png" alt="Uplaod"><br>
                                            Upload a picture</label>
                                        <input type="file" name="adminDP" id="photo" style="visibility: hidden;" accept="image/png, image/jpeg ,image/jpg">
                                    </div>
                                </div>
                            </div>

                            <!-- submit button  -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
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
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/header/header.js"></script>
    <script src="../js/admin/admin-profile.js?version=12117451"></script>

</body>

</html>
<?php

if($isSubmit){
    
    $phoneCode = $_POST['phoneCode'];
    $profilePic = $userProfile['ProfilePicture'];
    // file To upload 
    date_default_timezone_set("Asia/Kolkata");
    $dateTime  = new DateTime();
    $timeStamp = $dateTime->getTimestamp();

    $addImagePath = "../members/" . $userID . "/";
    $dp_path = $addImagePath . "DP_" . $timeStamp;
    $path = "";

    // Book Image
    if ($_FILES['adminDP']['size'] != 0) {
        if ($profilePic != null) {
            unlink($profilePic);
        }
        $book_image  = $_FILES['adminDP']['tmp_name'];
        unset($_FILES['adminDP']);
        $bookImageUploades = move_uploaded_file($book_image, $dp_path);
        if ($bookImageUploades) {
            $path = $dp_path;
        }
    } else if (($profilePic != null) && ($_FILES['adminDP']['size'] == 0)) {
        $path = $profilePic;
    } else {
        $defaultDPQuery = "SELECT * FROM SystemConfiguration WHERE KeyFields = 'DefaultMemberDisplayPicture' ";
        $defaultDPResult = mysqli_query($connection, $defaultDPQuery);
        $defaultDP = mysqli_fetch_assoc($defaultDPResult);
        $dp = $defaultDP['Value'];
        $dp = str_replace("../../", "../", $dp);
        $isDefaultSeted = copy($dp, $dp_path);
        if ($isDefaultSeted) {
            $path = $dp_path;
        }
    }

    $updateUserQuery = "UPDATE Users SET FirstName = '$firstName' , LastName = '$lastName', EmailID = '$emailID' , ModifiedBy = $userID WHERE ID = $userID ";
    $updateUserResult = mysqli_query($connection, $updateUserQuery);
    if ($updateUserResult) {

        $upadateUserProfileQuery = "UPDATE UserProfile SET SecondaryEmailAddress = '$secondaryEmail' ,PhonenNumberCountryCode = '$phoneCode',PhoneNumber='$phoneNumber',ProfilePicture='$path',ModifiedBy = $userID  WHERE UserID = $userID ";
        $updateUserProfileResult = mysqli_query($connection, $upadateUserProfileQuery);
        if (!$updateUserProfileResult) {
            die(mysqli_error($connection));
        }
    } else {
        die(mysqli_error($connection));
    }
    }

?>