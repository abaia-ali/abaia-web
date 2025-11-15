<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - ABAIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Contacto</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="contacto.php">Contacto</a>
    </nav>
</header>

<main>
<h2>Envíanos un mensaje</h2>
<form method="post" action="enviar.php">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>
    <label>Mensaje:</label><br>
    <textarea name="mensaje" rows="4" cols="40" required></textarea><br><br>
    <input type="submit" value="Enviar">
</form>
</main>

<footer>
    <p>&copy; 2025 Asociación ABAIA</p>
</footer>
</body>
</html>
