<?php

require "../db_connection.php";
global $connection;

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
    <link rel="stylesheet" href="../css/header-footer/user-header.css">
    <link rel="stylesheet" href="../css/header-footer/footer.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/user/add-notes.css?version=12300">

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
                <a class="navbar-brand" href="../index.html">
                    <img class="img-responsive" src="../images/logo/logo-dark.png" alt="logo">
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="search-notes.html">Search Notes</a></li>
                        <li class="nav-item active"><a class="nav-link" href="add-notes.html">Sell Your Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="buyers-request.html">Buyer Requests</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                        <li class="nav-item">
                            <div class="dropdown user-image">
                                <img id="user-menu" data-toggle="dropdown" src="../images/header-footer/user-img.png" alt="User">
                                <div class="dropdown-menu" aria-labelledby="user-menu">
                                    <a class="dropdown-item" href="user-profile.html">My Profile</a>
                                    <a class="dropdown-item" href="my-download.html">My Downloads</a>
                                    <a class="dropdown-item" href="my-sold-notes.html">My Sold Notes</a>
                                    <a class="dropdown-item" href="my-rejected-notes.html">My Rejected Notes</a>
                                    <a class="dropdown-item" href="change-password.html">Change Password</a>
                                    <a class="dropdown-item" href="../index.html" id="logout">Logout</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item loginNavTab"><a class="nav-link" href="../index.html">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>



        <nav class="navbar mobile-navbar navbar-expand-lg justify-content-end">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span id="open" class="navbar-toggler-icon">&#9776;</span>
                <span id="close" class="navbar-toggler-icon">&times;</span>
            </button>
        </nav>
    </header>
    <!-- Header Ends -->

    <br><br><br>

    <!-- ADD Notes Banner-->
    <section id="add-notes">
        <img class="img-responsive" src="../images/FAQ/banner.jpg" alt="FAQ Banner" id="add-notes-bg-image">

        <!-- Overlay -->
        <div id="add-notes-overlay"></div>
    </section>

    <!-- Contact Heading -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="add-notes-heading" class="text-center">
                    <h2>Add Notes</h2>
                </div>
            </div>
        </div>
    </div>

    <section id="add-notes-form">
        <div class="container">
            <form action="add-notes.php" method="post" enctype="multipart/form-data">

                <!-- Basic Notes detail Heading -->
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h2>Basic Note Details</h2>
                    </div>
                </div>

                <!-- Basic Notes detail Field-->
                <div class="row">
                    <div class="col-lg-6">

                        <!-- Title of Book -->
                        <div class="form-group">
                            <label for="book-title">Title *</label>
                            <input type="text" name="book-title" class="form-control" id="book-title" placeholder="Enter Your Note Title" required>
                        </div>

                        <!-- Upload Picture -->
                        <div class="form-group">
                            <label for="photo">Display Picture</label>
                            <div class="take-note-detail">
                                <label for="photo"><img src="../images/form/upload-file.png" alt="Uplaod"><br>
                                    Upload a photo</label>
                                <input type="file" name="book-image" id="photo" style="visibility: hidden;" accept="image/png, image/jpeg">
                            </div>
                        </div>

                        <!-- Select Type of book -->
                        <div class="form-group">
                            <div class="dropdown">
                                <label for="selectBookType">Type</label>
                                <br>
                                <button type="button" id="selectBookType" class="select-field" data-toggle="dropdown">
                                    Select your Note type <img src="../images/form/arrow-down.png" alt="Down">
                                </button>
                                <ul class="dropdown-menu dropdown-from-db types" aria-labelledby="selectBookType" style="width:100%">
                                    <?php

                                    $queryType = "SELECT * FROM NoteTypes WHERE IsActive = 1";
                                    $noteType = mysqli_query($connection, $queryType);
                                    while ($type = mysqli_fetch_assoc($noteType)) {
                                        echo "<li value='" . $type['Name'] . "'>" . $type['Name'] . "</li>";
                                    }

                                    ?>

                                </ul>


                            </div>
                            <input type="hidden" name="type">
                        </div>

                    </div>

                    <div class="col-lg-6">

                        <!-- Select Category of book -->
                        <div class="form-group">
                            <div class="dropdown">
                                <label for="book-category">Category *</label>
                                <button type="button" id="book-category" class="select-field" data-toggle="dropdown" required>
                                    Select your Category<img src="../images/form/arrow-down.png" alt="Down">
                                </button>
                                <ul class="dropdown-menu dropdown-from-db categories" aria-labelledby="book-category" style="width:100%">
                                    <?php

                                    $queryCategories = "SELECT * FROM NoteCategories WHERE IsActive = 1";
                                    $noteCategories = mysqli_query($connection, $queryCategories);
                                    while ($categories = mysqli_fetch_assoc($noteCategories)) {
                                        echo "<li value='" . $categories['Name'] . "'>" . $categories['Name'] . "</li>";
                                    }

                                    ?>

                                </ul>

                            </div>
                            <input type="hidden" name="category">
                        </div>

                        <!-- Upload Notes -->
                        <div class="form-group">
                            <label for="file">Upload Notes *</label>
                            <div class="take-note-detail">
                                <label for="file"><img src="../images/form/upload-note.png" alt="Uplaod"><br>
                                    Upload your notes</label>
                                <input type="file" name="note-file[]" id="file" style="visibility: hidden;" accept="application/pdf" multiple required>
                            </div>
                        </div>

                        <!-- Number Of Pages -->
                        <div class="form-group">
                            <label for="note-page">Number of Pages</label>
                            <input type="text" name="number-of-pages" class="form-control" id="note-page" placeholder="Enter number of note pages">
                        </div>
                    </div>
                </div>

                <!-- Description of Book -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Text area -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="description">Description</label>
                                </div>
                            </div>
                            <textarea name="book-description" placeholder="Enter your description" name="comments" id="description" required></textarea>
                        </div>

                    </div>
                </div>

                <!-- Institution Information heading -->
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h2>Institution Information</h2>
                    </div>
                </div>

                <!-- Institution Information fields-->
                <div class="row">
                    <div class="col-lg-6">

                        <!-- Select Country -->
                        <div class="form-group">
                            <div class="dropdown">
                                <label for="selectCountry" required>Country</label>
                                <br>
                                <button type="button" id="selectCountry" class="select-field" data-toggle="dropdown">
                                    Select your country<img src="../images/form/arrow-down.png" alt="Down">
                                </button>
                                <ul class="dropdown-menu dropdown-from-db countries" aria-labelledby="selectCountry" style="width:100%">
                                    <?php

                                    $queryCountry = "SELECT * FROM Countries WHERE IsActive = 1";
                                    $countryResult = mysqli_query($connection, $queryCountry);
                                    while ($country = mysqli_fetch_assoc($countryResult)) {
                                        echo "<li value='" . $country['Name'] . "'>" . $country['Name'] . "</li>";
                                    }

                                    ?>

                                </ul>
                            </div>
                            <input type="hidden" name="country">

                        </div>
                    </div>

                    <div class="col-lg-6">

                        <!-- Title of Institute  -->
                        <div class="form-group">
                            <label for="institution-name" required>Institution Name</label>
                            <input type="text" name="institute-name" class="form-control" id="institution-name" placeholder="Enter Your Institution name">
                        </div>
                    </div>
                </div>

                <!-- Course Detail heading -->
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h2>Course Details</h2>
                    </div>
                </div>

                <!-- Course Detail fields -->
                <div class="row">
                    <div class="col-lg-6">

                        <!-- Course Name -->
                        <div class="form-group">
                            <label for="course-name" required>Course Name</label>
                            <input type="text" name="course-name" class="form-control" id="course-name" placeholder="Enter Your course name">
                        </div>

                    </div>

                    <div class="col-lg-6">

                        <!-- Course code -->
                        <div class="form-group">
                            <label for="course-code" required>Course Code</label>
                            <input type="text" name="course-code" class="form-control" id="course-code" placeholder="Enter Your course code">
                        </div>

                    </div>

                    <div class="col-lg-6">

                        <!-- professor/Lecturer -->
                        <div class="form-group">
                            <label for="professor-name" required>Professor/Lecturer</label>
                            <input type="text" name="pofessor-name" class="form-control" id="professor-name" placeholder="Enter Your professor name">
                        </div>

                    </div>

                </div>

                <!-- Selling information heading -->
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h2>Selling Information</h2>
                    </div>
                </div>

                <!-- Selling information fields -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Sell for *</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="free-paid" id="free" value="Free" checked>
                                    <label class="form-check-label" for="free">
                                        Free
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="free-paid" id="paid" value="Paid">
                                    <label class="form-check-label" for="paid">
                                        Paid
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Sell Price -->
                                <div class="form-group">
                                    <label for="sell-price" required>Sell Price *</label>
                                    <input type="text" name="sell-price" class="form-control" id="sell-price" placeholder="Enter Your price" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Upload preview -->
                        <div class="form-group">
                            <label for="preview" required>Note Preview</label>
                            <div class="take-note-detail">
                                <label for="preview"><img src="../images/form/upload-file.png" alt="Uplaod"><br>
                                    Upload a photo</label>
                                <input type="file" name='notes-preview' id="preview" style="visibility: hidden;" accept="application/pdf" required>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- save and finish button -->
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <button type="submit" name="save" class="save-finish"><span class="text-center">save</span></button>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <button type="submit" name="publish" class="save-finish"><span class="text-center">publish</span></button>
                    </div>
                </div>

            </form>
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

    <script src="../js/header/header.js"></script>
    <script src="../js/user/add-notes.js"></script>

