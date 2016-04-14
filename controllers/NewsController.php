<?php
include_once(ROOT . '/models/Navigation.php');
include_once(ROOT . '/models/Checker.php');
include_once(ROOT . '/models/News.php');

use models;

class NewsController
{
    /**
     * @param int $page page of news
     */
    public function actionList($page)
    {
        $nav = new Navigation();
        $checker = new Checker();
        $pagex = $page-1;
        $listCount = 3;
        $newsModel = new models\News();
        $result = $newsModel->listRecord($listCount,$pagex);
        $count = $newsModel->total();
        include_once(ROOT . '/views/news/index.php');
    }

    /**
     * view one news
     * @param $id id of news
     */
    public function actionView($id)
    {
        $newsModel = new models\News();
        $verif = strripos($_SESSION['newsView'], "|$id|");
        if ($verif === false) { // If id is not found, then add view
            $newsModel->increase(array('views'),1, '+', 'id = '.$id);
            $_SESSION['newsView'] .= "|$id|";
        }
        $result = $newsModel->getOne($id);
        $getNews = $result->fetch();
        $checker = new Checker();
        include_once(ROOT . '/views/news/News.php');
    }

}