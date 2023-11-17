<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../navbar/nav2.css">
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <!-- <script>
        function loggedin() {
            alert("Login Successfull");
        }
    </script> -->
</head>

<body>
    <!-- Nav Bar Load -->
    <div w3-include-html="../navbar/nav.php"
        style="position: sticky; top: 0; background-color: #F2994A; z-index: 1000;">
    </div>
    <!-- NavBar Scripts -->
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>



    <!--Navigation bar-->
    <!-- <div id="nav-placeholder">

    </div>

    <script>
        $(function () {
            $("#nav-placeholder").load("/nav.html");
        });
    </script> -->
    <!--end of Navigation bar-->

    <div class="form-container">
        <p class="title">Login into your Account</p>
        <form class="form" method="post" action="" autocomplete="off">
            <input type="text" name="username" class="input flex" placeholder="Enter your Username or email ID">
            <input type="password" name="password" class="input flex" placeholder="Password">
            <div class="remember">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>
            <p class="page-link">
                <span class="page-link-label">Forgot Password?</span>
            </p>
            <button class="form-btn"><input type="submit" name="submit" value="Log in" class="submit">
            </button>
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
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    // Retrieve the hashed password from the database based on the username
    $query = "SELECT * FROM user WHERE username = '$username' OR email = '$username'";

    $result = mysqli_query($conn, $query);


    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $hashedPassword;
            $_SESSION['email'] = $row['email'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['dob'] = $row['dob'];
        }
        if (isset($_POST["remember"])) {
            // Set a cookie with a long expiration time
            setcookie("user", $row['username'], time() + (30 * 24 * 3600), "/");
        }
        
        header("Location: ../Main/index.html");
    } else {
        echo '<script> alert("Login Failed"); </script>';
    }
}
?>