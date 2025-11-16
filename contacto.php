<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - ABAIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Contacto</h1></header>
    <main>
        <form action="contacto.php" method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre" required><br>
            <label>Email:</label>
            <input type="email" name="email" required><br>
            <label>Mensaje:</label>
            <textarea name="mensaje" rows="4" required></textarea><br>
            <button type="submit">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p>Gracias, " . htmlspecialchars($_POST['nombre']) . ". Tu mensaje ha sido enviado correctamente.</p>";
        }
        ?>
    </main>
    <footer><a href="index.php">Volver al inicio</a></footer>
</body>
</html>
