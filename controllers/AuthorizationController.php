<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 18.04.16
 * Time: 11:44
 */
namespace controllers;

class AuthorizationController
{

    public function actionIndex()
    {
        if(isset($_POST)) {
            $msg = $this->validate($_POST['AdminName'], $_POST['AdminPassword']);
        }
        include_once (ROOT."/views/auth/Auth.php");
    }

    public function actionLogout()
    {
        unset($_SESSION['Admin']);
        header("Location: /");
    }

    private function validate($name,$password)
    {
        $msg = "";
        if($name == \Registry::getConfig('AdminName') && $password == \Registry::getConfig('AdminPassword')){ //check of admin name and password
            $_SESSION['Admin'] = true; //initialization admin
            header("Location: /admin");
        }else{
            $msg = 'Введенные данные не валидны!<br/>';
        }
        return $msg;
    }
}