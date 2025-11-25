<?php include("header.php"); ?>

<?php
$producto = isset($_GET['producto']) ? urldecode($_GET['producto']) : '';
$google_form = "https://docs.google.com/forms/d/e/1FAIpQLSdYcB0hTk3m7lIvmv8CZbQoxOMBM_9ElGiHdZhbUMQasPWqCA/viewform?usp=header";
$whatsapp_number = "34698887636";
$wa_text = rawurlencode("Hola, quiero colaborar con: $producto");
$whatsapp_link = "https://wa.me/$whatsapp_number?text=$wa_text";
?>

<h2>Gracias</h2>
<p>Has elegido: <?php echo htmlspecialchars($producto); ?></p>

<a href="<?php echo $google_form; ?>" target="_blank">Formulario</a>
<a href="<?php echo $whatsapp_link; ?>" target="_blank">WhatsApp</a>

<?php include("footer.php"); ?>
