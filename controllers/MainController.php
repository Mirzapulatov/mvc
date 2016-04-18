<?php
namespace controllers;

class MainController
{
    public function actionMain()
    {
       include_once (ROOT."/views/site/index.php");
    }
}