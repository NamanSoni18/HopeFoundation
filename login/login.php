<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <style>
        body {
            background: url("../assests/backgrounds/background7.svg") no-repeat;
            background-size: 1100px;
            background-position: top -80px left 50%;
        }
    </style>
</head>

<body>
    <!-- Nav Bar Load -->
    <div w3-include-html="../navbar/nav.php" style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
    </div>
    <!-- NavBar Scripts -->
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>

    <div class="form-container right-image">
        <p class="title">Login into your Account</p>
        <form class="form" method="post" action="" autocomplete="off">
            <input type="text" name="username" class="input" placeholder="Enter your Username or email ID">
            <input type="password" name="password" class="input" placeholder="Password">
            <div class="remember">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>
            <p class="page-link">
                <a href="../Forgot Password/forgot_password.php"><span class="page-link-label">Forgot
                        Password?</span></a>
            </p>
            <button class="form-btn submit" name="submit" type="submit">Login</button>
        </form>
        <p class="sign-up-label">
            Don't have an account?<a href="signup.php"><span class="sign-up-link">Sign up</span></a>
        </p>
    </div>

</body>

</html>

<?php
include "connection.php";

$username = $pwd = "";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    // Retrieve the hashed password from the database based on the username
    $query = "SELECT * FROM user WHERE username = '$username' OR email = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Check if entered password matches the stored password
        if ($pwd === $row['password']) {
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['user_role'] = $row['role'];

            if (isset($_POST["remember"])) {
                // Set the username in a cookie
                setcookie("user", $row['username'], time() + (30 * 24 * 60 * 60), "/");
                setcookie("role", $row['role'], time() + (30 * 24 * 3600), "/");
            } else {
                // If "Remember Me" is not checked, set the username in the session
                $_SESSION['user'] = $row['username'];
            }
            echo '<script>alert("Logged in Successfully");</script>';
            header("Location: ../Main/index.html");
        } else {
            echo '<script> alert("Login Failed"); </script>';
        }
    } else {
        echo '<script> alert("Login Failed"); </script>';
    }
}
?>