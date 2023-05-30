<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
$page = "aboutus";
$error = 0;

if (isset($_POST['submit'])) {

    if (!isset($_POST['name']) || empty($_POST['name'])) {
        $e_name = "Obligatoire !";
        $error = 1;
    } else if (filter_var($_POST['name'], FILTER_VALIDATE_INT)) {
        $e_name = "Saisissez un texte et non un chiffre !";
        $error = 1;
    } else {
        $name = clear($_POST['name']);
        if (empty($name)) {
            $e_name = "Obligatoire !";
            $error = 1;
        } else if (strlen($_POST['name']) > 30) {
            $e_name = "Grand nom!";
            $error = 1;
        }
    }

    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $e_email = "Obligatoire !";
        $error = 1;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || strlen($_POST['email']) > 30) {
        $e_email = "Entrez un e-mail correct !";
        $error = 1;
    } else {
        $email = clear($_POST['email']);
    }

    if (!isset($_POST['message']) || empty($_POST['message'])) {
        $e_message = "Obligatoire !";
        $error = 1;
    } else if (filter_var($_POST['message'], FILTER_VALIDATE_INT)) {
        $e_message = "Saisissez un texte et non un chiffre !";
        $error = 1;
    } else {
        $message = clear($_POST['message']);
        if (empty($message)) {
            $e_message = "Obligatoire !";
            $error = 1;
        } else if (strlen($_POST['name']) > 60) {
            $e_message = "Grand  message !";
            $error = 1;
        }
    }

    if ($error == 0) {
        $_SESSION['creat'] = "Votre message a été envoyé avec succès <br> <p>merci<p>";
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bouzidrayan919@gmail.com';
        $mail->Password = 'gizqliwichltzqja';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($_POST['email']);
        $mail->addAddress('rayanbouzid919@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Message From Contact';
        $style = " Name: $name <br> Email: $email <br> Message: $message ";
        $mail->Body  = $style;

        $mail->SMTPDebug = SMTP::DEBUG_CONNECTION; // Add this line for debugging

        
        $mail->send();
        header('location: contacter-nous.php');
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
