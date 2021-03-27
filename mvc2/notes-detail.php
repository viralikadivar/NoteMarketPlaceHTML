<?php

require "db_connection.php";
global $connection;
session_start();

$modelBodyDetail = "";
$modelTitle = "";

$supportContactNoQuery = "SELECT * FROM systemConfiguration WHERE KeyFields = 'SupportContactNumber' ";
$supportContactNoResult = mysqli_query($connection, $supportContactNoQuery);
$supportField = mysqli_fetch_assoc($supportContactNoResult);
$supportContactNo = $supportField['Value'];

if (isset($_SESSION['userRoleID']) && !empty($_SESSION['userRoleID'])) {
    $userEmail = $_SESSION['userEmail'];
    $userID = $_SESSION['UserID'];
    $userName =  $_SESSION['UserName'];

    $modelTitle = '<img id="done" class="img-responsive" src="images/note-detail/SUCCESS.png" alt="Done">
                    <h2 class="modal-title" id="exampleModalScrollableTitle">Thank you for purchasing!</h2>';

    $modelBodyDetail = '<h4>' . $userName . ',</h4>
    <p>
        As this is paid notes - you need to pay the amount to seller offline in order to download the
        note.
        We will send Seller an email that you want to download this note. Seller may contact you further
        for payment process completion.
    </p>
    <p>
        In case, you have urgency,
        <br>
        please contact us on +91' . $supportContactNo . '.
    </p>
    <p>
        Once Seller receives the payment and acknowledge us - selected notes you can see over my
        downloads tab for download.
    </p>
    <p>
        Have a good day.
    </p>';
} else {
    $modelBodyDetail = '<h4 class="text-center">Please <a href="login.php">sign in/register</a> to download this note.</h4>';
}

$noteID = $_SESSION['noteID'];

$query = " SELECT * FROM NotesDetails WHERE ID = $noteID ";
$queryResult = mysqli_query($connection, $query);

