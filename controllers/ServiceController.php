<?php
namespace controllers;
class ServiceController
{
    public function actionIndex()
    {
        include_once (ROOT."/views/service/index.php");
    }

    public function actionMobile()
    {
        include_once (ROOT."/views/service/mobile.php");
    }

    public function actionSupport()
    {
        include_once (ROOT."/views/service/support.php");
    }

    public function actionWeb()
    {
        include_once (ROOT."/views/service/web.php");
    }

    public function actionSeo()
    {
        include_once (ROOT."/views/service/seo.php");
    }
}