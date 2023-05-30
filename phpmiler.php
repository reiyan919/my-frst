
<?php
include('inc/conx.php');
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

session_start();

// Initialize variables
$error = false;
$e_name = $e_email = $e_message = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Validate name
    if (!isset($_POST['name']) || empty($_POST['name'])) {
        $e_name = "Obligatoire !";
        $error = true;
    } else if (is_numeric($_POST['name'])) {
        $e_name = "Saisissez un texte et non un chiffre !";
        $error = true;
    } else {
        $name = clear($_POST['name']);
        if (empty($name)) {
            $e_name = "Obligatoire !";
            $error = true;
        } else if (strlen($_POST['name']) > 30) {
            $e_name = "Grand nom!";
            $error = true;
        }
    }

    // Validate email
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $e_email = "Obligatoire !";
        $error = true;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || strlen($_POST['email']) > 30) {
        $e_email = "Entrez un e-mail correct !";
        $error = true;
    } else {
        $email = clear($_POST['email']);
    }

    // Validate message
    if (!isset($_POST['message']) || empty($_POST['message'])) {
        $e_message = "Obligatoire !";
        $error = true;
    } else if (is_numeric($_POST['message'])) {
        $e_message = "Saisissez un texte et non un chiffre !";
        $error = true;
    } else {
        $message = clear($_POST['message']);
        if (empty($message)) {
            $e_message = "Obligatoire !";
            $error = true;
        } else if (strlen($_POST['message']) > 60) {
            $e_message = "Grand message !";
            $error = true;
        }
    }

    // If there are no errors, send the email
    if (!$error) {
        // Set up PHPMailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cultmb@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'fqtpelvjkqxrlqed'; // Replace with your Gmail password or app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($email);
        $mail->addAddress('cultmb@gmail.com'); // Replace with recipient email address

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Message From Contact';
            $style = "Name: $name <br> Email: $email <br> Message: $message ";
            $mail->Body  = $style;

            // Send the email
            $mail->send();
        header('location: phpmiler.php');
        die;
    }
}

function clear($input) {
    return trim($input);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="intt.css">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['creat']) && $_SESSION['creat'] != ""): ?>
            <div class="ok">
                <?php echo $_SESSION['creat']; ?>
            </div>
            <?php unset($_SESSION['creat']); ?>
        <?php endif; ?>
        <form action="" method="POST">
            <h3>Send Message</h3>
            <input type="text" id="name" name="name" placeholder="Your name" required>
            <?php if (isset($e_name)) echo "<span style='color: red;'>$e_name</span>"; ?>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <?php if (isset($e_email)) echo "<span style='color: red;'>$e_email</span>"; ?>
            <textarea name="message" rows="4" placeholder="Your message" required></textarea>
            <?php if (isset($e_message)) echo "<span style='color: red;'>$e_message</span>"; ?>
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
</body>
</html>
