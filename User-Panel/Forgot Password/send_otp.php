<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify_Otp</title>
    <script>
        function retVal() {
            var retVal = confirm("Do you want to verify OTP!!");
            if (retVal == true) {
                location.replace('verify_otp.php');
            }
            else {
                location.replace("../Main/index.php");
                // return false;
            }
        }
    </script>
</head>

<body>

</body>

</html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PhpMailer/Exception.php';
require '../../PhpMailer/PHPMailer.php';
require '../../PhpMailer/SMTP.php';

include '../login/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the email exists in the database
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {

            // Generate and save OTP to the database
            $otp = generateRandomOTP();
            $updateSql = "UPDATE user SET otp = '$otp' WHERE email = '$email'";
            $updateResult = mysqli_query($conn, $updateSql);

            if ($updateResult) {
                // Use PHPMailer to send email via SMTP
                $mail = new PHPMailer(true);

                try {
                    // Set SMTP configuration
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'hopefoundation134@gmail.com';
                    $mail->Password = 'yzdfaicwdjtsapat';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    // Set email content
                    $mail->setFrom('hopefoundation134@gmail.com', 'Hope Foundation');
                    $mail->addAddress($email, 'Hope Foundation');
                    $mail->Subject = "OTP for Password Reset";
                    $mail->Body = "Your OTP for " . $row['username'] . " is: $otp";

                    // Attempt to send the email
                    $mail->send();
                } catch (Exception $e) {
                    echo "Mail not sent: " . $mail->ErrorInfo;
                }

                session_start();

                $_SESSION['username_forgot'] = $row['username'];
                $_SESSION['email_forgot'] = $row['email'];

                echo "<script>retVal();</script>";
            } else {
                echo "Error updating OTP: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Email not found.');</script>";
            echo '<script>location.href="../login/login.php"</script>';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function generateRandomOTP($length = 6)
{
    $characters = '0123456789';
    $otp = '';

    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $otp;
}
?>