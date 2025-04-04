<?php
require_once 'init.php';
use app\security\AuthController;
use app\calc\CreditController;
switch ($action) {
    case 'calcCompute':
        $ctrl = new CreditController();
        $ctrl->process();
        break;
    case 'loginPage':
        $ctrl = new AuthController();
        $ctrl->generateView();
        break;
    case 'login':
        $ctrl = new AuthController();
        $ctrl->process();
        break;
    case 'logout':
        $ctrl = new AuthController();
        $ctrl->logout();
        break;
    default:
        $ctrl = new CreditController();
        $ctrl->generateView();
}