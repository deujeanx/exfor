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
                    <div class="form-floating mb-3">
                        <input type="text" name="id_usuario" class="form-control" id="floatingInput" value="<?php echo $_GET['id_usuario']; ?>" readonly>
                        <label for="floatingInput">ID usuario a agregar</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="nombre" class="form-control" id="floatingInput" value="<?php echo $_GET['nombre']; ?>" readonly>
                        <label for="floatingInput">Nombre de usuario</label>
                    </div>
                    <div class="col d-flex">
                        
                        <input type="text" name="nombreBuscar" placeholder="Buscar por nombre" class="me-1 form-control">
                        <input type="submit" value="Buscar" class="btn btn-primary">
                    </div>                    
                </form>
                <span class="text-danger">
                    <?php
                    
                    if (isset($_GET['message'])){

                        echo "El usuario ya esta en este proyecto";

                    }

                    ?>
                </span>
            </div>
            <div class="col-8 text-center mt-4 bg-secondary p-2 rounded border">
                <div class="col p-2 bg-secondary-subtle">
                    <?php
                    
                    include_once "conexion.php";

                    $usuario = $_GET['id_usuario'];

                    // detecta si hay una busqueda y resive los proyectos de la api

                    if(isset($_GET['nombreBuscar'])){

                        $busquedaUrl = $_GET['nombreBuscar'];
                        $proyectos = json_decode(file_get_contents("http://localhost/exfor/api_proyecto.php?nombreProyecto=".$busquedaUrl), true);

                    } else {

                        $proyectos = json_decode(file_get_contents("http://localhost/exfor/api_proyecto.php"), true);

                    }
                    
                    if(empty($proyectos)){

                        echo "No se encuentran proyectos";

                    }

                    // imprime los proyectos

                    foreach ($proyectos as $proyecto) {

                        ?>

                            <div class="col-12 mt-2 rounded bg-info d-flex justify-content-between">
                                <div class="col-1 mt-3"><?php echo $proyecto['id_proyecto']; ?></div>
                                <div class="col-5 mt-3"><?php echo $proyecto['nombreProyecto']; ?></div>
                                <a href="proyecto_a_usuario.php?id_proyecto=<?php echo $proyecto['id_proyecto'];?>&id_usuario=<?php echo $usuario; ?>&nombreUsuario=<?php echo $_GET['nombre']?>" class="text-white m-2 btn btn-primary">Añadi a este proyecto</a>
                            </div>

                        <?php

                    }

                    ?>
                </div>
                <a class="btn mt-2 btn-success text-white" href="usuarios.php">Volver</a>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>