if ($queryResult) {

    $notesDetails = mysqli_fetch_assoc($queryResult);

    $displayPicture = $notesDetails['DisplayPicture'];
    $displayPicture = str_replace('../', '', $displayPicture);

    $notesPreview = $notesDetails['NotesPreview'];
    $notesPreview = str_replace('../', '', $notesPreview);

    $categoryID = $notesDetails['Category'];
    $countryQuery = " SELECT * FROM NoteCategories WHERE ID = $categoryID ";
    $categoryResult = mysqli_query($connection, $countryQuery);
    $categoryDetail = mysqli_fetch_assoc($categoryResult);
    $categoryName = $categoryDetail['Name'];

    $countryID = $notesDetails['Country'];
    $countryQuery = " SELECT * FROM Countries WHERE ID = $countryID ";
    $countryResult = mysqli_query($connection, $countryQuery);
    $countryDetail = mysqli_fetch_assoc($countryResult);
    $countryName = $countryDetail['Name'];

    $totalRatings = 0;
    $spamReports = 0;

    $publishedDate = $notesDetails['PublishedDate'];
    $dateTime = strtotime($publishedDate);
    $publishedDate = date("F d Y", $dateTime);

    $priceDollar = 0;
    $freeOrPaid = "";
    if ($notesDetails['IsPaid'] == 4) {
        $priceINR = (int)$notesDetails['SellingPrice'];
        $priceINR = bcdiv($priceINR, 1, 2);
        $dollarRate = 72.67;
        $priceDollar = bcdiv($priceINR, $dollarRate, 2);
    }

    $totalRatingResult = mysqli_query($connection, "SELECT * FROM NotesReviews WHERE NoteID = $noteID ");
    if ($totalRatingResult) {
        $totalRatings = mysqli_num_rows($totalRatingResult);
    }

    $totalSpamResult = mysqli_query($connection, "SELECT * FROM ReportedIssues WHERE NoteID = $noteID ");
    if ($totalSpamResult) {
        $spamReports = mysqli_num_rows($totalSpamResult);
    }

    $isAlreadyDownladedQuery = "SELECT * FROM";

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
        <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link rel="stylesheet" href="css/fonts/fonts.css">

        <!-- ================================================
                        CSS Files 
        ================================================= -->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

        <!-- Header footer CSS -->
        <link rel="stylesheet" href="css/header-footer/user-header.css">
        <link rel="stylesheet" href="css/header-footer/footer.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/notes-detail.css">

    </head>

    <body>

        <!-- Preloader -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Preloader Ends -->

        <!-- Header -->
        <?php
        require "header.php";
        ?>
        <!-- Header Ends -->


        <!-- for removing navbars overlay -->
        <br><br>

        <!-- book preview -->
        <section id="book-preview">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 heading">
                        <h3>Notes Details</h3>
                    </div>
                </div>

                <!-- all about books information -->
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12">

                        <div class="row  book-info">
                            <!-- book Image -->
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div id="book-img">
                                    <img src="<?php echo $displayPicture; ?>" alt="Book" class="img-responsive">
                                </div>
                            </div>

                            <!-- book information -->
                            <div class="col-lg-8  col-md-8 col-sm-8 heading">
                                <h2><?php echo $notesDetails['Title']; ?></h2>
                                <h4><?php echo $categoryName; ?></h4>
                                <p><?php echo $notesDetails['Description']; ?></p>
                                <!-- Button trigger modal -->
                                <form action="notes-detail.php" method = "post">
                                <button type="button" name="downloadTheBook" data-toggle="modal" data-target="#exampleModalScrollable"><a href="notes-detail.php?download=1">download/&#36;<?php echo $priceDollar;?></a></button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="row book-details">
                            <!-- detail heading -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <h5>Institution:</h5>
                                <h5>Country:</h5>
                                <h5>Course Name:</h5>
                                <h5>Course Code:</h5>
                                <h5>Professor:</h5>
                                <h5>Number of Pages:</h5>
                                <h5>Approved Dates:</h5>
                                <h5>Ratings:</h5>

                            </div>

                            <!-- detail data -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <h5><?php echo $notesDetails['UniversityName']; ?></h5>
                                <h5><?php echo $countryName; ?></h5>
                                <h5><?php echo $notesDetails['Course']; ?></h5>
                                <h5><?php echo $notesDetails['CourseCode']; ?></h5>
                                <h5><?php echo $notesDetails['Professor']; ?></h5>
                                <h5><?php echo $notesDetails['NumberofPages']; ?></h5>
                                <h5><?php echo $publishedDate; ?></h5>
                                <h5 class="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star-white.png" alt="star">
                                    <?php echo $totalRatings; ?> Reviews
                                </h5>

                            </div>

                            <!-- inappropriate  marked reviews -->
                            <div class="col-lg-12 " id="report-spam">
                                <h6><?php echo $spamReports; ?> Users marked this note as inappropriate</h6>
                            </div>

                        </div>
                    </div>
                </div>

                <hr style="margin-top: 30px;">

                <!-- book reviews and preview -->
                <div class="row review-preview">
                    <!-- book preview -->
                    <div class="col-lg-5 col-md-12 col-sm-12 heading">
                        <h3>Notes Preview</h3>
                        <div class="responsive-wrapper 
                           responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                            <iframe src="<?php echo $notesPreview; ?>"></iframe>
                        </div>
                    </div>
                    <!-- book review -->
                    <div class="col-lg-7 col-md-12 col-sm-12 heading">
                        <h3>Customer Review</h3>
                        <div class="customer-wrapper">
                            <!-- Customer 01 -->
                            <div class="row customer-review">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <img class="img-responsive" src="images/note-detail/reviewer-1.png" alt="Customer">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <h5>Richard Brown</h5>
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star-white.png" alt="star">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dignissimos nostrum
                                        et debitis quod. Consequuntu</p>
                                </div>
                            </div>

                            <hr>

                            <!-- Customer 02 -->
                            <div class="row customer-review">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <img src="images/note-detail/reviewer-2.png" alt="Customer" class="img-responsive">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <h5>Alice Ortiaz</h5>
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star-white.png" alt="star">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dignissimos nostrum
                                        et debitis quod. Consequuntu</p>
                                </div>
                            </div>

                            <hr>

                            <!-- Customer 03 -->
                            <div class="row customer-review">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <img src="images/note-detail/reviewer-3.png" alt="Customer" class="img-responsive">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <h5>Sara Passmore</h5>
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star.png" alt="star">
                                    <img src="images/note-detail/rating/star-white.png" alt="star">
                                    <p>Lorem ipsum dolor sit amet consec isicing elit. Facilis nostrum.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- book preview Ends -->

        <!-- popup msg -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="images/note-detail/close.png" alt="close">
                        </button>
                        <?php echo $modelTitle; ?>
                    </div>
                    <div class="modal-body">

                        <?php
                        echo $modelBodyDetail;
                        ?>

                    </div>
                </div>
            </div>
        </div>

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
                            <li><a href="#"><img src="images/header-footer/facebook.png" alt="Facebook"></a></li>
                            <li><a href="#"><img src="images/header-footer/twitter.png" alt="Twitter"></a></li>
                            <li> <a href="#"><img src="images/header-footer/linkedin.png" alt="LinkedIn"></a></li>
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
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!-- JS -->
        <script src="js/header/header.js"></script>

        </script>
    </body>

    </html>

<?php
}
if (!$queryResult) {
    die(mysqli_error($connection));
}
if(isset($_POST['downloadTheBook'])){
    echo "GEt FDOen";
}
if(isset($_GET['download'])){
    echo $_GET['download'];
}
?>