<?php
include "../connection/connection.php";

if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];

    $from = date("Y-m-d", strtotime($from));
    $to = date("Y-m-d", strtotime($to));

    $query = "SELECT * FROM donation WHERE donate_date BETWEEN '$from' AND '$to'";

    // Execute the query
    // Assuming you have some database connection object, e.g., $conn
    $result = mysqli_query($conn, $query);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Output CSV headers
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=donations_report.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        // Open the output stream
        $output = fopen("php://output", "w");

        // Write the CSV headers
        fputcsv($output, array(
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
        ));

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
    } else {
        echo "No donations found within the specified date range.";
    }
}
?>