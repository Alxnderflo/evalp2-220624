<?php
// evalp2-220624/index.php
require_once 'includes/config.php';

// Router básico
$url = $_GET['url'] ?? 'login';

// Verificar autenticación
$publicRoutes = ['login', 'auth'];
if (!isset($_SESSION['user']) && !in_array($url, $publicRoutes)) {
    header('Location: /evalp2-220624/login');
    exit;
}

// Routing
switch ($url) {
    case 'login':
        include 'views/login.php';
        break;
    case 'auth':
        include 'includes/auth.php';
        break;
    case 'dashboard':
        include 'views/dashboard.php';
        break;
    case 'logout':
        include 'includes/logout.php';
        break;
    case 'ejercicio2':
        include 'views/ejercicio2.php';
        break;
    case 'ejercicio3':
        include 'views/ejercicio3.php';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Página no encontrada';
        break;
}
?>