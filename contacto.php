<main>
    <section class="contacto-container">
        <h2>Contacto</h2>
        <p>¿Tienes alguna duda o quieres colaborar con ABAIA? Escríbenos y te responderemos pronto.</p>

        <div class="contacto-grid">
            <!-- Formulario -->
            <form action="contacto.php" method="post" class="contacto-form">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Tu nombre" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Tu correo" required>

                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" id="mensaje" rows="5" placeholder="Escribe tu mensaje..." required></textarea>

                <button type="submit" class="btn">Enviar</button>
            </form>

            <!-- Imagen de contacto -->
<div style="text-align: center; margin-top: 20px;">
    <img src="img/contacto.jpg" alt="Imagen de contacto" style="width: 50%; border-radius: 10px;">
</div>



        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p class='mensaje-enviado'>Gracias, " . htmlspecialchars($_POST['nombre']) . ". Tu mensaje ha sido enviado correctamente.</p>";
        }
        ?>
    </section>
</main>
