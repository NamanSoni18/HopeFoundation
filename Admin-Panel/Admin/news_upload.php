<?php
session_start();

// Check if admin is logged in
if (!(isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'staff'))) {
    echo '<script>alert("You are not an Admin or staff");';
    echo 'window.location.href = "../../User-Panel/Main/index.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Upload</title>
    <link rel="stylesheet" href="news_upload.css">
    <link rel="stylesheet" href="../../User-Panel/login/style.css">
    <link rel="stylesheet" href="../navbar-Admin/nav.css">
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <script>
        alert("Save your Profile Image on C:/xampp/htdocs/HopeFoundation/assests/News_Image");
    </script>
</head>

<body>
    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar-Admin/nav.php") ?>
    </div>

    <div class="news">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="image-news-div news_up">
                <label for="up_image" class="label">Select Photo</label>
                <input type="file" id="up_image" accept="image/*" name="up_image" class="input profile-photo" required>

            </div>

            <div class="title-news-div news_up">
                <label for="title" class="news-label">Enter title</label>
                <textarea name="title" id="title" cols="30" rows="10" required></textarea>
            </div>

            <div class="paragraph-news-div news_up">
                <label for="paragraph" class="news-label">Enter paragraph</label>
                <textarea name="paragraph" id="paragraph" cols="30" rows="10" required></textarea>
            </div>

            <button type="submit" class="form-btn submit" name="submit">Upload</button>
        </form>
    </div>

</body>

</html>
<?php
include "../connection/connection.php";

$sql = "SELECT * FROM news";

$result = mysqli_query($conn, $sql);

if ($result) {

    if (isset($_POST['submit'])) {
        $image = $_POST['image'];
        $title = $_POST['title'];
        $paragraph = $_POST['paragraph'];
        $uploadedFile = $_FILES["up_image"];
        $imageName = $uploadedFile["name"];

        $sql = "INSERT INTO news(image, title, paragraph, created_at) VALUES('$imageName', '$title', '$paragraph', NOW());";

        if (mysqli_query($conn, $sql)) {
            echo "Image uploaded successfully.";
            echo "<script>alert('News Uploaded');</>";
            echo "<script>window.location.href = 'news_upload.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>