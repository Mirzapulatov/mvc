<?php
if ($protect) { //protect from user ?>
    <div class="content">
    <div class="content_resize">
    <div class="mainbar">
        <div class="article">
            <?php switch ($case) { //View blog records
                default:
                    ?>
                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/create">Создать блог </a><br/>
                    <h2><span>CRUD</span></h2>
                    <table border="1px">

                        <?php while ($blog = $query->fetch()) { ?>
                            <tr>
                                <td><?php echo $blog['id']; ?></td>
                                <td><?php echo $checker->resizeString($checker->CheckXSS($blog['title'], 20)); ?></td>
                                <td><?php echo $checker->resizeString($checker->CheckXSS($blog['text'], 50)); ?></td>
                                <td><?php echo date("H:i:s d.m.Y", $blog['time']); ?></td>
                                <td>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $blog['id']; ?>">Изменить</a>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $blog['id']; ?>">Удалить</a>
                                    <a href="/admin/comments/<?php echo $blog['id']; ?>">Комментарии</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php echo $nav->leafThrough('admin/blog', $case, $count, $listCount);
                    break;
                case 'create': // Create blog record ?>
                    <a href="./">Управление блогом </a><br/>
                    <h2><span>Создание блога </span></h2>
                    <div class="clr"></div>
                    <?php if (!empty($msg)) {
                        echo $msg;
                    } ?>
                    <form action="" method="post">
                        <ol>
                            <li>
                                <label for="name">Заголовок</label>
                                <input name="title" class="text"/>
                            </li>
                            <li>
                                <label for="author">Автор </label>
                                <input name="author" class="text"/>
                            </li>
                            <li>
                                <label for="text">Текст блога </label>
                                <textarea name="text" rows="8" cols="50"></textarea>
                            </li>
                            <li>
                                <input type="submit" value="Создать" class="send"/>
                                <div class="clr"></div>
                            </li>
                        </ol>
                    </form>
                    <?php break;
                case 'update': // update blog record  ?>
                    <a href="../.">Blog Control</a><br/>
                    <h2><span>Update blog</span></h2>
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
                                    <input name="title" class="text" value="<?php echo $blog['title']; ?>"/>
                                </li>
                                <li>
                                    <label for="author">Автор </label>
                                    <input name="author" class="text" value="<?php echo $checker->CheckXSS($blog['author']); ?>"/>
                                </li>
                                <li>
                                    <label for="text">Текст блога </label>
                                    <textarea name="text" rows="8" cols="50"><?php echo $checker->CheckXSS($blog['text']); ?></textarea>
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
                case 'delete': //delete blog record ?>

                    <?php
                    if ($availability) {
                        if ($ok == true) { ?>
                            <a href="../../../">Управление блогом</a><br/>
                            <h2><span>Удаление записи</span></h2>
                            <div class="clr"></div>
                            Успешно удалено!
                        <?php } else { ?>
                            <a href=".././">Управление блогом</a><br/>
                            <h2><span>Удаление записи</span></h2>
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