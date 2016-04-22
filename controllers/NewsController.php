<?php
namespace controllers;
use models;
use services\change as change;
use services\navigation as nav;
use services\validation as valid;

class NewsController extends Controller
{
    /**
     *
     */
    public function actionList($page = 1)
    {
        //$page = $this->get('page', 1); //TODO think about this
        $nav = new nav\Paginator();
        $change = new change\ChangeString();
        $pagex = $page - 1;
        $listCount = 3;
        $newsModel = new models\News();
        $result = $newsModel->listRecord($listCount, $pagex);
        $count = $newsModel->total();
        $pagination = $nav->leafThrough('news', $page, $count, $listCount);
        include_once(ROOT . '/views/news/List.php');
    }

    /**
     * view one news
     *
     * @param $id id of news
     */
    public function actionView($id)
    {
        $newsModel = new models\News();
        $verif = @strripos($_SESSION['newsView'], "|$id|");
        if ($verif === false) { // If id is not found, then add view
            $newsModel->increase(['views'], 1, '+', 'id = ' . $id);
            @$_SESSION['newsView'] .= "|$id|";
        }
        $result = $newsModel->getOne($id);
        $getNews = $result->fetch();
        $change = new change\ChangeString();
        include_once(ROOT . '/views/news/News.php');
    }

    public function actionCrud($page = 1)
    {
        $this->accessAdmin();
        $pagex = $page - 1;
        $listCount = 30; //records per page
        $newsModel = new models\News();
        $query = $newsModel->listRecord($listCount, $pagex);
        $count = $newsModel->total();
        $change = new change\ChangeString();

        $nav = new nav\Paginator();
        $pagination = $nav->leafThrough('admin/News', $page, $count, $listCount);
        include_once(ROOT . "/views/news/CRUD.php");
    }

    public function actionCreate()
    {
        $this->accessAdmin();
        if (!empty($_POST)) {
            $msg = $this->verify($_POST['title'], $_POST['text']);
            if (empty($msg)) {
                $newsModel = new models\News();
                $newsModel->create(array('title','text','time'), array($_POST['title'], $_POST['text'], time()));
                $msg = 'Успешно!';
            }
        }
        include_once(ROOT . "/views/news/Create.php");
    }

    public function actionUpdate($id)
    {
        $this->accessAdmin();
        $newsModel = new models\News();
        if (!empty($_POST)) {
            $msg = $this->verify($_POST['title'], $_POST['text']);
            if (empty($msg)) {
                $newsModel->update(array('title','text','time'), array($_POST['title'], $_POST['text'],time()) , 'id = '.$id);
                $msg = 'Успешно!';
            }
        }
        $change = new change\ChangeString();
        $query = $newsModel->getOne($id);
        $news = $query->fetch();
        $availability = $query->rowCount();
        include_once(ROOT . '/views/news/Update.php');
    }

    public function actionDelete($id, $ok = NULL)
    {
        $this->accessAdmin();
        $newsModel = new models\News();
        $availability = $newsModel->exist($id);
        if ($availability) {
            if ($ok) {
                $newsModel->delete($id);
            }
        }
        include_once(ROOT . '/views/news/Delete.php');
    }


    private function verify($title, $text)
    {
        $valid = new valid\ValidString();
        $msg = "";
        if (!$valid->stringLength($title, 20, 300)) {
            $msg = sprintf('%s Ошибка заголовка.Заголовок должен состоять из 20-300 символов. <br/>', $msg);
        }
        if (!$valid->stringLength($text, 100, 5000)) {
            $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', $msg);
        }
        return $msg;
    }

}