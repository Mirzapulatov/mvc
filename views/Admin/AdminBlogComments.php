<?php
if ($protect) { //protect from user ?>
    <div class="content">
    <div class="content_resize">
    <div class="mainbar">
        <div class="article">
            <?php switch ($case) { //View comments records
                default:
                    ?>
                    <a href="/admin">Admin Panel</a><br/>
                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/create">Create Comment</a><br/>
                    <h2><span>CRUD</span></h2>
                    <table border="1px">
                        <?php
                        if(!$query->rowCount()){ ?>
                            Комментарии отсутствуют
                        <?php } while ($blogComments = $query->fetch()) { ?>
                            <tr>
                                <td><?php echo $blogComments['id']; ?></td>
                                <td><?php echo $checker->resizeString($blogComments['name'], 20); ?></td>
                                <td><?php echo $checker->resizeString($blogComments['message'], 50); ?></td>
                                <td><?php echo date("H:i:s d.m.Y", $blogComments['time']); ?></td>
                                <td>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $blogComments['id']; ?>">Edit</a>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $blogComments['id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php echo $nav->leafThrough('admin/comments', $case, $count, $listCount);
                    break;
                case 'create': // Create comments record ?>
                    <a href="./">Comments Control</a><br/>
                    <h2><span>Create Comment</span></h2>
                    <div class="clr"></div>
                    <?php if (!empty($msg)) {
                        echo $msg;
                    } ?>
                    <form action="" method="post">
                        <ol>
                            <li>
                                <label for="name"> name</label>
                                <input name="name" class="message"/>
                            </li>
                            <li>
                                <label for="message">message </label>
                                <textarea name="message" rows="8" cols="50"></textarea>
                            </li>
                            <li>
                                <input type="image" name="imageField" id="imageField" src="/common/images/submit.gif"
                                       class="send"/>
                                <div class="clr"></div>
                            </li>
                        </ol>
                    </form>
                    <?php break;
                case 'update': // update Comments record  ?>
                    <a href="../.">Comments Control</a><br/>
                    <h2><span>Update Comment</span></h2>
                    <div class="clr"></div>
                    <?php
                    if ($availability) {
                        if (!empty($msg)) {
                            echo $msg;
                        } ?>
                        <form action="" method="post">
                            <ol>
                                <li>
                                    <label for="name"> name</label>
                                    <input name="name" class="message" value="<?php echo $blogComments['name']; ?>"/>
                                </li>
                                <li>
                                    <label for="message">message </label>
                                    <textarea name="message" rows="8" cols="50"><?php echo $blogComments['message']; ?></textarea>
                                </li>
                                <li>
                                    <input type="image" name="imageField" id="imageField"
                                           src="/common/images/submit.gif" class="send"/>
                                    <div class="clr"></div>
                                </li>
                            </ol>
                        </form>
                    <?php } else {
                        ?>
                        Блог не существует!
                    <?php }
                    break;
                case 'delete': //delete comments record ?>

                    <?php
                    if ($availability) {
                        if ($ok == true) { ?>
                            <a href="../../../">Comments Control</a><br/>
                            <h2><span>Delete Comment</span></h2>
                            <div class="clr"></div>
                            Успешно удалено!
                        <?php } else { ?>
                            <a href=".././">Comments Control</a><br/>
                            <h2><span>Delete Comment</span></h2>
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