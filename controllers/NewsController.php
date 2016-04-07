<?php

include_once(ROOT . '/models/Navigation.php');
include_once(ROOT . '/models/Verify.php');

class NewsController
{

    public function actionList($page)
    {
        $nav = new Navigation();
        $ver = new Checker();
        $pagex = $page-1;
        $listCount = 3;
        $result = DB::run()->query("SELECT * FROM news ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
        $count = DB::run()->query("SELECT * FROM news")->rowCount();

        include_once (ROOT.'/views/index.php');
    }

    public function actionView($id)
    {
        DB::run()->query("UPDATE news SET views = views+1 WHERE id = $id");
        $result = DB::run()->query("SELECT * FROM news WHERE id = $id");
        $getNews = $result->fetch();
        include_once (ROOT.'/views/News.php');
    }

}