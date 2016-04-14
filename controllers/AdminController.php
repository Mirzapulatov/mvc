<?php

use models;

include_once (ROOT."/models/Navigation.php");
include_once (ROOT."/models/Checker.php");


/**
 * Class AdminController
 * Admin Panel
 */
class AdminController
{
    public function actionIndex()
    {
        if($_SESSION['Admin']) {
            // Admin home page
            include_once (ROOT."/views/Admin/AdminIndex.php");
        }else{
            /**
             * Authorization admin
             */
            include_once(ROOT . "/controllers/Admin/Auth.php");
            include_once (ROOT."/views/Admin/AdminAuth.php");
        }
    }

    /**
     * AdminPanel -> BlogCRUD
     * @param string $case module
     * @param int $id id record
     * @param int $ok delete confirmation
     */
    public function actionBlog($case,$id,$ok)
    {
        if($_SESSION['Admin']) {

            $checker = new Checker();
            $nav = new Navigation();

            $protect = true; // protect from user
            include_once (ROOT."/models/Blog.php");
            $blogModel = new models\Blog();
            include_once(ROOT . "/controllers/Admin/Blog.php");
            include_once(ROOT . "/views/Admin/AdminBlog.php");
        }
    }

    /**
     * AdminPanel -> BlogCommentsCRUD
     * @param int $idblog id of blog
     * @param string $case module
     * @param int $id id record
     * @param int $ok delete confirmation
     */
    public function actionComments($idblog, $case, $id, $ok)
    {
        if($_SESSION['Admin']) {
            $checker = new Checker();
            $nav = new Navigation();

            $protect = true; // protect from user
            include_once (ROOT."/models/Comments.php");
            $commentsModel = new models\Comments();
            include_once(ROOT . "/controllers/Admin/BlogComments.php");
            include_once(ROOT . "/views/Admin/AdminBlogComments.php");
        }
    }
    /**
     * AdminPanel -> NewsCRUD
     * @param string $case module
     * @param int $id id record
     * @param int $ok delete confirmation
     */
    public function actionNews($case,$id,$ok)
    {
        if($_SESSION['Admin']) {
            $checker = new Checker();
            $nav = new Navigation();

            $protect = true; // protect from user
            include_once (ROOT."/models/News.php");
            $newsModel = new models\News();
            include_once(ROOT . "/controllers/Admin/News.php");
            include_once(ROOT . "/views/Admin/AdminNews.php");
        }
    }

    /**
     * AdminPanel -> ContactsRUD
     * @param string $case module
     * @param int $id id record
     * @param int $ok delete confirmation
     */
    public function actionContacts($case,$id,$ok)
    {
        if($_SESSION['Admin']) {
            $checker = new Checker();
            $nav = new Navigation();

            $protect = true; // protect from user
            include_once (ROOT."/models/Contacts.php");
            $contactsModel = new models\Contacts();
            include_once(ROOT . "/controllers/Admin/Contacts.php");
            include_once(ROOT . "/views/Admin/AdminContacts.php");
        }
    }

    /**
     * AdminPanel -> ContactsRUD
     * @param string $case module
     * @param int $id id record
     * @param int $ok delete confirmation
     */
    public function actionPortfolio($case,$id,$ok)
    {
        if($_SESSION['Admin']) {
            $checker = new Checker();
            $nav = new Navigation();

            $protect = true; // protect from user
            include_once (ROOT."/models/Portfolio.php");
            $portfolioModel = new models\Portfolio();
            include_once(ROOT . "/controllers/Admin/Portfolio.php");
            include_once(ROOT . "/views/Admin/AdminPortfolio.php");
        }
    }
}