<?php
session_start();
?>
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
    <link rel="stylesheet" href="../css/admin/admin-dashboard.css">

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->

    <!-- Header -->
    <?php
    require "../header.php";
    ?>
    <!-- Header Ends -->


    <!-- for removing default navbar overlay -->
    <br><br>

    <section id="dashboard">
        <div class="container">

            <!-- main heading  -->
            <div class="row dashboard-field">
                <div class="col-lg-12 col-md-12 col-sm-12 heading">
                    <h2>Dashboard</h2>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="info-wrapper heading">
                        <h3>20</h3>
                        <p>Number of Notes in Review for Publish</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="info-wrapper heading">
                        <h3>103</h3>
                        <p>Number of New Notes Downloaded <br> (Last 7 Days)</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="info-wrapper heading">
                        <h3>223</h3>
                        <p>Number of New Registrations <br> (Last 7 days)</p>
                    </div>
                </div>
            </div>


            <!-- inprogress notes  -->
            <div class="row table-data">

                <div class="col-lg-12 col-md-12 col-sm-12 heading">
                    <h4>In Progress Notes</h4>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <!-- inprogress table -->
                    <div class="table-responsive">
                        <table class="table dashboard-table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No.</th>
                                    <th scope="col">title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Attachment Size</th>
                                    <th scope="col">Sell Type</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Publisher</th>
                                    <th scope="col">Published Date</th>
                                    <th scope="col">Number of Downloads</th>
                                    <th scope="col">&emsp13;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>10KB</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>Pritesh Panchal</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>10</td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row1" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row1">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Accounts</td>
                                    <td>Commerce</td>
                                    <td>23MB</td>
                                    <td>Paid</td>
                                    <td>$22</td>
                                    <td>Rahul Shah</td>
                                    <td>10-10-2020,12:30</td>
                                    <td>11</td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row2" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row2">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Social Studies</td>
                                    <td>Social</td>
                                    <td>3MB</td>
                                    <td>Paid</td>
                                    <td>$56</td>
                                    <td>Anish Patel</td>
                                    <td>11-10-2020,01:00</td>
                                    <td>23</td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row3" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row3">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>AI</td>
                                    <td>IT</td>
                                    <td>1MB</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>Vijay Vaishnav</td>
                                    <td>12-10-2020,10:10</td>
                                    <td>34</td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row4" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row4">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem</td>
                                    <td>105KB</td>
                                    <td>Paid</td>
                                    <td>$90</td>
                                    <td>Mehul Patel</td>
                                    <td>13-10-2020,11:25</td>
                                    <td>9</td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row5" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row5">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>10KB</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>Pritesh Panchal</td>
                                    <td>14-10-2020,10:10</td>
                                    <td>10</td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row6" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row6">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>7</td>
                                    <td>Accounts</td>
                                    <td>Commerce</td>
                                    <td>23MB</td>
                                    <td>Paid</td>
                                    <td>$22</td>
                                    <td>Rahul Shah</td>
                                    <td>15-10-2020,12:30</td>
                                    <td>11</td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row7" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row7">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>8</td>
                                    <td>Social Studies</td>
                                    <td>Social</td>
                                    <td>3MB</td>
                                    <td>Paid</td>
                                    <td>$56</td>
                                    <td>Anish Patel</td>
                                    <td>16-10-2020,01:00</td>
                                    <td>23</td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row8" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row8">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>9</td>
                                    <td>AI</td>
                                    <td>IT</td>
                                    <td>1MB</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>Vijay Vaishnav</td>
                                    <td>17-10-2020,10:10</td>
                                    <td>34</td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row9" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row9">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>10</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem</td>
                                    <td>105KB</td>
                                    <td>Paid</td>
                                    <td>$90</td>
                                    <td>Mehul Patel</td>
                                    <td>18-10-2020,11:25</td>
                                    <td>9</td>
                                    <td class="dropup dropleft">
                                        <div data-toggle="dropdown">
                                            <img src="../images/form/dots.png" id="row10" alt="Detail">
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="row10">
                                            <a class="dropdown-item" href="#">Download Notes</a>
                                            <a class="dropdown-item" href="#">View More Details</a>
                                            <a class="dropdown-item" href="#">Unpublish</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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

    <!-- data table  -->
    <script src="../js/data-table/jquery.dataTables.js"></script>

    <!-- custom js  -->
    <script src="../js/header/header.js"></script>
    <script src="../js/admin/admin-dashboard.js"></script>

</body>

</html>