</body>

</html>

<?php

if (isset($_POST['save'])) {

    $sellerID = 1;
    $Status = 6 ;
    $title = $_POST['book-title'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $noOfPages = (int)$_POST['number-of-pages'];
    $description = $_POST['book-description'];
    $counrty = $_POST['country'];
    $institutionName = $_POST['institute-name'];
    $courseName = $_POST['course-name'];
    $courseCode = $_POST['course-code'];
    $professor = $_POST['pofessor-name'];
    $sellFor = $_POST['free-paid'];
    $sellPrice = (int)$_POST['sell-price'];

    $sellFor = mysqli_query($connection, "SELECT * FROM ReferenceData WHERE Value = '$sellFor' ");
    $sellForResult = mysqli_fetch_assoc($sellFor);
    $isPaid = $sellForResult['ID'];

    $getCountry = mysqli_query($connection, "SELECT * FROM Countries WHERE Name = '$counrty'");
    $getCountryResult = mysqli_fetch_assoc($getCountry);
    $countryID = $getCountryResult['ID'];

    $getType = mysqli_query($connection, "SELECT * FROM NoteTypes WHERE Name = '$type' ");
    $getTypeResult = mysqli_fetch_assoc($getType);
    $typeID = $getTypeResult['ID'];

    $getCategory = mysqli_query($connection, "SELECT * FROM NoteCategories WHERE Name =  '$category' ");
    $getCategoryResult = mysqli_fetch_assoc($getCategory);
    $categoryID = $getCategoryResult['ID'];

    // $queryAddNotes = "INSERT INTO NotesDetails( SellerID , Status , Title , Category , NoteType , NumberofPages , Description ,  Country , Course , CourseCode , Professor , IsPaid , SellingPrice  ) VALUES( $sellerID ,  6 , '$title' , $categoryID   , $typeID  ,  $noOfPages , '$description' , $countryID  , '$courseName' , '$courseCode' , '$professor' , $isPaid , $sellPrice )";
    $queryAddNotes = "INSERT INTO NotesDetails( SellerID , Status , Title , Category , NoteType , NumberofPages , Description , UniversityName , Country , Course , CourseCode , Professor , IsPaid , SellingPrice ) VALUES( $sellerID , $Status , '$title' , $categoryID , $type , $noOfPages , '$description' , '$institutionName' , $countryID ,'$courseName' , '$courseCode' , '$professor' , $isPaid , $sellPrice )";
    $queryAddNotesResult = mysqli_query($connection,  $queryAddNotes);

    if ($queryAddNotesResult) {

        $addedNote = mysqli_insert_id($connection);
        $pathToCreateNoteFolder = "../members/" . $sellerID . "/" . $addedNote . "/";
        mkdir($pathToCreateNoteFolder, $mode = 0777, $recursive = false, $context = null);
        $FolderNotesAttachments = $pathToCreateNoteFolder . "Attachements/";
        mkdir($pathToCreateNoteFolderNotesAttachments, $mode = 0777, $recursive = false, $context = null);
 
    // file To upload 
    $dateTime  = new DateTime();
    $timeStamp = $dateTime->getTimestamp();

    // Book Image
    if (isset($_FILES['book-image'])) {

        $book_image  = $_FILES['book-image']['tmp_name'];
        $book_path = $pathToCreateNoteFolder . "DP_" . $timeStamp;
        $bookImageUploades = move_uploaded_file($book_image, $book_path);
        if ($bookImageUploades) {
            mysqli_query($connection, "UPDATE NotesDetails SET DisplayPicture = '$book_path' WHERE ID =  $addedNote");
        }
    }

    //Book Preview
    if (isset($_FILES['notes-preview'])) {

        $bookPreview = $_FILES['notes-preview']['tmp_name'];
        $preview_path = $pathToCreateNoteFolder . "Preview_" . $timeStamp;
        $notePreviewUploaded =  move_uploaded_file($bookPreview, $preview_path);

        if ($notePreviewUploaded) {
            mysqli_query($connection, "UPDATE NotesDetails SET NotesPreview = '$preview_path' WHERE ID =  $addedNote");
        }
    }


    //Book PDF
    if (isset($_FILES['note-file'])) {

        $book_file = $_FILES['note-file']['tmp_name'];
        $fileNumber = count($book_file);

        for ($i = 0; $i < $fileNumber; $i++) {

            $result = mysqli_query($connection, "SELECT MAX('ID') FROM NotesAttachments ");
            $row = mysqli_fetch_row($result);
            $highest_id = $row[0];
            $currentID = (int)$highest_id + 1;

            $fileName = $_FILES['note-file']['name'][$i];
            $fileTempName = $_FILES['note-file']['tmp_name'][$i];

            $file_path = $FolderNotesAttachments . $currentID . "_" . $timeStamp;


            $fileUploaded = move_uploaded_file($fileTempName, $file_path);

            if ($fileUploaded) {
                mysqli_query($connection, "INSERT INTO NotesAttachments( ID , NoteID , FileName , FilePath ) VALUES( $currentID , $addedNote , '$fileName' , '$file_path' )");
            }
        }
    }
} else {
    echo "Not Inserted";
}

}

?>