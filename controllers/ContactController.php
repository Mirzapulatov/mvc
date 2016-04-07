<?php

class ContactController
{

    public function actionView()
    {
        require_once (ROOT.'/models/Verify.php');

        if(!empty($_POST)) {
            $verifer = new Checker();
            $msg = "";
            if(!$verifer->checkUserName($_POST['name'])) {
                $msg .= "Ошибка логина.<br/>";
            }
            if(!$verifer->checkEmail($_POST['email'])){
                $msg .= "Ошибка почты.<br/>";
            }
            if(!$verifer->checkSite($_POST['website'])){
                $msg .= "Ошибка сайта.<br/>";
            }
            if(!$verifer->checkString($_POST['message'], 100, 5000)){
                $msg .= "Ошибка сообщения.<br/>";
            }
            if(empty($msg)){
                $add = DB::run()->prepare("INSERT INTO mails (name, email, site, message) VALUES (?, ?, ?, ?)");
                $add->execute(array($_POST['name'], $_POST['email'], $_POST['website'], $_POST['message']));
                $msg = "Успешно!";
            }
        }
        require_once (ROOT."/views/Contacts.php");
    }

}