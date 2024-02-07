<?php
include "../login/connection.php";

if (isset($_COOKIE["username"]) || isset($_SESSION['username'])) {
    $username = isset($_COOKIE['username']) ? $_COOKIE['username'] : $_SESSION['username'];
}

if (isset($_COOKIE['role'])) {
    $_SESSION['user_role'] = $_COOKIE['role'];
}

function user()
{
    $userprofile = "";
    if (isset($_SESSION['username']) || isset($_COOKIE['username'])) {
        // Display the username based on whether the session or cookie is set
        $userprofile = isset($_COOKIE['username']) ? $_COOKIE['username'] : $_SESSION['username'];
        return $userprofile;
    } else {
        return $userprofile;
    }
}

function getProfileImage()
{
    global $conn, $username;

    $query = "SELECT image FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return isset($row['image']) ? $row['image'] : '';
    }

    return '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Eczar">
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Marcellus">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script>
        // JavaScript to set default image if the profile image is not available
        document.getElementById('profile-image').onerror = function () {
            this.src = '../assests/icons/icons8-user-94.png'; // Set the path to your default image
        };
    </script>
</head>

<body>
    <header id="nav-menu" aria-label="navigation bar">
        <div class="container">
            <div class="left-container">
                <a class="logo" href="../Main/index.php">
                    <img alt="Inc Logo" src="../assests/Hope_Foundation_logo2.svg" width="100" height="100"
                        class="Inc Logo" />
                </a>
                <input id="menu-toggle" type="checkbox" />
                <label class='menu-button-container' for="menu-toggle">
                    <div class='menu-button'></div>
                </label>
                <ul class="menu-bar menu">
                    <li>
                        <button class="nav-link" onclick="window.location.href='../Programs/programs.php';">
                            Programs
                        </button>
                    </li>
                    <li>
                        <button class="nav-link" onclick="window.location.href='../children/children.php';">
                            Children?
                        </button>
                    </li>
                    <li>
                        <button class="nav-link" onclick="window.location.href='../News/News.php';">
                            News
                        </button>
                    </li>
                    <li>
                        <button class="nav-link" onclick="window.location.href='../About Us/about_us.php';">
                            About Us
                        </button>
                    </li>
                    <li>
                        <button class="nav-link" onclick="window.location.href='../FAQ/FAQ.php';">
                            FAQ
                        </button>
                    </li>

                    <li class="donate-button">
                        <button class="nav-link donate-button">
                            Donate ❤️
                        </button>
                    </li>
                </ul>
            </div>

            <div class="right-container">
            <?php if (!(isset($_COOKIE['username']) || isset($_SESSION['username']))) { ?>
                    <a href="../login/login.php">
                        <button class="login-btn-wrapper">
                            Log in
                        </button>
                    </a>
                    <a href="../login/signup.php">
                        <button class="login-btn-wrapper">
                            Signup
                        </button>
                    </a>
                <?php } elseif ((isset($_COOKIE["username"]) || (isset($_SESSION['username'])))) {
                    genprofile();
                } ?>

                <?php function genprofile()
                { ?>
                    <div class="profile-div">
                        <input type="checkbox" id="profileToggle" class="profile-toggle">
                        <label for="profileToggle" id="profile" class="profile">
                            <div class="user">
                                <h3><span>
                                        <?php echo user(); ?>
                                    </span></h3>
                            </div>
                            <div class="img-box">
                                <?php
                                $profileImage = getProfileImage();

                                if ($profileImage) {
                                    echo '<img src="../assests/profileImage/' . $profileImage . '" class="profile-img" alt="">';
                                } else {
                                    echo '<img src="../assests/icons/icons8-user-94.png" class="profile-img" alt="">';
                                }
                                ?>
                            </div>
                        </label>

                        <div class="menu-profile" id="menu-profile">
                            <ul>
                                <li><a href="../Profile/profile.php">Profile</a></li>
                                <?php
                                // Check if user is admin
                                if ($_SESSION['user_role'] == 'admin') {
                                    echo '<li><a href="../Inbox-admin/inbox.php">Inbox</a></li>';
                                    echo '<li><a href="../Admin/news_upload.php">News Upload</a></li>';
                                }
                                ?>
                                <li><a href="../Admin/delete_ac.php">Delete Your Account</a></li>
                                <li><a href="../login/logout.php">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>

                <a href="../Donate/Donate.php">
                    <button class="Donate-btn-wrapper">
                        <span class="span-donate">Donate ❤️</span>
                    </button>
                </a>
            </div>

        </div>
    </header>
</body>

</html>