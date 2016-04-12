<?php

include_once(ROOT . '/models/Navigation.php');
include_once(ROOT . '/models/Checker.php');

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
        $result = DB::run()->query("SELECT * FROM news ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
        $count = DB::run()->query("SELECT * FROM news")->rowCount();

        include_once(ROOT . '/views/news/index.php');
    }

    /**
     * view one news
     * @param $id id of news
     */
    public function actionView($id)
    {
        $verif = strripos($_SESSION['newsView'], "|$id|");
        if ($verif === false) { // If id is not found, then add view
            DB::run()->query("UPDATE news SET views = views+1 WHERE id = $id");
            $_SESSION['newsView'] .= "|$id|";
        }
        $result = DB::run()->query("SELECT * FROM news WHERE id = $id");
        $getNews = $result->fetch();
        $checker = new Checker();
        include_once(ROOT . '/views/news/News.php');
    }

}