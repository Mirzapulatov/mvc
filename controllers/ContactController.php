<?php

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
        include_once (ROOT.'/models/Checker.php');
        $checker = new Checker();
        return include_once (ROOT.'/models/ContactInsert.php');
    }
}