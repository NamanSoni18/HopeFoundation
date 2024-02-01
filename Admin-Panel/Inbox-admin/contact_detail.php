<?php
include "../login/connection.php";
session_start();

// Retrieve email from the URL parameter
$message_cookie = $_GET['message'];

$email = $message = "";
$time = "";
$fname = $lname = "";

// Sanitization from SQL injection
$message = mysqli_real_escape_string($conn, $message_cookie);

$query = "SELECT email, message, time, name FROM contact WHERE message = '$message'";

$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_array($result);
    $email = $row["email"];
    $message = $row["message"];
    $time = $row["time"];
    $name = $row["name"];
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
    <link rel="stylesheet" href="../navbar/nav.css">
</head>

<body>

    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar/nav.php") ?>
    </div>
    
    <div>Name:
        <?php echo "$name" ?>
    </div>
    <div>Email ID:
        <?php echo $email ?>
    </div>
    <div>Time:
        <?php echo $time ?>
    </div>
    <div>Message:
        <?php echo $message ?>
    </div>
</body>

</html>