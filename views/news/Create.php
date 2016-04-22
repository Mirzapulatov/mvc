<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

                <a href="./">Управление новостями</a><br/>
                <h2><span>Создать новость</span></h2>
                <div class="clr"></div>
                <?php if (!empty($msg)) {
                    echo $msg;
                } ?>
                <form action="" method="post">
                    <ol>
                        <li>
                            <label for="name"> Заголовок</label>
                            <input name="title" class="text"/>
                        </li>
                        <li>
                            <label for="text">Текст новости </label>
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
