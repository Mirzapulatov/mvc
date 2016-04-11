<?php
$msg = "";
if($_POST['AdminName'] == AdminName && $_POST['AdminPassword'] == AdminPassword){
    $_SESSION['AdminName'] = $_POST['AdminName'];
    $_SESSION['AdminPassword'] = $_POST['AdminPassword'];
    header("Location: ");
}else{
    $msg = 'Введенные данные не валидны!<br/>';
}
