<!-- Comments -->
<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">
                <div class="clr"></div>
                <hr style="height: 1px;border-top: solid 1px #fefefe;"/>
                <?php if (!empty($msg)) {
                    echo $msg;
                } ?>
                <form action="" method="post" id="sendemail">
                    <ol>
                        <li>
                            <label>Имя </label>
                            <input id="name" name="name" class="text"/>
                        </li>
                        <li>
                            <label>Сообщение </label>
                            <textarea id="message" name="message" rows="4" cols="50"></textarea>
                        </li>
                        <li>
                            <input type="submit" value="Написать" class="send"/>
                            <div class="clr"></div>
                        </li>
                    </ol>
                </form>
                <?php if ($result->rowCount()) {
                    while ($comment = $result->fetch()) { ?>
                        <hr style="height: 1px;border-top: solid 1px #fefefe;"/>
                        <p class="infopost"><span
                                class="date"><?php echo '' . $comment['name'] . ' ' . date("H:i:s d-m-Y", $comment['time']); ?></span>
                        <div class="clr"></div>
                        <p><?php echo $change->CheckXSS($comment['message']); ?></p>
                        <div class="clr"></div>
                    <?php }
                } else { ?>
                    <hr style="height: 1px;border-top: solid 1px #fefefe;"/>
                    <h2><span>Комментариев нет</span></h2>
                <?php } ?>

                <?php echo $nav->leafThrough('blog/view/' . $id, $page, $count, $listCount); ?>
            </div>
        </div>
    </div>
</div>
