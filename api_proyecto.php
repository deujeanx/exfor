<?php

header("Content-Type: application/json");
include_once "conexion.php";

$proyectos = [];

// resive la busqueda y manda los proyectos que coincidan

if(isset($_GET['nombreProyecto'])){

    $busqueda = $_GET['nombreProyecto'];
    $consulta = $conexion -> query("SELECT * FROM proyecto WHERE nombreProyecto LIKE '%$busqueda%'");

} else {

    $consulta = $conexion -> query("SELECT * FROM proyecto");

}

while($row=$consulta->fetch_array()){

    $proyectos[] = $row;

}

echo json_encode($proyectos);

?>