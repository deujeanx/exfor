<?php

include_once "conexion.php";

// Ingresa un usuario a la base de datos segun datos ingresados

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];

$conexion -> query("INSERT INTO usuario(nombre, apellido, edad) VALUES ('$nombre','$apellido','$edad')");

header('Location: index.php');

?>