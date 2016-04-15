<?php

include_once (ROOT.'/models/Checker.php');
include_once (ROOT.'/models/Contacts.php');

use models as models;

class ContactController
{
    /**
     * Add message from administration
     */
    public function actionView()
    {
        if(!empty($_POST)) {
            $msg = $this->insert($_POST['name'],$_POST['email'],$_POST['message']);
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
    private function insert($name,$email,$message)
    {
        $checker = new Checker();
        if(!empty($_POST)) {
            $msg = "";
            if(!$checker->checkUserName($_POST['name'])) {
                $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
            }
            if(!$checker->checkEmail($_POST['email'])){
                $msg = sprintf("%s Ошибка почты. Образец: name@domain.com <br/>", $msg);
            }
            if(!$checker->stringLength($_POST['message'], 100, 5000)){
                $msg = sprintf("%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов.<br/>", $msg);
            }
            if(empty($msg)){
                $contactsModel = new models\Contacts();
                $contactsModel->create(array('name','email','message','time'),array($_POST['name'], $_POST['email'], $_POST['message'], time()));
                $msg = "Успешно!";
            }
        }
        return $msg;
    }
}