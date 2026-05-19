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

function eliminar_citas_usuario($id) {
    global $bd;
    $sql = "DELETE FROM cita WHERE id_usuario = $id";
    return mysqli_query($bd, $sql);
}

function eliminar_usuario($id) {
    global $bd;
    $sql = "DELETE FROM usuario WHERE id_usuario = $id";
    return mysqli_query($bd, $sql);
}

function hora_disponible($fecha, $hora, $duracion) {
    global $bd;

    $sql = "SELECT hora, duracion FROM cita 
            WHERE fecha = '$fecha' AND estado = 'reservada'";
    $resultado = mysqli_query($bd, $sql);

    $inicioCita = strtotime("$fecha $hora");
    $finCita = $inicioCita + ($duracion * 60);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $inicioOcupada = strtotime($fecha . " " . $fila["hora"]);
        $finOcupada = $inicioOcupada + ($fila["duracion"] * 60);

        if ($inicioCita < $finOcupada && $finCita > $inicioOcupada) {
            return false;
        }
    }

    return true;
}

function insertar_cita($id_usuario, $fecha, $hora, $duracion, $tipo, $notas) {
    global $bd;

    $sql = "INSERT INTO cita (id_usuario, fecha, hora, tipo_cita, duracion, notas_cliente)
            VALUES ('$id_usuario', '$fecha', '$hora', '$tipo', '$duracion', '$notas')";

    return mysqli_query($bd, $sql);
}

function obtener_proximas_citas_usuario($id_usuario) {
    global $bd;

    $hoy = date("Y-m-d");
    $ahora = date("H:i");

    $sql = "SELECT id_cita, fecha, hora, duracion FROM cita
            WHERE id_usuario = $id_usuario AND estado = 'reservada' AND (fecha > '$hoy' OR (fecha = '$hoy' AND hora >= '$ahora'))
            ORDER BY fecha ASC, hora ASC";

    $res = mysqli_query($bd, $sql);

    $citas = [];
    while ($fila = mysqli_fetch_assoc($res)) {
        $citas[] = $fila;
    }

    return $citas;
}

function actualizar_cita($id_cita, $fecha, $hora, $duracion, $id_usuario) {
    global $bd;

    $sql = "UPDATE cita 
            SET fecha = '$fecha', hora = '$hora', duracion = $duracion
            WHERE id_cita = $id_cita AND id_usuario = $id_usuario";

    return mysqli_query($bd, $sql);
}

function cancelar_cita($id_cita, $id_usuario) {
    global $bd;

    $sql = "UPDATE cita 
            SET estado = 'cancelada'
            WHERE id_cita = $id_cita AND $id_usuario = $id_usuario";

    return mysqli_query($bd, $sql);
}

function obtener_citas_dia($fecha) {
    global $bd;

    $sql = "SELECT c.*, u.username, u.email
            FROM cita c
            JOIN usuario u ON c.id_usuario = u.id_usuario
            WHERE c.fecha = '$fecha' AND c.estado = 'reservada'
            ORDER BY c.hora ASC";

    $res = mysqli_query($bd, $sql);

    $citas = [];
    while ($fila = mysqli_fetch_assoc($res)) {
        $citas[] = $fila;
    }

    return $citas;
}

function obtener_todos_los_usuarios() {
    global $bd;

    $sql = "SELECT id_usuario, username, email FROM usuario ORDER BY username ASC";
    $res = mysqli_query($bd, $sql);

    $usuarios = [];
    while ($fila = mysqli_fetch_assoc($res)) {
        $usuarios[] = $fila;
    }

    return $usuarios;
}

function obtener_citas_usuario($id_usuario) {
    global $bd;

    $sql = "SELECT c.*, u.username, u.email
            FROM cita c
            JOIN usuario u ON c.id_usuario = u.id_usuario
            WHERE c.id_usuario = $id_usuario AND c.estado = 'reservada'
            ORDER BY c.fecha ASC, c.hora ASC";

    $res = mysqli_query($bd, $sql);

    $citas = [];
    while ($fila = mysqli_fetch_assoc($res)) {
        $citas[] = $fila;
    }

    return $citas;
}

function guardar_notas_admin($id_cita, $notas) {
    global $bd;

    $notas = mysqli_real_escape_string($bd, $notas);

    $sql = "UPDATE cita 
            SET notas_admin = '$notas'
            WHERE id_cita = $id_cita";

    return mysqli_query($bd, $sql);
}