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
    <link rel="shortcut icon" href="../images/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="../css/fonts/fonts.css">

    <!-- ================================================
                        CSS Files 
    ================================================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

    <!-- Header footer CSS -->
    <link rel="stylesheet" href="../css/header-footer/admin-header.css?version=1512051120">
    <link rel="stylesheet" href="../css/header-footer/admin-footer.css">

    <!-- datatable -->
    <link rel="stylesheet" href="../css/data-table/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/data-table.css">
    <link rel="stylesheet" href="../css/admin/published-notes.css?version=1522011215">

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
                    <h2>Published Notes</h2>
                </div>
            </div>

            <div class="row" style="background:transparent;">

                <div class="col-lg-3 col-md-2 col-sm-2 sellerDropdownName">
                    <?php
                    $getSellerIDQuery = "SELECT DISTINCT SellerID FROM NotesDetails WHERE IsActive = 1 AND Status = 9";
                    $getSellerIDResult = mysqli_query($connection, $getSellerIDQuery);
                    ?>
                    <label>Seller</label>
                    <div class="dropdown">
                        <button class="form-control select-field" id="seller" data-toggle="dropdown">
                            Seller<img src="../images/form/arrow-down.png" alt="Down">
                        </button>
                        <ul class="dropdown-menu sellerName" aria-labelledby="seller">
                            <?php
                            while ($SellerID =  mysqli_fetch_assoc($getSellerIDResult)) {
                                $ID =  $SellerID['SellerID'];
                                $getSellerNameQuery = "SELECT * FROM Users WHERE ID = $ID ";
                                $getSellerrNameResult = mysqli_query($connection, $getSellerNameQuery);
                                $sellerDetails = mysqli_fetch_assoc($getSellerrNameResult);
                                $sellerFirstName = $sellerDetails['FirstName'];
                                $sellerLastName = $sellerDetails['LastName'];
                                $sellerName = $sellerFirstName . ' ' . $sellerLastName;

                                echo '<li class="dropdown-item" value="' . $ID . '">' . $sellerName  . '</li>';
                            }
                            ?>

                        </ul>
                    </div>

                </div>

            </div>

            <form action="published-notes.php" method="post">
                <!-- table  -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="table-responsive">
                            <table class="table dashboard-table">

                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>

                                        <th scope="col">SELL TYPE</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">SELLER</th>
                                        <th scope="col">&emsp13;</th>
                                        <th scope="col">PUBLISHED DATE</th>
                                        <th scope="col">APPROVED BY</th>

                                        <th scope="col">NUMBER OF DOWNLOADEDS </th>
                                        <th scope="col">&emsp13;</th>
                                    </tr>
                                </thead>

                                <tbody id="table-body">

                                    <?php

                                    $getPublishedNotesQuery = "SELECT * FROM NotesDetails WHERE Status = 9 AND IsActive = 1 ";
                                    $getPublishedNotesResult = mysqli_query($connection, $getPublishedNotesQuery);

                                    if ($getPublishedNotesResult) {

                                        $count = 1;

                                        while ($publishedNotes = mysqli_fetch_assoc($getPublishedNotesResult)) {

                                            $bookID = $publishedNotes['ID'];
                                            $bookTitle = $publishedNotes['Title'];
                                            $bookCategoryID = $publishedNotes['Category'];
                                            $publisher = $publishedNotes['SellerID'];
                                            $approvedBy = $publishedNotes['ActionedBy'];
                                            $publishedDate = $publishedNotes['PublishedDate'];
                                            $noOfDownloads =  0;

                                            // For Category 
                                            $getCategoryNameQuery = "SELECT * FROM NoteCategories WHERE ID = $bookCategoryID ";
                                            $getCategoryNameResult = mysqli_query($connection, $getCategoryNameQuery);
                                            $categoryDetails = mysqli_fetch_assoc($getCategoryNameResult);
                                            $categoryName = $categoryDetails['Name'];

                                            // For file size 
                                            $attachmentFileSize  = "";
                                            $attachmentSize = 0;

                                            $getAttachmentPath = "SELECT * FROM NotesAttachments WHERE NoteID = $bookID ";
                                            $getAttachmentPathResult =  mysqli_query($connection, $getAttachmentPath);
                                            while ($attachmentPath = mysqli_fetch_assoc($getAttachmentPathResult)) {
                                                $filePath = $attachmentPath['FilePath'];
                                                $attachmentSize = $attachmentSize + filesize($filePath);
                                            }

                                            $attachmentSizeInKB = $attachmentSize / 1024;
                                            $attachmentSizeInMB = $attachmentSizeInKB / 1024;

                                            $attachmentSizeInKB = ceil($attachmentSizeInKB);
                                            $attachmentSizeInMB = ceil($attachmentSizeInMB);

                                            if ($attachmentSizeInKB >= 1024) {
                                                $attachmentFileSize = $attachmentSizeInMB . 'MB';
                                            } else {
                                                $attachmentFileSize = $attachmentSizeInKB . 'KB';
                                            }

                                            // For paid or free
                                            $sellType = $publishedNotes['IsPaid'];
                                            $priceDollar = 0;
                                            $freeOrPaid = "Free";
                                            if ($sellType == 4) {
                                                $freeOrPaid = "Paid";
                                                $priceINR = (int)$publishedNotes['SellingPrice'];
                                                $priceINR = bcdiv($priceINR, 1, 2);
                                                $dollarRate = 72.67;
                                                $priceDollar = bcdiv($priceINR, $dollarRate, 2);
                                            }

                                            // For Publisher Name
                                            $getPublisherNameQuery = "SELECT * FROM Users WHERE ID = $publisher ";
                                            $getPublisherNameResult = mysqli_query($connection, $getPublisherNameQuery);
                                            $publisherDetail = mysqli_fetch_assoc($getPublisherNameResult);
                                            $publisherFirstName = $publisherDetail['FirstName'];
                                            $publisherLastName = $publisherDetail['LastName'];
                                            $publisherName = $publisherFirstName . ' ' . $publisherLastName;
                                            $bookSeller = $publisherDetail['EmailID'];

                                            // For Published Date
                                            $publishedDate = strtotime($publishedDate);
                                            $publishedDate = date("d-m-Y,h:i", $publishedDate);

                                            // Approved Date 
                                            $getApproverNameQuery = "SELECT * FROM Users WHERE ID = $approvedBy";
                                            $getApproverNameResult = mysqli_query($connection, $getApproverNameQuery);
                                            $approverDetail = mysqli_fetch_assoc($getApproverNameResult);
                                            $approverFirstName = $approverDetail['FirstName'];
                                            $approverLastName = $approverDetail['LastName'];
                                            $approverName = $approverFirstName . ' ' . $approverLastName;

                                            // For Number of Downloads 
                                            $noOfDownloads =  0;
                                            $noOfDownloadsQuery = "SELECT * FROM NotesDownloads WHERE NoteID = $bookID AND IsAttachmentDownloaded = 1";
                                            $noOfDownloadsResult = mysqli_query($connection, $noOfDownloadsQuery);
                                            if ($noOfDownloadsResult) {
                                                $noOfDownloads = mysqli_num_rows($noOfDownloadsResult);
                                            }

                                            echo '<tr class="table-row">
                                            <td>' . $count . '</td>
                                            <td class="noteTitle">' . $bookTitle . '</td>
                                            <td>' . $categoryName . '</td>
                                            <td>' . $freeOrPaid . '</td>
                                            <td>$' . $priceDollar . '</td>
                                            <td>' . $publisherName . '</td>
                                            <td><img class="view-seller" src="../images/form/eye.png" alt="Detail"></td>
                                            <td>' . $publishedDate . '</td>
                                            <td>' . $approverName . '</td>
                                            <td class="noOfDownloads">' . $noOfDownloads . '</td>
                                            <td class="dropup dropleft">
                                                <div data-toggle="dropdown">
                                                    <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                </div>
                                                <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                    <button type="submit" class="dropdown-item"  name="download">Download Notes</button>
                                                    <button type="submit" class="dropdown-item" name="noteDetail">View More Details</button>
                                                    <button type="button" name="unpublish" class="dropdown-item"  data-toggle="modal" data-target="#unpublishNote">Unpublish</button>
                                                </div>
                                            </td>

                                            <input type = "hidden" name="givenNoteID" class="noteID" value="' . $bookID . '">
                                            <input type = "hidden" name="noteID">

                                            <input type = "hidden" name="noteTitle">
                                            <input type = "hidden" name="sellerName">

                                            <input type = "hidden" name="givenSellerEmail" class="noteSeller" value="' . $bookSeller . '">
                                            <input type = "hidden" name="sellerEmail">

                                            <button type="submit" name="getNoOfDownloads" style="display:none">Unpublish</button>

                                                <input type = "hidden"  class="seller" value="' . $publisher . '">
                                                <input type = "hidden" name="memberID">
                                                <button type="submit" name="viewMember" style="display:none;">

                                        </tr>';
                                            $count++;
                                        }
                                    }

                                    ?>

                                </tbody>
                            </table>
                            <!-- Modal For Unpublish Book -->
                            <div class="modal fade" id="unpublishNote" tabindex="-1" role="dialog" aria-labelledby="unpublisBbookTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header heading">
                                            <h4 class="modal-title" id="unpublisBbookTitle">

                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><img src="../images/form/close.png" alt="close"></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="rating">
                                                <p>Are you sure you want to Unpublish this note?</p>
                                            </div>
                                            <textarea placeholder="Write remarks" name="remark" id="description"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="unpublishNote" style="color:#ffffff ; background-color:red">Unpublish</button>
                                            <button type="button" class="btn-sm" data-dismiss="modal" style="color:#ffffff ; background-color:grey">Close</button>
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
    <script src="../js/header/header.js?version=45145148"></script>
    <script src="../js/admin/published-notes.js?version=2548122282121"></script>

