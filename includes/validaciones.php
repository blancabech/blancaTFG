<?php
function validar_nombres(string $nom): ?string
{
    $nom = trim($nom);
    if ($nom === "") {
        return "El campo es obligatorio";
    }
    if (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u', $nom)) {
        return "Solo se permiten letras y espacios";
    }
    return null;
}


function validar_username(string $valor): ?string
{
    $valor = trim($valor);
    if ($valor === "") {
        return "El campo es obligatorio";
    }
    if (!preg_match('/^[A-Za-z0-9_-]{3,20}$/', $valor)) {
        return "Debe tener entre 3 y 20 caracteres. Solo letras, números, guiones y guión bajo";
    }
    return null;
}

function validar_nacimiento(string $valor): ?string
{
    $valor = trim($valor);
    if ($valor === "") {
        return "El campo es obligatorio";
    }

    $cifras = explode("-", $valor);
    $anio = (int) $cifras[0];
    $mes  = (int) $cifras[1];
    $dia  = (int) $cifras[2];

    if (!checkdate($mes, $dia, $anio)) {
        return "La fecha no existe";
    }

    $hoy = date("Y-m-d");
    $fechaIntroducida = $cifras[0] . "-" . $cifras[1] . "-" . $cifras[2];

    if ($fechaIntroducida > $hoy) {
        return "La fecha de nacimiento no puede ser futura";
    }

    if ($anio < date("Y") - 110) {
        return "No puede tener más de 110 años";
    }

    return null;
}

function validar_correo(string $valor): ?string
{
    $valor = trim($valor);
    if ($valor === "") {
        return "El campo es obligatorio";
    }
    if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
        return "Correo electrónico no válido";
    }
    return null;
}

function validar_telefono(string $valor): ?string
{
    $valor = trim($valor);
    if ($valor === "") {
        return "El campo es obligatorio";
    }
    if (!preg_match('/^[0-9]{9}$/', $valor)) {
        return "El teléfono debe tener exactamente 9 dígitos";
    }
    return null;
}

function validar_contrasenia(string $valor): ?string
{
    if ($valor === "") {
        return "El campo es obligatorio";
    }
    if (strlen($valor) < 6) {
        return "La contraseña debe tener mínimo 6 caracteres";
    }
    return null;
}