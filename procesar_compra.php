<?php

// Evita errores si acceden sin enviar el formulario
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("<h2>No puedes acceder directamente a esta página.</h2>");
}

// Comprobamos cada campo antes de leerlo
$producto  = $_POST['producto']  ?? null;
$precio    = $_POST['precio']    ?? null;
$nombre    = $_POST['nombre']    ?? null;
$email     = $_POST['email']     ?? null;
$direccion = $_POST['direccion'] ?? null;

// Si falta algo → error
if (!$producto || !$precio || !$nombre || !$email || !$direccion) {
    die("<h2>Error: faltan datos del pedido.</h2>");
}

$to = "abdelalilahiaoui8@gmail.com";
$subject = "Nuevo pedido ABAIA: $producto";

$message =
"Has recibido un nuevo pedido:\n\n" .
"Producto: $producto\n" .
"Precio: $precio €\n" .
"Nombre: $nombre\n" .
"Email: $email\n" .
"Dirección:\n$direccion\n";

$headers = "From: no-reply@abaia.es";

if (mail($to, $subject, $message, $headers)) {
    echo "<h2>Pedido enviado correctamente. Gracias por colaborar ❤️</h2>";
} else {
    echo "<h2>Error al enviar el pedido. Inténtalo más tarde.</h2>";
}
?>
