<?php
session_start();
define('ROOT', dirname(__FILE__));
require_once ROOT . '/components/Router.php';
require_once ROOT . '/models/DB.php';
require_once ROOT . '/config/AdminConfig.php';
require_once ROOT.'/views/header.php';

$router = new Router();
$router->map();

require_once ROOT.'/views/sideBar.php';
require_once ROOT.'/views/footer.php';
?>