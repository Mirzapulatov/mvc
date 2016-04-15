<?php
namespace controllers;
use models;
class CommentsController
{
    /**
     * @param int $id id of blog
     * @param int $page
     */
    public function view($id,$page)
    {
        if(!empty($_POST)) { //POST if there is, then add record
            $msg = $this->insert($_POST['name'], $_POST['message'], $id);
        }

        $pagex = $page-1;
        $listCount = 7; //records per page
        $commentsModel = new models\Comments();
        $result = $commentsModel->listRecord($listCount, $pagex, 'id_blog = '.$id);
        $count = $commentsModel->total($id);

        $nav = new models\Navigation();
        $checker = new models\Checker();

        include_once ROOT . '/views/blog/Comments.php';
    }

    /**
     * add record comments
     * @param string $name
     * @param string $message
     * @param int $id
     * @return mixed
     */

    private function insert($name, $message, $id)
    {
        include_once (ROOT.'/models/Checker.php');
        $checker = new models\Checker();
        $commentsModel = new models\Comments();
        if(!empty($_POST)) {
            $msg = "";
            if (!$checker->checkUserName($name)) {
                $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
            }
            if (!$checker->stringLength($message, 100, 5000)) {
                $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', $msg);
            }
            if (empty($msg)) {
                $commentsModel->create(array('name','message','id_blog','time'),array($name, $message, $id, time()));
                $msg = 'Успешно!';
            }
            return $msg;
        }
    }
}