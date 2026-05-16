<?php
session_start();
require_once "../dao/dao.php";
require_once "../includes/utils.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    lanzarToast("Método no permitido", "../iniciarSesion.php");
}
global $bd;

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

$usuario = validar_login($username, $password);

if (!$usuario) {
    lanzarToast("Usuario o contraseña incorrectos", "../iniciarSesion.php");
}
$_SESSION["id_usuario"] = $usuario["id_usuario"];
$_SESSION["username"] = $usuario["username"];
$_SESSION["tipo_usuario"] = $usuario["tipo_usuario"];

header("Location: ../misCitas.php");
exit;