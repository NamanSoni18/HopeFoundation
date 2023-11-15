<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// Display the secure content
header("Location: ../Main/index.html");

?>
