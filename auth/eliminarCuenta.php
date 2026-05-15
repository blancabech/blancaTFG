<?php
session_start();
require_once "../dao/dao.php";

eliminar_usuario($_SESSION["id_usuario"]);

session_unset();
session_destroy();
header("Location: ../index.php");
exit;