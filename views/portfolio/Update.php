<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

                <a href="../.">Управление портфолио</a><br/>
                <h2><span>Изменене портфолио</span></h2>
                <div class="clr"></div>
                <?php
                if ($availability) {
                    if (!empty($msg)) {
                        echo $msg;
                    } ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <ol>
                            <li>
                                <label>Имя</label>
                                <input name="name" class="text" value="<?php echo $portfolio['name']; ?>"/>
                            </li>
                            <li>
                                <label>Скриншот (не обязательно)</label>
                                <input type="file" name="screen" class="text"/>
                            </li>
                            <li>
                                <label>Описание </label>
                                <textarea name="opis" rows="8" cols="50"><?php echo $portfolio['opis']; ?></textarea>
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
