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
if (empty($_SESSION['EditTypeID'])) {
    $isEdit = true;
    // $editID  = $_SESSION['EditTypeID'];
    $editID = 2;
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
                            <h2>Add Type</h2>
                        </div>
                    </div>

                    <!-- form  -->
                    <form action="add-type.php" method="post">
                        <!-- Title of field -->
                        <div class="form-group">
                            <label for="title" required>Type *</label>
                            <input type="text" class="form-control" id="title" name="name" value="<?php if ($isSubmit) {
                                                                                                        echo $name;
                                                                                                    } else if ($isEdit) {
                                                                                                        echo $typeName;
                                                                                                    } ?>" placeholder="Enter type">
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
                            <div class="col-md-12">
                                <button class="submit" type="submit" name="submit"><span class="text-center">submit</span></button>
                            </div>
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
    <script src="../js/admin/manage-fileds.js?version=18652395427845"></script>

</body>

</html>
<?php

if ($isSubmit) {
    if ($isEdit) {
        $updateQuery = "UPDATE NoteTypes SET Name = '$name',Description='$description' , ModifiedBy = $userID WHERE ID = $editID ";
        $updateResult = mysqli_query($connection, $updateQuery);
        if (!$updateResult) {
            die(mysqli_error($connection));
        }
    } else {
        $addTypeQuery = "INSERT INTO NoteTypes(Name ,Description , CreatedBy) VALUES('$name','$description',$userID)";
        $addTypeResult = mysqli_query($connection,$addTypeQuery);
        if ($addTypeResult) {
            $isSubmit = false;
        } else {
            die(mysqli_error($connection));
        }
    }
}

?>