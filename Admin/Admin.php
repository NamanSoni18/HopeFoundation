<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    echo '<script>alert("You are not an Admin");';
    echo 'window.location.href = "../Main/index.html";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <!-- Nav Bar Load -->
    <div w3-include-html="../navbar/nav.php" style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
    </div>
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="image">Choose an image:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        <label for="title">Enter title</label>
        <textarea name="title" id="title" cols="30" rows="10" required></textarea>
        <label for="paragraph">Enter paragraph</label>
        <textarea name="paragraph" id="paragraph" cols="30" rows="10" required></textarea>


        <button type="submit" name="submit">Upload</button>
    </form>
</body>

</html>
<?php
include "../login/connection.php";

$sql = "SELECT * FROM news";

$result = mysqli_query($conn, $sql);

if ($result) {

    if (isset($_POST['submit'])) {
        $image = $_FILES['image']['tmp_name'];
        $title = $_POST['title'];
        $paragraph = $_POST['paragraph'];

        $imageData = addslashes(file_get_contents($image));

        $sql = "INSERT INTO news(image, title, paragraph) VALUES('$imageData', '$title', '$paragraph');";

        if (mysqli_query($conn, $sql)) {
            echo "Image uploaded successfully.";
            header("Location: Admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>