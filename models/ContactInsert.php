<?php
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
if(!$checker->checkString($_POST['message'], 100, 5000)){
    $msg = sprintf("%s Ошибка сообщения. Сообщение должно состоять из 100-5000 символов.<br/>", $msg);
}
if(empty($msg)){
    $add = DB::run()->prepare("INSERT INTO mails (name, email, site, message) VALUES (?, ?, ?, ?)");
    $add->execute(array($_POST['name'], $_POST['email'], $_POST['website'], $_POST['message']));
    $msg = "Успешно!";
}
return $msg;