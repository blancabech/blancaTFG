
<?php
function lanzarToast($mensaje, $redireccion) {
    session_start();
    $_SESSION["toast_error"] = $mensaje;
    header("Location: $redireccion");
    exit;
}