<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

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
                                <label> Заголовок</label>
                                <input name="title" class="text"
                                       value="<?php echo $change->CheckXSS($news['title']); ?>"/>
                            </li>
                            <li>
                                <label>Текст новости </label>
                                <textarea name="text" rows="8"
                                          cols="50"><?php echo $change->CheckXSS($news['text']); ?></textarea>
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
    </div>
</div>
