<?php

include_once "conexion.php";

// Saca a un integrande de un proyecto

$proyecto = $_GET['id_proyecto'];

$conexion->query("DELETE FROM proyecto WHERE id_proyecto=$proyecto");

header("Location: proyectos.php");

?>