<?php
include "../login/connection.php";

// Retrieve email from the URL parameter
$message_cookie = $_GET['message'];

$email = $message = "";
$time = "";
$fname = $lname = "";

// Sanitization from SQL injection
$message = mysqli_real_escape_string($conn, $message_cookie);

$query = "SELECT email, message, time, fname, lname FROM contact WHERE message = '$message'";

$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_array($result);
    $email = $row["email"];
    $message = $row["message"];
    $time = $row["time"];
    $fname = $row["fname"];
    $lname = $row["lname"];
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
</head>

<body>
    <div>Name:
        <?php echo "$fname $lname" ?>
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