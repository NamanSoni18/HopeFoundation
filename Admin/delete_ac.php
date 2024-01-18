<?php
include "../login/connection.php";
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
        deleteAccount($username);
    }
}

function deleteAccount($username)
{
    global $conn;

    // Delete user data from the database
    $deleteUserQuery = "DELETE FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $deleteUserQuery);

    if ($result) {
        // Account deleted successfully
        header("Location: ../login/logout.php"); // Redirect to logout for a clean logout experience
        exit();
    } else {
        echo "Error deleting account. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="../navbar/nav.css">
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h2 {
            color: #e74c3c;
        }

        .delete-user {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .delete-user:hover {
            background-color: #c0392b;
        }
    </style>
    <script>
        function confirmDelete() {
            var result = confirm("Are you sure you want to delete your account?");
            if (result) {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>
</head>

<body>
    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar/nav.php") ?>
    </div>

    <h2>Delete Your Account</h2>
    <p>This action is irreversible. Deleting your account will permanently remove all your data.</p>
    <button class="delete-user" onclick="confirmDelete()">Delete My Account</button>

    <!-- Hidden form to submit the deletion after confirmation -->
    <form id="deleteForm" method="post">
        <input type="hidden" name="confirm_delete" value="1">
    </form>
</body>

</html>