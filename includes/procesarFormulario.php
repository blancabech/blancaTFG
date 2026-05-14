<?php
require_once "../dao/dao.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Método no permitido");
    }
    $form = $_POST["formulario"] ?? null;

    switch ($form) {
        case "registrarse":
            procesarRegistro();
            break;
        case "iniciarSesion":
            procesarIniciarSesion();
            break;
/*      
        y el de coger cita
*/
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
    $_SESSION["idUsuario"] = $id;
    $_SESSION["username"] = $username;
    header("Location: ../index.php");
    exit;
}


function lanzarToast($mensaje, $redireccion) {
    session_start();
    $_SESSION["toast_error"] = $mensaje;
    header("Location: $redireccion");
    exit;
}

function procesarIniciarSesion() {
    global $bd;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $usuario = validar_login($username, $password);

    if (!$usuario) {
        lanzarToast("Usuario o contraseña incorrectos", "../iniciarSesion.php");
    }

    session_start();
    $_SESSION["idUsuario"] = $usuario["id_usuario"];
    $_SESSION["username"] = $usuario["username"];
    header("Location: ../index.php");
    exit;
}
