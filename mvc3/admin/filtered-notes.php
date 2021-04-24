<?php

require  "../db_connection.php";
global $connection;

function getUserName($id)
{
    global $connection;
    $getUserNameQuery = "SELECT * FROM Users WHERE ID = $id ";
    $getUserNameResult = mysqli_query($connection, $getUserNameQuery);
    $userDetails = mysqli_fetch_assoc($getUserNameResult);
    $userFirstName = $userDetails['FirstName'];
    $usersLastName = $userDetails['LastName'];
    $usersFullName = $userFirstName  . ' ' . $usersLastName;
    return $usersFullName;
}

if (isset($_POST['inReviewSellerID'])) {
    $sellerId = $_POST['inReviewSellerID'];

    $getInReviewNotesQuery = "SELECT * FROM NotesDetails WHERE Status = 7 OR Status = 8 AND IsActive = 1 AND SellerID = $sellerId ";
    $getInReviewNotesResult = mysqli_query($connection, $getInReviewNotesQuery);
    $count = 1;

    while ($inProgressBook = mysqli_fetch_assoc($getInReviewNotesResult)) {

        $inProgressID = $inProgressBook['ID'];

        $addedDate = $inProgressBook['CreatedDate'];
        $addedDate = strtotime($addedDate);
        $addedDate = date('d-m-Y,H:i', $addedDate);

        $inProgressTitle = $inProgressBook['Title'];

        $categoryID = $inProgressBook['Category'];
        $queryCategories = "SELECT * FROM NoteCategories WHERE ID = $categoryID ";
        $noteCategoriesResult = mysqli_query($connection, $queryCategories);
        $noteCategories = mysqli_fetch_assoc($noteCategoriesResult);
        $category = $noteCategories['Name'];

        $bookStatusID = $inProgressBook['Status'];
        $bookStatusQuery = "SELECT * FROM ReferenceData WHERE RefCategory = 'Notes Status' AND ID = $bookStatusID ";
        $bookStatusResult = mysqli_query($connection, $bookStatusQuery);
        $bookStatusDetail = mysqli_fetch_assoc($bookStatusResult);
        $bookStatus = $bookStatusDetail['Value'];

        // Book Seller 
        $publisher = $inProgressBook['SellerID'];
        $getPublisherNameQuery = "SELECT * FROM Users WHERE ID = $publisher ";
        $getPublisherNameResult = mysqli_query($connection, $getPublisherNameQuery);
        $publisherDetail = mysqli_fetch_assoc($getPublisherNameResult);
        $publisherFirstName = $publisherDetail['FirstName'];
        $publisherLastName = $publisherDetail['LastName'];
        $publisherName = $publisherFirstName . ' ' . $publisherLastName;
        $bookSellerEmail = $publisherDetail['EmailID'];


        echo '<tr class="table-row">
                                        <td>' . $count . '</td>
                                        <td class="noteTitle">' . $inProgressTitle . '</td>
                                        <td>' . $category . '</td>
    
                                        <td>' . $publisherName . '</td>
                                        <td>' . $addedDate . '</td>
                                        <td>' . $bookStatus . '</td>
                                        <td> <button type="button" name="isApprove" class="approve" data-toggle="modal" data-target="#approve">Approve</button> 
                                             <button type="button" name="isReject" class="reject" data-toggle="modal" data-target="#remark">Reject</button>
                                             <button type="button" name="isInReview" class="inrerview" data-toggle="modal" data-target="#review">InReview</button></td>
    
                                        <td class="dropup dropleft">
                                            <div data-toggle="dropdown">
                                                <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                            </div>
                                            <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                <button type="submit" name="noteDetail" class="dropdown-item">View More Details</button>
                                                <button type="submit" name="download" class="dropdown-item">Download Notes</button>
                                            </div>
                                        </td>

                                        <input type = "hidden" name="givenNoteID" class="noteID" value="' . $inProgressID . '">
                                        <input type = "hidden" name="noteID">

                                    </tr>';



        $count++;
    }
    if (!mysqli_num_rows($getInReviewNotesResult)) {
        echo '<tr><td colspan="8">No Record Found<tr>';
    }
}

