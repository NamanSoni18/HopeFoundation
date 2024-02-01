<?php
include "connection.php";
echo "Hello";

$email = $pwd = "";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $query = "SELECT * FROM user WHERE email = '$email' && password = '$pwd'";

    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);

    echo $total;
}