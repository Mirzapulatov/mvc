<div class="content">
    <div class="content_resize">
        <div class="mainbar">

            <div class="article">
                <h2><span>Авторизация</span></h2>
                <div class="clr"></div>
                <?php if(!empty($msg)){ echo $msg; } ?>
                <form action="" method="post">
                    <ol>
                        <li>
                            <label for="name">Имя </label>
                            <input id="name" name="AdminName" class="text" />
                        </li>
                        <li>
                            <label for="password">Пароль </label>
                            <input id="password" name="AdminPassword" type="password" class="text" />
                        </li>

                        <li>
                            <input type="submit" value="Войти" class="send" />
                            <div class="clr"></div>
                        </li>
                    </ol>
                </form>
            </div>
        </div>