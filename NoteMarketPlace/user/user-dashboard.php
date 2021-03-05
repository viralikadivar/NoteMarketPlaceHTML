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

    <!-- datatable -->
    <link rel="stylesheet" href="../css/data-table/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/user/user-dashboard.css">

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
                    <li class="nav-item"><a class="nav-link" href="search-notes.html">Search Notes</a></li>
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

    <!-- for removing default navbar overlay -->
    <br><br><br>

    <section id="dashboard">
        <div class="container">

            <!-- main heading  -->
            <div class="row dashboard-field">
                <div class="col-lg-6 col-md-6 col-sm-6 heading">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 text-right add-notes">
                    <a href="add-notes.php" class="btn" role="button">Add Note</a>
                </div>
            </div>

            <!-- main field  -->
            <div class="row text-center">
                <div class="col-lg-6 col-md-12 col-sm-12 dashboard-numbers">

                    <div class="row">
                        <!-- my earning -->
                        <div class="col-lg-4 col-md-4 col-sm-4 text-left earning heading">
                            <img src="../images/dashboard/my-earning.png" alt="Sell">
                            <h3 style="font-weight: 600;">My Earning</h3>
                        </div>

                        <!-- number of sold -->
                        <div class="col-lg-4 col-md-4 col-sm-4 earning heading">
                            <h3>100</h3>
                            <p>Number of Notes Sold</p>
                        </div>

                        <!-- money Earned  -->
                        <div class="col-lg-4 col-md-4 col-sm-4 earning heading">
                            <h3>$10,00,000</h3>
                            <p>Money Earned</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 dashboard-count">

                    <dviv class="row">

                        <!-- my downloads  -->
                        <div class="col-lg-4 col-md-4 col-sm-4 heading">
                            <div class="my-notes">
                                <h3>38</h3>
                                <p>My Downloads</p>
                            </div>
                        </div>

                        <!-- my rejected Notes -->
                        <div class="col-lg-4 col-md-4 col-sm-4 heading">
                            <div class="my-notes">
                                <h3>12</h3>
                                <p>My Rejected Notes</p>
                            </div>
                        </div>

                        <!-- Buyers request  -->
                        <div class="col-lg-4 col-md-4 col-sm-4 heading">
                            <div class="my-notes">
                                <h3>102</h3>
                                <p>Buyer Request</p>
                            </div>
                        </div>

                    </dviv>

                </div>



            </div>

            <!-- inprogress notes  -->
            <div class="row table-data">

                <div class="col-lg-12 col-md-12 col-sm-12 heading p-0">
                    <h4>In Progress Notes</h4>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12  p-0">
                    <!-- inprogress table -->
                    <div class="table-responsive">
                        <table class="table dashboard-table-1">
                            <thead>
                                <tr>
                                    <th scope="col">Added Date</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>09-10-2020</td>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>Draft</td>
                                    <td>
                                        <img src="../images/form/edit.png" alt="edit"> &emsp14;
                                        <img src="../images/form/delete.png" alt="delete">
                                    </td>
                                </tr>

                                <tr>
                                    <td>10-10-2020</td>
                                    <td>Accounts</td>
                                    <td>Commerce</td>
                                    <td>In Review</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                                <tr>
                                    <td>11-10-2020</td>
                                    <td>Social Studies</td>
                                    <td>Social</td>
                                    <td>Submitted</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                                <tr>
                                    <td>12-10-2020</td>
                                    <td>AI</td>
                                    <td>IT</td>
                                    <td>Submitted</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                                <tr>
                                    <td>13-10-2020</td>
                                    <td>Lorem ipsum dolor sit ametreuersure</td>
                                    <td>Lorem</td>
                                    <td>Draft</td>
                                    <td>
                                        <img src="../images/form/edit.png" alt="edit"> &emsp14;
                                        <img src="../images/form/delete.png" alt="delete">
                                    </td>
                                </tr>

                                <tr>
                                    <td>14-10-2020</td>
                                    <td>Data Mining</td>
                                    <td>Science</td>
                                    <td>Draft</td>
                                    <td>
                                        <img src="../images/form/edit.png" alt="edit"> &emsp14;
                                        <img src="../images/form/delete.png" alt="delete">
                                    </td>
                                </tr>

                                <tr>
                                    <td>15-10-2020</td>
                                    <td>Accounts</td>
                                    <td>Commerce</td>
                                    <td>In Review</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                                <tr>
                                    <td>16-10-2020</td>
                                    <td>Social Science</td>
                                    <td>Social</td>
                                    <td>Submitted</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                                <tr>
                                    <td>17-10-2020</td>
                                    <td>C++</td>
                                    <td>IT</td>
                                    <td>Submitted</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                                <tr>
                                    <td>18-10-2020</td>
                                    <td>Web Development</td>
                                    <td>IT</td>
                                    <td>Draft</td>
                                    <td>
                                        <img src="../images/form/edit.png" alt="edit"> &emsp14;
                                        <img src="../images/form/delete.png" alt="delete">
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- published notes  -->
            <div class="row table-data">

                <div class="col-lg-12 col-md-12 col-sm-12  heading p-0">
                    <h4>Published Notes</h4>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12  p-0">
                    <!-- published table  -->
                    <div class="table-responsive">
                        <table class="table dashboard-table-2">
                            <thead>
                                <tr>
                                    <th scope="col">Added Date</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Sell Type</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>09-10-2020</td>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>Paid</td>
                                    <td>$575</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                                <tr>
                                    <td>10-10-2020</td>
                                    <td>Accounts</td>
                                    <td>Commerce</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                                <tr>
                                    <td>11-10-2020</td>
                                    <td>Social Studies</td>
                                    <td>Social</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                                <tr>
                                    <td>12-10-2020</td>
                                    <td>AI</td>
                                    <td>IT</td>
                                    <td>Paid</td>
                                    <td>$3542</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                                <tr>
                                    <td>13-10-2020</td>
                                    <td>Lorem ipsum dolor sit ametreuersure</td>
                                    <td>Lorem</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>
                                        <img src="../images/form/eye.png" alt="view">
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
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
    <script src="../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- data table  -->
    <script src="../js/data-table/jquery.dataTables.js"></script>
    <script src="../js/header/header.js"></script>
    <script src="../js/user/user-dashboard.js"></script>

</body>

</html>