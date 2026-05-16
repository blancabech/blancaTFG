
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

function formatear_fecha($fecha) {
    $meses = [
        "01" => "enero",
        "02" => "febrero",
        "03" => "marzo",
        "04" => "abril",
        "05" => "mayo",
        "06" => "junio",
        "07" => "julio",
        "08" => "agosto",
        "09" => "septiembre",
        "10" => "octubre",
        "11" => "noviembre",
        "12" => "diciembre"
    ];

    $cifras = explode("-", $fecha);
    $anio = $cifras[0];
    $mes = $meses[$cifras[1]];
    $dia = $cifras[2];

    return "$dia $mes $anio";
}