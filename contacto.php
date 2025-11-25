<?php include("header.php"); ?>

<h2>Contacto</h2>

<form action="enviar.php" method="post">
    <label>Nombre</label>
    <input name="nombre" required>

    <label>Email</label>
    <input name="email" type="email" required>

    <label>Mensaje</label>
    <textarea name="mensaje" required></textarea>

    <button type="submit">Enviar</button>
</form>

<a href="https://docs.google.com/forms/d/e/1FAIpQLSdYy6J5zK6xTM9nuB_XBHS2ITc36IyUkfiadotgxT-l-tcW_w/viewform?usp=header" target="_blank">
    Formulario de Google
</a>

<?php include("footer.php"); ?>
