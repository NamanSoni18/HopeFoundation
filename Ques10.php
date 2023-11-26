<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ques10</title>
</head>
<body>
    <form action="" method="post">
        <label for="dep_id">Enter Department ID: </label>
        <input type="number" name="dep_id" id="dep_id">
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dep_id = $_POST["dep_id"];

    $query = "SELECT emp_id, emp_name, dep_id FROM employee WHERE dep_id = $dep_id";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result) ) {
            echo "Employee id: " . $row["emp_id"] .", Employee Name: ". $row["emp_name"] . ", Department id: " . $row["dep_id"] . "<br>";
        }
    } else {
        echo "No Result found for this id";
    }
}
?>