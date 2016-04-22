<div class="content">
    <div class="content_resize">
        <div class="mainbar">

            <div class="article">
                <h2><span>Напишите</span> нам</h2>
                <div class="clr"></div>
                <?php if (!empty($msg)) {
                    echo $msg;
                } ?>
                <form action="" method="post" id="sendemail">
                    <ol>
                        <li>
                            <label>Имя</label>
                            <input id="name" name="name" class="text"/>
                        </li>
                        <li>
                            <label>Почта</label>
                            <input id="email" name="email" class="text"/>
                        </li>
                        <li>
                            <label>Сообщение</label>
                            <textarea id="message" name="message" rows="8" cols="50"></textarea>
                        </li>
                        <li>
                            <input type="submit" class="send" value="Написать"/>
                            <div class="clr"></div>
                        </li>
                    </ol>
                </form>
            </div>
        </div>
    </div>
</div>