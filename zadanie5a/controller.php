<?php
require_once 'init.php';

switch ($action) {
    case 'calcCompute':
        include_once $conf->root_path.'/app/calc/CreditController.class.php';
        $ctrl = new \calc\CreditController();
        $ctrl->process();
        break;
    case 'loginPage':
        include_once $conf->root_path.'/app/security/AuthController.class.php';
        $ctrl = new \security\AuthController();
        $ctrl->generateView();
        break;
    case 'login':
        include_once $conf->root_path.'/app/security/AuthController.class.php';
        $ctrl = new \security\AuthController();
        $ctrl->process();
        break;
    case 'logout':
        include_once $conf->root_path.'/app/security/AuthController.class.php';
        $ctrl = new \security\AuthController();
        $ctrl->logout();
        break;
    default:
        include_once $conf->root_path.'/app/calc/CreditController.class.php';
        $ctrl = new \calc\CreditController();
        $ctrl->generateView();
}