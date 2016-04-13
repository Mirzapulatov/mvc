<?php
if ($protect) { //protect from user ?>
    <div class="content">
    <div class="content_resize">
    <div class="mainbar">
        <div class="article">
            <?php switch ($case) { //View portfolio records
                default:
                    ?>
                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/create">Создать блог </a><br/>
                    <h2><span>CRUD</span></h2>
                    <table border="1px">

                        <?php while ($portfolio = $query->fetch()) { ?>
                            <tr>
                                <td><?php echo $portfolio['id']; ?></td>
                                <td><img src="/common/files/portfolio/<?php echo $portfolio['img']; ?>" width="100px" alt="" class="fl"/></td>
                                <td><?php echo $checker->CheckXSS($checker->resizeString($portfolio['name'], 20)); ?></td>
                                <td><?php echo $checker->CheckXSS($checker->resizeString($portfolio['opis'], 50)); ?></td>
                                <td>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $portfolio['id']; ?>">Изменить</a>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $portfolio['id']; ?>">Удалить</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <?php echo $nav->leafThrough('admin/portfolio', $case, $count, $listCount);
                    break;
                case 'create': // Create portfolio record ?>
                    <a href="./">Управление блогом </a><br/>
                    <h2><span>Создание блога </span></h2>
                    <div class="clr"></div>
                    <?php if (!empty($msg)) {
                        echo $msg;
                    } ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <ol>
                            <li>
                                <label for="name">Имя</label>
                                <input name="name" class="text"/>
                            </li>
                            <li>
                                <label for="author">Скриншот </label>
                                <input type="file" name="screen" class="text"/>
                            </li>
                            <li>
                                <label for="opis">Описание </label>
                                <textarea name="opis" rows="8" cols="50"></textarea>
                            </li>
                            <li>
                                <input type="submit" value="Создать" class="send"/>
                                <div class="clr"></div>
                            </li>
                        </ol>
                    </form>
                    <?php break;
                case 'update': // update portfolio record  ?>
                    <a href="../.">Blog Control</a><br/>
                    <h2><span>Update portfolio</span></h2>
                    <div class="clr"></div>
                    <?php
                    if ($availability) {
                        if (!empty($msg)) {
                            echo $msg;
                        } ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <ol>
                                <li>
                                    <label for="name">Имя</label>
                                    <input name="name" class="text" value="<?php echo $portfolio['name'];?>"/>
                                </li>
                                <li>
                                    <label for="author">Скриншот (не обязательно)</label>
                                    <input type="file" name="screen" class="text"/>
                                </li>
                                <li>
                                    <label for="opis">Описание </label>
                                    <textarea name="opis" rows="8" cols="50"><?php echo $portfolio['opis'];?></textarea>
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
                case 'delete': //delete portfolio record ?>

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