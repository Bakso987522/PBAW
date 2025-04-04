<?php

$conf->root_path = dirname(__FILE__);
$conf->server_name = $_SERVER['HTTP_HOST'];
$conf->server_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://' . $conf->server_name;
$conf->app_root = '/zadanie5b';
$conf->app_url = $conf->server_url.$conf->app_root;
$conf->action_root = $conf->app_root.'/app/controller.php?action=';
$conf->action_url = $conf->server_url.$conf->action_root;
?>