<?php
session_start();
ob_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../../login.php");
}
require "../../db_connection.php";
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
    <link rel="shortcut icon" href="../../images/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="../../css/fonts/fonts.css">


    <!-- ================================================
                        CSS Files 
    ================================================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">

    <!-- Header footer CSS -->
    <link rel="stylesheet" href="../../css/header-footer/admin-header.css">
    <link rel="stylesheet" href="../../css/header-footer/admin-footer.css">

    <!-- datatable -->
    <link rel="stylesheet" href="../../css/data-table/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/admin/data-table.css">
    <link rel="stylesheet" href="../../css/admin/super-admin/manage-admin.css?version=111516431">

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Preloader Ends -->

    <!-- Header -->
    <?php
    include "../../header.php";
    ?>
    <!-- Header Ends -->

    <!-- for removing default navbar overlay -->
    <br><br><br>

    <section id="dashboard">
        <div class="container">

            <!-- main heading  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 heading">
                    <h2>Manage Administrator</h2>
                </div>
            </div>

            <div class="row add-field" style="background: transparent;">
                <div class="col-lg-3 col-md-3">
                    <button class="add-button"><a href="add-admin.php">Add Administrator</a></button>
                </div>
            </div>

            <!-- table  -->
            <form action="manage-admin.php" method="post">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table dashboard-table">

                                <thead>

                                    <tr>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">FIRST NAME</th>
                                        <th scope="col">LAST NAME</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">PHONE NO.</th>
                                        <th scope="col">DATE ADDED</th>
                                        <th scope="col">ACTIVE</th>
                                        <th scope="col">ACTION</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <?php
                                    $count = 1;
                                    $adminQuery = "SELECT * FROM Users WHERE RoleID = 2";
                                    $adminResult = mysqli_query($connection, $adminQuery);
                                    while ($admin = mysqli_fetch_assoc($adminResult)) {
                                        $adminID = $admin['ID'];
                                        $firstName = $admin['FirstName'];
                                        $lastName = $admin['LastName'];
                                        $email = $admin['EmailID'];
                                        $dateAdded = strtotime($admin['CreatedDate']);
                                        $dateAdded  = date("d-m-Y,H:i", $dateAdded);
                                        $isActive = $admin['IsActive'];
                                        $active = "Yes";

                                        // Phone Number 
                                        $phoneNoQuery = "SELECT * FROM UserProfile WHERE UserID = $adminID ";
                                        $phoneResult = mysqli_query($connection, $phoneNoQuery);
                                        if (mysqli_num_rows($phoneResult)) {
                                            $phoneNo = mysqli_fetch_assoc($phoneResult);
                                            $mobileNo = $phoneNo['PhoneNumber'];
                                        }
                                        if ($isActive) {
                                            $active = "Yes";
                                        } else {
                                            $active = "no";
                                        }

                                        echo '<tr class="table-row">
                                        <td>' . $count . '</td>
                                        <td>' . $firstName . '</td>
                                        <td>' . $lastName . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $mobileNo . '</td>
                                        <td>' . $dateAdded . '</td>
                                        <td>' . $active . '</td>
                                        <td><img class="edit" src="../../images/form/edit.png" alt="Edit"> &emsp13; <img class="delete" src="../../images/form/delete.png" alt="Delete"></td>

                                        <input type="hidden" class="adminID" value="'.$adminID.'">
                                        <input type="hidden" name="adminID">

                                        <button type="submit" name="editAdmin" style="display:none">
                                        <button type="submit" name="deleteAdmin" style="display:none">

                                    </tr>';

                                        $count++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </form>

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
    <script src="../../js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>

    <!-- data table  -->
    <script src="../../js/data-table/jquery.dataTables.js"></script>

    <!-- custom js  -->
    <script src="../../js/admin//manage-admin.js?version=1245648186"></script>
    <script src="../../js/header/header.js"></script>

</body>

</html>
<?php

if(isset($_POST['editAdmin'])){
    $adminID = $_POST['adminID'];
    $_SESSION['AdminEditID'] =  $adminID;
    header("Location:add-admin.php");
}

if(isset($_POST['deleteAdmin'])){
    $adminID = $_POST['adminID'];

    $inActiveAdminQuery = "UPDATE Users SET IsActive = 0 WHERE ID = $adminID ";
    $inActiveAdminResult = mysqli_query($connection,$inActiveAdminQuery);

}
ob_end_flush();

?>