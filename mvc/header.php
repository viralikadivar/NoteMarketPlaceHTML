<?php
$fileURL = "http://localhost/NotesMarketPlace/NoteMarketPlaceHTML/mvc/";
if(isset($_SESSION['userRoleID']) && !empty($_SESSION['userRoleID'])) {
    
    $userRole = $_SESSION['userRoleID'];
    $profilePic = $_SESSION['UserProfilePic'];
    $profilePic = str_replace('../' , '' , $profilePic);
    $profilePicPath = "http://localhost/NotesMarketPlace/NoteMarketPlaceHTML/mvc/".$profilePic;

    if ($userRole = 3) {
        echo '<header id="header">
        <nav class="navbar white-navbar navbar-expand-lg">
        <div class="container navbar-wrapper">
            <a class="navbar-brand" href="'.$fileURL.'index.php">
                <img class="img-responsive" src="'.$fileURL.'images/logo/logo-dark.png" alt="logo">
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="'.$fileURL.'search-notes.php">Search Notes</a></li>
                    <li class="nav-item"><a class="nav-link" href="'.$fileURL.'user/user-dashboard.php">Sell Your Notes</a></li>
                    <li class="nav-item"><a class="nav-link" href="'.$fileURL.'user/buyers-request.php">Buyer Requests</a></li>
                    <li class="nav-item"><a class="nav-link" href="'.$fileURL.'faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="'.$fileURL.'contact-us.php">Contact Us</a></li>
                    <li class="nav-item">
                        <div class="dropdown user-image">
                        <img id="user-menu" data-toggle="dropdown" src="'.$fileURL.$profilePicPath.'" alt="User">
                            <div class="dropdown-menu" aria-labelledby="user-menu">
                                <a class="dropdown-item active" href="'.$fileURL.'user/user-profile.php">My Profile</a>
                                <a class="dropdown-item" href="'.$fileURL.'user/my-download.php">My Downloads</a>
                                <a class="dropdown-item" href="'.$fileURL.'user/my-sold-notes.php">My Sold Notes</a>
                                <a class="dropdown-item" href="'.$fileURL.'user/my-rejected-notes.php">My Rejected Notes</a>
                                <a class="dropdown-item" href="'.$fileURL.'user/change-password.php">Change Password</a>
                                <a class="dropdown-item" href="'.$fileURL.'index.php" id="logout">Logout</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item loginNavTab"><a class="nav-link" href="'.$fileURL.'header.php?logout=true">Logout</a></li>
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
        </header>';
    } else {
        echo '<header id="header">
        <nav class="navbar white-navbar navbar-expand-lg">
        <div class="container navbar-wrapper">
            <a class="navbar-brand" href="'.$fileURL.'index.php">
                <img class="img-responsive" src="http://localhost/NotesMarketPlace/NoteMarketPlaceHTML/mvc/images/logo/logo-dark.png" alt="logo">
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="'.$fileURL.'admin/admin-dashboard.php">Dashboard</a></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <div id="notes-menu" data-toggle="dropdown">Notes</div>
                            <div class="dropdown-menu" aria-labelledby="notes-menu">
                                <a class="dropdown-item" href="'.$fileURL.'admin/notes-under-review.php">Notes Under Review</a>
                                <a class="dropdown-item" href="'.$fileURL.'admin/published-notes.php">Published Notes</a>
                                <a class="dropdown-item" href="'.$fileURL.'admin/downloaded-notes.php">Downloaded Notes</a>
                                <a class="dropdown-item" href="'.$fileURL.'admin/rejected-notes.php">Rejected Notes</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="'.$fileURL.'admin/members.php">Members</a></li>
                    <li class="nav-item"><a class="nav-link" href="'.$fileURL.'admin/spam-reports.php">Reports</a></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <div id="setting-menu" data-toggle="dropdown">Setting</div>
                            <div class="dropdown-menu" aria-labelledby="setting-menu">
                                <a class="dropdown-item" href="'.$fileURL.'admin/super-admin/manage-config.php">Manage System Configuration</a>
                                <a class="dropdown-item" href="'.$fileURL.'admin/super-admin/add-admin.php">Manage Administrator</a>
                                <a class="dropdown-item active" href="'.$fileURL.'admin/manage-category.php">Manage Category</a>
                                <a class="dropdown-item" href="'.$fileURL.'admin/manage-type.php">Manage Type</a>
                                <a class="dropdown-item" href="'.$fileURL.'admin/manage-country.php">Manage Countries</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown user-image">
                            <img id="image-menu" data-toggle="dropdown" src="'.$fileURL.$profilePicPath.'"
                                alt="Admin">
                            <div class="dropdown-menu" aria-labelledby="user-menu">
                                <a class="dropdown-item" href="'.$fileURL.'admin/admin-profile.php">Update Profile</a>
                                <a class="dropdown-item" href="'.$fileURL.'user/change-password.php">Change Password</a>
                                <a class="dropdown-item" href="'.$fileURL.'index.php" id="logout">Logout</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item loginNavTab"><a class="nav-link" href="'.$fileURL.'/index.php">Logout</a></li>
                </ul>
            </div>
        </div>
        </nav>

        <nav class="navbar mobile-navbar navbar-expand-lg justify-content-end">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span id="open" class="navbar-toggler-icon">&#9776;</span>
            <span id="close" class="navbar-toggler-icon">&times;</span>
        </button>
        </nav>
        </header>';
    }
} else {
    echo '<header id="header">
    <nav class="navbar white-navbar navbar-expand-lg">
        <div class="container navbar-wrapper">
            <a class="navbar-brand" href="index.php">
                <img class="img-responsive" src="http://localhost/NotesMarketPlace/NoteMarketPlaceHTML/mvc/images/logo/logo-dark.png" alt="logo">
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="search-notes.php">Search Notes</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Sell Your Notes</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    <li class="nav-item loginNavTab"><a class="nav-link" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <nav class="navbar mobile-navbar navbar-expand-lg justify-content-end">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span id="open" class="navbar-toggler-icon">&#9776;</span>
            <span id="close" class="navbar-toggler-icon">&times;</span>
        </button>
    </nav>
    </header>';
}



// Logout Function 
function logout()
{
    session_start();
    session_destroy();
    header("Location:http://localhost/NotesMarketPlace/NoteMarketPlaceHTML/mvc/login.php");
}

// To Call Logout Function 
if (isset($_GET['logout'])) {
    logout();
}
?>