<?php

include_once(ROOT . '/models/Navigation.php');
include_once(ROOT . '/models/Verify.php');

class BlogController
{

    public function actionList($page)
    {
        /**
         * Blog list
         */
        $nav = new Navigation();
        //$ver = new Checker();
        $pagex = $page-1;
        $listCount = 3;
        $result = DB::run()->query("SELECT * FROM blog ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
        $count = DB::run()->query("SELECT * FROM blog")->rowCount();

        include_once (ROOT.'/views/BlogList.php');
    }

    public function actionView($id)
    {
        /**
         * Blog view
         */
        DB::run()->query("UPDATE blog SET views = views+1 WHERE id = $id");
        $result = DB::run()->query("SELECT * FROM blog WHERE id = $id");
        $getBlog = $result->fetch();

        /**
         * Blog comments
         */
        $result = DB::run()->query("SELECT * FROM blog_comments WHERE id_blog = $id ORDER BY id DESC ");


        if(!empty($_POST)) {
            $verifer = new Checker();
            $msg = "";
            if (!$verifer->checkUserName($_POST['name'])) {
                $msg .= "Ошибка имени.<br/>";
            }
            if (!$verifer->checkString($_POST['message'], 100, 5000)) {
                $msg .= "Ошибка сообщения.<br/>";
            }
            if (empty($msg)) {
                $add = DB::run()->prepare("INSERT INTO blog_comments (name, message, id_blog, time) VALUES (?, ?, ?, ?)");
                $add->execute(array($_POST['name'], $_POST['message'], $id, time()));
                $msg = "Успешно!";
            }
        }

        include_once (ROOT.'/views/BlogView.php');
    }

}