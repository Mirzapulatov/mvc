<?php
if ($protect) {
    switch ($case) {
        /**
         * show records news
         */
        default:
            $pagex = $case-1;
            $listCount = 30; //records per page
            $query = $newsModel->listRecord($listCount,$pagex);
            $count = $newsModel->total();
            //echo $count;

            break;
        /**
         * create record of news
         */
        case 'create':
            if(!empty($_POST)) {
                $msg = "";
                if (!$checker->stringLength($_POST['title'], 20, 300)) {
                    $msg = sprintf('%s Ошибка заголовка.Заголовок должен состоять из 20-300 символов. <br/>', $msg);
                }
                if (!$checker->stringLength($_POST['text'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', $msg);
                }
                if (empty($msg)) {
                    $newsModel->create(array('title','text','time'), array($_POST['title'], $_POST['text'], time()));
                    $msg = 'Успешно!';
                }
                //return $msg;
            }
            break;
        /**
         * update record of news
         */
        case 'update':
            if(!empty($_POST)) {
                $msg = "";
                if (!$checker->stringLength($_POST['title'], 20, 300)) {
                    $msg = sprintf('%s Ошибка заголовка.Заголовок должен состоять из 20-300 символов. <br/>', $msg);
                }
                if (!$checker->stringLength($_POST['text'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', $msg);
                }
                if (empty($msg)) {
                    $newsModel->update(array('title','text','time'), array($_POST['title'], $_POST['text'],time()) , 'id = '.$id);
                    $msg = 'Успешно!';
                }
            }
            $query = $newsModel->getOne($id);
            $news = $query->fetch();
            $availability = $query->rowCount();
            break;
        /**
         * delete record of news
         */
        case 'delete':
            $availability = $newsModel->exist($id);
            if($availability) {
                if ($ok) {
                    $newsModel->delete($id);
                }
            }

    }
}
