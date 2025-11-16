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

// Conexión a la base de datos usando Env Group
$host = getenv('DB_HOST');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    die("<h2>Error al conectar con la base de datos: ".$mysqli->connect_error."</h2>");
}

// Guardar pedido
$stmt = $mysqli->prepare("INSERT INTO pedidos (producto, precio, nombre, email, direccion, visto) VALUES (?, ?, ?, ?, ?, 0)");
$stmt->bind_param("sdsss", $producto, $precio, $nombre, $email, $direccion);
if ($stmt->execute()) {
    echo "<h2>Pedido enviado correctamente. Gracias por colaborar ❤️</h2>";
} else {
    echo "<h2>Error al guardar el pedido: ".$stmt->error."</h2>";
}

$stmt->close();
$mysqli->close();
?>
