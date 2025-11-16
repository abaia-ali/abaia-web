<?php
// Evita acceso directo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("<h2>No puedes acceder directamente a esta página.</h2>");
}

// Recoger datos del formulario
$producto  = $_POST['producto']  ?? null;
$precio    = $_POST['precio']    ?? null;
$nombre    = $_POST['nombre']    ?? null;
$email     = $_POST['email']     ?? null;
$direccion = $_POST['direccion'] ?? null;

// Validación
if (!$producto || !$precio || !$nombre || !$email || !$direccion) {
    die("<h2>Error: faltan datos del pedido.</h2>");
}

// Preparar datos del correo
$apiKey = getenv('BREVO_API_KEY'); // Variable de entorno
$to = "abdelalilahiaoui8@gmail.com"; // Destinatario final

$subject = "Nuevo pedido ABAIA: $producto";
$content = "Has recibido un nuevo pedido:\n\n".
           "Producto: $producto\n".
           "Precio: $precio €\n".
           "Nombre: $nombre\n".
           "Email: $email\n".
           "Dirección:\n$direccion";

// Datos para la API de Brevo
$data = [
    "sender" => ["name" => "ABAIA", "email" => "9bc00d001@smtp-brevo.com"], // Remitente validado
    "to" => [["email" => $to]],
    "subject" => $subject,
    "textContent" => $content
];

// Enviar correo usando API de Brevo
$ch = curl_init("https://api.brevo.com/v3/smtp/email");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "accept: application/json",
    "api-key: $apiKey",
    "content-type: application/json"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Comprobar si se envió correctamente
if($http_code != 201) { // 201 = correo enviado correctamente
    echo "<h2>Error al enviar el pedido. Código HTTP: $http_code</h2>";
    echo "<pre>Respuesta Brevo: $response</pre>";
} else {
    echo "<h2>Pedido enviado correctamente. Gracias por colaborar ❤️</h2>";
}
?>
