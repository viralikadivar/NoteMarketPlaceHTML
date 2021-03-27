<!DOCTYPE html>
<html lang="en">

<head>

    <!-- important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/header-footer/user-header.css">
    <link rel="stylesheet" href="css/header-footer/footer.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->

    <!-- Header -->
    <header id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container navbar-wrapper">
                <a class="navbar-brand" href="#">
                    <img class="img-responsive" src="images/logo/logo-dark.png" alt="logo">
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="search-notes.php">Search Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Sell Your Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                        <li class="nav-item loginNavTab"><a class="nav-link" href="login.php">Login</a></li>
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

    <!-- Home Main-->
    <section id="home">
        <img class="img-responsive" src="images/homepage/banner.jpg" alt="Home Background" id="home-bg-image">

        <!-- Overlay -->
        <div id="home-overlay"></div>

        <!-- Home Content Main -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div id="home-content">
                        <div id="home-heading">
                            <h2 id="home-heading-1">Download Free/Paid Notes</h2>
                            <h2 id="home-heading-2">or Sale Your Books</h2>
                        </div>
                        <div id="home-paragraph">
                            <p>Lorem ipsum dolor onr ahuh kurat sit amet shuufnn fhnf mgigz color type nst consectetur
                                adipisic,itae deleniti fugit magni nam blanditiis .</p>
                        </div>
                        <div id="home-btn">
                            <a href="#" title="Learn More" role="button">Learn More</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Main Ends -->

    <!-- Home About -->
    <section id="home-about">
        <div class="container">

            <div class="row">

                <!-- About Left Side -->
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div id="about-left">
                        <h2>About<br>NotesMarketPlace</h2>
                    </div>

                </div>

                <!-- About Right Side -->
                <div class="col-lg-7 col-md-12 col-sm-12">

                    <div id="about-right">
                        <p>Lorem ipsum dolor sit amet, icing elit. Sapiente aspernatur harum libero et nostrum sequi
                            consequatur, tempore accusamus ab esse, voluptatem laudantium voluptas rerum? Laborum id ad
                            alias saepeSapiente aspernatur harum libero et nostrum sequi consequatur, tempore accusamus
                            ab esse, nemo,alias saepe ne consequatur.</p>

                        <p>Lorem ipsum dolor sit amet. Tenetur asperiores ad culpa similique, ratione dicta. Cumque,
                            officia. Velit et inventore hic, unde, eum ea! Vitae dolores culpa molestiam libero et
                            nostrum sequi consequ accusamus ab esse,s, in ratione.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- Home About Ends -->

    <!-- Home Works -->
    <section id="home-work">
        <div class="container">

            <div class="row heading justify-content-center">
                <h2>How it Works</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 home-work-wrapper text-center">
                    <div class="rounded-image">
                        <img src="images/homepage/download.png" class="img-responsive" alt="Download">
                    </div>
                    <h4>Download Free/Paid Notes</h4>
                    <h5>Get Material for your<br>Course etc.</h5>
                    <div class="home-work-btn">
                        <a href="#" title="Download" role="button">Download</a>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 home-work-wrapper text-center">
                    <div class="rounded-image">
                        <img src="images/homepage/seller.png" class="img-responsive" alt="Download">
                    </div>
                    <h4>Seller</h4>
                    <h5>Upload and Download Courses<br>and Materials etc.</h5>
                    <div class="home-work-btn">
                        <a href="#" title="Sell books" role="button">Sell Books</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Works -->

    <!-- Home Customer -->
    <section id="home-customers">
        <div class="container">
            <div class="row heading justify-content-center text-center">
                <h2>What our Customers are Saying</h2>
            </div>
            <div class="row">

                <!-- Customer 01 -->
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="home-costomer-wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <img src="images/homepage/customers/customer-1.png" alt="Customer"
                                    class="img-responsive  ">
                            </div>
                            <div class="col-lg-9 col-md-10 col-sm-10">
                                <h4>Walter Meller</h4>
                                <h5>Founder & CEO, Matrix Group</h5>
                            </div>
                        </div>

                        <p>"Lorem ipsum dolor sit, amet consectetur adipis icing elit,
                            sint corru pti velit aliquid hic minima laborum laud antium,
                            maxime quibu sd am!Iu con rehe degerno idiga nderit cum."
                        </p>
                    </div>
                </div>

                <!-- Customer 02 -->
                <div class="col-lg-6 col-md-12ccol-sm-12">
                    <div class="home-costomer-wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <img src="images/homepage/customers/customer-2.png" alt="Customer"
                                    class="img-responsive  ">
                            </div>
                            <div class="col-lg-9 col-md-10 col-sm-10">
                                <h4>Jonnie Riley</h4>
                                <h5>Rmployee, Curious Snacks</h5>
                            </div>
                        </div>

                        <p>"Lorem ipsum dolor sit, amet consectetur adipis icing elit,
                            sint corru pti velit aliquid hic minima laborum laud antium,
                            maxime quibu sd am!Iu con rehe degerno idiga nderit cum."
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Customer 03 -->
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="home-costomer-wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <img src="images/homepage/customers/customer-3.png" alt="Customer"
                                    class="img-responsive  ">
                            </div>
                            <div class="col-lg-9 col-md-10 col-sm-10">
                                <h4>Amilia Luna</h4>
                                <h5>Teacher, Saint Joseph High School</h5>
                            </div>
                        </div>
                        <p>"Lorem ipsum dolor sit, amet consectetur adipis icing elit,
                            sint corru pti velit aliquid hic minima laborum laud antium,
                            maxime quibu sd am!Iu con rehe degerno idiga nderit cum."
                        </p>
                    </div>
                </div>

                <!-- Customer 04 -->
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="home-costomer-wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <img src="images/homepage/customers/customer-4.png" alt="Customer"
                                    class="img-responsive  ">
                            </div>
                            <div class="col-lg-9 col-md-10 col-sm-10">
                                <h4>Daniel Cardos</h4>
                                <h5>Software Engineer, Infinitum Compony</h5>
                            </div>
                        </div>

                        <p>"Lorem ipsum dolor sit, amet consectetur adipis icing elit,
                            sint corru pti velit aliquid hic minima laborum laud antium,
                            maxime quibu sd am!Iu con rehe degerno idiga nderit cum."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Customer Ends -->

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
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/script.js"></script>

</body>

</html>