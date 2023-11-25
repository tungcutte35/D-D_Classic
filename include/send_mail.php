<?php
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendEmail($recipient, $subject, $body)
{
    // Instantiate PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Enable verbose debug output
        $mail->SMTPDebug = SMTP::DEBUG_OFF;

        // Set the mailer to use SMTP
        $mail->isSMTP();

        // Specify the SMTP server
        $mail->Host = 'smtp.gmail.com';

        // Enable SMTP authentication
        $mail->SMTPAuth = true;

        // Set the SMTP username and password
        $mail->Username = 'dongphucthiennam@gmail.com';
        $mail->Password = 'cniy iari wosv dozf';

        // Set the encryption type
        $mail->SMTPSecure = 'tls';

        // Set the SMTP port (TLS: 587, SSL: 465)
        $mail->Port = 587;

        // Set the sender and recipient
        $mail->setFrom('dongphucthiennam@gmail.com', 'DD Classic');
        $mail->addAddress($recipient);

        // Set the email subject and body
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Send the email
        $mail->send();

        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
    }
}

// Usage example
$recipient = 'tandatvok16@gmail.com';
$subject = 'Test Email';
$body = 'This is a test email sent through PHPMailer.';

sendEmail($recipient, $subject, $body);
