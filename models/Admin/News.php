<?php
if ($protect) {
    switch ($case) {
        /**
         * show records news
         */
        default:
            $pagex = $case-1;
            $listCount = 30; //records per page
            $query = DB::run()->query("SELECT * FROM news ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
            $count = DB::run()->query("SELECT * FROM news")->columnCount();

            break;
        /**
         * create record of news
         */
        case 'create':
            if(!empty($_POST)) {
                $msg = "";
                if (!$checker->stringLength($_POST['title'], 20, 300)) {
                    $msg = sprintf('%s Ошибка заголовка.Заголовок должен состоять из 20-300 символов. <br/>', Smsg);
                }
                if (!$checker->stringLength($_POST['text'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', Smsg);
                }
                if (empty($msg)) {
                    $add = DB::run()->prepare("INSERT INTO news (title, text, time) VALUES (?, ?, ?)");
                    $add->execute(array($_POST['title'], $_POST['text'], time()));
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
                    $msg = sprintf('%s Ошибка заголовка.Заголовок должен состоять из 20-300 символов. <br/>', Smsg);
                }
                if (!$checker->stringLength($_POST['text'], 100, 5000)) {
                    $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', Smsg);
                }
                if (empty($msg)) {
                    $add = DB::run()->prepare("UPDATE news SET title = ?, text = ?, time = ? WHERE id = ?");
                    $add->execute(array($_POST['title'], $_POST['text'], time(), $id));
                    $msg = 'Успешно!';
                }
            }
            $query = DB::run()->query("SELECT * FROM news WHERE id = $id");
            $news = $query->fetch();
            $availability = $query->rowCount();
            break;
        /**
         * delete record of news
         */
        case 'delete':
            $query = DB::run()->query("SELECT * FROM news WHERE id = $id");
            $availability = $query->rowCount();
            if($availability) {
                if ($ok) {
                    DB::run()->query("Delete FROM news WHERE id = $id");
                }
            }

    }
}
