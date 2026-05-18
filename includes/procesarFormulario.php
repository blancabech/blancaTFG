<?php
require_once "../dao/dao.php";
require_once "../includes/utils.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Método no permitido");
    }
    $form = $_POST["formulario"] ?? null;

    switch ($form) {
        case "registrarse":
            procesarRegistro();
            break;
        case "crearCita":
            procesarCrearCita();
            break;
        case "modificarCita":
            procesarModificarCita();
            break;
        case "cancelarCita":
            procesarCancelarCita();
            break;
        case "guardarNotasAdmin":
            procesarGuardarNotasAdmin();
            break;
    }

} catch (Exception $e) {
    lanzarToast("Ha ocurrido un error", "../registrarse.php");
}

//funciones==================================================

function procesarRegistro() {
    global $bd;

    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["primer_apellido"];
    $apellido2 = $_POST["segundo_apellido"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if (existe_email($email)) {
        lanzarToast("El email ya está registrado", "../registrarse.php");
    }
    if (existe_username($username)) {
        lanzarToast("El nombre de usuario ya existe", "../registrarse.php");
    }

    if (!insertar_usuario($nombre, $apellido1, $apellido2, $username, $email, $password, $telefono)) {
        lanzarToast("No se ha podido registrar el usuario", "../registrarse.php");
    }

    // Id recien creado, iniciamos sesion
    $id = mysqli_insert_id($bd);

    session_start();
    $_SESSION["id_usuario"] = $id;
    $_SESSION["username"] = $username;
    header("Location: ../misCitas.php");
    exit;
}

function procesarCrearCita() {
    global $bd;
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $id_usuario = $_SESSION["id_usuario"];
    $fecha = $_POST["fecha"] ?? null;
    $hora = $_POST["hora"] ?? null;
    $duracion = intval($_POST["duracion"] ?? 0);
    $tipo = $_POST["tipo_cita"] ?? null;
    $notas = $_POST["notas_cliente"] ?? "";

    if ($fecha < date("Y-m-d")) {
        lanzarToast("La fecha debe ser futura", "../misCitas.php");
    }

    if ($fecha === date("Y-m-d") && $hora <= date("H:i")) {
        lanzarToast("La hora debe ser futura", "../misCitas.php");
    }

    if (!hora_disponible($fecha, $hora, $duracion)) {
        $_SESSION["form_data"] = $_POST;
        lanzarToast("Esa hora no está disponible", "../misCitas.php");
    }

    if (!insertar_cita($id_usuario, $fecha, $hora, $duracion, $tipo, $notas)) {
        lanzarToast("No se ha podido crear la cita", "../misCitas.php");
    }

    lanzarToastVerde("Cita creada correctamente", "../misCitas.php");
}

function procesarModificarCita() {
    global $bd;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $id_usuario = $_SESSION["id_usuario"];
    $id_cita = (int) $_POST["id_cita"];
    $fecha = $_POST["fecha"] ?? null;
    $hora = $_POST["hora"] ?? null;
    $duracion = (int) ($_POST["duracion"] ?? 0);

    if ($fecha < date("Y-m-d")) {
        lanzarToast("La fecha debe ser futura", "../misCitas.php");
    }

    if ($fecha === date("Y-m-d") && $hora <= date("H:i")) {
        lanzarToast("La hora debe ser futura", "../misCitas.php");
    }

    if (!hora_disponible($fecha, $hora, $duracion)) {
        $_SESSION["form_data_modificar"] = $_POST;
        lanzarToast("Esa hora no está disponible", "../misCitas.php");
    }

    if (!actualizar_cita($id_cita, $fecha, $hora, $duracion)) {
        lanzarToast("No se ha podido modificar la cita", "../misCitas.php");
    }

    lanzarToastVerde("Cita modificada correctamente", "../misCitas.php");
}

function procesarCancelarCita() {
    global $bd;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $id_usuario = $_SESSION["id_usuario"];
    $id_cita = (int) ($_POST["id_cita"] ?? 0);

    if (!cancelar_cita($id_cita, $id_usuario)) {
        lanzarToast("No se ha podido cancelar la cita", "../misCitas.php");
    }

    lanzarToastVerde("Cita cancelada correctamente", "../misCitas.php");
}

function procesarGuardarNotasAdmin() {
    $id_cita = $_POST["id_cita"];
    $notas = $_POST["notas_admin"];
    $modo = $_POST["modo"];
    $fecha = $_POST["fecha"];
    $usuario = $_POST["usuario"];

    // Construir parámetros GET para volver al mismo estado
    $parametros = "?modo=$modo";

    if ($modo === "dia") {
        $parametros .= "&fecha=$fecha";
    }

    if ($modo === "usuario") {
        $parametros .= "&usuario=$usuario";
    }

    if (guardar_notas_admin($id_cita, $notas)) {
        lanzarToastVerde("Notas guardadas correctamente", "../administrador.php$parametros");
    } else {
        lanzarToast("Error al guardar las notas", "../administrador.php$parametros");
    }
}