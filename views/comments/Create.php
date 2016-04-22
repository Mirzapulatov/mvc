<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">
                <?php if (\controllers\Controller::checkAdmin()) { ?>
                    <a href="./">Управление комментариями</a><br/>
                    <h2><span>Создать комментарий</span></h2>
                <?php } ?>
                <div class="clr"></div>
                <?php if (!empty($msg)) {
                    echo $msg;
                } ?>
                <form action="" method="post">
                    <ol>
                        <li>
                            <label> name</label>
                            <input name="name" class="message"/>
                        </li>
                        <li>
                            <label>message </label>
                            <textarea name="message" rows="8" cols="50"></textarea>
                        </li>
                        <li>
                            <input type="submit" value="Создать" class="send"/>
                            <div class="clr"></div>
                        </li>
                    </ol>
                </form>
            </div>
        </div>
    </div>
</div>
