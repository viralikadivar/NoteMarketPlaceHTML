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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/search-notes.css">

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->

    <!-- Header -->
    <header id="header">
        <nav class="navbar white-navbar navbar-expand-lg">
            <div class="container navbar-wrapper">
                <a class="navbar-brand" href="../index.php">
                    <img class="img-responsive" src="../images/logo/logo-dark.png" alt="logo">
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active"><a class="nav-link" href="search-notes.php">Search Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="add-notes.php">Sell Your Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="buyers-request.php">Buyer Requests</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                        <li class="nav-item">
                            <div class="dropdown user-image">
                                <img id="user-menu" data-toggle="dropdown" src="../images/header-footer/user-img.png"
                                    alt="User">
                                <div class="dropdown-menu" aria-labelledby="user-menu">
                                    <a class="dropdown-item" href="user-profile.php">My Profile</a>
                                    <a class="dropdown-item" href="my-download.php">My Downloads</a>
                                    <a class="dropdown-item" href="my-sold-notes.php">My Sold Notes</a>
                                    <a class="dropdown-item" href="my-rejected-notes.php">My Rejected Notes</a>
                                    <a class="dropdown-item" href="change-password.php">Change Password</a>
                                    <a class="dropdown-item" href="../index.php" id="logout">Logout</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item loginNavTab"><a class="nav-link" href="../index.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>



        <nav class="navbar mobile-navbar navbar-expand-lg justify-content-end">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span id="open" class="navbar-toggler-icon">&#9776;</span>
                <span id="close" class="navbar-toggler-icon">&times;</span>
            </button>
        </nav>
    </header>
    <!-- Header Ends -->

    <!-- for removing navbars overlay -->
    <br><br><br>

    <!-- Search Main-->
    <section id="search-banner">
        <img class="img-responsive" src="../images/search/banner.jpg" alt="Search Banner" id="search-bg-image">

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
                            <input type="text" class="form-control search-icon" id="filter-with-icon"
                                placeholder="&ensp;&ensp;&ensp; Search notes here...">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="dropdown seach-fields">
                                <button class="form-control text-left"><span>Select type</span><img
                                        src="../images/form/arrow-down.png" alt="Down"></button>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="dropdown seach-fields">
                                <button class="form-control text-left"><span>Select category</span> <img
                                        src="../images/form/arrow-down.png" alt="Down"></button>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="dropdown seach-fields">
                                <button class="form-control text-left"><span>Select university</span><img
                                        src="../images/form/arrow-down.png" alt="Down"></button>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="dropdown seach-fields">
                                <button class="form-control text-left"><span>Select course</span><img
                                        src="../images/form/arrow-down.png" alt="Down"></button>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="dropdown seach-fields">
                                <button class="form-control text-left"> <span>Select country</span><img
                                        src="../images/form/arrow-down.png" alt="Down"></button>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="dropdown seach-fields">
                                <button class="form-control text-left"><span>Select rating</span><img
                                        src="../images/form/arrow-down.png" alt="Down"></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    <!-- Search Fields Ends -->

    <!-- Search Result -->
    <section id="search-result">
        <div class="container">
            <div class="row heading">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Total 18 notes</h2>
                </div>
            </div>

            <div class="row">

                <!-- Book Result 01 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="book-info">
                        <img src="../images/search/1.jpg" class="img-responsive book-img" alt="Book">

                        <div class="book-short-info">
                            <div class="book-heading">
                                <a class="link-to-note-preview" href="notes-detail.php">
                                    <h5>Computer Operating System-Final Exam Book With Paper Solution</h5>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/university.png"
                                            alt="University"></div><span>University of
                                        California, US</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/pages.png" alt="Book"></div>
                                    <span>204 Pages</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/calendar.png" alt="calendar">
                                    </div><span>Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/flag.png" alt="Report"></div>
                                    <span>5 Users marked this as
                                        inapropriate</span>
                                </li>
                            </ul>
                            <div class="row star">
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7">100 reviews</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Result 02 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="book-info">
                        <img src="../images/search/2.jpg" class="img-responsive book-img" alt="Book">
                        <div class="book-short-info">
                            <div class="book-heading">
                                <a class="link-to-note-preview" href="notes-detail.php">
                                    <h5>Computer Science</h5>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/university.png"
                                            alt="University"></div><span>University of
                                        California, US</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/pages.png" alt="Book"></div>
                                    <span>204 Pages</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/calendar.png" alt="calendar">
                                    </div><span>Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/flag.png" alt="Report"></div>
                                    <span>5 Users marked this as
                                        inapropriate</span>
                                </li>
                            </ul>
                            <div class="row star">
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star-white.png" alt="Star">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7">100 reviews</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Result 03 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="book-info">
                        <img src="../images/search/3.jpg" class="img-responsive book-img" alt="Book">

                        <div class="book-short-info">
                            <div class="book-heading">
                                <a class="link-to-note-preview" href="notes-detail.php">
                                    <h5>Basic Computer Engineering Tech India Publication Series</h5>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/university.png"
                                            alt="University"></div><span>University of
                                        California, US</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/pages.png" alt="Book"></div>
                                    <span>204 Pages</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/calendar.png" alt="calendar">
                                    </div><span>Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/flag.png" alt="Report"></div>
                                    <span>5 Users marked this as
                                        inapropriate</span>
                                </li>
                            </ul>
                            <div class="row star">
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star-white.png" alt="Star">
                                    <img src="../images/search/star-white.png" alt="Star">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7">100 reviews</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Result 04 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="book-info">
                        <img src="../images/search/4.jpg" class="img-responsive book-img" alt="Book">

                        <div class="book-short-info">
                            <div class="book-heading">
                                <a class="link-to-note-preview" href="notes-detail.php">
                                    <h5>Computer Science Illuminted-Seventh Edition</h5>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/university.png"
                                            alt="University"></div><span>University of
                                        California, US</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/pages.png" alt="Book"></div>
                                    <span>204 Pages</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/calendar.png" alt="calendar">
                                    </div><span>Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/flag.png" alt="Report"></div>
                                    <span>5 Users marked this as
                                        inapropriate</span>
                                </li>
                            </ul>
                            <div class="row star">
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7">100 reviews</div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Book Result 05 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="book-info">
                        <img src="../images/search/5.jpg" class="img-responsive book-img" alt="Book">

                        <div class="book-short-info">
                            <div class="book-heading">
                                <a class="link-to-note-preview" href="notes-detail.php">
                                    <h5>The Principle of Computer Hardware-Oxford</h5>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/university.png"
                                            alt="University"></div><span>University of
                                        California, US</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/pages.png" alt="Book"></div>
                                    <span>204 Pages</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/calendar.png" alt="calendar">
                                    </div><span>Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/flag.png" alt="Report"></div>
                                    <span>5 Users marked this as
                                        inapropriate</span>
                                </li>
                            </ul>
                            <div class="row star">
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star-white.png" alt="Star">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7">100 reviews</div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Book Result 06 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="book-info">
                        <img src="../images/search/6.jpg" class="img-responsive book-img" alt="Book">

                        <div class="book-short-info">
                            <div class="book-heading">
                                <a class="link-to-note-preview" href="notes-detail.php">
                                    <h5>The Computer Book</h5>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/university.png"
                                            alt="University"></div><span>University of
                                        California, US</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/pages.png" alt="Book"></div>
                                    <span>204 Pages</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/calendar.png" alt="calendar">
                                    </div><span>Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/flag.png" alt="Report"></div>
                                    <span>5 Users marked this as
                                        inapropriate</span>
                                </li>
                            </ul>
                            <div class="row star">
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star-white.png" alt="Star">
                                    <img src="../images/search/star-white.png" alt="Star">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7">100 reviews</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Result 07 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="book-info">
                        <img src="../images/search/1.jpg" class="img-responsive book-img" alt="Book">

                        <div class="book-short-info">
                            <div class="book-heading">
                                <a class="link-to-note-preview" href="notes-detail.php">
                                    <h5>Computer Operating System-Final Exam Book With Paper Solution</h5>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/university.png"
                                            alt="University"></div><span>University of
                                        California, US</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/pages.png" alt="Book"></div>
                                    <span>204 Pages</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/calendar.png" alt="calendar">
                                    </div><span>Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/flag.png" alt="Report"></div>
                                    <span>5 Users marked this as
                                        inapropriate</span>
                                </li>
                            </ul>
                            <div class="row star">
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7">100 reviews</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Result 08 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="book-info">
                        <img src="../images/search/2.jpg" class="img-responsive book-img" alt="Book">

                        <div class="book-short-info">
                            <div class="book-heading">
                                <a class="link-to-note-preview" href="notes-detail.php">
                                    <h5>Computer Science</h5>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/university.png"
                                            alt="University"></div><span>University of
                                        California, US</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/pages.png" alt="Book"></div>
                                    <span>204 Pages</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/calendar.png" alt="calendar">
                                    </div><span>Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/flag.png" alt="Report"></div>
                                    <span>5 Users marked this as
                                        inapropriate</span>
                                </li>
                            </ul>
                            <div class="row star">
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star-white.png" alt="Star">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7">100 reviews</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Result 09 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="book-info">
                        <img src="../images/search/3.jpg" class="img-responsive book-img" alt="Book">

                        <div class="book-short-info">
                            <div class="book-heading">
                                <a class="link-to-note-preview" href="notes-detail.php">
                                    <h5>Basic Computer Engineering Tech India Publication Series</h5>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/university.png"
                                            alt="University"></div><span>University of
                                        California, US</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/pages.png" alt="Book"></div>
                                    <span>204 Pages</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/calendar.png" alt="calendar">
                                    </div><span>Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="../images/search/flag.png" alt="Report"></div>
                                    <span>5 Users marked this as
                                        inapropriate</span>
                                </li>
                            </ul>
                            <div class="row star">
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star.png" alt="Star">
                                    <img src="../images/search/star-white.png" alt="Star">
                                    <img src="../images/search/star-white.png" alt="Star">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7">100 reviews</div>
                            </div>
                        </div>
                    </div>
                </div>

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
                <li class="active page-item "><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
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

    <script src="../js/header/header.js"></script>


</body>

</html>