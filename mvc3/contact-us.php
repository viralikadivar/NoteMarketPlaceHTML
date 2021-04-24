<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
require "db_connection.php";
global $connection;

$isSet = false;
$isSubmit = false;
if (isset($_SESSION['userEmail']) && !empty($_SESSION['userEmail'])) {

    $emailUser = $_SESSION['userEmail'];
    $isSet = true;

    $userQuery = "SELECT * FROM Users WHERE EmailID = '$emailUser' ";
    $userqueryResult = mysqli_query($connection, $userQuery);
    $userInfo = mysqli_fetch_assoc($userqueryResult);
    $userName = $userInfo['FirstName'] . " " . $userInfo['LastName'];
}

if (isset($_POST['submit'])) {

    $isSubmit =  true;
    $userGivenEmail = $_POST['emailID'];
    $userGivenName = $_POST['fullName'];
    $subjectGiven = $_POST['subject'];
    $commentsGiven = $_POST['comments'];
}
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
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="css/fonts/fonts.css">


    <!-- ================================================
                        CSS Files 
    ================================================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/header-footer/admin-header.css?version=52444218">
    <link rel="stylesheet" href="css/header-footer/footer.css">
    <link rel="stylesheet" href="css/contact-us.css">



</head>

<body>

    <!-- Header -->
    <?php
    require "header.php";
    ?>
    <!-- Header Ends -->

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->

    <!-- FAQ Banner-->
    <section id="contact-us">
        <img class="img-responsive" src="images/FAQ/banner.jpg" alt="FAQ Banner" id="contact-us-bg-image">

        <!-- Overlay -->
        <div id="contact-us-overlay"></div>
    </section>

    <!-- Contact Heading -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="contact-us-heading" class="text-center">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </div>

    <section id="contact-us-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 heading">
                    <h2>Get In Touch</h2>
                    <h4>Let us know how to get back to you</h4>
                </div>
            </div>

            <form action="contact-us.php" method="post">

                <div class="row">
                    <div class="col-lg-6">

                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="fullName" required>Full Name *</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" value="<?php if ($isSet) {
                                                                                                                echo $userName;
                                                                                                            } ?>" placeholder="Enter Your Fullname">
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="inputEmail" required>Email Address *</label>
                            <input type="email" class="form-control" id="inputEmail" name="emailID" value="<?php if ($isSet) {
                                                                                                                echo $emailUser;
                                                                                                            } ?>" placeholder="Enter Email id">
                        </div>

                        <!-- Enter Subject-->
                        <div class="form-group">
                            <label for="subject" required>Subject *</label>
                            <input type="text" class="form-control" name="subject" id="subject"  placeholder="Enter your subject">
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <!-- Text area -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="comments-questions" required>Comments / Questions *</label>
                                </div>
                            </div>

                            <textarea placeholder="Comments..." name="comments" id="comments-questions"></textarea>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <button type="submit" name="submit" id="submit"><span class="text-center">Submit</span></button>
                    </div>
                </div>

            </form>

        </div>

    </section>

    <!-- Footer  -->
    <?php 
        include "footer.php";
    ?>
    <!-- Footer Ends -->

    <!-- ================================================
                        JS Files 
    ================================================= -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <script src="js/header/header.js?version=54528451254"></script>
    <script src="js/contact-us.js?version=5452845125254"></script>

</body>

</html>

<?php

$query = "SELECT * FROM systemConfiguration WHERE KeyFields = 'SupportEmailAddress' ";
$queryResult = mysqli_query($connection, $query);
$supportField = mysqli_fetch_assoc($queryResult);
$senderEmail = $supportField['Value'];

$queryReceive = "SELECT * FROM systemConfiguration WHERE KeyFields = 'EmailAddressesForNotify' ";
$queryResultReceive = mysqli_query($connection, $queryReceive);
$supportFieldReceive = mysqli_fetch_assoc($queryResultReceive);
$receiverEmail = $supportFieldReceive['Value'];



if ($isSubmit) {
    // For Sending Confirmation Mail 
    require "smtp/src/Exception.php";
    require "smtp/src/PHPMailer.php";
    require "smtp/src/SMTP.php";
    $mail = new PHPMailer(true);

    $userEmail = $_POST['emailID'];
    $userName = $_POST['fullName'];
    $subject = $_POST['subject'];
    $comments = $_POST['comments'];

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        // UserName And Password
        $mail->Username   = $senderEmail;                     //SMTP username
        $mail->Password   = 'vira3333';                               //SMTP password

        // Sender And Receiver Detail 
        $mail->setFrom($senderEmail, 'Notes MarkePlace');  //Sender Detail
        $mail->addAddress($receiverEmail, 'Notes MarkePlace Comments and Questions');  //Receiver Detail


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $userName . ' - ' . $subject;
        $mail->Body    =  'Hello,' . '<br>' .
            $comments . '<br>' .
            'Regards,' . '<br>' .
            $userName . '<br>' .
            '(' . $userEmail . ')';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>