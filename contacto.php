<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - Asociación ABAIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Contacto</h1>
    <p>Si quieres ponerte en contacto con nuestra asociación, puedes escribirnos usando este formulario.</p>

    <form action="https://formsubmit.co/ainhoaptaboada@gmail.com" method="POST">

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Mensaje:</label>
        <textarea name="mensaje" rows="5" required></textarea>

        <!-- Opciones ocultas para FormSubmit -->
        <input type="hidden" name="_captcha" value="false">
        <input type="hidden" name="_template" value="table">
        <input type="hidden" name="_next" value="https://www.abaia.es/gracias.php">

        <button type="submit">Enviar mensaje</button>

    </form>

    <br>
    <a href="index.php">Volver al inicio</a>

</div>

</body>
</html>
