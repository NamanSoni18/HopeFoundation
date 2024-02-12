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
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../navbar/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        body {
            background: url("../../assests/backgrounds/background7.svg") no-repeat;
            background-size: 1100px;
            background-position: top -80px left 50%;
        }

        .password-toggle {
            position: absolute;
            right: 32px;
            top: 44%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    <script>
        function exit() {
            var elem = confirm("You're Already Logged in");
            if (elem == true) {
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
    <!-- NavBar Reload -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar/nav.php") ?>
    </div>

    <div class="form-container right-image">
        <p class="title">Login into your Account</p>
        <form class="form" method="post" action="login_s.php" autocomplete="off">
            <input type="text" name="username" class="input" placeholder="Enter your Username or email ID">
            <input type="password" name="password" id="password" class="input" placeholder="Password">
            <i class="password-toggle fas fa-eye-slash" onclick="togglePasswordVisibility('password')"
                style="color: black;"></i>
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
if (isset($_SESSION['username'])) {
    echo "<script>exit();</script>";
}
?>