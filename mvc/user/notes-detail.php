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
    <link rel="stylesheet" href="../css/notes-detail.css">

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
            <a class="navbar-brand" href="../index.html">
                <img class="img-responsive" src="../images/logo/logo-dark.png" alt="logo">
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item  active"><a class="nav-link" href="search-notes.html">Search Notes</a></li>
                    <li class="nav-item"><a class="nav-link" href="add-notes.html">Sell Your Notes</a></li>
                    <li class="nav-item"><a class="nav-link" href="buyers-request.html">Buyer Requests</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                    <li class="nav-item">
                        <div class="dropdown user-image">
                            <img id="user-menu" data-toggle="dropdown" src="../images/header-footer/user-img.png"
                                alt="User">
                            <div class="dropdown-menu" aria-labelledby="user-menu">
                                <a class="dropdown-item" href="user-profile.html">My Profile</a>
                                <a class="dropdown-item" href="my-download.html">My Downloads</a>
                                <a class="dropdown-item" href="my-sold-notes.html">My Sold Notes</a>
                                <a class="dropdown-item" href="my-rejected-notes.html">My Rejected Notes</a>
                                <a class="dropdown-item" href="change-password.html">Change Password</a>
                                <a class="dropdown-item" href="../index.html" id="logout">Logout</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item loginNavTab"><a class="nav-link" href="../index.html">Logout</a></li>
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
                                <img src="../images/note-detail/1.jpg" alt="Book" class="img-responsive">
                            </div>
                        </div>

                        <!-- book information -->
                        <div class="col-lg-8  col-md-8 col-sm-8 heading">
                            <h2>Computer Science</h2>
                            <h4>Science</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates excepturi hic vo
                                luptas dolorem, reiciendis recusandae quis dolor nam possimus quo offic
                                ia issimos aut mollitia. Praesentium, iste accusamus</p>
                            <!-- Button trigger modal -->
                            <button type="submit" data-toggle="modal" data-target="#exampleModalScrollable"><a
                                    href="#">download/&#36;15</a></button>
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
                            <h5>University of California</h5>
                            <h5>United States</h5>
                            <h5>Computer Engineering</h5>
                            <h5>248705</h5>
                            <h5>Mr.Richard Brown</h5>
                            <h5>277</h5>
                            <h5>November 25 2020</h5>
                            <h5 class="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star-white.png" alt="star">
                                100 Reviews
                            </h5>

                        </div>

                        <!-- inappropriate  marked reviews -->
                        <div class="col-lg-12 " id="report-spam">
                            <h6>5 Users marked this note as inappropriate</h6>
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
                           responsive-wrapper-padding-bottom-90pct"
                        style="-webkit-overflow-scrolling: touch; overflow: auto;">
                        <iframe src="../images/note-detail/notes-preview.pdf#toolbar=0"></iframe>
                    </div>
                </div>
                <!-- book review -->
                <div class="col-lg-7 col-md-12 col-sm-12 heading">
                    <h3>Customer Review</h3>
                    <div class="customer-wrapper">
                        <!-- Customer 01 -->
                        <div class="row customer-review">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <img class="img-responsive" src="../images/note-detail/reviewer-1.png" alt="Customer">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <h5>Richard Brown</h5>
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star-white.png" alt="star">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dignissimos nostrum
                                    et debitis quod. Consequuntu</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Customer 02 -->
                        <div class="row customer-review">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <img src="../images/note-detail/reviewer-2.png" alt="Customer" class="img-responsive">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <h5>Alice Ortiaz</h5>
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star-white.png" alt="star">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dignissimos nostrum
                                    et debitis quod. Consequuntu</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Customer 03 -->
                        <div class="row customer-review">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <img src="../images/note-detail/reviewer-3.png" alt="Customer" class="img-responsive">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <h5>Sara Passmore</h5>
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star.png" alt="star">
                                <img src="../images/note-detail/rating/star-white.png" alt="star">
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
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="../images/note-detail/close.png" alt="close">
                    </button>
                    <img id="done" class="img-responsive" src="../images/note-detail/SUCCESS.png" alt="Done">
                    <h2 class="modal-title" id="exampleModalScrollableTitle">Thank you for purchasing!</h2>
                </div>
                <div class="modal-body">
                    <h4>Dear Smith,</h4>
                    <p>
                        As this is paid notes - you need to pay the amount to seller offline in order to download the
                        note.
                        We will send Seller an email that you want to download this note. Seller may contact you further
                        for payment process completion.
                    </p>
                    <p>
                        In case, you have urgency,
                        <br>
                        please contact us on +9195377345959.
                    </p>
                    <p>
                        Once Seller receives the payment and acknowledge us - selected notes you can see over my
                        downloads tab for download.
                    </p>
                    <p>
                        Have a good day.
                    </p>
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

    <!-- JS -->
    <script src="../js/header/header.js"></script>

    </script>
</body>

</html>