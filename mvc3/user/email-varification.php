<?php 
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();


require "../db_connection.php";
global $connection;


$email = $_SESSION['userSignUpEmailId'] ;
$userName =  $_SESSION['userSignUpName'];

$query = "SELECT Value FROM systemConfiguration WHERE KeyFields = 'SupportEmailAddress' " ;
$queryResult = mysqli_query($connection , $query );
$supportField = mysqli_fetch_assoc($queryResult);
$supportEmailAddress = $supportField['Value'];


$userQuery = "SELECT ID FROM Users WHERE EmailID = '$email' and IsEmailVerified = 0 ";
$userqueryResult = mysqli_query($connection , $userQuery );
$userId = mysqli_fetch_assoc($userqueryResult);
$ID = $userId['ID'];

$token = $ID * $ID ;

if(isset($_POST['verifyButton'])){


    // For Sending Confirmation Mail 
    require "../smtp/src/Exception.php";
    require "../smtp/src/PHPMailer.php";
    require "../smtp/src/SMTP.php";

    $mail = new PHPMailer(true);
    

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    // UserName And Password
    $senderEmail = $supportEmailAddress;
    $mail->Username   = $senderEmail;                     //SMTP username
    $mail->Password   = 'vira3333';                               //SMTP password


    // Sender And Receiver Detail 
    $mail->setFrom($senderEmail , 'Notes MarkePlace');  //Sender Detail
    $mail->addAddress($email, $userName  );  //Receiver Detail


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Note Marketplace - Email Verification';
    $mail->Body    =  'Hello '.$userName.','.'<br>'.
                    'Thank you for signing up with us. Please click on below link to verify your email address and to do login.'.'<br>'.
'http://localhost/NotesMarketPlace/NoteMarketPlaceHTML/mvc2/user/activation.php?token='.$token.'<br>'.
'Regards,'.'<br>'.
'Notes Marketplace';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

?>
<!-- http://localhost/user/activation.php?token= $token -->



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
    <link rel="stylesheet" href="../css/user/email-varification.css?version=24520105">

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>



    <!-- Preloader Ends -->
    <section>
        <table>
            <thead>
                <tr>
                    <th>
                        <img src="../images/logo/logo-dark.png" alt="Logo">
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <h1> Email Verification </h1>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h2>Dear <?php echo $_SESSION['userName']; ?>,</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h3>Thanks for Signing up! </h3>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h3>Simply click below for email varification.</h3>
                    </th>
                </tr>
                <tr>
                    <th>

                    <form action="email-varification.php" method="post">

                        <button type="submit" name="verifyButton"><span class="text-center">Verify Email Address</span></button>
                    
                        </form>
                    </th>
                </tr>
            </tbody>
        </table>
    </section>
    <!-- ================================================
                        JS Files 
    ================================================= -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>



</body>

</html>