<?php

include_once(ROOT . '/models/Navigation.php');
include_once(ROOT . '/models/Checker.php');

class BlogController
{
    /**
     * Blog list
     */
    public function actionList($page)
    {
        $nav = new Navigation();
        $checker = new Checker();
        $pagex = $page-1;
        $listCount = 3; //records per page
        $result = DB::run()->query("SELECT * FROM blog ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
        $count = DB::run()->query("SELECT * FROM blog")->rowCount();

        include_once(ROOT . '/views/blog/BlogList.php');
    }

    /**
     * Blog view
     */
    public function actionView($id,$page)
    {
        $verif = strripos($_SESSION['blogView'], "|$id|"); // search BlogId in string
        if ($verif === false) { // If id is not found, then add view
            DB::run()->query("UPDATE blog SET views = views+1 WHERE id = $id");
            $_SESSION['blogView'] .= "|$id|";
        }
        $result = DB::run()->query("SELECT * FROM blog WHERE id = $id");
        $getBlog = $result->fetch();
        $checker = new Checker();
        include_once(ROOT . '/views/blog/BlogView.php');

        include_once (ROOT.'/controllers/CommentsController.php');
        $comments = new CommentsController();
        $comments-> view($id, $page);
    }

}