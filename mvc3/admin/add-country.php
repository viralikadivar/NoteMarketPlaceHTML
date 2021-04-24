<?php
session_start();
ob_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:../login.php");
}
require "../db_connection.php";
global $connection;

$userID = $_SESSION['UserID'];
$isEdit = false;
$isSubmit = false;
$isPresent = false;
if (!empty($_SESSION['EditCountryID'])) {
    $isEdit = true;
    $editID  = $_SESSION['EditCountryID'];
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

    $getCountryDetail = "SELECT * FROM Countries WHERE Name = '$name'";
    $getCountryResult = mysqli_query($connection,$getCountryDetail);
    if(mysqli_num_rows($getCountryResult) && !$isEdit){
        $isSubmit = false;
        $isPresent = true;
        $presentStyle = 'style="border-color:red"';
    }
}
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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin/field-add.css?version=18254715">

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
                            <input type="text" class="form-control" id="title" name="name" <?php if($isPresent){echo $presentStyle ;}?> value="<?php if ($isSubmit) {
                                                                                            echo $name;
                                                                                        } else if ($isEdit) {
                                                                                            echo $countryName;
                                                                                        } ?>" placeholder="Enter Country Name">
                            <?php if( $isPresent ) {echo '<small style="color:red;">Country is already present</small>';}?>
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
                        <div class="col-md-3 col-sm-3">
                                <button class="submit" type="submit" name="submit"><span class="text-center">submit</span></button>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <button class="submit" type="submit" name="cancle" style="background-color:#d1d1d1"><span class="text-center">cancle</span></button>
                            </div>
                    </form>
                </div>
            </div>
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
    <script src="../js/bootstrap/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <script src="../js/header/header.js"></script>
    <script src="../js/admin/manage-fileds.js?version=7421681312545"></script>

</body>

</html>
<?php

if ($isSubmit) {
    if ($isEdit) {
        $updateQuery = "UPDATE Countries SET Name = '$name',CountryCode='$code' , ModifiedBy = $userID , IsActive = 1 WHERE ID = $editID ";
        $updateResult = mysqli_query($connection, $updateQuery);
        if (!$updateResult) {
            die(mysqli_error($connection));
        } else{
            unset($_SESSION['EditCountryID']);
            header("Location:manage-country.php");
        }
    } else {
        $addCountryQuery = "INSERT INTO Countries(Name ,CountryCode , CreatedBy) VALUES('$name','$code',$userID)";
        $addCountryResult = mysqli_query($connection,$addCountryQuery);
        if ($addCountryResult) {
            $isSubmit = false;
            header("Location:manage-country.php");
        } else {
            die(mysqli_error($connection));
        }
    }
}
if(isset($_POST['cancle'])){
    header("Location:manage-country.php");
}
ob_flush();
?>