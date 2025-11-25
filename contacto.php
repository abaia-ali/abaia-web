<?php include("header.php"); ?>

<div class="container mt-4">
    <h2 class="text-center mb-3">Contacto</h2>

    <form action="enviar.php" method="post" class="mb-4">
        <div class="mb-2">
            <label>Nombre</label>
            <input name="nombre" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Mensaje</label>
            <textarea name="mensaje" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Enviar</button>
    </form>

    <div class="text-center">
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdYy6J5zK6xTM9nuB_XBHS2ITc36IyUkfiadotgxT-l-tcW_w/viewform?usp=header" 
           target="_blank" class="btn btn-success">
           Formulario de Google
        </a>
    </div>
</div>

<?php include("footer.php"); ?>
