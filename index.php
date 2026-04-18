<?php
$title="ATM Sin Tension";
//$links_css=["/ejemplo/ejemplo.css",""];
include "./includes/header.php";
include "./includes/navbar.php";
?>
<section class="portada">
    <img src="/blancaTFG/public/media/chica_beige.jpg" alt="Portada" class="portada-img">

    <div class="portada-texto">
        <h1>Alivio real para tu día a día</h1>
        <p>Fisioterapia especializada en ATM (articulación temporomandibular)</p>
    </div>
</section>
<div class="contenido">
<p class="text-center text-fuerte ms-4 me-4 mt-4">ATM Sin Tensión es un espacio dedicado exclusivamente al tratamiento de la articulación 
    temporomandibular y sus disfunciones. La clínica está dirigida por María García Martínez, una fisioterapeuta especializada en ATM, 
    con formación en terapia manual, dolor orofacial y abordaje funcional de la mandíbula y el cuello.</p>
<p class="text-center text-fuerte ms-4 me-4">Nuestro objetivo es ayudarte a entender tu dolor, recuperar movilidad y mejorar tu 
    calidad de vida con un tratamiento personalizado y basado en evidencia.</p>

    <h2 class="text-center mt-3 mb-4 text-primario">Servicios</h2>
<section class="d-flex justify-content-center gap-4 flex-wrap">
    <div class="card" style="width: 26rem;">
    <img src="./public/media/chico_dolor.png" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">ATM y dolor orofacial</h5>
        <p class="card-text">Dolor al masticar, chasquidos, bloqueos, tensión mandibular o molestias en la zona de la sien.
        Trabajamos para reducir el dolor, mejorar la función y devolver equilibrio a la articulación.</p>
        <a href="#" class="btn bg-complementario-fuerte text-claro">Más información</a>
    </div>
    </div>
    <div class="card" style="width: 26rem;">
    <img src="./public/media/chica_apretando.png" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Bruxismo</h5>
        <p class="card-text">Apretar o rechinar los dientes puede generar dolor mandibular, cervical y cefaleas.
        Abordamos tanto los síntomas como los factores que los desencadenan, combinando técnicas manuales y educación.</p>
        <a href="#" class="btn bg-complementario-fuerte text-claro">Más información</a>
    </div>
    </div>
</section>

<p class="text-center text-fuerte ms-4 me-4 mt-4 mb-4">Trabajamos desde una valoración inicial completa que 
nos permite entender tu caso en profundidad: tus síntomas, tus hábitos y cómo se comporta tu articulación. A partir 
de ahí diseñamos un plan de tratamiento personalizado que combina terapia manual específica para la ATM, técnicas de 
relajación muscular y ejercicios adaptados a tu día a día. Nuestro enfoque se basa en la educación y el acompañamiento, 
para que no solo mejores en consulta, sino que también aprendas a gestionar tu dolor y prevenir recaídas. </p>

<div class="alert alert-success alert-dismissible fade show mt-4 mb-4" role="alert">
    <i class="bi bi-info-circle-fill me-2"></i><strong>¡Reserva tu cita!</strong> 
    Regístrate para acceder al sistema de citas y elegir entre valoración inicial o sesiones de seguimiento.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<h2 class="text-center mt-3 mb-4 text-primario">Contacto</h2>
<section class="d-flex justify-content-center gap-4 flex-wrap align-items-start sContacto">
    <div class="contacto-texto">
<p class="text-fuerte ms-4 me-4">¿Tienes dudas o necesitas más información? El centro se encuentra en Getxo y atendemos con cita previa.
Llámanos o escríbenos y te ayudaremos encantados. </p>
<h3 class="text-primario ms-4 me-4">Tu mandíbula merece estar en calma. En ATM Sin Tensión te acompañamos a conseguirlo.</h3>
</div>
<div class="card ms-auto contacto-card ms-4 me-4">
  <ul class="list-group list-group-flush">
    <li class="text-center list-group-item"><i class="bi bi-telephone-fill"></i> +34 644 123 987</li>
    <li class="text-center list-group-item"><i class="bi bi-envelope-fill"></i> info@atmsintension.com</li>
    <li class="text-center list-group-item"><i class="bi bi-geo-alt-fill"></i> Calle Foru Kalea 12, Getxo</li>
  </ul>
</div>

</div>
</body>
<?php include "./includes/footer.php";
?>