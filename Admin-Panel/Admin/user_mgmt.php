<?php
include "../connection/connection.php";
session_start();

if (!(isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'staff'))) {
    echo '<script>alert("You are not an Admin or staff");';
    echo 'window.location.href = "../../User-Panel/Main/index.php";</script>';
}

if ($_SESSION['user_role'] == 'staff') {
    $query = "Select username, fname, dob, role from user where role = 'user'";
} else {
    $query = "Select username, fname, dob, role from user where role = 'user' or role = 'staff'";
}

$result = mysqli_query($conn, $query);

$posts = array();

if (isset($result)) {
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
    <title>User Management</title>
    <link rel="stylesheet" href="user_mgmt.css">
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../Inbox-admin/inbox.css">
    <link rel="stylesheet" href="../navbar-Admin/nav.css">
    <style>
        .button-inbox {
            width: auto;
        }
    </style>
    <script>
        function confirmAction(action, username) {
            var confirmation = confirm("Are you sure you want to " + action + " this user?");
            if (confirmation) {
                window.location.href = 'user_mgmt.php?action=' + action + '&username=' + username;
            }
        }

        function msgDelete() {
            alert("User Deleted Successfull");
            window.location.href = 'user_mgmt.php';
        }

        function rollbackUser() {
            alert("Staff role to user Successfull");
            window.location.href = 'user_mgmt.php';
        }

        function promoteUser() {
            alert("User promoted to Staff Successfull");
            window.location.href = 'user_mgmt.php';
        }
    </script>
</head>

<body>
    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar-Admin/nav.php") ?>
    </div>

    <table style="width: 80%">
        <tr class="row">
            <th class="table-title">Username</th>
            <th class="table-title">Full Name</th>
            <th class="table-title">Date of Birth</th>
            <th class="table-title">Role</th>
            <th class="table-title">Rollback to User</th>
            <th class="table-title">Promote to Admin</th>
            <th class="table-title">Delete User</th>
        </tr>
        <?php foreach ($posts as $post): ?>
            <tr class="row">
                <td>
                    <?php echo $post['username'] ?>
                </td>
                <td>
                    <?php echo $post['fname'] ?>
                </td>
                <td>
                    <?php echo $post['dob'] ?>
                </td>
                <td>
                    <?php echo $post['role'] ?>
                </td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="role" value="<?php echo $post['role']; ?>">
                        <input type="hidden" name="username" value="<?php echo $post['username']; ?>">
                        <button type="button" onclick="confirmAction('rollback', '<?php echo $post['username']; ?>')"
                            class="user-info promote button-inbox">Rollback to User</button>
                    </form>
                </td>

                <td>
                    <form method="post" action="">
                        <input type="hidden" name="role" value="<?php echo $post['role']; ?>">
                        <input type="hidden" name="username" value="<?php echo $post['username']; ?>">
                        <button type="button" onclick="confirmAction('promote', '<?php echo $post['username']; ?>')"
                            class="user-info promote button-inbox">Promote to Staff</button>
                    </form>
                </td>

                <td>
                    <form method="post" action="">
                        <input type="hidden" name="username" value="<?php echo $post['username']; ?>">
                        <button type="button" onclick="confirmAction('delete', '<?php echo $post['username']; ?>')"
                            class="user-info Delete button-inbox">Delete User</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <?php
    if (isset($_GET['action']) && isset($_GET['username'])) {
        $action = $_GET['action'];
        $username = $_GET['username'];

        switch ($action) {
            case 'rollback':
                // Perform the rollback query
                $rollbackQuery = "UPDATE user SET role = 'user' WHERE username = '$username'";
                $rollbackResult = mysqli_query($conn, $rollbackQuery);

                if ($rollbackResult) {
                    echo '<script>rollbackUser()</script>';
                } else {
                    echo "Error rolling back user: " . mysqli_error($conn);
                }
                break;

            case 'promote':
                // Perform the promotion query
                $promoteQuery = "UPDATE user SET role = 'staff' WHERE username = '$username'";
                $promoteResult = mysqli_query($conn, $promoteQuery);

                if ($promoteResult) {
                    setcookie("role", 'staff', time() + (30 * 24 * 3600), "/");
                    echo '<script>promoteUser()</script>';
                } else {
                    echo "Error promoting user: " . mysqli_error($conn);
                }
                break;

            case 'delete':
                // Perform the deletion query
                $deleteQuery = "DELETE FROM user WHERE username = '$username'";
                $deleteResult = mysqli_query($conn, $deleteQuery);

                if ($deleteResult) {
                    echo '<script>msgDelete()</script>';
                } else {
                    echo "Error deleting user: " . mysqli_error($conn);
                }
                break;

            default:
                // Invalid action
                break;
        }
    }
    ?>
</body>

</html>
<?php
mysqli_close($conn);
?>