<?php

if ($protect) {
    switch ($case) {
        /**
         * show records blog
         */
        default:
            $pagex = $case-1;
            $listCount = 30; //records per page
            $query = $blogModel->listRecord($listCount,$pagex);
            $count = $blogModel->total();

            break;
        /**
         * create record of blog
         */
        case 'create':
            if(!empty($_POST)) {
                $msg = "";
                if (!$checker->checkUserName($_POST['author'])) {
                    $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
                }
                if (!$checker->stringLength($_POST['title'], 20, 300)) {
                    $msg = sprintf('%s Ошибка заголовка.Заголовок должен состоять из 20-300 символов. <br/>', $msg);
                }
                if (!$checker->stringLength($_POST['text'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', $msg);
                }
                if (empty($msg)) {
                    $blogModel->create(array('title','author','text','time'), array($_POST['title'], $_POST['author'], $_POST['text'], time()));
                    $msg = 'Успешно!';
                }
                //return $msg;
            }
            break;
        /**
         * update record of blog
         */
        case 'update':
            if(!empty($_POST)) {
                $msg = "";
                if (!$checker->checkUserName($_POST['author'])) {
                    $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
                }
                if (!$checker->stringLength($_POST['title'], 20, 300)) {
                    $msg = sprintf('%s Ошибка заголовка.Заголовок должен состоять из 20-300 символов. <br/>', $msg);
                }
                if (!$checker->stringLength($_POST['text'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', $msg);
                }
                if (empty($msg)) {
                    $blogModel->update(array('title','author','text','time'), array($_POST['title'], $_POST['author'], $_POST['text'], time()), 'id = '.$id);
                    $msg = 'Успешно!';
                }
            }
            $query = $blogModel->getOne($id);
            $blog = $query->fetch();
            $availability = $query->rowCount();
            break;
        /**
         * delete record of blog
         */
        case 'delete':
            $availability = $blogModel->exist($id);
            if($availability) {
                if ($ok) {
                    $blogModel->delete($id);
                }
            }

    }
}
