<?php include("header.php"); ?>

<h1 class="text-center mb-4">Eventos de ABAIA</h1>

<p class="text-center mb-5">
    Aquí encontrarás nuestros últimos eventos solidarios: mercadillos, actividades benéficas y acciones realizadas para apoyar a Gaza.
</p>

<style>
.event-img-box {
    display: flex;
    gap: 8px;
    overflow-x: auto;
}
.zoom-img {
    cursor: pointer;
    transition: 0.2s;
}
.zoom-img:hover {
    opacity: 0.8;
}
</style>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="event-img-box">
                <img src="img/evento3.jpg" class="zoom-img" alt="">
                <img src="img/evento3.1.jpg" class="zoom-img" alt="">
            </div>
            <div class="card-body">
                <h5 class="card-title">Jornada Solidaria – Barcelona</h5>
                <p class="card-text">
                    Encuentro solidario con talleres y mercadillo.<br>
                    <strong>Lugar:</strong> Plaza Cataluña, Barcelona<br>
                    <strong>Fecha:</strong> 2 de noviembre de 2025
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="event-img-box">
                <img src="img/evento4.jpg" class="zoom-img" alt="">
                <img src="img/evento4.1.jpg" class="zoom-img" alt="">
            </div>
            <div class="card-body">
                <h5 class="card-title">Talleres Infantiles – Rivas Vaciamadrid</h5>
                <p class="card-text">
                    Actividades infantiles y mercadillo solidario.<br>
                    <strong>Lugar:</strong> Casa de Asociaciones, Rivas Vaciamadrid<br>
                    <strong>Fecha:</strong> 19 de octubre de 2025
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="event-img-box">
                <img src="img/evento2.1.jpg" class="zoom-img" alt="">
                <img src="img/evento2.2.jpg" class="zoom-img" alt="">
                <img src="img/evento2.3.jpg" class="zoom-img" alt="">
                <img src="img/evento2.4.jpg" class="zoom-img" alt="">
            </div>
            <div class="card-body">
                <h5 class="card-title">Acampada Solidaria – Madrid</h5>
                <p class="card-text">
                    Acampada universitaria con talleres y mercadillo solidario.<br>
                    <strong>Lugar:</strong> Ciudad Universitaria, Madrid<br>
                    <strong>Fecha:</strong> 14 de junio de 2025
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="event-img-box">
                <img src="img/evento1-1.jpg" class="zoom-img" alt="">
                <img src="img/evento1.2.jpg" class="zoom-img" alt="">
                <img src="img/evento1.3.jpg" class="zoom-img" alt="">
            </div>
            <div class="card-body">
                <h5 class="card-title">Fiesta del Skate – Rivas Vaciamadrid</h5>
                <p class="card-text">
                    Actividad solidaria con skate, talleres y mercadillo.<br>
                    <strong>Lugar:</strong> Parque del Skate, Rivas Vaciamadrid<br>
                    <strong>Fecha:</strong> 26 de abril de 2025
                </p>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="imgModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark">
            <img id="imgModalSrc" class="img-fluid rounded">
        </div>
    </div>
</div>

<script>
document.querySelectorAll(".zoom-img").forEach(img => {
    img.addEventListener("click", () => {
        document.getElementById("imgModalSrc").src = img.src;
        let modal = new bootstrap.Modal(document.getElementById("imgModal"));
        modal.show();
    });
});
</script>

<?php include("footer.php"); ?>
