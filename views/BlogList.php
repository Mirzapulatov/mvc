<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <?php while($getBlog = $result->fetch()){ ?>

                <div class="article">
                    <h2><span><?php echo $getBlog['title']; ?></span></h2>
                    <p class="infopost"><span class="date"><?php echo date("d-m-Y",$getBlog['time']);?></span>
                        <a href="#" class="com"><span><?php echo $getNews['views']; ?></span></a></p>
                    <div class="clr"></div>
                    <div class="img"><img src="/design/images/img2.jpg" width="177" height="213" alt="" class="fl" /></div>
                    <div class="post_content">
                        <p><?php echo $ver->resizeString($getBlog['text'],600); ?></p>
                        <p class="spec"><a href="/blog/view/<?php echo $getBlog['id'] ?>" class="rm">Read more &raquo;</a></p>
                    </div>
                    <div class="clr"></div>
                </div>
            <?php } echo $nav->leaf('blog', $page, $count, $listCount); ?>

