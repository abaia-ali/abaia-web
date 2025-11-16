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

    <!-- Imagen de contacto al final -->
    <div style="text-align: center; margin-top: 20px;">
        <img src="img/contacto.jpg" alt="Imagen de contacto" style="width: 50%; border-radius: 10px;">
    </div>
</main>
