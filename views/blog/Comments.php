<!-- Comments -->
<div class="article">
    <hr style="height: 1px;border-top: solid 1px #fefefe;"/>
    <?php if(!empty($msg)){ echo $msg; } ?>
    <form action="" method="post" id="sendemail">
        <ol>
            <li>
                <label for="name">Name </label>
                <input id="name" name="name" class="text" />
            </li>
            <li>
                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="4" cols="50"></textarea>
            </li>
            <li>
                <input type="image" name="imageField" id="imageField" src="/common/images/submit.gif" class="send" />
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
            <p><?php echo $checker->CheckXSS($comment['message']); ?></p>
            <div class="clr"></div>
        <?php }
    } else { ?>
        <hr style="height: 1px;border-top: solid 1px #fefefe;"/>
        <h2><span>Комментариев нет</span></h2>

        <div class="clr"></div>

    <?php } ?>
</div>
</div>
<?php echo $nav->leafThrough('blog/view/' . $id, $page, $count, $listCount); ?>
</div>
