<?php
namespace controllers;

use models;
use services\change as change;
use services\navigation as nav;
use services\validation as valid;

class ContactsController extends Controller
{
    /**
     * Add message from administration
     */
    public function actionIndex()
    {
        if (!empty($_POST)) {
            $msg = $this->insert($_POST['name'], $_POST['email'], $_POST['message']);
        }
        require_once(ROOT . "/views/contacts/Contacts.php");
    }

    /**
     * @param string $name name user
     * @param string $email email user
     * @param string $website website user
     * @param string $message message user
     * @return mixed
     */
    private function insert($name, $email, $message)
    {
        $msg = $this->verify($name, $email, $message);
            if (empty($msg)) {
                $contactsModel = new models\Contacts();
                $contactsModel->create(array('name', 'email', 'message', 'time'), array($name, $email, $message, time()));
                $msg = "Успешно!";
        }
        return $msg;
    }

    public function actionView($id)
    {
        $this->accessAdmin();
        $contactsModel = new models\Contacts();
        $query = $contactsModel->getOne($id);
        $contacts = $query->fetch();
        $availability = $query->rowCount();
        $change = new change\ChangeString();
        include_once(ROOT . '/views/contacts/View.php');
    }

    public function actionCrud($page = 1)
    {
        $this->accessAdmin();
        $pagex = $page - 1;
        $listCount = 30; //records per page
        $contactsModel = new models\Contacts();
        $query = $contactsModel->listRecord($listCount, $pagex);
        $count = $contactsModel->total();
        $change = new change\ChangeString();

        $nav = new nav\Paginator();
        $pagination = $nav->leafThrough('admin/contacts', $page, $count, $listCount);
        include_once(ROOT . "/views/contacts/CRUD.php");
    }


    public function actionUpdate($id)
    {
        $this->accessAdmin();
        $contactsModel = new models\Contacts();
        $change = new change\ChangeString();
        if (!empty($_POST)) {
            $msg = $this->verify($_POST['name'], $_POST['email'], $_POST['message']);
            if (empty($msg)) {
                $contactsModel->update(array('name', 'email', 'message'), array($_POST['name'], $_POST['email'], $_POST['message']), 'id = ' . $id);
                $msg = "Успешно!";
            }
        }
        $query = $contactsModel->getOne($id);
        $contacts = $query->fetch();
        $availability = $query->rowCount();
        include_once(ROOT . '/views/contacts/Update.php');
    }

    public function actionDelete($id, $ok = NULL)
    {
        $this->accessAdmin();
        $contactsModel = new models\Contacts();
        $availability = $contactsModel->exist($id);
        if ($availability) {
            if ($ok) {
                $contactsModel->delete($id);
            }
        }
        include_once(ROOT . '/views/contacts/Delete.php');
    }

    private function verify($name, $email, $message)
    {
        $valid = new valid\ValidString();
        $msg = "";
        if (!$valid->checkUserName($name)) {
            $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
        }
        if (!$valid->checkEmail($email)) {
            $msg = sprintf("%s Ошибка почты. Образец: name@domain.com <br/>", $msg);
        }
        if (!$valid->stringLength($message, 100, 5000)) {
            $msg = sprintf("%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов.<br/>", $msg);
        }
        return $msg;
    }
}