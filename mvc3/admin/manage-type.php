<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
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
    <link rel="stylesheet" href="../css/admin/manage-type.css?version=541451745745">

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
                    <button class="add-button"><a href="add-type.php">Add Type</a></button>
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
                                <?php

                                function getUserName($userID)
                                {
                                    global $connection;
                                    $query = "SELECT * FROM Users WHERE ID = $userID";
                                    $result = mysqli_query($connection, $query);
                                    $detail = mysqli_fetch_assoc($result);
                                    $firstName = $detail['FirstName'];
                                    $lastName = $detail['LastName'];
                                    $userName = $firstName . ' ' . $lastName;
                                    return $userName;
                                }

                                $getCategoriesQuery = "SELECT * FROM NoteTypes";
                                $getCategoriesResult = mysqli_query($connection, $getCategoriesQuery);

                                $count = 1;
                                while ($categories = mysqli_fetch_assoc($getCategoriesResult)) {
                                    $id = $categories['ID'];
                                    $name = $categories['Name'];
                                    $decription = $categories['Description'];
                                    $addedDate = $categories['CreatedDate'];
                                    $addedDate = date("d-m-Y,H:i", strtotime($addedDate));
                                    $addedBy = getUserName($categories['CreatedBy']);
                                    $active = $categories['IsActive'];
                                    $isActive = "no";
                                    if ($active) {
                                        $isActive = "yes";
                                    }

                                    echo '<tr>
                                            <td>' . $count . '</td>
                                            <td>' . $name . '</td>
                                            <td>' . $decription . '</td>
                                            <td>' . $addedDate . '</td>
                                            <td>' . $addedBy . '</td>
                                            <td>' . $isActive . '</td>
                                            <td><img src="../images/form/edit.png" alt="Edit"> &emsp13; <img src="../images/form/delete.png" alt="Delete"></td>
                                        </tr>';

                                    $count++;
                                }



                                ?>

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