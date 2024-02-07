<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="../navbar/nav.css">
    <link rel="stylesheet" href="../Profile/profile.css">
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <style>
        @media print {
            .invoice-header h1 {
                -webkit-print-color-adjust: exact; /* For WebKit-based browsers like Chrome and Safari */
                print-color-adjust: exact; /* For Firefox */
            }
            .nav, .print {
                display: none;
            }
        }
        .main-content {
            border: 0;
            box-sizing: content-box;
            color: inherit;
            font-family: inherit;
            font-size: inherit;
            font-style: inherit;
            font-weight: inherit;
            line-height: inherit;
            list-style: none;
            margin: 0;
            padding: 0;
            text-decoration: none;
            vertical-align: top;
        }

        .invoice-header h1 {
            font: bold 100% sans-serif;
            letter-spacing: 0.5em;
            text-align: center;
            text-transform: uppercase;
        }

        /* table */

        article table {
            font-size: 75%;
            table-layout: fixed;
            width: 100%;
            border-collapse: separate;
            border-spacing: 2px;
            text-align: center;

        }

        article th,
        td {
            border-width: 1px;
            padding: 0.5em;
            position: relative;
            text-align: center;

            border-radius: 0.25em;
            border-style: solid;
        }

        article th {
            background: #EEE;
            border-color: #BBB;
        }

        article td {
            border-color: #DDD;
        }

        /* page */
        .main-content {
            font: 16px/1 'Open Sans', sans-serif;
            overflow: auto;
            padding: 0.5in;
        }

        .main-content {
            /* background: #999; */
            cursor: default;
        }

        .main-content {
            box-sizing: border-box;
            margin: 50px auto;
            overflow: hidden;
            padding: 0.5in;
            width: 8.5in;
        }

        .main-content {
            background: #FFF;
            border-radius: 1px;
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        }

        /* header */
        .invoice-header {
            margin: 0 0 3em;
            z-index: 1;
        }
        
        .invoice-header h3 {
            color: #000;
        }

        .invoice-header:after {
            clear: both;
            content: "";
            display: table;
        }

        .invoice-header h1 {
            background: #cc680e;
            border-radius: 0.25em;
            /* color: #FFF; */
            margin: 0 0 1em;
            padding: 1em 1em;
        }

        address {
            font-style: normal;
        }

        .invoice-header address {
            float: left;
            font-size: 75%;
            font-style: normal;
            line-height: 1.25;
            margin: 0 1em 1em 0;
        }

        .invoice-header address p {
            margin: 0 0 0.25em;
        }

        .invoice-header span,
        .invoice-header img {
            display: block;
            float: right;
        }

        .invoice-header span {
            margin: 0 0 1em 1em;
            max-height: 25%;
            max-width: 60%;
            position: relative;
        }

        .invoice-header img {
            max-height: 100%;
            max-width: 100%;
        }

        .invoice-header input {
            cursor: pointer;
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        /* article */
        article {
            z-index: 1;
        }

        .invoice-footer {
            z-index: 1;
        }

        article,
        article address,
        table.meta,
        table.inventory {
            margin: 0 0 3em;
        }

        article:after {
            clear: both;
            content: "";
            display: table;
        }

        article h1 {
            clip: rect(0 0 0 0);
            position: absolute;
        }

        article address {
            float: left;
            font-size: 125%;
            font-weight: bold;
        }

        /* table meta & balance */

        table.meta,
        table.balance {
            float: right;
            width: 36%;
        }

        table.meta:after,
        table.balance:after {
            clear: both;
            content: "";
            display: table;
        }

        /* table meta */

        table.meta th {
            width: 40%;
        }

        table.meta td {
            width: 60%;
        }

        /* table items */

        table.inventory {
            clear: both;
            width: 100%;
        }

        table.inventory th {
            font-weight: bold;
            text-align: center;
        }

        table.inventory td:nth-child(1) {
            width: 24%;
            /* padding: 10px; */
        }

        table.inventory td:nth-child(2) {
            width: 20%;
        }

        table.inventory td:nth-child(3) {
            /* text-align: right; */
            width: 12%;
        }

        table.inventory td:nth-child(4) {
            /* text-align: right; */
            width: 12%;
        }

        table.inventory td:nth-child(5) {
            /* text-align: right; */
            width: 12%;
        }

        /* table balance */

        table.balance th,
        table.balance td {
            width: 50%;
        }

        table.balance td {
            text-align: center;
        }

        /* aside */

        aside h1 {
            border: none;
            border-width: 0 0 1px;
            margin: 0 0 1em;
        }

        aside h1 {
            border-color: #999;
            border-bottom-style: solid;
        }

        .Print {
            position: relative;
            margin-top: 30px;
        }

        .submit-button-profile {
            position: absolute;
            left: 45%;
            /* right: 50px; */
        }
    </style>
</head>

<body>
    <!-- NavBar Load -->
    <div class="nav" style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php include_once("../navbar/nav.php") ?>
    </div>
    <?php
    ob_start();
    include '../login/connection.php';

    $invoice_number = $_GET['invoice_number'];

    $sql = "select * from donation where invoice_num = '$invoice_number' ";
    $re = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($re)) {
        $name = $row['name'];
        $today_date = $row['donate_date'];
        $time = $row['time'];
        $username = $row['username'];
        $email = $row['email'];
        $phone_no = $row['phone_no'];
        $country = $row['country'];
        $nationality = $row['nationality'];
        $focus = $row['focus'];
        $pay_meth = $row['payment'];
        $amount = $row['amount'];
    }

    ?>



    <div class="main-content printable">
        <header class="invoice-header">
            <h1>Donation Payment Invoice</h1>
            <address>
                <h1> Hope Foundation</h1>
                <h3>Raipur, Chhattisgarh <br> (+91) 8269910123 </h3>
            </address>
            <span><img alt="" width="200px" height="200px" src="../../assests/Hope_Foundation_logo2.png"></span>
        </header>
        <article>
            <section class="invoice-details">
                <!-- <h1>Recipient</h1> -->
                <address>
                    <p>
                        Name:
                        <?php echo $name ?> <br>
                    </p>
                    <p>
                        Username:
                        <?php echo $username ?> <br>
                    </p>
                </address>
            </section>
            <section class="invoice-items">
                <table class="meta">
                    <tr>
                        <th><span>Invoice #</span></th>
                        <td><span>
                                <?php echo $invoice_number; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <th><span>Date</span></th>
                        <td><span>
                                <?php echo $today_date; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <th><span>Time</span></th>
                        <td><span>
                                <?php echo $time; ?>
                            </span></td>
                    </tr>

                </table>
            </section>
            <table class="inventory">
                <thead>
                    <tr>
                        <th><span>Email ID</span></th>
                        <th><span>Focused on</span></th>
                        <th><span>Payment Method</span></th>
                        <th><span>Nationality</span></th>
                        <th><span>Total</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span>
                                <?php echo $email; ?>
                            </span></td>
                        <td><span>
                                <?php echo $focus; ?>
                            </span></td>
                        <td><span>
                                <?php echo $pay_meth; ?>
                            </span></td>
                        <td><span>
                                <?php echo $nationality; ?>
                            </span></td>
                        <td><span data-prefix>₹</span><span>
                                <?php echo $amount; ?>
                            </span></td>
                    </tr>

                </tbody>
            </table>

            <table class="balance">
                <tr>
                    <th><span>Total</span></th>
                    <td><span data-prefix>₹</span><span>
                            <?php echo $amount; ?>
                        </span></td>
                </tr>
            </table>
        </article>
        <footer class="invoice-footer">
            <aside>
                <h1><span>Contact us</span></h1>
                <div>
                    <p align="center">Email :- hopefoundation134@gmail.com || Web :- www.HopeFoundation.com <br>
                        Phone :- +91-8269910123 </p>
                </div>
            </aside>
        </footer>
    </div>

    <div class="Print">
        <button class="submit-button-profile" onclick="printPreview()">Print</button>
    </div>

    <!-- JavaScript to trigger print preview -->
    <script>
        function printPreview() {
            window.print();
        }
    </script>

</body>

</html>

<?php

ob_end_flush();

?>