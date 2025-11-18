<?php
header('Content-Type: application/json');

// Datos del formulario
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if (!$name || !$email || !$message) {
    echo json_encode(["success" => false, "error" => "Campos incompletos"]);
    exit;
}

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // CONFIG SMTP (Brevo)
    $mail->isSMTP();
    $mail->Host       = 'smtp-relay.brevo.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '9bc00d001@smtp-brevo.com';
    $mail->Password   = 'TU_PASSWORD_SMTP'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // EVITAR ERROR 524 (Cloudflare timeout)
    $mail->Timeout = 10; // segundos
    $mail->SMTPKeepAlive = false;

    // Remitente y destinatario
    $mail->setFrom("abdelali.lahiaoui@educa.madrid.org", 'Web ABAIA');
    $mail->addAddress("abdelali.lahiaoui@educa.madrid.org");

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = "Nuevo mensaje de contacto ABAIA";
    $mail->Body = "
        <b>Nombre:</b> $name<br>
        <b>Email:</b> $email<br>
        <b>Mensaje:</b><br>$message
    ";

    $mail->send();

    echo json_encode(["success" => true]);

} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $mail->ErrorInfo]);
}
