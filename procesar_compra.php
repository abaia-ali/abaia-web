<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // PHPMailer cargado con Composer

// Cargar variables de entorno de Render (ya definidas en tu panel)
$smtpUser = getenv('SMTP_USER');
$smtpPass = getenv('SMTP_PASS');

// Evita errores si acceden directamente sin enviar el formulario
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("<h2>No puedes acceder directamente a esta página.</h2>");
}

// Recoger datos del formulario
$producto  = $_POST['producto']  ?? null;
$precio    = $_POST['precio']    ?? null;
$nombre    = $_POST['nombre']    ?? null;
$email     = $_POST['email']     ?? null;
$direccion = $_POST['direccion'] ?? null;

// Validación simple
if (!$producto || !$precio || !$nombre || !$email || !$direccion) {
    die("<h2>Error: faltan datos del pedido.</h2>");
}

// Evitar inyección de cabeceras
$nombre = str_replace(["\r", "\n"], '', $nombre);
$email = str_replace(["\r", "\n"], '', $email);
$producto = str_replace(["\r", "\n"], '', $producto);

$mail = new PHPMailer(true);

try {
    // Configuración SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp-relay.brevo.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUser;   // Usuario desde variable de entorno
    $mail->Password   = $smtpPass;   // Contraseña desde variable de entorno
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Destinatario y remitente
    $mail->setFrom('no-reply@abaia.es', 'ABAIA');
    $mail->addAddress('abdelalilahiaoui8@gmail.com');

    // Contenido del correo
    $mail->Subject = "Nuevo pedido ABAIA: $producto";
    $mail->Body    = "Has recibido un nuevo pedido:\n\n".
                     "Producto: $producto\n".
                     "Precio: $precio €\n".
                     "Nombre: $nombre\n".
                     "Email: $email\n".
                     "Dirección:\n$direccion";

    // Enviar
    $mail->send();
    echo "<h2>Pedido enviado correctamente. Gracias por colaborar ❤️</h2>";

} catch (Exception $e) {
    echo "<h2>Error al enviar el pedido: {$mail->ErrorInfo}</h2>";
}
?>
