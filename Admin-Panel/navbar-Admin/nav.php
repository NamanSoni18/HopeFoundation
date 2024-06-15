<?php
include "../connection/connection.php";
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
<html>

<head>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Eczar">
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Marcellus">
    <script>
        // JavaScript to set default image if the profile image is not available
        document.getElementById('profile-image').onerror = function () {
            this.src = '../../assests/icons/icons8-user-94.png'; // Set the path to your default image
        };
    </script>
</head>

<body>
    <header id="nav-menu" aria-label="navigation bar">
        <div class="container">
            <div class="left-container">
                <a href="../Main-Admin/index.php">
                    <img alt="Inc Logo" src="../../assests/Hope_Foundation_logo2.svg" width="100" height="100"
                        class="Inc Logo" />
                </a>
                <input id="menu-toggle" type="checkbox" />
                <label class='menu-button-container' for="menu-toggle">
                    <div class='menu-button'></div>
                </label>
                <ul class="menu-bar menu">
                    <li>
                        <button class="nav-link" onclick="window.location.href='../Admin/news_upload.php';">
                        News Upload
                        </button>
                    </li>
                    <li>
                        <button class="nav-link" onclick="window.location.href='../Admin/user_mgmt.php';">
                            User Management
                        </button>
                    </li>
                    <li>
                        <button class="nav-link" onclick="window.location.href='../Inbox-admin/inbox.php';">
                            Inbox
                        </button>
                    </li>
                    <!-- <li>
                        <button class="nav-link" onclick="window.location.href='../Reports/reports.php';">
                            Report
                        </button>
                    </li> -->
                    <li>
                        <button class="nav-link" onclick="window.location.href='http://localhost/phpmyadmin/index.php?route=/database/structure&db=hopefoundation';">
                            Database
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
                <?php
                genprofile();
                ?>

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
                                    echo '<img src="../../assests/profileImage/' . $profileImage . '" class="profile-img" alt="">';
                                } else {
                                    echo '<img src="../../assests/icons/icons8-user-94.png" class="profile-img" alt="">';
                                }
                                ?>
                            </div>
                        </label>

                        <div class="menu-profile" id="menu-profile">
                            <ul>
                                <li><a href="../../User-Panel/Profile/Profile.php">Profile</a></li>
                                <li><a href="../../User-Panel/Main/index.php">User Panel</a></li>
                                <li><a href="../../User-Panel/login/logout.php">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>

                <a href="https://rzp.io/l/UY27L3w">
                    <button class="Donate-btn-wrapper">
                        <span class="span-donate">Donate❤️</span>
                    </button>
                </a>
            </div>

        </div>
    </header>
</body>

</html>