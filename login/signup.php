<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <style>
        body {
            background: url("../assests/backgrounds/background6.svg") no-repeat;
            background-size: 100%;
            object-fit: cover;
            background-position: top -80px left 50%;
        }

        .form-container {
            width: 500px;
            height: max-content;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            box-sizing: border-box;
            padding: 20px 30px;
            margin: auto;

            /* Center a div */
            position: absolute;
            top: 20%;
        }
    </style>
    <script>
        alert("Save your Profile Image on assests/ProfileImage/");
    </script>

</head>

<body>

    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar/nav.php") ?>
    </div>

    <div class="form-container">
        <p class="title">Create account</p>
        <form class="form" method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="image" class="input" accept="image/*">
            <input type="text" name="username" class="input" placeholder="Username">
            <input type="text" name="fname" class="input" placeholder="Full Name">
            <input type="date" name="dob" class="input" placeholder="Date of Birth">
            <input type="email" name="email" class="input" placeholder="Email">
            <input type="password" name="password" class="input" placeholder="Password">
            <div class="remember">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>
            <button class="form-btn submit" type="submit" name="submit">Create Account</button>
        </form>
        <p class="sign-up-label">
            Already have an account?<span class="sign-up-link"><a href="login.php">Log in</a></span>
        </p>


    </div>
</body>

</html>

<?php
include "connection.php";

$username = $pwd = $fname = $dob = $email = "";

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username or email already exists
        echo "<script>alert('Username or email already exists. Please choose a different one.');</script>";
    } else {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $uploadedFile = $_FILES["image"];
            $imageName = $uploadedFile["name"];

            $query = "INSERT INTO user(username, password, fname, email, dob, image, role) VALUES('$username', '$pwd', '$fname', '$email', '$dob', '$imageName', 'user')";
        } else {
            $query = "INSERT INTO user(username, password, fname, email, dob, role) VALUES('$username', '$pwd', '$fname', '$email', '$dob', 'user')";
        }

        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['username'] = $username;
            $_SESSION['fname'] = $fname;
            $_SESSION['dob'] = $dob;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $pwd;
            $_SESSION['user_role'] = 'user';

            if (isset($_POST["remember"])) {
                setcookie("user", $_SESSION['username'], time() + (30 * 24 * 3600), "/");
                setcookie("role", 'user', time() + (30 * 24 * 3600), "/");
            }

            echo '<script>location.href="../Main/index.php"</script>';
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>