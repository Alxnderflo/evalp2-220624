<?php
// evalp2-220624/views/ejercicio3.php
$resultado = null;
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lado1 = $_POST['lado1'] ?? '';
    $lado2 = $_POST['lado2'] ?? '';
    $lado3 = $_POST['lado3'] ?? '';

    // Validaciones básicas
    if (empty($lado1) || empty($lado2) || empty($lado3)) {
        $errores[] = "Todos los lados son requeridos";
    } elseif (!is_numeric($lado1) || !is_numeric($lado2) || !is_numeric($lado3)) {
        $errores[] = "Todos los lados deben ser valores numéricos";
    } elseif ($lado1 <= 0 || $lado2 <= 0 || $lado3 <= 0) {
        $errores[] = "Todos los lados deben ser valores positivos";
    } else {
        // Convertir a float
        $lado1 = floatval($lado1);
        $lado2 = floatval($lado2);
        $lado3 = floatval($lado3);

        // Verificar desigualdad triangular
        if (($lado1 + $lado2 <= $lado3) ||
            ($lado1 + $lado3 <= $lado2) ||
            ($lado2 + $lado3 <= $lado1)
        ) {
            $errores[] = "Los lados no cumplen con la desigualdad triangular. La suma de dos lados debe ser mayor al tercero.";
        } else {
            // Clasificar el triángulo
            if ($lado1 == $lado2 && $lado2 == $lado3) {
                $tipo = "Equilátero";
                $clase_css = "success";
                $icono = "🔺";
                $descripcion = "Todos los lados son iguales";
            } elseif ($lado1 == $lado2 || $lado1 == $lado3 || $lado2 == $lado3) {
                $tipo = "Isósceles";
                $clase_css = "info";
                $icono = "📐";
                $descripcion = "Dos lados son iguales";
            } else {
                $tipo = "Escaleno";
                $clase_css = "warning";
                $icono = "🔷";
                $descripcion = "Todos los lados son diferentes";
            }

            $resultado = [
                'tipo' => $tipo,
                'clase_css' => $clase_css,
                'icono' => $icono,
                'descripcion' => $descripcion,
                'lados' => [$lado1, $lado2, $lado3]
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - <?php echo APP_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <style>
        /* Estilos generales */
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
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
            margin-bottom: 3rem;
        }

        /* Títulos */
        h1 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }

        .lead {
            color: #5a6c7d;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        /* Card Header */
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 1.5rem;
            border: none;
        }

        .card-header h5,
        .card-header h6 {
            color: white;
            font-weight: 600;
        }

        /* Card con bordes de colores */
        .card.border-success {
            border: 3px solid #28a745 !important;
        }

        .card.border-info {
            border: 3px solid #17a2b8 !important;
        }

        .card.border-warning {
            border: 3px solid #ffc107 !important;
        }

        /* Card Body */
        .card-body {
            padding: 1.5rem;
        }

        /* Formularios */
        .form-label {
            color: #4a5568;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.65rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        /* Botones */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            padding: 0.65rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(102, 126, 234, 0.4);
        }

        /* Alertas */
        .alert-danger {
            border: none;
            border-radius: 10px;
            background: #fee;
            color: #c33;
            border-left: 4px solid #c33;
        }

        .alert-danger h5 {
            color: #c33;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .alert-danger ul {
            padding-left: 1.5rem;
        }

        /* Resultado del triángulo */
        .triangle-result {
            transition: all 0.3s ease;
        }

        .triangle-result:hover {
            transform: scale(1.02);
        }

        .triangle-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            animation: bounce 2s ease infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Tipos de triángulos */
        .triangle-type {
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .triangle-type:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: scale(1.05);
        }

        .triangle-type .triangle-icon {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }

        .triangle-type h6 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .triangle-type small {
            color: #6c757d;
        }

        /* Badges */
        .badge {
            border-radius: 6px;
            padding: 0.5rem 0.75rem;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .badge.bg-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%) !important;
        }

        /* Listas en cards */
        .card-body ul {
            padding-left: 1.5rem;
            color: #4a5568;
            line-height: 1.8;
        }

        .card-body ul li {
            margin-bottom: 0.25rem;
        }

        .card-body ul li strong {
            color: #2c3e50;
        }

        /* Texto centrado en cards */
        .card-body.text-center h3 {
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .card-body.text-center h5 {
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .card-body.text-center .text-muted {
            color: #6c757d !important;
            font-size: 0.95rem;
        }

        /* Sección de lados ingresados */
        .mt-4 h6 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container.mt-5 {
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 1.25rem;
            }

            .triangle-icon {
                font-size: 3rem;
            }

            .triangle-type .triangle-icon {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><?php echo APP_NAME; ?></a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo BASE_URL; ?>dashboard">← Volver al Dashboard</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>logout">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Ejercicio 3: Clasificación de Triángulos</h1>
        <p class="lead">Ingresa las longitudes de los tres lados para clasificar el triángulo</p>

        <?php if (!empty($errores)): ?>
            <div class="alert alert-danger">
                <h5>Errores encontrados:</h5>
                <ul class="mb-0">
                    <?php foreach ($errores as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="row">
            <!-- Formulario -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ingresar Lados del Triángulo</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="lado1" class="form-label">Lado 1</label>
                                        <input type="number" step="any" class="form-control" id="lado1" name="lado1"
                                            value="<?php echo $_POST['lado1'] ?? ''; ?>" required min="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="lado2" class="form-label">Lado 2</label>
                                        <input type="number" step="any" class="form-control" id="lado2" name="lado2"
                                            value="<?php echo $_POST['lado2'] ?? ''; ?>" required min="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="lado3" class="form-label">Lado 3</label>
                                        <input type="number" step="any" class="form-control" id="lado3" name="lado3"
                                            value="<?php echo $_POST['lado3'] ?? ''; ?>" required min="0.01">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Clasificar Triángulo</button>
                        </form>
                    </div>
                </div>

                <!-- Información de tipos -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="mb-0">Tipos de Triángulos</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="triangle-type">
                                    <div class="triangle-icon">🔺</div>
                                    <h6>Equilátero</h6>
                                    <small class="text-muted">3 lados iguales</small>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="triangle-type">
                                    <div class="triangle-icon">📐</div>
                                    <h6>Isósceles</h6>
                                    <small class="text-muted">2 lados iguales</small>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="triangle-type">
                                    <div class="triangle-icon">🔷</div>
                                    <h6>Escaleno</h6>
                                    <small class="text-muted">0 lados iguales</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resultado -->
            <div class="col-md-6">
                <?php if ($resultado): ?>
                    <div class="card triangle-result border-<?php echo $resultado['clase_css']; ?>">
                        <div class="card-header bg-<?php echo $resultado['clase_css']; ?> text-white">
                            <h5 class="card-title mb-0">Resultado</h5>
                        </div>
                        <div class="card-body text-center">
                            <div class="triangle-icon"><?php echo $resultado['icono']; ?></div>
                            <h3 class="text-<?php echo $resultado['clase_css']; ?>">
                                <?php echo $resultado['tipo']; ?>
                            </h3>
                            <p class="lead"><?php echo $resultado['descripcion']; ?></p>

                            <div class="mt-4">
                                <h6>Lados ingresados:</h6>
                                <div class="row">
                                    <div class="col-4">
                                        <span class="badge bg-secondary">Lado 1: <?php echo $resultado['lados'][0]; ?></span>
                                    </div>
                                    <div class="col-4">
                                        <span class="badge bg-secondary">Lado 2: <?php echo $resultado['lados'][1]; ?></span>
                                    </div>
                                    <div class="col-4">
                                        <span class="badge bg-secondary">Lado 3: <?php echo $resultado['lados'][2]; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="triangle-icon">📏</div>
                            <h5>Ingresa los lados del triángulo</h5>
                            <p class="text-muted">El sistema clasificará el tipo de triángulo según las longitudes de sus lados</p>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Reglas de validación -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="mb-0">Reglas de Validación</h6>
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>Los lados deben ser números positivos</li>
                            <li>Deben cumplir la <strong>desigualdad triangular</strong>:</li>
                            <ul>
                                <li>a + b > c</li>
                                <li>a + c > b</li>
                                <li>b + c > a</li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>