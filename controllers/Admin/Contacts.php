<?php
if ($protect) {
    switch ($case) {
        /**
         * show records contacts
         */
        default:
            $pagex = $case-1;
            $listCount = 30; //records per page
            $query = $contactsModel->listRecord($listCount, $pagex);
            $count = $contactsModel->total();

            break;
        /**
         * view record of contacts
         */
        case 'view':
            $query = $contactsModel->getOne($id);
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
                if(!$checker->stringLength($_POST['message'], 100, 5000)){
                    $msg = sprintf("%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов.<br/>", $msg);
                }
                if(empty($msg)){
                    $contactsModel->update(array('name','email','message'),array($_POST['name'], $_POST['email'], $_POST['message']), 'id = '.$id);
                    $msg = "Успешно!";
                }
            }
            $query = $contactsModel->getOne($id);
            $contacts = $query->fetch();
            $availability = $query->rowCount();
            break;
        /**
         * delete record of contacts
         */
        case 'delete':
            $availability = $contactsModel->exist($id);
            if($availability) {
                if ($ok) {
                    $contactsModel->delete($id);
                }
            }

    }
}
