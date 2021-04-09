<?php
session_start();
if(!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");  
}
require "../db_connection.php";
global $connection;

$userID = $_SESSION['UserID'];
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
    <link rel="stylesheet" href="../css/admin/manage-type.css">

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
    <br><br><br>

    <section id="dashboard">
        <div class="container">

            <!-- main heading  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 heading">
                    <h2>Manage Type</h2>
                </div>
            </div>

            <div class="row add-field" style="background: transparent;">
                <div class="col-lg-3 col-md-3">
                    <button class="add-button"><a href="add-type.html">Add Type</a></button>
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
                                    <th scope="col">TYPE</th>
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
                                    <td>Val1</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Khya ti Patel</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Val2</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>10-10-2020,11:25</td>
                                    <td>Rahul shah</td>
                                    <td>yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Val3</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>11-10-2020,1:00</td>
                                    <td>Suman trived</td>
                                    <td>No</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>Val4</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>12-10-2020,10:10</td>
                                    <td>Raj malhotra</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Val5</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>13-10-2020,11:25</td>
                                    <td>niya Patel</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>Val6</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Khyati Patel</td>
                                    <td>Yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>7</td>
                                    <td>Val7</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>10-10-2020,11:25</td>
                                    <td>Rahul shah</td>
                                    <td>yes</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>8</td>
                                    <td>Val8</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>11-10-2020,1:00</td>
                                    <td>Suman trived</td>
                                    <td>No</td>
                                    <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img
                                            src="../images/form/delete.png" alt="Delete"></td>

                                </tr>

                                <tr>
                                    <td>9</td>
                                    <td>Val4</td>
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