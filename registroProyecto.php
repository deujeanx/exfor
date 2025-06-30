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
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-6 text-center mt-4 bg-secondary p-2 rounded border text-white">
                <div class="col">
                    <h3>Registra un nuevo proyecto</h3>
                </div>
                <form action="ingresoProyecto.php" method="POST">
                    <input type="text" name="nombreProyecto" placeholder="Nombre del proyecto" class="mt-2 form-control" required>   
                    <input type="text" name="descripcion" placeholder="Descripcion" class="mt-2 form-control" required>
                    <input type="submit" class="btn mt-2 btn-success">
                </form>
            </div>
        </div>
    </section>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>