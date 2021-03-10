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
    <link rel="stylesheet" href="../css/user/data-table.css">
    <link rel="stylesheet" href="../css/user/buyers-request.css?version=12304">

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
                        <li class="nav-item"><a class="nav-link" href="search-notes.php">Search Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="add-notes.php">Sell Your Notes</a></li>
                        <li class="nav-item active"><a class="nav-link" href="buyers-request.php">Buyer Requests</a></li>
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

    <!-- for removing default navbar overlay -->
    <br><br><br>

    <section id="dashboard">
        <div class="container">

            <!-- main heading  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 heading">
                    <h2>Buyers Request</h2>
                </div>
            </div>

            <!-- table  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table dashboard-table-long">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">BUYER</th>

                                        <th scope="col">PHONE .NO</th>
                                        <th scope="col">SELL TYPE</th>
                                        <th scope="col">PRICE</th>
                                        <!-- <th scope="col">Publisher</th>
                                        <th scope="col">Published Date</th> -->
                                        <th scope="col">DOWNLOADED DATE/TIME</th>
                                        <th scope="col">&emsp13;</th>
                                        <th scope="col">&emsp13;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Data Science</td>
                                        <td>Science</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Paid</td>
                                        <td>$250</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <form action="buyers-request.php" method="post">
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row1" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row1">
                                                <button class="dropdown-item" name="received">Yes, I Received</button>
                                            </div>
                                        </td>
                                        </form>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Accounts</td>
                                        <td>Commerce</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row2" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row2">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Social Studies</td>
                                        <td>Social</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row3" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row3">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>AI</td>
                                        <td>IT</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Paid</td>
                                        <td>$158</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row4" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row4">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row5" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row5">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>Data Science</td>
                                        <td>Science</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Paid</td>
                                        <td>$555</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row6" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row6">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>7</td>
                                        <td>Accounts</td>
                                        <td>Commerce</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row7" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row7">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>8</td>
                                        <td>Social Studies</td>
                                        <td>Social</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row8" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row8">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>9</td>
                                        <td>AI</td>
                                        <td>IT</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Paid</td>
                                        <td>$250</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row9" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row9">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>10</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$115</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row10" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row10">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Data Science</td>
                                        <td>Science</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Paid</td>
                                        <td>$250</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row11" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row11">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>12</td>
                                        <td>Accounts</td>
                                        <td>Commerce</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row12" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row12">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>13</td>
                                        <td>Social Studies</td>
                                        <td>Social</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row13" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row13">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>14</td>
                                        <td>AI</td>
                                        <td>IT</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Paid</td>
                                        <td>$158</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row14" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row14">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>15</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row15" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row15">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>16</td>
                                        <td>Data Science</td>
                                        <td>Science</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Paid</td>
                                        <td>$555</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row16" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row16">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>17</td>
                                        <td>Accounts</td>
                                        <td>Commerce</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row17" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row17">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>18</td>
                                        <td>Social Studies</td>
                                        <td>Social</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row18" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row18">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>19</td>
                                        <td>AI</td>
                                        <td>IT</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Paid</td>
                                        <td>$250</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row19" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row19">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>20</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Lorem</td>
                                        <td>testting123gmail.com</td>
                                        <td>+91 9874563527</td>
                                        <td>Free</td>
                                        <td>$115</td>
                                        <td>27 Nov 2020,11:24:34</td>
                                        <td><img src="../images/form/eye.png" alt="View"></td>
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row20" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row20">
                                                <a class="dropdown-item" href="#">Yes, I Received</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

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
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- data table  -->
    <script src="../js/data-table/jquery.dataTables.js"></script>

    <!-- custom js  -->
    <script src="../js/user/data-table.js"></script>
    <script src="../js/header/header.js"></script>


</body>

</html>

<?php

require "../db_connection.php";
global $connection ;

if(isset($_POST["received"])) {

    $sellerID = 73 ;
    $sellerName = "Pratik Bavarava";
    $buyerID = 83 ;

    $buyerQuery = " SELECT * FROM Users WHERE ID = $buyerID ";
    $buyerResult = mysqli_query( $connection , $buyerQuery );
    $buyersDetail = mysqli_fetch_assoc($buyerResult);\

    $buyerName = $buyersDetail['FirstName'] + 



}

    





}

?>