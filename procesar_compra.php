<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Evitar acceso directo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("No puedes acceder directamente a esta página.");
}

// Recoger datos del formulario
$producto  = $_POST['producto'] ?? '';
$precio    = $_POST['precio'] ?? '';
$nombre    = $_POST['nombre'] ?? '';
$email     = $_POST['email'] ?? '';
$direccion = $_POST['direccion'] ?? '';

if(!$producto || !$precio || !$nombre || !$email || !$direccion){
    die("Faltan datos del pedido.");
}

// Configurar PHPMailer
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp-relay.brevo.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '9bc00d001@smtp-brevo.com'; // tu login SMTP
    $mail->Password   = getenv('BREVO_API_KEY');    // tu SMTP Key como variable de entorno
    $mail->SMTPSecure = 'tls';                       // TLS para puerto 587
    $mail->Port       = 587;

    // Remitente autorizado en Brevo
    $mail->setFrom('abdelali.lahiaoui@educa.madrid.org', 'ABAIA');
    // Destinatario (tú)
    $mail->addAddress('abdelali.lahiaoui@educa.madrid.org', 'Abdelali');

    // Contenido del correo
    $mail->isHTML(false);
    $mail->Subject = "Nuevo pedido ABAIA: $producto";
    $mail->Body    = "Has recibido un nuevo pedido:\n\nProducto: $producto\nPrecio: $precio €\nNombre: $nombre\nEmail: $email\nDirección:\n$direccion";

    $mail->send();
    echo "Pedido enviado correctamente. Gracias por colaborar ❤️";
} catch (Exception $e) {
    echo "Error al enviar el pedido: {$mail->ErrorInfo}";
}
