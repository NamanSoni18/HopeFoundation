<?php

$servername = "localhost";
$username = "root";
$pwd = "";
$db = "HOPEFOUNDATION";
$conn = mysqli_connect($servername, $username, $pwd, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>