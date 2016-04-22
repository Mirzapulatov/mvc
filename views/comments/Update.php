<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">
                <a href="../.">Управление комментариями</a><br/>
                <h2><span>Изменить комментарий</span></h2>
                <div class="clr"></div>
                <?php
                if ($availability) {
                    if (!empty($msg)) {
                        echo $msg;
                    } ?>
                    <form action="" method="post">
                        <ol>
                            <li>
                                <label> name</label>
                                <input name="name" class="message"
                                       value="<?php echo $change->CheckXSS($blogComments['name']); ?>"/>
                            </li>
                            <li>
                                <label>message </label>
                                <textarea name="message" rows="8"
                                          cols="50"><?php echo $change->CheckXSS($blogComments['message']); ?></textarea>
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
