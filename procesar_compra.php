<?php
// Evitar acceso directo
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

// --- Guardar en la base de datos PostgreSQL ---
$db_host = getenv('DB_HOST');
$db_port = getenv('DB_PORT') ?: 5432;
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');

try {
    $dsn = "pgsql:host=$db_host;port=$db_port;dbname=$db_name";
    $pdo = new PDO($dsn, $db_user, $db_pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $stmt = $pdo->prepare("INSERT INTO pedidos (producto, precio, nombre, email, direccion, fecha) VALUES (:producto, :precio, :nombre, :email, :direccion, NOW())");
    $stmt->execute([
        ':producto' => $producto,
        ':precio' => $precio,
        ':nombre' => $nombre,
        ':email' => $email,
        ':direccion' => $direccion
    ]);
} catch (PDOException $e) {
    die("<h2>Error al guardar el pedido: " . htmlspecialchars($e->getMessage()) . "</h2>");
}

// --- Enviar correo vía Brevo ---
$apiKey = getenv('BREVO_API_KEY'); // tu API Key de Brevo
$to = "abdelalilahiaoui8@gmail.com";

$subject = "Nuevo pedido ABAIA: $producto";
$content = "Has recibido un nuevo pedido:\n\n".
           "Producto: $producto\n".
           "Precio: $precio €\n".
           "Nombre: $nombre\n".
           "Email: $email\n".
           "Dirección:\n$direccion";

$data = [
    "sender" => ["name" => "ABAIA", "email" => "no-reply@abaia.es"],
    "to" => [["email" => $to]],
    "subject" => $subject,
    "textContent" => $content
];

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
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Mostrar mensaje al usuario
if ($httpCode >= 200 && $httpCode < 300) {
    echo "<h2>Pedido enviado correctamente. Gracias por colaborar ❤️</h2>";
} else {
    echo "<h2>Pedido guardado en la base de datos, pero hubo un problema al enviar el correo. Inténtalo más tarde.</h2>";
}
?>
