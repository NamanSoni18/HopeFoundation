<?php
session_start();
include "../login/connection.php";

$username = mysqli_real_escape_string($conn, $_COOKIE["username"]);

$query = "SELECT * FROM donation WHERE username = '$username'";
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Fetch the data from the result set
        $donations = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // No records found
        echo "<script>alert('No record found');</script>";
        echo "<script>window.location.href = '../Main/index.php'</script>";
        exit(); // Terminate script execution
    }
} else {
    // Query execution failed
    echo "Error: " . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <title>Report | User</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../navbar/nav.css">
    <link rel="stylesheet" href="../Profile/profile.css">
    <link rel="stylesheet" href="../../Admin-Panel/Admin/user_mgmt.css">
    <link rel="stylesheet" href="../../Admin-Panel/Inbox-Admin/inbox.css">
    <script>
        function redirectToInvoice(invoiceNum) {
            window.location.href = 'invoice-donate.php?invoice_number=' + invoiceNum;
        }

    </script>
</head>

<body>

    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php include_once("../navbar/nav.php") ?>
    </div>

    <div class="report-container">
        <table>
            <tr>
                <th>Invoice Number</th>
                <th>Name</th>
                <th>Username</th>
                <th>Focus</th>
                <th>Payment</th>
                <th>Amount</th>
                <th>Print</th>
            </tr>
            <?php foreach ($donations as $donation): ?>
                <tr>
                    <td>
                        <?php echo $donation['invoice_num']; ?>
                    </td>
                    <td>
                        <?php echo $donation['name']; ?>
                    </td>
                    <td>
                        <?php echo $donation['username']; ?>
                    </td>
                    <td>
                        <?php echo $donation['focus']; ?>
                    </td>
                    <td>
                        <?php echo $donation['payment']; ?>
                    </td>
                    <td>
                        <?php echo $donation['amount']; ?>
                    </td>
                    <td>
                        <button type="button" onclick="redirectToInvoice('<?php echo $donation['invoice_num']; ?>')"
                            class="user-info Delete button-inbox">Print</button>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>