<?php
$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];

echo "<h2>Gracias por contactar con nosotros, $nombre</h2>";
echo "<p>Tu mensaje: <b>$mensaje</b></p>";
echo "<p><a href='index.php'>Volver al inicio</a></p>";
?>
