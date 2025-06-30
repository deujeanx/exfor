<?php

include_once "conexion.php";

// Elimina un integrante de un proyecto

$usuario = $_GET['id_usuario'];
$proyecto = $_GET['id_proyecto'];

$conexion -> query ("DELETE FROM usuario_proyecto WHERE id_usuario=$usuario and id_proyecto=$proyecto");

header("Location: verIntegrantes.php?id_proyecto=$proyecto");

?>