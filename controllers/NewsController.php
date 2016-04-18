<?php
namespace controllers;
use models;

class NewsController extends Controller
{
    /**
     *
     */
    public function actionList($page = 1)
    {
        //$page = $this->get('page', 1); //TODO think about this
        $nav = new models\Pagination();
        $checker = new models\Checker();
        $pagex = $page - 1;
        $listCount = 3;
        $newsModel = new models\News();
        $result = $newsModel->listRecord($listCount, $pagex);
        $count = $newsModel->total();
        include_once(ROOT . '/views/news/index.php');
    }

    /**
     * view one news
     *
     * @param $id id of news
     */
    public function actionView($id)
    {
        $newsModel = new models\News();
        $verif = @strripos($_SESSION['newsView'], "|$id|");
        if ($verif === false) { // If id is not found, then add view
            $newsModel->increase(['views'], 1, '+', 'id = ' . $id);
            @$_SESSION['newsView'] .= "|$id|";
        }
        $result = $newsModel->getOne($id);
        $getNews = $result->fetch();
        $checker = new models\Checker();
        include_once(ROOT . '/views/news/News.php');
    }

}