<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">
                <h2><span><?php echo $getBlog['title']; ?></span></h2>
                <p class="infopost"><span class="date"><?php echo date("d-m-Y",$getBlog['time']);?></span>
                    <a href="#" class="com"><span><?php echo $getBlog['views']; ?></span></a></p>
                <div class="clr"></div>
                <div class="img"><img src="/design/images/img2.jpg" width="177" height="213" alt="" class="fl" /></div>
                <div class="post_content">
                    <p><?php echo $getBlog['text']; ?></p>
                </div>
                <div class="clr"></div>
            </div>

            <div class="article">
                <?php if($result->rowCount()){
                    while($comment = $result->fetch()){ ?>
                <hr style="height: 1px;border-top: solid 1px #fefefe;"/>
                <p class="infopost"><span class="date"><?php echo ''.$comment['name'].' '.date("H:i:s d-m-Y",$comment['time']);?></span>

                <div class="clr"></div>

                <div class="post_content">
                    <p><?php echo $comment['message']; ?></p>
                </div>
                <div class="clr"></div>
                <?php }

                }else{ ?>
                    <hr style="height: 1px;border-top: solid 1px #fefefe;"/>
                    <h2><span>Комментариев нет</span></h2>

                    <div class="clr"></div>
                <?php } ?>
            </div>
        </div>