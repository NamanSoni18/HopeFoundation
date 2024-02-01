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
    <link rel="stylesheet" href="../navbar/nav.css">
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
        <form class="form" method="POST" action="signup_s.php" enctype="multipart/form-data">
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