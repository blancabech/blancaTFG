<?php
$bd = mysqli_connect("localhost", "root", "", "atmsintension");

// Comprobamos si ha habido algún error en la conexión
if (!$bd){
	die ("<b>Imposible conectar con la base de datos</b>");
}
?>