<?php
if ($protect) {
    switch ($case) {
        /**
         * show records of blog_comments
         */
        default:

            $pagex = $case-1;
            $listCount = 30; //records per page
            $query = DB::run()->query("SELECT * FROM blog_comments WHERE id_blog = $idblog ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
            $count = DB::run()->query("SELECT * FROM blog_comments WHERE id_blog = $idblog")->columnCount();

            break;
        /**
         * create record of blog_comments
         */
        case 'create':
            if(!empty($_POST)) {
                $msg = "";
                if (!$checker->checkUserName($_POST['name'])) {
                    $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
                }
                if (!$checker->stringLength($_POST['message'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', Smsg);
                }
                if (empty($msg)) {
                    $add = DB::run()->prepare("INSERT INTO blog_comments (name, message, id_blog, time) VALUES (?, ?, ?, ?)");
                    $add->execute(array($_POST['name'], $_POST['message'], $idblog, time()));
                    $msg = 'Успешно!';
                }
                //return $msg;
            }
            break;
        /**
         * update record of blog_comments
         */
        case 'update':
            if(!empty($_POST)) {
                $msg = "";
                if (!$checker->checkUserName($_POST['name'])) {
                    $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
                }
                if (!$checker->stringLength($_POST['message'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', Smsg);
                }
                if (empty($msg)) {
                    $add = DB::run()->prepare("UPDATE blog_comments SET name = ?, message = ?, time = ? WHERE id = ?");
                    $add->execute(array($_POST['name'], $_POST['message'], time(), $id));
                    $msg = 'Успешно!';
                }
            }
            $query = DB::run()->query("SELECT * FROM blog_comments WHERE id = $id");
            $blogComments = $query->fetch();
            $availability = $query->rowCount();
            break;
        /**
         * delete record of blog_comments
         */
        case 'delete':
            $query = DB::run()->query("SELECT * FROM blog_comments WHERE id = $id");
            $availability = $query->rowCount();
            if($availability) {
                if ($ok) {
                    DB::run()->query("Delete FROM blog_comments WHERE id = $id");
                }
            }

    }
}
