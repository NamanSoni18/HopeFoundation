<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
</head>

<body>
    <!-- Nav Bar Load -->
    <div w3-include-html="../navbar/nav.php" style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
    </div>
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>
    <script>
        function contacted() {
            alert("Message Sent!!");
        }
    </script>


    <!-- Contact Us -->
    <div class="contact">
        <form class="form" action="" method="post">

            <div class="flex">
                <label>
                    <input class="input" type="text" name="fname" id="fname" placeholder="" required>
                    <span>First name</span>
                </label>

                <label>
                    <input class="input" type="text" name="lname" id="lname" placeholder="" required>
                    <span>Last name</span>
                </label>
            </div>

            <label>
                <input class="input" type="email" name="email" id="email" placeholder="" required="">
                <span>Email</span>
            </label>

            <label>
                <input class="input" placeholder="" name="c_no" id="c_no" type="number" required="">
                <span>Contact Number</span>
            </label>
            <label>
                <textarea class="input01" placeholder="" name="message" id="message" rows="3" required=""></textarea>
                <span>Message</span>
            </label>

            <button class="fancy">
                <span class="top-key"></span>
                <span class="text"><input type="submit" name="submit" class="submit" value="Contact Us"></span>
                <span class="bottom-key-1"></span>
                <span class="bottom-key-2"></span>
            </button>
        </form>
    </div>
</body>

</html>

<?php
include "../login/connection.php";
session_start();

$fname = $lname = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $c_no = $_POST["c_no"];
    $message = $_POST["message"];

    $query = "INSERT INTO contact(fname,lname,email,c_no,message,time) VALUES('$fname', '$lname', '$email', $c_no, '$message', Now());";

    $result = mysqli_query($conn, $query);

    if($result) {
        header("Location: ../connect/contact.php");
    }

}
?>