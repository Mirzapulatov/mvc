<?php

include_once(ROOT . '/models/Navigation.php');
include_once(ROOT . '/models/Checker.php');

class BlogController
{

    public function actionList($page)
    {
        /**
         * Blog list
         */
        $nav = new Navigation();
        $ver = new Checker();
        $pagex = $page-1;
        $listCount = 3; //records per page
        $result = DB::run()->query("SELECT * FROM blog ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
        $count = DB::run()->query("SELECT * FROM blog")->rowCount();

        include_once (ROOT.'/views/BlogList.php');
    }

    public function actionView($id,$page)
    {

        /**
         * Blog view
         */
        DB::run()->query("UPDATE blog SET views = views+1 WHERE id = $id");
        $result = DB::run()->query("SELECT * FROM blog WHERE id = $id");
        $getBlog = $result->fetch();

        include_once (ROOT.'/views/BlogView.php');

        include_once (ROOT.'/controllers/CommentsController.php');
        $comments = new CommentsController();
        $comments-> view($id, $page);
    }

}