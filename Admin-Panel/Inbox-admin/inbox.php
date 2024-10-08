<?php

session_start();

// Check if admin is logged in
if (!(isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'staff'))) {
    echo '<script>alert("You are not an Admin or staff");';
    echo 'window.location.href = "../../User-Panel/Main/index.php";</script>';
}

include "../connection/connection.php";
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <link rel="stylesheet" href="inbox.css">
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../navbar-Admin/nav.css">
</head>

<body>
    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar-Admin/nav.php") ?>
    </div>

    <div>
        <h1 class="inbox-head" style="text-align: center; font-size: 50px">Inbox</h1>
    </div>

    <?php
    if (empty($posts)) {
        echo "<p style='text-align: center; font-size: 20px;'>No inbox messages available.</p>";
    } else {
        foreach ($posts as $post):
            ?>
            <section class="inbox-layout">
                <div class="grow2 item email item1">
                    <?php
                    echo $post['email'];
                    ?>
                </div>
                <div class="grow2 item item1 time">
                    <?php echo $post['time']; ?>
                </div>
                <div class="grow2 item message item1">
                    <?php echo $post['message']; ?>
                </div>
                <div class="grow1 item2">
                    <button class="delete detail button-inbox">
                        <a href="contact_detail.php?message=<?php echo $post['message']; ?>">
                            <span>Get Detail</span>
                        </a>
                    </button>
                </div>
                <div class="grow1 item2">
                    <form method="post" action="" onsubmit="return confirmDelete()">
                        <input type="hidden" name="message_del" value="<?php echo $post['message']; ?>">
                        <button type="submit" class="delete detail button-inbox" name="delete_message">
                            <span>Delete</span>
                        </button>
                    </form>
                </div>
            </section>
        <?php
        endforeach;
    }
    ?>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this message?");
        }
    </script>
</body>

</html>

<?php

if (isset($_POST['delete_message'])) {
    $inboxToDelete = $_POST['message_del'];

    // Perform the deletion query
    $deleteQuery = "DELETE FROM contact WHERE message = '$inboxToDelete'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo '<script>';
        echo 'alert("Inbox deleted successfully.");';
        echo 'window.location.href = "inbox.php";';
        echo '</script>';
    } else {
        echo "Error deleting message: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>