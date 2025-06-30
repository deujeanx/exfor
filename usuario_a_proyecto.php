<?php

include_once "conexion.php";

// Ingresa un usuario a un proyecto segun el proyecto seleccionado

$id_usuario = $_GET['id_usuario'];
$id_proyecto = $_GET['id_proyecto'];
$validacion = true;

$consulta = $conexion -> query("SELECT * FROM usuario_proyecto WHERE id_proyecto=$id_proyecto");

// Valida si el usuario ya esta en este proyecto

while ($row=$consulta->fetch_array()){

    if($row['id_usuario']==$id_usuario){

        $validacion = false;

    }

}

if($validacion == true){

    $conexion -> query("INSERT INTO usuario_proyecto(id_usuario,id_proyecto) VALUES ('$id_usuario','$id_proyecto')");
    header("Location: proyectos.php");

} else {

    header ("Location: agregarIntegrante.php?message=true&id_usuario=$id_usuario&id_proyecto=$id_proyecto");

}




?>