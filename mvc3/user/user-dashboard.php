<?php
session_start();
ob_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");
}
require "../db_connection.php";
global $connection;

$userEmail = $_SESSION['userEmail'];
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
    <link rel="stylesheet" href="../css/header-footer/user-header.css">
    <link rel="stylesheet" href="../css/header-footer/footer.css">
 
    <!-- datatable -->
    <link rel="stylesheet" href="../css/data-table/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/user/user-dashboard.css?version=1865420">

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
        <form action="user-dashboard.php" method="post">
            <div class="container">

                <!-- main heading  -->
                <div class="row dashboard-field">
                    <div class="col-lg-6 col-md-6 col-sm-6 heading">
                        <h2>Dashboard</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 text-right add-notes">
                        <a href="add-notes.php" class="btn" role="button">Add Note</a>
                    </div>
                </div>

                <!-- main field  -->
                <div class="row text-center">
                    <div class="col-lg-6 col-md-12 col-sm-12 dashboard-numbers">

                        <div class="row">
                            <!-- my earning -->
                            <div class="col-lg-4 col-md-4 col-sm-4 text-left earning heading">
                                <img src="../images/dashboard/my-earning.png" alt="Sell">
                                <h3 style="font-weight: 600;">My Earning</h3>
                            </div>

                            <!-- number of sold -->
                            <?php

                            $mySoldQuery = "SELECT DISTINCT NoteID FROM NotesDownloads WHERE Seller = $userID AND IsSellerHasAllowedDownload = 1";
                            $mySoldResult = mysqli_query($connection, $mySoldQuery);
                            $mySoldNotes = 0;
                            if ($mySoldResult) {
                                $mySoldNotes = mysqli_num_rows($mySoldResult);
                            }

                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 earning heading">
                                <a href="my-sold-notes.php">
                                    <h3><?php echo $mySoldNotes ?></h3>
                                </a>
                                <p>Number of Notes Sold</p>
                            </div>

                            <!-- money Earned  -->
                            <?php

                            $moneyEarnedQuery = "SELECT * FROM NotesDownloads WHERE Seller = $userID AND IsSellerHasAllowedDownload = 1";
                            $moneyEarnedResult = mysqli_query($connection, $moneyEarnedQuery);
                            $moneyEarnedINR = 0;
                            $moneyEarnedDollar = 0;
                            while ($moneyEarnedDetail = mysqli_fetch_assoc($moneyEarnedResult)) {
                                $moneyEarnedINR = $moneyEarnedINR + $moneyEarnedDetail['PurchasedPrice'];
                            }
                            $priceINR = (int)$moneyEarnedINR;
                            $priceINR = bcdiv($priceINR, 1, 2);
                            $dollarRate = 72.67;
                            $moneyEarnedDollar = bcdiv($priceINR, $dollarRate, 2);

                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 earning heading">
                                <a href="my-sold-notes.php">
                                    <h3>$<?php echo $moneyEarnedDollar; ?></h3>
                                </a>
                                <p>Money Earned</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 dashboard-count">

                        <div class="row">

                            <!-- my downloads  -->
                            <?php
                            $myDownloadQuery = "SELECT * FROM NotesDownloads WHERE Downloader = $userID AND IsSellerHasAllowedDownload = 1";
                            $myDownloadResult = mysqli_query($connection, $myDownloadQuery);
                            $myDownloadNo = 0;
                            if ($myDownloadResult) {
                                $myDownloadNo = mysqli_num_rows($myDownloadResult);
                            }

                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 heading">
                                <div class="my-notes">
                                    <a href="my-download.php">
                                        <h3><?php echo $myDownloadNo; ?></h3>
                                    </a>
                                    <p>My Downloads</p>
                                </div>
                            </div>

                            <!-- my rejected Notes -->
                            <?php
                            $rejectedNotesQuery = "SELECT * FROM NotesDetails WHERE SellerID = $userID AND Status = 10 ";
                            $rejecteddNotesResult = mysqli_query($connection, $rejectedNotesQuery);
                            $rejectedBookNo = 0;
                            if ($rejecteddNotesResult) {
                                $rejectedBookNo = mysqli_num_rows($rejecteddNotesResult);
                            }
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 heading">
                                <div class="my-notes">
                                    <a href="my-rejected-notes.php">
                                        <h3><?php echo $rejectedBookNo; ?></h3>
                                    </a>
                                    <p>My Rejected Notes</p>
                                </div>
                            </div>

                            <!-- Buyers request  -->
                            <?php
                            $bookRequestsQuery = " SELECT * FROM NotesDownloads WHERE Seller = $userID and IsSellerHasAllowedDownload = 0 ";
                            $bookRequestsResult = mysqli_query($connection, $bookRequestsQuery);
                            $totalBuyerRequest  = 0;
                            if ($bookRequestsResult) {
                                $totalBuyerRequest = mysqli_num_rows($bookRequestsResult);
                            }
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 heading">
                                <div class="my-notes">
                                    <a href="buyers-request.php">
                                        <h3><?php echo $totalBuyerRequest; ?></h3>
                                    </a>
                                    <p>Buyer Request</p>
                                </div>
                            </div>

                            </dviv>

                        </div>



                    </div>
                </div>

                <!-- inprogress notes  -->
                <div class="row table-data">

                    <div class="col-lg-12 col-md-12 col-sm-12 heading p-0">
                        <h4>In Progress Notes</h4>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12  p-0">
                        <!-- inprogress table -->
                        <div class="table-responsive">
                            <table class="table dashboard-table-1">
                                <thead>
                                    <tr>
                                        <th scope="col">Added Date</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" style="background:none">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $getInProgressBookQuery = "SELECT * FROM NotesDetails WHERE SellerID = $userID AND (Status = 6 OR  Status = 7 OR Status = 8)";
                                    $getInProgressBookResult = mysqli_query($connection, $getInProgressBookQuery);

                                    while ($inProgressBook = mysqli_fetch_assoc($getInProgressBookResult)) {

                                        $inProgressID = $inProgressBook['ID'];

                                        $addedDate = $inProgressBook['CreatedDate'];
                                        $addedDate = strtotime($addedDate);
                                        $addedDate = date('d-m-Y', $addedDate);

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

                                        $bookAction = "";
                                        if ($bookStatus == 'Draft') {
                                            $bookAction = '<img class="edit" src="../images/form/edit.png" alt="edit"> &emsp14;
                                                           <img class="delete" data-toggle="modal" data-target="#deleteNoteWarning" src="../images/form/delete.png" alt="delete">';
                                        } else {
                                            $bookAction = '<img class="view" src="../images/form/eye.png" alt="view">';
                                        }

                                        echo '<tr>
                                                <td>' . $addedDate . '</td>
                                                <td>' . $inProgressTitle . '</td>
                                                <td>' . $category . '</td>
                                                <td>' . $bookStatus . '</td>
                                                <td>
                                                    ' . $bookAction . '
                                                    <input type="hidden" class="noteID" value="' . $inProgressID . '" style="display:none">
                                                    <input type="hidden" name="noteID" style="display:none">
                                                    <button type="submit" name="editNote" style="display:none"></buttton>
                                                </td>
                                                
                                            </tr>';
                                    }

                                    ?>

                                </tbody>
                            </table>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteNoteWarning" tabindex="-1" role="dialog" aria-labelledby="deleteNoteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteNoteModalLabel" style="color:#6255a5;">Delete Note</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure, you want to delete this note?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" name="deleteNote" class="delete-note">YES</button>
                                        <button type="button" class="delete-note" data-dismiss="modal">NO</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- published notes  -->
                <div class="row table-data">

                    <div class="col-lg-12 col-md-12 col-sm-12  heading p-0">
                        <h4>Published Notes</h4>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12  p-0">

                        <!-- published table  -->
                        <div class="table-responsive">
                            <table class="table dashboard-table-2">
                                <thead>
                                    <tr>
                                        <th scope="col">Added Date</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Sell Type</th>
                                        <th scope="col">Price</th>
                                        <th scope="col" style="background:none">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $getPublishedBookQuery = "SELECT * FROM NotesDetails WHERE SellerID = $userID AND Status = 9 ";
                                    $getPublishedBookResult = mysqli_query($connection, $getPublishedBookQuery);

                                    while ($publishedBook = mysqli_fetch_assoc($getPublishedBookResult)) {

                                        $publishedNoteID = $publishedBook['ID'];

                                        $publishedDate = $publishedBook['PublishedDate'];
                                        $publishedDate = strtotime($publishedDate);
                                        $publishedDate = date('d-m-Y', $publishedDate);

                                        $publishedNoteTitle = $publishedBook['Title'];

                                        $categoryID = $publishedBook['Category'];
                                        $queryCategories = "SELECT * FROM NoteCategories WHERE ID = $categoryID ";
                                        $noteCategoriesResult = mysqli_query($connection, $queryCategories);
                                        $noteCategories = mysqli_fetch_assoc($noteCategoriesResult);
                                        $category = $noteCategories['Name'];

                                        $isPaid  = $publishedBook['IsPaid'];
                                        $priceDollar =  0;

                                        $paidOrFree = "Free";
                                        if ($isPaid == 4) {
                                            $paidOrFree = "Paid";
                                            $priceINR = (int)$publishedBook['SellingPrice'];
                                            $priceINR = bcdiv($priceINR, 1, 2);
                                            $dollarRate = 72.67;
                                            $priceDollar = bcdiv($priceINR, $dollarRate, 2);
                                        }



                                        echo '<tr>
                                                <td>' . $publishedDate . '</td>
                                                <td>' . $publishedNoteTitle . '</td>
                                                <td>' . $category . '</td>
                                                <td>' . $paidOrFree . '</td>
                                                <td>$' . $priceDollar . '</td>
                                                
                                                <td>
                                                    <img class="view" src="../images/form/eye.png" alt="view">
                                                    <input type="hidden" class="noteID" value="' . $publishedNoteID . '" style="display:none">
                                                    <input type="hidden" name="noteID" style="display:none">
                                                    <button type="submit" name="noteDetail" style="display:none"></buttton>
                                                </td>

                                            </tr>';
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
    <script src="../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- data table  -->
    <script src="../js/data-table/jquery.dataTables.js"></script>
    <script src="../js/header/header.js"></script>
    <script src="../js/user/user-dashboard.js?version=4562155563"></script>

</body>

</html>
<?php

// view Note Details 
if (isset($_POST['noteDetail'])) {
    $noteID = $_POST['noteID'];
    $_SESSION['noteID'] = $noteID;
    header("Location:../notes-detail.php");
}

// Edit Notes 
if (isset($_POST['editNote'])) {
    $noteID = $_POST['noteID'];
    $_SESSION['noteID'] = $noteID;
    header("Location:add-notes.php");
}

// Delete notes 
if (isset($_POST['deleteNote'])) {
    $noteID = $_POST['noteID'];
echo $noteID ;
    // Delete Note From NotesAttachments 
    $deleteNoteAtttachmentsQuery = "DELETE FROM NotesAttachments WHERE NoteID = $noteID ";
    $deleteNoteAtttachmentsResult = mysqli_query($connection, $deleteNoteAtttachmentsQuery);

    if ($deleteNoteAtttachmentsResult) {
        // Delete note From NotesDetails 
        $deleteNoteDetailsQuery = "DELETE FROM NotesDetails WHERE ID = $noteID ";
        $deleteNoteDetailsResult = mysqli_query($connection, $deleteNoteDetailsQuery);
        header("Refresh:0");
    }
}

ob_flush();
?>