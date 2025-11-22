<?php include("header.php"); ?>

<?php
$producto = isset($_GET['producto']) ? urldecode($_GET['producto']) : 'producto solidario';

// Pon aquí tu enlace de Google Forms (reemplaza)
$google_form = "https://forms.gle/TU_ENLACE_DE_FORMULARIO";

// Pon tu número de WhatsApp en formato internacional sin + (ej: 34600000000)
$whatsapp_number = "34698887636";
$wa_text = rawurlencode("Hola, quiero colaborar con: $producto. ¿Me podéis dar más información?");
$whatsapp_link = "https://wa.me/{$whatsapp_number}?text={$wa_text}";
?>

<div class="text-center py-4">
    <h2>¡Gracias por tu interés!</h2>
    <p class="lead">Has seleccionado: <strong><?php echo htmlspecialchars($producto); ?></strong></p>

    <p>Para completar tu pedido, rellena este formulario o escribe por WhatsApp.</p>

    <div class="d-flex justify-content-center gap-3 mt-3">
        <a href="<?php echo $google_form; ?>" class="btn btn-success" target="_blank">Ir al formulario</a>
        <a href="<?php echo $whatsapp_link; ?>" class="btn btn-outline-primary" target="_blank">Contactar por WhatsApp</a>
    </div>
</div>

<?php include("footer.php"); ?>
