<?php
include "../login/connection.php";
$email = $message = "";
$time;
$query = "SELECT email, message, time FROM contact";

$result = mysqli_query($conn, $query);

$posts = array();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <link rel="stylesheet" href="inbox.css">
</head>

<body>
    <!-- Nav Bar Load -->
    <div w3-include-html="../navbar/nav.php" style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
    </div>
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>

    <div>
        <h1 style="text-align: center; font-size: 50px">Inbox</h1>
    </div>

    <?php foreach ($posts as $post): ?>
        <section class="inbox-layout">
            <div class="grow1 item item1">
                <?php
                echo $post['email'];
                ?>
            </div>
            <div class="grow1 item item1">
                <?php echo $post['time']; ?>
            </div>
            <div class="grow2 item message">
                <?php echo $post['message']; ?>
            </div>
            <div class="grow1 item">
                <button class="delete detail button-inbox">
                    <a href="contact_detail.php?email=<?php echo $post['email'];?>">
                        <span>Get Detail</span>
                    </a>
                </button>
            </div>
            <div class="grow1 item">
                <button class="delete detail button-inbox">
                    <span>Delete</span>
                </button>
            </div>
        </section>
    <?php endforeach; ?>
</body>

</html>