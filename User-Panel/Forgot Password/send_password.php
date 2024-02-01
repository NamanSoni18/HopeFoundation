<?php
require('../login/connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PhpMailer/Exception.php';
require '../../PhpMailer/PHPMailer.php';
require '../../PhpMailer/SMTP.php';

session_start();

$input;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email_forgot'];
    $username = $_SESSION['username_forgot'];
    $input = $_POST['input1'];


    // Check if the OTP is valid
    $sql = "SELECT * FROM user WHERE email = '$email' AND otp = '$input'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $password = $row['password'];

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
                $mail->Subject = "Your Password";
                $mail->Body = "Your Password for " . $username . " is: $password";

                // Attempt to send the email
                $mail->send();

                $query = "UPDATE user SET otp = 0 WHERE email = '$email'";
                mysqli_query($conn, $query);
                echo "<script>alert('Your Password is sent to your Mail Successfully')</script>";
                echo '<script>window.location.href="../Main/index.php";</script>';
            } catch (Exception $e) {
                echo "<script>alert('Error: Invalid OTP')</script>";
            }

        } else {
            echo "<script>alert('Error: Invalid OTP')</script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    session_destroy();
}
?>