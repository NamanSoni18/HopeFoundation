<?php

include "connection.php";
session_start();
session_unset();
$_SESSION['username'] = "";
$_SESSION['fname'] = "";
$_SESSION["password"] = "";
$_SESSION["email"] = "";
$_SESSION["dob"] = "";
$username = "";
$password = "";
$email = "";
$dob = "";
$fname = "";

header("Location: ../Main/index.html")
?>