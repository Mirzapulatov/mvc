<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <!-- Blog -->
            <div class="article">
                <h2><span><?php echo $change->CheckXSS($getBlog['title']); ?></span></h2>
                <p class="infopost"><span class="date"><?php echo date("d-m-Y", $getBlog['time']); ?></span>
                    <a href="#" class="com"><span><?php echo $getBlog['views']; ?></span></a></p>
                <div class="clr"></div>
                <!-- Shared -->
                <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"
                        charset="utf-8"></script>
                <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter"
                     data-counter=""></div>
                <!-- ------ -->
                <div class="img"><img src="/common/images/img2.jpg" width="177" height="213" alt="" class="fl"/></div>
                <div class="post_content">
                    <p><?php echo $change->CheckXSS($getBlog['text']); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>





