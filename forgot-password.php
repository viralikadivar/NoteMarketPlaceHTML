<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

require "db_connection.php";
global $connection;


$query = "SELECT Value FROM systemConfiguration WHERE KeyFields = 'SupportEmailAddress' ";
$queryResult = mysqli_query($connection, $query);
$supportField = mysqli_fetch_assoc($queryResult);
$supportEmailAddress = $supportField['Value'];


if (isset($_POST['submit'])) {


    // For Sending Confirmation Mail 
    require "smtp/src/Exception.php";
    require "smtp/src/PHPMailer.php";
    require "smtp/src/SMTP.php";

    $mail = new PHPMailer(true);

    $email = $_POST['email'];

    $userQuery = " SELECT * FROM Users WHERE EmailID = '$email' ";
    $userqueryResult = mysqli_query($connection, $userQuery);

    if (mysqli_num_rows($userqueryResult) == 1) {

        $userDetail = mysqli_fetch_assoc($userqueryResult);
        $userName = $userDetail['FirstName'] . " " . $userDetail['LastName'];

        $passwordChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $passwordRegenerated = substr(str_shuffle($passwordChars), 0, 6);
        $newPassword = password_hash($passwordRegenerated, PASSWORD_DEFAULT);

        $updateQuery = "UPDATE Users SET Password = '$newPassword' WHERE EmailID = '$email' ";
        $updateRessult = mysqli_query($connection, $updateQuery);
        if ($updateRessult) {
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
                $mail->setFrom($senderEmail, 'Notes MarkePlace');  //Sender Detail
                $mail->addAddress($email, $userName);  //Receiver Detail


                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'New Temporary Password has been created for you';
                $mail->Body    =  'Hello ' . $userName . ',' . '<br>' .
                    'We have generated a new password for you' . '<br>' .
                    'Password:' . $passwordRegenerated . '<br>' .
                    'Regards,' . '<br>' .
                    'Notes Marketplace';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo "<script>
                alert('Your password has been changed successfully and newly generated password is sent on your registered email address.');
            </script>";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
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
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="css/fonts/fonts.css">


    <!-- ================================================
                        CSS Files 
    ================================================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/forgot.css?version=12">


</head>

<body>
    <section id="forgot-password-page">

        <!-- Login Form -->
        <div class="container">

            <!-- Logo -->
            <div class="logo text-center">
                <img src="images/logo/logo-white.png" alt="Logo">
            </div>

            <!-- Form -->
            <div class="form-wrapper">

                <h1 class="text-center">Forgot Password?</h1>

                <h5 class="text-center">Enter your email to reset your password</h5>

                <form action="forgot-password.php" method="post">
                    <div class="form-group">

                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter your email">

                    </div>

                    <button type="submit" name="submit"><span class="text-center">Submit</span></button>

                </form>
            </div>

        </div>

    </section>
    <!-- ================================================
                        JS Files 
    ================================================= -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

</body>

</html>