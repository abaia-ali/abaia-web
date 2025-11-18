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

// Validación básica
if (!$producto || !$precio || !$nombre || !$email || !$direccion) {
    die("<h2>Error: faltan datos del pedido.</h2>");
}

// Configuración SMTP Brevo
$smtpServer = "smtp-relay.brevo.com";
$smtpPort   = 587; // para TLS
$smtpUser   = "abdelali.lahiaoui@educa.madrid.org"; // cuenta activa
$smtpPass   = getenv('BREVO_SMTP_KEY'); // contraseña SMTP guardada como variable de entorno

// Preparar correo
$to      = "abdelalilahiaoui8@gmail.com";
$subject = "Nuevo pedido ABAIA: $producto";
$content = "Has recibido un nuevo pedido:\n\n".
           "Producto: $producto\n".
           "Precio: $precio €\n".
           "Nombre: $nombre\n".
           "Email: $email\n".
           "Dirección:\n$direccion";

// Enviar correo usando cURL (API SMTP de Brevo)
$data = [
    "sender" => ["name" => "ABAIA", "email" => $smtpUser],
    "to"     => [["email" => $to]],
    "subject"=> $subject,
    "textContent"=> $content
];

$ch = curl_init("https://api.brevo.com/v3/smtp/email");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "accept: application/json",
    "api-key: $smtpPass",
    "content-type: application/json"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
// Timeout para que no quede cargando
curl_setopt($ch, CURLOPT_TIMEOUT, 10); // segundos
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo "<h2>Error al enviar el pedido: ".curl_error($ch)."</h2>";
} else {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($httpCode == 201 || $httpCode == 200){
        echo "<h2>Pedido enviado correctamente. Gracias por colaborar ❤️</h2>";
    } else {
        echo "<h2>Error al enviar el pedido. Código HTTP: $httpCode</h2>";
        echo "<pre>Respuesta Brevo: $response</pre>";
    }
}

curl_close($ch);
?>
