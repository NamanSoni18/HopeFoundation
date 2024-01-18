<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../login/style.css">
    <link rel="stylesheet" href="../navbar/nav.css">
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

    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar/nav.php") ?>
    </div>

    <div class="form-container right-image">
        <h2 class="title">Forgot Password</h2>
        <form class="form" method="post" action="send_otp.php" autocomplete="off">
            <input type="email" name="email" class="input flex" placeholder="Enter Email ID or Username" required>
            <button type="submit" class="form-btn submit" name="submit">Send OTP</button>
        </form>
        <p class="sign-up-label">
            Don't have an account?<a href="../login/signup.php"><span class="sign-up-link">Sign up</span></a>
        </p>
    </div>
</body>

</html>