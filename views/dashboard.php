<?php
// evalp2-220624/views/dashboard.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?php echo APP_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><?php echo APP_NAME; ?></a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">Hola, <?php echo $_SESSION['user']; ?></span>
                <a class="nav-link" href="/evalp2-220624/logout">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Panel Principal</h1>
        <p class="lead">Bienvenido al sistema de evaluación</p>
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ejercicio 2</h5>
                        <p class="card-text">Cálculo de área y volumen de figuras geométricas</p>
                        <a href="/evalp2-220624/ejercicio2" class="btn btn-primary">Ir al ejercicio</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ejercicio 3</h5>
                        <p class="card-text">Clasificación de triángulos</p>
                        <a href="/evalp2-220624/ejercicio3" class="btn btn-primary">Ir al ejercicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>