<?php include("header.php"); ?>

<h1 class="text-center mb-4">Eventos de ABAIA</h1>

<p class="text-center mb-5">Aquí encontrarás nuestros últimos eventos solidarios: mercadillos, actividades benéficas y acciones para apoyar a Gaza.</p>

<div class="row g-4">

    <!-- EVENTO 1 -->
    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="event-img-box">
                <!-- Pon la foto en /img por ejemplo mercadillo1.jpg -->
                <img src="img/evento1.jpg" class="card-img-top" alt="Mercadillo solidario">
            </div>
            <div class="card-body">
                <h5 class="card-title">Mercadillo Solidario</h5>
                <p class="card-text">
                    Recaudación de fondos mediante artesanía y productos solidarios para ayudar a familias de Gaza.
                </p>
            </div>
        </div>
    </div>

    <!-- EVENTO 2 -->
    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="event-img-box">
                <!-- Cambia la imagen -->
                <img src="img/evento2.jpg" class="card-img-top" alt="Actividad benéfica">
            </div>
            <div class="card-body">
                <h5 class="card-title">Actividad Benéfica</h5>
                <p class="card-text">
                    Talleres, charlas y actividades comunitarias para visibilizar la situación en Palestina.
                </p>
            </div>
        </div>
    </div>

    <!-- EVENTO 3 -->
    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="event-img-box">
                <!-- Cambia la imagen -->
                <img src="img/evento3.jpg" class="card-img-top" alt="Evento cultural">
            </div>
            <div class="card-body">
                <h5 class="card-title">Evento Cultural</h5>
                <p class="card-text">
                    Exposición y muestra cultural para recaudar fondos y promover la solidaridad con Gaza.
                </p>
            </div>
        </div>
    </div>

</div>

<!-- Espacio para que añadas más eventos fácilmente -->
<div class="mt-5">
    <h3>Añadir nuevos eventos</h3>
    <p class="text-muted">Puedes añadir más bloques copiando las tarjetas anteriores. Solo cambia:</p>
    <ul>
        <li>El nombre del evento</li>
        <li>La imagen (guárdala en <code>/img</code>)</li>
        <li>La descripción</li>
    </ul>
</div>

<?php include("footer.php"); ?>
