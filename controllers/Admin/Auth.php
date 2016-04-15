<?php
$msg = "";
if($_POST['AdminName'] == \Registry::getConfig('AdminName') && $_POST['AdminPassword'] == \Registry::getConfig('AdminPassword')){ //check of admin name and password
    $_SESSION['Admin'] = true; //initialization admin
    header("Location: ");
}else{
    $msg = 'Введенные данные не валидны!<br/>';
}
