<?php
namespace controllers;

use models;
use services\change as change;
use services\navigation as nav;
use services\validation as valid;

class CommentsController extends Controller
{
    /**
     * @param int $id id of blog
     * @param int $page
     */
    public function view($id, $page)
    {
        if (!empty($_POST)) { //POST if there is, then add record
            $msg = $this->insert($_POST['name'], $_POST['message'], $id);
        }

        $pagex = $page - 1;
        $listCount = 7; //records per page
        $commentsModel = new models\Comments();
        $result = $commentsModel->listRecord($listCount, $pagex, 'id_blog = ' . $id);
        $count = $commentsModel->total($id);

        $change = new change\ChangeString();
        $nav = new nav\Paginator();
        $pagination = $nav->leafThrough('admin/blog', $page, $count, $listCount);

        include_once ROOT . '/views/comments/Comments.php';
    }

    private function insert($name, $message, $idblog)
    {
        $msg = $this->verify($_POST['name'], $_POST['message']);
        if (empty($msg)) {
            $commentsModel = new models\Comments();
            $commentsModel->create(array('name', 'message', 'id_blog', 'time'), array($name, $message, $idblog, time()));
            $msg = 'Успешно!';
        }
        return $msg;
    }

    /**
     * add record comments
     * @param string $name
     * @param string $message
     * @param int $id
     * @return mixed
     */

    private function verify($name, $message)
    {
        $valid = new valid\ValidString();
        $msg = "";
        if (!$valid->checkUserName($name)) {
            $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
        }
        if (!$valid->stringLength($message, 100, 5000)) {
            $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', $msg);
        }
        return $msg;
    }

    public function actionCrud($idblog, $page = 1)
    {
        $this->accessAdmin();
        $pagex = $page - 1;
        $listCount = 30; //records per page
        $commentsModel = new models\Comments();
        $query = $commentsModel->listRecord($listCount, $pagex, 'id_blog =' . $idblog);
        $count = $commentsModel->total('id_blog = ' . $idblog);

        $change = new change\ChangeString();
        $nav = new nav\Paginator();
        $pagination = $nav->leafThrough('admin/blog', $page, $count, $listCount);
        include_once(ROOT . "/views/comments/CRUD.php");
    }

    public function actionCreate($idblog)
    {
        if (!empty($_POST)) {
            $msg = $this->verify($_POST['name'], $_POST['message']);
            if (empty($msg)) {
                $commentsModel = new models\Comments();
                $commentsModel->create(array('name', 'message', 'id_blog', 'time'), array($_POST['name'], $_POST['message'], $idblog, time()));
                $msg = 'Успешно!';
            }
        }
        include_once(ROOT . "/views/comments/Create.php");
    }

    public function actionUpdate($idblog, $id)
    {
        $this->accessAdmin();
        $commentsModel = new models\Comments();
        if (!empty($_POST)) {
            $msg = $this->verify($_POST['name'], $_POST['message']);
            if (empty($msg)) {
                $commentsModel->update(array('name', 'message', 'id_blog', 'time'), array($_POST['name'], $_POST['message'], $idblog, time()), 'id = ' . $id);
                $msg = 'Успешно!';
            }
        }
        $change = new change\ChangeString();
        $query = $commentsModel->getOne($id);
        $blogComments = $query->fetch();
        $availability = $query->rowCount();
        include_once(ROOT . "/views/comments/Update.php");
    }

    public function actionDelete($idblog, $id, $ok = NULL)
    {
        $this->accessAdmin();
        $commentsModel = new models\Comments();
        $availability = $commentsModel->exist($id);
        if ($availability) {
            if ($ok) {
                $commentsModel->delete($id);
            }
        }
        include_once(ROOT . "/views/comments/Delete.php");
    }
}