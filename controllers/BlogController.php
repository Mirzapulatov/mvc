<?php
namespace controllers;
use models;
/**
 * Class BlogController
 * Show blog for user
 */
class BlogController
{
    /**
     * Blog list
     * @param int $page
     */
    public function actionList($page)
    {
        $nav = new models\Navigation();
        $checker = new models\Checker();

        $pagex = $page-1;
        $listCount = 3; //records per page
        $blogModel = new models\Blog();
        $result = $blogModel->listRecord($listCount, $pagex);
        $count = $blogModel->total();

        include_once(ROOT . '/views/blog/BlogList.php');
    }

    /**
     * view blog
     * @param int $id
     * @param int $page
     */
    public function actionView($id,$page)
    {
        $blogModel = new models\Blog();
        $verif = @strripos($_SESSION['blogView'], "|$id|"); // search BlogId in string
        if ($verif === false) { // If id is not found, then add view
            $blogModel->increase(array('views'), 1,'+', 'id ='. $id);
            @$_SESSION['blogView'] .= "|$id|";
        }
        $result = $blogModel->getOne($id);
        $getBlog = $result->fetch();
        $checker = new models\Checker();
        include_once(ROOT . '/views/blog/BlogView.php');

        include_once (ROOT.'/controllers/CommentsController.php');
        $comments = new CommentsController();
        $comments-> view($id, $page);
    }

}