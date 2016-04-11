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
    public function actionBlog()
    {
        include_once (ROOT."/views/Admin/AdminBlog.php");
    }
}