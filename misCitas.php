<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$old = $_SESSION["form_data"] ?? null;
unset($_SESSION["form_data"]);

$title="Mis citas";
$links_js=[
    "/blancaTFG/public/js/toast.js",
    "/blancaTFG/public/js/validacionFormularios.js"
];

include "./includes/header.php";
include "./includes/navbar.php";
include "./includes/toast.php";
require_once "./dao/dao.php";
require_once "./includes/utils.php";
?>

<body class="bg-secundario">
<div class="contenido">

<h1 class="text-center text-claro mt-4 mb-4">Mis citas</h1>

<div class="d-flex flex-wrap justify-content-center gap-4 my-4">
    <button type="button" id="btnNueva" class="btn bg-complementario-claro text-primario px-5 py-4 fs-5 rounded-3">
        Nueva cita
    </button>

    <button type="button" id="btnModificar" class="btn bg-complementario-claro text-primario px-5 py-4 fs-5 rounded-3"> 
        Modificar cita
    </button>

    <button type="button" id="btnCancelar" class="btn bg-complementario-claro text-primario px-5 py-4 fs-5 rounded-3"> 
        Cancelar cita
    </button>
</div>

<div class="row justify-content-center pb-4 mb-4">

<!-- Formulario cita nueva ======================================================-->
    <div id="formNuevaCita" class="card shadow p-4 d-none col-12 col-md-10 col-lg-7">
        <h3 class="mb-3 text-primario text-center">Nueva cita</h3>

        <form id="form-cita" action="/blancaTFG/includes/procesarFormulario.php" method="POST" novalidate>
            <input type="hidden" name="formulario" value="crearCita">

            <div class="mb-3">
                <label class="text-fuerte form-label">Fecha</label>
                <input type="date" class="form-control validar-fecha-cita" name="fecha" value="<?= $old['fecha'] ?? '' ?>" required>
                <small class="texto-error text-danger d-none"></small>
            </div>

            <div class="mb-3">
                <label class="text-fuerte form-label">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control validar-hora-cita" value="<?= $old['hora'] ?? '' ?>" required>
                <small class="texto-error text-danger d-none"></small>
            </div>

            <div class="mb-3">
                <label class="text-fuerte form-label">Duración</label>
                <select name="duracion" id="duracion" class="form-control" required>
                    <option value="30" <?= isset($old) && $old['duracion']=='30' ? 'selected' : '' ?>>30 minutos</option>
                    <option value="60" <?= isset($old) && $old['duracion']=='60' ? 'selected' : '' ?>>1 hora</option>
                    <option value="90" <?= isset($old) && $old['duracion']=='90' ? 'selected' : '' ?>>1 hora y media</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="text-fuerte form-label">Tipo de cita</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo_cita" value="valoracion_inicial" <?= isset($old) && $old['tipo_cita']=='valoracion_inicial' ? 'checked' : '' ?>>
                    <label class="text-fuerte form-check-label">Valoración inicial</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo_cita" value="seguimiento" <?= isset($old) && $old['tipo_cita']=='seguimiento' ? 'checked' : '' ?>>
                    <label class="text-fuerte form-check-label">Seguimiento</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="text-fuerte form-label">Notas</label>
                <textarea name="notas_cliente" class="form-control validar-notas" rows="3"><?= $old['notas_cliente'] ?? '' ?></textarea>
                <small class="texto-error text-danger d-none"></small>
            </div>

            <div class="text-center">
                <button type="submit" class="btn bg-acento text-primario px-4 py-2">
                    Guardar cita
                </button>
            </div>
        </form>
        <script>
        document.querySelectorAll("#formNuevaCita input").forEach(input => {
            input.addEventListener("input", function() {
                validarCampo(this);
            });
        });
        </script>
    </div>

