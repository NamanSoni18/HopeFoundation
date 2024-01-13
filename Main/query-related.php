<?php
include "../login/connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $queryRelated = $_POST["query-related"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contact(name, c_no, email, query, message, time) VALUES('$name', '$phone', '$email', '$queryRelated', '$message', NOW())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Query Sent');</script>";
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>