<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/create">Создать портфолио </a><br/>
                <h2><span>CRUD</span></h2>
                <table border="1px">

                    <?php while ($portfolio = $query->fetch()) { ?>
                        <tr>
                            <td><?php echo $portfolio['id']; ?></td>
                            <td><img src="/common/files/portfolio/<?php echo $portfolio['img']; ?>" width="100px" alt="" class="fl"/></td>
                            <td><?php echo $change->CheckXSS($change->resizeString($portfolio['name'], 20)); ?></td>
                            <td><?php echo $change->CheckXSS($change->resizeString($portfolio['opis'], 50)); ?></td>
                            <td>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $portfolio['id']; ?>">Изменить</a>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $portfolio['id']; ?>">Удалить</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php echo $pagination; ?>

            </div>
        </div>

