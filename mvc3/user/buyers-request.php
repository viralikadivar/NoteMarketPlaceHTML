<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
ob_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");
}

require "../db_connection.php";
global $connection;

$sellerID = $_SESSION['UserID'];
$sellerName = $_SESSION['UserName'];

$bookRequestsQuery = " SELECT * FROM NotesDownloads WHERE Seller = $sellerID and IsSellerHasAllowedDownload = 0 ";
$bookRequestsResult = mysqli_query($connection, $bookRequestsQuery);

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
    <link rel="stylesheet" href="../css/user/buyers-request.css?version=12534">

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

            <form action="buyers-request.php" method="post">
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
                                            <th scope="col" style="background:none">&emsp13;</th>
                                            <th scope="col" style="background:none">&emsp13;</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php

                                        $count = 1;

                                        while ($bookRequests = mysqli_fetch_assoc($bookRequestsResult)) {

                                            $downloadID = $bookRequests['ID'];
                                            $buyerID = $bookRequests['Downloader'];
                                            $bookID = $bookRequests['NoteID'];

                                            $buyerQuery = " SELECT * FROM Users WHERE ID = $buyerID ";
                                            $buyerResult = mysqli_query($connection, $buyerQuery);
                                            $buyersDetail = mysqli_fetch_assoc($buyerResult);
                                            $buyerEmailID = $buyersDetail['EmailID'];

                                            $buyerDetailQuery = " SELECT * FROM UserProfile WHERE UserID = $buyerID ";
                                            $buyerDetailResult = mysqli_query($connection, $buyerDetailQuery);
                                            $buyerDetail = mysqli_fetch_assoc($buyerDetailResult);
                                            $contactNo = "+" . $buyerDetail['PhonenNumberCountryCode'] . " " . $buyerDetail['PhoneNumber'];

                                            $paidOrFree = "";
                                            $priceDollar = 0;
                                            if ($bookRequests['IsPaid']) {
                                                $paidOrFree = "Paid";
                                                $priceINR = (int)$bookRequests['PurchasedPrice'];
                                                $priceINR = bcdiv($priceINR, 1, 2);
                                                $dollarRate = 72.67;
                                                $priceDollar = bcdiv($priceINR, $dollarRate, 2);
                                            }
                                            if (!$bookRequests['IsPaid']) {
                                                $paidOrFree = "Free";
                                            }

                                            $downloadedDate = $bookRequests['CreatedDate'];
                                            $dateTime = strtotime($downloadedDate);
                                            $downloadedDate = date("d M Y , H:i:s", $dateTime);

                                            echo '<tr class="table-row">
                                            <td>' . $count . '</td>
                                            <td class="view note-title">' . $bookRequests['NoteTitle'] . '</td>
                                            <td>' . $bookRequests['NoteCategory'] . '</td>
                                            <td class="buyer-email">' . $buyerEmailID . '</td>
                                            <td>' . $contactNo . '</td>
                                            <td>' . $paidOrFree . '</td>
                                            <td>$' . $priceDollar . '</td>
                                            <td>' .  $downloadedDate . '</td>
                                            <td><img class="view" src="../images/form/eye.png" alt="View"></td>
                                           
                                            <td class="dropup dropleft">
                                                <div data-toggle="dropdown">
                                                    <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                </div>
                                                <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                    <button class="dropdown-item" type="submit" name="received">Yes, I Received</button>
                                                </div>
                                            </td>
                                            <input type="hidden" class="downloadID" value="' . $downloadID . '">
                                            <input type="hidden" name="downloadID">
                                            <input type="hidden" name = "user-email">
                                            <input type="hidden" name="note-title">
                                            <input type="hidden" class="noteID" value="' . $bookID . '">
                                            <input type="hidden" name="noteID">
                                            <button type="submit" name="noteDetail" style="visibility:hidden"></button>
                                                        
                                         
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
            </form>

        </div>

    </section>

    <!-- Footer  -->
    <?php 
        include "../footer.php";
    ?>
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
    <script src="../js/header/header.js?version=54528451254"></script>
    <script src="../js/user/buyers-request.js?version=125112363351"></script>


</body>

</html>

<?php

if (isset($_POST['noteDetail'])) {
    $noteDetailID = (int)$_POST['noteID'];
    $_SESSION['noteID'] = $noteDetailID;
    header('Location:../notes-detail.php');
}

if(isset($_POST['received'])) {
   
    date_default_timezone_set('Asia/Kolkata');
    $downloadedDate = date("Y-m-d H:i:s");

    $userEmail = $_POST['user-email'];
    $bookName = $_POST['note-title'];
    $downloadID = $_POST['downloadID'];
    
    $updateDownloadQuery = " UPDATE NotesDownloads SET IsSellerHasAllowedDownload = 1 , AttachmentDownloadedDate = '$downloadedDate' WHERE ID = $downloadID ";
    $updateDownloadResult = mysqli_query($connection, $updateDownloadQuery);

    if ($updateDownloadResult) {

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

            $mail->send();

            header("refresh:0");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        die(mysqli_error($connection));
    }

}


ob_flush();
?>