<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$title="Administrador";
$links_js=["/blancaTFG/public/js/toast.js"];
include "./includes/header.php";
include "./includes/navbar.php";
include "./includes/toast.php";
require_once "./dao/dao.php";
require_once "./includes/utils.php";

$modo = $_GET["modo"] ?? "dia";
$hoy = date("Y-m-d");

if ($modo === "dia") {
    $fecha = $_GET["fecha"] ?? $hoy;
    $citas = obtener_citas_dia($fecha);
}

if ($modo === "usuario") {
    $id_usuario_seleccionado = $_GET["usuario"] ?? null;
    $citas = $id_usuario_seleccionado ? obtener_citas_usuario($id_usuario_seleccionado) : [];
}

$usuarios = obtener_todos_los_usuarios();
?>

<body>

<div class="container-fluid">
    <div class="row h-100">
    <!-- Imagen izquierda -->
        <div class="col-12 col-md-6 p-0"> 
            <img src="./public/media/chica_columna.jpg" class="w-100 h-100 object-fit-cover" alt="chica con dolor mandibular">
        </div>
    <!-- Info derecha -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center p-0">
        <div class="contenido">
            <h1 class="text-center text-primario mt-4 mb-4">Panel de administrador</h1>  
            <h2 class="text-center mt-3 mb-4 text-primario">Listado de citas</h2>

            <form method="GET" id="formListado" class="d-flex gap-3 align-items-center">

                <div class="mb-3">
                    <select name="modo" id="modoListado" class="form-select text-fuerte">
                        <option value="dia" <?= $modo === "dia" ? "selected" : "" ?>>Por día</option>
                        <option value="usuario" <?= $modo === "usuario" ? "selected" : "" ?>>Por usuario</option>
                    </select>
                </div>

            <!-- Si eliges por dia-->
                <?php if ($modo === "dia"): ?>
                    <div class="mb-3" id="selectorFecha">
                        <input type="date" name="fecha" id="fechaListado" class="form-control text-fuerte" value="<?= $fecha ?>">
                    </div>
                <?php endif; ?>

            <!-- Si eliges por usuario -->
                <?php if ($modo === "usuario"): ?>
                    <div class="mb-3" id="selectorUsuario">
                        <select name="usuario" id="usuarioListado" class="form-control text-fuerte">
                            <option value="">Elige un usuario</option>
                            <?php foreach ($usuarios as $u): ?>
                                <option value="<?= $u['id_usuario'] ?>"
                                    <?= ($id_usuario_seleccionado == $u['id_usuario']) ? "selected" : "" ?>>
                                    <?= $u['username'] ?> (<?= $u['email'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

            </form>

        <!-- Aquí se pinta la tabla -->
            <div class="mt-4 w-100">
            <?php if (!empty($citas)): ?>

                <?php foreach ($citas as $c): ?>
                    <div class="card shadow-sm p-3 mb-3">

                        <?php
                        if ($modo === "dia") {
                            $texto = substr($c["hora"], 0, 5) . " ({$c["duracion"]} min) – {$c["username"]}";
                        } else {
                            $texto = formatear_fecha($c["fecha"]) . " – " . substr($c["hora"], 0, 5) . 
                                    " ({$c["duracion"]} min) – {$c["tipo_cita"]}";
                        }
                        ?>
                        <p class="mb-1 text-fuerte fw-bold"><?= $texto ?></p>

                        <?php if (!empty($c["notas_cliente"])): ?>
                            <p class="mb-0 text-muted"><?= $c["tipo_cita"] ?> - <?= nl2br($c["notas_cliente"]) ?></p>
                        <?php else: ?>
                            <p class="mb-0 text-muted fst-italic"><?= $c["tipo_cita"] ?> - Sin notas</p>
                        <?php endif; ?>

                        <?php if (!empty(trim($c["notas_admin"]))): ?>
                        <p class="mb-0 text-muted">Notas: <?= $c["notas_admin"] ?? "" ?></p>
                        <?php endif; ?>
                    
                        <!-- Modificar notas admin-->
                        <div class="d-flex justify-content-between align-items-start mt-2">
                            <form action="/blancaTFG/includes/procesarFormulario.php" method="POST" id="formNotas<?= $c['id_cita'] ?>" class="d-none flex-grow-1 me-3">

                                <input type="hidden" name="formulario" value="guardarNotasAdmin">
                                <input type="hidden" name="id_cita" value="<?= $c['id_cita'] ?>">
                                <input type="hidden" name="modo" value="<?= $modo ?>">
                                <input type="hidden" name="fecha" value="<?= $fecha ?? '' ?>">
                                <input type="hidden" name="usuario" value="<?= $id_usuario_seleccionado ?? '' ?>">

                                <textarea name="notas_admin" class="form-control mb-2" rows="2"
                                        placeholder="Escribe notas internas..."><?= $c["notas_admin"] ?? "" ?>
                                </textarea>

                                <button type="submit"
                                        class="btn btn-sm bg-acento text-primario">
                                    Guardar
                                </button>
                            </form>

                            <button class="btn btn-sm bg-secundario ms-auto text-claro" id="btnNotas<?= $c['id_cita'] ?>" onclick="mostrarTextarea(<?= $c['id_cita'] ?>)">
                                Añadir notas
                            </button>
                        </div>

                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <p class="text-center text-fuerte mt-4">No hay citas</p>
            <?php endif; ?>
            </div>

        </div>
        </div> 
    </div>
</div>

<script>
document.getElementById("modoListado").addEventListener("change", () => {
    document.getElementById("formListado").submit();
});

document.getElementById("fechaListado")?.addEventListener("change", () => {
    document.getElementById("formListado").submit();
});

document.getElementById("usuarioListado")?.addEventListener("change", () => {
    document.getElementById("formListado").submit();
});

function mostrarTextarea(id) {
    const form = document.getElementById("formNotas" + id);
    const btn = document.getElementById("btnNotas" + id);

    form.classList.remove("d-none");
    btn.classList.add("d-none");
}
</script>

</body>

<?php include "./includes/footer.php";
?>