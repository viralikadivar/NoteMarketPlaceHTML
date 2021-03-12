<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

require "../db_connection.php";
global $connection;

$sellerID = 73;
$sellerName = "Pratik Bavarava";

$bookRequestsQuery = "SELECT * FROM NotesDownloads WHERE Seller = $sellerID and IsSellerHasAllowedDownload = 0 ";
$bookRequestsResult = mysqli_query( $connection , $bookRequestsQuery );

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
    <link rel="stylesheet" href="../css/header-footer/user-header.css">
    <link rel="stylesheet" href="../css/header-footer/footer.css">

    <!-- datatable -->
    <link rel="stylesheet" href="../css/data-table/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/user/data-table.css">
    <link rel="stylesheet" href="../css/user/buyers-request.css?version=12304">

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->

    <!-- Header -->
    <header id="header">
        <nav class="navbar white-navbar navbar-expand-lg">
            <div class="container navbar-wrapper">
                <a class="navbar-brand" href="../index.php">
                    <img class="img-responsive" src="../images/logo/logo-dark.png" alt="logo">
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="search-notes.php">Search Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="add-notes.php">Sell Your Notes</a></li>
                        <li class="nav-item active"><a class="nav-link" href="buyers-request.php">Buyer Requests</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                        <li class="nav-item">
                            <div class="dropdown user-image">
                                <img id="user-menu" data-toggle="dropdown" src="../images/header-footer/user-img.png" alt="User">
                                <div class="dropdown-menu" aria-labelledby="user-menu">
                                    <a class="dropdown-item" href="user-profile.php">My Profile</a>
                                    <a class="dropdown-item" href="my-download.php">My Downloads</a>
                                    <a class="dropdown-item" href="my-sold-notes.php">My Sold Notes</a>
                                    <a class="dropdown-item" href="my-rejected-notes.php">My Rejected Notes</a>
                                    <a class="dropdown-item" href="change-password.php">Change Password</a>
                                    <a class="dropdown-item" href="../index.php" id="logout">Logout</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item loginNavTab"><a class="nav-link" href="../index.php">Logout</a></li>
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

    <!-- for removing default navbar overlay -->
    <br><br><br>

    <section id="dashboard">
        <div class="container">

            <!-- main heading  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 heading">
                    <h2>Buyers Request</h2>
                </div>
            </div>

            <!-- table  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table dashboard-table-long">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">BUYER</th>

                                        <th scope="col">PHONE .NO</th>
                                        <th scope="col">SELL TYPE</th>
                                        <th scope="col">PRICE</th>
                                        <!-- <th scope="col">Publisher</th>
                                        <th scope="col">Published Date</th> -->
                                        <th scope="col">DOWNLOADED DATE/TIME</th>
                                        <th scope="col">&emsp13;</th>
                                        <th scope="col">&emsp13;</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php

                                $count = 1 ;

                                while($bookRequests = mysqli_fetch_assoc($bookRequestsResult)){

                                    $buyerID = $bookRequests['Downloader'];

                                    $buyerQuery = " SELECT * FROM Users WHERE ID = $buyerID ";
                                    $buyerResult = mysqli_query($connection, $buyerQuery);
                                    $buyersDetail = mysqli_fetch_assoc($buyerResult);
                                    $buyerName = $buyersDetail['FirstName'] . " " . $buyersDetail['LastName'];
                                    $buyerEmailID = $buyersDetail['EmailID'];

                                    $buyerDetailQuery = " SELECT * FROM UserProfile WHERE UserID = $buyerID ";
                                    $buyerDetailResult = mysqli_query( $connection , $buyerDetailQuery );
                                    $buyerDetail = mysqli_fetch_assoc($buyerDetailResult);
                                    $contactNo = "+".$buyerDetail['PhonenNumberCountryCode']." ". $buyerDetail['PhoneNumber'];

                                    $paidOrFree = "";
                                    if($bookRequests['IsPaid']){
                                        $paidOrFree = "Paid";
                                    }
                                    if(!$bookRequests['IsPaid']){
                                        $paidOrFree = "Free";
                                    }
                                    

                                    echo '<tr>
                                            <td>'.$count.'</td>
                                            <td>'.$bookRequests['NoteTitle'].'</td>
                                            <td>'.$bookRequests['NoteCategory'].'</td>
                                            <td>'.$buyerEmailID.'</td>n
                                            <td>'.$contactNo.'</td>
                                            <td>'.$paidOrFree.'</td>
                                            <td>'.$bookRequests['PurchasedPrice'].'</td>
                                            <td>'.$bookRequests['CreatedDate'].'</td>
                                            <td><img src="../images/form/eye.png" alt="View"></td>
                                            <form action="buyers-request.php" method="post">
                                            <td class="dropup dropleft">
                                                <div data-toggle="dropdown">
                                                    <img src="../images/form/dots.png" id="row1" alt="Detail">
                                                </div>
                                                <div class="dropdown-menu" aria-labelledby="row1">
                                                    <button class="dropdown-item" name="received">Yes, I Received</button>
                                                </div>
                                            </td>
                                         </form>
                                    </tr>';

                                    $count++;

                                } 

                                ?>


                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>
            </div>


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

    <!-- data table  -->
    <script src="../js/data-table/jquery.dataTables.js"></script>

    <!-- custom js  -->
    <script src="../js/user/data-table.js"></script>
    <script src="../js/header/header.js"></script>


</body>

</html>

<?php

if (isset($_POST["received"])) {

    global $bookRequests ;

    $downloader = $bookRequests['Downloader'];
    $updateDownloadQuery = " UPDATE NotesDownloads SET IsSellerHasAllowedDownload = 1 WHERE Downloader = $downloader ";
    $updateDownloadResult = mysqli_query( $connection , $updateDownloadQuery );

    if($updateDownloadResult){
        echo "Allowed To Download";
    } else {
        echo "Not Allowed To Download";
    }

    // Get Support Email Address from systemConfiguration Table 
    $query = "SELECT Value FROM systemConfiguration WHERE KeyFields = 'SupportEmailAddress' ";
    $queryResult = mysqli_query($connection, $query);
    $supportField = mysqli_fetch_assoc($queryResult);
    $supportEmailAddress = $supportField['Value'];


    // Sending an Email
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
            $mail->setFrom($senderEmail, 'Notes MarkePlace');  //Sender Detail
            $mail->addAddress($buyerEmailID, $buyerName);  //Receiver Detail


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $sellerName . ' ' . 'Allows you to download a note';
            $mail->Body    =  'Hello' . ' ' . $buyerName . ',' . '<br>' .
                'We would like to inform you that, ' . $sellerName . ' Allows you to download a note.
                                  Please login and see My Download tabs to download particular note.' . '<br>' .
                'Regards,' . '<br>' .
                'Notes Marketplace';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            // $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    
}

?>