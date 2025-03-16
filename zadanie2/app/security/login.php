<?php
require_once dirname(__FILE__) . '/../../config.php';
require_once _ROOT_PATH . '/app/security/AuthController.php';

$controller = new AuthController();
$controller->process();

