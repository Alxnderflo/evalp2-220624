<?php
// evalp2-carnet/includes/auth.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === VALID_USERNAME && $password === VALID_PASSWORD) {
        $_SESSION['user'] = $username;
        $_SESSION['login_time'] = time();
        header('Location: ' . BASE_URL . 'dashboard');
        exit;
    } else {
        $_SESSION['error'] = 'Credenciales incorrectas';
        header('Location: ' . BASE_URL . 'login');
        exit;
    }
}
?>