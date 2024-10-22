<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link rel="stylesheet" href="Donate.css">
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../navbar/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../login/style.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <style>
        body {
            background: url("../assests/backgrounds/background7.svg") no-repeat;
            background-size: 1100px;
            background-position: top -80px left 50%;
        }
    </style>
</head>


<body>
    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar/nav.php") ?>
    </div>

    <div class="begin">
        <h1>Begin 2024 by Helping India</h1>
    </div>
    <div class="form-container2">
        <p class="title">Donate</p>
        <form class="form" method="post" action="" autocomplete="off" id="donateForm" name="submit">
            <div class="name content">
                <label for="name">
                    <h2 class="heading">Enter Your Name: </h2>
                </label>
                <input type="text" name="fname" id="name" placeholder="Name" required>
            </div>
            <div class="email content">
                <label for="email">
                    <h2 class="heading">Enter Your Email ID: </h2>
                </label>
                <input type="email" name="email" id="email" placeholder="Email ID" required>
            </div>
            <div class="phone content">
                <label for="phone_no">
                    <h2 class="heading">Enter Your Phone Number: </h2>
                </label>
                <input type="number" name="phone_no" id="phone_no" placeholder="Phone Number" required>
            </div>
            <div class="address content">
                <label for="address">
                    <h2 class="heading">Enter Your Address: </h2>
                </label>
                <textarea name="address" id="address" cols="80" rows="3" required></textarea>
            </div>
            <div class="zipcode content">
                <label for="zipcode">
                    <h2 class="heading">Enter Your Postal Code: </h2>
                </label>
                <input type="number" name="zipcode" id="zipcode" placeholder="Postal Code" required>
            </div>
            <div class="city content">
                <label for="city">
                    <h2 class="heading">Enter Your City: </h2>
                </label>
                <input type="text" name="city" id="city" placeholder="City" required>
            </div>
            <div class="state content">
                <label for="state">
                    <h2 class="heading">Enter Your State: </h2>
                </label>
                <input type="text" name="state" id="state" placeholder="State" required>
            </div>
            <div class="aadhaar content">
                <label for="aadhaar">
                    <h2 class="heading">Enter Your Aadhaar Number: </h2>
                </label>
                <input type="number" name="aadhaar" id="aadhaar" placeholder="Aadhaar Number" required>
            </div>
            <div class="pan content">
                <label for="pan">
                    <h2 class="heading">Enter Your Pan Number: </h2>
                </label>
                <input type="text" name="pan" id="pan" class="uppercase" placeholder="Pan Number" required>
            </div>
            <div class="country content">
                <label for="country">
                    <h2 class="heading">Enter Your Country: </h2>
                </label>
                <select name="country" id="country">
                    <option value="Indian" checked>India</option>
                </select>
            </div>
            <div class="nationality content">
                <h2 class="heading">Nationality</h2>
                <div class="choose-nation inputs">
                    <div class="indian label">
                        <input type="radio" name="nationality" id="indian" value="Indian" checked required>
                        <label for="indian">Indian</label>
                    </div>
                    <div class="nri label">
                        <input type="radio" name="nationality" id="nri" value="NRI" required>
                        <label for="nri">NRI</label>
                    </div>
                </div>
            </div>
            <div class="focus-area content">
                <h2 class="heading">Focus Area</h2>
                <div class="choose-focus inputs">
                    <div class="children label">
                        <input type="radio" name="focus" id="children" value="Children" checked required>
                        <label for="children">Children</label>
                    </div>
                    <div class="elders label">
                        <input type="radio" name="focus" id="elder" value="Unprivileged Elders" required>
                        <label for="elder">Unprivileged Elders</label>
                    </div>
                    <div class="animals label">
                        <input type="radio" name="focus" id="animals" value="Animals" required>
                        <label for="animals">Animals</label>
                    </div>
                </div>
            </div>
            <div class="pay-meth content">
                <h2 class="heading">Payment Method</h2>
                <div class="choose-pay-meth inputs">
                    <div class="one-time label">
                        <input type="radio" name="pay-meth" id="one-time" value="One-Time Payment" checked required>
                        <label for="one-time">One-Time Payment</label>
                    </div>
                </div>
            </div>
            <div class="Amount content">
                <h2 class="heading">Amount</h2>
                <div class="amount">
                    <div class="Amount inputs">
                        <div class="amount label">
                            <button onclick="btnclick(this, '5000')" type="button" class="amount-btn"
                                data-amount="5000">
                                <input type="text" id="amount5k" name="price" value="5000" readonly required>
                                <label for="amount5k"><i class="fa-solid fa-indian-rupee-sign"></i><b>5000</b></label>
                            </button>
                        </div>
                    </div>
                    <div class="Amount inputs">
                        <div class="amount label">
                            <button onclick="btnclick(this, '15000')" type="button" class="amount-btn"
                                data-amount="15000">
                                <input type="text" id="amount15k" name="price" value="15000" readonly required>
                                <label for="amount15k"><i
                                        class="fa-solid fa-indian-rupee-sign"></i><b>15,000</b></label>
                            </button>
                        </div>
                    </div>
                    <div class="Amount inputs">
                        <div class="amount label">
                            <button onclick="btnclick(this, '50000')" type="button" class="amount-btn"
                                data-amount="50000">
                                <input type="text" id="amount50k" name="price" value="50000" readonly required>
                                <label for="amount50k"><i
                                        class="fa-solid fa-indian-rupee-sign"></i><b>50,000</b></label>
                            </button>
                        </div>
                    </div>
                    <div class="Amount inputs">
                        <div class="amount label">
                            <button onclick="btnclick(this)" type="button" class="amount-btn otheramount">
                                <label for="Another"><b>Other Amount</b></label>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden">
                <input type="text" name="price" id="otheramount" class="hidden-input" placeholder="Enter amount"
                    required>
            </div>
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            <button type="submit" class="form-btn submit" id="donateButton" name="submit">Donate ❤️</button>
        </form>
    </div>

    <script src="script.js" defer></script>
