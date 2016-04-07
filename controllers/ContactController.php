<?php

class ContactController
{

    public function actionView()
    {
        require_once(ROOT . '/models/Checker.php');

        if(!empty($_POST)) {
            $this->insert();
        }
        require_once (ROOT."/views/Contacts.php");
    }

    private function insert()
    {
        include_once (ROOT.'/models/Checker.php');
        $checker = new Checker();
        return include_once (ROOT.'/models/CommentsInsert.php');
    }
}