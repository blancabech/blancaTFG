<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$title="Mis citas";
$links_css=["https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker.min.css"];
$links_js=[
    "/blancaTFG/public/js/toast.js",
    "/blancaTFG/public/js/validacionFormularios.js"
];

include "./includes/header.php";
include "./includes/navbar.php";

$toast = null;
if (isset($_SESSION["toast_error"])) {
    $toast = $_SESSION["toast_error"];
    unset($_SESSION["toast_error"]);
}
?>

<body class="bg-secundario">
<div class="contenido">
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="toast" class="toast text-bg-danger" role="alert">
        <div class="toast-body"></div>
    </div>
</div>

<?php if ($toast): ?>
<script>
document.addEventListener("DOMContentLoaded", () => {
    mostrarToast("<?= $toast ?>");
});
</script>
<?php endif; ?>

    <h1 class="text-center text-primario mt-4 mb-4">Mis citas</h1>










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

bloquearSubmitSiErrores("form-registro");
</script>
</div>
</body>
<?php include "./includes/footer.php";
?>