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
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../navbar/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        body {
            background: url("../../assests/backgrounds/background6.svg") no-repeat;
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

        .password-toggle {
            position: absolute;
            right: 42px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    <script>
        alert("Save your Profile Image on assests/ProfileImage/");
        
        function exit() {
            var elem = confirm("You're Already Logged in");
            if(elem == true) {
                window.location.href = "../Main/index.php";
            } else {
                window.location.href = "../Main/index.php"
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
            <input type="password" name="password" id="password" class="input" placeholder="Password">
            <i class="password-toggle fas fa-eye-slash" onclick="togglePasswordVisibility('password')"
                style="color: black;"></i>
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
if(isset($_SESSION['username'])) {
    echo "<script>exit();</script>";
}
?>