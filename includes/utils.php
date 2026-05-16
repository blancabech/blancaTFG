
<?php
function lanzarToast($mensaje, $redireccion) {
    session_start();
    $_SESSION["toast_error"] = $mensaje;
    header("Location: $redireccion");
    exit;
}

function lanzarToastVerde($mensaje, $redireccion) {
    session_start();
    $_SESSION["toast_mensaje"] = $mensaje;
    $_SESSION["toast_tipo"] = "success";
    header("Location: $redireccion");
    exit;
}
