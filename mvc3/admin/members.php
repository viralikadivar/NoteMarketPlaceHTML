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
    <link rel="stylesheet" href="../css/admin/data-table.css">
    <link rel="stylesheet" href="../css/admin/members.css?version=242484861">

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
                    <h2>Members</h2>
                </div>
            </div>
            <form action="members.php" method="post">
                <!-- table  -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table dashboard-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">FIRST NAME</th>
                                        <th scope="col">LAST NAME</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">JOINING DATE</th>
                                        <th scope="col">UNDER REVIEW NOTES</th>
                                        <th scope="col">PUBLISHED NOTES</th>
                                        <th scope="col">DOWNLOADED NOTES</th>
                                        <th scope="col">TOTAL EXPENSES</th>
                                        <th scope="col">TOTAL EARNINGS</th>
                                        <th scope="col">&emsp13;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $getMembersQuery = "SELECT * FROM Users WHERE IsActive = 1 AND RoleID = 3 ";
                                    $getMemeberResult = mysqli_query($connection, $getMembersQuery);
                                    if ($getMemeberResult) {
                                        $count = 1;
                                        while ($memberDetail = mysqli_fetch_assoc($getMemeberResult)) {

                                            $memberID = $memberDetail['ID'];
                                            $firstName = $memberDetail['FirstName'];
                                            $lastName = $memberDetail['LastName'];
                                            $userEmail = $memberDetail['EmailID'];

                                            // Joining Date 
                                            $createdDate = $memberDetail['CreatedDate'];
                                            $createdDate = strtotime($createdDate);
                                            $joiningDate = date('d-m-Y, H:i', $createdDate);

                                            // Notes under Review
                                            $notesUnderReview = 0;
                                            $getNotesUnderReviewQuery = "SELECT * FROM NotesDetails WHERE IsActive = 1 AND SellerID = $memberID AND Status = 7 OR Status = 8 ";
                                            $notesUnderReviewResult = mysqli_query($connection, $getNotesUnderReviewQuery);
                                            if ($notesUnderReviewResult) {
                                                $notesUnderReview = mysqli_num_rows($notesUnderReviewResult);
                                            }

                                            // Published Notes 
                                            $publishedNotes = 0;
                                            $totalExpensesDollar = 0;
                                            $getPublishedNotesQuery = "SELECT * FROM NotesDetails WHERE Status = 9 AND IsActive = 1 AND SellerID = $memberID  ";
                                            $getPublishedNotesResult = mysqli_query($connection, $getPublishedNotesQuery);
                                            if ($getPublishedNotesResult) {
                                                $publishedNotes = mysqli_num_rows($getPublishedNotesResult);
                                                $totalExpensesINR = 0;
                                                while ($publishedNotesDetails = mysqli_fetch_assoc($getPublishedNotesResult)) {
                                                    $totalExpensesINR = $totalExpensesINR + $publishedNotesDetails['SellingPrice'];
                                                    $priceINR = bcdiv($totalExpensesINR, 1, 2);
                                                    $dollarRate = 72.67;
                                                    $totalExpensesDollar = bcdiv($priceINR, $dollarRate, 2);
                                                }
                                            }

                                            // Downloaded Notes
                                            $downloadNo = 0;
                                            $totalEarningsInDollar = 0;
                                            $getDownloadedNotesQuery = "SELECT * FROM NotesDownloads WHERE Seller = $memberID AND IsAttachmentDownloaded = 1";
                                            $getDownloadedNotesResult = mysqli_query($connection, $getDownloadedNotesQuery);
                                            if ($getDownloadedNotesResult) {
                                                $downloadNo = mysqli_num_rows($getDownloadedNotesResult);
                                                $totalEarningsINR = 0;
                                                while ($downloadNotesDetails = mysqli_fetch_assoc($getDownloadedNotesResult)) {
                                                    $totalEarningsINR = $totalEarningsINR + $downloadNotesDetails['PurchasedPrice'];
                                                    $priceINR = bcdiv($totalEarningsINR, 1, 2);
                                                    $dollarRate = 72.67;
                                                    $totalEarningsInDollar = bcdiv($priceINR, $dollarRate, 2);
                                                }
                                            }

                                            echo '<tr class="table-row">
                                                    <td>' . $count . '</td>
                                                    <td>' . $firstName . '</td>
                                                    <td>' . $lastName . '</td>
                                                    <td>' . $userEmail . '</td>
                                                    <td>' . $joiningDate . '</td>
                                                    <td>' . $notesUnderReview . '</td>
                                                    <td>' . $publishedNotes . '</td>
                                                    <td>' . $downloadNo . '</td>
                                                    <td>$' . $totalExpensesINR . '</td>
                                                    <td>$' . $totalEarningsInDollar . '</td>

                                                    <td class="dropup dropleft">
                                                        <div data-toggle="dropdown">
                                                            <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                        </div>
                                                        <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                            <button name="memberDetail" type="submit" class="dropdown-item">View More Details</button>
                                                            <button type="button" name="deactivate" class="dropdown-item" data-toggle="modal" data-target="#deactivateMember">Deactivate</button>
                                                        </div>
                                                    </td>

                                                    <input type="hidden" class="memberID" value="'.$memberID.'">
                                                    <input type="hidden" name="memberID">
                                                </tr>';

                                            $count++;
                                        }
                                    }




                                    ?>
                                   

                                </tbody>
                            </table>
                            <!-- Modal For publish Book -->
                            <div class="modal fade" id="deactivateMember" tabindex="-1" role="dialog" aria-labelledby="publishBookTitle" aria-hidden="true">
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
                                                <p>Are you sure you want to make this member inactive?</p>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="deactivateMember" style="color:#ffffff ; background-color:red">YES</button>
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
    <script src="../js/header/header.js"></script>
    <script src="../js/admin/members.js?version=515347458"></script>

</body>

</html>
<?php

// View Member Detail 
if(isset($_POST['memberDetail'])){
    $memberID = $_POST['memberID'];
    $_SESSION['MemberID'] =  $memberID ;
    header("Location:member-detail.php");
}
if(isset($_POST['deactivateMember'])){
    $deactivateMemberID = $_POST['memberID'];
    
    $deactivateUsers = "UPDATE Users SET IsActive = 0 WHERE ID = $deactivateMemberID";
    $dectivateUserResult = mysqli_query($connection, $deactivateUsers );

    $deactivateUsersProfileQuery = "UPDATE UserProfile SET IsActive = 0  WHERE UserID = $deactivateMemberID";
    $deactivateUsersProfileResult = mysqli_query($connection,$deactivateUsersProfileQuery);

    if($dectivateUserResult && $deactivateUsersProfileResult){
        $deactivateNotesQuery = "UPDATE NotesDetails SET IsActive = 0  WHERE SellerID = $deactivateMemberID";
        $deactivateNoteResult = mysqli_query($connection,$deactivateNotesQuery);
        if(!$deactivateNoteResult){
            die(mysqli_error($connection));
        } else{
            header("refresh:0");
        }
    }
}

ob_flush();
?>