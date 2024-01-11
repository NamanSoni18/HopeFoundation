<?php
include "../login/connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $queryRelated = $_POST["query-related"];
    $message = $_POST["message"];

    // Prepare and execute SQL query to insert data into the 'contact' table
    $sql = "INSERT INTO contact(name, c_no, email, query, message, time) VALUES('$name', '$phone', '$email', '$queryRelated', '$message', NOW())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Query submitted successfully!";
        echo "<script>location.href='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>