<?php
include "../login/connection.php";
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
    <link rel="stylesheet" href="../navbar/nav.css">
    <title>Contact Details</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Karla:wght@489&family=Libre+Baskerville:wght@700&family=PT+Serif:wght@700&family=Protest+Riot&family=Roboto+Slab:wght@402&display=swap');

        th,
        td {
            padding: 15px;
            text-align: justify;
        }

        th {
            width: 150px;
            font-family: "Libre Baskerville", serif;
            font-weight: 700;
            font-style: normal;
        }

        td {
            font-family: "Karla", sans-serif;
            font-optical-sizing: auto;
            font-weight: 489;
            font-style: normal;
        }

        table {
            margin: 30px;
        }
    </style>
</head>

<body>
    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar/nav.php") ?>
    </div>

    <table border="1">
        <tr>
            <th>Name</th>
            <td>
                <?php echo $name ?>
            </td>
        </tr>
        <tr>
            <th>Email ID</th>
            <td>
                <?php echo $email ?>
            </td>
        </tr>
        <tr>
            <th>Time</th>
            <td>
                <?php echo $time ?>
            </td>
        </tr>
        <tr>
            <th>Message</th>
            <td>
                <?php echo $message ?>
            </td>
        </tr>
    </table>
</body>

</html>