<div class="content">
    <div class="content_resize">
        <div class="mainbar">

            <div class="article">
                <h2><span>Admin Authorization</span></h2>
                <div class="clr"></div>
                <?php if(!empty($msg)){ echo $msg; } ?>
                <form action="" method="post" id="sendemail">
                    <ol>
                        <li>
                            <label for="name">Name </label>
                            <input id="name" name="AdminName" class="text" />
                        </li>
                        <li>
                            <label for="password">Password </label>
                            <input id="password" name="AdminPassword" type="password" class="text" />
                        </li>

                        <li>
                            <input type="image" name="imageField" id="imageField" src="/common/images/submit.gif" class="send" />
                            <div class="clr"></div>
                        </li>
                    </ol>
                </form>
            </div>
        </div>