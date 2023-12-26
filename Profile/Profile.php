<?php
include "../login/connection.php";
session_start();

ob_start();

if (isset($_COOKIE["user"]) || isset($_SESSION['username'])) {
    $username = isset($_COOKIE['user']) ? $_COOKIE['user'] : $_SESSION['username'];
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['username'] = $row["username"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["fname"] = $row["fname"];
            $_SESSION["dob"] = $row["dob"];
        }
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

ob_end_clean();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <style>
        .password-toggle {
            position: absolute;
            right: 19px;
            top: 64%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Nav Bar Load -->
    <div w3-include-html="../navbar/nav.php" style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
    </div>
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>
    <script>
        function retVal() {
            var retVal = confirm("You Have not logged in. Want to Login?");
            if (retVal == true) {
                location.replace("../login/login.php");
            }
            else {
                location.replace("../Main/index.html");
                // return false;
            }
        }

        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var icon = document.querySelector('.password-toggle');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordInput.type = "password";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
    </script>
    <!-- <script>
        // JavaScript to set default image if the profile image is not available
        document.querySelector('.profile-image').onerror = function () {
        this.src = '../assests/icons/icons8-user-94.png'; // Set the path to your default image
    };
    </script> -->


    <div class="background"></div>
    <div class="h1-head">
        <h1 id="manage-profile">Manage your Profile</h1>
    </div>
    <div class="main-profile-div">
        <form action="" class="form" method="post" enctype="multipart/form-data">
            <div class="profile-div-img">
                <?php
                $profileImage = getProfileImage();
                $profileImageData = base64_encode($profileImage);

                if ($profileImage) {
                    echo '<img src="data:image/*;base64,' . $profileImageData . '" class="profile-img" alt="">';
                } else {
                    echo '<img src="../assests/icons/icons8-user-94.png" class="profile-img" alt="">';
                }
                ?>
            </div>
            <div class="profile-div2">
                <label for="up_image" class="label">Edit your Profile Photo</label>
                <input type="file" id="up_image" name="up_image" class="input profile-photo">
            </div>
            <div class="profile-div2">
                <label for="up_username" class="label">Edit your Username</label>
                <input type="text" id="up_username" name="up_username" class="input"
                    value="<?php echo $_SESSION['username']; ?>">
            </div>
            <div class="profile-div2">
                <label for="up_fname" class="label">Edit your Name</label>
                <input type="text" class="input" id="up_fname" name="up_fname"
                    value="<?php echo $_SESSION['fname']; ?>">
            </div>
            <div class="profile-div2">
                <label for="up_email" class="label">Edit your Email</label>
                <input type="email" class="input" id="up_email" name="up_email"
                    value="<?php echo $_SESSION['email']; ?>">
            </div>
            <div class="profile-div2">
                <label for="up_pwd" class="label">Edit your Password</label>
                <input type="password" class="input" id="up_pwd" value='<?php echo $_SESSION['password'] ?>' name="up_pwd">
                <i class="password-toggle fas fa-eye-slash" onclick="togglePasswordVisibility('up_pwd')"
                    style="color: black;"></i>
            </div>
            <div class="profile-div2">
                <label for="up_dob" class="label">Edit your Date of Birth</label>
                <input type="date" class="input" id="up_dob" name="up_dob" value="<?php echo $_SESSION['dob']; ?>">
            </div>
            <button class="submit-button-profile"><input name="submit" class="submit" type="submit"
                    value="Submit"></button>
        </form>
    </div>

    <?php

    function user()
    {
        if (!(isset($_COOKIE["user"]) || isset($_SESSION['username']))) {
            echo "<script>retVal();</script>";
        }
    }

    user();

    $username = $pwd = $fname = $dob = $email = "";
    $up_username = $up_pwd = $up_fname = $up_dob = $up_email = "";

    $username = $_SESSION['username'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $up_username = $_POST['up_username'];
        $up_fname = $_POST['up_fname'];
        $up_dob = $_POST['up_dob'];
        $up_email = $_POST['up_email'];
        $up_pwd = $_POST['up_pwd'];

        function updateProfile($username, $up_username, $up_email)
        {
            global $conn;
            global $up_username, $up_email, $up_fname, $up_dob, $up_pwd, $imageData;

            $checkUsernameQuery = "SELECT * FROM user WHERE username = '$up_username' AND username != '$username'";
            $result = mysqli_query($conn, $checkUsernameQuery);

            if (mysqli_num_rows($result) > 0) {
                die('<script>alert("Username already Exist")</script>');
            }

            if (isset($_FILES['up_image']['tmp_name']) && !empty($_FILES['up_image']['tmp_name'])) {
                $up_image = $_FILES['up_image']['tmp_name'];
                $imageData = addslashes(file_get_contents($up_image));
                $updateProfileQuery = "UPDATE user SET username = '$up_username', password = '$up_pwd', email = '$up_email', dob = '$up_dob', fname = '$up_fname', image = '$imageData' WHERE username = '$username'";
            } else {
                $updateProfileQuery = "UPDATE user SET username = '$up_username', password = '$up_pwd', email = '$up_email', dob = '$up_dob', fname = '$up_fname' WHERE username = '$username'";
            }

            if (mysqli_query($conn, $updateProfileQuery)) {
                $_SESSION['username'] = $up_username;
                setcookie("user", $up_username, time() + (30 * 24 * 3600), "/");
                $_SESSION['email'] = $up_email;
                $_SESSION['password'] = $up_pwd;
                $_SESSION['dob'] = $up_dob;
                $_SESSION['fname'] = $up_fname;
                echo '<script>alert("Profile updated successfully!")</script>';
                echo '<script>window.location.href="../Main/index.html";</script>';
                exit;
            } else {
                echo "Error updating profile: " . mysqli_error($conn);
            }
        }

        updateProfile($username, $up_username, $up_email);
        mysqli_close($conn);
    }

    ?>

</body>

</html>