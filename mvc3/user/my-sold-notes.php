<?php
ob_start();
require "../db_connection.php";
global $connection;

session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");
}

$userEmail = $_SESSION['userEmail'];
$userID = $_SESSION['UserID'];

$myDownloadQuery = "SELECT * FROM NotesDownloads WHERE Seller = $userID AND IsSellerHasAllowedDownload = 1 ";
$myDownloadResult = mysqli_query($connection, $myDownloadQuery);


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
    <link rel="stylesheet" href="../css/user/data-table.css?version=4589262">
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
                    <h2>My Sold Notes</h2>
                </div>
            </div>

            <form action="my-sold-notes.php" method="post">
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
                                            <th scope="col">SELL TYPE</th>
                                            <th scope="col">PRICE</th>
                                            <th scope="col">DOWNLOADED DATE/TIME</th>
                                            <th scope="col" style="background:none">&emsp13;</th>
                                            <th scope="col" style="background:none">&emsp13;</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $count = 1;
                                        while ($mySold = mysqli_fetch_assoc($myDownloadResult)) {

                                            $buyerID = $mySold['Downloader'];
                                            $buyerEmail = "";
                                            $getBuyerDetail = "SELECT * FROM Users WHERE ID = $buyerID ";
                                            $geBuyerResult = mysqli_query($connection, $getBuyerDetail);
                                            if (mysqli_num_rows($geBuyerResult) == 1) {
                                                $buyerDetail  = mysqli_fetch_assoc($geBuyerResult);
                                                $buyerEmail = $buyerDetail['EmailID'];
                                            }

                                            $freeOrPaid = "";
                                            $priceDollar = 0;
                                            if ($mySold['IsPaid'] == 1) {
                                                $freeOrPaid = "Paid";
                                                $priceINR = (int)$mySold['PurchasedPrice'];
                                                $priceINR = bcdiv($priceINR, 1, 2);
                                                $dollarRate = 72.67;
                                                $priceDollar = bcdiv($priceINR, $dollarRate, 2);
                                            } else {
                                                $freeOrPaid = "Free";
                                            }

                                            $downloadedDate = $mySold['ModifiedDate'];
                                            $dateTime = strtotime($downloadedDate);
                                            $downloadedDate = date("d M Y , H:i:s", $dateTime);

                                            echo '  <tr class="table-row">
                                                        <td>' . $count . '</td>
                                                        <td class="view">' . $mySold['NoteTitle'] . '</td>
                                                        <td>' . $mySold['NoteCategory'] . '</td>
                                                        <td>' . $buyerEmail . '</td>
                                                        <td>' . $freeOrPaid . '</td>
                                                        <td>$' . $priceDollar  . '</td>
                                                        <td>' . $downloadedDate . '</td>
                                                        <td class="view"><img src="../images/form/eye.png" alt="View"></td>
                                                        <td class="dropup dropleft">
                                                            <div data-toggle="dropdown">
                                                                <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                            </div>
                                                            <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                                <button class="dropdown-item downloadNote" type="submit" name="download" >Download Note</button>
                                                            </div>
                                                        </td>

                                                        <input type="hidden" class="noteID" value="' . $mySold['NoteID'] . '">
                                                        <input type="hidden" name="noteID">
                                                        <button type="submit" name="noteDetail" style="visibility:hidden"></button>
                                                        <button type="submit" name="downloadNote" style="visibility:hidden"></button>


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
    <!-- <script src="../js/user/data-table.js?version=551104"></script> -->
    <script src="../js/header/header.js?version=55110422"></script>
    <script src="../js/user/my-downloads.js?version=5511504"></script>


</body>

</html>
<?php
if (isset($_POST['noteDetail'])) {
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