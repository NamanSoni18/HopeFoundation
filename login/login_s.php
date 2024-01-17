<?php
include "connection.php";

$username = $pwd = "";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    // Retrieve the hashed password from the database based on the username
    $query = "SELECT * FROM user WHERE username = '$username' OR email = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Check if entered password matches the stored password
        if ($pwd === $row['password']) {
            // session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['user_role'] = $row['role'];

            if (isset($_POST["remember"])) {
                // Set the username in a cookie
                setcookie("username", $row['username'], time() + (30 * 24 * 60 * 60), "/");
                setcookie("role", $row['role'], time() + (30 * 24 * 60 * 60), "/");
            } else {
                // If "Remember Me" is not checked, set the username in the session
                $_SESSION['user'] = $row['username'];
            }
            echo '<script>location.href="../Main/index.php"</script>';
            exit();
        } else {
            echo '<script> alert("Login Failed"); </script>';
        }
    } else {
        echo '<script> alert("Login Failed"); </script>';
    }
}
?>