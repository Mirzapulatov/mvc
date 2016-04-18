<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">
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
                                <input name="author" class="text"
                                       value="<?php echo $change->CheckXSS($blog['author']); ?>"/>
                            </li>
                            <li>
                                <label for="text">Текст блога </label>
                                <textarea name="text" rows="8"
                                          cols="50"><?php echo $change->CheckXSS($blog['text']); ?></textarea>
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
                <?php } ?>

            </div>
        </div>
