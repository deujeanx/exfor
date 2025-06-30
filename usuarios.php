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
                <form action="" method="GET">
                    <div class="col d-flex">
                        <input placeholder="Buscar por nombre" type="text" name="nombreBuscar" class="me-1 form-control">
                        <input type="submit" value="Buscar" class="btn btn-primary">
                    </div>                    
                </form>
            </div>
            <div class="col-8 text-center mt-4 bg-secondary p-2 rounded border">
                <div class="col p-2 bg-secondary-subtle">
                    <?php
                    
                    include_once "conexion.php";

                    // Envia parametros de busqueda a la api y toma el resultado

                    if(isset($_GET['nombreBuscar'])){

                        $busquedaUrl = $_GET['nombreBuscar'];
                        $usuarios = json_decode(file_get_contents("http://localhost/exfor/api_usuario.php?nombre=".$busquedaUrl), true);

                    } else {

                        $usuarios = json_decode(file_get_contents("http://localhost/exfor/api_usuario.php"), true);

                    }
                    
                    if(empty($usuarios)){

                        echo "No se encontraron usuarios";

                    }

                    // Imprime los resultados de la api

                    foreach ($usuarios as $usuario) {

                        ?>

                            <div class="col-12 mt-2 rounded bg-info d-flex justify-content-between">
                                <div class="col mt-3"><?php echo $usuario['nombre']; ?></div>
                                <div class="col mt-3"><?php echo $usuario['apellido']; ?></div>
                                <div class="col mt-3"><?php echo $usuario['edad']; ?></div>
                                <a href="agregarProyecto.php?id_usuario=<?php echo $usuario['id']; ?>&nombre=<?php echo $usuario['nombre'];?>" class="text-white m-2 btn btn-primary">Añadir a proyecto</a>
                                <a href="verProyectos.php?id_usuario=<?php echo $usuario['id'];?>" class="text-white m-2 btn btn-warning">Ver proyectos</a>
                                <a href="eliminarUsuario.php?id_usuario=<?php echo $usuario['id'];?>" class="text-white m-2 btn btn-danger">Eliminar usuario</a>
                            </div>

                        <?php

                    }

                    ?>
                </div>
                <a class="btn mt-2 btn-success text-white" href="registro.php">Registrar</a>
                <a class="btn mt-2 btn-success text-white" href="index.php">Volver</a>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>