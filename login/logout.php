<?php

include "connection.php";
session_start();
$_SESSION = array();

session_destroy();

if (isset($_COOKIE["username"])) {
    setcookie("user", "", time() - 3600, "/");
}
setcookie("role", "", time() + (30 * 24 * 3600), "/");

$username = "";
$password = "";
$email = "";
$dob = "";
$fname = "";

header("Location: login.php")
?>