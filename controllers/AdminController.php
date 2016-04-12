<?php
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
        if($_SESSION['AdminName'] == AdminName && $_SESSION['AdminPassword'] == AdminPassword){
            // Admin home page
            include_once (ROOT."/views/Admin/AdminIndex.php");
        }else{
            /**
             * Authorization admin
             */
            include_once (ROOT."/models/Admin/Auth.php");
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
        $checker = new Checker();
        $nav = new Navigation();

        $protect = true; // protect from user
        include_once (ROOT."/models/Admin/Blog.php");
        include_once (ROOT."/views/Admin/AdminBlog.php");
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
        $checker = new Checker();
        $nav = new Navigation();

        $protect = true; // protect from user
        include_once (ROOT."/models/Admin/BlogComments.php");
        include_once (ROOT."/views/Admin/AdminBlogComments.php");
    }
    /**
     * AdminPanel -> NewsCRUD
     * @param string $case module
     * @param int $id id record
     * @param int $ok delete confirmation
     */
    public function actionNews($case,$id,$ok)
    {
        $checker = new Checker();
        $nav = new Navigation();

        $protect = true; // protect from user
        include_once (ROOT."/models/Admin/News.php");
        include_once (ROOT."/views/Admin/AdminNews.php");
    }

    /**
     * AdminPanel -> ContactsRUD
     * @param string $case module
     * @param int $id id record
     * @param int $ok delete confirmation
     */
    public function actionContacts($case,$id,$ok)
    {
        $checker = new Checker();
        $nav = new Navigation();

        $protect = true; // protect from user
        include_once (ROOT."/models/Admin/Contacts.php");
        include_once (ROOT."/views/Admin/AdminContacts.php");
    }
}