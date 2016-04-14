<?php
$msg = "";
if($_POST['AdminName'] == AdminName && $_POST['AdminPassword'] == AdminPassword){ //check of admin name and password
    $_SESSION['Admin'] = true; //initialization admin
    header("Location: ");
}else{
    $msg = 'Введенные данные не валидны!<br/>';
}