else if (isset($_POST['publishedSellerID'])) {
    $sellerPublisherId = $_POST['publishedSellerID'];

    $getPublishedNotesQuery = "SELECT * FROM NotesDetails WHERE Status = 9 AND IsActive = 1 AND SellerID =  $sellerPublisherId ";
    $getPublishedNotesResult = mysqli_query($connection, $getPublishedNotesQuery);

    $count = 1;

    while ($publishedNotes = mysqli_fetch_assoc($getPublishedNotesResult)) {

        $bookID = $publishedNotes['ID'];
        $bookTitle = $publishedNotes['Title'];
        $bookCategoryID = $publishedNotes['Category'];
        $publisher = $publishedNotes['SellerID'];
        $approvedBy = $publishedNotes['ActionedBy'];
        $publishedDate = $publishedNotes['PublishedDate'];
        $noOfDownloads =  0;

        // For Category 
        $getCategoryNameQuery = "SELECT * FROM NoteCategories WHERE ID = $bookCategoryID ";
        $getCategoryNameResult = mysqli_query($connection, $getCategoryNameQuery);
        $categoryDetails = mysqli_fetch_assoc($getCategoryNameResult);
        $categoryName = $categoryDetails['Name'];

        // For file size 
        $attachmentFileSize  = "";
        $attachmentSize = 0;

        $getAttachmentPath = "SELECT * FROM NotesAttachments WHERE NoteID = $bookID ";
        $getAttachmentPathResult =  mysqli_query($connection, $getAttachmentPath);
        while ($attachmentPath = mysqli_fetch_assoc($getAttachmentPathResult)) {
            $filePath = $attachmentPath['FilePath'];
            $attachmentSize = $attachmentSize + filesize($filePath);
        }

        $attachmentSizeInKB = $attachmentSize / 1024;
        $attachmentSizeInMB = $attachmentSizeInKB / 1024;

        $attachmentSizeInKB = ceil($attachmentSizeInKB);
        $attachmentSizeInMB = ceil($attachmentSizeInMB);

        if ($attachmentSizeInKB >= 1024) {
            $attachmentFileSize = $attachmentSizeInMB . 'MB';
        } else {
            $attachmentFileSize = $attachmentSizeInKB . 'KB';
        }

        // For paid or free
        $sellType = $publishedNotes['IsPaid'];
        $priceDollar = 0;
        $freeOrPaid = "Free";
        if ($sellType == 4) {
            $freeOrPaid = "Paid";
            $priceINR = (int)$publishedNotes['SellingPrice'];
            $priceINR = bcdiv($priceINR, 1, 2);
            $dollarRate = 72.67;
            $priceDollar = bcdiv($priceINR, $dollarRate, 2);
        }

        // For Publisher Name
        $getPublisherNameQuery = "SELECT * FROM Users WHERE ID = $publisher ";
        $getPublisherNameResult = mysqli_query($connection, $getPublisherNameQuery);
        $publisherDetail = mysqli_fetch_assoc($getPublisherNameResult);
        $publisherFirstName = $publisherDetail['FirstName'];
        $publisherLastName = $publisherDetail['LastName'];
        $publisherName = $publisherFirstName . ' ' . $publisherLastName;
        $bookSeller = $publisherDetail['EmailID'];

        // For Published Date
        $publishedDate = strtotime($publishedDate);
        $publishedDate = date("d-m-Y,h:i", $publishedDate);

        // Approved Date 
        $getApproverNameQuery = "SELECT * FROM Users WHERE ID = $approvedBy";
        $getApproverNameResult = mysqli_query($connection, $getApproverNameQuery);
        $approverDetail = mysqli_fetch_assoc($getApproverNameResult);
        $approverFirstName = $approverDetail['FirstName'];
        $approverLastName = $approverDetail['LastName'];
        $approverName = $approverFirstName . ' ' . $approverLastName;

        // For Number of Downloads 
        $noOfDownloads =  0;
        $noOfDownloadsQuery = "SELECT * FROM NotesDownloads WHERE NoteID = $bookID AND IsAttachmentDownloaded = 1";
        $noOfDownloadsResult = mysqli_query($connection, $noOfDownloadsQuery);
        if ($noOfDownloadsResult) {
            $noOfDownloads = mysqli_num_rows($noOfDownloadsResult);
        }

        echo '<tr class="table-row">
                                            <td>' . $count . '</td>
                                            <td class="noteTitle">' . $bookTitle . '</td>
                                            <td>' . $categoryName . '</td>
                                            <td>' . $freeOrPaid . '</td>
                                            <td>$' . $priceDollar . '</td>
                                            <td>' . $publisherName . '</td>
                                            <td><img class="view-seller" src="../images/form/eye.png" alt="Detail"></td>
                                            <td>' . $publishedDate . '</td>
                                            <td>' . $approverName . '</td>
                                            <td class="noOfDownloads">' . $noOfDownloads . '</td>
                                            <td class="dropup dropleft">
                                                <div data-toggle="dropdown">
                                                    <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                </div>
                                                <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                    <button type="submit" class="dropdown-item"  name="download">Download Notes</button>
                                                    <button type="submit" class="dropdown-item" name="noteDetail">View More Details</button>
                                                    <button type="button" name="unpublish" class="dropdown-item"  data-toggle="modal" data-target="#unpublishNote">Unpublish</button>
                                                </div>
                                            </td>

                                            <input type = "hidden" name="givenNoteID" class="noteID" value="' . $bookID . '">
                                            <input type = "hidden" name="noteID">

                                            <input type = "hidden" name="noteTitle">
                                            <input type = "hidden" name="sellerName">

                                            <input type = "hidden" name="givenSellerEmail" class="noteSeller" value="' . $bookSeller . '">
                                            <input type = "hidden" name="sellerEmail">

                                            <button type="submit" name="getNoOfDownloads" style="display:none">Unpublish</button>

                                                <input type = "hidden"  class="seller" value="' . $publisher . '">
                                                <input type = "hidden" name="memberID">
                                                <button type="submit" name="viewMember" style="visibility:none;">

                                        </tr>';
        $count++;
    }

    if (!mysqli_num_rows($getPublishedNotesResult)) {
        echo '<tr><td colspan="11">No Record Found<tr>';
    }
}

