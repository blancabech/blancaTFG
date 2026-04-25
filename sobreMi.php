<?php
$title="Sobre mí";
//$links_css=["/ejemplo/ejemplo.css",""];
include "./includes/header.php";
include "./includes/navbar.php";
?>
<body>
<div class="contenido">

    <h1 class="text-center text-primario mt-4 mb-4">Sobre mí</h1>

    <section class="d-flex justify-content-center gap-4 flex-wrap">
        <div class="elemeto1">
            <p class="text-fuerte ms-4 me-4">
                Soy María García Martínez, fisioterapeuta especializada en la articulación temporomandibular (ATM) 
                y el dolor orofacial. Mi interés por este area comenzó a raíz de una experiencia 
                personal. A los 16 años tuve un desplazamiento de disco debido al bruxismo, lo que me provocaba 
                bloqueos y dificultades para recapturar bien la mandíbula. A partir de entonces empecé a acudir 
                a fisioterapia y descubrí que muchísimas personas apretaban los dientes o tenían problemas similares, 
                pero pocos sabían realmente qué era la ATM o cómo cuidarla.
            </p>
            <p class="text-fuerte ms-4 me-4">
                Esa vivencia despertó en mí la curiosidad por entender mejor esta articulación y decidí hacer de ello mi profesión. 
                Me formé en terapia manual, abordaje funcional de la ATM, dolor crónico y educación en neurociencia del dolor. Mi objetivo es ofrecer 
                un tratamiento preciso, actualizado y adaptado a cada persona, entendiendo los síntomas, hábitos y factores que los afectan.
            </p>
            <h3 class="text-primario ms-4 me-4 mt-4">Formación destacada</h3>
            <ul class="lista-centrada ms-4 me-4 text-fuerte">
                <li>Grado en Fisioterapia</li>
                <li>Especialización en ATM y dolor orofacial</li>
                <li>Formación en terapia manual y técnicas miofasciales</li>
                <li>Curso avanzado en neurociencia del dolor</li>
                <li>Abordaje funcional de mandíbula y cuello</li>
            </ul>
        </div>
        <div class="ms-auto ms-4 me-4 elemento2">
            <img src="./public/media/chica_beige_vertical.jpg" alt="María García Martínez, fisioterapeuta">
        </div>
    </section>

    <h2 class="text-center mt-4 mb-4 text-primario">Mi enfoque</h2>
    <p class="text-center text-fuerte ms-4 me-4">
        En consulta trabajo desde una valoración detallada que me permite comprender no solo tus síntomas, 
        sino también los hábitos y factores que influyen en ellos. A partir de ahí diseño un tratamiento 
        personalizado que combina técnicas manuales específicas, ejercicios adaptados y estrategias de 
        autocuidado para que puedas avanzar también fuera de la consulta. Creo firmemente en el acompañamiento 
        y en que cada persona entienda qué le ocurre y cómo puede mejorar; la fisioterapia es un proceso 
        compartido, y mi papel es guiarte para que recuperes movilidad, reduzcas el dolor y vuelvas a sentir 
        tu mandíbula en calma.
    </p>

    <p class="text-center text-fuerte ms-4 me-4 mb-4 pb-4">
        Mi enfoque se basa en la cercanía, la escucha y la evidencia científica. Cada paciente llega con una 
        historia distinta, por eso adapto el tratamiento a tus necesidades reales, sin protocolos rígidos y 
        con una visión global del movimiento y del dolor. Mi objetivo es que encuentres un espacio seguro, 
        claro y profesional donde comprender tu articulación y aprender a cuidarla a largo plazo.
    </p>

</div>
</body>

<?php include "./includes/footer.php";
?>