</body>

</html>
<?php
include "../login/connection.php";

function donateuser()
{
    if (!(isset($_COOKIE["username"]) || isset($_SESSION['username']))) {
        echo "<script>retVal();</script>";
    }
}

donateuser();

$name = $email = $dob = $address = $city = $state = $country = $nationality = $focus = $payment = $pan = "";
$amount = 100;
if (isset($_POST['submit'])) {
    $name = $_POST['fname'];
    $invoice_number = generateInvoiceNumber();
    $today_date = date("Y-m-d");
    // $current_time = date("H:i:s");
    $username = $_COOKIE['username'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];
    $aadhaar = $_POST['aadhaar'];
    $pan = $_POST['pan'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $nationality = $_POST['nationality'];
    $focus = $_POST['focus'];
    $pay_meth = $_POST['pay-meth'];

    // Check if "Other Amount" is selected
    if (isset($_POST['price']) && $_POST['price'] == 'Other') {
        $amount = $_POST['otheramount'];
    } else {
        $amount = $_POST['price'];
    }

    $query = "INSERT INTO donation(invoice_num, name, username, email, phone_no, donate_date, time, address, pan, aadhaar, postalcode, city, state, country, nationality, focus, payment, amount) VALUES('$invoice_number','$name', '$username', '$email', '$phone_no', '$today_date', NOW() , '$address', '$pan', '$aadhaar', '$zipcode', '$city', '$state', '$country', '$nationality', '$focus', '$pay_meth', '$amount')";

    $result = mysqli_query($conn, $query);

    if ($result == 1) {
        echo '<script>alert("Donation Successfull");</script>';
        echo '<script>window.location.href="invoice-donate.php?invoice_number=' . $invoice_number . '";</script>';
    } else {
        echo '<script>alert("Donation Unsuccessfull");</script>';
    }

    // JavaScript block moved inside the PHP block
    // echo '<script>pay();</script>';
}

function generateInvoiceNumber() {
    // Implement your logic to generate a unique invoice number here
    // You can use a combination of timestamp, random numbers, or any other method that ensures uniqueness
    return 'INV' . date('YmdHis') . rand(1000, 9999); // Example: INV202401312359591234
}
?>