else if (isset($_POST['rejectedSellerID'])) {

    $ellerID = $_POST['rejectedSellerID'];

    $getRejectededNotesQuery = "SELECT * FROM NotesDetails WHERE Status = 10 AND SellerID = $ellerID ";
    $getRejectededNotesResult = mysqli_query($connection, $getRejectededNotesQuery);

    $count = 1;

    while ($rejectededNotes = mysqli_fetch_assoc($getRejectededNotesResult)) {

        $bookID = $rejectededNotes['ID'];
        $bookTitle = $rejectededNotes['Title'];
        $bookCategoryID = $rejectededNotes['Category'];
        $sellerID = $rejectededNotes['SellerID'];
        $rejectedByID = $rejectededNotes['ActionedBy'];
        $editedDate = $rejectededNotes['ModifiedDate'];
        $remark = $rejectededNotes['AdminRemarks'];

        // For Category 
        $getCategoryNameQuery = "SELECT * FROM NoteCategories WHERE ID = $bookCategoryID ";
        $getCategoryNameResult = mysqli_query($connection, $getCategoryNameQuery);
        $categoryDetails = mysqli_fetch_assoc($getCategoryNameResult);
        $categoryName = $categoryDetails['Name'];

        // Seller name 
        $sellerName = getUserName($sellerID);

        // For rejecteded Date
        $editedDate = strtotime($editedDate);
        $editedDate = date("d-m-Y,h:i", $editedDate);

        // Rejected By 
        $editorName = getUserName($rejectedByID);

        echo '<tr class="table-row">
                                            <td>' . $count . '</td>
                                            <td class="view-note-details">' . $bookTitle . '</td>
                                            <td>' . $categoryName . '</td>
                                            <td>' . $sellerName . '</td>
                                            <td><img src="../images/form/eye.png" class="viewMemberDetail" alt="View"></td>
                                            <td>' . $editedDate . '</td>
                                            <td>' . $editorName . '</td>
                                            <td>' . $remark . '</td>
                                            <td class="dropup dropleft">
                                                <div data-toggle="dropdown">
                                                    <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                </div>
                                                <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                    <button type="button" name="publish"  class="dropdown-item" data-toggle="modal" data-target="#publishNote">Approve</button>
                                                    <button type="submit" class="dropdown-item"  name="download">Download Notes</button>
                                                    <button type="submit" class="dropdown-item" name="noteDetail">View More Details</button>
                                                </div>
                                            </td>

                                            <input type = "hidden" name="givenNoteID" class="noteID" value="' . $bookID . '">
                                            <input type = "hidden" name="noteID">

                                            <input type = "hidden" name="givenSllerID" class="sellerID" value="' . $sellerID  . '">
                                            <input type = "hidden" name="sellerID">
                                            <button type="submit" name="viewMemberDetail" style="display:none">

                                        </tr>';

        $count++;
    }
    if (!mysqli_num_rows($getRejectededNotesResult)) {
        echo '<tr><td colspan="9">No Record Found<tr>';
    }
}

