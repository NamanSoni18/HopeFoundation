<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ques11</title>
</head>

<body>
    <form action="" name="regform" method="post">
        <labe~l for="name">Enter Name: </label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Enter Email ID: </label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="address">Enter Address</label>
        <textarea name="address" id="address" cols="30" rows="10" required></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
<?php

// Connection Establishment
$servername = "localhost";
$username = "root";
$pwd = "";
$db = "general";
$conn = mysqli_connect($servername, $username, $pwd, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $email = $address = "";

// Passing to server
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $address = $_POST["address"];

    // Checking username is already taken or not
    $query = "SELECT * FROM login WHERE email = '$email'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {

        if (!$email == "") {
            // Inserting into table
            $query = "INSERT INTO login(email, name, address) VALUES('$email', '$name', '$address')";

            $result = mysqli_query($conn, $query);

            echo "Inserted successfully";
        }
    } else {
        echo "email is already taken";
    }
}
?>