<?php
namespace controllers;

use models;
use services\change as change;
use services\navigation as nav;
use services\validation as valid;

/**
 * Class BlogController
 * Show blog for user
 */
class BlogController extends Controller
{
    /**
     * Blog list
     * @param int $page
     */
    public function actionList($page)
    {

        $change = new change\ChangeString();
        $pagex = $page - 1;
        $listCount = 3; //records per page

        $blogModel = new models\Blog();
        $result = $blogModel->listRecord($listCount, $pagex);
        $count = $blogModel->total();

        //Paginaion
        $nav = new nav\Paginator();
        $pagination = $nav->leafThrough('blog', $page, $count, $listCount);

        include_once(ROOT . '/views/blog/BlogList.php');
    }

    /**
     * view blog
     * @param int $id
     * @param int $page
     */
    public function actionView($id, $page)
    {
        $blogModel = new models\Blog();
        $verif = @strripos($_SESSION['blogView'], "|$id|"); // search BlogId in string
        if ($verif === false) { // If id is not found, then add view
            $blogModel->increase(array('views'), 1, '+', 'id =' . $id);
            @$_SESSION['blogView'] .= "|$id|";
        }
        $result = $blogModel->getOne($id);
        $getBlog = $result->fetch();
        $change = new change\ChangeString();
        include_once(ROOT . '/views/blog/BlogView.php');

        include_once(ROOT . '/controllers/CommentsController.php');
        $comments = new CommentsController();
        $comments->view($id, $page);
    }

    public function actionCrud($page = 1)
    {
        $this->accessAdmin();
        $pagex = $page - 1;
        $listCount = 30; //records per page
        $blogModel = new models\Blog();
        $query = $blogModel->listRecord($listCount, $pagex);
        $count = $blogModel->total();
        $change = new change\ChangeString();

        $nav = new nav\Paginator();
        $pagination = $nav->leafThrough('admin/blog', $page, $count, $listCount);
        include_once(ROOT . "/views/blog/CRUD.php");
    }

    public function actionCreate()
    {
        $this->accessAdmin();
        if (!empty($_POST)) {
            $msg = $this->verify($_POST['title'], $_POST['author'], $_POST['text']);
            if (empty($msg)) {
                $blogModel = new models\Blog();
                $blogModel->create(array('title', 'author', 'text', 'time'), array($_POST['title'], $_POST['author'], $_POST['text'], time()));
                $msg = 'Успешно!';
            }
        }
        include_once(ROOT . "/views/blog/Create.php");
    }

    public function actionUpdate($id)
    {
        $this->accessAdmin();
        $blogModel = new models\Blog();
        if (!empty($_POST)) {
            $msg = $this->verify($_POST['title'], $_POST['author'], $_POST['text']);
            if (empty($msg)) {
                $blogModel->update(array('title', 'author', 'text', 'time'), array($_POST['title'], $_POST['author'], $_POST['text'], time()), 'id = ' . $id);
                $msg = 'Успешно!';
            }
        }
        $change = new change\ChangeString();
        $query = $blogModel->getOne($id);
        $blog = $query->fetch();
        $availability = $query->rowCount();
        include_once(ROOT . '/views/blog/Update.php');
    }

    public function actionDelete($id, $ok = NULL)
    {
        $this->accessAdmin();
        $blogModel = new models\Blog();
        $availability = $blogModel->exist($id);
        if ($availability) {
            if ($ok) {
                $blogModel->delete($id);
            }
        }
        include_once(ROOT . '/views/blog/Delete.php');
    }

    private function verify($title, $author, $text)
    {
        $valid = new valid\ValidString();
        $msg = "";
        if (!$valid->checkUserName($author)) {
            $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
        }
        if (!$valid->stringLength($title, 20, 300)) {
            $msg = sprintf('%s Ошибка заголовка.Заголовок должен состоять из 20-300 символов. <br/>', $msg);
        }
        if (!$valid->stringLength($text, 100, 5000)) {
            $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', $msg);
        }
        return $msg;
    }

}