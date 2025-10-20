<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?php echo APP_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <style>
        /* Estilos generales del login */
        .login-body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        /* Card de login mejorada */
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 3rem 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        /* Imagen del login */
        .login-image {
            width: 80px;
            height: 80px;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }

        /* Título */
        h2 {
            color: #2c3e50;
            font-weight: 700;
            font-size: 1.8rem;
        }

        /* Formulario */
        .form-label {
            color: #4a5568;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        /* Botón mejorado */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 0.85rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }

        /* Alerta mejorada */
        .alert-danger {
            border: none;
            border-radius: 10px;
            background: #fee;
            color: #c33;
            border-left: 4px solid #c33;
        }

        /* Espaciado */
        .mb-3 {
            margin-bottom: 1.5rem !important;
        }

        .mb-4 {
            margin-bottom: 2rem !important;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-card {
                padding: 2rem 1.5rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            .login-image {
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>
<body class="login-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-card">
                    <div class="text-center mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" 
                             alt="Icono de ejercicios" class="login-image">
                        <h2 class="mt-3">Iniciar Sesión</h2>
                    </div>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                    <?php endif; ?>
                    
                    <form method="POST" action="<?php echo BASE_URL; ?>auth">
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>