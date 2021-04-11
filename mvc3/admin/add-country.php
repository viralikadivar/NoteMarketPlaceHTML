<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");
}
require "../db_connection.php";
global $connection;

$userID = $_SESSION['UserID'];
$isEdit = false;
$isSubmit = false;
if (empty($_SESSION['EditCountryID'])) {
    $isEdit = true;
    // $editID  = $_SESSION['EditCountryID'];
    $editID = 248;
    $getCountryDetail = "SELECT * FROM Countries WHERE ID = $editID";
    $getCountryResult = mysqli_query($connection,$getCountryDetail);
    $countryDetail = mysqli_fetch_assoc($getCountryResult);

    $countryName = $countryDetail['Name'];
    $countryCode = $countryDetail['CountryCode'];
}
if (isset($_POST['submit'])) {

    $isSubmit = true;
    $name = $_POST['name'];
    $code = $_POST['code'];
}
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
    <?php
    require "../header.php";
    ?>
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
                    <form action="add-country.php" method="post">
                        <!-- Title of field -->
                        <div class="form-group">
                            <label for="title" required>Country Name *</label>
                            <input type="text" class="form-control" id="title" name="name" value="<?php if ($isSubmit) {
                                                                                            echo $name;
                                                                                        } else if ($isEdit) {
                                                                                            echo $countryName;
                                                                                        } ?>" placeholder="Enter Country Name">
                        </div>

                        <!-- description of field -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Text area -->
                                <div class="form-group">
                                    <label for="country-code" required>Country Code *</label>
                                    <input type="text" class="form-control" id="country-code" name="code" value="<?php if ($isSubmit) {
                                                                                                            echo $code;
                                                                                                        } else if ($isEdit) {
                                                                                                            echo $countryCode;
                                                                                                        } ?>" placeholder="Enter country code">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="submit" type="submit" name="submit"><span class="text-center">submit</span></button>
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
    <script src="../js/admin/manage-fileds.js?version=742168345"></script>

</body>

</html>
<?php

if ($isSubmit) {
    if ($isEdit) {
        $updateQuery = "UPDATE Countries SET Name = '$name',CountryCode='$code' , ModifiedBy = $userID WHERE ID = $editID ";
        $updateResult = mysqli_query($connection, $updateQuery);
        if (!$updateResult) {
            die(mysqli_error($connection));
        }
    } else {
        $addCountryQuery = "INSERT INTO Countries(Name ,CountryCode , CreatedBy) VALUES('$name','$code',$userID)";
        $addCountryResult = mysqli_query($connection,$addCountryQuery);
        if ($addCountryResult) {
            $isSubmit = false;
        } else {
            die(mysqli_error($connection));
        }
    }
}

?>