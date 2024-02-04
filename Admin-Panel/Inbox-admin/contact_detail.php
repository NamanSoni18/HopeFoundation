<?php
include "../connection/connection.php";
session_start();

if (!(isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'staff'))) {
    echo '<script>alert("You are not an Admin or staff");';
    echo 'window.location.href = "../../User-Panel/Main/index.php";</script>';
}

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
    <link rel="stylesheet" href="../../navbar-Admin/nav.css">
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../navbar-Admin/nav.css">
</head>

<body>

    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar-Admin/nav.php") ?>
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