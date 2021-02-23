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


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/header-footer/header.css">
    <link rel="stylesheet" href="css/header-footer/footer.css">
    <link rel="stylesheet" href="css/contact-us.css">


</head>

<body>

    <!-- Header -->
    <header id="header">
        <nav class="navbar white-navbar navbar-expand-lg">
            <div class="container navbar-wrapper">
                <a class="navbar-brand" href="index.html">
                    <img class="img-responsive" src="images/logo/logo-dark.png" alt="logo">
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active"><a class="nav-link" href="search-notes.html">Search Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.html">Sell Your Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                        <li class="nav-item active"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                        <li class="nav-item loginNavTab"><a class="nav-link" href="login.html">Login</a></li>
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

    
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->

    <!-- FAQ Banner-->
    <section id="contact-us">
        <img class="img-responsive" src="images/FAQ/banner.jpg" alt="FAQ Banner" id="contact-us-bg-image">

        <!-- Overlay -->
        <div id="contact-us-overlay"></div>
    </section>

    <!-- Contact Heading -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="contact-us-heading" class="text-center">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </div>

    <section id="contact-us-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 heading">
                    <h2>Get In Touch</h2>
                    <h4>Let us know how to get back to you</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form>
                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="fullName" required>Full Name *</label>
                            <input type="text" class="form-control" id="fullName" placeholder="Enter Your Full Name">
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="inputEmail" required>Email Address *</label>
                            <input type="email" class="form-control" id="inputEmail"
                                placeholder="Enter your email address">
                        </div>

                        <!-- Enter Password -->
                        <div class="form-group">
                            <label for="subject" required>Subject *</label>
                            <input type="text" class="form-control" id="subject" placeholder="Enter your subject">
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <!-- Text area -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="comments-questions" required>Comments / Questions *</label>
                            </div>
                        </div>

                        <textarea placeholder="Comments..." name="comments" id="comments-questions"></textarea>
                    </div>

                </div>
                <div class="col-lg-12">
                    <button type="submit" class="submit"><span class="text-center">Submit</span></button>
                </div>
            </div>
        </div>

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

<script src="js/header/header.js"></script>
    <!-- <script>
        $("input").click("fast", function () {
            $(this).css("border", "none");
            $(this).css("box-shadow", "1px 1px 1.5px 1.5px #6255a5");
        });
        $("textarea").click(function () {
            $(this).css("outline", "none");
            $(this).css("box-shadow", "1px 1px 1.5px 1.5px #6255a5");
        });
    </script> -->


</body>

</html>