else if (isset($_POST['selectedMonthID'])) {

    $month = $_POST['selectedMonthID'];

    $getPublishedNotesQuery = "SELECT * FROM NotesDetails WHERE Status = 9 AND IsActive = 1 AND  month(PublishedDate) = $month";
    $getPublishedNotesResult = mysqli_query($connection, $getPublishedNotesQuery);

    $tableRow = "";
    if ($getPublishedNotesResult) {

        $count = 1;

        while ($publishedNotes = mysqli_fetch_assoc($getPublishedNotesResult)) {

            $bookID = $publishedNotes['ID'];
            $bookTitle = $publishedNotes['Title'];
            $bookCategoryID = $publishedNotes['Category'];
            $publisher = $publishedNotes['SellerID'];
            $publishedDate = $publishedNotes['PublishedDate'];
            $noOfDownloads =  0;

            // For Category 
            $getCategoryNameQuery = "SELECT * FROM NoteCategories WHERE ID = $bookCategoryID ";
            $getCategoryNameResult = mysqli_query($connection, $getCategoryNameQuery);
            $categoryDetails = mysqli_fetch_assoc($getCategoryNameResult);
            $categoryName = $categoryDetails['Name'];

            // For file size 
            $attachmentFileSize  = "";
            $attachmentSize = 0;

            $getAttachmentPath = "SELECT * FROM NotesAttachments WHERE NoteID = $bookID ";
            $getAttachmentPathResult =  mysqli_query($connection, $getAttachmentPath);
            while ($attachmentPath = mysqli_fetch_assoc($getAttachmentPathResult)) {
                $filePath = $attachmentPath['FilePath'];
                $attachmentSize = $attachmentSize + filesize($filePath);
            }

            $attachmentSizeInKB = $attachmentSize / 1024;
            $attachmentSizeInMB = $attachmentSizeInKB / 1024;

            $attachmentSizeInKB = ceil($attachmentSizeInKB);
            $attachmentSizeInMB = ceil($attachmentSizeInMB);

            if ($attachmentSizeInKB >= 1024) {
                $attachmentFileSize = $attachmentSizeInMB . 'MB';
            } else {
                $attachmentFileSize = $attachmentSizeInKB . 'KB';
            }

            // For paid or free
            $sellType = $publishedNotes['IsPaid'];
            $priceDollar = 0;
            $freeOrPaid = "Free";
            if ($sellType == 4) {
                $freeOrPaid = "Paid";
                $priceINR = (int)$publishedNotes['SellingPrice'];
                $priceINR = bcdiv($priceINR, 1, 2);
                $dollarRate = 72.67;
                $priceDollar = bcdiv($priceINR, $dollarRate, 2);
            }

            // For Publisher Name
            $getPublisherNameQuery = "SELECT * FROM Users WHERE ID = $publisher ";
            $getPublisherNameResult = mysqli_query($connection, $getPublisherNameQuery);
            $publisherDetail = mysqli_fetch_assoc($getPublisherNameResult);
            $publisherFirstName = $publisherDetail['FirstName'];
            $publisherLastName = $publisherDetail['LastName'];
            $publisherName = $publisherFirstName . ' ' . $publisherLastName;
            $bookSeller = $publisherDetail['EmailID'];

            // For Published Date
            $publishedDate = strtotime($publishedDate);
            $publishedDate = date("d-m-Y,h:i", $publishedDate);

            // For Number of Downloads 
            $noOfDownloads =  0;
            $noOfDownloadsQuery = "SELECT * FROM NotesDownloads WHERE NoteID = $bookID AND IsAttachmentDownloaded = 1";
            $noOfDownloadsResult = mysqli_query($connection, $noOfDownloadsQuery);
            if ($noOfDownloadsResult) {
                $noOfDownloads = mysqli_num_rows($noOfDownloadsResult);
            }


            $tableRow .=    '<tr class="table-row">
                        <td>' . $count . '</td>
                        <td class="noteTitle">' . $bookTitle . '</td>
                                                            <td>' . $categoryName . '</td>
                                                            <td>' . $attachmentFileSize . '</td>
                                                            <td>' . $freeOrPaid . '</td>
                                                            <td>$' . $priceDollar . '</td>
                                                            <td class="sellerName">' . $publisherName . '</td>
                                                            <td>' . $publishedDate . '</td>
                                                            <td class="noOfDownloads">' . $noOfDownloads . '</td>
                                                            <td class="dropup dropleft">
                                                                <div data-toggle="dropdown">
                                                                    <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                                                                </div>
                                                                <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                                                                    <button type="submit" class="dropdown-item"  name="download">Download Notes</button>
                                                                    <button type="submit" class="dropdown-item" name="noteDetail">View More Details</button>
                                                                    <button type="button" name="unpublish" class="dropdown-item"  data-toggle="modal" data-target="#unpublishNote">Unpublish</button>
                                                                </div>
                                                            </td>
                                                            <input type = "hidden" name="givenNoteID" class="noteID" value="' . $bookID . '">
                                                            <input type = "hidden" name="noteID">

                                                            <input type = "hidden" name="noteTitle">
                                                            <input type = "hidden" name="sellerName">

                                                            <input type = "hidden" name="givenSellerEmail" class="noteSeller" value="' . $bookSeller . '">
                                                            <input type = "hidden" name="sellerEmail">

                                                            <button type="submit" name="getNoOfDownloads" style="display:none">Unpublish</button>


                                                            </tr>';

            $count++;
        }
    }
    if(!mysqli_num_rows($getPublishedNotesResult)){
        $tableRow = '<tr><td colspan="10">No Record Found<tr>';
    }

    echo $tableRow ;
} 