<?php include("header.php"); ?>

<h2>Contacto</h2>
<p>¿Tienes alguna duda o quieres colaborar? Escríbenos.</p>

<form action="enviar.php" method="post" class="mb-4">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="mensaje" class="form-label">Mensaje</label>
        <textarea id="mensaje" name="mensaje" rows="5" class="form-control" required></textarea>
    </div>

    <button class="btn btn-primary" type="submit">Enviar</button>
</form>

<?php include("footer.php"); ?>
