<?php
// define variables and set to empty values
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "Admin1234";
$database = "student";
$port = 3307;
$socket = null;

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database, $port, $socket);

$query = "INSERT INTO STUDENT VALUES(1108, 'Umesh','Gayakwad', 'Raipur')";

mysqli_query($conn, $query);

echo $email;
echo $password;


?>
