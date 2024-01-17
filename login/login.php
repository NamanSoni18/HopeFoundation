<?php 
session_start();
?>
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
    <!-- NavBar Reload -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar/nav.php") ?>
    </div>

    <div class="form-container right-image">
        <p class="title">Login into your Account</p>
        <form class="form" method="post" action="login_s.php" autocomplete="off">
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