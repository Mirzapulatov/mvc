<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">
                <h2><span><?php echo $getNews['title']; ?></span></h2>
                <p class="infopost"><span class="date"><?php echo date("d-m-Y",$getNews['time']);?></span>
                    <a href="#" class="com"><span><?php echo $getNews['views']; ?></span></a></p>
                <div class="clr"></div>
                <div class="img"><img src="/design/images/img2.jpg" width="177" height="213" alt="" class="fl" /></div>
                <div class="post_content">
                    <p><?php echo $getNews['text']; ?></p>
                </div>
                <div class="clr"></div>
            </div>
        </div>