<?php
include "../connection/connection.php";
session_start();

if (!(isset($_SESSION['user_role']) || $_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'staff')) {
    echo '<script>alert("You are not an Admin or staff");';
    echo 'window.location.href = "../../User-Panel/Main/index.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <title>Home</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../navbar-Admin/nav.css">

    <style>
        .welcome-text {
            font-size: 5rem;
            background: linear-gradient(90deg, #f79533 0%, #e88730 50%, #f79533 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }

        .welcome-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
        }
    </style>
</head>

<body>

    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php include_once("../navbar-Admin/nav.php") ?>
    </div>

    <div class="welcome-container">
        <h1 class="welcome-text">Welcome to Admin Page</h1>
    </div>
</body>

</html>