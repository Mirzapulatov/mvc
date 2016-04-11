<?php

class AdminController
{
    public function actionIndex()
    {
        if($_SESSION['AdminName'] == AdminName && $_SESSION['AdminPassword'] == AdminPassword){
            include_once (ROOT."/views/Admin/AdminIndex.php");
        }else{
            include_once (ROOT."/models/Admin/Auth.php");
            include_once (ROOT."/views/Admin/AdminAuth.php");
        }
    }
    public function actionBlog($case,$id,$ok)
    {
        include_once (ROOT."/models/Checker.php");
        $checker = new Checker();
        $protect = true;
        include_once (ROOT."/models/Admin/Blog.php");
        include_once (ROOT."/views/Admin/AdminBlog.php");
    }
}