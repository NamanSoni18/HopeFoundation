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
    <link rel="stylesheet" href="../../User-Panel/Profile/profile.css">
    <link rel="stylesheet" href="reports.css">
    <style>
        .submit-button {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>

    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php include_once("../navbar-Admin/nav.php") ?>
    </div>

    <div class="report-container">
        <form action="reports-query.php" method="POST">
            <div class="from date">
                <h2>From:</h2>
                <input type="date" name="from" id="from" required>
            </div>
            <div class="to date">
                <h2>To:</h2>
                <input type="date" name="to" id="to" required>
            </div>
            <div class="submit-button">
                <button type="submit" class="submit-button-profile" name="submit">Print</button>
            </div>
        </form>
    </div>
</body>

</html>