<?php
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];

$to = "tucorreo@dominio.com";  // <<--- CAMBIA ESTO
$subject = "Nuevo pedido ABAIA: $producto";

$message = "Has recibido un nuevo pedido:\n\n" .
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
