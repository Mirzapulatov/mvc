<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <<a href="../.">Управление контактами</a><br/>
            <h2><span>Просмотр сообщения</span></h2>
            <div class="clr"></div>
            <?php if ($availability) { ?>
                <ol>
                    <li>
                        <label for="name">Имя </label>
                        <?php echo $change->CheckXSS($contacts['name']); ?>
                    </li>
                    <li>
                        <label for="email">Почта </label>
                        <?php echo $change->CheckXSS($contacts['email']); ?>
                    </li>
                    <li>
                        <label for="message">Сообщение</label>
                        <?php echo $change->CheckXSS($contacts['message']); ?>
                    </li>
                </ol>
            <?php } else {
            ?>
            не существует!
<?php } ?>
        </div>
            <div class="clr"></div>
        </div>
