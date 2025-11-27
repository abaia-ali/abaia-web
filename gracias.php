<?php include("header.php"); ?>

<?php
$producto = isset($_GET['producto']) ? urldecode($_GET['producto']) : '';
$google_form = "https://docs.google.com/forms/d/e/1FAIpQLSdYcB0hTk3m7lIvmv8CZbQoxOMBM_9ElGiHdZhbUMQasPWqCA/viewform?usp=header";
$whatsapp_number = "34698887636";
$wa_text = rawurlencode("Hola, quiero colaborar con: $producto");
$whatsapp_link = "https://wa.me/$whatsapp_number?text=$wa_text";
?>

<div class="p-4 bg-light rounded-3 text-center shadow-sm">
    <h2>Gracias</h2>
    <p class="lead">Has elegido: <strong><?php echo htmlspecialchars($producto); ?></strong></p>

    <div class="d-flex justify-content-center mt-3 flex-wrap">
        <a href="<?php echo $google_form; ?>" target="_blank" class="btn btn-primary m-2">Formulario</a>
        <a href="<?php echo $whatsapp_link; ?>" target="_blank" class="btn btn-success m-2">WhatsApp</a>
        <a href="index.php" class="btn btn-outline-secondary m-2">Volver al inicio</a>
    </div>
</div>

<?php include("footer.php"); ?>
