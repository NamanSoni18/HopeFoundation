<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link rel="stylesheet" href="Donate.css">
    <link rel="stylesheet" href="../login/style.css">
    <script>
        function retVal() {
            var retVal = confirm("You Have not logged in. Want to Login?");
            if (retVal == true) {
                location.replace("../login/login.php");
            }
            else {
                return false;
            }
        }
    </script>
</head>


<body>
    <!-- Nav Bar Load -->
    <div w3-include-html="../navbar/nav.php" style="position: sticky; top: 0; background-color: #F2994A; z-index: 1000">
    </div>
    <!-- NavBar Scripts -->
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>


    <div class="form-container">
        <p class="title">Donate</p>
        <form class="form" method="post" action="" autocomplete="off">
            <input type="text" name="username" class="input" placeholder="Username">
            <input type="password" name="password" class="input" placeholder="Password">
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
include "../login/connection.php";
session_start();

$userprofile = "";

function user()
{
    if (!$_SESSION['username']) {
        echo "hehe";
        echo "<script>retVal()</script>";
    }
}

user();
?>