<?php

header("Content-Type: application/json");
include_once "conexion.php";

$usuario = [];

// resive la busqueda y manda los usuarios que coincidan

if(isset($_GET['nombre'])){

    $busqueda = $_GET['nombre'];

    $consulta   = $conexion->query("SELECT * FROM usuario WHERE nombre LIKE '%$busqueda%'");

} else {

    $consulta   = $conexion->query("SELECT * FROM usuario");

}

while ($row=$consulta->fetch_array()){

    $usuario[] = $row;

}

echo json_encode($usuario);

?>