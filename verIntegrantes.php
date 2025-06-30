<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXFOR</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <header class="container-fluid bg-success">
        <div class="row">
            <a href="index.php" class="col text-decoration-none">
                <h1 class="text-white">EXFOR S.A.S</h1>
            </a>
        </div>
    </header>
    <section class="container">
        <div class="row d-flex justify-content-center mt-2">
            <div class="col-8">
                <form action="" method="POST">
                    <div class="col d-flex">
                        <input type="text" placeholder="Buscar por nombre" name="nombreBuscar" class="me-1 form-control">
                        <input type="submit" value="Buscar" class="btn btn-primary">
                    </div>                    
                </form>
            </div>
            <div class="col-8 text-center mt-4 bg-secondary p-2 rounded border">
                <div class="col p-2 bg-secondary-subtle">
                    <?php
                    
                    include_once "conexion.php";

                    $proyecto = $_GET['id_proyecto'];

                    // Hace la busqueda en la base de datos 

                    if(isset($_POST['nombreBuscar'])){

                        $busqueda = $_POST['nombreBuscar'];
                        $consulta = $conexion -> query("SELECT id, nombre, apellido, edad FROM usuario INNER JOIN usuario_proyecto on usuario_proyecto.id_usuario=usuario.id where usuario_proyecto.id_proyecto=$proyecto and usuario.nombre like '%$busqueda%'");

                    } else {

                        $consulta = $conexion -> query("SELECT id, nombre, apellido, edad FROM usuario INNER JOIN usuario_proyecto on usuario_proyecto.id_usuario=usuario.id where usuario_proyecto.id_proyecto=$proyecto;");

                    }
                    
                    if($consulta->num_rows==0){

                        echo "No se encuentran participantes";

                    } else {

                        // Imprime los resultados de la consulta a la base de datos

                        while($row=$consulta->fetch_array()){

                            ?>

                                <div class="col-12 mt-2 rounded bg-info d-flex justify-content-between">
                                    <div class="col mt-3"><?php echo $row['nombre']; ?></div>
                                    <div class="col mt-3"><?php echo $row['apellido']; ?></div>
                                    <a href="eliminarIntegrante.php?id_usuario=<?php echo $row['id'];?>&id_proyecto=<?php echo $proyecto;?>" class="text-white m-2 btn btn-danger">Eliminar del proyecto</a>
                                </div>

                            <?php

                        }  

                    }

                    ?>
                </div>
                <a class="btn mt-2 btn-success text-white" href="proyectos.php">Volver</a>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>