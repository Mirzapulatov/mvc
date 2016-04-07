<div class="content">
    <div class="content_resize">
        <div class="mainbar">

            <div class="article">
                <h2><span>Send us</span> mail</h2>
                <div class="clr"></div>
                <?php if(!empty($msg)){ echo $msg; } ?>
                <form action="" method="post" id="sendemail">
                    <ol>
                        <li>
                            <label for="name">Name (required)</label>
                            <input id="name" name="name" class="text" />
                        </li>
                        <li>
                            <label for="email">Email Address (required)</label>
                            <input id="email" name="email" class="text" />
                        </li>
                        <li>
                            <label for="website">Website</label>
                            <input id="website" name="website" class="text" value="http://"/>
                        </li>
                        <li>
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" rows="8" cols="50"></textarea>
                        </li>
                        <li>
                            <input type="image" name="imageField" id="imageField" src="/common/images/submit.gif" class="send" />
                            <div class="clr"></div>
                        </li>
                    </ol>
                </form>
            </div>
        </div>