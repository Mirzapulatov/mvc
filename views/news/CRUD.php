<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/create">Создать новость</a><br/>
                <h2><span>CRUD</span></h2>
                <table border="1px">
                    <?php while ($news = $query->fetch()) { ?>
                        <tr>
                            <td><?php echo $news['id']; ?></td>
                            <td><?php echo $change->CheckXSS($change->resizeString($news['title'], 20)); ?></td>
                            <td><?php echo $change->CheckXSS($change->resizeString($news['text'], 50)); ?></td>
                            <td><?php echo date("H:i:s d.m.Y", $news['time']); ?></td>
                            <td>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $news['id']; ?>">Изменить</a>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $news['id']; ?>">Удалить</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php echo $pagination; ?>

            </div>
        </div>

