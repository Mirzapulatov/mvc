<?php
include_once (ROOT.'/models/Checker.php');
include_once (ROOT.'/models/Navigation.php');

class CommentsController
{
    public function view($id,$page)
    {
        if(!empty($_POST)) {
            $msg = $this->insert($_POST['name'], $_POST['message'], $id);
        }

        $pagex = $page-1;
        $listCount = 7; //records per page

        $result = DB::run()->query("SELECT * FROM blog_comments WHERE id_blog = $id ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
        $count = DB::run()->query("SELECT * FROM blog_comments WHERE id_blog = $id")->rowCount();

        $nav = new Navigation();
        $checker = new Checker();

        include_once ROOT.'/views/Comments.php';
    }
    private function insert($name, $message, $id)
    {
        include_once (ROOT.'/models/Checker.php');
        $checker = new Checker();
        return include_once (ROOT.'/models/CommentsInsert.php');
    }
}