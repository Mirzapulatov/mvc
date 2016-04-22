<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

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
                                <input id="name" name="name" class="text" value="<?php echo $change->CheckXSS($contacts['name']); ?>" />
                            </li>
                            <li>
                                <label for="email">Почта </label>
                                <input id="email" name="email" class="text" value="<?php echo $change->CheckXSS(str_replace(" ","",$contacts['email'])); ?>" />
                            </li>
                            <li>
                                <label for="message">Сообщение </label>
                                <textarea id="message" name="message" rows="8" cols="50"><?php echo $change->CheckXSS($contacts['message']); ?></textarea>
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
                <?php }?>
            </div>
        </div>
