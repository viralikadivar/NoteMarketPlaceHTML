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
if (!empty($_SESSION['EditTypeID'])) {
    $isEdit = true;
    $editID  = $_SESSION['EditTypeID'];
    $getTypesDetail = "SELECT * FROM NoteTypes WHERE ID = $editID";
    $getTypeResult = mysqli_query($connection,$getTypesDetail);
    $typeDetail = mysqli_fetch_assoc($getTypeResult);

    $typeName = $typeDetail['Name'];
    $typeDesc = $typeDetail['Description'];
}
if (isset($_POST['submit'])) {

    $isSubmit = true;
    $name = $_POST['name'];
    $description = $_POST['comments'];

    $getTypesDetail = "SELECT * FROM NoteTypes WHERE Name = '$name'";
    $getTypeResult = mysqli_query($connection,$getTypesDetail);
    if(mysqli_num_rows($getTypeResult) && !$isEdit){
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
    <link rel="stylesheet" href="../css/admin/field-add.css?version=6575">

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
                            <h2>Add Type</h2>
                        </div>
                    </div>

                    <!-- form  -->
                    <form action="add-type.php" method="post">
                        <!-- Title of field -->
                        <div class="form-group">
                            <label for="title" required>Type *</label>
                            <input type="text" class="form-control" <?php if($isPresent){echo $presentStyle ;}?> id="title" name="name" value="<?php if ($isSubmit) {
                                                                                                        echo $name;
                                                                                                    } else if ($isEdit) {
                                                                                                        echo $typeName;
                                                                                                    } ?>" placeholder="Enter type">
                            <?php if( $isPresent ) {echo '<small style="color:red;">Note Type is already present</small>';}?>

                        </div>

                        <!-- description of field -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Text area -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="description" required>Description *</label>
                                        </div>
                                    </div>
                                    <textarea placeholder="Enter your description" name="comments" id="description"><?php if ($isSubmit) {
                                                                                                                        echo $description;
                                                                                                                    } else if ($isEdit) {
                                                                                                                        echo $typeDesc;
                                                                                                                    } ?></textarea>
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
    <script src="../js/admin/manage-fileds.js?version=18651121357845"></script>

</body>

</html>
<?php

if ($isSubmit) {
    if ($isEdit) {
        $updateQuery = "UPDATE NoteTypes SET Name = '$name',Description='$description' , ModifiedBy = $userID , IsActive = 1 WHERE ID = $editID ";
        $updateResult = mysqli_query($connection, $updateQuery);
        if (!$updateResult) {
            die(mysqli_error($connection));
        } else {
            unset($_SESSION['EditTypeID']);
            header("Location:manage-type.php");
        }
    } else {
        $addTypeQuery = "INSERT INTO NoteTypes(Name ,Description , CreatedBy) VALUES('$name','$description',$userID)";
        $addTypeResult = mysqli_query($connection,$addTypeQuery);
        if ($addTypeResult) {
            $isSubmit = false;
            header("Location:manage-type.php");
        } else {
            die(mysqli_error($connection));
        }
    }
}
if(isset($_POST['cancle'])){
    header("Location:manage-type.php");
}
ob_flush();
?>