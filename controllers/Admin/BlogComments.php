<?php
if ($protect) {
    switch ($case) {
        /**
         * show records of bcomments
         */
        default:

            $pagex = $case-1;
            $listCount = 30; //records per page
            $query = $commentsModel->listRecord($listCount,$pagex,'id_blog ='.$idblog);
            $count = $commentsModel->total('id_blog = '.$idblog);

            break;
        /**
         * create record of bcomments
         */
        case 'create':
            if(!empty($_POST)) {
                $msg = "";
                if (!$checker->checkUserName($_POST['name'])) {
                    $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
                }
                if (!$checker->stringLength($_POST['message'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', $msg);
                }
                if (empty($msg)) {
                    $commentsModel->create(array('name','message','id_blog','time'),array($_POST['name'], $_POST['message'], $idblog, time()));
                    $msg = 'Успешно!';
                }
                //return $msg;
            }
            break;
        /**
         * update record of bcomments
         */
        case 'update':
            if(!empty($_POST)) {
                $msg = "";
                if (!$checker->checkUserName($_POST['name'])) {
                    $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
                }
                if (!$checker->stringLength($_POST['message'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', $msg);
                }
                if (empty($msg)) {
                    $commentsModel->update(array('name','message','id_blog','time'),array($_POST['name'], $_POST['message'], $idblog, time()),'id = '.$id);

                    $msg = 'Успешно!';
                }
            }
            $query = $commentsModel->getOne($id);
            $blogComments = $query->fetch();
            $availability = $query->rowCount();

            break;
        /**
         * delete record of bcomments
         */
        case 'delete':
            $availability = $commentsModel->exist($id);
            if($availability) {
                if ($ok) {
                    $commentsModel->delete($id);
                }
            }

    }
}
