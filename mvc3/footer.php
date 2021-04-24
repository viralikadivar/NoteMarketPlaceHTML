<?php

require "db_connection.php";
global $connection;
$linkURL = "http://localhost/NotesMarketPlace/NoteMarketPlaceHTML/mvc3/";
// facebook Url 
$fbQuery ="SELECT * FROM SystemConfiguration WHERE KeyFields = 'FBIcon'";
$fbResult = mysqli_query($connection,$fbQuery);
$fbDetail = mysqli_fetch_assoc($fbResult);
$fbLink = $fbDetail['Value'];

// Twitter Url 
$twitterQuery ="SELECT * FROM SystemConfiguration WHERE KeyFields = 'TwitterIcon'";
$twitterResult = mysqli_query($connection,$twitterQuery);
$twitterDetail = mysqli_fetch_assoc($twitterResult);
$twitterLink = $twitterDetail['Value'];

// LinkedIn URL 
$linkedInQuery ="SELECT * FROM SystemConfiguration WHERE KeyFields = 'LinkedInIcon'";
$linkedInResult = mysqli_query($connection,$linkedInQuery);
$linkedInDetail = mysqli_fetch_assoc($linkedInResult);
$linkedInLink = $linkedInDetail['Value'];

$userFooter = '<footer id="footer">
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
                                    <li><a href="'.$fbLink.'" target="_blank"><img src="'.$linkURL.'images/header-footer/facebook.png" alt="Facebook"></a></li>
                                    <li><a href="'.$twitterLink.'" target="_blank"><img src="'.$linkURL.'images/header-footer/twitter.png" alt="Twitter"></a></li>
                                    <li> <a href="'.$linkedInLink .'" target="_blank"><img src="'.$linkURL.'images/header-footer/linkedin.png" alt="LinkedIn"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>';


$adminFooter = '  <footer id="footer">
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
                    </footer>';


if (isset($_SESSION['userRoleID']) && !empty($_SESSION['userRoleID'])) {

    $userRole = $_SESSION['userRoleID'];
    if($userRole == 2 || $userRole == 1){
        echo $adminFooter;
    } else {
        echo $userFooter;
    }
}else {
    echo $userFooter;
}
?>