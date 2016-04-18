<?php
session_start();
$pageGen = microtime();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

define('ROOT', dirname(__FILE__));
require_once ROOT . '/components/Router.php';
require_once ROOT . '/config/Registry.php';
require_once ROOT . '/config/Config.php';
require_once ROOT . '/views/site/header.php';
require_once ROOT . '/components/autoload.php';

$router = new Router();
$router->map();

require_once ROOT . '/views/site/sideBar.php';
require_once ROOT . '/views/site/footer.php';
?>