<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <?php $i=0; while($portfolio = $result->fetch()){ ?>

                <div style="float: left;width:30%;text-align:center;background-color: #CBCBCB ;height: 220px; margin: 10px; padding: 6px;border-radius: 5px;">
                    <h2><span><?php echo $change->CheckXSS($change->resizeString($portfolio['name'], 20, ":"));?></span></h2>
                    <a href="/portfolio/<?php echo $portfolio['id'] ?>">
                            <img src="/common/files/portfolio/<?php echo trim($portfolio['img']); ?>" width="90%" alt=""  />
                        </a>

                    </div>
            <?php $i++; if($i%3==0){ ?> <div class="clr"></div> <?php }} ?>
            <div class="clr"></div>
        </div>
        </div>
        </div>