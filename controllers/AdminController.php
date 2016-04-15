<?php
namespace controllers;
use models;
/**
 * Class AdminController
 * Admin Panel
 */
class AdminController //TODO move all unrelated to admin to other controllers
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
            include_once(ROOT . "/controllers/Admin/Auth.php"); //TODO create separate controller for authentication. return redirect response
            include_once (ROOT."/views/Admin/AdminAuth.php");
        }
    }

    /**
     * AdminPanel -> BlogCRUD
     * @param string $case module
     * @param int $id id record
     * @param int $ok delete confirmation
     */
    public function actionBlog($case, $id = NULL, $ok = NULL)
    {
        
        if($_SESSION['Admin']) {
            $checker = new models\Checker();
            $nav = new models\Navigation();

            $protect = true; // protect from user
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
    public function actionComments($idblog, $case, $id = NULL, $ok = NULL)
    {
        if($_SESSION['Admin']) {
            $checker = new models\Checker();
            $nav = new models\Navigation();

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
    public function actionNews($case,$id = NULL,$ok = NULL)
    {
        if($_SESSION['Admin']) {
            $checker = new models\Checker();
            $nav = new models\Navigation();

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
    public function actionContacts($case, $id = NULL, $ok = NULL)
    {
        if($_SESSION['Admin']) {
            $checker = new models\Checker();
            $nav = new models\Navigation();

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
    public function actionPortfolio($case, $id = NULL, $ok = NULL)
    {
        if($_SESSION['Admin']) {
            $checker = new models\Checker();
            $nav = new models\Navigation();

            $protect = true; // protect from user
            include_once (ROOT."/models/Portfolio.php");
            $portfolioModel = new models\Portfolio();
            include_once(ROOT . "/controllers/Admin/Portfolio.php");
            include_once(ROOT . "/views/Admin/AdminPortfolio.php");
        }
    }
}