<?php

require  "db_connection.php";
global $connection;

$output =  '<div class="col-lg-4 col-md-6 col-sm-12">No Such Book Found!</div>';
$totalSearhedBooks = 0;
$bookSearch = "";
$boookType = "";
$bookcategory = "";
$bookUniversity =  "";
$bookCourse = "";
$bookCountry = "";
$bookRating  ="";


// Book Title 
if(isset($_POST['searchName'])){
    $bookName = $_POST['searchName'];
    $bookSearch = "AND Title LIKE '%".$bookName."%'";
}

// Book type 
if(isset($_POST['type'])){
    $type = (int)$_POST['type'];
    $boookType = "AND NoteType = ".$type ;
}

// Book Category 
if(isset($_POST['category'])){
    $category = (int)$_POST['category'];
    $bookcategory = "AND Category = ".$category;
}

// Book University 
if(isset($_POST['university'])){
    $university = $_POST['university'];
    $bookUniversity =  "AND UniversityName LIKE '%".$university."%'";
}

// Book Course 
if(isset($_POST['course'])){
    $course = $_POST['course'];
    $bookCourse = "AND Course LIKE '%".$course."%'";
}

// Book Country
if(isset($_POST['country'])){
    $country = $_POST['country'];
    $bookCountry = "AND Country = ".$country;
}

// Book Ratings 
if(isset($_POST['rating'])){
    $ratings = $_POST['rating'];
    $bookRating  = "AND Ratings >= ".$ratings;
}


$showBooksQuery = "SELECT * FROM NotesDetails WHERE IsActive = 1 AND Status = 9 ".$bookSearch.$boookType.$bookcategory.$bookUniversity.$bookCourse.$bookCountry.$bookRating ;
$showBookResult = mysqli_query($connection, $showBooksQuery);


if($showBookResult) {
    $totalSearhedBooks = mysqli_num_rows($showBookResult);
    $output =  "";

while ($bookDetails = mysqli_fetch_assoc($showBookResult)) {
    
    $bookID = $bookDetails['ID'];
    $bookTitle = $bookDetails['Title'];
    $bookUniversity = $bookDetails['UniversityName'];
    $bookRatings = $bookDetails['Ratings'];
    $bookPages = $bookDetails['NumberofPages'];
    $imageSRC = $bookDetails['DisplayPicture'];
    $countryID = $bookDetails['Country'];
    $totalRatings = 0;
    $spamReports = 0;

    $getCountry = mysqli_query($connection, "SELECT * FROM Countries WHERE ID = $countryID ");
    $getCountryResult = mysqli_fetch_assoc($getCountry);
    $country = $getCountryResult['Name'];

    $imageSRC = str_replace('../', '', $imageSRC);

    $publishedDate = $bookDetails['PublishedDate'];
    $dateTime = strtotime($publishedDate);
    $publishedDate = date("D, M d Y", $dateTime);

    $totalRatingResult = mysqli_query($connection, "SELECT * FROM NotesReviews WHERE NoteID = $bookID ");
    if ($totalRatingResult) {
        $totalRatings = mysqli_num_rows($totalRatingResult);
    }

    $totalSpamResult = mysqli_query($connection, "SELECT * FROM ReportedIssues WHERE NoteID = $bookID ");
    if ($totalSpamResult) {
        $spamReports = mysqli_num_rows($totalSpamResult);
    }

    $output =  $output . '<div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="book-info">
                        <img src="' . $imageSRC . '" class="img-responsive book-img" alt="Book">

                        <div class="book-short-info">

                            <div class="book-heading">
                                <a class="link-to-note-preview">
                                    <h5>' . $bookTitle . '</h5>
                                </a>

                                <input type="hidden" name="noteID" value="' . $bookID . '">
                                <input type="hidden" name="getNoteID">
                                <button type="submit" name="getNoteDetail" style="visibility:hidden">

                            </div>

                            <ul>
                                <li>
                                    <div class="book-info-img"><img src="images/search/university.png" alt="University">
                                    </div><span>' . $bookUniversity . ', ' . $country . '</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="images/search/pages.png" alt="Book"></div>
                                    <span>' . $bookPages . ' Pages</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="images/search/calendar.png" alt="calendar">
                                    </div><span>' . $publishedDate . '</span>
                                </li>
                                <li>
                                    <div class="book-info-img"><img src="images/search/flag.png" alt="Report"></div>
                                    <span>' . $spamReports . ' Users marked this as
                                        inapropriate</span>
                                </li>
                            </ul>
                            <div class="row star">
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <img src="images/search/star.png" alt="Star">
                                    <img src="images/search/star.png" alt="Star">
                                    <img src="images/search/star.png" alt="Star">
                                    <img src="images/search/star.png" alt="Star">
                                    <img src="images/search/star.png" alt="Star">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7">' . $totalRatings . ' reviews</div>
                            </div>
                        </div>
                    </div>
                </div>';
}
}
echo '<div class="container">

        <div class="row heading">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2>Total '.$totalSearhedBooks.' notes</h2>
            </div>
        </div>

        <div class="row" >'.$output.'</div>

    </div>';
?>