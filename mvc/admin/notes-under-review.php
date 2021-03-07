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
    <link rel="stylesheet" href="../css/admin/notes-under-review.css">

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
                        <li class="nav-item active">
                            <div class="dropdown">
                                <div id="notes-menu" data-toggle="dropdown">Notes</div>
                                <div class="dropdown-menu" aria-labelledby="notes-menu">
                                    <a class="dropdown-item active" href="notes-under-review.html">Notes Under Review</a>
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
                                    <a class="dropdown-item" href="manage-category.html">Manage Category</a>
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
                    <h2>Notes Under Review</h2>
                </div>
            </div>

            <div class="row" style="background:transparent;">
                <div class="col-lg-3 col-md-2 col-sm-2">
                    <div class="form-group">
                        <label for="seller" required>Seller</label>
                        <div class="dropdown">
                            <button type="button" id="seller" class="select-field" data-toggle="dropdown">
                                Seller<img src="../images/form/arrow-down.png" alt="Down">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="seller">
                                <li class="dropdown-item">Khayati</li>
                                <li class="dropdown-item">Rahul Shah</li>
                                <li class="dropdown-item">Raj Seth</li>
                            </ul>
                        </div>
                    </div>
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
                                    <th scope="col">NOTE TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">SELLER</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTION</th>


                                    <th scope="col">&emsp13;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Software development</td>
                                    <td>IT</td>

                                    <td>Khyati Patel</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>InReview</td>
                                    <td> <button class="approve">Approve</button> <button class="reject"
                                            data-toggle="modal" data-target="#remark">Reject</button> <button
                                            class="inrerview">InReview</button></td>

                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row1" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row1">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Computer Basic</td>
                                    <td>Computer </td>

                                    <td>Khyati Patel</td>
                                    <td>10-10-2020,11:25</td>
                                    <td>Submitted for Review</td>
                                    <td> <button class="approve">Approve</button> <button class="reject"
                                            data-toggle="modal" data-target="#remark">Reject</button> <button
                                            class="inrerview">InReview</button></td>

                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row2" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row2">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Human Body</td>
                                    <td>Science</td>
                                    <td>Khyati Patel</td>
                                    <td>11-10-2020,1:00</td>
                                    <td>InReview</td>
                                    <td> <button class="approve">Approve</button> <button class="reject"
                                            data-toggle="modal" data-target="#remark">Reject</button> <button
                                            class="inrerview">InReview</button></td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row3" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row3">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>World war 2</td>
                                    <td>History</td>
                                    <td>Khyati Patel</td>
                                    <td>12-10-2020,10:10</td>
                                    <td>InReview</td>
                                    <td> <button class="approve">Approve</button> <button class="reject"
                                            data-toggle="modal" data-target="#remark">Reject</button> <button
                                            class="inrerview">InReview</button></td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row4" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row4">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Accounting</td>
                                    <td>Account</td>
                                    <td>Khyati Patel</td>
                                    <td>13-10-2020,11:25</td>
                                    <td>InReview</td>
                                    <td> <button class="approve">Approve</button> <button class="reject"
                                            data-toggle="modal" data-target="#remark">Reject</button> <button
                                            class="inrerview">InReview</button></td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row5" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row5">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Software development</td>
                                    <td>IT</td>
                                    <td>Khyati Patel</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>InReview</td>
                                    <td> <button class="approve">Approve</button> <button class="reject"
                                            data-toggle="modal" data-target="#remark">Reject</button> <button
                                            class="inrerview">InReview</button></td>

                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row1" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row1">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>7</td>
                                    <td>Computer Basic</td>
                                    <td>Computer </td>
                                    <td>Khyati Patel</td>
                                    <td>10-10-2020,11:25</td>
                                    <td>Submitted for Review</td>
                                    <td> <button class="approve">Approve</button> <button class="reject"
                                            data-toggle="modal" data-target="#remark">Reject</button> <button
                                            class="inrerview">InReview</button></td>

                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row2" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row2">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>8</td>
                                    <td>Human Body</td>
                                    <td>Science</td>
                                    <td>Khyati Patel</td>
                                    <td>11-10-2020,1:00</td>
                                    <td>InReview</td>
                                    <td> <button class="approve">Approve</button> <button class="reject"
                                            data-toggle="modal" data-target="#remark">Reject</button> <button
                                            class="inrerview">InReview</button></td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row3" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row3">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>9</td>
                                    <td>World war 2</td>
                                    <td>History</td>
                                    <td>Khyati Patel</td>
                                    <td>12-10-2020,10:10</td>
                                    <td>InReview</td>
                                    <td> <button class="approve">Approve</button> <button class="reject"
                                            data-toggle="modal" data-target="#remark">Reject</button> <button
                                            class="inrerview">InReview</button></td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row4" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row4">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>10</td>
                                    <td>Accounting</td>
                                    <td>Account</td>
                                    <td>Khyati Patel</td>
                                    <td>13-10-2020,11:25</td>
                                    <td>InReview</td>
                                    <td> <button class="approve">Approve</button> <button class="reject"
                                            data-toggle="modal" data-target="#remark">Reject</button> <button
                                            class="inrerview">InReview</button></td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row5" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row5">
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- popup  -->

                    <!-- Modal -->
                    <div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="remarkLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header heading">
                                    <h3 class="modal-title" id="remarkLabel">Human Body - Science</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><img src="../images/form/close.png" alt="close"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label>Remarks</label><br>
                                    <textarea placeholder="Write remarks" name="comments"
                                        id="description"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="reject">Reject</button>
                                    <button type="button" class="inrerview" data-dismiss="modal">Cancel</button>     
                                  </div>
                            </div>
                        </div>
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
    <script src="../js/header/header.js"></script>
    <script src="../js/admin/data-table.js"></script>

</body>

</html>