<?php
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
    <link rel="stylesheet" href="../css/header-footer/admin-header.css?version=1525025">
    <link rel="stylesheet" href="../css/header-footer/admin-footer.css">

    <!-- datatable -->
    <link rel="stylesheet" href="../css/data-table/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/data-table.css">
    <link rel="stylesheet" href="../css/admin/notes-under-review.css?version=1012521455">

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
                    <h2>Notes Under Review</h2>
                </div>
            </div>

            <div class="row" style="background:transparent;">

                <div class="col-lg-3 col-md-2 col-sm-2 sellerDropdownName">
                    <?php
                    $getSellerIDQuery = "SELECT DISTINCT SellerID FROM NotesDetails WHERE Status = 7 OR Status = 8 AND  IsActive = 1";
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

            <form action="notes-under-review.php" method="post">
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
                                        <th scope="col">SELLER</th>
                                        <th scope="col">DATE ADDED</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">ACTION</th>


                                        <th scope="col">&emsp13;</th>
                                    </tr>
                                </thead>

                                <tbody id="table-body"> 
                                    <?php

                                    $getInReviewNotesQuery = "SELECT * FROM NotesDetails WHERE Status = 7 OR Status = 8 AND IsActive = 1 ";
                                    $getInReviewNotesResult = mysqli_query($connection, $getInReviewNotesQuery);
                                    $count = 1;

                                    while ($inProgressBook = mysqli_fetch_assoc($getInReviewNotesResult)) {

                                        $inProgressID = $inProgressBook['ID'];

                                        $addedDate = $inProgressBook['CreatedDate'];
                                        $addedDate = strtotime($addedDate);
                                        $addedDate = date('d-m-Y,H:i', $addedDate);

                                        $inProgressTitle = $inProgressBook['Title'];

                                        $categoryID = $inProgressBook['Category'];
                                        $queryCategories = "SELECT * FROM NoteCategories WHERE ID = $categoryID ";
                                        $noteCategoriesResult = mysqli_query($connection, $queryCategories);
                                        $noteCategories = mysqli_fetch_assoc($noteCategoriesResult);
                                        $category = $noteCategories['Name'];

                                        $bookStatusID = $inProgressBook['Status'];
                                        $bookStatusQuery = "SELECT * FROM ReferenceData WHERE RefCategory = 'Notes Status' AND ID = $bookStatusID ";
                                        $bookStatusResult = mysqli_query($connection, $bookStatusQuery);
                                        $bookStatusDetail = mysqli_fetch_assoc($bookStatusResult);
                                        $bookStatus = $bookStatusDetail['Value'];

                                        // Book Seller 
                                        $publisher = $inProgressBook['SellerID'];
                                        $getPublisherNameQuery = "SELECT * FROM Users WHERE ID = $publisher ";
                                        $getPublisherNameResult = mysqli_query($connection, $getPublisherNameQuery);
                                        $publisherDetail = mysqli_fetch_assoc($getPublisherNameResult);
                                        $publisherFirstName = $publisherDetail['FirstName'];
                                        $publisherLastName = $publisherDetail['LastName'];
                                        $publisherName = $publisherFirstName . ' ' . $publisherLastName;
                                        $bookSellerEmail = $publisherDetail['EmailID'];


                                        echo '<tr class="table-row">
                                        <td>' . $count . '</td>
                                        <td class="noteTitle">' . $inProgressTitle . '</td>
                                        <td>' . $category . '</td>
    
                                        <td>' . $publisherName . '</td>
                                        <td>' . $addedDate . '</td>
                                        <td>' . $bookStatus . '</td>
                                        <td> <button type="button" name="isApprove" class="approve" data-toggle="modal" data-target="#approve">Approve</button> 
                                             <button type="button" name="isReject" class="reject" data-toggle="modal" data-target="#remark">Reject</button>
                                             <button type="button" name="isInReview" class="inrerview" data-toggle="modal" data-target="#review">InReview</button></td>
    
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                <button type="submit" name="noteDetail" class="dropdown-item">View More Details</button>
                                                <button type="submit" name="download" class="dropdown-item">Download Notes</button>
                                            </div>
                                        </td>

                                        <input type = "hidden" name="givenNoteID" class="noteID" value="' . $inProgressID . '">
                                        <input type = "hidden" name="noteID">

                                    </tr>';



                                        $count++;
                                    }
                                    if (!$getInReviewNotesResult) {
                                        die(mysqli_error($connection));
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                        <!-- popup  -->

                        <!-- Modal for Book Rejection -->
                        <div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="remarkLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header heading">
                                        <h3 class="modal-title" id="remarkLabel"></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><img src="../images/form/close.png" alt="close"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Remarks</label><br>
                                        <textarea placeholder="Write remarks" name="comments" id="description"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="reject" class="reject">Reject</button>
                                        <button type="button" class="inrerview" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Book Approve -->
                        <div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="approveLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header heading">
                                        <h3 class="modal-title" id="approveLabel"></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><img src="../images/form/close.png" alt="close"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>If you approve the notes – System will publish the notes over portal. Please press yes to continue.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="publish" class="reject" style="background-color:#6255a5">Yes</button>
                                        <button type="button" class="inrerview" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for In review -->
                        <div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="reviewLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header heading">
                                        <h3 class="modal-title" id="reviewLabel"></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><img src="../images/form/close.png" alt="close"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Via marking the note In Review – System will let user know that review process has been initiated. Please press yes to continue.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="inReview" class="reject" style="background-color:#6255a5">Yes</button>
                                        <button type="button" class="inrerview" data-dismiss="modal">No</button>
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
    <script src="../js/header/header.js?version=787202725946"></script>
    <script src="../js/admin/notes-under-review.js?version=7872027225946"></script>

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
        header('Content-Type: octet-stream.pdf');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=" . basename($attachments[0]) . ".pdf");
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
 
if (isset($_POST['reject'])) {
// 10 
    $rejectID = (int)$_POST['noteID'];
    $remark  = $_POST['comments'];

    $rejectQuery = "UPDATE NotesDetails SET Status = 10 ,ActionedBy = $userID ,AdminRemarks='$remark' ,ModifiedBy = $userID WHERE ID = $rejectID ";
    $rejectResult = mysqli_query($connection,$rejectQuery);
    if($rejectResult){
        header("refresh:0");
    } else {
        die(mysqli_error($connection));
    }
    
}

if (isset($_POST['publish'])) {
// 9
    $publishID = (int)$_POST['noteID'];
    $publishQuery = "UPDATE NotesDetails SET Status = 9 ,ActionedBy = $userID  ,ModifiedBy = $userID WHERE ID = $publishID  ";
    $publishResult = mysqli_query($connection,$publishQuery);
    if($publishResult){
        header("refresh:0");
    } else {
        die(mysqli_error($connection));
    }
    
}

if (isset($_POST['inReview'])) {
// 8 
    $inReviewID = (int)$_POST['noteID'];
    $inReviewQuery = "UPDATE NotesDetails SET Status = 8 ,ActionedBy = $userID  ,ModifiedBy = $userID WHERE ID = $inReviewID ";
    $inReviewResult = mysqli_query($connection,$inReviewQuery);
    if($inReviewResult){
        header("refresh:0");
    } else {
        die(mysqli_error($connection));
    }
    
}

ob_flush();
?>