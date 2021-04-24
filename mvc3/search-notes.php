<?php
ob_start();
require "db_connection.php";
global $connection;
session_start();
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
    <link rel="stylesheet" href="css/search-notes.css?version=2312225250">

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
                                        $noteList = "<li value=''>All Types</li>";
                                        $queryType = "SELECT * FROM NoteTypes WHERE IsActive = 1 ";
                                        $noteType = mysqli_query($connection, $queryType);
                                        while ($type = mysqli_fetch_assoc($noteType)) {
                                            $noteList .=  "<li value='" . $type['ID'] . "'>" . $type['Name'] . "</li>";
                                        }
                                        echo $noteList;
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
                                        $categoryList = "<li value=''>All Categories</li>";
                                        $queryCategories = "SELECT * FROM NoteCategories WHERE IsActive = 1";
                                        $noteCategories = mysqli_query($connection, $queryCategories);
                                        while ($categories = mysqli_fetch_assoc($noteCategories)) {
                                            $categoryList .= "<li value='" . $categories['ID'] . "'>" . $categories['Name'] . "</li>";
                                        }
                                        echo  $categoryList;
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
                                        $universityList = "<li value=''>All Universities</li>";
                                        $queryUniversity = "SELECT DISTINCT UniversityName FROM NotesDetails WHERE IsActive = 1";
                                        $universityResult = mysqli_query($connection, $queryUniversity);
                                        while ($university = mysqli_fetch_assoc($universityResult)) {
                                            $universityList .=  "<li value='" . $university['UniversityName'] . "'>" . $university['UniversityName'] . "</li>";
                                        }
                                        echo  $universityList;
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
                                        $courseList = "<li value=''>All Courses</li>";
                                        $queryCourse = "SELECT DISTINCT Course FROM NotesDetails WHERE IsActive = 1";
                                        $courseResult = mysqli_query($connection, $queryCourse);
                                        while ($course = mysqli_fetch_assoc($courseResult)) {
                                            $courseList .= "<li value='" . $course['Course'] . "'>" . $course['Course'] . "</li>";
                                        }
                                        echo $courseList;
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
                                        $counrtyList = "<li value=''>All Countries</li>";
                                        $queryCountry = "SELECT * FROM Countries WHERE IsActive = 1";
                                        $countryResult = mysqli_query($connection, $queryCountry);
                                        while ($country = mysqli_fetch_assoc($countryResult)) {
                                            $counrtyList .= "<li value='" . $country['ID'] . "'>" . $country['Name'] . "</li>";
                                        }
                                        echo $counrtyList;
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
                                        <li value="">Any Ratings</li>
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

        <!-- Search Result Ends -->
        <section id="search-result"></section>
    

    </form>

    <!-- Footer  -->
    <?php 
        include "footer.php";
    ?>
    <!-- Footer Ends -->

    <!-- ================================================
                        JS Files 
    ================================================= -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <script src="js/header/header.js?version=551542"></script>
    <script src="js/search-notes.js?version=2245112585512"></script>

</body>

</html>
<?php

if (isset($_POST['getNoteDetail'])) {

    $noteID = $_POST['getNoteID'];
    $_SESSION['noteID'] = $noteID;

    header('Location:notes-detail.php');
}
ob_flush();
?>