<?php
if ($protect) {
    switch ($case) {
        /**
         * show records contacts
         */
        default:
            $pagex = $case-1;
            $listCount = 30; //records per page
            $query = DB::run()->query("SELECT * FROM contacts ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
            $count = DB::run()->query("SELECT * FROM contacts")->columnCount();

            break;
        /**
         * view record of contacts
         */
        case 'view':
            $query = DB::run()->query("SELECT * FROM contacts WHERE id = $id");
            $contacts = $query->fetch();
            $availability = $query->rowCount();
            break;
        /**
         * delete record of contacts
         */
        /**
         * update record of contacts
         */
        case 'update':
            if(!empty($_POST)) {
                $msg = "";
                if(!$checker->checkUserName($_POST['name'])) {
                    $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
                }
                if(!$checker->checkEmail($_POST['email'])){
                    $msg = sprintf("%s Ошибка почты. Образец: name@domain.com <br/>", $msg);
                }
                if(!$checker->checkSite($_POST['website'])){
                    $msg = sprintf("%s Ошибка сайта. Образец http://domain.com<br/>", $msg);
                }
                if(!$checker->stringLength($_POST['message'], 100, 5000)){
                    $msg = sprintf("%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов.<br/>", $msg);
                }
                if(empty($msg)){
                    $add = DB::run()->prepare("UPDATE contacts SET name = ?, email = ?, site = ?, message = ?, time = ? WHERE id = ?");
                    $add->execute(array($_POST['name'], $_POST['email'], $_POST['website'], $_POST['message'], time(), $id));
                    $msg = "Успешно!";
                }
            }
            $query = DB::run()->query("SELECT * FROM contacts WHERE id = $id");
            $contacts = $query->fetch();
            $availability = $query->rowCount();
            break;
        /**
         * delete record of contacts
         */
        case 'delete':
            $query = DB::run()->query("SELECT * FROM contacts WHERE id = $id");
            $availability = $query->rowCount();
            if($availability) {
                if ($ok) {
                    DB::run()->query("Delete FROM contacts WHERE id = $id");
                }
            }

    }
}
