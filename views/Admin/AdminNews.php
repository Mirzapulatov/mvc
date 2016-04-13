<?php
if ($protect) { //protect from user ?>
    <div class="content">
    <div class="content_resize">
    <div class="mainbar">
        <div class="article">
            <?php switch ($case) { //View News records
                default:
                    ?>
                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/create">Создать новость</a><br/>
                    <h2><span>CRUD</span></h2>
                    <table border="1px">
                        <?php while ($news = $query->fetch()) { ?>
                            <tr>
                                <td><?php echo $news['id']; ?></td>
                                <td><?php echo $checker->CheckXSS($checker->resizeString($news['title'], 20)); ?></td>
                                <td><?php echo $checker->CheckXSS($checker->resizeString($news['text'], 50)); ?></td>
                                <td><?php echo date("H:i:s d.m.Y", $news['time']); ?></td>
                                <td>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $news['id']; ?>">Изменить</a>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $news['id']; ?>">Удалить</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php echo $nav->leafThrough('admin/news', $case, $count, $listCount);
                    break;
                case 'create': // Create News record ?>
                    <a href="./">Управление новостями</a><br/>
                    <h2><span>Создать новость</span></h2>
                    <div class="clr"></div>
                    <?php if (!empty($msg)) {
                        echo $msg;
                    } ?>
                    <form action="" method="post">
                        <ol>
                            <li>
                                <label for="name"> Заголовок</label>
                                <input name="title" class="text"/>
                            </li>
                            <li>
                                <label for="text">Текст новости </label>
                                <textarea name="text" rows="8" cols="50"></textarea>
                            </li>
                            <li>
                                <input type="submit" value="Создать" class="send"/>
                                <div class="clr"></div>
                            </li>
                        </ol>
                    </form>
                    <?php break;
                case 'update': // update News record  ?>
                    <a href="../.">Управление новостями</a><br/>
                    <h2><span>Update News</span></h2>
                    <div class="clr"></div>
                    <?php
                    if ($availability) {
                        if (!empty($msg)) {
                            echo $msg;
                        } ?>
                        <form action="" method="post">
                            <ol>
                                <li>
                                    <label for="name"> Заголовок</label>
                                    <input name="title" class="text" value="<?php echo $checker->CheckXSS($news['title']); ?>"/>
                                </li>
                                <li>
                                <li>
                                    <label for="text">Текст новости </label>
                                    <textarea name="text" rows="8" cols="50"><?php echo $checker->CheckXSS($news['text']); ?></textarea>
                                </li>
                                <li>
                                    <input type="submit" value="Изменить" class="send"/>
                                    <div class="clr"></div>
                                </li>
                            </ol>
                        </form>
                    <?php } else {
                        ?>
                        Блог не существует!
                    <?php }
                    break;
                case 'delete': //delete News record ?>

                    <?php
                    if ($availability) {
                        if ($ok == true) { ?>
                            <a href="../../../">Управление новостями</a><br/>
                            <h2><span>Delete News</span></h2>
                            <div class="clr"></div>
                            Успешно удалено!
                        <?php } else { ?>
                            <a href=".././">Управление новостями</a><br/>
                            <h2><span>Delete News</span></h2>
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
                        Блог не существует!
                        <?php
                    }
            } ?>
        </div>
    </div>

<?php } ?>