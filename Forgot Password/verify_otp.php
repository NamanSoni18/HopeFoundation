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
    <!-- Nav Bar Load -->
    <div w3-include-html="../navbar/nav.php" style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
    </div>
    <!-- NavBar Scripts -->
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>

    <form class="form" action="send_password.php" method="post">
        <div class="title">OTP</div>
        <div class="title">Verification Code</div>
        <p class="message">We have sent a verification code to your mobile number</p>
        <div class="inputs">
            <input id="input1" name="input1" type="text" maxlength="1" required>
            <input id="input2" name="input2" type="text" maxlength="1" required>
            <input id="input3" name="input3" type="text" maxlength="1" required>
            <input id="input4" name="input4" type="text" maxlength="1" required>
            <input id="input5" name="input5" type="text" maxlength="1" required>
            <input id="input6" name="input6" type="text" maxlength="1" required>
        </div>
        <button class="action" type="submit">Verify Me</button>
    </form>
</body>

</html>