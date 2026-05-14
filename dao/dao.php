<?php
require_once __DIR__ . "/../db/conexion.php";

function insertar_usuario($nombre, $apellido1, $apellido2, $username, $email, $password, $telefono) {
    global $bd;

    $sql = "INSERT INTO usuario 
            (nombre, primer_apellido, segundo_apellido, username, email, password, telefono)
            VALUES (
                '$nombre',
                '$apellido1',
                '$apellido2',
                '$username',
                '$email',
                '$password',
                '$telefono'
            )";

    return mysqli_query($bd, $sql);
}

function existe_email($email) {
    global $bd;

    $sql = "SELECT COUNT(*) AS numeroEmails FROM usuario WHERE email = '$email'";
    $resultado = mysqli_query($bd, $sql);
    $fila = mysqli_fetch_assoc($resultado);

    return $fila["numeroEmails"] > 0;
}

function existe_username($username) {
    global $bd;

    $sql = "SELECT COUNT(*) AS numeroUsernames FROM usuario WHERE username = '$username'";
    $resultado = mysqli_query($bd, $sql);
    $fila = mysqli_fetch_assoc($resultado);

    return $fila["numeroUsernames"] > 0;
}

function validar_login($username, $password) {
    global $bd;

    $sql = "SELECT * FROM usuario WHERE username = '$username' LIMIT 1";
    $resultado = mysqli_query($bd, $sql);
    $usuario = mysqli_fetch_assoc($resultado);

    if (!$usuario) return false;

    if (password_verify($password, $usuario["password"])) {
        return $usuario;
    }

    return false;
}
