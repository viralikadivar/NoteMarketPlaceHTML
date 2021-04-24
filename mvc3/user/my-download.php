<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
ob_start();
require "../db_connection.php";
global $connection;

session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");
}
$userEmail = $_SESSION['userEmail'];
$userID = $_SESSION['UserID'];

$myDownloadQuery = "SELECT * FROM NotesDownloads WHERE Downloader = $userID AND IsSellerHasAllowedDownload = 1";
$myDownloadResult = mysqli_query($connection, $myDownloadQuery);
  
?>
<!DOCTYPE html>
<html lang="en">

<head style="overflow-x:hidden">

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
    <link rel="stylesheet" href="../css/user/data-table.css?version=4562163">
    <link rel="stylesheet" href="../css/user/buyers-request.css">

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
                    <h2>My Downloads</h2>
                </div>
            </div>

            <form action="my-download.php" method="post">

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
                                            <th scope="col">SELLER</th>
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
                                        while ($myDownloads = mysqli_fetch_assoc($myDownloadResult)) {

                                            $priceDollar = 0;
                                            $freeOrPaid = "";
                                            if ($myDownloads['IsPaid'] == 1) {
                                                $freeOrPaid = "Paid";
                                                $priceINR = (int)$myDownloads['PurchasedPrice'] ;
                                                $priceINR = bcdiv($priceINR, 1, 2);
                                                $dollarRate = 72.67;
                                                $priceDollar = bcdiv($priceINR, $dollarRate, 2);
                                            } else {
                                                $freeOrPaid = "Free";
                                            }

                                            $sellerID = $myDownloads['Seller'];
                                            $getSellerDetail = "SELECT * FROM Users WHERE ID = $sellerID ";
                                            $getSellerResult = mysqli_query($connection, $getSellerDetail);
                                            $sellerDetail = mysqli_fetch_assoc($getSellerResult);
                                            $sellerEmail = $sellerDetail['EmailID'];


                                            $downloadedDate = $myDownloads['ModifiedDate'];
                                            $dateTime = strtotime($downloadedDate);
                                            $downloadedDate = date("d M Y , H:i:s", $dateTime);

                                            

                                            echo '  <tr class="table-row">
                                                    <td>' . $count . '</td>
                                                    <td class="title view">' . $myDownloads['NoteTitle'] . '</td>
                                                    <td>' . $myDownloads['NoteCategory'] . '</td>
                                                    <td class="sellerEmail">' . $sellerEmail . '</td>
                                                    <td>' . $freeOrPaid . '</td>
                                                    <td>$' . $priceDollar . '</td>
                                                    <td>' . $downloadedDate . '</td>
                                                    <td class="view"><img src="../images/form/eye.png" alt="View"></td>
                                                    <td class="dropup dropleft">
                                                        <div data-toggle="dropdown">
                                                            <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                        </div>
                                                        <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                            <button class="dropdown-item downloadNote" type="submit" name="download">Download Note</button>
                                                            <button class="dropdown-item giveRatings" type="button" name="review" data-toggle="modal" data-target="#remark">Add Reviews/Feedback</button>
                                                            <button class="dropdown-item reportSpam" type="button" name="report" data-toggle="modal" data-target="#spam">Report as Inappropriate</button>
                                                        </div>
                                                    </td>
                                                    <input type="hidden" class="downloadID" value="' . $myDownloads['ID'] . '">
                                                    <input type="hidden" class="noteID" value="' . $myDownloads['NoteID'] . '">
 

                                                    <input type="hidden" name="downloadID">
                                                    <input type="hidden" name="noteID">
                                                    <input type="hidden" name="noteTitle">
                                                    <input type="hidden" name="sellerEmail">

                                                    <button type="submit" name="noteDetail" style="visibility:hidden"></buttton>


                                                </tr>';

                                            $count++;
                                        }

                                        ?>
                                    </tbody>
                                </table>

                                <!-- Modal For Review -->
                                <div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="remarkLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header heading">
                                                <h4 class="modal-title" id="remarkLabel">Add Review</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><img src="../images/form/close.png" alt="close"></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="rating">
                                                    <img src="../images/form/rating/star-white.png" id="star1" alt="Star">
                                                    <img src="../images/form/rating/star-white.png" id="star2" alt="Star">
                                                    <img src="../images/form/rating/star-white.png" id="star3" alt="Star">
                                                    <img src="../images/form/rating/star-white.png" id="star4" alt="Star">
                                                    <img src="../images/form/rating/star-white.png" id="star5" alt="Star">
                                                </div>
                                                <textarea placeholder="Write remarks" name="comments" id="description"></textarea>
                                                <input type="hidden" name="rating">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit" class="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal For Spam Report -->
                                <div class="modal fade" id="spam" tabindex="-1" role="dialog" aria-labelledby="spamLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header heading">
                                                <h4 class="modal-title" id="spamLabel">Add Review</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><img src="../images/form/close.png" alt="close"></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="rating">
                                                    <p>Are you sure you want to mark this report as spam, you cannot update it later?</p>
                                                </div>
                                                <textarea placeholder="Write remarks" name="issue" id="description"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="report" style="color:#ffffff ; background-color:#6255a5">Submit</button>
                                                <button type="button" class="btn-sm" data-dismiss="modal" style="color:#ffffff ; background-color:red">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
    <script src="../js/header/header.js?version=4562163"></script>
    <script src="../js/user/my-downloads.js?version=1102310112104"></script>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    $ratingDownloadID = $_POST['downloadID'];
    $ratingNoteID = (int)$_POST['noteID'];

    $addRatingQuery = "INSERT INTO NotesReviews(NoteID ,ReviewedByID , AgainstDownloadsID ,Ratings,Comments,CreatedBy,ModifiedBy) VALUES($ratingNoteID,$userID,$ratingDownloadID,$rating,'$comments',$userID,$userID)";
    $addRating = mysqli_query($connection, $addRatingQuery);
    if ($addRating) {
        $getNoteRatingQuery = "SELECT * FROM NotesReviews WHERE NoteID = $ratingNoteID ";
        $getNoteRatingResult = mysqli_query($connection ,$getNoteRatingQuery);
        $totalRatingCount = 0 ;

        while($totalRating = mysqli_fetch_assoc($getNoteRatingResult)){
            $totalRatingCount = $totalRatingCount + (int)$totalRating['Ratings'];
        }

        $totalRatingsGiven = mysqli_num_rows($getNoteRatingResult);
        $avgBookRating = bcdiv($totalRatingCount,$totalRatingsGiven, 2);

        $updateRatingQuery = "UPDATE NotesDetails SET Ratings = $avgBookRating WHERE ID = $ratingNoteID ";
        $isRatingUpaded = mysqli_query($connection , $updateRatingQuery);
        
        if(!$isRatingUpaded){
            die(mysqli_error($connection));
        }

    } else {
        die(mysqli_error($connection));
    }
}
if (isset($_POST['report'])) {
    $issue = $_POST['issue'];
    $reportDownloadID = $_POST['downloadID'];
    $reportNoteID = (int)$_POST['noteID'];
    $noteTitle = $_POST['noteTitle'];
    $sellerEmailID = $_POST['sellerEmail'];

    $addReportQuery = "INSERT INTO ReportedIssues(NoteID ,ReportedByID , AgainstDownloadID ,Remarks,CreatedBy,ModifiedBy) VALUES($reportNoteID,$userID,$reportDownloadID ,'$issue',$userID,$userID)";
    $addReport = mysqli_query($connection, $addReportQuery);

    if ($addReport) {

        $query = "SELECT * FROM systemConfiguration WHERE KeyFields = 'SupportEmailAddress' ";
        $queryResult = mysqli_query($connection, $query);
        $supportField = mysqli_fetch_assoc($queryResult);
        $senderEmail = $supportField['Value'];

        $queryReceive = "SELECT * FROM systemConfiguration WHERE KeyFields = 'EmailAddressesForNotify' ";
        $queryResultReceive = mysqli_query($connection, $queryReceive);
        $supportFieldReceive = mysqli_fetch_assoc($queryResultReceive);
        $receiverEmail = $supportFieldReceive['Value'];

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
            $mail->Username   = $senderEmail;                     //SMTP username
            $mail->Password   = 'vira3333';                               //SMTP password

            // Sender And Receiver Detail 
            $mail->setFrom($senderEmail, 'Notes MarkePlace');  //Sender Detail
            $mail->addAddress($receiverEmail, 'Notes MarkePlace Reported Issue');  //Receiver Detail

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $userEmail.' '.'Reported an issue for'.' '.$noteTitle;
            $mail->Body    =  'Hello Admins,' . '<br>' .
                'We want to inform you that,'.' '.$userEmail.' '.
                'Reported an issue for'.' '.$sellerEmailID.'’s Note with title'.' '.$noteTitle.' '.
                '. Please look at the notes and take required actions.' . '<br>' .
                'Regards,' . '<br>' .
                'Notes Marketplace';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        die(mysqli_error($connection));
    }
    
}
if(isset($_POST['noteDetail'])){

    $noteDetailID = (int)$_POST['noteID'];
    $_SESSION['noteID'] = $noteDetailID;
    
    header('Location:../notes-detail.php');
}

if (isset($_POST['download'])) {
    $downloadNoteID = $_POST['noteID'];

    $getAttachmentPathQuery = "SELECT * FROM NotesAttachments WHERE NoteID = $downloadNoteID";
    $getAttachmentPathResult = mysqli_query($connection, $getAttachmentPathQuery);
    $attachments = array();
    while ($attachmentDetails = mysqli_fetch_assoc($getAttachmentPathResult)) {
        array_push($attachments, $attachmentDetails['FilePath']);
    }

    if (count($attachments) == 1) {
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($attachments[0]) . ".pdf");
        readfile($attachments[0]);
    } else {
        $zipname = 'notes.zip';
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
        foreach ($attachments as $file) {
            $zip->addFile($file);
        }
        $zip->close();

        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename=' . $zipname);
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);
    }
}
ob_flush();
?>