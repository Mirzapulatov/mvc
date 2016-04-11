<?php
$msg = "";
if(!$checker->checkUserName($name)) {
    $msg = 'Ошибка имени. Имя должно состоять из латинских символов, а так же в диапазоне от 3 до 20 символов. <br/>';
}
if(!$checker->checkEmail($email)){
    $msg = sprintf("%s Ошибка почты. Образец: name@domain.com <br/>", $msg);
}
if(!$checker->checkSite($website)){
    $msg = sprintf("%s Ошибка сайта. Образец http://domain.com<br/>", $msg);
}
if(!$checker->stringLength($message, 100, 5000)){
    $msg = sprintf("%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов.<br/>", $msg);
}
if(empty($msg)){
    $add = DB::run()->prepare("INSERT INTO mails (name, email, site, message) VALUES (?, ?, ?, ?)");
    $add->execute(array($name, $email, $website, $message));
    $msg = "Успешно!";
}
return $msg;