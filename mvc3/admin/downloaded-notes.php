<?php
session_start();
ob_start();
require "../db_connection.php";
if (!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");
}
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
    <link rel="stylesheet" href="../css/admin/downloaded-notes.css?version=24125132452">

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

        <form action="downloaded-notes.php" method="post">
            <div class="container">

                <!-- main heading  -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 heading">
                        <h2>Downloaded Notes</h2>
                    </div>
                </div>

                <div class="row" style="background:transparent;">

                    <!-- Book name  -->
                    <div class="col-lg-2 col-md-3 col-sm-4 sellerDropdownName">

                        <label for="bookName" required>Note</label>
                        <div class="dropdown">
                            <button type="button" id="bookName" class="select-field" data-toggle="dropdown">
                                Note<img src="../images/form/arrow-down.png" alt="Down">
                            </button>
                            <ul class="dropdown-menu bookName" aria-labelledby="bookName">

                                <?php
                                
                                $donloadedBookNameQuery = "SELECT DISTINCT NoteTitle FROM NotesDownloads WHERE IsAttachmentDownloaded = 1 AND IsActive = 1";
                                $donloadedBookNameResult = mysqli_query($connection, $donloadedBookNameQuery);

                                if ($donloadedBookNameResult) {

                                    while ($noteTitle = mysqli_fetch_assoc($donloadedBookNameResult)) {
                                        $bookName = $noteTitle['NoteTitle'];
                                        echo '<li class="dropdown-item" value="' . $bookName . '">' . $bookName . '</li>';
                                    }
                                }
                                ?>

                            </ul>
                        </div>

                    </div>

                    <!-- Seller  -->
                    <div class="col-lg-2 col-md-3 col-sm-4 form-group">

                        <label for="seller" required>Seller</label>
                        <div class="dropdown">
                            <button type="button" id="seller" class="select-field" data-toggle="dropdown">
                                Seller<img src="../images/form/arrow-down.png" alt="Down">
                            </button>
                            <ul class="dropdown-menu sellerName" aria-labelledby="seller">

                                <?php
                                $selleNameQuery = "SELECT DISTINCT Seller FROM NotesDownloads WHERE IsAttachmentDownloaded = 1 AND IsActive = 1";
                                $selleNameResult = mysqli_query($connection, $selleNameQuery);

                                if ($selleNameResult) {

                                    while ($sellerName = mysqli_fetch_assoc($selleNameResult)) {
                                        $seller = $sellerName['Seller'];
                                        $seller = getUserName($seller);
                                        echo '<li class="dropdown-item" value="' . $seller . '">' . $seller . '</li>';
                                    }
                                }
                                ?>

                            </ul>
                        </div>

                    </div>

                    <!-- Buyer  -->
                    <div class="col-lg-2 col-md-3 col-sm-4 form-group">

                        <label for="buyer" required>Buyer</label>
                        <div class="dropdown">
                            <button type="button" id="buyer" class="select-field" data-toggle="dropdown">
                                Buyer<img src="../images/form/arrow-down.png" alt="Down">
                            </button>
                            <ul class="dropdown-menu buyerName" aria-labelledby="buyer">
                                <?php
                                $buyerNameQuery = "SELECT DISTINCT Downloader FROM NotesDownloads WHERE IsAttachmentDownloaded = 1 AND IsActive = 1";
                                $buyerNameResult = mysqli_query($connection, $buyerNameQuery);

                                if ($buyerNameResult) {

                                    while ($buyerName = mysqli_fetch_assoc($buyerNameResult)) {
                                        $buyer = $buyerName['Downloader'];
                                        $buyer = getUserName($buyer);
                                        echo '<li class="dropdown-item" value="' . $buyer . '">' . $buyer . '</li>';
                                    }
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
                                        <th scope="col">BUYER</th>
                                        <th scope="col">&emsp13;</th>
                                        <th scope="col">SELLER</th>
                                        <th scope="col">&emsp13;</th>
                                        <th scope="col">SELL TYPE</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">DOWNLOADED DATE/TIME</th>
                                        <th scope="col">&emsp13;</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <?php

                                    $getDownloadedNotesQuery = "SELECT * FROM NotesDownloads WHERE 	IsAttachmentDownloaded = 1 AND IsActive = 1 ";
                                    $getDownloadedNotesResult = mysqli_query($connection, $getDownloadedNotesQuery);

                                    if ($getDownloadedNotesResult) {

                                        $count = 1;

                                        while ($downloadedNotes = mysqli_fetch_assoc($getDownloadedNotesResult)) {

                                            $bookID = $downloadedNotes['NoteID'];
                                            $bookTitle = $downloadedNotes['NoteTitle'];
                                            $bookCategory = $downloadedNotes['NoteCategory'];
                                            $buyerID = $downloadedNotes['Downloader'];
                                            $sellerID = $downloadedNotes['Seller'];
                                            $downloadedDate = $downloadedNotes['AttachmentDownloadedDate'];

                                            $buyerName = getUserName($buyerID);
                                            $sellerName = getUserName($sellerID);

                                            // For paid or free
                                            $sellType = $downloadedNotes['IsPaid'];
                                            $priceDollar = 0;
                                            $freeOrPaid = "Free";
                                            if ($sellType == 1) {
                                                $freeOrPaid = "Paid";
                                                $priceINR = (int)$downloadedNotes['PurchasedPrice'];
                                                $priceINR = bcdiv($priceINR, 1, 2);
                                                $dollarRate = 72.67;
                                                $priceDollar = bcdiv($priceINR, $dollarRate, 2);
                                            }

                                            // For Published Date
                                            $downloadedDate = strtotime($downloadedDate);
                                            $downloadedDate = date("d-m-Y,h:i", $downloadedDate);


                                            echo '<tr class="table-row">
                                                <td>' . $count . '</td>
                                                <td class="viewNote">' . $bookTitle . '</td>
                                                <td>' . $bookCategory . '</td>
            
                                                <td>' . $buyerName . '</td>
                                                <td><img class="view-downloader" src="../images/form/eye.png" alt="View"></td>
            
                                                <td>' . $sellerName . '</td>
                                                <td><img class="view-seller" src="../images/form/eye.png" alt="View"></td>
            
                                                <td>' . $freeOrPaid . '</td>
                                                <td>$' . $priceDollar . '</td>
                                                <td>' . $downloadedDate . '</td>
                                                <td class="dropup dropleft">
                                                    <div data-toggle="dropdown">
                                                        <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                    </div>
                                                    <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                        <button type="submit" class="dropdown-item"  name="download">Download Notes</button>
                                                        <button type="submit" class="dropdown-item" name="noteDetail">View More Detail</button>
                                                    </div>
                                                </td>

                                                <input type = "hidden" name="givenNoteID" class="noteID" value="' . $bookID . '">
                                                <input type = "hidden" name="noteID">

                                                <input type = "hidden"  class="buyer" value="' . $buyerID . '">
                                                <input type = "hidden"  class="seller" value="' . $sellerID . '">
                                                <input type = "hidden" name="memberID">
                                                <button type="submit" name="viewMember" style="display:none;">

                                            </tr>';
                                            $count++;
                                        }
                                    }

                                    ?>

                                </tbody>
                            </table>
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
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- data table  -->
    <script src="../js/data-table/jquery.dataTables.js"></script>

    <!-- custom js  -->
    <script src="../js/admin/downloaded-notes.js?version=85642748512"></script>
    <script src="../js/header/header.js"></script>

</body>

</html>
<?php
if (isset($_POST['download'])) {

    $downloadNoteID = $_POST['noteID'];
    echo $downloadNoteID;
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
if(isset($_POST['viewMember'])) {

    $memberID = (int)$_POST['memberID'];
    $_SESSION['MemberID'] = $memberID;
    header("Location:member-detail.php");

}
ob_flush();
?>