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
    <style>
        /* Variables de color */
        :root {
            --primary-dark: #0a58ca;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --card-shadow-hover: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Estilos generales */
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar mejorado */
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.3rem;
        }

        /* Container principal */
        .container.mt-5 {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Títulos */
        h1 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .lead {
            color: #5a6c7d;
            font-size: 1.1rem;
        }

        /* Cards mejoradas */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .card-text {
            color: #6c757d;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        /* Botones mejorados */
        .btn-primary {
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container.mt-5 {
                padding: 1.5rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><?php echo APP_NAME; ?></a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">Hola, <?php echo $_SESSION['user']; ?></span>
                <a class="nav-link" href="<?php echo BASE_URL; ?>logout">Cerrar Sesión</a>
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
                        <a href="<?php echo BASE_URL; ?>ejercicio2" class="btn btn-primary">Ir al ejercicio</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ejercicio 3</h5>
                        <p class="card-text">Clasificación de triángulos</p>
                        <a href="<?php echo BASE_URL; ?>ejercicio3" class="btn btn-primary">Ir al ejercicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>