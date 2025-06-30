<?php

// Saca un usuario del proyecto segun el proyecto seleccionado

include_once "conexion.php";

$usuario = $_GET['id_usuario'];
$proyecto = $_GET['id_proyecto'];

$conexion -> query ("DELETE FROM usuario_proyecto WHERE id_usuario=$usuario and id_proyecto=$proyecto");

header("Location: verProyectos.php?id_usuario=$usuario");

?>