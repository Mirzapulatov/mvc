<?php
if ($protect) {
    switch ($case) {
        /**
         * show records blog
         */
        default:
            $pagex = $case-1;
            $listCount = 30; //records per page
            $query = DB::run()->query("SELECT * FROM blog ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
            $count = DB::run()->query("SELECT * FROM blog")->columnCount();

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
                    $msg = sprintf('%s Ошибка заголовка.Заголовок должен состоять из 20-300 символов. <br/>', Smsg);
                }
                if (!$checker->stringLength($_POST['text'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', Smsg);
                }
                if (empty($msg)) {
                    $add = DB::run()->prepare("INSERT INTO blog (title, author, text, time) VALUES (?, ?, ?, ?)");
                    $add->execute(array($_POST['title'], $_POST['author'], $_POST['text'], time()));
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
                    $msg = sprintf('%s Ошибка заголовка.Заголовок должен состоять из 20-300 символов. <br/>', Smsg);
                }
                if (!$checker->stringLength($_POST['text'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', Smsg);
                }
                if (empty($msg)) {
                    $add = DB::run()->prepare("UPDATE blog SET title = ?, author = ?, text = ?, time = ? WHERE id = ?");
                    $add->execute(array($_POST['title'], $_POST['author'], $_POST['text'], time(), $id));
                    $msg = 'Успешно!';
                }
            }
            $query = DB::run()->query("SELECT * FROM blog WHERE id = $id");
            $blog = $query->fetch();
            $availability = $query->rowCount();
            break;
        /**
         * delete record of blog
         */
        case 'delete':
            $query = DB::run()->query("SELECT * FROM blog WHERE id = $id");
            $availability = $query->rowCount();
            if($availability) {
                if ($ok) {
                    DB::run()->query("Delete FROM blog WHERE id = $id");
                }
            }

    }
}
