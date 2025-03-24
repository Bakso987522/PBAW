<?php
require_once dirname(__FILE__) . '/../../config.php';
require_once _ROOT_PATH . '/app/security/AuthController.php';

$controller = new AuthController();
$isLogged = $controller->isLogged();
if (basename($_SERVER['REQUEST_URI']) === 'login.php' && $isLogged) {
    header("Location: " . _APP_URL . "/index.php");
    exit();
}
?>
