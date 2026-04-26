<?php
$title="Contacto";
//$links_css=["/ejemplo/ejemplo.css",""];
include "./includes/header.php";
include "./includes/navbar.php";
?>
<body>
<div class="contenido">
    <h1 class="text-center text-primario mt-4 mb-4">Contacto</h1>

    <p class="text-center text-fuerte ms-4 me-4">
        Para cualquier consulta, información adicional o gestión de citas, puedes ponerte en contacto con nosotros a 
        través de los siguientes medios. Estaremos encantados de ayudarte, ya sea para resolver dudas, solicitar 
        más detalles sobre nuestros tratamientos o concertar una visita. Haz click y se abrirá automáticamente tu aplicación de teléfono, correo o mapas. 
    </p>

    <div class="d-flex flex-column align-items-center gap-3 mb-4">
        <div class="bg-secundario rounded-pill px-3 py-2">
            <a href="tel:+34644123987" class="text-primario text-decoration-none">
                <i class="bi bi-telephone-fill me-2"></i> +34 644 123 987
            </a>
        </div>
        <div class="bg-secundario rounded-pill px-3 py-2">
            <a href="mailto:info@atmsintension.com" class="text-primario text-decoration-none">
                <i class="bi bi-envelope-fill me-2"></i> info@atmsintension.com
            </a>
        </div>
        <div class="bg-secundario rounded-pill px-3 py-2 mb-4">
            <a href="https://maps.google.com/?q=Calle+Foru+Kalea+12,+Getxo" target="_blank" class="text-primario text-decoration-none">
                <i class="bi bi-geo-alt-fill me-2"></i> Calle Foru Kalea 12, Getxo
            </a>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d181.32673560559235!2d-3.011759753456262!3d43.351346018394196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1777237812746!5m2!1ses!2ses" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
</body>
<?php include "./includes/footer.php";
?>

