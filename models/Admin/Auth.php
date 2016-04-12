<?php
$msg = "";
if($_POST['AdminName'] == AdminName && $_POST['AdminPassword'] == AdminPassword){ //check of admin name and password
    $_SESSION['AdminName'] = $_POST['AdminName']; //initialization admin name
    $_SESSION['AdminPassword'] = $_POST['AdminPassword']; //initialization admin password
    header("Location: ");
}else{
    $msg = 'Введенные данные не валидны!<br/>';
}
