<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <?php while ($blog = $result->fetch()) { ?>

                <div class="article">
                    <h2><span><?php echo $change->CheckXSS($blog['title']); ?></span></h2>
                    <p class="infopost"><span class="date"><?php echo date("H:i d-m-Y", $blog['time']); ?></span>
                        <a href="#" class="com"><span><?php echo $blog['views']; ?></span></a></p>
                    <div class="clr"></div>
                    <div class="img"><img src="/common/images/img2.jpg" width="177" height="213" alt="" class="fl"/>
                    </div>
                    <div class="post_content">
                        <p><?php echo $change->CheckXSS($change->resizeString($blog['text'], 600)); ?></p>
                        <p class="spec"><a href="/blog/view/<?php echo $blog['id'] ?>" class="rm">Читать
                                далее &raquo;</a></p>
                    </div>
                    <div class="clr"></div>
                </div>
            <?php }
            echo $pagination; ?>
        </div>
    </div>
</div>

