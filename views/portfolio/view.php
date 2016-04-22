<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <table style="width: 100%">
                <?php if(!empty($previous['id'])){ ?>
                <td class="portf" style="width: 10%" onclick='location.href="/portfolio/<?php echo $previous['id']; ?>"'>&laquo;</td>
                <?php }else{ ?>
                    <td class="portf" style="width: 10%" onclick='location.href="/portfolio/<?php echo $first['id']; ?>"'>&laquo;</td>
                <?php } ?>
                <td style="width: 80%">
                <div class="article" style="text-align: center">

                    <p class="infopost"><?php echo $change->CheckXSS($portfolio['name']); ?>
                    <div class="clr"></div>

                    <img src="/common/files/portfolio/<?php echo $portfolio['img']; ?>" width="90%" alt="" class="fl"/>

                        <p><?php echo $change->CheckXSS($portfolio['opis']); ?></p>

                    <!-- Shared -->
                    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
                    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter" data-counter=""></div>
                    <!-- ------ -->

                </td>
                <?php if(!empty($next['id'])){ ?>
                <td class="portf" style="width: 10%" onclick='location.href="/portfolio/<?php echo $next['id']; ?>"'>&raquo;</td>
                    <?php }else{ ?>
                <td class="portf" style="width: 10%" onclick='location.href="/portfolio/<?php echo $last['id']; ?>"'>&raquo;</td>
                <?php } ?>
            </table>
        </div>
            <div class="clr"></div>
        </div>
