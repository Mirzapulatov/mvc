<?php

define('ROOT', dirname(__FILE__));
require_once ROOT.'/componenеts/Router.php';

$router = new Router();
$router->run();

?>