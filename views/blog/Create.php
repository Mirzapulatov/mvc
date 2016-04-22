<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

                <a href="./">Управление блогом </a><br/>
                <h2><span>Создание блога </span></h2>
                <div class="clr"></div>
                <?php if (!empty($msg)) {
                    echo $msg;
                } ?>
                <form action="" method="post">
                    <ol>
                        <li>
                            <label>Заголовок</label>
                            <input name="title" class="text"/>
                        </li>
                        <li>
                            <label>Автор </label>
                            <input name="author" class="text"/>
                        </li>
                        <li>
                            <label>Текст блога </label>
                            <textarea name="text" rows="8" cols="50"></textarea>
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
