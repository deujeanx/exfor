<?php

include_once "conexion.php";

// Ingresa un nuevo proyecto a la base de datos

$nombre = $_POST['nombreProyecto'];
$desc = $_POST['descripcion'];

$conexion -> query("INSERT INTO proyecto(nombreProyecto,descripcion) VALUES ('$nombre','$desc')");

header("Location: index.php");

?>