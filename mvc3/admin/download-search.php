<?php

require "../db_connection.php";
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

$getSeller = "";
$getBook = "";
$getBuyer = "";


if (isset($_POST['downloadedSellerID'])) {
    $sellerID = $_POST['downloadedSellerID'];
    if (!empty($sellerID)) {
        $getSeller = " " . "AND Seller = " . $sellerID;
    }
}

if (isset($_POST['downloadedBuyerID'])) {
    $buyerID = $_POST['downloadedBuyerID'];
    if (!empty($buyerID)) {
        $getBuyer = " " . "AND Downloader = " . $buyerID;
    }
}

if (isset($_POST['downloadedBookID'])) {
    $bookID = $_POST['downloadedBookID'];
    if (!empty($bookID)) {
        $getBook = " AND NoteID = " . $bookID;
    }
}

$getDownloadedNotesQuery = "SELECT * FROM NotesDownloads WHERE 	IsAttachmentDownloaded = 1 AND IsActive = 1" . $getBook . $getSeller . $getBuyer;
$getDownloadedNotesResult = mysqli_query($connection, $getDownloadedNotesQuery);


$count = 1;

while ($downloadedNotes = mysqli_fetch_assoc($getDownloadedNotesResult)) {

    $bookID = $downloadedNotes['NoteID'];
    $bookTitle = $downloadedNotes['NoteTitle'];
    $bookCategory = $downloadedNotes['NoteCategory'];
    $buyerID = $downloadedNotes['Downloader'];
    $sellerID = $downloadedNotes['Seller'];
    $downloadedDate = $downloadedNotes['AttachmentDownloadedDate'];

    $buyerName = getUserName($buyerID);
    $sellerName = getUserName($sellerID);

    // For paid or free
    $sellType = $downloadedNotes['IsPaid'];
    $priceDollar = 0;
    $freeOrPaid = "Free";
    if ($sellType == 1) {
        $freeOrPaid = "Paid";
        $priceINR = (int)$downloadedNotes['PurchasedPrice'];
        $priceINR = bcdiv($priceINR, 1, 2);
        $dollarRate = 72.67;
        $priceDollar = bcdiv($priceINR, $dollarRate, 2);
    }

    // For Published Date
    $downloadedDate = strtotime($downloadedDate);
    $downloadedDate = date("d-m-Y,h:i", $downloadedDate);


    echo '<tr class="table-row">
                <td>' . $count . '</td>
                <td class="viewNote">' . $bookTitle . '</td>
                <td>' . $bookCategory . '</td>

                <td>' . $buyerName . '</td>
                <td><img class="view-downloader" src="../images/form/eye.png" alt="View"></td>

                <td>' . $sellerName . '</td>
                <td><img class="view-seller" src="../images/form/eye.png" alt="View"></td>

                <td>' . $freeOrPaid . '</td>
                <td>$' . $priceDollar . '</td>
                <td>' . $downloadedDate . '</td>
                <td class="dropup dropleft">
                    <div data-toggle="dropdown">
                        <img src="../images/form/dots.png" id="row' . $count . '" alt="Detail">
                    </div>
                    <div class="dropdown-menu" aria-labelledby="row' . $count . '">
                        <button type="submit" class="dropdown-item"  name="download">Download Notes</button>
                        <button type="submit" class="dropdown-item" name="noteDetail">View More Detail</button>
                    </div>
                </td>

                <input type = "hidden" name="givenNoteID" class="noteID" value="' . $bookID . '">
                <input type = "hidden" name="noteID">

                <input type = "hidden"  class="buyer" value="' . $buyerID . '">
                <input type = "hidden"  class="seller" value="' . $sellerID . '">
                <input type = "hidden" name="memberID">
                <button type="submit" name="viewMember" style="display:none;">

            </tr>';
    $count++;
}
if (!mysqli_num_rows($getDownloadedNotesResult)) {
    echo '<tr><td colspan="11">No Record Found<tr>';
}
