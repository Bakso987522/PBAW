<?php

use Smarty\Smarty;

require_once dirname(__FILE__) . '/../../config.php';
require_once _ROOT_PATH . '/app/security/AuthController.php';
require_once _ROOT_PATH . '/lib/smarty/Smarty.class.php';
require_once _ROOT_PATH . '/app/security/check.php';
$smarty = new Smarty();
if (isset($_POST['login']) && isset($_POST['pass'])) {
    $controller = new AuthController();
    $controller->process();
}
if (isset($_GET['messages'])) {
    $messages = json_decode($_GET['messages'], true);
    $smarty->assign('messages', $messages);
}
$smarty->setTemplateDir(_ROOT_PATH . '/templates/');


$smarty->assign('login_page', true);
$smarty->assign('page_title', "Logowanie");
$smarty->display('main.tpl');


