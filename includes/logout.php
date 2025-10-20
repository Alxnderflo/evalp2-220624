<?php
// evalp2-carnet/includes/logout.php
session_destroy();
header('Location: ' . BASE_URL . 'login');
exit;
?>
