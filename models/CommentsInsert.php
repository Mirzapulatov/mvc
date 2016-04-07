<?php

    $msg = "";
    if (!$checker->checkUserName($name)) {
        $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
    }
    if (!$checker->checkString($message, 100, 5000)) {
        $msg = sprintf('%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов. <br/>', Smsg);;
    }
    if (empty($msg)) {
        $add = DB::run()->prepare("INSERT INTO blog_comments (name, message, id_blog, time) VALUES (?, ?, ?, ?)");
        $add->execute(array($name, $message, $id, time()));
        $msg = 'Успешно!';
    }
    return $msg;
