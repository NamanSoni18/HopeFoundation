<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="invoice-donate.css">
    <link rel="stylesheet" href="../navbar/nav.css">
    <link rel="stylesheet" href="../Profile/profile.css">
    <link rel="stylesheet" href="invoice-donate-print.css">
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
                <h1>Recipient</h1>
                <address>
                    <p>
                        Name:
                        <?php echo $name ?> <br>
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
            var printContent = document.querySelector('.main-content').innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }
    </script>

</body>

</html>

<?php

ob_end_flush();

?>