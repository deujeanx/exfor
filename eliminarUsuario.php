<?php

include_once "conexion.php";

// Elimina usuario

$usuario = $_GET['id_usuario'];

$conexion -> query("DELETE FROM usuario WHERE id=$usuario");

header("Location: usuarios.php");

?>