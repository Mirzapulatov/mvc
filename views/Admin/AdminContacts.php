<?php
if ($protect) { //protect from user ?>
    <div class="content">
    <div class="content_resize">
    <div class="mainbar">
        <div class="article">
            <?php switch ($case) { //View contacts records
                default:
                    ?>
                    <h2><span>RUD</span></h2>
                    <table border="1px">

                        <?php while ($contacts = $query->fetch()) { ?>
                            <tr>
                                <td><?php echo $contacts['id']; ?></td>
                                <td><?php echo $contacts['name']; ?></td>
                                <td><?php echo $contacts['email']; ?></td>
                                <td><?php echo $checker->resizeString($contacts['message'], 200); ?></td>
                                <td><?php echo date("H:i:s d.m.Y", $contacts['time']); ?></td>
                                <td>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/view/<?php echo $contacts['id']; ?>">Просмтотреть</a>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $contacts['id']; ?>">Изменить</a>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $contacts['id']; ?>">Удалить</a>

                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php echo $nav->leafThrough('admin/contacts', $case, $count, $listCount);
                    break;
                case 'view': // view contacts record  ?>
                    <a href="../.">Управление контактами</a><br/>
                    <h2><span>Просмотр сообщения</span></h2>
                    <div class="clr"></div>
                    <?php if ($availability) { ?>
                            <ol>
                                <li>
                                    <label for="name">Имя </label>
                                    <?php echo $checker->CheckXSS($contacts['name']); ?>
                                </li>
                                <li>
                                    <label for="email">Почта </label>
                                    <?php echo $checker->CheckXSS($contacts['email']); ?>
                                </li>
                                <li>
                                    <label for="message">Сообщение</label>
                                    <?php echo $checker->CheckXSS($contacts['message']); ?>
                                </li>
                            </ol>
                    <?php } else {
                        ?>
                        не существует!
                    <?php }
                    break;
                case 'update': // update contacts record  ?>
                    <a href="../.">Управление контактами</a><br/>
                    <h2><span>Изменить контакт</span></h2>
                    <div class="clr"></div>
                    <?php
                    if ($availability) {
                        if (!empty($msg)) {
                            echo $msg;
                        } ?>
                        <form action="" method="post">
                            <ol>
                                <li>
                                    <label for="name">Имя </label>
                                    <input id="name" name="name" class="text" value="<?php echo $checker->CheckXSS($contacts['name']); ?>" />
                                </li>
                                <li>
                                    <label for="email">Почта </label>
                                    <input id="email" name="email" class="text" value="<?php echo $checker->CheckXSS(str_replace(" ","",$contacts['email'])); ?>" />
                                </li>
                                <li>
                                    <label for="message">Сообщение </label>
                                    <textarea id="message" name="message" rows="8" cols="50"><?php echo $checker->CheckXSS($contacts['message']); ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" value="Изменить" class="send"/>
                                    <div class="clr"></div>
                                </li>
                            </ol>
                        </form>
                    <?php } else {
                        ?>
                        не существует!
                    <?php }
                    break;
                case 'delete': //delete contacts record ?>

                    <?php
                    if ($availability) {
                        if ($ok == true) { ?>
                            <a href="../../../">Управление контактами</a><br/>
                            <h2><span>Удаление контакта</span></h2>
                            <div class="clr"></div>
                            Успешно удалено!
                        <?php } else { ?>
                            <a href=".././">Управление контактами</a><br/>
                            <h2><span>Удаление контакта</span></h2>
                            <div class="clr"></div>
                            <ol>
                                <li>
                                    <form action="<?php echo $id; ?>/ok/"><input type="submit" value="Удалить"
                                                                                 class="send"/>
                                    </form>
                                    <form action="../"><input type="submit" value="Отмена" class="send"/></form>
                                    <div class="clr"></div>
                                </li>
                            </ol>
                        <?php }
                    } else {
                        ?>
                        не существует!
                        <?php
                    }
            } ?>
        </div>
    </div>

<?php } ?>