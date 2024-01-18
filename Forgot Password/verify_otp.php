<?php
session_start();

$email = $_SESSION['email_forgot'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../navbar/nav.css">
    <link rel="stylesheet" href="verify_otp.css">
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

    <form class="form" action="send_password.php" method="post">
        <div class="title">OTP</div>
        <div class="title">Verification Code</div>
        <p class="message">We have sent a verification code to your Email ID</p>
        <div class="form-card-input-wrapper">
            <input class="form-card-input" id="input1" name="input1" placeholder="______" maxlength="6" type="text">
            <div class="form-card-input-bg"></div>
        </div>
        <button class="action" type="submit">Verify Me</button>
    </form>
</body>

</html>