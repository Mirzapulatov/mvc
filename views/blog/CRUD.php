<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/create">Создать блог </a><br/>
                <h2><span>CRUD</span></h2>
                <table border="1px">
                    <?php while ($blog = $query->fetch()) { ?>
                        <tr>
                            <td><?php echo $blog['id']; ?></td>
                            <td><?php echo $change->CheckXSS($change->resizeString($blog['title'], 20)); ?></td>
                            <td><?php echo $change->CheckXSS($change->resizeString($blog['text'], 50)); ?></td>
                            <td><?php echo date("H:i:s d.m.Y", $blog['time']); ?></td>
                            <td>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $blog['id']; ?>">Изменить</a>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $blog['id']; ?>">Удалить</a>
                                <a href="/admin/comments/<?php echo $blog['id']; ?>">Комментарии</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</div>

