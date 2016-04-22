<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

                <a href="./">Управление портфолио </a><br/>
                <h2><span>Создание портфолио </span></h2>
                <div class="clr"></div>
                <?php if (!empty($msg)) {
                    echo $msg;
                } ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <ol>
                        <li>
                            <label>Имя</label>
                            <input name="name" class="text"/>
                        </li>
                        <li>
                            <label>Скриншот </label>
                            <input type="file" name="screen" class="text"/>
                        </li>
                        <li>
                            <label>Описание </label>
                            <textarea name="opis" rows="8" cols="50"></textarea>
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
