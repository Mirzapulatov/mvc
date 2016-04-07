<?php

define('ROOT', dirname(__FILE__));
require_once ROOT.'/componenеts/Router.php';
require_once ROOT.'/models/dataBase.php';
require_once ROOT.'/views/header.php';

$router = new Router();
$router->run();

require_once ROOT.'/views/sideBar.php';
require_once ROOT.'/views/footer.php';

?>