<?php
namespace controllers;
class AboutController
{
    public function actionIndex()
    {
        include_once(ROOT . "/views/about/index.php");
    }
}