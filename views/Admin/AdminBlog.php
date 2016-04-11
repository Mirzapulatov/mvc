<?php
if ($protect) { ?>
    <div class="content">
    <div class="content_resize">
    <div class="mainbar">
        <div class="article">
            <?php switch ($case) {
                default:
                    ?>
                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/create">Create Blog</a><br/>
                    <h2><span>CRUD</span></h2>
                    <table border="1px">
                        <?php while ($blog = $query->fetch()) { ?>
                            <tr>
                                <td><?php echo $blog['id']; ?></td>
                                <td><?php echo $checker->resizeString($blog['title'], 20); ?></td>
                                <td><?php echo $checker->resizeString($blog['text'], 50); ?></td>
                                <td><?php echo date("H:i:s d.m.Y", $blog['time']); ?></td>
                                <td>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $blog['id']; ?>">Edit</a>
                                    <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $blog['id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <?php break;
                case 'create': ?>
                    <a href="./">Blog Control</a><br/>
                    <h2><span>Create blog</span></h2>
                    <div class="clr"></div>
                    <?php if (!empty($msg)) {
                        echo $msg;
                    } ?>
                    <form action="" method="post">
                        <ol>
                            <li>
                                <label for="name"> Title</label>
                                <input name="title" class="text"/>
                            </li>
                            <li>
                                <label for="author">Author </label>
                                <input name="author" class="text"/>
                            </li>
                            <li>
                                <label for="text">Text </label>
                                <textarea name="text" rows="8" cols="50"></textarea>
                            </li>
                            <li>
                                <input type="image" name="imageField" id="imageField" src="/common/images/submit.gif"
                                       class="send"/>
                                <div class="clr"></div>
                            </li>
                        </ol>
                    </form>
                    <?php break;
                case 'update': ?>
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
                                    <label for="name"> Title</label>
                                    <input name="title" class="text" value="<?php echo $blog['title']; ?>"/>
                                </li>
                                <li>
                                    <label for="author">Author </label>
                                    <input name="author" class="text" value="<?php echo $blog['author']; ?>"/>
                                </li>
                                <li>
                                    <label for="text">Text </label>
                                    <textarea name="text" rows="8" cols="50"><?php echo $blog['text']; ?></textarea>
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
                case 'delete': ?>

                    <?php
                    if ($availability) {
                        if ($ok == true) { ?>
                            <a href="../../../">Blog Control</a><br/>
                            <h2><span>Delete blog</span></h2>
                            <div class="clr"></div>
                            Успешно удалено!
                        <?php } else { ?>
                            <a href=".././">Blog Control</a><br/>
                            <h2><span>Delete blog</span></h2>
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