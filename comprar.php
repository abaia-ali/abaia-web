<?php
$producto = $_GET['producto'] ?? 'Producto desconocido';
$precio = $_GET['precio'] ?? '0';
?>

<?php include 'header.php'; ?>

<main>
    <h2>Comprar: <?php echo htmlspecialchars($producto); ?></h2>

    <form action="procesar_compra.php" method="POST">
        <input type="hidden" name="producto" value="<?php echo $producto; ?>">
        <input type="hidden" name="precio" value="<?php echo $precio; ?>">

        <label>Tu nombre:</label>
        <input type="text" name="nombre" required>

        <label>Tu correo:</label>
        <input type="email" name="email" required>

        <label>Dirección de envío:</label>
        <textarea name="direccion" required></textarea>

        <button type="submit">Enviar pedido</button>
    </form>
</main>

<?php include 'footer.php'; ?>
