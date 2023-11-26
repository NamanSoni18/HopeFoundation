<?php
include "../login/connection.php";
session_start();

if (isset($_COOKIE["user"])) {
    $username = $_COOKIE['user'];
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
    <script src="nav.js"></script>
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


    <div class="h1-head">
        <h1 id="manage-profile">Manage your Profile</h1>
    </div>
    <div class="main-profile-div">
        <form action="" class="form" method="post">
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
                <input type="password" class="input" id="up_pwd" name="up_pwd">
                    <i class="password-toggle fas fa-eye-slash" onclick="togglePasswordVisibility('up_pwd')"></i>
            </div>
            <div class="profile-div2">
                <label for="up_dob" class="label">Edit your Date of Birth</label>
                <input type="date" class="input" id="up_dob" name="up_dob" value="<?php echo $_SESSION['dob']; ?>">
            </div>
            <button class="submit-button-profile"><input name="submit" class="submit" type="submit"
                    value="Submit"></button>
        </form>
    </div>
</body>

</html>
<?php

function user()
{
    if (!(isset($_COOKIE["user"]))) {
        echo "<script>retVal();</script>";
    }
}

user();

$username = $pwd = $fname = $dob = $email = "";
$up_username = $up_pwd = $up_fname = $up_dob = $up_email = "";

$username = $_SESSION['username'];
$pwd = $_SESSION['password'];
$fname = $_SESSION['fname'];
$dob = $_SESSION['dob'];
$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $up_username = $_POST['up_username'];
    $up_fname = $_POST['up_fname'];
    $up_dob = $_POST['up_dob'];
    $up_email = $_POST['up_email'];
    $up_pwd = $_POST['up_pwd'];

    $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);

    function updateProfile($username, $up_username, $up_email)
    {

        global $conn;
        // current username
        global $username, $pwd, $email, $dob, $fname;

        global $hashedPassword;
        //Updated one
        global $up_username, $up_email, $up_fname, $up_dob, $up_pwd;
        // global $up_email;
        // global $up_pwd;
        // global $up_fname;
        // global $up_dob;

        // Check if the new username is already taken
        $checkUsernameQuery = "SELECT * FROM user WHERE username = '$up_username' AND username != '$username'";
        $result = mysqli_query($conn, $checkUsernameQuery);

        if (mysqli_num_rows($result) > 0) {
            die('<script>alert("Username already Exist")</script>');
        }

        // Update the user profile
        $updateProfileQuery = "UPDATE user SET username = '$up_username', password = '$hashedPassword', email = '$up_email', dob = '$up_dob', fname = '$up_fname' WHERE username = '$username'";

        if (mysqli_query($conn, $updateProfileQuery)) {
            $_SESSION['username'] = $up_username;
            setcookie("user", $up_username, time() + (30 * 24 * 3600), "/");
            $_SESSION['email'] = $up_email;
            $_SESSION['password'] = $hashedPassword;
            $_SESSION['dob'] = $up_dob;
            $_SESSION['fname'] = $up_fname;
            echo '<script>alert("Profile updated successfully!")</script>';
            header('Location: Profile.php');
        } else {
            echo "Error updating profile: " . mysqli_error($conn);
        }
    }

    // Example usage
    updateProfile($username, $up_username, $up_email);

    // Close connection
    mysqli_close($conn);

    // // Check for duplicate username or email
    // $dupCheckQuery = "SELECT username,email FROM user WHERE username = '$up_username' OR email = '$up_email'";

    // $dupCheckResult = mysqli_query($conn, $dupCheckQuery);

    // if ($dupCheckResult) {
    //     while ($row = mysqli_fetch_assoc($dupCheckResult)) {
    //         $existingUsername = $row['username'];
    //         $existingEmail = $row['email'];

    //         if ($existingUsername == $up_username) {
    //             echo "<script>alert('Username already taken');</script>";
    //             header("Location: Profile.php");
    //             exit();
    //         }

    //         if ($existingEmail == $up_email) {
    //             echo "<script>alert('Email already in use');</script>";
    //             header("Location: Profile.php");
    //             exit();
    //         }
    //     }
    // }

    // $query = "SELECT * FROM user WHERE username = '$username'";

    // $result = mysqli_query($conn, $query);

    // if ($result) {

    //     // Update user information
    //     $updateQuery = "UPDATE user SET username = '$up_username', fname = '$up_fname', email = '$up_email', password = '$up_pwd', dob = '$up_dob'";

    //     $updateResult = mysqli_query($conn, $updateQuery);

    //     if ($updateResult) {
    //         // Update session variables and redirect
    //         $_SESSION['username'] = $up_username;
    //         setcookie("user", $up_username, time() + (30 * 24 * 3600), "/");
    //         $_SESSION['email'] = $up_email;
    //         $_SESSION['password'] = $up_pwd;
    //         $_SESSION['dob'] = $up_dob;
    //         $_SESSION['fname'] = $up_fname;
    //         header('Location: Profile.php');
    //         exit();
    //     } else {
    //         echo "<script>alert('Update Failed');</script>";
    //         header("Location: Profile.php");
    //         exit();
    //     }
    // }
}
?>