<?php
namespace controllers;
use models;
class PortfolioController
{
    public function actionIndex()
    {
        $nav = new models\Pagination();
        $checker = new models\Checker();

        $portfolioModel = new models\Portfolio();
        $result = $portfolioModel->listRecord(100,0);
        include_once (ROOT."/views/portfolio/index.php");
    }

    public function actionView($id)
    {

        $checker = new models\Checker();
        $portfolioModel = new models\Portfolio();

        $portfolio = $portfolioModel->getOne($id)->fetch();
        $previous = $portfolioModel->previous($id);
        $next = $portfolioModel->next($id);
        $first = $portfolioModel->first();
        $last = $portfolioModel->last();
        include_once(ROOT . "/views/portfolio/view.php");
    }

}