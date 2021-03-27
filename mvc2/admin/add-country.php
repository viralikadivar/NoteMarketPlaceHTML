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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/field-add.css">

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
                        <li class="nav-item"><a class="nav-link" href="admin-dashboard.html">Dashboard</a></li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <div id="notes-menu" data-toggle="dropdown">Notes</div>
                                <div class="dropdown-menu" aria-labelledby="notes-menu">
                                    <a class="dropdown-item" href="notes-under-review.html">Notes Under Review</a>
                                    <a class="dropdown-item" href="published-notes.html">Published Notes</a>
                                    <a class="dropdown-item" href="downloaded-notes.html">Downloaded Notes</a>
                                    <a class="dropdown-item" href="rejected-notes.html">Rejected Notes</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="members.html">Members</a></li>
                        <li class="nav-item"><a class="nav-link" href="spam-reports.html">Reports</a></li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <div id="setting-menu" data-toggle="dropdown">Setting</div>
                                <div class="dropdown-menu" aria-labelledby="setting-menu">
                                    <a class="dropdown-item" href="super-admin/manage-config.html">Manage System Configuration</a>
                                    <a class="dropdown-item" href="super-admin/add-admin.html">Manage Administrator</a>
                                    <a class="dropdown-item active" href="manage-category.html">Manage Category</a>
                                    <a class="dropdown-item" href="manage-type.html">Manage Type</a>
                                    <a class="dropdown-item" href="manage-country.html">Manage Countries</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown user-image">
                                <img id="image-menu" data-toggle="dropdown" src="../images/header-footer/user-img.png"
                                    alt="Admin">
                                <div class="dropdown-menu" aria-labelledby="user-menu">
                                    <a class="dropdown-item" href="admin-profile.html">Update Profile</a>
                                    <a class="dropdown-item" href="../user/change-password.html">Change Password</a>
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

    <!-- To remove deafult navigation overlay -->
    <br><br><br>

    <!-- addition detail -->
    <section id="add">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Heading -->
                    <div class="row">
                        <div class="col-md-12 heading">
                            <h2>Add Country</h2>
                        </div>
                    </div>

                    <!-- form  -->
                    <form>
                        <!-- Title of field -->
                        <div class="form-group">
                            <label for="title" required>Country Name *</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Country Name">
                        </div>

                        <!-- description of field -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Text area -->
                                <div class="form-group">
                                    <label for="country-code" required>Country Code *</label>
                                    <input type="text" class="form-control" id="country-code"
                                        placeholder="Enter country code">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="submit" type="submit"><span class="text-center">submit</span></button>
                            </div>
                    </form>
                </div>
            </div>
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
    <script src="../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <script src="../js/header/header.js"></script>

</body>

</html>