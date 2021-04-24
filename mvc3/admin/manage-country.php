<?php
session_start();
unset($_SESSION['EditCountryID']);
ob_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");
}
require "../db_connection.php";
global $connection;

$userID = $_SESSION['UserID'];
?>
<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

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
    <link rel="stylesheet" href="../css/admin/manage-country.css?version=52004512412">

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
                    <h2>Manage Country</h2>
                </div>
            </div>

            <div class="row add-field" style="background: transparent;">
                <div class="col-lg-3 col-md-3">
                    <button class="add-button"><a href="add-country.php">Add Country</a></button>
                </div>
            </div>

            <form action="manage-country.php" method="post">
                <!-- table  -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table dashboard-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">COUNTRY NAME</th>
                                        <th scope="col">COUNTRY CODE</th>
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

                                    $getCategoriesQuery = "SELECT * FROM Countries";
                                    $getCategoriesResult = mysqli_query($connection, $getCategoriesQuery);

                                    $count = 1;
                                    while ($categories = mysqli_fetch_assoc($getCategoriesResult)) {
                                        $id = $categories['ID'];
                                        $name = $categories['Name'];
                                        $code = $categories['CountryCode'];
                                        $addedDate = $categories['CreatedDate'];
                                        $addedDate = date("d-m-Y,H:i", strtotime($addedDate));
                                        $addedBy = getUserName($categories['CreatedBy']);
                                        $active = $categories['IsActive'];
                                        $isActive = "no";
                                        if ($active) {
                                            $isActive = "yes";
                                        }

                                        echo '<tr class="table-row">
                                            <td>' . $count . '</td>
                                            <td>' . $name . '</td>
                                            <td>' . $code  . '</td>
                                            <td>' . $addedDate . '</td>
                                            <td>' . $addedBy . '</td>
                                            <td>' . $isActive . '</td>
                                            <td><img class="edit" src="../images/form/edit.png" alt="Edit"> &emsp13; <img class="delete" src="../images/form/delete.png" alt="Delete" data-toggle="modal" data-target="#deleteReport"></td>
                                            
                                            <input type="hidden" class="editID" value="' . $id . '">
                                            <input type="hidden" name="editID">

                                            <button type="submit" name="getDetail" style="display:none;"></button>
                                        
                                        </tr>';

                                        $count++;
                                    }



                                    ?>

                                </tbody>

                            </table>
                        </div>
                        <!-- Modal For Unpublish Book -->
                        <div class="modal fade" id="deleteReport" tabindex="-1" role="dialog" aria-labelledby="unpublisBbookTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header heading">
                                        <h4 class="modal-title" id="unpublisBbookTitle">

                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><img src="../images/form/close.png" alt="close"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="rating">
                                            <p>Are you sure you want to make this country inactive?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="delete" style="color:#ffffff ; background-color:red">YES</button>
                                        <button type="button" class="btn-sm" data-dismiss="modal" style="color:#ffffff ; background-color:grey">NO</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </section>

    <!-- Footer  -->
    <?php 
        include "../footer.php";
    ?>
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
    <script src="../js/header/header.js?version=45145148"></script>
    <script src="../js/admin/manage-fileds.js?version=45145148"></script>

</body>

</html>
<?php

if (isset($_POST['getDetail'])) {

    $editID = $_POST['editID'];
    $_SESSION['EditCountryID'] = $editID;
    header("Location:add-country.php");
}
if (isset($_POST['delete'])) {

    $deleteID = $_POST['editID'];

    $updateQuery = "UPDATE Countries SET IsActive = 0 WHERE ID = $deleteID ";
    $updateResult = mysqli_query($connection,$updateQuery);
    if($updateResult) {
        header("refresh:0");
    } else {
        die(mysqli_error($connection));
    }
    
}
ob_flush();
?>