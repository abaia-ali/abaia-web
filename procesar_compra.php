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

try {
    // Conexión PostgreSQL usando variables de entorno de Render
    $dsn = "pgsql:host=" . getenv('DB_HOST') . ";port=" . getenv('DB_PORT') . ";dbname=" . getenv('DB_NAME');
    $pdo = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASS'), [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // Insertar pedido en la tabla
    $stmt = $pdo->prepare("
        INSERT INTO pedidos (producto, precio, nombre, email, direccion)
        VALUES (:producto, :precio, :nombre, :email, :direccion)
    ");

    $stmt->execute([
        ':producto'  => $producto,
        ':precio'    => $precio,
        ':nombre'    => $nombre,
        ':email'     => $email,
        ':direccion' => $direccion
    ]);

    echo "<h2>Pedido guardado correctamente. Gracias por colaborar ❤️</h2>";

} catch (PDOException $e) {
    echo "<h2>Error al guardar el pedido: " . htmlspecialchars($e->getMessage()) . "</h2>";
}
?>
