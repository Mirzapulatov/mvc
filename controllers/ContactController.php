<?php

class ContactController
{
    public function actionView()
    {
        if(!empty($_POST)) {
            $msg = $this->insert($_POST['name'],$_POST['email'],$_POST['website'],$_POST['message']);
        }
        require_once (ROOT."/views/Contacts.php");
    }

    private function insert($name,$email,$website,$message)
    {
        include_once (ROOT.'/models/Checker.php');
        $checker = new Checker();
        return include_once (ROOT.'/models/ContactInsert.php');
    }
}