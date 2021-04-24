<?php
session_start();
ob_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../../login.php");
}
require "../../db_connection.php";
global $connection;

$userID = $_SESSION['UserID'];
?>
<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

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
    <link rel="stylesheet" href="../../css/header-footer/admin-header.css?version=4240430445">
    <link rel="stylesheet" href="../../css/header-footer/admin-footer.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/admin/super-admin/manage-config.css?version=7381761768">

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

    <!-- get configuration details  -->
    <?php

        $emailSet = false;
        $phoneSet = false;
        $secondaryEmailSet = false;
        $fbSet = false;
        $twitterSet = false;
        $linkedInSet = false;

        $getConfigurationDetailQuery = "SELECT * FROM SystemConfiguration WHERE IsActive= 1";
        $getConfigurationDetailResult = mysqli_query($connection,$getConfigurationDetailQuery);

        if(!$getConfigurationDetailResult){
            die("Not able to find Configuration Details".mysqli_error($connection));
        }
        while($configDetails = mysqli_fetch_assoc($getConfigurationDetailResult)){
            if($configDetails['KeyFields'] == 'SupportEmailAddress' && $configDetails['Value'] != null ) {
                $emailSet = true;
                $givenEmail = $configDetails['Value'] ;  
            } else if($configDetails['KeyFields'] == 'SupportContactNumber' && $configDetails['Value'] != null ) {
                $phoneSet = true;
                $givenPhoneNumber = $configDetails['Value'] ;  
            } else if($configDetails['KeyFields'] == 'EmailAddressesForNotify' && $configDetails['Value'] != null ) {
                $secondaryEmailSet = true;
                $givenSecondaryEmail = $configDetails['Value'] ;  
            } else if($configDetails['KeyFields'] == 'FBIcon' && $configDetails['Value'] != null ) {
                $fbSet = true;
                $givenfbLink = $configDetails['Value'] ;  
            } else if($configDetails['KeyFields'] == 'TwitterIcon' && $configDetails['Value'] != null ) {
                $twitterSet = true;
                $givenTwitterLink = $configDetails['Value'] ;  
            } else if($configDetails['KeyFields'] == 'LinkedInIcon' && $configDetails['Value'] != null ) {
                $linkedInSet = true;
                $givenLinkedInLink = $configDetails['Value'] ;  
            }
        }
    

    ?>
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-9 col-sm-10">

                    <!-- Heading -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 heading">
                            <h2>Manage System Configuration</h2>
                        </div>
                    </div>

                    <!-- form  -->
                    <form action="manage-config.php" method="post" enctype="multipart/form-data">

                        <div class="row">

                            <!-- Support Email -->
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <label for="email" required>Support email address *</label>
                                    <input type="email" class="form-control" id="email" name="supportEmail" value="<?php if($emailSet){echo $givenEmail; }?>" placeholder="Enter email address">
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <label for="phone-number" required>Support phone number *</label>
                                    <input type="tel" class="form-control" id="phone-number" name="supportPhoneNo" value="<?php if($phoneSet){echo $givenPhoneNumber; }?>" placeholder="Enter phone number">
                                </div>
                            </div>

                            <!-- Support Email sys -->
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <label for="email-sys" required>Email Address(es) (for various events system will
                                        send notifications to these users) *</label>
                                    <input type="email" class="form-control" id="email-sys" name="sysEmail" value="<?php if($secondaryEmailSet){echo $givenSecondaryEmail; }?>" placeholder="Enter email address">
                                </div>
                            </div>

                            <!-- facebook url -->
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <label for="facebook" required>Facebook URL</label>
                                    <input type="url" class="form-control" id="facebook" name="facebookURL" value="<?php if($fbSet){echo $givenfbLink; }?>" placeholder="Enter facebook url">
                                </div>
                            </div>

                            <!-- twitter url -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="twitter" required>Twitter URL</label>
                                    <input type="url" class="form-control" id="twitter" value="<?php if($twitterSet){echo $givenTwitterLink; }?>" placeholder="Enter twitter url" name="twitterURL">
                                </div>
                            </div>

                            <!-- linkedin url -->
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <label for="linkedin" required>LinkedIn URL</label>
                                    <input type="url" class="form-control" id="linkedin" name="linkedInURL" value="<?php if($linkedInSet){echo $givenLinkedInLink; }?>" placeholder="Enter linkedIn url">
                                </div>
                            </div>


                            <!-- Upload default book Picture -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="book" required>Default image for notes(if seller do not upload)</label>
                                    <div class="take-profile">
                                        <label for="book"><img src="../../images/form/upload-file.png" alt="Uplaod"><br>
                                            Upload a picture</label>
                                        <input type="file" id="book" style="visibility: hidden;" name="bookImg" accept="image/png, image/jpeg , image/jpg ">
                                    </div>
                                </div>
                            </div>

                            <!-- Upload default profile Picture -->
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <label for="profile" required>Default profile picture(if seller do not
                                        upload)</label>
                                    <div class="take-profile">
                                        <label for="profile"><img src="../../images/form/upload-file.png" alt="Uplaod"><br>
                                            Upload a picture</label>
                                        <input type="file" id="profile" style="visibility: hidden;" name="profileImg" accept="image/png, image/jpeg ,image/jpg">
                                    </div>
                                </div>
                            </div>

                            <!-- submit button  -->
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <button class="submit" type="submit" name="submit"><span class="text-center">submit</span></button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <!-- Footer  -->
    <?php 
        include "../../footer.php";
    ?>
    <!-- Footer Ends -->

    <!-- ================================================
                        JS Files 
    ================================================= -->

    <!-- jQuery -->
    <script src="../../js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>

    <script src="../../js/header/header.js?version=7381761768"></script>
    <!-- <script src="../../js/admin/manage-config.js?varsion=31381113137"></script> -->

