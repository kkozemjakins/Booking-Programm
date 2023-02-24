<?php
    require_once '../../vendor/phpmailer/src/PHPMailer.php';
    require_once '../../vendor/phpmailer/src/SMTP.php';
    require_once '../../vendor/phpmailer/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'mail';
    $mail->Port = 000;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'mail';
    $mail->Password = 'pass';

    $mail->setFrom('mail', 'Resting');
    $mail->addAddress('TO mail', 'name');
    $mail->Subject = 'Welcome to Resting!';
    $mail->Body = 'Nice to meet you';

    if (!$mail->send()) {
        echo 'Error sending email: ' . $mail->ErrorInfo;
    } else {
        echo 'Email sent successfully!';
    }
?>