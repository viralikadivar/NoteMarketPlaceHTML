<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();

require "db_connection.php";
global $connection;

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
    <link rel="stylesheet" href="css/header-footer/header.css">
    <link rel="stylesheet" href="css/header-footer/footer.css">
    <link rel="stylesheet" href="css/contact-us.css">


</head>

<body>

    <!-- Header -->
    <header id="header">
        <nav class="navbar white-navbar navbar-expand-lg">
            <div class="container navbar-wrapper">
                <a class="navbar-brand" href="index.html">
                    <img class="img-responsive" src="images/logo/logo-dark.png" alt="logo">
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="search-notes.html">Search Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.html">Sell Your Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                        <li class="nav-item active"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                        <li class="nav-item loginNavTab"><a class="nav-link" href="login.html">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar mobile-navbar navbar-expand-lg justify-content-end">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span id="open" class="navbar-toggler-icon">&#9776;</span>
                <span id="close" class="navbar-toggler-icon">&times;</span>
            </button>
        </nav>
    </header>
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

                        <!-- Full Name -->
                        <div class="form-group">
                            <label for="fullName">Full Name *</label>
                            <input type="text" name="full-name" class="form-control" id="fullName" placeholder="Enter Your Full Name" required>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="inputEmail">Email Address *</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter your email address" required>
                        </div>

                        <!-- Enter Password -->
                        <div class="form-group">
                            <label for="subject" required>Subject *</label>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter your subject" required>
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

                            <textarea placeholder="Comments..." name="comments" id="comments-questions" required></textarea>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <button type="submit" name="submit" class="submit"><span class="text-center">Submit</span></button>
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
                        <li><a href="#"><img src="images/header-footer/facebook.png" alt="Facebook"></a></li>
                        <li><a href="#"><img src="images/header-footer/twitter.png" alt="Twitter"></a></li>
                        <li> <a href="#"><img src="images/header-footer/linkedin.png" alt="LinkedIn"></a></li>
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
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <script src="js/header/header.js"></script>

</body>


<?php

// $emailUser = $_SESSION['userEmail'];

$query = "SELECT * FROM systemConfiguration WHERE KeyFields = 'SupportEmailAddress' ";
$queryResult = mysqli_query($connection, $query);
$supportField = mysqli_fetch_assoc($queryResult);
$senderEmail = $supportField['Value'];

$queryReceive = "SELECT * FROM systemConfiguration WHERE KeyFields = 'EmailAddressesForNotify' ";
$queryResultReceive = mysqli_query($connection, $queryReceive);
$supportFieldReceive = mysqli_fetch_assoc($queryResultReceive);
$receiverEmail = $supportFieldReceive['Value'];

// $userQuery = "SELECT * FROM Users WHERE EmailID = '$emailUser' ";
// $userqueryResult = mysqli_query($connection, $userQuery);
// $userInfo = mysqli_fetch_assoc($userqueryResult);
// $userName = $userInfo['FirstName']." ".$userInfo['LastName'];

if (isset($_POST['submit'])) {
    // For Sending Confirmation Mail 
    require "smtp/src/Exception.php";
    require "smtp/src/PHPMailer.php";
    require "smtp/src/SMTP.php";
    $mail = new PHPMailer(true);

    $fullName = $_POST['full-name'];
    $userEmailAddress = $_POST['email'];
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
        $mail->addAddress($receiverEmail , 'Notes MarkePlace Comments and Questions');  //Receiver Detail


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $fullName.' '.'- Query';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->Body    =  'Hello,'.'<br>'.
                           $comments.'<br>'.
                           'Regards,'.'<br>'.
                           $fullName ;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    
}

?>

</html>