<?php
// evalp2-carnet/views/ejercicio2.php
$resultados = [];
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'] ?? '';
    
    if ($tipo === 'rectangulo') {
        $base = $_POST['base'] ?? '';
        $altura = $_POST['altura'] ?? '';
        
        // Validaciones
        if (empty($base) || empty($altura)) {
            $errores[] = "Todos los campos son requeridos";
        } elseif (!is_numeric($base) || !is_numeric($altura)) {
            $errores[] = "La base y altura deben ser valores numéricos";
        } elseif ($base <= 0 || $altura <= 0) {
            $errores[] = "La base y altura deben ser valores positivos";
        } else {
            // Cálculos
            $area = $base * $altura;
            $perimetro = 2 * ($base + $altura);
            
            $resultados = [
                'tipo' => 'rectangulo',
                'area' => $area,
                'perimetro' => $perimetro,
                'base' => $base,
                'altura' => $altura
            ];
        }
    } 
    elseif ($tipo === 'cilindro') {
        $radio = $_POST['radio'] ?? '';
        $altura = $_POST['altura_cilindro'] ?? '';
        
        // Validaciones
        if (empty($radio) || empty($altura)) {
            $errores[] = "Todos los campos son requeridos";
        } elseif (!is_numeric($radio) || !is_numeric($altura)) {
            $errores[] = "El radio y altura deben ser valores numéricos";
        } elseif ($radio <= 0 || $altura <= 0) {
            $errores[] = "El radio y altura deben ser valores positivos";
        } else {
            // Cálculos
            $area = 2 * M_PI * $radio * ($altura + $radio);
            $volumen = M_PI * pow($radio, 2) * $altura;
            
            $resultados = [
                'tipo' => 'cilindro',
                'area' => $area,
                'volumen' => $volumen,
                'radio' => $radio,
                'altura' => $altura
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
    <title>Ejercicio 2 - <?php echo APP_NAME; ?></title>
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

        /* Título */
        h1 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 2rem;
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

        /* Resultados */
        .bg-light {
            background: linear-gradient(135deg, #e0f7fa 0%, #e1bee7 100%) !important;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }

        .bg-light h6 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .bg-light p {
            color: #4a5568;
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }

        /* Alertas */
        .alert-danger {
            border: none;
            border-radius: 10px;
            background: #fee;
            color: #c33;
            border-left: 4px solid #c33;
        }

        .alert-danger ul {
            padding-left: 1.5rem;
        }

        /* Row spacing */
        .row {
            margin-bottom: 1.5rem;
        }

        .row.mt-4 {
            margin-top: 2rem !important;
        }

        /* Fórmulas card */
        .card-body ul {
            padding-left: 1.5rem;
            color: #4a5568;
            line-height: 1.8;
        }

        .card-body h6 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 0.75rem;
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
        <h1>Ejercicio 2: Cálculo de Área y Volumen</h1>
        
        <?php if (!empty($errores)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errores as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="row">
            <!-- Rectángulo -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Rectángulo</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="tipo" value="rectangulo">
                            <div class="mb-3">
                                <label for="base" class="form-label">Base (b)</label>
                                <input type="number" step="any" class="form-control" id="base" name="base"
                                       value="<?php echo isset($resultados['tipo']) && $resultados['tipo'] === 'rectangulo' ? $resultados['base'] : ''; ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="altura" class="form-label">Altura (h)</label>
                                <input type="number" step="any" class="form-control" id="altura" name="altura"
                                       value="<?php echo isset($resultados['tipo']) && $resultados['tipo'] === 'rectangulo' ? $resultados['altura'] : ''; ?>" required />
                            </div>
                            <button type="submit" class="btn btn-primary">Calcular</button>
                        </form>
                        
                        <?php if (isset($resultados['tipo']) && $resultados['tipo'] === 'rectangulo'): ?>
                            <div class="mt-4 p-3 bg-light rounded">
                                <h6>Resultados:</h6>
                                <p><strong>Área (A = b × h):</strong> <?php echo number_format($resultados['area'], 2); ?></p>
                                <p><strong>Perímetro (P = 2(b + h)):</strong> <?php echo number_format($resultados['perimetro'], 2); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Cilindro -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Cilindro</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="tipo" value="cilindro">
                            <div class="mb-3">
                                <label for="radio" class="form-label">Radio (r)</label>
                                <input type="number" step="any" class="form-control" id="radio" name="radio"
                                       value="<?php echo isset($resultados['tipo']) && $resultados['tipo'] === 'cilindro' ? $resultados['radio'] : ''; ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="altura_cilindro" class="form-label">Altura (h)</label>
                                <input type="number" step="any" class="form-control" id="altura_cilindro" name="altura_cilindro"
                                       value="<?php echo isset($resultados['tipo']) && $resultados['tipo'] === 'cilindro' ? $resultados['altura'] : ''; ?>" required />
                            </div>
                            <button type="submit" class="btn btn-primary">Calcular</button>
                        </form>
                        
                        <?php if (isset($resultados['tipo']) && $resultados['tipo'] === 'cilindro'): ?>
                            <div class="mt-4 p-3 bg-light rounded">
                                <h6>Resultados:</h6>
                                <p><strong>Área (A = 2πr(h + r)):</strong> <?php echo number_format($resultados['area'], 2); ?></p>
                                <p><strong>Volumen (V = πr²h):</strong> <?php echo number_format($resultados['volumen'], 2); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información de fórmulas -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Fórmulas Utilizadas</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Rectángulo:</h6>
                                <ul>
                                    <li>Área: A = b × h</li>
                                    <li>Perímetro: P = 2(b + h)</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Cilindro:</h6>
                                <ul>
                                    <li>Área: A = 2πr(h + r)</li>
                                    <li>Volumen: V = πr²h</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>