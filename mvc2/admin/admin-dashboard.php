<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
ob_start();
if(!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");  
}
$userID = $_SESSION['UserID'];

require "../db_connection.php";
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
    <link rel="shortcut icon" href="../images/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="../css/fonts/fonts.css">

    <!-- ================================================
                        CSS Files 
    ================================================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

    <!-- Header footer CSS -->
    <link rel="stylesheet" href="../css/header-footer/admin-header.css?version=4181789">
    <link rel="stylesheet" href="../css/header-footer/admin-footer.css">

    <!-- datatable -->
    <link rel="stylesheet" href="../css/data-table/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/data-table.css?version=441225">
    <link rel="stylesheet" href="../css/admin/admin-dashboard.css?version=441191811">

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
    <br><br>

    <section id="dashboard">
        <div class="container">

            <!-- main heading  -->
            <div class="row dashboard-field">
                <div class="col-lg-12 col-md-12 col-sm-12 heading">
                    <h2>Dashboard</h2>
                </div>
            </div>

            <!-- Get Current Date  -->
            <?php
            date_default_timezone_set("Asia/Kolkata");
            $dateTime = new DateTime();
            $dateTime->modify('-7 day');
            $currentTimeStamp = $dateTime->getTimestamp();

            $crrentDate = date("Y-m-d h:i:s", $currentTimeStamp);

            ?>

            <div class="row text-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="info-wrapper heading">
                        <?php
                        $getNotesInReviewQuery = "SELECT * FROM NotesDetails WHERE Status = 8 ";
                        $getNotesInReviewResult = mysqli_query($connection, $getNotesInReviewQuery);
                        $noOfNotesInReview =  0;
                        if ($getNotesInReviewResult) {
                            $noOfNotesInReview = mysqli_num_rows($getNotesInReviewResult);
                        }
                        ?>
                        <h3><a href="notes-under-review.php"><?php echo $noOfNotesInReview;  ?></a></h3>
                        <p>Number of Notes in Review for Publish</p>
                    </div>
                </div>
                <!-- >= DATEADD(day,-7, GETDATE())  -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="info-wrapper heading">
                        <?php
                        $getNoOfNotesDownloadsQuery = "SELECT * FROM NotesDownloads WHERE IsActive = 1 AND 	CreatedDate >= '$crrentDate'";
                        $getNoOfNotesDownloadsResult = mysqli_query($connection, $getNoOfNotesDownloadsQuery);
                        $noOfNotesDownloads =  0;
                        if ($getNoOfNotesDownloadsResult) {
                            $noOfNotesDownloads = mysqli_num_rows($getNoOfNotesDownloadsResult);
                        }
                        ?>
                        <h3><a href="downloaded-notes.php"><?php echo $noOfNotesDownloads; ?></a></h3>
                        <p>Number of New Notes Downloaded <br> (Last 7 Days)</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="info-wrapper heading">
                        <?php
                        $getNoOfUserQuery = "SELECT * FROM Users WHERE IsActive = 1 AND CreatedDate >= '$crrentDate'";
                        $getNoOfUserResult = mysqli_query($connection, $getNoOfUserQuery);
                        $noOfUser =  0;
                        if ($getNoOfUserResult) {
                            $noOfUser = mysqli_num_rows($getNoOfUserResult);
                        }
                        ?>
                        <h3><a href="members.php"><?php echo $noOfUser; ?></a></h3>
                        <p>Number of New Registrations <br> (Last 7 days)</p>
                    </div>
                </div>
            </div>

            <form action="admin-dashboard.php" method="post">
                <!-- inprogress notes  -->
                <div class="row table-data">

                    <div class="col-lg-12 col-md-12 col-sm-12 heading">
                        <h4>In Progress Notes</h4>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <!-- inprogress table -->
                        <div class="table-responsive">
                            <table class="table dashboard-table">

                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Attachment Size</th>
                                        <th scope="col">Sell Type</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Publisher</th>
                                        <th scope="col">Published Date</th>
                                        <th scope="col">Number of Downloads</th>
                                        <th scope="col">&emsp13;</th>
                                    </tr>
                                </thead>

                                <tbody>

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

                                            // For Number of Downloads 
                                            $noOfDownloads =  0;
                                            $noOfDownloadsQuery = "SELECT * FROM NotesDownloads WHERE NoteID = $bookID AND IsAttachmentDownloaded = 1";
                                            $noOfDownloadsResult = mysqli_query($connection, $noOfDownloadsQuery);
                                            if ($noOfDownloadsResult) {
                                                $noOfDownloads = mysqli_num_rows($noOfDownloadsResult);
                                            }


                                            echo    '<tr class="table-row">
                                                            <td>' . $count . '</td>
                                                            <td class="noteTitle">' . $bookTitle . '</td>
                                                            <td>' . $categoryName . '</td>
                                                            <td>' . $attachmentFileSize . '</td>
                                                            <td>' . $freeOrPaid . '</td>
                                                            <td>$' . $priceDollar . '</td>
                                                            <td class="sellerName">' . $publisherName . '</td>
                                                            <td>' . $publishedDate . '</td>
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
                                                <p>Are you sure you want to Unpublish this note?”</p>
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

    </section>

    <!-- Footer  -->
    <footer id="footer">
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
    </footer>
    <!-- Footer Ends -->

    <!-- ================================================
                        JS Files 
    ================================================= -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- data table  -->
    <script src="../js/data-table/jquery.dataTables.js"></script>

    <!-- custom js  -->
    <script src="../js/header/header.js"></script>
    <script src="../js/admin/admin-dashboard.js?version=84251245"></script>

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
    $updateNoteDetailsResult =  mysqli_query($connection,$updateNoteDetailsQuery);
    if($updateNoteDetailsResult) {

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
                $mail->Body    = 'Hello'.' '.$sellerName.',' . '<br>' .
                'We want to inform you that, your note "'.$noteTitle.'" has been removed from the portal.'. '<br>' .
                'Please find our remarks as below -'. '<br>' .
                '"'.$remark.'"'. '<br>' .
                'Regards,' . '<br>' .
                'Notes Marketplace';
                
                $mail->send();

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        
    } else {
        die(mysqli_error($connection));
    }

}

if(isset($_POST['getNoOfDownloads'])) {

    $getNoOfDownloadsNoteID = $_POST['noteID'];
    $_SESSION['noteID'] = $getNoOfDownloadsNoteID;

    header("Location:downloaded-notes.php");
}
ob_end_flush();
?>