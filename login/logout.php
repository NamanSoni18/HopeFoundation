<?php

include "connection.php";
session_start();
session_unset();
$_SESSION['username'] = "";
$username = "";
$password = "";
$email = "";
$dob = "";
$fname = "";

header("Location: ../Main/index.html")
?>