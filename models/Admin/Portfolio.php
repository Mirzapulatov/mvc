<?php
if ($protect) {
    switch ($case) {
        /**
         * show records portfolio
         */
        default:
            $pagex = $case - 1;
            $listCount = 30; //records per page
            $query = DB::run()->query("SELECT * FROM portfolio ORDER BY id DESC LIMIT $listCount OFFSET $pagex*$listCount");
            $count = DB::run()->query("SELECT * FROM portfolio")->columnCount();
            break;
        /**
         * create record of portfolio
         */
        case 'create':
            if (!empty($_POST)) {
                $msg = "";
                if (!$checker->stringLength($_POST['name'] , 5, 200)) {
                    $msg = 'Ошибка имени. Имя должно быть в диапазоне от 5 до 200 символов. <br/>';
                }
                if (!$checker->stringLength($_POST['opis'], 20, 3000)) {
                    $msg = sprintf('%s Ошибка описания.Описание должено состоять из 20-3000 символов. <br/>', $msg);
                }
                if (empty($_FILES['screen']['name'])) {
                    $msg = sprintf('%s Не выбран скриншот. <br/>', $msg);
                } else {
                    $GetExt = array('bmp', 'gif', 'jpeg', 'jpg', 'png');
                    $ext = strtolower(end(explode('.', $_FILES['screen']['name'])));
                    if (!preg_match('#([a-z0-9-_]{1,32})#i', $_FILES['screen']['name'])) {
                        $msg = sprintf('%s Не верное имя скриншота. <br/>', $msg);
                    }
                    if ($_FILES['screen']['size'] > 1024 * 2 * 1024) {
                        $msg = sprintf('%s Скриншот не более 2 мб!. <br/>', $msg);
                    }
                    if (preg_match('/(.php|.pl|.htaccess)/i', $_FILES['screen']['name']) || !in_array(strtolower($ext), $GetExt)) {
                        $msg = sprintf('%s Не верный формат скриншота. <br/>', $msg);
                    }
                }

                if (empty($msg)) {
                        $randu = rand(1000, 9999);
                        $name = time() . '' . $randu . '.' . $ext;
                        copy($_FILES['screen']['tmp_name'], ROOT.'/common/files/portfolio/' . $name);


                    $add = DB::run()->prepare("INSERT INTO portfolio (name, opis, img ) VALUES (?, ?, ?)");
                    $add->execute(array($_POST['name'], $_POST['opis'], $name));
                    $msg = 'Успешно!';
                }
                //return $msg;
            }
            break;
        /**
         * update record of portfolio
         */
        case 'update':
            if (!empty($_POST)) {
                $msg = "";
                if (!$checker->stringLength($_POST['name'], 5, 200)) {
                    $msg = 'Ошибка имени. Имя должно быть в диапазоне от 5 до 200 символов. <br/>';
                }
                if (!$checker->stringLength($_POST['opis'], 20, 3000)) {
                    $msg = sprintf('%s Ошибка описания.Описание должено состоять из 20-3000 символов. <br/>', $msg);
                }
                if (!empty($_FILES['screen']['name'])) {
                    $GetExt = array('bmp', 'gif', 'jpeg', 'jpg', 'png');
                    $ext = strtolower(end(explode('.', $_FILES['screen']['name'])));
                    if (!preg_match('#([a-z0-9-_]{1,32})#i', $_FILES['screen']['name'])) {
                        $msg = sprintf('%s Не верное имя скриншота. <br/>', $msg);
                    }
                    if ($_FILES['screen']['size'] > 1024 * 2 * 1024) {
                        $msg = sprintf('%s Скриншот не более 2 мб!. <br/>', $msg);
                    }
                    if (preg_match('/(.php|.pl|.htaccess)/i', $_FILES['screen']['name']) || !in_array(strtolower($ext), $GetExt)) {
                        $msg = sprintf('%s Не верный формат скриншота. <br/>', $msg);
                    }
                }

                if (empty($msg)) {
                    if (!empty($_FILES['screen']['name'])) {
                        $randu = rand(1000, 9999);
                        $name = time() . '' . $randu . '.' . $ext;
                        copy($_FILES['screen']['tmp_name'], ROOT . '/common/files/portfolio/' . $name);
                        $add = DB::run()->prepare("UPDATE portfolio SET name = ?, opis = ?, img = ? WHERE id = ?");
                        $add->execute(array($_POST['name'], $_POST['opis'], $name, $id));
                    }else{
                        $add = DB::run()->prepare("UPDATE portfolio SET name = ?, opis = ? WHERE id = ?");
                        $add->execute(array($_POST['name'], $_POST['opis'], $id));
                    }


                    $msg = 'Успешно!';

                }
            }
            $query = DB::run()->query("SELECT * FROM portfolio WHERE id = $id");
            $portfolio = $query->fetch();
            $availability = $query->rowCount();
            break;
        /**
         * delete record of portfolio
         */
        case 'delete':
            $query = DB::run()->query("SELECT * FROM portfolio WHERE id = $id");
            $availability = $query->rowCount();
            if ($availability) {
                if ($ok) {
                    $portfolio = $query->fetch();
                    @unlink(ROOT."/common/files/portfolio/".$portfolio['img']);
                    DB::run()->query("Delete FROM portfolio WHERE id = $id");
                }
            }

    }
}
