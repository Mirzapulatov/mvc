<?php

include_once(ROOT . '/models/Navigation.php');
include_once(ROOT . '/models/Checker.php');
include_once(ROOT . '/models/Blog.php');

use models;

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
        $blogModel = new models\Blog();
        $result = $blogModel->listRecord($listCount, $pagex);
        $count = $blogModel->total();

        include_once(ROOT . '/views/blog/BlogList.php');
    }

    /**
     * Blog view
     */
    public function actionView($id,$page)
    {
        $blogModel = new models\Blog();
        $verif = strripos($_SESSION['blogView'], "|$id|"); // search BlogId in string
        if ($verif === false) { // If id is not found, then add view
            $blogModel->increase(array('views'), 1,'+', 'id ='. $id);
            $_SESSION['blogView'] .= "|$id|";
        }
        $result = $blogModel->getOne($id);
        $getBlog = $result->fetch();
        $checker = new Checker();
        include_once(ROOT . '/views/blog/BlogView.php');

        include_once (ROOT.'/controllers/CommentsController.php');
        $comments = new CommentsController();
        $comments-> view($id, $page);
    }

}