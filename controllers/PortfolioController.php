<?php
include_once(ROOT . '/models/Navigation.php');
include_once(ROOT . '/models/Checker.php');

class PortfolioController
{
    public function actionIndex()
    {
        $nav = new Navigation();
        $checker = new Checker();
        include_once (ROOT."/models/portfolio/index.php");
        include_once (ROOT."/views/portfolio/index.php");
    }

    public function actionView($id)
    {

        $checker = new Checker();
        include_once (ROOT."/models/portfolio/view.php");
        include_once(ROOT . "/views/portfolio/view.php");
    }

}