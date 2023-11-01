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


echo "Session Logged Out";
?>