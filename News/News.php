<?php
include("../login/connection.php");

$sql = "SELECT * FROM news ORDER BY created_at DESC"; // Fetch all rows from the 'news' table
$result = mysqli_query($conn, $sql);

$posts = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" type="image/png">
    <link rel="stylesheet" href="News.css">
    <link rel="stylesheet" href="../backtotop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        function msgDelete() {
            alert("Message Deleted Successfull");
            window.location.href = 'News.php';
        }
    </script>
</head>

<body>

    <section id="backtotop"></section>

    <div w3-include-html="../navbar/nav.php" style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
    </div>
    <!-- NavBar Scripts -->
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>

    <section class="back-section-div">
        <a href="#backtotop">
            <div id="backtotop-div">
                <div>Back to Top</div>
                <!-- <img src="../assests/icons/system-regular-11-arrow-up.svg" alt="" width="50px" height="50px"> -->
                <i class="fa-solid fa-arrow-up"></i>
            </div>
        </a>
    </section>

    <!-- News Container -->
    <?php foreach ($posts as $post): ?>
        <div class="news-card">
            <div class="news-card-container">
                <div class="header">
                    <img src="data:image/*;base64,<?php echo base64_encode($post['image']); ?>" alt="News Image">
                </div>
                <div class="news-info">
                    <h1 class="title">
                        <?php echo $post['title'] ?>
                    </h1>
                    <p class="Content">
                        <?php echo $post['paragraph'] ?>
                    </p>
                </div>
            </div>
            <div class="footer">
                <form method="post" action="">
                    <button type="button" class="news-more-info">More Info</button>
                </form>

                <form method="post" action="">
                    <input type="hidden" name="title" value="<?php echo $post['title']; ?>">
                    <button type="submit" name="delete_message" class="news-more-info Delete">Delete</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>

<?php

if (isset($_POST['delete_message'])) {
    $newsToDelete = $_POST['title'];

    // Perform the deletion query
    $deleteQuery = "DELETE FROM news WHERE title = '$newsToDelete'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo '<script>msgDelete()</script>';
    } else {
        echo "Error deleting message: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>