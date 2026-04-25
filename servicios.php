<?php
$title="Servicios";
//$links_css=["/ejemplo/ejemplo.css",""];
include "./includes/header.php";
include "./includes/navbar.php";
?>
<body>
<div class="contenido">
<p class="text-center text-fuerte ms-4 me-4 mt-4 mb-4">En ATM Sin Tensión tratamos las principales disfunciones de la 
    articulación temporomandibular mediante un enfoque personalizado y basado en evidencia. Cada caso es único, por eso 
    realizamos una valoración completa y adaptamos el tratamiento a tus síntomas, hábitos y necesidades. A continuación 
    puedes conocer en detalle los servicios que ofrecemos.
</p>
<h2 class="text-center mt-3 mb-4 text-primario">ATM y dolor orofacial</h2>
<section class="d-flex justify-content-center gap-4 flex-wrap align-items-start contenedorInfo">
    <div class="elemeto1">
        <p class="text-fuerte ms-4 me-4">La articulación temporomandibular puede generar dolor al masticar, 
            chasquidos, bloqueos, tensión en la mandíbula o molestias en la zona de la sien. Estas alteraciones 
            suelen estar relacionadas con hábitos, estrés, problemas posturales o desequilibrios musculares.
        </p>
        <h3 class="text-fuerte ms-4 me-4">Cómo lo tratamos</h3>  
        <p class="text-fuerte ms-4 me-4">Realizamos una valoración exhaustiva para identificar el origen del dolor 
            y diseñar un plan de tratamiento que combina terapia manual específica, técnicas de relajación 
            muscular, movilización articular y ejercicios personalizados. El objetivo es reducir el dolor, 
            mejorar la función y devolver equilibrio a la articulación.
        </p>
        <h3 class="text-fuerte ms-4 me-4">Beneficios del tratamiento</h3>
        <ul class="lista-centrada">
            <li class="text-fuerte ms-4 me-4">Disminución del dolor mandibular y facial</li>
            <li class="text-fuerte ms-4 me-4">Mejora de la movilidad y la función de la articulación</li>
            <li class="text-fuerte ms-4 me-4">Reducción de chasquidos y bloqueos</li>
            <li class="text-fuerte ms-4 me-4">Mayor conciencia y control de la articulación</li>
        </ul>
    </div>
    <div class="ms-auto ms-4 me-4 mb-2 elemento2">
        <img src="./public/media/movimiento_hombro.jpg" alt="chica tumbada y fisio trabajando su hombro">
    </div>
</section>
<h2 id="Bruxismo" class="text-center mt-4 mb-4 text-primario">Bruxismo</h2>
<section class="d-flex justify-content-center gap-4 flex-wrap align-items-start contenedorInfo">
    <div class="ms-auto ms-4 me-4 elemento2">
        <img src="./public/media/chica_gris.jpg" alt="chica tumbada y fisio trabajando su hombro">
    </div>
        <div class="elemeto1">
        <p class="text-fuerte ms-4 me-4">Apretar o rechinar los dientes, especialmente durante la noche, puede 
            provocar dolor mandibular, tensión cervical, cefaleas y desgaste dental. El bruxismo suele estar 
            asociado al estrés, la postura o la hiperactividad muscular.
        </p>
        <h3 class="text-fuerte ms-4 me-4">Cómo lo tratamos</h3>  
        <p class="text-fuerte ms-4 me-4">Evaluamos el comportamiento de la musculatura mandibular y cervical, 
            así como los hábitos que pueden estar influyendo. El tratamiento combina técnicas manuales, 
            liberación muscular, educación para el autocuidado y ejercicios que ayudan a disminuir la tensión 
            y mejorar el control mandibular.
        </p>
        <h3 class="text-fuerte ms-4 me-4">Beneficios del tratamiento</h3>
        <ul class="lista-centrada">
            <li class="text-fuerte ms-4 me-4">Reducción de la tensión mandibular y cervical</li>
            <li class="text-fuerte ms-4 me-4">Disminución de dolores de cabeza</li>
            <li class="text-fuerte ms-4 me-4">Mejora del descanso nocturno</li>
            <li class="text-fuerte ms-4 me-4">Prevención del desgaste dental asociado</li>
        </ul>
    </div>
</section>

<h2 class="text-center mt-4 mb-4 text-primario">Tarifas</h2>

<p class="text-center text-fuerte ms-4 me-4 mb-4">
    Todas las sesiones se adaptan a tus necesidades y al estado de tu articulación. 
    La duración habitual es de entre 30 y 90 minutos, dependiendo de la valoración y 
    del tratamiento necesario en cada visita. Tenemos 2 tipos de citas. Para más información, escríbenos 
  <a href="mailto:info@atmsintension.com" class="text-primario">aquí</a>.
</p>

<section class="d-flex justify-content-center gap-4 flex-wrap mt-4 mb-4">
  <div class="card text-center shadow" style="width: 20rem;">
    <div class="card-body">
      <h5 class="card-title text-primario mb-3">Valoración inicial</h5>
      <p class="card-text text-fuerte">Primera visita completa para analizar tu caso, tus síntomas y el estado de tu articulación.</p>
      <p class="fw-bold mb-1 text-fuerte">Duración: 60 min</p>
      <p class="fs-4 fw-bold textoGrande text-fuerte">60€</p>
    </div>
  </div>
  <div class="card text-center shadow" style="width: 20rem;">
    <div class="card-body">
      <h5 class="card-title text-primario mb-3">Sesión de seguimiento</h5>
      <p class="card-text text-fuerte">Tratamiento personalizado según tu evolución y necesidades en cada sesión.</p>
      <p class="fw-bold mb-1 text-fuerte">Duración: 60 min</p>
      <p class="fs-4 fw-bold textoGrande text-fuerte">50€</p>
    </div>
  </div>
</section>

<div class="text-center mt-4 mb-5">
  <a href="#" class="btn btn-lg bg-acento text-primario m-4">
    Regístrate para reservar tu cita
  </a>
</div>

</div>
</body>
<?php include "./includes/footer.php";
?>