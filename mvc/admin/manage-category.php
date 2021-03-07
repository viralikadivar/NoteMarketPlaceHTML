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

    <!-- datatable -->
    <link rel="stylesheet" href="../css/data-table/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/data-table.css">
    <link rel="stylesheet" href="../css/admin/manage-category.css">

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

    <!-- for removing default navbar overlay -->
    <br><br><br>

    <section id="dashboard">
        <div class="container">

            <!-- main heading  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 heading">
                    <h2>Manage Category</h2>
                </div>
            </div>

            <div class="row add-field" style="background: transparent;">
                <div class="col-lg-3 col-md-3">
                    <button class="add-button"><a href="add-category.html">Add Category</a></button>
                </div>
            </div>


            <!-- table  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table dashboard-table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No.</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">ADDED BY </th>
                                    <th scope="col">ACTIVE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>IT</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Khya ti Patel</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Computer</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>10-10-2020,11:25</td>
                                    <td>Rahul shah</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Science</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>11-10-2020,1:00</td>
                                    <td>Suman trived</td>
                                    <td>No</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>History</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>12-10-2020,10:10</td>
                                    <td>Raj malhotra</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Account</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>13-10-2020,11:25</td>
                                    <td>niya Patel</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>It</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Khyati Patel</td>
                                    <td>Yes</td>
                                    <td></td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>7</td>
                                    <td>Computer</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>10-10-2020,11:25</td>
                                    <td>Rahul shah</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>8</td>
                                    <td>History</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>11-10-2020,1:00</td>
                                    <td>Suman trived</td>
                                    <td>No</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>9</td>
                                    <td>Account</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>12-10-2020,10:10</td>
                                    <td>Raj malhotra</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>10</td>
                                    <td>Val10</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>13-10-2020,11:25</td>
                                    <td>niya Patel</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

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
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- data table  -->
    <script src="../js/data-table/jquery.dataTables.js"></script>

      <!-- custom js  -->
      <script src="../js/admin/data-table.js"></script>
      <script src="../js/header/header.js"></script>

</body>

</html>