</body>

</html>
<?php

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

if (isset($_POST['noteDetail'])) {

    $noteDetailID = (int)$_POST['noteID'];
    $_SESSION['noteID'] = $noteDetailID;

    header('Location:../notes-detail.php');
}

if (isset($_POST['unpublishNote'])) {
    $unpublishNoteID = $_POST['noteID'];
    $noteTitle = $_POST['noteTitle'];
    $remark = $_POST['remark'];
    $sellerName = $_POST['sellerName'];
    $sellerEmailID = $_POST['sellerEmail'];

    // Unpublish Note 
    $updateNoteDetailsQuery = "UPDATE NotesDetails SET AdminRemarks = '$remark' , ActionedBy = $userID , Status = 11 , IsActive = 0 WHERE ID = $unpublishNoteID ";
    $updateNoteDetailsResult =  mysqli_query($connection, $updateNoteDetailsQuery);
    if ($updateNoteDetailsResult) {

        $query = "SELECT * FROM systemConfiguration WHERE KeyFields = 'SupportEmailAddress' ";
        $queryResult = mysqli_query($connection, $query);
        $supportField = mysqli_fetch_assoc($queryResult);
        $senderEmail = $supportField['Value'];

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
            $mail->addAddress($sellerEmailID, 'Notes MarkePlace Reported Issue');  //Receiver Detail

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Sorry! We need to remove your notes from our portal.';
            $mail->Body    = 'Hello' . ' ' . $sellerName . ',' . '<br>' .
                'We want to inform you that, your note "' . $noteTitle . '" has been removed from the portal.' . '<br>' .
                'Please find our remarks as below -' . '<br>' .
                '"' . $remark . '"' . '<br>' .
                'Regards,' . '<br>' .
                'Notes Marketplace';

            $mail->send();
            header("refresh:0");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        die(mysqli_error($connection));
    }
}

if (isset($_POST['getNoOfDownloads'])) {

    $getNoOfDownloadsNoteID = $_POST['noteID'];
    // $_SESSION['downloadNoteID'] = $getNoOfDownloadsNoteID;

    header("Location:downloaded-notes.php");
}
if (isset($_POST['viewMember'])) {

    $memberID = (int)$_POST['memberID'];
    $_SESSION['MemberID'] = $memberID;
    header("Location:member-detail.php");
}

ob_flush();
?>