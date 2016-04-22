<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">
                <?php
                if ($availability) {
                    if ($ok == true) { ?>
                        <a href="../../../">Управление комментариями</a><br/>
                        <h2><span>Удалить комментарий</span></h2>
                        <div class="clr"></div>
                        Успешно удалено!
                    <?php } else { ?>
                        <a href=".././">Управление комментариями</a><br/>
                        <h2><span>Удалить комментарий</span></h2>
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
                ?>
            </div>
        </div>
    </div>
</div>
