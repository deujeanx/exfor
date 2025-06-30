<?php

include_once "conexion.php";

// Ingresa un usuario a un proyecto 

$id_usuario = $_GET['id_usuario'];
$id_proyecto = $_GET['id_proyecto'];
$nombreUsuario = $_GET['nombreUsuario'];
$validacion = true;

$consulta = $conexion -> query("SELECT * FROM usuario_proyecto WHERE id_proyecto=$id_proyecto");


while ($row=$consulta->fetch_array()){

    if($row['id_usuario']==$id_usuario){

        $validacion = false;

    }

}

// Valida si el usuario ya esta en ese proyecto

if($validacion == true){

    $conexion -> query("INSERT INTO usuario_proyecto(id_usuario,id_proyecto) VALUES ('$id_usuario','$id_proyecto')");
    header("Location: usuarios.php");

} else {

    header ("Location: agregarProyecto.php?message=true&id_usuario=$id_usuario&id_proyecto=$id_proyecto&nombre=$nombreUsuario");

}




?>