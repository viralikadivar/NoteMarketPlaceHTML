<?php
$linkURL = "http://localhost/NotesMarketPlace/NoteMarketPlaceHTML/mvc3/";

if (isset($_POST['logout'])) {
    session_start();
    unset($_SESSION['logged_in']);
    session_destroy();
    header("Location:login.php");
}

?>

<?php
$linkURL = "http://localhost/NotesMarketPlace/NoteMarketPlaceHTML/mvc3/";
if (isset($_SESSION['userRoleID']) && !empty($_SESSION['userRoleID'])) {

    $userRole = $_SESSION['userRoleID'];

    if ($userRole == 3) {
        $profilePic = $_SESSION['UserProfilePic'];
        $profilePic = str_replace('../', '', $profilePic);
        $profilePicPath = $linkURL  . $profilePic;

        echo '<header id="header">
        <nav class="navbar white-navbar navbar-expand-lg">
        <div class="container navbar-wrapper">
            <a class="navbar-brand" href="' . $linkURL . 'index.php">
                <img class="img-responsive" src="' . $linkURL . 'images/logo/logo-dark.png" alt="logo">
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'search-notes.php">Search Notes</a></li>
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'user/user-dashboard.php">Sell Your Notes</a></li>
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'user/buyers-request.php">Buyer Requests</a></li>
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'contact-us.php">Contact Us</a></li>
                    <li class="nav-item">
                        <div class="dropdown user-image">
                        <img id="user-menu" data-toggle="dropdown" src="' . $profilePicPath . '" alt="User">
                            <div class="dropdown-menu" aria-labelledby="user-menu">
                                <a class="dropdown-item active" href="' . $linkURL . 'user/user-profile.php">My Profile</a>
                                <a class="dropdown-item" href="' . $linkURL . 'user/my-download.php">My Downloads</a>
                                <a class="dropdown-item" href="' . $linkURL . 'user/my-sold-notes.php">My Sold Notes</a>
                                <a class="dropdown-item" href="' . $linkURL . 'user/my-rejected-notes.php">My Rejected Notes</a>
                                <a class="dropdown-item" href="' . $linkURL . 'change-password.php">Change Password</a>
                                <a class="dropdown-item" href="' . $linkURL . 'index.php" id="logout">Logout</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item loginNavTab"><button type="button" class="nav-link logout" data-toggle="modal" data-target="#logoutModal">Logout</button></li>
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
    } else if ($userRole == 1) {
        $profilePic = $_SESSION['UserProfilePic'];
        $profilePic = str_replace('../', '', $profilePic);
        $profilePicPath = $linkURL . $profilePic . ".jpg";

        echo '<header id="header">
        <nav class="navbar white-navbar navbar-expand-lg">
        <div class="container navbar-wrapper">
            <a class="navbar-brand" href="' . $linkURL . 'index.php">
                <img class="img-responsive" src="' . $linkURL . 'images/logo/logo-dark.png" alt="logo">
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'admin/admin-dashboard.php">Dashboard</a></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <div id="notes-menu" data-toggle="dropdown">Notes</div>
                            <div class="dropdown-menu" aria-labelledby="notes-menu">
                                <a class="dropdown-item" href="' . $linkURL . 'admin/notes-under-review.php">Notes Under Review</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/published-notes.php">Published Notes</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/downloaded-notes.php">Downloaded Notes</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/rejected-notes.php">Rejected Notes</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'admin/members.php">Members</a></li>
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'admin/spam-reports.php">Reports</a></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <div id="setting-menu" data-toggle="dropdown">Setting</div>
                            <div class="dropdown-menu" aria-labelledby="setting-menu">
                                <a class="dropdown-item" href="' . $linkURL . 'admin/super-admin/manage-config.php">Manage System Configuration</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/super-admin/manage-admin.php">Manage Administrator</a>
                                <a class="dropdown-item active" href="' . $linkURL . 'admin/manage-category.php">Manage Category</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/manage-type.php">Manage Type</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/manage-country.php">Manage Countries</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown user-image">
                            <img id="image-menu" data-toggle="dropdown" src="' . $profilePicPath . '"
                                alt="Admin">
                            <div class="dropdown-menu" aria-labelledby="user-menu">
                                <a class="dropdown-item" href="' . $linkURL . 'admin/admin-profile.php">Update Profile</a>
                                <a class="dropdown-item" href="' . $linkURL . 'change-password.php">Change Password</a>
                                <a class="dropdown-item" href="' . $linkURL . 'index.php" id="logout">Logout</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item loginNavTab"><button type="button" class="nav-link logout" data-toggle="modal" data-target="#logoutModal">Logout</button></li>
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
    } else {
        $profilePic = $_SESSION['UserProfilePic'];
        $profilePic = str_replace('../', '', $profilePic);
        $profilePicPath = $linkURL . $profilePic;

        echo '<header id="header">
        <nav class="navbar white-navbar navbar-expand-lg">
        <div class="container navbar-wrapper">
            <a class="navbar-brand" href="' . $linkURL . 'index.php">
                <img class="img-responsive" src="' . $linkURL . 'images/logo/logo-dark.png" alt="logo">
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'admin/admin-dashboard.php">Dashboard</a></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <div id="notes-menu" data-toggle="dropdown">Notes</div>
                            <div class="dropdown-menu" aria-labelledby="notes-menu">
                                <a class="dropdown-item" href="' . $linkURL . 'admin/notes-under-review.php">Notes Under Review</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/published-notes.php">Published Notes</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/downloaded-notes.php">Downloaded Notes</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/rejected-notes.php">Rejected Notes</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'admin/members.php">Members</a></li>
                    <li class="nav-item"><a class="nav-link" href="' . $linkURL . 'admin/spam-reports.php">Reports</a></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <div id="setting-menu" data-toggle="dropdown">Setting</div>
                            <div class="dropdown-menu" aria-labelledby="setting-menu">
                                <a class="dropdown-item active" href="' . $linkURL . 'admin/manage-category.php">Manage Category</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/manage-type.php">Manage Type</a>
                                <a class="dropdown-item" href="' . $linkURL . 'admin/manage-country.php">Manage Countries</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown user-image">
                            <img id="image-menu" data-toggle="dropdown" src="' . $profilePicPath . '"
                                alt="Admin">
                            <div class="dropdown-menu" aria-labelledby="user-menu">
                                <a class="dropdown-item" href="' . $linkURL . 'admin/admin-profile.php">Update Profile</a>
                                <a class="dropdown-item" href="' . $linkURL . 'change-password.php">Change Password</a>
                                <a class="dropdown-item" href="' . $linkURL . 'index.php" id="logout">Logout</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item loginNavTab"><button type="button" class="nav-link logout" data-toggle="modal" data-target="#logoutModal">Logout</button></li>
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
                <img class="img-responsive" src="' . $linkURL . 'images/logo/logo-dark.png" alt="logo">
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


?>
<form action="<?php echo $linkURL; ?>header.php" method="post">
    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="logoutModalLabel">Logout</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <P>
                        Are you sure, you want to logout?
                    </P>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="yes" name="logout">Yes</button>
                    <button type="button" class="no" data-dismiss="modal">No</button>

                </div>
            </div>
        </div>
    </div>
</form>