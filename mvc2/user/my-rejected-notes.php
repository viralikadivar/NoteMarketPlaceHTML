<?php
ob_start();
require "../db_connection.php";
global $connection;

session_start();
$userEmail = $_SESSION['userEmail'];
$userID = $_SESSION['UserID'];

$rejectedNotesQuery = "SELECT * FROM NotesDetails WHERE SellerID = $userID AND Status = 10 ";
$rejecteddNotesResult = mysqli_query($connection, $rejectedNotesQuery);

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
                    <h2>My Rejected Notes</h2>
                </div>
            </div>

            <form action="my-rejected-notes.php" method="post">

                <!-- table  -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table dashboard-table-long">

                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">REMARKS</th>
                                        <th scope="col">CLONE</th>
                                        <th>&emsp13;</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $count = 1;
                                    while ($rejectedNotes = mysqli_fetch_assoc($rejecteddNotesResult)) {

                                        $categoryID = $rejectedNotes['Category'];
                                        $getCategory = mysqli_query($connection, "SELECT * FROM NoteCategories WHERE ID =  $categoryID ");
                                        $getCategoryResult = mysqli_fetch_assoc($getCategory);
                                        $category = $getCategoryResult['Name'];

                                        echo '  <tr class="table-row">
                                                    <td>' . $count . '</td>
                                                    <td class="view">' . $rejectedNotes['Title'] . '</td>
                                                    <td>' . $category . '</td>
                                                    <td>' . $rejectedNotes['AdminRemarks'] . '</td>
                                                    <td class="clone">Clone</td>
                                                    <td class="dropup dropleft">
                                                    <div data-toggle="dropdown">
                                                    <img src="../images/form/dots.png" id="row1" alt="Detail">
                                                    </div>
                                                    <div class="dropdown-menu" aria-labelledby="row1">
                                                    <a class="dropdown-item" href="#">Download Note</a>
                                                    </div>
                                                    </td>

                                                    <input type="hidden" class="noteID" value="' . $rejectedNotes['ID'] . '">
                                                    <input type="hidden" name="noteID">
                                                    <button type="submit" name="noteDetail" style="visibility:hidden"></buttton>

                                                    <button type="submit" name="noteCloning" style="visibility:hidden"></buttton>


                                            </tr>';

                                        $count++;
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>


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
    <script src="../js/user/my-downloads.js?version=54504"></script>


</body>

</html>
<?php

if (isset($_POST['noteDetail'])) {
    $noteDetailID = (int)$_POST['noteID'];
    $_SESSION['noteID'] = $noteDetailID;
    header('Location:../notes-detail.php');
}

if (isset($_POST['noteCloning'])) {

    $cloningNoteID = (int)$_POST['noteID'];

    $cloneNoteQuery = "INSERT INTO NotesDetails( SellerID , Status , Title , Category , NoteType , NumberofPages 
    , Description , UniversityName , Country , Course , CourseCode , Professor , IsPaid , SellingPrice , CreatedBy	,
     ModifiedBy) SELECT SellerID , Status , Title , Category , NoteType , NumberofPages , Description , UniversityName 
     , Country , Course , CourseCode , Professor , IsPaid , SellingPrice , CreatedBy	, ModifiedBy FROM NotesDetails
      WHERE ID = $cloningNoteID ";

    $cloneNoteResult = mysqli_query($connection, $cloneNoteQuery);

    if ($cloneNoteResult) {

        $dateTime  = new DateTime();
        $timeStamp = $dateTime->getTimestamp();

        $addedNote = mysqli_insert_id($connection);

        $pathToCreateNoteFolder = "../members/" . $userID  . "/" . $addedNote . "/";
        mkdir($pathToCreateNoteFolder, $mode = 0777, $recursive = false, $context = null);
        $FolderNotesAttachments = $pathToCreateNoteFolder . "Attachements/";
        mkdir($FolderNotesAttachments, $mode = 0777, $recursive = false, $context = null);

        $getPreviewPath = "SELECT DisplayPicture , NotesPreview FROM NotesDetails WHERE ID = $cloningNoteID ";
        $getPreviewResult = mysqli_query($connection, $getPreviewPath);
        $previewDetail =  mysqli_fetch_assoc($getPreviewResult);
        $previewPath = $previewDetail['NotesPreview'];
        $dpPath = $previewDetail['DisplayPicture'];

        $newPreviewPath = $pathToCreateNoteFolder . 'Preview_' . $timeStamp;
        $newDpPath = $pathToCreateNoteFolder . 'DP_' . $timeStamp;

        $isPreviewCopied =  copy($previewPath, $newPreviewPath);
        $isDpCopied = copy($dpPath, $newDpPath);

        if ($isPreviewCopied && $isDpCopied) {
            $updatePreviewPathQuery = "UPDATE NotesDetails SET NotesPreview = '$newPreviewPath' , DisplayPicture = '$newDpPath', Status = 6 WHERE ID = $addedNote ";
            $updatePreviewPathResult = mysqli_query($connection, $updatePreviewPathQuery);
            if (!$updatePreviewPathResult) {
                die(mysqli_error($connection));
            }
        }

        $getNotesAttachQuery = "SELECT * FROM NotesAttachments WHERE NoteID = $cloningNoteID ";
        $getNotesAttachResult = mysqli_query($connection, $getNotesAttachQuery);

        while ($notesAttachments = mysqli_fetch_assoc($getNotesAttachResult)) {

            $result = mysqli_query($connection, "SELECT MAX(ID) FROM NotesAttachments ");
            $row = mysqli_fetch_row($result);
            $highest_id = $row[0];
            $currentID = (int)$highest_id + 1;

            $noteAttachPath = $notesAttachments['FilePath'];
            $fileName = $notesAttachments['FileName'];

            $noteNewAttachPath = $FolderNotesAttachments . $currentID . '_' . $timeStamp;

            $isAttachCopied =  copy($noteAttachPath, $noteNewAttachPath);
            if ($isAttachCopied) {

                $updateAttachPathResult = mysqli_query($connection, "INSERT INTO NotesAttachments( ID , NoteID , FileName , FilePath ,CreatedBy ,ModifiedBy ) VALUES( $currentID , $addedNote , '$fileName' , '$noteNewAttachPath',$userID,$userID )");
                if (!$updateAttachPathResult) {
                    die(mysqli_error($connection));
                }
            }
        }
    } else {
        die(mysqli_error($connection));
    }
}
ob_end_flush();
?>