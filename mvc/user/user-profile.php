<?php
require "../db_connection.php";
session_start();
$userEmail =  $_SESSION['userEmail'];

$selectUserQuery = "SELECT * FROM Users WHERE EmailID = '$userEmail'";
$selectUserResult = mysqli_query($connection, $selectUserQuery);
$userDetail = mysqli_fetch_assoc($selectUserResult);
$userID = $userDetail['ID'];
$firstName = $userDetail['FirstName'];
$lastName = $userDetail['LastName'];

$gender = "Select your gender";
$phoneCode = "91";

$selectUserProfileQuery = "SELECT * FROM UserProfile WHERE UserID = $userID ";
$selectUserProfileResult = mysqli_query($connection, $selectUserProfileQuery);
$isSet = false;
if (mysqli_num_rows($selectUserProfileResult)) {
    $isSet = true;
    $userProfileDetail = mysqli_fetch_assoc($selectUserProfileResult);

    $gender = $userProfileDetail['Gender'];
    $genderNameQuery = " SELECT * FROM ReferenceData WHERE ID =  $gender  and IsActive = 1 ";
    $genderNameResult = mysqli_query($connection, $genderNameQuery);
    $genderName = mysqli_fetch_assoc($genderNameResult);
    $gender = $genderName['Value'];

    $phoneCode =  $userProfileDetail['PhonenNumberCountryCode'];
    $phoneNumber = $userProfileDetail['PhoneNumber'];

    $add1 = $userProfileDetail['AddressLine1'];
    $add2 = $userProfileDetail['AddressLine2'];
    $city = $userProfileDetail['City'];
    $state = $userProfileDetail['State'];
    $zipCode = $userProfileDetail['ZipCode'];
    $country = $userProfileDetail['Country'];

    $university = $userProfileDetail['University'];
    $college = $userProfileDetail['College'];
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

    <!-- Header footer CSS -->
    <link rel="stylesheet" href="../css/header-footer/user-header.css?version=546381210">
    <link rel="stylesheet" href="../css/header-footer/footer.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/user/user-profile.css?version=1211500">

</head>

<body>

    <!-- Header -->
    <?php
    require "../header.php";
    ?>
    <!-- Header Ends -->

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->


    <!-- ADD Notes Banner-->
    <section id="add-notes">
        <img class="img-responsive" src="../images/faq/banner.jpg" alt="FAQ Banner" id="add-notes-bg-image">

        <!-- Overlay -->
        <div id="add-notes-overlay"></div>
    </section>

    <!-- Heading -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="add-notes-heading" class="text-center">
                    <h2>User Profile</h2>
                </div>
            </div>
        </div>
    </div>

    <section id="add-notes-form">
        <div class="container">

            <form action="user-profile.php" method="post" enctype="multipart/form-data">

                <!-- Basic Profile details Heading -->
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h2>Basic Profile Details</h2>
                    </div>
                </div>

                <!-- Basic Profile details Fields -->
                <div class="row">

                    <!-- First Name -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="first-name" required>First Name *</label>
                            <input type="text" name="firstName" class="form-control" id="first-name" value="<?php echo $firstName; ?>" placeholder="Enter Your first name">
                            <small id="firstNameValidation" class="form-text"></small>
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="last-name" required>Last Name *</label>
                            <input type="text" name="lastName" class="form-control" id="last-name" value="<?php echo $lastName; ?>" placeholder="Enter Your last name">
                            <small id="lastNameValidation" class="form-text"></small>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email" required>Email *</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $userEmail; ?>">
                        </div>
                    </div>

                    <!-- Date of Birth -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="dob" required>Date Of Birth </label>
                            <input type="date" name="dateOfBirth" class="form-control" id="dob" placeholder="Enter Your date of birth">
                        </div>
                    </div>

                    <!-- Select Gender-->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="dropdown">
                                <label for="gender" required>Gender</label>
                                <button type="button" id="gender" class="select-field" data-toggle="dropdown">
                                    <?php echo $gender; ?><img src="../images/form/arrow-down.png" alt="Down">
                                </button>
                                <ul class="dropdown-menu gender" aria-labelledby="gender">
                                    <?php

                                    $genderQuery = "SELECT * FROM ReferenceData WHERE RefCategory = 'Gender' and IsActive = 1 ";
                                    $genderResult = mysqli_query($connection, $genderQuery);

                                    while ($gender = mysqli_fetch_assoc($genderResult)) {
                                        echo '<li class="dropdown-item" value="' . $gender['Value'] . '">' . $gender['Value'] . '</li>';
                                    }

                                    ?>

                                </ul>
                            </div>
                            <input type="hidden" name="gender">
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="col-lg-6 col-md-12 col-sm-12 phone-section">

                        <div class="form-group">

                            <label for="phone-code" required>Phone Number</label>
                            <div class="row">

                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="dropdown">
                                        <button type="button" id="phone-code" class="select-field" data-toggle="dropdown">
                                            +<?php echo $phoneCode; ?><img src="../images/form/arrow-down.png" alt="Down">
                                        </button>
                                        <ul class="dropdown-menu phoneCode" aria-labelledby="phone-code">
                                            <?php

                                            $phoneCodeQuery = "SELECT * FROM Countries WHERE IsActive = 1 ORDER BY CountryCode ";
                                            $phoneCodeResult = mysqli_query($connection, $phoneCodeQuery);

                                            while ($phoneCode = mysqli_fetch_assoc($phoneCodeResult)) {
                                                echo '<li class="dropdown-item" value="+' . $phoneCode['CountryCode'] . '">+' . $phoneCode['CountryCode'] . '</li>';
                                            }

                                            ?>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="phoneCode" id="phoneCode">
                                </div>

                                <div class="col-lg-9 col-md-9 col-sm-9 pl-0">
                                    <input type="text" name="phoneNumber" class="form-control" id="phone-number" value="<?php if($isSet) {echo $phoneNumber;}?>" placeholder="Enter your phone number">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <small id="phoneNumberValidation" class="form-text"></small>
                                </div>



                            </div>
                        </div>
                    </div>

                    <!-- Upload Picture -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="photo" required>Profile Picture</label>
                            <div class="profile-picture">
                                <label for="photo"><img src="../images/form/upload-file.png" alt="Uplaod"><br>
                                    Upload a picture</label>
                                <input type="file" name="profile-picture" id="photo" style="visibility: hidden;" accept="image/png , image/jpeg">
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Address detail Heading -->
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h2>Address Details</h2>
                    </div>
                </div>

                <!-- Address detail Fields-->
                <div class="row">

                    <!-- Address Line 1 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="add-1" required>Address Line 1 *</label>
                            <input type="text" name="addrLine1" class="form-control" id="add-1" value="<?php if($isSet) {echo $add1;}?>" placeholder="Enter Your address">
                            <small id="addr1Validation" class="form-text">Address should not be empty</small>
                        </div>
                    </div>

                    <!-- Address Line 2 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="add-2" required>Address Line 2</label>
                            <input type="text" name="addrLine2" class="form-control" id="add-2" value="<?php if($isSet){ echo $add2;}?>" placeholder="Enter Your address">
                            <small id="addr2Validation" class="form-text">Address should not be empty</small>
                        </div>
                    </div>

                    <!-- City -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="city" required>City *</label>
                            <input type="text" name="city" class="form-control" id="city" value="<?php if($isSet) {echo $city;}?>" placeholder="Enter Your city">
                            <small id="cityValidation" class="form-text">Please enter your city name</small>
                        </div>
                    </div>

                    <!-- State -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="state" required>State *</label>
                            <input type="text" name="state" class="form-control" id="state" value="<?php if($isSet) {echo $state;} ?>" placeholder="Enter Your state">
                            <small id="stateValidation" class="form-text">Please enter your state name</small>
                        </div>
                    </div>

                    <!-- ZipCode -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="zipcode" required>ZipCode *</label>
                            <input type="text" name="zipCode" class="form-control" id="zipcode" value="<?php if($isSet) {echo $zipCode ;} ?>" placeholder="Enter Your zipcode">
                            <small id="zipCodeValidation" class="form-text">ZipCode should not be empty</small>
                        </div>
                    </div>

                    <!-- Country -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="country" required>Country *</label>
                            <input type="text" name="country" class="form-control" id="country" value="<?php if($isSet) {echo $country; }?>" placeholder="Enter Your country">
                            <small id="countryValidation" class="form-text">Please enter your country name</small>
                        </div>
                    </div>

                </div>

                <!-- University and college information Heading -->
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h2>University and College Information</h2>
                    </div>
                </div>

                <!-- University and college information Fields -->
                <div class="row">

                    <!-- University -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="university" required>University</label>
                            <input type="text" name="university" class="form-control" id="university" value="<?php if($isSet){echo $university;}?>" placeholder="Enter Your university">
                        </div>
                    </div>

                    <!-- College -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="college" required>College</label>
                            <input type="text" name="college" class="form-control" id="college" value="<?php if($isSet){echo $college;}?>" placeholder="Enter Your college">
                        </div>
                    </div>

                </div>

                <!-- submit button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button class="submit" name="submit" id="submit" type="submit"><span class="text-center">Submit</span></button>
                    </div>
                </div>

            </form>

        </div>

    </section>

    <!-- Footer  -->
    <footer id="footer">
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <p>
                        Copyright &copy; TatvaSoft All rights reserved.
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <ul class="social-icons">
                        <li><a href="#"><img src="../images/header-footer/facebook.png" alt="Facebook"></a></li>
                        <li><a href="#"><img src="../images/header-footer/twitter.png" alt="Twitter"></a></li>
                        <li> <a href="#"><img src="../images/header-footer/linkedin.png" alt="LinkedIn"></a></li>
                    </ul>
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
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <script src="../js/header/header.js"></script>
    <script src="../js/user/user-profile.js?version=12050255"></script>

</body>

</html>

<?php

if (isset($_POST['submit'])) {

    // Basic Profile Details 
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $userEmail;
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $phoneCode = (int)$_POST['phoneCode'];
    $phoneNumber = $_POST['phoneNumber'];

    // Address Details 
    $addrLine1 = $_POST['addrLine1'];
    $addrLine2 = $_POST['addrLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];
    $country = $_POST['country'];

    // University and College Information 
    $university = $_POST['university'];
    $college = $_POST['college'];

    // Get Current TimeStamp 
    $dateTime = new DateTime();
    $timeStamp = $dateTime->getTimestamp();

    // Update Users FirstName and LastName in Users Table 
    $updateUsersQuery = "UPDATE Users SET FirstName = '$firstName' , LastName = '$lastName' WHERE ID = $userID";
    $updateUsersResult = mysqli_query($connection, $updateUsersQuery);

    // If user already present in table 
    $getUserProfileQuery  = "SELECT * FROM UserProfile WHERE UserID = $userID ";
    $getUserProfileResult = mysqli_query($connection, $getUserProfileQuery);

    if (mysqli_num_rows($getUserProfileResult) != 0) {

        $userProfile = mysqli_fetch_assoc($getUserProfileResult);
        $userProfilePic = $userProfile['ProfilePicture'];

        unlink($userProfilePic);

        if (file_exists($_FILES['profile-picture']['tmp_name'])) {

            $profilePic = $_FILES['profile-picture']['tmp_name'];
            $profilePicPath = "../members/" . $userID . "/DP_" . $timeStamp;
            $profilePicUploaded = move_uploaded_file($profilePic, $profilePicPath);

            if ($profilePicUploaded) {
                $path = $profilePicPath;
            }
        } else {

            $defaultProfilePic = $userProfilePic;
            $profilePicPath = "../members/" . $userID . "/DP_" . $timeStamp;
            $profilePicUploaded = copy($defaultProfilePic, $profilePicPath);

            if ($profilePicUploaded) {
                $path = $profilePicPath;
            }
        }
    }

    // Set Profile Picture of User 

    else if (file_exists($_FILES['profile-picture']['tmp_name']) && mysqli_num_rows($getUserProfileResult) == 0) {
        $profilePic = $_FILES['profile-picture']['tmp_name'];
        $profilePicPath = "../members/" . $userID . "/DP_" . $timeStamp;
        $profilePicUploaded = move_uploaded_file($profilePic, $profilePicPath);
        if ($profilePicUploaded) {
            $path = $profilePicPath;
        }
    } else {
        $defaultProfilePic = "../members/default/defaultDP.jpg";
        $profilePicPath = "../members/" . $userID . "/DP_" . $timeStamp;
        $profilePicUploaded = copy($defaultProfilePic, $profilePicPath);
        if ($profilePicUploaded) {
            $path = $profilePicPath;
        }
    }

    global $path;
    // Get GenderID
    $getGenderID = "SELECT * FROM ReferenceData WHERE RefCategory = 'Gender' and Value = '$gender'";
    $getGenderIDResult = mysqli_query($connection, $getGenderID);
    $getGenderDetail = mysqli_fetch_assoc($getGenderIDResult);
    $genderID = $getGenderDetail['ID'];


    // inserting data into UserProfile Table if User data is not present in UserProfil Data
    if (mysqli_num_rows($getUserProfileResult) == 0) {

        $addProfileQuery = "INSERT INTO UserProfile( UserID , DOB , Gender , SecondaryEmailAddress , PhonenNumberCountryCode , PhoneNumber , ProfilePicture , AddressLine1 , AddressLine2 , City , State , ZipCode , Country , University , College) VALUES( $userID ,  '$dateOfBirth' , $genderID , '$email' , '$phoneCode' , '$phoneNumber' , '$path' , '$addrLine1' , '$addrLine2' , '$city' , '$state' ,'$zipCode' , '$country' , '$university' , '$college' )";
        $addProfileResult = mysqli_query($connection, $addProfileQuery);
        if (!$addProfileResult) {
            die(mysqli_error($connection));
        }
    } else if (mysqli_num_rows($getUserProfileResult) != 0) {
        $updateUserProfileQuery = "UPDATE UserProfile SET DOB = '$dateOfBirth' , Gender = $genderID , SecondaryEmailAddress = '$email' , PhonenNumberCountryCode = '$phoneCode' , PhoneNumber = '$phoneNumber' , ProfilePicture = '$path' , AddressLine1 = '$addrLine1' , AddressLine2 = '$addrLine2' , City = '$city' , State = '$state' , ZipCode = '$zipCode' , Country = '$country' , University = '$university' , College = '$college' WHERE UserID = $userID ";
        $updateUserProfileResult = mysqli_query($connection, $updateUserProfileQuery);
        if (!$updateUserProfileResult) {
            die(mysqli_error($connection));
        }
    }
}

?>