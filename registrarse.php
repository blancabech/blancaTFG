<?php
$title="Registrarse";
$links_css=["https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker.min.css"];
$links_js=["/blancaTFG/public/js/validacionFormularios.js"];
include "./includes/header.php";
include "./includes/navbar.php";
?>
<body>
<div class="contenido">
    <h1 class="text-center text-primario mt-4 mb-4">Registrarse</h1>
    <div class="card shadow px-4 py-4" style="width: 100%;">
        <form id="form-registro" action="registro.php" method="POST" novalidate>
            <div class="d-flex flex-column flex-md-row gap-4">
                <!-- Columna 1-->
                <div class="d-flex flex-column flex-fill gap-3">
                    <div class="mb-3">
                        <label class="text-fuerte form-label">Nombre</label>
                        <input type="text" class="form-control validar-nombres" name="nombre">
                        <small class="texto-error text-danger d-none"></small>
                    </div>
                    <div class="mb-3">
                        <label class="text-fuerte form-label">Primer apellido</label>
                        <input type="text" class="form-control validar-nombres" name="primer_apellido">
                        <small class="texto-error text-danger d-none"></small>
                    </div>
                    <div class="mb-3">
                        <label class="text-fuerte form-label">Segundo apellido</label>
                        <input type="text" class="form-control validar-nombres" name="segundo_apellido">
                        <small class="texto-error text-danger d-none"></small>
                    </div>
                    <div class="mb-3">
                        <label class="text-fuerte form-label">Fecha de nacimiento</label>
                        <input type="text" class="form-control validar-fecha" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="aaaa-mm-dd">
                        <small class="texto-error text-danger d-none"></small>
                    </div>
                </div>
                <!-- Columna2 -->
                <div class="d-flex flex-column flex-fill gap-3">
                    <div class="mb-3">
                        <label class="text-fuerte form-label">Nombre de usuario</label>
                        <input type="text" class="form-control validar-usuario" name="username">
                        <small class="texto-error text-danger d-none"></small>
                    </div>
                    <div class="mb-3">
                        <label class="text-fuerte form-label">Correo electrónico</label>
                        <input type="email" class="form-control validar-correo" name="email" placeholder="juangomez@gmail.com">
                        <small class="texto-error text-danger d-none"></small>
                    </div>
                    <div class="mb-3">
                        <label class="text-fuerte form-label">Teléfono</label>
                        <input type="text" class="form-control validar-telefono" name="telefono" placeholder="687543456">
                        <small class="texto-error text-danger d-none"></small>
                    </div>
                    <div class="mb-3">
                        <label class="text-fuerte form-label">Contraseña</label>
                        <input type="password" class="form-control validar-contrasenia" name="password">
                        <small class="texto-error text-danger d-none"></small>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-complementario-fuerte text-claro mt-4 py-2 px-4">Registrarse</button>
            </div>
        </form>
        <script>
        document.querySelectorAll("#form-registro input").forEach(input => {
            input.addEventListener("input", function() {
                validarCampo(this);
            });
        });
        </script>
    </div>
</div>
<div class="container-fluid mt-4 mx-0 px-0">
    <div class="row mt-4 mx-0 px-0">
        <div class="mt-4 mx-0 px-0 col-centered">
            <div class="mx-0 px-0 centered fondo-div">
                <p class="pt-4 px-4 text-claro text-center">Completa el formulario y empieza a gestionar tus citas y consultas de forma sencilla.</p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/locales/bootstrap-datepicker.es.min.js"></script>
<script>
$(function() {
    $('#fecha_nacimiento').datepicker({
        format: 'yyyy-mm-dd',
        language: 'es',
        autoclose: true,
        endDate: '0d',
        startDate: '-110y',
        todayHighlight: true,
    })
        .on("changeDate clearDate", function () {
        validarCampo(this);
    });
});
</script>

</body>
<?php include "./includes/footer.php";
?>