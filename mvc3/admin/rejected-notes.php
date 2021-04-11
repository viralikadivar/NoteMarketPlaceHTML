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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">

    <!-- Header footer CSS -->
    <link rel="stylesheet" href="../css/header-footer/admin-header.css">
    <link rel="stylesheet" href="../css/header-footer/admin-footer.css">

    <!-- datatable -->
    <link rel="stylesheet" href="../css/data-table/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/data-table.css">
    <link rel="stylesheet" href="../css/admin/rejected-notes.css?version=124556361">

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

    <form action="rejected-notes.php" method="post">
        <section id="dashboard">

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

            ?>
            <div class="container">

                <!-- main heading  -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 heading">
                        <h2>Rejected Notes</h2>
                    </div>
                </div>

                <div class="row" style="background:transparent;">

                <div class="col-lg-3 col-md-2 col-sm-2 sellerDropdownName">
                    <?php
                    $getSellerIDQuery = "SELECT DISTINCT SellerID FROM NotesDetails WHERE IsActive = 1 AND Status = 10";
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
                                        <th scope="col">&emsp13;</th>
                                        <th scope="col">DATE EDITED</th>
                                        <th scope="col">REJECTED BY </th>
                                        <th scope="col">REMARK</th>
                                        <th scope="col">&emsp13;</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    $getRejectededNotesQuery = "SELECT * FROM NotesDetails WHERE Status = 10 AND IsActive = 1 ";
                                    $getRejectededNotesResult = mysqli_query($connection, $getRejectededNotesQuery);

                                    if ($getRejectededNotesResult) {

                                        $count = 1;

                                        while ($rejectededNotes = mysqli_fetch_assoc($getRejectededNotesResult)) {

                                            $bookID = $rejectededNotes['ID'];
                                            $bookTitle = $rejectededNotes['Title'];
                                            $bookCategoryID = $rejectededNotes['Category'];
                                            $sellerID = $rejectededNotes['SellerID'];
                                            $rejectedByID = $rejectededNotes['ActionedBy'];
                                            $editedDate = $rejectededNotes['ModifiedDate'];
                                            $remark = $rejectededNotes['AdminRemarks'];

                                            // For Category 
                                            $getCategoryNameQuery = "SELECT * FROM NoteCategories WHERE ID = $bookCategoryID ";
                                            $getCategoryNameResult = mysqli_query($connection, $getCategoryNameQuery);
                                            $categoryDetails = mysqli_fetch_assoc($getCategoryNameResult);
                                            $categoryName = $categoryDetails['Name'];

                                            // Seller name 
                                            $sellerName = getUserName($sellerID);

                                            // For rejecteded Date
                                            $editedDate = strtotime($editedDate);
                                            $editedDate = date("d-m-Y,h:i", $editedDate);

                                            // Rejected By 
                                            $editorName = getUserName($rejectedByID);

                                            echo '<tr class="table-row">
                                            <td>' . $count . '</td>
                                            <td class="view-note-details">' . $bookTitle . '</td>
                                            <td>' . $categoryName . '</td>
                                            <td>' . $sellerName . '</td>
                                            <td><img src="../images/form/eye.png" class="viewMemberDetail" alt="View"></td>
                                            <td>' . $editedDate . '</td>
                                            <td>' . $editorName . '</td>
                                            <td>' . $remark . '</td>
                                            <td class="dropup dropleft">
                                                <div data-toggle="dropdown">
                                                    <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                </div>
                                                <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                    <button type="button" name="publish"  class="dropdown-item" data-toggle="modal" data-target="#publishNote">Approve</button>
                                                    <button type="submit" class="dropdown-item"  name="download">Download Notes</button>
                                                    <button type="submit" class="dropdown-item" name="noteDetail">View More Details</button>
                                                </div>
                                            </td>

                                            <input type = "hidden" name="givenNoteID" class="noteID" value="' . $bookID . '">
                                            <input type = "hidden" name="noteID">

                                            <input type = "hidden" name="givenSllerID" class="sellerID" value="' . $sellerID  . '">
                                            <input type = "hidden" name="sellerID">
                                            <button type="submit" name="viewMemberDetail" style="display:none">

                                        </tr>';

                                            $count++;
                                        }
                                    }
                                    ?>


                                </tbody>
                            </table>
                            <!-- Modal For publish Book -->
                            <div class="modal fade" id="publishNote" tabindex="-1" role="dialog" aria-labelledby="publishBookTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header heading">
                                            <h4 class="modal-title" id="publishBookTitle">

                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><img src="../images/form/close.png" alt="close"></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="rating">
                                                <p>If you approve the notes – System will publish the notes over portal. Please press yes to continue.</p>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="publishNote" style="color:#ffffff ; background-color:red">Publish</button>
                                            <button type="button" class="btn-sm" data-dismiss="modal" style="color:#ffffff ; background-color:grey">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>


            </div>

        </section>
    </form>

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
    <script src="../js/admin/rejected-notes.js?version=1542122878248"></script>
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

if(isset($_POST['publishNote'])){

    $publishNoteID = $_POST['noteID'];

    //publish Note 
    $updateNoteDetailsQuery = "UPDATE NotesDetails SET AdminRemarks = '' , ActionedBy = $userID , Status = 7 , IsActive = 1 WHERE ID = $publishNoteID ";
    $updateNoteDetailsResult =  mysqli_query($connection,$updateNoteDetailsQuery); 
    if($updateNoteDetailsResult){
        header("refresh:0");
    }
    
}
if(isset($_POST['viewMemberDetail'])){
    $_SESSION['MemberID'] = $_POST['sellerID'];
    header("Location:member-detail.php");
}
ob_flush();
?>