</body>

</html>
<?php

if (isset($_POST['submit'])) {

    $email = $_POST['supportEmail'];
    $phoneNo = $_POST['supportPhoneNo'];
    $sysEmail = $_POST['sysEmail'];
    $facebookURL = $_POST['facebookURL'];
    $twitterURL = $_POST['twitterURL'];
    $linkedInURL = $_POST['linkedInURL'];

    // For Support email 
    if ($email != "") {

        $insertSupportEmailQuery = "UPDATE SystemConfiguration SET Value = '$email' WHERE KeyFields = 'SupportEmailAddress'";
        $insertSupportEmailResult = mysqli_query($connection, $insertSupportEmailQuery);
        if (!$insertSupportEmailResult) {
            die(mysqli_error($connection));
        }
    }

    // For Support Contact No 
    if ( $phoneNo != "") {

        $insertSupportPhoneNoQuery = "UPDATE SystemConfiguration SET Value = '$phoneNo' WHERE KeyFields = 'SupportContactNumber'";
        $insertSupportPhoneNoResult = mysqli_query($connection, $insertSupportPhoneNoQuery);
        if (!$insertSupportPhoneNoResult) {
            die(mysqli_error($connection));
        }
    }

    // For System Notification 
    if ( $sysEmail != "") {

        $insertSysEmailQuery = "UPDATE SystemConfiguration SET Value = '$sysEmail' WHERE KeyFields = 'EmailAddressesForNotify'";
        $insertSysEmailResult = mysqli_query($connection, $insertSysEmailQuery);
        if (!$insertSysEmailResult) {
            die(mysqli_error($connection));
        }
    }

    // For Facebook Link 
    if ( $facebookURL != "") {

        $insertfacebookURLQuery = "UPDATE SystemConfiguration SET Value = '$facebookURL' WHERE KeyFields = 'FBIcon'";
        $insertfacebookURLResult = mysqli_query($connection, $insertfacebookURLQuery);
        if (!$insertfacebookURLResult) {
            die(mysqli_error($connection));
        }
    }

    // For Twitter Link 
    if ($twitterURL  != "") {

        $inserttwitterURLQuery = "UPDATE SystemConfiguration SET Value = '$twitterURL' WHERE KeyFields = 'TwitterIcon'";
        $inserttwitterURLResult = mysqli_query($connection, $inserttwitterURLQuery);
        if (!$inserttwitterURLResult) {
            die(mysqli_error($connection));
        }
    }

    // For LinkedIn Link 
    if ($linkedInURL != "") {

        $insertlinkedInURLQuery = "UPDATE SystemConfiguration SET Value = '$linkedInURL' WHERE KeyFields = 'LinkedInIcon'";
        $insertlinkedInURLResult = mysqli_query($connection, $insertlinkedInURLQuery);
        if (!$insertlinkedInURLResult) {
            die(mysqli_error($connection));
        }
    }

    // file To upload 
    date_default_timezone_set("Asia/Kolkata");
    $dateTime  = new DateTime();
    $timeStamp = $dateTime->getTimestamp();
    $pathToSetDefaultFields = "../members/default/";

    // For Default Note Display Picture 
    if (isset($_FILES['bookImg'])) {
        $pathToSetDefaultFields = "../../members/default/";
        $book_image  = $_FILES['bookImg']['tmp_name'];
        $book_DP_path = $pathToSetDefaultFields . "Book_DP_" . $timeStamp;
        $ext = pathinfo($_FILES['bookImg']['name'], PATHINFO_EXTENSION);
        $book_DP_path = $book_DP_path.".".$ext;
        $bookImageUploades = move_uploaded_file($book_image, $book_DP_path);
        if ($bookImageUploades) {
            mysqli_query($connection, "UPDATE SystemConfiguration SET Value = '$book_DP_path'  WHERE KeyFields = 'DefaultNoteDisplayPicture'");
        } 
    } 

    // For Default Member Display Picture 
    if (isset($_FILES['profileImg'])) {

        $member_image  = $_FILES['profileImg']['tmp_name'];
        $member_DP_path = $pathToSetDefaultFields . "Member_DP_" . $timeStamp;
        $ext = pathinfo($_FILES['profileImg']['name'], PATHINFO_EXTENSION);
        $member_DP_path =  $member_DP_path.".".$ext;
        $memberImageUploades = move_uploaded_file($member_image, $member_DP_path);
        if ($memberImageUploades) {
            mysqli_query($connection, "UPDATE SystemConfiguration SET Value = '$member_DP_path'  WHERE KeyFields = 'DefaultMemberDisplayPicture'");
        } 
    }

    header("Refresh:0");

}
ob_flush();
?>