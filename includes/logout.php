<?php
// evalp2-carnet/includes/logout.php
session_destroy();
header('Location: /evalp2-220624/login');
exit;
?>