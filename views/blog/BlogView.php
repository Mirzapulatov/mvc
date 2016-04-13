<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <!-- Blog -->
            <div class="article">
                <h2><span><?php echo $checker->CheckXSS($getBlog['title']); ?></span></h2>
                <p class="infopost"><span class="date"><?php echo date("d-m-Y", $getBlog['time']); ?></span>
                    <a href="#" class="com"><span><?php echo $getBlog['views']; ?></span></a></p>
                <div class="clr"></div>
                <div class="img"><img src="/common/images/img2.jpg" width="177" height="213" alt="" class="fl"/></div>
                <div class="post_content">
                    <p><?php echo $checker->CheckXSS($getBlog['text']); ?></p>
                </div>
                <div class="clr"></div>




