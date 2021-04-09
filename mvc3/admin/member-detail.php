<?php
session_start();
ob_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");
}
require "../db_connection.php";
global $connection;

$memberID = $_SESSION['MemberID'];

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
    <link rel="stylesheet" href="../css/admin/data-table.css?version=57852389562">
    <link rel="stylesheet" href="../css/admin/member-detail.css?version=145265232">

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
                    <h2>Member Detail</h2>
                </div>
            </div>

            <?php

            // Members Details From Users Table 
            $usersQuery = "SELECT * FROM Users WHERE ID = $memberID ";
            $usersResult = mysqli_query($connection, $usersQuery);
            $usersDetail = mysqli_fetch_assoc($usersResult);
            $firstName = $usersDetail['FirstName'];
            $lastName = $usersDetail['LastName'];
            $emailID = $usersDetail['EmailID'];

            // Members Details From UserProfile Table 
            $userProfileQuery = "SELECT * FROM UserProfile WHERE UserID =  $memberID ";
            $userProfileResult = mysqli_query($connection,$userProfileQuery);
            $userProfileDetails = mysqli_fetch_assoc( $userProfileResult);

            // Date of Birth 
            $dob =  $userProfileDetails['DOB'];
            $dob = strtotime($dob);
            $dob = date("d-m-Y",$dob);

            $phoneNumber = $userProfileDetails['PhoneNumber'];
            $college = $userProfileDetails['College'];
            $add1 = $userProfileDetails['AddressLine1'];
            $add2 = $userProfileDetails['AddressLine2'];
            $city = $userProfileDetails['City'];
            $state = $userProfileDetails['State'];
            $country = $userProfileDetails['Country'];
            $zipCode = $userProfileDetails['ZipCode'];

            // Profile Pic 
            $profile = $userProfileDetails['ProfilePicture'];
            // $profile = "../members/73/DP_1616312853.jpg";

            // $path_info = pathinfo($profile);
            // print_r($path_info); 

            ?>
            <!-- member detail  -->
            <div class="row">
                <div class="col-lg-2 col-md-12 col-sm-12 member-photo"><img src="<?php echo $profile;?>" alt="Member Photo"></div>
                <div class="col-lg-5 col-md-6 col-sm-12 col member-detail">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-6 detaii-field">
                            <h6>First Name:</h6>
                            <h6>Last Name:</h6>
                            <h6>Email:</h6>
                            <h6>DOB:</h6>
                            <h6>Phone NUmber:</h6>
                            <h6>College/University:</h6>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 detail">
                            <h6><?php echo $firstName;?></h6>
                            <h6><?php echo $lastName;?></h6>
                            <h6><?php echo $emailID;?></h6>
                            <h6><?php echo $dob;?></h6>
                            <h6><?php echo $phoneNumber;?></h6>
                            <h6><?php echo $college;?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 member-add-detail">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-6 detaii-field">
                            <h6>Address 1:</h6>
                            <h6>Address 2:</h6>
                            <h6>City:</h6>
                            <h6>State:</h6>
                            <h6>Country:</h6>
                            <h6>Zip Code:</h6>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 detail">
                            <h6><?php echo $add1;?></h6>
                            <h6><?php echo $add2;?></h6>
                            <h6><?php echo $city;?></h6>
                            <h6><?php echo $state;?></h6>
                            <h6><?php echo $country;?></h6>
                            <h6><?php echo $zipCode;?></h6>
                        </div>
                    </div>
                </div>

            </div>

            <hr style="border:1px solid #d1d1d1">

            <form action="member-detail.php" method="post">
                <!-- table  -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 table-heading">
                        <h4>Notes</h4>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="table-responsive">
                            <table class="table dashboard-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">DOWNLOADED NOTES</th>
                                        <th scope="col">TOTAL EARNINGS</th>
                                        <th scope="col">DATE ADDED</th>
                                        <th scope="col">PUBLISHED DATE</th>


                                        <th scope="col">&emsp13;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $getMemberNotesQuery = "SELECT * FROM NotesDetails WHERE IsActive = 1 AND SellerID = $memberID ";
                                    $getMemberNotesResult = mysqli_query($connection, $getMemberNotesQuery);
                                    if ($getMemberNotesResult) {
                                        $count = 1;
                                        while ($notesDetail = mysqli_fetch_assoc($getMemberNotesResult)) {

                                            // Book ID 
                                            $bookID = $notesDetail['ID'];

                                            // Book title 
                                            $bookTitle = $notesDetail['Title'];

                                            // Book Category 
                                            $categoryID = $notesDetail['Category'];
                                            $queryCategories = "SELECT * FROM NoteCategories WHERE ID = $categoryID ";
                                            $noteCategoriesResult = mysqli_query($connection, $queryCategories);
                                            $noteCategories = mysqli_fetch_assoc($noteCategoriesResult);
                                            $category = $noteCategories['Name'];

                                            // Book Status 
                                            $bookStatusID = $notesDetail['Status'];
                                            $bookStatusQuery = "SELECT * FROM ReferenceData WHERE RefCategory = 'Notes Status' AND ID = $bookStatusID ";
                                            $bookStatusResult = mysqli_query($connection, $bookStatusQuery);
                                            $bookStatusDetail = mysqli_fetch_assoc($bookStatusResult);
                                            $bookStatus = $bookStatusDetail['Value'];

                                            // Downloaded Notes 
                                            $noOfDownloads =  0;
                                            $totalDollarEarning = 0;
                                            $noOfDownloadsQuery = "SELECT * FROM NotesDownloads WHERE NoteID = $bookID AND IsAttachmentDownloaded = 1 ";
                                            $noOfDownloadsResult = mysqli_query($connection, $noOfDownloadsQuery);
                                            if ($noOfDownloadsResult) {
                                                $noOfDownloads = mysqli_num_rows($noOfDownloadsResult);
                                                // Total Earnings 
                                                $priceINR = 0;
                                                while ($downloaddeNote = mysqli_fetch_assoc($noOfDownloadsResult)) {
                                                    if ($downloaddeNote['IsPaid']) {
                                                        $priceINR = $priceINR + $downloaddeNote['PurchasedPrice'];
                                                    }
                                                }
                                                $priceINR = bcdiv($priceINR, 1, 2);
                                                $dollarRate = 72.67;
                                                $totalDollarEarning  = bcdiv($priceINR, $dollarRate, 2);
                                            }

                                            if ($bookStatusID == 9) {
                                                $publishedDate = '';
                                                // Published Date 
                                                $publishedDate = $notesDetail['PublishedDate'];
                                                $publishedDate = strtotime($publishedDate);
                                                $publishedDate = date('d-m-Y,H:i', $publishedDate);
                                            } else {
                                                $publishedDate = 'NA';
                                            }

                                            // Date Added 
                                            $addedDate = $notesDetail['CreatedDate'];
                                            $addedDate = strtotime($addedDate);
                                            $addedDate = date('d-m-Y,H:i', $addedDate);

                                            echo '<tr class="table-row">
                                                <td>' . $count . '</td>
                                                <td class="noteTitle">' . $bookTitle . '</td>
                                                <td>' . $category . '</td>
                                                <td>' . $bookStatus . '</td>
                                                <td class="noOfDownloads">' . $noOfDownloads . '</td>
                                                <td>$' . $totalDollarEarning . '</td>
                                                <td>' . $addedDate . '</td>
                                                <td>' .  $publishedDate . '</td>
                                                <td class="dropup dropleft">
                                                    <div data-toggle="dropdown">
                                                        <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                    </div>
                                                    <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                        <button type="submit" class="dropdown-item" name="download">Download Notes</button>
                                                    </div>
                                                </td>
                                                <input type = "hidden" name="givenNoteID" class="noteID" value="' . $bookID . '">
                                                <input type = "hidden" name="noteID">
                                                <button type="submit" name="getNoOfDownloads" style="display:none">Unpublish</button>
                                                <button type="submit" name="noteDetail" style="display:none">Unpublish</button>

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

    <script src="../js/header/header.js"></script>
    <script src="../js/admin/member-detail.js?version=1166335362"></script>


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
if (isset($_POST['getNoOfDownloads'])) {

    $getNoOfDownloadsNoteID = $_POST['noteID'];
    $_SESSION['noteID'] = $getNoOfDownloadsNoteID;

    header("Location:downloaded-notes.php");
}
ob_end_flush();
?>