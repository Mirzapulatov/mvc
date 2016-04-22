<?php
namespace controllers;
use models;
use services\change as change;
use services\navigation as nav;
use services\validation as valid;

class PortfolioController extends Controller
{
    public function actionIndex()
    {
        $nav = new nav\Paginator();
        $change = new change\ChangeString();

        $portfolioModel = new models\Portfolio();
        $result = $portfolioModel->listRecord(100,0);
        include_once (ROOT."/views/portfolio/index.php");
    }

    public function actionView($id)
    {
        $change = new change\ChangeString();
        $portfolioModel = new models\Portfolio();

        $portfolio = $portfolioModel->getOne($id)->fetch();
        $previous = $portfolioModel->previous($id);
        $next = $portfolioModel->next($id);
        $first = $portfolioModel->first();
        $last = $portfolioModel->last();
        include_once(ROOT . "/views/portfolio/view.php");
    }

    public function actionCrud($page = 1)
    {
        $this->accessAdmin();
        $pagex = $page - 1;
        $listCount = 30; //records per page
        $portfolioModel = new models\Portfolio();
        $query = $portfolioModel->listRecord($listCount, $pagex);
        $count = $portfolioModel->total();
        $change = new change\ChangeString();

        $nav = new nav\Paginator();
        $pagination = $nav->leafThrough('admin/portfolio', $page, $count, $listCount);
        include_once(ROOT . "/views/portfolio/CRUD.php");
    }

    public function actionCreate()
    {
        $this->accessAdmin();
        if (!empty($_POST)) {
            $portfolioModel = new models\Portfolio();
            $msg = $this->verify($_POST['name'], $_POST['opis'], $_FILES['screen']['name']);
            if (empty($msg)) {
                $randu = rand(1000, 9999);
                $ext = explode('.', $_FILES['screen']['name']);
                $ext = strtolower(end($ext));
                $name = time() . '' . $randu . '.' . $ext;
                copy($_FILES['screen']['tmp_name'], ROOT.'/common/files/portfolio/' . $name);
                $portfolioModel->create(array('name','opis','img'), array($_POST['name'], $_POST['opis'], $name));
                $msg = 'Успешно!';
            }
        }
        include_once(ROOT . "/views/portfolio/Create.php");
    }

    public function actionUpdate($id)
    {
        $this->accessAdmin();
        $portfolioModel = new models\Portfolio();
        if (!empty($_POST)) {
            $msg = $this->verify($_POST['name'], $_POST['opis'], $_FILES['screen']['name'], 1);
            if (empty($msg)) {
                if (!empty($_FILES['screen']['name'])) {
                    $randu = rand(1000, 9999);
                    $ext = explode('.', $_FILES['screen']['name']);
                    $ext = strtolower(end($ext));
                    $name = time() . '' . $randu . '.' . $ext;
                    copy($_FILES['screen']['tmp_name'], ROOT . '/common/files/portfolio/' . $name);
                    $portfolioModel->update(array('name', 'opis', 'img'), array($_POST['name'], $_POST['opis'], $name), 'id = ' . $id);
                } else {
                    $portfolioModel->update(array('name', 'opis'), array($_POST['name'], $_POST['opis']), 'id = ' . $id);
                }
                $msg = 'Успешно';
            }
        }
            $change = new change\ChangeString();
        $query = $portfolioModel->getOne($id);
        $portfolio = $query->fetch();
        $availability = $query->rowCount();
        include_once(ROOT . '/views/portfolio/Update.php');
    }

    public function actionDelete($id, $ok = NULL)
    {
        $this->accessAdmin();
        $blogModel = new models\Portfolio();
        $availability = $blogModel->exist($id);
        if ($availability) {
            if ($ok) {
                $blogModel->delete($id);
            }
        }
        include_once(ROOT . '/views/portfolio/Delete.php');
    }

    private function verify($name, $opis, $file, $option = 0)
    {
            $valid = new valid\ValidString();
            $msg = "";
            if (!$valid->stringLength($name, 5, 200)) {
                $msg = 'Ошибка имени. Имя должно быть в диапазоне от 5 до 200 символов. <br/>';
            }
            if (!$valid->stringLength($opis, 20, 3000)) {
                $msg = sprintf('%s Ошибка описания.Описание должено состоять из 20-3000 символов. <br/>', $msg);
            }
            if (empty($file)) {
                if($option!=1) {
                    $msg = sprintf('%s Не выбран скриншот. <br/>', $msg);
                }
            } else {
                $GetExt = array('bmp', 'gif', 'jpeg', 'jpg', 'png');
                $ext = explode('.', $file);
                $ext = strtolower(end($ext));
                if (!preg_match('#([a-z0-9-_]{1,32})#i', $file)) {
                    $msg = sprintf('%s Не верное имя скриншота. <br/>', $msg);
                }
                if ($_FILES['screen']['size'] > 1024 * 2 * 1024) {
                    $msg = sprintf('%s Скриншот не более 2 мб!. <br/>', $msg);
                }
                if (preg_match('/(.php|.pl|.htaccess)/i', $file) || !in_array(strtolower($ext), $GetExt)) {
                    $msg = sprintf('%s Не верный формат скриншота. <br/>', $msg);
                }
            }
        return $msg;
    }
    
}