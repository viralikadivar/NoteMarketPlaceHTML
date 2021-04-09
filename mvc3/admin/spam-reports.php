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
    <link rel="stylesheet" href="../css/header-footer/admin-header.css">
    <link rel="stylesheet" href="../css/header-footer/admin-footer.css">

    <!-- datatable -->
    <link rel="stylesheet" href="../css/data-table/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/data-table.css?version=485301005">
    <link rel="stylesheet" href="../css/admin/spam-report.css?version=485301005">

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
    <br><br><br><br>

    <section id="dashboard">
        <div class="container">

            <!-- main heading  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 heading">
                    <h2>Spam Reports</h2>
                </div>
            </div>

            <form action="spam-reports.php" method="post">


                <!-- table  -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table dashboard-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">REPORTED BY</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">DATE ADDED</th>
                                        <th scope="col">REMARK</th>
                                        <th scope="col">ACTION</th>
                                        <th scope="col">&emsp13;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    function getUserName($id)
                                    {
                                        global $connection;
                                        $getUserNameQuery = "SELECT * FROM Users WHERE ID = $id ";
                                        $getUserNameResult = mysqli_query($connection, $getUserNameQuery);
                                        $userDetails = mysqli_fetch_assoc($getUserNameResult);
                                        $userFirstName = $userDetails['FirstName'];
                                        $usersLastName = $userDetails['LastName'];
                                        $usersFullName = $userFirstName  . ' ' . $usersLastName;
                                        return $usersFullName;
                                    }

                                    $getSpamReportsQuery =  "SELECT * FROM ReportedIssues";
                                    $getSpamReportsResult = mysqli_query($connection, $getSpamReportsQuery);
                                    if ($getSpamReportsResult) {
                                        $count = 1;
                                        while ($spamReports = mysqli_fetch_assoc($getSpamReportsResult)) {

                                            $reportID = $spamReports['ID'];

                                            // Reported By 
                                            $reporterID = $spamReports['ReportedByID'];
                                            $reporterName = getUserName($reporterID);

                                            // Note title 
                                            $bookID = $spamReports['NoteID'];
                                            $getReportedNotesQuery = "SELECT * FROM NotesDetails WHERE ID = $bookID AND IsActive = 1 ";
                                            $getReportedNotesResult = mysqli_query($connection, $getReportedNotesQuery);

                                            $bookDetail =  mysqli_fetch_assoc($getReportedNotesResult);
                                            $noteTitle = $bookDetail['Title'];


                                            // Category Name 
                                            $bookCategoryID = $bookDetail['Category'];
                                            $getCategoryNameQuery = "SELECT * FROM NoteCategories WHERE ID = $bookCategoryID ";
                                            $getCategoryNameResult = mysqli_query($connection, $getCategoryNameQuery);
                                            $categoryDetails = mysqli_fetch_assoc($getCategoryNameResult);
                                            $categoryName = $categoryDetails['Name'];

                                            // Date Addded 
                                            $dateAdded = $spamReports['CreatedDate'];
                                            $dateAdded = strtotime($dateAdded);
                                            $dateAdded = date("d-m-Y,H:i", $dateAdded);

                                            // Remarks 
                                            $remarks = $spamReports['Remarks'];


                                            echo '<tr class="table-row">
                                                        <td>' . $count . '</td>
                                                        <td>' . $reporterName . '</td>
                                                        <td class="noteTitle">' . $noteTitle . '</td>
                                                        <td>' . $categoryName . '</td>
                                                        <td>' . $dateAdded . '</td>
                                                        <td>' . $remarks . '</td>
                                                        <td class="delete-report" name="unpublish" data-toggle="modal" data-target="#deleteReport"><img src="../images/form/delete.png" alt="Delete"></td>
                                                        <td class="dropup dropleft">
                                                            <div data-toggle="dropdown">
                                                                <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                            </div>
                                                            <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                                <button type="submit" class="dropdown-item"  name="download">Download Notes</button>
                                                                <button type="submit" class="dropdown-item" name="noteDetail">View More Details</button>
                                                            </div>
                                                        </td>
                                                        <input type = "hidden" name="givenNoteID" class="noteID" value="' . $bookID . '">
                                                        <input type = "hidden" name="noteID">

                                                        <button type="submit" name="noteDetail" style="display:none"></button>

                                                        <input type = "hidden" name="givenReportID" class="reportID" value="' . $reportID . '">
                                                        <input type = "hidden" name="reportID">

                                                    </tr>';
                                            $count++;
                                        }
                                    }

                                    ?>

                                </tbody>
                            </table>
                            <!-- Modal For Unpublish Book -->
                            <div class="modal fade" id="deleteReport" tabindex="-1" role="dialog" aria-labelledby="unpublisBbookTitle" aria-hidden="true">
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
                                                <p>Are you sure you want to delete reported issue?</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="deleteReport" style="color:#ffffff ; background-color:red">YES</button>
                                            <button type="button" class="btn-sm" data-dismiss="modal" style="color:#ffffff ; background-color:grey">NO</button>
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
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- data table  -->
    <script src="../js/data-table/jquery.dataTables.js"></script>

    <!-- custom js  -->
    <script src="../js/admin/spam-reports.js?version=5412321"></script>
    <script src="../js/header/header.js"></script>

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

if (isset($_POST['deleteReport'])) {

    $reportID = (int)$_POST['reportID'];

    $deleteReportQuery = "DELETE FROM ReportedIssues WHERE ID = $reportID ";
    $deleteReportResult = mysqli_query($connection,$deleteReportQuery);
    
}
ob_end_flush();
?>