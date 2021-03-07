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
    <link rel="stylesheet" href="../css/user/user-profile.css">

</head>

<body>

    <!-- Header -->
    <header id="header">
        <nav class="navbar white-navbar navbar-expand-lg">
            <div class="container navbar-wrapper">
                <a class="navbar-brand" href="../index.php">
                    <img class="img-responsive" src="../images/logo/logo-dark.png" alt="logo">
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="search-notes.php">Search Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="add-notes.php">Sell Your Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="buyers-request.php">Buyer Requests</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                        <li class="nav-item">
                            <div class="dropdown user-image">
                                <img id="user-menu" data-toggle="dropdown" src="../images/header-footer/user-img.png"
                                    alt="User">
                                <div class="dropdown-menu" aria-labelledby="user-menu">
                                    <a class="dropdown-item active" href="user-profile.php">My Profile</a>
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

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->


    <!-- ADD Notes Banner-->
    <section id="add-notes">
        <img class="img-responsive" src="../images/faq/banner.jpg" alt="FAQ Banner" id="add-notes-bg-image">

        <!-- Overlay -->
        <div id="add-notes-overlay"></div>
    </section>

    <!-- Heading -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="add-notes-heading" class="text-center">
                    <h2>User Profile</h2>
                </div>
            </div>
        </div>
    </div>

    <section id="add-notes-form">
        <div class="container">
            <form>
                <!-- Basic Profile details Heading -->
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h2>Basic Profile Details</h2>
                    </div>
                </div>

                <!-- Basic Profile details Fields -->
                <div class="row">

                    <!-- First Name -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="first-name" required>First Name *</label>
                            <input type="text" class="form-control" id="first-name" placeholder="Enter Your first name">
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="last-name" required>Last Name *</label>
                            <input type="text" class="form-control" id="last-name" placeholder="Enter Your last name">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email" required>Email *</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Your email address">
                        </div>
                    </div>

                    <!-- Date of Birth -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="dob" required>Date Of Birth </label>
                            <input type="date" class="form-control" id="dob" placeholder="Enter Your date of birth">
                        </div>
                    </div>

                    <!-- Select Gender-->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="dropdown">
                                <label for="gender" required>Gender</label>
                                <button type="button" id="gender" class="select-field" data-toggle="dropdown">
                                    Select your gender<img src="../images/form/arrow-down.png" alt="Down">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="gender">
                                    <li class="dropdown-item">Male</li>
                                    <li class="dropdown-item">Female</li>
                                    <li class="dropdown-item">Other</li>
                                    </li>
                            </div>
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="col-lg-6 col-md-12 col-sm-12 phone-section">

                        <div class="form-group">

                            <label for="phone-code" required>Phone Number</label>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="dropdown">
                                        <button type="button" id="phone-code" class="select-field"
                                            data-toggle="dropdown">
                                            +91<img src="../images/form/arrow-down.png" alt="Down">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="phone-code">
                                            <li class="dropdown-item">+91</li>
                                            <li class="dropdown-item">+1</li>
                                            <li class="dropdown-item">+92</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 pl-0">
                                    <input type="text" class="form-control" id="Phone-number"
                                        placeholder="Enter your phone number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Upload Picture -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="photo" required>Profile Picture</label>
                            <div class="take-note-detail">
                                <label for="photo"><img src="../images/form/upload-file.png" alt="Uplaod"><br>
                                    Upload a picture</label>
                                <input type="file" id="photo" style="visibility: hidden;"
                                    accept="image/png, image/jpeg">
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Address detail Heading -->
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h2>Address Details</h2>
                    </div>
                </div>

                <!-- Address detail Fields-->
                <div class="row">
                    <!-- Address Line 1 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="add-1" required>Address Line 1 *</label>
                            <input type="text" class="form-control" id="add-1" placeholder="Enter Your address">
                        </div>
                    </div>

                    <!-- Address Line 2 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="add-2" required>Address Line 2</label>
                            <input type="text" class="form-control" id="add-2" placeholder="Enter Your address">
                        </div>
                    </div>

                    <!-- City -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="city" required>City *</label>
                            <input type="text" class="form-control" id="city" placeholder="Enter Your city">
                        </div>
                    </div>

                    <!-- State -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="state" required>State *</label>
                            <input type="text" class="form-control" id="state" placeholder="Enter Your state">
                        </div>
                    </div>

                    <!-- ZipCode -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="zipcode" required>ZipCode *</label>
                            <input type="text" class="form-control" id="zipcode" placeholder="Enter Your zipcode">
                        </div>
                    </div>

                    <!-- Country -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="country" required>Country *</label>
                            <input type="text" class="form-control" id="country" placeholder="Enter Your country">
                        </div>
                    </div>

                </div>

                <!-- University and college information Heading -->
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h2>University and College Information</h2>
                    </div>
                </div>

                <!-- University and college information Fields -->
                <div class="row">

                    <!-- University -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="university" required>University</label>
                            <input type="text" class="form-control" id="university" placeholder="Enter Your university">
                        </div>
                    </div>

                    <!-- College -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="college" required>College</label>
                            <input type="text" class="form-control" id="college" placeholder="Enter Your college">
                        </div>
                    </div>

                </div>

                <!-- submit button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button class="submit" type="submit"><span class="text-center">Submit</span></button>
                    </div>
                </div>

            </form>
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
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <script src="../js/header/header.js"></script>

</body>

</html>