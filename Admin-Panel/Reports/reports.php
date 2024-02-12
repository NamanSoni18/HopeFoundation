<?php
include "../connection/connection.php";
session_start();

if (!(isset($_SESSION['user_role']) || $_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'staff')) {
    echo '<script>alert("You are not an Admin or staff");';
    echo 'window.location.href = "../../User-Panel/Main/index.php";</script>';
}

$report_html = ''; // Initialize an empty string to store the report HTML

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        }
        $from = $_POST['from'];
        $to = $_POST['to'];

        $from = date("Y-m-d", strtotime($from));
        $to = date("Y-m-d", strtotime($to));

        $query = "SELECT * FROM donation WHERE donate_date BETWEEN '$from' AND '$to'";

        if (!empty($name)) {
            // If a name is provided, add it to the WHERE clause
            $query .= " AND name LIKE '%$name%'";
        }

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            $report_html .= '<table border="1">';
            $report_html .= '<tr>
                                <th>Invoice Number</th>
                                <th>Donor Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Donation Date</th>
                                <th>Donation Time</th>
                                <th>Address</th>
                                <th>PAN</th>
                                <th>Aadhaar</th>
                                <th>Postal Code</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Nationality</th>
                                <th>Focus</th>
                                <th>Payment Method</th>
                                <th>Amount</th>
                            </tr>';

            // Loop through the results and append rows to the report HTML
            while ($row = mysqli_fetch_assoc($result)) {
                $report_html .= '<tr>';
                $report_html .= '<td>' . $row['invoice_num'] . '</td>';
                $report_html .= '<td>' . $row['name'] . '</td>';
                $report_html .= '<td>' . $row['username'] . '</td>';
                $report_html .= '<td>' . $row['email'] . '</td>';
                $report_html .= '<td>' . $row['phone_no'] . '</td>';
                $report_html .= '<td>' . $row['donate_date'] . '</td>';
                $report_html .= '<td>' . $row['time'] . '</td>';
                $report_html .= '<td>' . $row['address'] . '</td>';
                $report_html .= '<td>' . $row['pan'] . '</td>';
                $report_html .= '<td>' . $row['aadhaar'] . '</td>';
                $report_html .= '<td>' . $row['postalcode'] . '</td>';
                $report_html .= '<td>' . $row['city'] . '</td>';
                $report_html .= '<td>' . $row['state'] . '</td>';
                $report_html .= '<td>' . $row['country'] . '</td>';
                $report_html .= '<td>' . $row['nationality'] . '</td>';
                $report_html .= '<td>' . $row['focus'] . '</td>';
                $report_html .= '<td>' . $row['payment'] . '</td>';
                $report_html .= '<td>' . $row['amount'] . '</td>';
                $report_html .= '</tr>';
            }

            $report_html .= '</table>';
        } else {
            $report_html = '<p>No data found for the selected date range.</p>';
        }
    }

    if (isset($_POST['download'])) {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        }
        $from = $_POST['from'];
        $to = $_POST['to'];

        $from = date("Y-m-d", strtotime($from));
        $to = date("Y-m-d", strtotime($to));

        $query = "SELECT * FROM donation WHERE donate_date BETWEEN '$from' AND '$to'";

        if (!empty($name)) {
            // If a name is provided, add it to the WHERE clause
            $query .= " AND name LIKE '%$name%'";
        }
        
        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            header("Content-Type: text/csv");
            header("Content-Disposition: attachment; filename=donations_report.csv");
            header("Pragma: no-cache");
            header("Expires: 0");

            // Open the output stream
            $output = fopen("php://output", "w");

            // Write the CSV headers
            fputcsv(
                $output,
                array(
                    'Invoice Number',
                    'Donor Name',
                    'Username',
                    'Email',
                    'Phone Number',
                    'Donation Date',
                    'Donation Time',
                    'Address',
                    'PAN',
                    'Aadhaar',
                    'Postal Code',
                    'City',
                    'State',
                    'Country',
                    'Nationality',
                    'Focus',
                    'Payment_Method',
                    'Amount'
                )
            );

            // Loop through the results and output data
            while ($row = mysqli_fetch_assoc($result)) {
                // Create an array with the data in the desired order
                $csvData = array(
                    $row['invoice_num'],
                    $row['name'],
                    $row['username'],
                    $row['email'],
                    $row['phone_no'],
                    $row['donate_date'],
                    $row['time'],
                    $row['address'],
                    $row['pan'],
                    $row['aadhaar'],
                    $row['postalcode'],
                    $row['city'],
                    $row['state'],
                    $row['country'],
                    $row['nationality'],
                    $row['focus'],
                    $row['payment'],
                    $row['amount']
                );

                // Write the CSV row
                fputcsv($output, $csvData);
            }

            // Close the output stream
            fclose($output);
            exit();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <title>Home</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../navbar-Admin/nav.css">
    <link rel="stylesheet" href="../../User-Panel/Profile/profile.css">
    <link rel="stylesheet" href="reports.css">
    <style>
        .submit-button,
        .download-button {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>

    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php include_once("../navbar-Admin/nav.php") ?>
    </div>

    <div class="report-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="name date">
                <h2>Name:</h2>
                <input type="text" name="name" id="name"
                    value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
            </div>
            <div class="from date">
                <h2>From:</h2>
                <input type="date" name="from" id="from"
                    value="<?php echo isset($_POST['from']) ? htmlspecialchars($_POST['from']) : ''; ?>" required>
            </div>
            <div class="to date">
                <h2>To:</h2>
                <input type="date" name="to" id="to"
                    value="<?php echo isset($_POST['to']) ? htmlspecialchars($_POST['to']) : ''; ?>" required>
            </div>
            <div class="submit-button">
                <button type="submit" class="submit-button-profile" name="submit">Show Report</button>
            </div>
            <div class="download-button">
                <button type="submit" class="submit-button-profile" name="download">Download</button>
            </div>
        </form>

        <?php echo $report_html; ?>


    </div>

    <!-- Display the report -->
</body>

</html>