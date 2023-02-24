<?php
    require_once '../../vendor/phpmailer/src/PHPMailer.php';
    require_once '../../vendor/phpmailer/src/SMTP.php';
    require_once '../../vendor/phpmailer/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'kdmk.st@gmail.com';
    $mail->Password = 'Roslova2023';

    $mail->setFrom('kdmk.st@gmail.com', 'Resting');
    $mail->addAddress('kkozemjakins@gmail.com', 'Kirils Kozemjakins');
    $mail->Subject = 'Welcome to Resting!';
    $mail->Body = 'Nice to meet you';

    if (!$mail->send()) {
        echo 'Error sending email: ' . $mail->ErrorInfo;
    } else {
        echo 'Email sent successfully!';
    }
?>