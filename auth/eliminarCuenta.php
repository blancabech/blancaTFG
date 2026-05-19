<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../index.php");
    exit;
}

require_once "../dao/dao.php";

eliminar_citas_usuario($_SESSION["id_usuario"]);
eliminar_usuario($_SESSION["id_usuario"]);

session_unset();
session_destroy();
header("Location: ../index.php");
exit;