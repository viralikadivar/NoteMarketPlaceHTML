<?php
ob_start();
require "db_connection.php";
global $connection;
session_start();
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
    <link rel="stylesheet" href="css/search-notes.css?version=231250">

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
    <br><br><br>

    <!-- Search Main-->
    <section id="search-banner">
        <img class="img-responsive" src="images/search/banner.jpg" alt="Search Banner" id="search-bg-image">

        <!-- Overlay -->
        <div id="search-overlay"></div>

        <!-- Search Content -->
        <div class="container justify-content-center">
            <div class="row">
                <div id="search-content">
                    <div id="search-heading" class="text-center">
                        <h2>Search</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Main End -->

    <form action="search-notes.php" method="post">

        <!-- Search Fields -->
        <section id="search-field">
            <div class="container">
                <div class="row heading">
                    <div class="col-lg-12">
                        <h2>Search and Filter Notes</h2>
                    </div>
                </div>

                <div class="row">
                    <div id="filter-wrapper">

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <input type="text" name="searchBookName" class="form-control search-icon" id="filter-with-icon" placeholder="&ensp;&ensp;&ensp; Search notes here...">
                                <button type="submit" name="searchBook" style="display:none;"></button>

                            </div>
                        </div>

                        <div class="row" id="select-search-field">

                            <!-- Note Type  -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="dropdown seach-fields">
                                    <button class="form-control text-left" id="selectBookType" data-toggle="dropdown"></button>
                                    <ul class="dropdown-menu dropdown-from-db types" aria-labelledby="selectBookType" style="width:100%">
                                        <?php
                                        $queryType = "SELECT * FROM NoteTypes WHERE IsActive = 1 ";
                                        $noteType = mysqli_query($connection, $queryType);
                                        while ($type = mysqli_fetch_assoc($noteType)) {
                                            echo "<li value='" . $type['ID'] . "'>" . $type['Name'] . "</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <input type="hidden" name="type">

                            </div>

                            <!-- Book Categories  -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="dropdown seach-fields">
                                    <button class="form-control text-left" id="book-category" data-toggle="dropdown"></button>
                                    <ul class="dropdown-menu dropdown-from-db categories" aria-labelledby="book-category" style="width:100%">
                                        <?php
                                        $queryCategories = "SELECT * FROM NoteCategories WHERE IsActive = 1";
                                        $noteCategories = mysqli_query($connection, $queryCategories);
                                        while ($categories = mysqli_fetch_assoc($noteCategories)) {
                                            echo "<li value='" . $categories['ID'] . "'>" . $categories['Name'] . "</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <input type="hidden" name="category">

                            </div>

                            <!-- Book University  -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="dropdown seach-fields">
                                    <button class="form-control text-left" id="selectUniversity" data-toggle="dropdown"></button>
                                    <ul class="dropdown-menu dropdown-from-db university" aria-labelledby="selectUniversity" style="width:100%">
                                        <?php
                                        $queryUniversity = "SELECT DISTINCT UniversityName FROM NotesDetails WHERE IsActive = 1";
                                        $universityResult = mysqli_query($connection, $queryUniversity);
                                        while ($university = mysqli_fetch_assoc($universityResult)) {
                                            echo "<li value='" . $university['UniversityName'] . "'>" . $university['UniversityName'] . "</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <input type="hidden" name="universiy">

                            </div>

                            <!-- Book Course  -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="dropdown seach-fields">
                                    <button class="form-control text-left" id="selectCourse" data-toggle="dropdown"></button>
                                    <ul class="dropdown-menu dropdown-from-db course" aria-labelledby="selectCourse" style="width:100%">
                                        <?php
                                        $queryCourse = "SELECT DISTINCT Course FROM NotesDetails WHERE IsActive = 1";
                                        $courseResult = mysqli_query($connection, $queryCourse);
                                        while ($course = mysqli_fetch_assoc($courseResult)) {
                                            echo "<li value='" . $course['Course'] . "'>" . $course['Course'] . "</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <input type="hidden" name="course">

                            </div>

                            <!-- Book Country  -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="dropdown seach-fields">
                                    <button class="form-control text-left" id="selectCountry" data-toggle="dropdown"></button>
                                    <ul class="dropdown-menu dropdown-from-db countries" aria-labelledby="selectCountry" style="width:100%">
                                        <?php
                                        $queryCountry = "SELECT * FROM Countries WHERE IsActive = 1";
                                        $countryResult = mysqli_query($connection, $queryCountry);
                                        while ($country = mysqli_fetch_assoc($countryResult)) {
                                            echo "<li value='" . $country['ID'] . "'>" . $country['Name'] . "</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <input type="hidden" name="country">

                            </div>

                            <!-- Book Rating  -->
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="dropdown seach-fields">
                                    <button class="form-control text-left" id="selectBookRatings" data-toggle="dropdown"></button>
                                    <ul class="dropdown-menu dropdown-from-db rating" aria-labelledby="selectBookRatings" style="width:100%">
                                        <li value="1">1 +</li>
                                        <li value="2">2 +</li>
                                        <li value="3">3 +</li>
                                        <li value="4">4 +</li>
                                        <li value="5">5</li>
                                    </ul>
                                </div>

                                <input type="hidden" name="rating">

                            </div>

                        </div>
                    </div>
                </div>

        </section>
        <!-- Search Fields Ends -->

        <!-- Search Result -->
        <section id="search-result">

            <?php
            $noOFResultPerPage = 9;
            ?>
            <div class="container">

                <?php

                if (!isset($_GET['page'])) {
                    $currentPage = 1;
                } else {
                    $currentPage = (int)$_GET['page'];
                }
                $thisPAgeResult = ($currentPage - 1) * $noOFResultPerPage;

                $reultBooksQuery = 'SELECT * FROM NotesDetails WHERE IsActive = 1';
                $resultBookResult = mysqli_query($connection, $reultBooksQuery);
                $totalSearhedBooks = mysqli_num_rows($resultBookResult);




                ?>

                <div class="row heading">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2>Total <?php echo $totalSearhedBooks; ?> notes</h2>
                    </div>
                </div>

                <div class="row">

                    <?php

                        $showBooksQuery = 'SELECT * FROM NotesDetails WHERE IsActive = 1 AND Status = 9 LIMIT ' . $thisPAgeResult . ',' . $noOFResultPerPage;
                        $showBookResult = mysqli_query($connection, $showBooksQuery);
                        
                        while ($bookDetails = mysqli_fetch_assoc($showBookResult)) {

                            $bookID = $bookDetails['ID'];
                            $bookTitle = $bookDetails['Title'];
                            $bookUniversity = $bookDetails['UniversityName'];
                            $bookRatings = $bookDetails['Ratings'];
                            $bookPages = $bookDetails['NumberofPages'];
                            $imageSRC = $bookDetails['DisplayPicture'];
                            $countryID = $bookDetails['Country'];
                            $totalRatings = 0;
                            $spamReports = 0;

                            $getCountry = mysqli_query($connection, "SELECT * FROM Countries WHERE ID = $countryID ");
                            $getCountryResult = mysqli_fetch_assoc($getCountry);
                            $country = $getCountryResult['Name'];

                            $imageSRC = str_replace('../', '', $imageSRC);

                            $publishedDate = $bookDetails['PublishedDate'];
                            $dateTime = strtotime($publishedDate);
                            $publishedDate = date("D, M d Y", $dateTime);

                            $totalRatingResult = mysqli_query($connection, "SELECT * FROM NotesReviews WHERE NoteID = $bookID ");
                            if ($totalRatingResult) {
                                $totalRatings = mysqli_num_rows($totalRatingResult);
                            } else {
                                $totalRatings = "not found";
                            }

                            $totalSpamResult = mysqli_query($connection, "SELECT * FROM ReportedIssues WHERE NoteID = $bookID ");
                            if ($totalSpamResult) {
                                $spamReports = mysqli_num_rows($totalSpamResult);
                            }

                            echo '<div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="book-info">
                                        <img src="' . $imageSRC . '" class="img-responsive book-img" alt="Book">

                                        <div class="book-short-info">

                                            <div class="book-heading">
                                                <a class="link-to-note-preview">
                                                    <h5>' . $bookTitle . '</h5>
                                                </a>

                                                <input type="hidden" name="noteID" value="' . $bookID . '">
                                                <input type="hidden" name="getNoteID">
                                                <button type="submit" name="getNoteDetail" style="visibility:hidden">

                                            </div>

                                            <ul>
                                                <li>
                                                    <div class="book-info-img"><img src="images/search/university.png" alt="University">
                                                    </div><span>' . $bookUniversity . ', ' . $country . '</span>
                                                </li>
                                                <li>
                                                    <div class="book-info-img"><img src="images/search/pages.png" alt="Book"></div>
                                                    <span>' . $bookPages . ' Pages</span>
                                                </li>
                                                <li>
                                                    <div class="book-info-img"><img src="images/search/calendar.png" alt="calendar">
                                                    </div><span>' . $publishedDate . '</span>
                                                </li>
                                                <li>
                                                    <div class="book-info-img"><img src="images/search/flag.png" alt="Report"></div>
                                                    <span>' . $spamReports . ' Users marked this as
                                                        inapropriate</span>
                                                </li>
                                            </ul>

                                            <div class="row star">
                                                <div class="col-lg-5 col-md-5 col-sm-5">
                                                    <img src="images/search/star.png" alt="Star">
                                                    <img src="images/search/star.png" alt="Star">
                                                    <img src="images/search/star.png" alt="Star">
                                                    <img src="images/search/star.png" alt="Star">
                                                    <img src="images/search/star.png" alt="Star">
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-sm-7">' . $totalRatings . ' reviews</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>';
                        }

                    ?>

                </div>

            </div>
        </section>
        <!-- Search Result Ends -->

        <!-- Pagination -->
        <section id="pagination">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item arrow">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&#8249;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php
                    $noOfPages = ceil($totalSearhedBooks / $noOFResultPerPage);
                    for ($page = 1; $page <= $noOfPages; $page++) {
                        echo '<li class="page-item "><a class="page-link" href="search-notes.php?page=' . $page . '">' . $page . '</a></li>';
                    }
                    ?>
                    <?php ?>
                    <li class="page-item arrow">
                        <a class="page-link text-center" href="#" aria-label="Next">
                            <span aria-hidden="true">&#8250;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
        <!-- paginaation Main Ends -->

    </form>

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

    <script src="js/header/header.js"></script>
    <script src="js/search-notes.js?version=1454562"></script>

</body>

</html>
<?php

if (isset($_POST['getNoteDetail'])) {

    $noteID = $_POST['getNoteID'];
    $_SESSION['noteID'] = $noteID;

    header('Location:notes-detail.php');
}
ob_end_flush();
?>