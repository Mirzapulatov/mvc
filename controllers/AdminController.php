<?php

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
        include_once (ROOT."/models/Checker.php");
        $checker = new Checker();
        include_once (ROOT."/models/Navigation.php");
        $nav = new Navigation();

        $protect = true; // protect from user
        include_once (ROOT."/models/Admin/Blog.php");
        include_once (ROOT."/views/Admin/AdminBlog.php");
    }

    public function actionNews($case,$id,$ok)
    {
        include_once (ROOT."/models/Checker.php");
        $checker = new Checker();
        include_once (ROOT."/models/Navigation.php");
        $nav = new Navigation();

        $protect = true; // protect from user
        include_once (ROOT."/models/Admin/News.php");
        include_once (ROOT."/views/Admin/AdminNews.php");
    }
}