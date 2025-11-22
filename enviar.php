<?php include("header.php"); ?>

<?php
$nombre = htmlspecialchars($_POST['nombre'] ?? '');
$email  = htmlspecialchars($_POST['email'] ?? '');
$mensaje = htmlspecialchars($_POST['mensaje'] ?? '');

if (!$nombre || !$email || !$mensaje) {
    echo "<div class='alert alert-danger'>Por favor rellena todos los campos.</div>";
} else {
    // Puedes añadir aquí envío por PHPMailer si lo configuras luego (opcional)
    echo "<div class='alert alert-success'>";
    echo "<h4>Gracias, " . $nombre . ".</h4>";
    echo "<p>Tu mensaje ha sido recibido. Te responderemos pronto al correo $email.</p>";
    echo "</div>";
}
?>

<p><a href="index.php" class="btn btn-outline-secondary">Volver al inicio</a></p>

<?php include("footer.php"); ?>