<!-- Formulario modificar cita ======================================================-->
    <div id="formModificarCita" class="card shadow p-4 d-none col-12 col-md-10 col-lg-7">
        <h3 class="mb-3 text-primario text-center">Modificar cita</h3>

        <form id="form-modificar" action="/blancaTFG/includes/procesarFormulario.php" method="POST" novalidate>
            <input type="hidden" name="formulario" value="modificarCita">

            <div class="mb-3">
                <label class="text-fuerte form-label">Selecciona una cita</label>
                <select name="id_cita" class="form-control" required>
                    <option value="">Elige una cita</option>
                    <?php
                    $citas = obtener_proximas_citas_usuario($_SESSION["id_usuario"]);
                    foreach ($citas as $cita):
                        $texto = $cita["fecha"] . " - " . substr($cita["hora"], 0, 5);
                    ?>
                        <option value="<?= $cita['id_cita'] ?>">
                            <?= $texto ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="text-fuerte form-label">Fecha</label>
                <input type="date" class="form-control validar-fecha-cita" name="fecha" value="<?= $old['fecha'] ?? '' ?>" required>
                <small class="texto-error text-danger d-none"></small>
            </div>

            <div class="mb-3">
                <label class="text-fuerte form-label">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control validar-hora-cita" value="<?= $old['hora'] ?? '' ?>" required>
                <small class="texto-error text-danger d-none"></small>
            </div>

            <div class="mb-3">
                <label class="text-fuerte form-label">Duración</label>
                <select name="duracion" id="duracion" class="form-control" required>
                    <option value="30" <?= isset($old) && $old['duracion']=='30' ? 'selected' : '' ?>>30 minutos</option>
                    <option value="60" <?= isset($old) && $old['duracion']=='60' ? 'selected' : '' ?>>1 hora</option>
                    <option value="90" <?= isset($old) && $old['duracion']=='90' ? 'selected' : '' ?>>1 hora y media</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn bg-acento text-primario px-4 py-2">
                    Modificar cita
                </button>
            </div>

        </form>
        <script>
        document.querySelectorAll("#formModificarCita input").forEach(input => {
            input.addEventListener("input", function() {
                validarCampo(this);
            });
        });
        </script>
    </div>

<!-- Formulario eliminar cita ======================================================-->
    <div id="formCancelarCita" class="card shadow p-4 d-none col-12 col-md-10 col-lg-7">
        <h3 class="mb-3 text-primario text-center">Cancelar cita</h3>

        <form id="form-modificar" action="/blancaTFG/includes/procesarFormulario.php" method="POST" novalidate>
            <input type="hidden" name="formulario" value="cancelarCita">

            <div class="mb-3">
                <label class="text-fuerte form-label">Selecciona la cita a cancelar</label>
                <select name="id_cita" class="form-control" required>
                    <option value="">Elige una cita</option>
                    <?php
                    $citas = obtener_proximas_citas_usuario($_SESSION["id_usuario"]);
                    foreach ($citas as $cita):
                        $texto = $cita["fecha"] . " - " . substr($cita["hora"], 0, 5);
                    ?>
                        <option value="<?= $cita['id_cita'] ?>">
                            <?= $texto ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn bg-acento text-primario px-4 py-2">
                    Cancelar cita
                </button>
            </div>
        </form>
    </div>
</div> <!-- cierre del row -->

<div class="row justify-content-center">
    <div class="alert alert-warning col-12 col-md-10 col-lg-5 py-4" role="alert">
        <h3 class ="text-center">Próximas citas</h3>
        <?php
            $citas = obtener_proximas_citas_usuario($_SESSION["id_usuario"]);
            foreach ($citas as $cita):
                $fecha_formateada = formatear_fecha($cita["fecha"]);
                $texto = $fecha_formateada . " - " . substr($cita["hora"], 0, 5) . " (" . $cita["duracion"] . " min)";
        ?>
            <div class="row justify-content-center"><?= $texto ?></div>
        <?php endforeach; ?>
    </div>
</div>
</div> <!-- cierre de contenido -->

<div class="container-fluid mt-4 mx-0 px-0">
    <div class="row mt-4 mx-0 px-0">
        <div class="mt-4 mx-0 px-0 col-centered">
            <div class="mx-0 px-0 centered fondo-citas">
        </div>
        </div>
    </div>
</div>

<?php if ($old): ?>
<script>
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("formNuevaCita").classList.remove("d-none");
});
</script>
<?php endif; ?>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const btnNueva = document.getElementById("btnNueva");
    const btnModificar = document.getElementById("btnModificar");
    const formNueva = document.getElementById("formNuevaCita");
    const formModificar = document.getElementById("formModificarCita");
    const btnCancelar = document.getElementById("btnCancelar");
    const formCancelar = document.getElementById("formCancelarCita");

    function toggle(form) {
        if (!form.classList.contains("d-none")) {
            form.classList.add("d-none");
            return;
        }

        formNueva.classList.add("d-none");
        formModificar.classList.add("d-none");
        formCancelar.classList.add("d-none");

        form.classList.remove("d-none");
    }

    btnNueva.onclick = () => toggle(formNueva);
    btnModificar.onclick = () => toggle(formModificar);
    btnCancelar.onclick = () => toggle(formCancelar);
});
</script>

<script>
bloquearSubmitSiErrores("formNuevaCita");
bloquearSubmitSiErrores("formModificarCita");
bloquearSubmitSiErrores("formCancelarCita");
</script>

</body>

<?php include "./includes/footer.php"; ?>