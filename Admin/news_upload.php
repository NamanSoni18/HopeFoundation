<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    echo '<script>alert("You are not an Admin");';
    echo 'window.location.href = "../Main/index.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Upload</title>
    <link rel="stylesheet" href="news_upload.css">
    <link rel="stylesheet" href="../login/style.css">
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <script>
        function news_uploaded() {
            alert("News Uploaded");
            window.location.href = "news_upload.php";
        }
    </script>
</head>

<body>
    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar/nav.php") ?>
    </div>

    <div class="news">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="image-news-div news_up">
                <label for="image" class="news-label">Choose an image:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
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
include "../login/connection.php";

$sql = "SELECT * FROM news";

$result = mysqli_query($conn, $sql);

if ($result) {

    if (isset($_POST['submit'])) {
        $image = $_FILES['image']['tmp_name'];
        $title = $_POST['title'];
        $paragraph = $_POST['paragraph'];

        $imageData = addslashes(file_get_contents($image));

        $sql = "INSERT INTO news(image, title, paragraph, created_at) VALUES('$imageData', '$title', '$paragraph', NOW());";

        if (mysqli_query($conn, $sql)) {
            echo "Image uploaded successfully.";
            echo "<script>news_uploaded();</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>