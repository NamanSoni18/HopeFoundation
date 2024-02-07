<?php
include "connection.php";

$username = $pwd = $fname = $dob = $email = "";

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username or email already exists
        echo "<script>alert('Username or email already exists. Please choose a different one.');</script>";
    } else {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $uploadedFile = $_FILES["image"];
            $imageName = $uploadedFile["name"];

            $query = "INSERT INTO user(username, password, fname, email, dob, image, role) VALUES('$username', '$pwd', '$fname', '$email', '$dob', '$imageName', 'user')";
        } else {
            $query = "INSERT INTO user(username, password, fname, email, dob, role) VALUES('$username', '$pwd', '$fname', '$email', '$dob', 'user')";
        }

        $result = mysqli_query($conn, $query);

        if ($result) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['fname'] = $fname;
            $_SESSION['dob'] = $dob;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $pwd;
            $_SESSION['user_role'] = 'user';

            if (isset($_POST["remember"])) {
                setcookie("username", $_SESSION['username'], time() + (30 * 24 * 3600), "/");
                setcookie("role", 'user', time() + (30 * 24 * 3600), "/");
            }

            echo '<script>location.href="../Main/index.php"</script>';
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            echo "<script>window.location.href = 'signup.php';</script>";
        }
    }
}
?>