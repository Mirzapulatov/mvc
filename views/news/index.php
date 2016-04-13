<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <?php while($getNews = $result->fetch()){ ?>

                <div class="article">
                    <h2><span><?php echo $checker->CheckXSS($getNews['title']); ?></span></h2>
                    <p class="infopost"><span class="date"><?php echo date("H:i d-m-Y",$getNews['time']);?></span>
                        <a href="#" class="com"><span><?php echo $getNews['views']; ?></span></a></p>
                    <div class="clr"></div>
                    <div class="img"><img src="/common/images/img2.jpg" width="177" height="213" alt="" class="fl" /></div>
                    <div class="post_content">
                        <p><?php echo $checker->CheckXSS($checker->resizeString($getNews['text'],600)); ?></p>
                        <p class="spec"><a href="/news/<?php echo $getNews['id'] ?>" class="rm">Читать далее &raquo;</a></p>
                    </div>
                    <div class="clr"></div>
                </div>
            <?php } echo $nav->leafThrough('list', $page, $count, $listCount); ?>
        </div>
