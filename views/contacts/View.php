<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <a href="../.">Управление контактами</a><br/>
            <h2><span>Просмотр сообщения</span></h2>
            <div class="clr"></div>
            <?php if ($availability) { ?>
                <ol>
                    <li>
                        <label>Имя </label>
                        <?php echo $change->CheckXSS($contacts['name']); ?>
                    </li>
                    <li>
                        <label>Почта </label>
                        <?php echo $change->CheckXSS($contacts['email']); ?>
                    </li>
                    <li>
                        <label>Сообщение</label>
                        <?php echo $change->CheckXSS($contacts['message']); ?>
                    </li>
                </ol>
            <?php } else {
                ?>
                не существует!
            <?php } ?>
        </div>
    </div>
</div>

